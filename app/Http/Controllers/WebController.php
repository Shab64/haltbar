<?php

namespace App\Http\Controllers;

use App\Models\Embroidery;
use App\Models\NameNumbers;
use App\Models\Printing;
use App\Models\Quote;
use App\Models\Ralawise;
use App\Models\RalawisePricing;
use App\Models\SetupCharges;
use App\Models\Uneek;
use App\Models\UneekPricing;
use Illuminate\Http\Request;
use App\Classes\ProductsHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Stripe\Product;

class WebController extends Controller
{
    function index()
    {
        //$uneek = Uneek::select('Category', 'type', 'Model_Small_Image')->get()->unique('Category')->toArray();
        //$ralawise = Ralawise::select('PrimaryCategory', 'type', 'PrimaryImage', 'ColourImage')->get()->unique('PrimaryCategory')->toArray();

        //$data['categories'] = array_merge($ralawise, $uneek);
        return view('web.index');
    }

    function getPagData(Request $request)
    {
        $fromRange = $request->fromRange;
        $limit = $request->limit;
        $uneek = [];
        $ralawise = [];
        //        $uneek = Uneek::select('id','Product_Name','type','Model_Small_Image','Model_Large_Image','Price_Single')->distinct()->get()->toArray();
        //        $ralawise = Ralawise::select('id','Brand','ProductName','type','PrimaryImage','SinglePrice','ColourImage')->distinct()->get()->toArray();
        $uneek_ByCodes = Uneek::select('Product_Code')->groupBY('Product_Code')->skip(floor($fromRange / 2))->take(10)->get()->toArray();
        if (!empty($uneek_ByCodes)) {
            foreach ($uneek_ByCodes as $code) {
                $uneek[] = Uneek::select('Product_Code', 'id', 'Product_Name', 'type', 'Model_Small_Image', 'Model_Large_Image', 'Price_Single')->where('Product_Code', $code['Product_Code'])->first()->toArray();
            }
        }

        $ralawise_ByCodes = Ralawise::select('ProductGroup')->groupBY('ProductGroup')->skip(ceil($fromRange / 2))->take(11)->get()->toArray();
        if (!empty($ralawise_ByCodes)) {
            foreach ($ralawise_ByCodes as $code2) {
                $ralawise[] = Ralawise::select('ProductGroup', 'id', 'Brand', 'ProductName', 'type', 'PrimaryImage', 'SinglePrice', 'ColourImage')->where('ProductGroup', $code2['ProductGroup'])->first()->toArray();
            }
        }
        $data['products'] = array_merge($ralawise, $uneek);
        //        $get_products = array_merge($ralawise, $uneek);
        //        $products = ProductsHelper::shuffle_assoc($get_products);
        //        $data['products'] =array_slice($products, $fromRange, $limit);

        //from Size
        $data['from_size'] = $fromRange;
        $data['to_size'] = $fromRange + sizeof($data['products']);

        //total Product Size
        $uneek_total = Uneek::select('*')->get()->unique('Product_Code')->toArray();
        $ralawise_total = Ralawise::select('*')->get()->unique('ProductGroup')->toArray();
        $get_total_products = array_merge($ralawise_total, $uneek_total);

        //total Size to break into
        $data['total_size'] = count($get_total_products);

        $data['ralawise_pricing'] = json_decode(RalawisePricing::get()->first(), true);
        $data['ralawise_pricing_last'] = json_decode(RalawisePricing::get()->last(), true);
        $data['uneek_pricing'] = json_decode(UneekPricing::get()->first(), true);
        $data['uneek_pricing_last'] = json_decode(UneekPricing::get()->last(), true);

        echo json_encode($data);
    }

    function singleProductView($supplierType, $productID)
    {
        if ($supplierType === "ralawise") {
            $singleProduct = DB::table('product_styles')
                ->join('product_sizes', 'product_styles.code', '=', 'product_sizes.product_style_code')
//                ->join('product_size_conversions', 'product_size_conversions.product_size_code', '=', 'product_sizes.code')
                ->join('product_images', 'product_styles.code', '=', 'product_images.product_style_code')
                ->select('product_styles.*', 'product_sizes.single_list_price', 'product_images.image_url')
                ->where('product_styles.code', $productID)->groupBy('product_styles.code')->get()->first();
            $multiplier = RalawisePricing::get()->first();
            $singleProduct->multiplied_price = round($singleProduct->single_list_price * $multiplier->service_charges_pp, 2);
            $singleProduct->single_price = round($singleProduct->single_list_price, 2);

            $singleProduct->material = DB::table('product_colourways')->where('product_style_code', $productID)->groupBy('product_style_code')->get();
            $singleProduct->sizes = DB::table('product_sizes')->where('product_style_code', $productID)->groupBy('code')->get();
            foreach ($singleProduct->sizes as $k=>$sizeGuides){
                $singleProduct->sizes[$k]->size_conversion = DB::table('product_size_conversions')->where('product_style_code', $sizeGuides->product_style_code)->where('product_size_code',$sizeGuides->code)->get();
            }

            $singleProduct->colors = DB::table('product_swatches')->where('product_style_code', $productID)->get();

            $singleProduct->images = DB::table('product_images')->where('product_style_code', $productID)->groupBy('product_colourway_code')->get();

            return view('web.single-product-ralawise', compact('singleProduct'));
        } else if ($supplierType === "uneek") {
            $singleProduct = Uneek::where('Product_Code', $productID)->get()->first();
            $multiplier = UneekPricing::get()->first();
            $singleProduct->multiplied_price = round($singleProduct->Price_Single * $multiplier->service_charges_pp, 2);
            $singleProduct->single_price = round($singleProduct->Price_Single, 2);

            $singleProduct->sizes = Uneek::where('Product_Code', $productID)->groupBy('Size')->get();
            $singleProduct->images = Uneek::where('Product_Code', $productID)->groupBy('Large_Colour_Image')->get();
            $singleProduct->colors = Uneek::where('Product_Code', $productID)->groupBy('Hex')->get();
            //$singleProduct['pricing_table'] = json_decode(UneekPricing::all(), true);
            // $singleProduct['colors'] = json_decode(Uneek::select('id', 'Colour', 'Small_Colour_Image', 'SingleQuantity', 'Hex')->where('Product_Code', $singleProduct['Product_Code'])->get()->unique('Colour'), true);

            //customizatoin prices work
            // $singleProduct['embroidery'] = json_decode(Embroidery::get()->groupBy("position"), true);
            // $singleProduct['printing'] = json_decode(Printing::get()->groupBy("position"), true);
            // $singleProduct['name_numbers'] = json_decode(NameNumbers::get()->groupBy("position"), true);
            // $singleProduct['setup_charges'] = json_decode(SetupCharges::get(), true);
            // if (!empty($singleProduct['colors'])) {
            //     foreach ($singleProduct['colors'] as $k => $color) {
            //         $sizes = json_decode(Uneek::select('Size')->where('Colour', $color['Colour'])->where('Product_Code', $singleProduct['Product_Code'])->get()->unique('Size'), true);
            //         if (!empty($sizes)) {
            //             foreach ($sizes as $k => $size) {
            //                 $singleProduct[$color['Colour']]['sizes'][$k] = $size['Size'];
            //             }
            //         }

            //         $quantites = json_decode(Uneek::select('SingleQuantity')->where('Colour', $color['Colour'])->where('Product_Code', $singleProduct['Product_Code'])->get(), true);
            //         if (!empty($quantites)) {
            //             foreach ($quantites as $k => $quantity) {
            //                 $singleProduct[$color['Colour']]['quantities'][$k] = $quantity['SingleQuantity'];
            //             }
            //         }

            //         if (!empty($singleProduct[$color['Colour']]['sizes'])) {
            //             foreach ($singleProduct[$color['Colour']]['sizes'] as $k => $size) {
            //                 $price = json_decode(Uneek::select('Price_Single')->where('Colour', $color['Colour'])->where('Size', $size)->where('Product_Code', $singleProduct['Product_Code'])->get()->unique('Size'), true);
            //                 if (!empty($price)) {
            //                     $singleProduct[$color['Colour']]['prices'][$k] = round($price[0]['Price_Single'] * $multiplier['service_charges_pp'], 2);
            //                 }
            //             }
            //         }
            //         // $singleProduct[$color['Colour']]['prices'] = json_decode(Uneek::select('Price_Single')->where('Colour', $color['Colour'])->where('Product_Code', $singleProduct['Product_Code'])->get()->unique('Size'), true);
            //     }
            //     // var_dump($singleProduct['colors']); die;
            // }
            // var_dump($singleProduct['Full_Description']); die;
            return view('web.single-product-uneek', compact('singleProduct'));
        }
    }

    function getColorName(Request $request)
    {
        $colorName = DB::table('product_colourways')->select('title')->where('code', $request['colorCode'])->get()->first();
        $colorImage = DB::table('product_images')->select('image_url')->where('product_colourway_code', $request['colorCode'])->where('product_style_code', $request['imageCode'])->groupBy('product_colourway_code')->get()->first();
        return [$colorName, $colorImage];
    }

    function updateAmount(Request $request)
    {
        $ralawiseCharges = RalawisePricing::all();
        foreach ($ralawiseCharges as $charges) {
            if ($request['totalQty'] >= $charges['quantity_from'] && $request['totalQty'] <= $charges['quantity_to']) {
                $singlePrice = round($request['productPrice'] * $charges['service_charges_pp'], 2);
                $data['discountedPrice'] = round($singlePrice - ($singlePrice / 100 * $charges['discount_per_percent']), 2);
                $data['discountPercent'] = $charges['discount_per_percent'];
                $data['totalPrice'] = round($data['discountedPrice'] * $request['totalQty'], 2);
                $data['ActualPrice'] = round($singlePrice * $request['totalQty'], 2);

                return response()->json($data);
            }
        }
    }

    function filter(Request $request)
    {
        $data['products'] = array();
        $categories = $request->seletctedCategories;
        $sizes = $request->selectedSizes;
        $suppliers = $request->selectedSuppliers;
        $minPrice = $request->minPrice;
        $maxPrice = $request->maxPrice;

        if (!empty($suppliers)) {
            foreach ($suppliers as $k => $supplier) {
                if ($supplier === "Ralawise") {
                    $ralawise = Ralawise::get();
                    if (!empty($categories)) {
                        foreach ($categories as $category) {
                            $ralawise->where();
                        }
                    }
                } else if ($supplier === "Uneek") {
                } elseif ($supplier === "Other") {
                }
            }
        } else {
        }
    }

    function submitQuotes(Request $request)
    {
        $data = $request->all();

        $files = $request->file('images');
        if (!empty($files)) {
            $logos = array();
            foreach ($files as $k => $file) {
                $fileName = explode(".", $_FILES['images']['name'][$k]);
                $renamedFileName = $fileName[0] . "-" . Date('Ymd') . time() . "." . $fileName[1];
                $logos[] = $file->storeAs('/', $renamedFileName, 'uploads');
            }
            $data['logos'] = json_encode($logos);
        }

        unset($data['_token'], $data['images']);
        Quote::create($data);

        return redirect()->back()->with('success', 'Quote Send Successfully, Contact you shortly!');
    }

    function uploadFile()
    {
        return view('upload-input');
    }

    public function uploadCsv(Request $request)
    {
        $csv_file = $request->file('csv_file');
        if (!empty($csv_file)) {
            $file = $csv_file->storeAs('/', $_FILES['csv_file']['name'], 'csvs');
        }
    }

    public function get_data()
    {

        $file_n = public_path('/csvs/Uneek CSV 220522.csv');
        // var_dump($file_n); die;
        $file = fopen($file_n, 'r');
        $headers = fgetcsv($file);
        // unset($headers[7]);
        $headers[0] = 'Company_Name';
        $headers[7] = 'EAN_Bar_Code';
        $data = [];
        // var_dump($headers); die;
        while (($row = fgetcsv($file)) !== false) {
            $item = [];
            foreach ($row as $key => $value) {
                $item[str_replace(' ', '_', $headers[$key])] = $value ?: null;
            }

            // var_dump($item); die;
            ini_set('max_execution_time', 3600); //Increase the excetuion time
            $exists = Uneek::where('Product_Name', $item['Product_Name'])->where('Size', $item['Size'])
                ->where('Colour_Code', $item['Colour_Code'])->get();
            if (!isset($exists[0]->id) && $item['Product_Code'] != null) {
                // var_dump($item); die;
                // var_dump($item); die;
                // DB::table('uneek')->insert($item);
                if (!isset($item['Company'])) {
                    $item['Company_Name'] = 'Uneek Clothing';
                } else {
                    $item['Company_Name'] = $item['Company'];
                }

                Uneek::create($item);
                //     // Ralawise::create($item);
                //     // var_dump($item); die;
                //     // $insert = new Ralawise();
                //     // $insert->SkuCode = $item['SkuCode'];
                //     // $insert->ProductColourCode = $item['ProductColourCode'];
                //     // $insert->ProductGroup = $item['ProductGroup'];
                //     // $insert->Brand = $item['Brand'];
                //     // $insert->PrimaryCategory = $item['PrimaryCategory'];
                //     // $insert->ProductName = $item['ProductName'];
                //     // $insert->Specification = $item['Specification'];
                //     // $insert->RetailDescription = isset($item['RetailDescription']) ? $item['RetailDescription'] : null;
                //     // $insert->BulletText1 = $item['BulletText1'];
                //     // $insert->BulletText2 = $item['BulletText2'];
                //     // $insert->BulletText3 = $item['BulletText3'];
                //     // $insert->JacketLength = $item['JacketLength'];
                //     // $insert->LegLength = $item['LegLength'];
                //     // $insert->WashingInstructions = $item['WashingInstructions'];
                //     // $insert->Fabric = $item['Fabric'];
                //     // $insert->Weight = $item['Weight'];
                //     // $insert->BagCapacity = $item['BagCapacity'];
                //     // $insert->PrintArea = $item['PrintArea'];
                //     // $insert->Embroidery = $item['Embroidery'];
                //     // $insert->Dimensions = $item['Dimensions'];
                //     // $insert->SizeRange = $item['SizeRange'];
                //     // $insert->SizeDescription = $item['SizeDescription'];
                //     // $insert->SizeInfo = $item['SizeInfo'];
                //     // $insert->SupplierCode = $item['SupplierCode'];
                //     // $insert->DirectoryPageNumber = $item['DirectoryPageNumber'];
                //     // $insert->PrimaryImage = $item['PrimaryImage'];
                //     // $insert->ColourCode = $item['ColourCode'];
                //     // $insert->ColourName = $item['ColourName'];
                //     // $insert->PrimaryColour = $item['PrimaryColour'];
                //     // $insert->ColourImage = $item['ColourImage'];
                //     // $insert->Alpha = $item['Alpha'];
                //     // $insert->SizeCode = $item['SizeCode'];
                //     // $insert->WebSize = $item['WebSize'];
                //     // $insert->SingleQuantity = isset($item['SingleQuantity']) ? $item['SingleQuantity'] : null;
                //     // $insert->CartonQty = $item['CartonQty'];
                //     // $insert->PackQty = $item['PackQty'];
                //     // $insert->VatCode = $item['VatCode'];
                //     // $insert->CartonPrice = $item['CartonPrice'];
                //     // $insert->PackPrice = $item['PackPrice'];
                //     // $insert->SinglePrice = $item['SinglePrice'];
                //     // $insert->SkuStatus = $item['SkuStatus'];
                //     // $insert->WeightKG = $item['WeightKG'];
                //     // $insert->CommodityCode = $item['CommodityCode'];
                //     // $insert->CountryOfOrigin = $item['CountryOfOrigin'];
                //     // $insert->date = $item[''];
                //     // $insert->save();
            }

            // $this->data->update(array('SkuCode'=>$item['SKU']),"product2",array('SingleQuantity'=>$item['Quantity']));
            $data[] = $item;
        }
        fclose($file);
        echo "Uploaded";
    }

    public function faq()
    {
        return view('web.faq');
    }


    public function about()
    {
        return view('web.about');
    }

    public function contact()
    {
        return view('web.contact');
    }

    public function blog()
    {
        return view('web.blogs');
    }
}
