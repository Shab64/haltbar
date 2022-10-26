<?php

namespace App\Http\Controllers;

use App\Models\RalawisePricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    function index()
    {
        return view('web.cart');
    }

    //Add to Cart
    function addToCart(Request $request)
    {
        unset($request['_token']);

        $product = DB::table('product_styles')
            ->join('product_sizes', 'product_styles.code', '=', 'product_sizes.product_style_code')
            ->join('product_images', 'product_styles.code', '=', 'product_images.product_style_code')
            ->select('product_styles.*', 'product_sizes.single_list_price', 'product_images.image_url')
            ->where('product_styles.code', $request['productID'])->groupBy('product_styles.code')->get()->first();

        //session()->flush('cart');
        $cart = session()->get('cart');

        $ralawiseCharges = RalawisePricing::all();
        foreach ($request['sizesQty'] as $size) {
            $sizeQTY = preg_split('#(?<=\d)(?=[a-z])#i', $size);

            foreach ($sizeQTY as $qty) {
                foreach ($ralawiseCharges as $charges) {
                    if ($qty[0] >= $charges['quantity_from'] && $qty[0] <= $charges['quantity_to']) {
                        $singlePrice = round($product->single_list_price * $charges['service_charges_pp'], 2);
                        $discountedPrice = round($singlePrice - ($singlePrice / 100 * $charges['discount_per_percent']), 2);
                        $totalPrice = round($discountedPrice * $qty[0], 2);
                    }
                }
            }

            if (isset($cart[$product->code . '-' . $sizeQTY[1] . '-' . $request['color']])) {
                $cart[$product->code . '-' . $sizeQTY[1] . '-' . $request['color']]['qty'] += $sizeQTY[0];
                $cart[$product->code . '-' . $sizeQTY[1] . '-' . $request['color']]['item_total'] += $totalPrice;
            } else {
                $cart[$product->code . '-' . $sizeQTY[1] . '-' . $request['color']] = [
                    "product_name" => $product->title,
                    "qty" => $sizeQTY[0],
                    "size" => $sizeQTY[1],
                    "color" => $request['color'],
                    "item_total" => $totalPrice,
                    "image" => !empty($request['image']) ? $request['image'] : $product->image_url,
                ];
            }
        }

        session()->put('cart', $cart);

        return response([
            'sessionData' => session()->all()
        ]);
    }

    //Update Cart
    function updateCart(Request $request)
    {
        if ($request->product_id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->product_id]["qty"] = $request->quantity;
            $cart[$request->product_id]["item_total"] = $request->quantity * $cart[$request->product_id]['price'];
            session()->put('cart', $cart);
            return response()->json(session()->all());
        }
    }

    //Remove Item From Cart
    function removeFromCart(Request $request)
    {
        if ($request->product_id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->product_id])) {
                unset($cart[$request->product_id]);
                session()->put('cart', $cart);
            }
            return response()->json(session()->all());
        }
    }


    function add_customization(Request $request){
        var_dump($request->all());
        $checkSession = session()->get('cart');
        if($files=$request->file('logo')){
            $name=$files->getClientOriginalName();
            $files->move('customization_images',$name);
            $request['my_logo']=$name;
            $request->offsetUnset('logo');
        }

        if (array_key_exists($request['item_code'],$checkSession)){
            $checkSession[$request['item_code']]['customization'][]=$request->except('logo');
            session()->put('cart', $checkSession);
        }
        return 'success';
    }

    function customization_modal(Request $request){
        $k=$request->sessionKey;
        $used_positions = json_decode($request->used_postions,true);
        $print = ['leftchest','centerchest','insideneck','largebackA3','largebackA4','largefrontA3','largefrontA4','leftsleeves','leftthigh','cap','mask','napeofneck','rightchest','rightsleeves','rightthigh','specifynotes'];
        ?>
        <div class="modal fade"  id="exampleModal" tabindex="-1"  data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="btn-close" onclick="closeModal(this)" ></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="post" class="customization_form">
                            <div class="step-app demo" id="demo">
                                <ul class="step-steps">
                                    <li data-step-target="step1">1. Position</li>
                                    <li data-step-target="step2">2. Application</li>
                                    <li data-step-target="step3">3. Choose Artwork</li>
                                    <li data-step-target="step4">4. Type</li>
                                    <li data-step-target="step5">5. Edit Artwork</li>
                                </ul>

                                <div class="step-content pt-3">

                                    <div class="step-tab-panel" data-step="step1">
                                        <div class="container">
                                            <div class="row" id="activate">
                                                <div class="container">
                                                    <div class="row" id="activate">


                                                        <?php foreach($print as $p){ ?>
                                                        <div class="col-lg-4 mt-3 ">
                                                            <div class="card step-card currrent <?=(!in_array($p,$used_positions[$k])) ? "image-checkbox" : "disabled_image-checkbox"?> ">
                                                            <div class="step-img">
                                                                <a>
                                                                    <img src="<?= asset('public/assets/fahad/images/'.$p.'.png') ?>">
                                                                    <input <?=(in_array($p,$used_positions[$k])) ? "disabled" : ""?> type="checkbox" class="selected_postion" name="position[]" value="<?=$p?>"/>
                                                                    <input type="hidden" name="item_code" value="<?=$k?>"/>
                                                                    <i class="fa fa-check hidden"></i>
                                                                </a>
                                                            </div>
                                                            <div class="labels">
                                                                <p><i class="ecicon eci-print pr-2"></i>Print Available</p>
                                                                <p><i class="ecicon eci-pencil pr-2"></i>Embroidery Available</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="step-tab-panel pt-2" data-step="step2" >
                                    <div class="container activate5" id="activate5">
                                        <div class="card step-card">
                                            <div class="col-lg-12 currrent5 active25" >
                                                <div class="row">
                                                    <label class="col-md-6 radio-img" style="margin-bottom: 0;">
                                                        <input type="radio"  class="selected_layout" checked="checked" name="layout[]" value="embroidery" />
                                                        <div class="radio_image" style="background-image: url(https://www.workwearexpress.com/dist/newEmbroidery.8464d3853cc83a58deb67344d79a7a1b.png); width: 100%;"></div>
                                                    </label>
                                                    <div class="col-md-6 p-3">
                                                        <span><b>Embroidery</b>(Stitching)</span>
                                                        <p>Embroidery (or stitching) is detailed and durable which is better suited to uniforms.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card step-card mt-4 ">
                                            <div class="col-lg-12 currrent5">
                                                <div class="row">
                                                    <label class="col-md-6 radio-img" style="margin-bottom: 0;">
                                                        <input type="radio"  class="selected_layout" name="layout[]" value="print" />
                                                        <div class="radio_image" style="background-image: url(https://www.workwearexpress.com/dist/newPrint.f80e277580b052b2dc896165e4c74ffb.png); width: 100%;"></div>
                                                    </label>
                                                    <div class="col-md-6 pt-3">
                                                        <span><b>Print</b></span>
                                                        <p>The print application method is both vivid and flexible, ideal for general use.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-tab-panel" data-step="step3">
                                    <div class="col-lg-12 mb-5">
                                        <div class="chooseartwork mb-5">
                                            <div class="d-flex justify-content-center">
                                                <div class="choose-content step-footer">
                                                    <button data-step-action="next" class="step-btn btn btn-primary">Add New Logo</button>
                                                </div>
                                            </div>
                                            <h6 style="color: #000;"><b style="color: #3cb371;">£8.95</b> one-time new logo setup cost</h6>
                                            <p>This cost includes the full digitisation of your logo. Don't worry how it looks when it's uploaded, we will send a proof before we begin production!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-tab-panel" data-step="step4">
                                    <div class="container">
                                        <div class="radio activates" id="activates">
                                            <input type="radio" class="currrent1 active21" label="Logo"  name="cus_type" value="Logo" checked="checked">
                                            <img src="<?= asset('public/assets/gallery.png') ?>" alt="logo" class="logo-img">

                                            <input type="radio" class="currrent1" label="Text"  name="cus_type" value="Text" style="margin-top: 20px;">
                                            <img src="<?= asset('public/assets/text.png') ?>" alt="text" class="text-img">
                                        </div>
                                    </div>
                                </div>
                                <div class="step-tab-panel" data-step="step5">
                                    <div id="activat" class="activat">
                                            <div class="accordion" id="accordionExample">
                                                <div class="accordion-item ">
                                                    <div for='r11' class="accordion-header currrent2 active22" id="headingOne">
                                                        <input type='radio' id='r11' checked="checked"  name='is_logo' label="Upload your own logo" value='yes' required class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" />
                                                    </div>
                                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <div class="input-images" id="input-file-now" style="width: 100%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-3 mb-3 text-center ">
                                                <span><b>alternatively...</b></span>
                                            </div>

                                            <div class="card step-card radio5 col-lg-12 p-4 text-center currrent2 mb-5">
                                                <input type='radio' id='r11' name='is_logo'  value="no" label="Don't have your logo to hand? Don't worry, select here and we will contact after you place your order." />
                                            </div>


                                            <label><b>Notes</b></label>
                                            <textarea id="text_notes2" name="note" rows="4" cols="50" class="card step-card" placeholder="Please let us know if you have any special requirements"></textarea>

                                    </div>
                                    <!-- Text -->
                                    <div id="if_text" class="if_text">

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label mt-2">Text 1</label>
                                            <input name="text_one" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            <label for="exampleInputEmail1" class="form-label mt-2">Text 2 (OPTIONAL)</label>
                                            <input name="text_two" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            <label for="exampleInputEmail1" class="form-label mt-2">Text 3 (OPTIONAL)</label>
                                            <input name="text_three" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select class="form-select" id="fontFamilySelect" name="font">
                                                    <option value="">Select</option>
                                                    <option disabled style="font-weight: bold; background-color: #EEEEEE">Serif Fonts</option>
                                                    <option value="Georgia,serif" style="font-family: Georgia,serif">Georgia</option>
                                                    <option value="Palatino Linotype,Book Antiqua,Palatino,serif" style="font-family: Palatino Linotype,Book Antiqua,Palatino,serif">Palatino Linotype</option>
                                                    <option value="Times New Roman,Times,serif" style="font-family: Times New Roman,Times,serif">Times New Roman</option>
                                                    <option disabled style="font-weight: bold; background-color: #EEEEEE">Sans-Serif Fonts</option>
                                                    <option value="Arial,Helvetica,sans-serif" style="font-family: Arial,Helvetica,sans-serif">Arial</option>
                                                    <option value="Arial Black,Gadget,sans-serif" style="font-family: Arial Black,Gadget,sans-serif">Arial Black</option>
                                                    <option value="Comic Sans MS,cursive,sans-serif" style="font-family: Comic Sans MS,cursive,sans-serif">Comic Sans MS</option>
                                                    <option value="Impact,Charcoal,sans-serif" style="font-family: Impact,Charcoal,sans-serif">Impact</option>
                                                    <option value="Lucida Sans Unicode,Lucida Grande,sans-serif" style="font-family: Lucida Sans Unicode,Lucida Grande,sans-serif">Lucida Sans Unicode</option>
                                                    <option selected="selected" value="Tahoma,Geneva,sans-serif" style="font-family: Tahoma,Geneva,sans-serif">Tahoma</option>
                                                    <option value="Trebuchet MS,Helvetica,sans-serif" style="font-family: Trebuchet MS,Helvetica,sans-serif">Trebuchet MS</option>
                                                    <option value="Verdana,Geneva,sans-serif" style="font-family: Verdana,Geneva,sans-serif">Verdana</option>
                                                    <option disabled style="font-weight: bold; background-color: #EEEEEE">Monospace Fonts</option>
                                                    <option value="Courier New,Courier,monospace" style="font-family: Courier New,Courier,monospace">Courier New</option>
                                                    <option value="Lucida Console,Monaco,monospace" style="font-family: Lucida Console,Monaco,monospace">Lucida Console</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="color" name="colour" class="form-control-color" id="exampleColorInput" value="#563d7c" title="Choose your color">

                                            </div>
                                        </div>
                                        <h6 class="mt-3" style="font-weight: 800;">Text Preview:</h6>
                                        <div class="mb-4" id="ctm_textpreview">
                                            <p class="one">One</p>
                                            <p class="two">Two</p>
                                            <p class="three">Three</p>
                                        </div>

                                            <label><b>Notes</b></label>
                                            <textarea id="text_notes" name="note" rows="4" cols="50" class="card step-card" placeholder="Please let us know if you have any special requirements"></textarea>

                                    </div>
                                </div>

                            </div>

                            <div class="step-footer">
                                <button data-step-action="prev" class="step-btn btn">Back</button>
                                <button data-step-action="next" class="step-btn btn btn-primary">Next</button>
                                <button data-step-action="finish" class="step-btn btn btn-primary">Confirm</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    <?php }
}
