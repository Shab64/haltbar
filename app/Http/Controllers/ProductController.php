<?php

namespace App\Http\Controllers;

use App\Classes\ProductsHelper;
use App\Models\Product_Style;
use App\Models\Ralawise;
use App\Models\RalawisePricing;
use App\Models\Uneek;
use App\Models\UneekPricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToArray;

class ProductController extends Controller
{
    function index()
    {
        $uneek_ByCodes = Uneek::select('Product_Code')->groupBY('Product_Code')->skip(0)->take(10)->get()->toArray();
        if (!empty($uneek_ByCodes)) {
            foreach ($uneek_ByCodes as $code) {
                $uneek[] = Uneek::select('Product_Code', 'id', 'Product_Name', 'type', 'Model_Small_Image', 'Model_Large_Image', 'Price_Single')->where('Product_Code', $code['Product_Code'])->first()->toArray();
            }
        }

        $ralawise_ByCodes = Ralawise::select('ProductGroup')->groupBY('ProductGroup')->skip(0)->take(11)->get()->toArray();
        if (!empty($ralawise_ByCodes)) {
            foreach ($ralawise_ByCodes as $code2) {
                $ralawise[] = Ralawise::select('ProductGroup', 'id', 'Brand', 'ProductName', 'type', 'PrimaryImage', 'SinglePrice', 'ColourImage')->where('ProductGroup', $code2['ProductGroup'])->first()->toArray();
            }
        }
        $get_products = array_merge($ralawise, $uneek);
        $data['products'] = ProductsHelper::shuffle_assoc($get_products);

        $uneek_total = Uneek::select('*')->get()->unique('Product_Code')->toArray();
        $ralawise_total = Ralawise::select('*')->get()->unique('ProductGroup')->toArray();
        $get_total_products = array_merge($ralawise_total, $uneek_total);

        //total Size to break into
        $data['total_size'] = count($get_total_products);

        $data['ralawise_pricing'] = json_decode(RalawisePricing::get()->first(), true);
        $data['ralawise_pricing_last'] = json_decode(RalawisePricing::get()->last(), true);
        $data['uneek_pricing'] = json_decode(UneekPricing::get()->first(), true);
        $data['uneek_pricing_last'] = json_decode(UneekPricing::get()->last(), true);
        return view('web.products', $data);
    }
    function filter_by(Request $request)
    {
        $WHERE_RALAWISE = 'where ';
        $WHERE_UNEEK = 'where ';
        $SIZE_RALAWISE = '';
        $SIZE_UNEEK = '';
        $FABRIC_RALAWISE = '';
        $FABRIC_UNEEK = '';
        $CATEGORY_RALAWISE = '';
        $CATEGORY_UNEEK = '';
        $PRICE_RALAWISE = '';
        $PRICE_UNEEK = '';
        $BRAND_RALAWISE = '';
        $BRAND_UNEEK = '';
        $UNEEK_LIMIT = '';
        $RALAWISE_LIMIT = '';
        $ralawise = [];
        $uneek = [];
        //checking if user asked for both the suppliers
        $request->supplier = 'both';

        $request->fromRange = (!empty($result->fromRange)) ? $request->fromRange : 0;
        $request->limit = (!empty($result->limit)) ? $request->limit : 21;

        if (!empty($request->size)) {
            foreach ($request->size as $sizes) {
                $SIZE_RALAWISE .= "SizeCode =" . '"' . $sizes . '"' . ' OR ';
                $SIZE_UNEEK .= "Size =" . '"' . $sizes . '"' . ' OR ';
            }
            $SIZE_RALAWISE = '(' . substr($SIZE_RALAWISE, 0, -4) . ')';
            $SIZE_UNEEK = '(' . substr($SIZE_UNEEK, 0, -4) . ')';
            $WHERE_RALAWISE .= $SIZE_RALAWISE;
            $WHERE_UNEEK .= $SIZE_UNEEK;
        }

        if (!empty($request->brand)) {
            foreach ($request->brand as $brands) {
                $BRAND_RALAWISE .= "Brand =" . '"' . $brands . '"' . ' OR ';
                $BRAND_UNEEK .= "Company_Name =" . '"' . $brands . '"' . ' OR ';
            }
            $BRAND_RALAWISE = '(' . substr($BRAND_RALAWISE, 0, -4) . ')';
            $BRAND_UNEEK = '(' . substr($BRAND_UNEEK, 0, -4) . ')';
            $WHERE_RALAWISE .= $BRAND_RALAWISE;
            $WHERE_UNEEK .= $BRAND_UNEEK;
        }

        if (!empty($request->fabric)) {
            foreach ($request->fabric as $fabrics) {
                $FABRIC_RALAWISE .= "Fabric LIKE '%$fabrics%'" . ' OR ';
                $FABRIC_UNEEK .= "Composition LIKE '%$fabrics%'" . ' OR ';
            }
            $FABRIC_RALAWISE = '(' . substr($FABRIC_RALAWISE, 0, -4) . ')';
            $FABRIC_UNEEK = '(' . substr($FABRIC_UNEEK, 0, -4) . ')';
            $WHERE_RALAWISE .= $FABRIC_RALAWISE;
            $WHERE_UNEEK .= $FABRIC_UNEEK;
        }
        if (!empty($request->category)) {
            foreach ($request->category as $cat) {
                $CATEGORY_RALAWISE .= "PrimaryCategory =" . '"' . $cat . '"' . ' OR ';
                if ($cat === 'Polos') {
                    $cat = 'POLOSHIRT';
                } elseif ($cat === 'SweatShirts') {
                    $cat = 'SWEATSHIRT';
                } elseif ($cat === 'T-Shirts') {
                    $cat = 'TSHIRTS';
                } elseif ($cat === 'Jackets') {
                    $cat = 'JACKETS';
                } elseif ($cat === 'Vests') {
                    $cat = 'Vests';
                } elseif ($cat === 'Caps') {
                    $cat = 'Caps';
                } elseif ($cat === 'Rain Suits') {
                    $cat = 'HIVIZ';
                } elseif ($cat === 'Hoodies') {
                    $cat = 'Hoodies';
                } elseif ($cat === 'Body Warmer') {
                    $cat = '';
                } elseif ($cat === 'Kids') {
                    $cat = 'CHILDRENS';
                } elseif ($cat === 'Tabards') {
                    $cat = '';
                } elseif ($cat === 'Sweatpants') {
                    $cat = '';
                } elseif ($cat === 'Snoods') {
                    $cat = '';
                } elseif ($cat === 'Shorts') {
                    $cat = '';
                } elseif ($cat === 'Shirts') {
                    $cat = 'SHIRTS';
                } elseif ($cat === 'Safety Vests') {
                    $cat = '';
                } elseif ($cat === 'PPE') {
                    $cat = 'PPE';
                } elseif ($cat === 'Masks') {
                    $cat = '';
                } elseif ($cat === 'Hats') {
                    $cat = '';
                } elseif ($cat === 'Blouses') {
                    $cat = '';
                }

                $CATEGORY_UNEEK .= "Category =" . '"' . $cat . '"' . ' OR ';
            }
            $CATEGORY_RALAWISE = '(' . substr($CATEGORY_RALAWISE, 0, -4) . ')';
            $CATEGORY_UNEEK = '(' . substr($CATEGORY_UNEEK, 0, -4) . ')';
            $WHERE_RALAWISE .= $CATEGORY_RALAWISE;
            $WHERE_UNEEK .= $CATEGORY_UNEEK;
        }
        if (!empty($request->price[0])) {
            foreach ($request->price[0] as $prices) {
                $PRICE_RALAWISE .= $prices . ' and ';
                $PRICE_UNEEK .= $prices . ' and ';
            }
            $PRICE_RALAWISE = '(SinglePrice BETWEEN ' . substr($PRICE_RALAWISE, 0, -5) . ')';
            $PRICE_UNEEK = '(Price_Single BETWEEN ' . substr($PRICE_UNEEK, 0, -5) . ')';
            $WHERE_RALAWISE .= $PRICE_RALAWISE;
            $WHERE_UNEEK .= $PRICE_UNEEK;
        }
        $WHERE_RALAWISE = str_replace(')(', ') and (', $WHERE_RALAWISE);
        $WHERE_UNEEK = str_replace(')(', ') and (', $WHERE_UNEEK);

        if ($WHERE_UNEEK === 'where ' and $WHERE_RALAWISE === 'where ') {
            $WHERE_UNEEK = '';
            $WHERE_RALAWISE = '';

            $UNEEK_LIMIT = 'limit 10';
            $RALAWISE_LIMIT = 'limit 11';
        }
        //query

        $ralawise = DB::select("SELECT `id`,`ProductGroup`,`PrimaryCategory`,`Brand`,`ProductName`,`type`,`PrimaryImage`,`SinglePrice`,`ColourImage` from `product2` $WHERE_RALAWISE GROUP BY ProductGroup");
        $uneek = DB::select("SELECT `id`,`Product_Code`,`Model_Large_Image`,`Category`,`Product_Name`,`type`,`Model_Small_Image`,`Price_Single` from `uneek` $WHERE_UNEEK GROUP BY Product_Code");
        //        $uneekData = DB::select("SELECT `Product_Code` from `uneek` $WHERE_UNEEK GROUP BY Product_Code $UNEEK_LIMIT");
        //        if (!empty($uneekData)){
        //            foreach ($uneekData as $u){
        //                $uneek[] = DB::select("SELECT `id`,`Product_Code`,`Model_Large_Image`,`Category`,`Product_Name`,`type`,`Model_Small_Image`,`Price_Single` from `uneek` where Product_Code ='{$u->Product_Code}' LIMIT 1");
        //            }
        //        }
        //
        //        $ralawiseData = DB::select("SELECT `ProductGroup` from `product2`  $WHERE_RALAWISE GROUP BY ProductGroup $RALAWISE_LIMIT");
        //        if (!empty($ralawiseData)){
        //            foreach ($ralawiseData as $u){
        //                $ralawise[] = DB::select("SELECT `id`,`ProductGroup`,`PrimaryCategory`,`Brand`,`ProductName`,`type`,`PrimaryImage`,`SinglePrice`,`ColourImage` from `product2` where ProductGroup ='{$u->ProductGroup}' LIMIT 1");
        //            }
        //        }
        //end

        $result = array_merge($ralawise, $uneek);
        $data['total_size'] = count($result);

        $products = ProductsHelper::shuffle_assoc($result);

        $data['products'] = array_slice($products, $request->fromRange, $request->limit);
        $data['ralawise_pricing'] = json_decode(RalawisePricing::get()->first(), true);
        $data['ralawise_pricing_last'] = json_decode(RalawisePricing::get()->last(), true);
        $data['uneek_pricing'] = json_decode(UneekPricing::get()->first(), true);
        $data['uneek_pricing_last'] = json_decode(UneekPricing::get()->last(), true);
        if (isset($request->fromRange)) {
            //from Size

            $data['from_size'] = $request->fromRange;
            $data['to_size'] = $request->fromRange + sizeof($data['products']);
        }
        return json_encode($data);
    }
    function filter_search()
    {
        // $ralawise = DB::select("SELECT `id`,`ProductGroup`,`PrimaryCategory`,`Brand`,`ProductName`,`type`,`PrimaryImage`,`SinglePrice`,`ColourImage` from `product2` where `ProductName` LIKE '%{$_GET['s']}%' or `ProductGroup` LIKE '%{$_GET['s']}%' or `PrimaryCategory` LIKE '%{$_GET['s']}%' or `type` LIKE '%{$_GET['s']}%' GROUP BY ProductGroup");
        $ralawise =
            DB::select("SELECT product_styles.*, product_sizes.single_list_price, product_images.image_url
            FROM product_styles 
            JOIN product_sizes on product_styles.code = product_sizes.product_style_code
            JOIN product_images on product_styles.code = product_images.product_style_code
            where product_styles.title like '%{$_GET['s']}%' or product_styles.code LIKE '%{$_GET['s']}%' or product_styles.product_type LIKE '%{$_GET['s']}%' or product_styles.brand LIKE '%{$_GET['s']}%'
            GROUP BY product_styles.code");

        $uneek = DB::select("SELECT `id`,`Product_Code`,`Model_Large_Image`,`Category`,`Product_Name`,`type`,`Model_Small_Image`,`Price_Single` from `uneek`  where `Product_Name` LIKE '%{$_GET['s']}%' or `Product_Code` LIKE '%{$_GET['s']}%' or `Category` LIKE '%{$_GET['s']}%' or `Company_Name` LIKE '%{$_GET['s']}%' GROUP BY Product_Code");
        // $ralawise = json_decode(json_encode($ralawise), true);
        // $uneek = json_decode(json_encode($uneek), true);
        // $get_products = array_merge($uneek, $ralawise);
        // $products = ProductsHelper::shuffle_assoc($get_products);
        // $data['products'] = array_slice($products, 0, 21);
        //total Size to break into

        $uneek = collect($uneek);
        $ralawise = collect($ralawise);

        $data['products'] = $ralawise->merge($uneek)->paginate(21);

        $data['total_size'] = count($data['products']);
        $data['ralawise_pricing'] = json_decode(RalawisePricing::get()->first(), true);
        $data['ralawise_pricing_last'] = json_decode(RalawisePricing::get()->last(), true);
        $data['uneek_pricing'] = json_decode(UneekPricing::get()->first(), true);
        $data['uneek_pricing_last'] = json_decode(UneekPricing::get()->last(), true);
        $data['brands'] = Product_Style::select('brand')->groupBy('brand')->get()->toArray();
        return view('web.search', $data);
    }
    function ProductsCategory($cat)
    {
        if ($cat === 'Polos') {
            $uneek_cat = 'POLOSHIRT';
        } elseif ($cat === 'SweatShirts') {
            $uneek_cat = 'SWEATSHIRT';
        } elseif ($cat === 'T-Shirts') {
            $uneek_cat = 'TSHIRTS';
        } elseif ($cat === 'Jackets') {
            $uneek_cat = 'JACKETS';
        } elseif ($cat === 'Vests') {
            $uneek_cat = 'Vests';
        } elseif ($cat === 'Caps') {
            $uneek_cat = 'Caps';
        } elseif ($cat === 'Rain Suits') {
            $uneek_cat = 'HIVIZ';
        } elseif ($cat === 'Hoodies') {
            $uneek_cat = 'Hoodies';
        }
        $uneek = [];
        $ralawise = [];
        $uneek_ByCodes = Uneek::select('Product_Code')->groupBY('Product_Code')->where('Category', $uneek_cat)->get()->toArray();
        if (!empty($uneek_ByCodes)) {
            foreach ($uneek_ByCodes as $code) {
                $uneek[] = Uneek::select('Product_Code', 'id', 'Product_Name', 'type', 'Model_Small_Image', 'Model_Large_Image', 'Price_Single')->where('Product_Code', $code['Product_Code'])->first()->toArray();
            }
        }

        $ralawise_ByCodes = Ralawise::select('ProductGroup')->groupBY('ProductGroup')->where('PrimaryCategory', $cat)->get()->toArray();
        if (!empty($ralawise_ByCodes)) {
            foreach ($ralawise_ByCodes as $code2) {
                $ralawise[] = Ralawise::select('ProductGroup', 'id', 'Brand', 'ProductName', 'type', 'PrimaryImage', 'SinglePrice', 'ColourImage')->where('ProductGroup', $code2['ProductGroup'])->first()->toArray();
            }
        }
        $get_products = array_merge($ralawise, $uneek);
        $products = ProductsHelper::shuffle_assoc($get_products);
        $data['products'] = array_slice($products, 0, 21);
        //total Size to break into
        $data['total_size'] = count($get_products);
        $data['ralawise_pricing'] = json_decode(RalawisePricing::get()->first(), true);
        $data['ralawise_pricing_last'] = json_decode(RalawisePricing::get()->last(), true);
        $data['uneek_pricing'] = json_decode(UneekPricing::get()->first(), true);
        $data['uneek_pricing_last'] = json_decode(UneekPricing::get()->last(), true);
        $data['brands'] = Ralawise::select('Brand')->groupBy('Brand')->get()->toArray();
        return view('web.products_by_category', $data);
    }

    function productsFilter($name)
    {
        if (!empty(request()->g)) {
            $values = parse_url(request()->g);
        } else if (!empty(request()->brand)) {
            $brand = request()->brand;
        } else if (!empty(request()->fabric)) {
            $fabric = request()->fabric;
        } else if (!empty(request()->attr)) {
            $attribute = request()->attr;
        }

        if (!empty($values['query'])) {
            $like = substr($values['query'], 2);
        }
        if (!empty($values['path'])) {
            $gender = $values['path'];
        }

        if (!empty($gender) && !empty($like)) {
            $ralawise = DB::table('product_styles')
                ->join('product_sizes', 'product_styles.code', '=', 'product_sizes.product_style_code')
                ->join('product_images', 'product_styles.code', '=', 'product_images.product_style_code')
                ->join('product_suggested_categories', 'product_styles.code', '=', 'product_suggested_categories.product_style_code')
                ->where('gender', $gender)
                ->where('product_suggested_categories.title', 'like', '%' . $like . '%')
                ->select('product_styles.*', 'product_sizes.single_list_price', 'product_images.image_url')
                ->groupBy('product_styles.code')->get();

            //Uneek Data
            $gender = str_replace(['Mens', 'Ladies', 'Kids'], ["Men's", "Women's", "Children"], $gender);
            $uneek = DB::table('uneek')
                ->where('Full_Description', 'like', '%' . $like . '%')
                ->where('Gender', $gender)
                ->groupBy('Product_Code')
                ->get();
        } else if (!empty($like) && $name == '-') {
            $ralawise = DB::table('product_styles')
                ->join('product_sizes', 'product_styles.code', '=', 'product_sizes.product_style_code')
                ->join('product_images', 'product_styles.code', '=', 'product_images.product_style_code')
                ->join('product_suggested_categories', 'product_styles.code', '=', 'product_suggested_categories.product_style_code')
                ->where('product_suggested_categories.title', 'like', '%' . $like . '%')
                ->select('product_styles.*', 'product_sizes.single_list_price', 'product_images.image_url')
                ->groupBy('product_styles.code')->get();

            //Uneek Data
            $uneek = DB::table('uneek')
                ->where('Full_Description', 'like', '%' . $like . '%')
                ->groupBy('Product_Code')
                ->get();
        } else if ($name != '-' && !empty($like)) {
            $ralawise = DB::table('product_styles')
                ->join('product_sizes', 'product_styles.code', '=', 'product_sizes.product_style_code')
                ->join('product_images', 'product_styles.code', '=', 'product_images.product_style_code')
                ->join('product_suggested_categories', 'product_styles.code', '=', 'product_suggested_categories.product_style_code')
                ->where('product_suggested_categories.title', 'like', '%' . $like . '%')
                ->where('product_type', $name)
                ->select('product_styles.*', 'product_sizes.single_list_price', 'product_images.image_url')
                ->groupBy('product_styles.code')->get();

            //Uneek Data
            $name = str_replace('T-Shirt', 'TSHIRTS', $name);
            $uneek = DB::table('uneek')
                ->where('Category', 'like', '%' . $name . '%')
                ->where('Full_Description', 'like', '%' . $like . '%')
                ->groupBy('Product_Code')
                ->get();
        } else if (!empty($gender)) {
            $ralawise = DB::table('product_styles')
                ->join('product_sizes', 'product_styles.code', '=', 'product_sizes.product_style_code')
                ->join('product_images', 'product_styles.code', '=', 'product_images.product_style_code')
                ->where('gender', $gender)
                ->where('product_type', $name)
                ->select('product_styles.*', 'product_sizes.single_list_price', 'product_images.image_url')
                ->groupBy('product_styles.code')->get();

            //Uneek Data
            $name = str_replace('T-Shirt', 'TSHIRTS', $name);
            $gender = str_replace(['Mens', 'Ladies', 'Kids'], ["Men's", "Women's", "Children"], $gender);
            $uneek = DB::table('uneek')
                ->where('Category', 'like', '%' . $name . '%')
                ->where('Gender', $gender)
                ->groupBy('Product_Code')
                ->get();
        } else if (!empty($brand)) {
            $ralawise = DB::table('product_styles')
                ->join('product_sizes', 'product_styles.code', '=', 'product_sizes.product_style_code')
                ->join('product_images', 'product_styles.code', '=', 'product_images.product_style_code')
                ->where('brand', $brand)
                ->where('product_type', $name)
                ->select('product_styles.*', 'product_sizes.single_list_price', 'product_images.image_url')
                ->groupBy('product_styles.code')->get();

            //Uneek Data
            if ($brand == 'uneek') {
                $name = str_replace('T-Shirt', 'TSHIRTS', $name);
                $uneek = DB::table('uneek')
                    ->where('Category', 'like', '%' . $name . '%')
                    ->groupBy('Product_Code')
                    ->get();
            } else {
                $uneek = null;
            }
        } else if (!empty($fabric)) {
            $ralawise = DB::table('product_styles')
                ->join('product_sizes', 'product_styles.code', '=', 'product_sizes.product_style_code')
                ->join('product_images', 'product_styles.code', '=', 'product_images.product_style_code')
                ->join('product_colourways', 'product_styles.code', '=', 'product_colourways.product_style_code')
                ->where('product_colourways.material', $fabric)
                ->where('product_type', $name)
                ->select('product_styles.*', 'product_sizes.single_list_price', 'product_images.image_url')
                ->groupBy('product_styles.code')->get();

            //Uneek Data
            $fabric = str_replace('.', '', $fabric);
            $name = str_replace('T-Shirt', 'TSHIRTS', $name);
            $uneek = DB::table('uneek')
                ->where('Category', 'like', '%' . $name . '%')
                ->where('Composition', 'like', '%' . $fabric . '%')
                ->groupBy('Product_Code')
                ->get();
        } else if (!empty($attribute)) {
            $ralawise = DB::table('product_styles')
                ->join('product_sizes', 'product_styles.code', '=', 'product_sizes.product_style_code')
                ->join('product_images', 'product_styles.code', '=', 'product_images.product_style_code')
                ->join('product_attributes', 'product_styles.code', '=', 'product_attributes.product_style_code')
                ->where('product_attributes.body', 'like', '%' . $attribute . '%')
                ->where('product_type', $name)
                ->select('product_styles.*', 'product_sizes.single_list_price', 'product_images.image_url')
                ->groupBy('product_styles.code')->get();

            //Uneek Data
            $name = str_replace('T-Shirt', 'TSHIRTS', $name);
            $uneek = DB::table('uneek')
                ->where('Category', 'like', '%' . $name . '%')
                ->where('Full_Description', 'like', '%' . $attribute . '%')
                ->groupBy('Product_Code')
                ->get();
        } else {
            $ralawise = DB::table('product_styles')
                ->join('product_sizes', 'product_styles.code', '=', 'product_sizes.product_style_code')
                ->join('product_images', 'product_styles.code', '=', 'product_images.product_style_code')
                ->where('product_type', $name)
                ->select('product_styles.*', 'product_sizes.single_list_price', 'product_images.image_url')
                ->groupBy('product_styles.code')->get();

            //Uneek Data
            $name = str_replace('T-Shirt', 'TSHIRTS', $name);
            $uneek = DB::table('uneek')
                ->where('Category', 'like', '%' . $name . '%')
                ->groupBy('Product_Code')
                ->get();
        }

        $data['products'] = $ralawise->merge($uneek)->paginate(21);

        $data['ralawise_pricing'] = json_decode(RalawisePricing::get()->first(), true);
        $data['ralawise_pricing_last'] = json_decode(RalawisePricing::get()->last(), true);
        $data['uneek_pricing'] = json_decode(UneekPricing::get()->first(), true);
        $data['uneek_pricing_last'] = json_decode(UneekPricing::get()->last(), true);
        $data['brands'] = Product_Style::select('brand')->groupBy('brand')->get()->toArray();
        return view('web.products_by_type', $data);
    }

    public function productSideFilter(Request $request)
    {
        // $this->validate($request, [
        //     'fab[]' => 'required',
        //     'size[]' => 'required',
        //     'brand[]' => 'required',
        // ]);

        //Size
        $Where_Ralawise = '';
        $Where_Uneek = '';
        $Size_Ralawise = '';
        $Size_Uneek = '';

        //Fabric
        $Fabric_Ralawise = '';
        $Fabric_Uneek = '';

        //Brand
        $Brand_Ralawise = '';
        $Brand_Uneek = '';

        if (!empty($request->size)) {
            foreach ($request->size as $sizes) {
                $Size_Ralawise .= "product_sizes.code =" . '"' . $sizes . '"' . ' OR ';
                $Size_Uneek .= "Size =" . '"' . $sizes . '"' . ' OR ';
            }
            $Size_Ralawise = '(' . substr($Size_Ralawise, 0, -4) . ')';
            $Size_Uneek = '(' . substr($Size_Uneek, 0, -4) . ')';
            $Where_Ralawise .= $Size_Ralawise;
            $Where_Uneek .= $Size_Uneek;
        }

        if (!empty($request->fab)) {
            foreach ($request->fab as $fabric) {
                $Fabric_Ralawise .= "product_colourways.material LIKE '%$fabric%'" . ' OR ';
                $Fabric_Uneek .= "Composition LIKE '%$fabric%'" . ' OR ';
            }
            $Fabric_Ralawise = '(' . substr($Fabric_Ralawise, 0, -4) . ')';
            $Fabric_Uneek = '(' . substr($Fabric_Uneek, 0, -4) . ')';
            $Where_Ralawise .= $Fabric_Ralawise;
            $Where_Uneek .= $Fabric_Uneek;
        }

        if (!empty($request->brand)) {
            foreach ($request->brand as $brands) {
                $Brand_Ralawise .= "brand =" . '"' . $brands . '"' . ' OR ';
                $Brand_Uneek .= "Company_Name =" . '"' . $brands . '"' . ' OR ';
            }
            $Brand_Ralawise = '(' . substr($Brand_Ralawise, 0, -4) . ')';
            $Brand_Uneek = '(' . substr($Brand_Uneek, 0, -4) . ')';
            $Where_Ralawise .= $Brand_Ralawise;
            $Where_Uneek .= $Brand_Uneek;
        }

        $Where_Ralawise = str_replace(')(', ') and (', $Where_Ralawise);
        $Where_Uneek = str_replace(')(', ') and (', $Where_Uneek);

        $uneek = DB::select("SELECT * FROM uneek where $Where_Uneek GROUP BY Product_Code");

        $ralawise = DB::select("SELECT product_styles.*, product_sizes.single_list_price, product_images.image_url
        FROM product_styles 
        JOIN product_sizes on product_styles.code = product_sizes.product_style_code
        JOIN product_images on product_styles.code = product_images.product_style_code
        JOIN product_colourways on product_styles.code = product_colourways.product_style_code
        JOIN product_suggested_categories on product_styles.code = product_suggested_categories.product_style_code
        where $Where_Ralawise GROUP BY product_styles.code");

        $uneek = collect($uneek);
        $ralawise = collect($ralawise);

        $data['products'] = $ralawise->merge($uneek)->paginate(21);

        $data['ralawise_pricing'] = json_decode(RalawisePricing::get()->first(), true);
        $data['ralawise_pricing_last'] = json_decode(RalawisePricing::get()->last(), true);
        $data['uneek_pricing'] = json_decode(UneekPricing::get()->first(), true);
        $data['uneek_pricing_last'] = json_decode(UneekPricing::get()->last(), true);
        $data['brands'] = Product_Style::select('brand')->groupBy('brand')->get()->toArray();
        return view('web.products_side_filter', $data);
    }
}
