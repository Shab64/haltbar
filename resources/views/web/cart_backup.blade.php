@include('web.header')
<?php //use Illuminate\Support\Facades\Session;$sub_total = 0; session::forget('cart','010M-XXL-Classic Red') ?>
<link rel="stylesheet" href="{{ asset('public/assets/fahad/style.css')}}" />
<link rel="stylesheet" href="{{ asset('public/assets/jquery-steps/examples/css/style.css')}}">
<link rel="stylesheet" href="{{ asset('public/assets/jquery-steps/dist/jquery-steps.css')}}">
<link rel="stylesheet" href="{{ asset('public/assets/image-uploader/imageuploader.css')}}">


<style>


    .form-select {
        border: 1px solid #CED4DA !important;
    }

    #ctm_textpreview {
        background-color: lightgray;
    }

    .step-card {
        box-shadow: 0 0 4px rgb(35 31 32 / 30%);
        cursor: pointer;
    }

    .step-card .step-img {
        text-align: center;
        padding: 20px;
    }

    .step-card .step-img img {
        height: 145px;

    }

    .step-card .labels {
        padding: 8px;
        background-color: #efefef;

    }

    .step-card .labels p {
        font-size: 11px;
        font-weight: 500;
        color: #000;
        margin-bottom: 0;

    }

    .step-card .labels p i {
        color: #fe6e10;
        margin-bottom: 0;
    }

    .active2 {
        border: 2px solid #666;

    }

    .active25 {
        border: 3px solid #EE8013;

    }

    .active21 {
        border: 3px solid #EE8013;

    }

    .active22 {
        border: 2px solid #EE8013;
    }

    .chooseartwork {
        float: left;
        clear: both;
        width: 100%;
        padding: 2rem 1.5rem;
        text-align: center;
        background: #efefef;
        border-radius: 7px;
        border: 3px solid #eee;
        transition: all 0.2s ease;
        user-select: none;


    }

    .choose-content {
        text-align: center;
        /* background-color: #3cb371; */

        padding: 10px;


    }

    .choose-content h5 {
        color: #fff;
        font-weight: 600;
        font-size: 18px;
    }


    .chooseartwork h6 {
        margin-top: 20px;
        color: #000;
        font-weight: 600;
        font-size: 14px;
    }

    .chooseartwork p {
        margin-top: 20px;
        color: #000;
        font-weight: 500;
        font-size: 12px;
    }

    .ec-checkout-del input {
        width: 10% !important;
        height: 20px !important;
        line-height: 0 !important;
    }

    .ec-checkout-del label {
        margin-bottom: 0 !important;
        font-size: 20px;
        font-weight: 500;

    }

    .multi-collapse {
        border-radius: 20px;
        width: 80% !important;
    }

    .slider1 {
        width: 80% !important;
    }

    @media screen and (max-width:991px) {
        .multi-collapse {

            width: 100% !important;
        }

        .slider1 {
            width: 100% !important;
        }
    }

    #cart .product {
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
    }

    #cart .product .product-details {
        align-items: center;
    }

    .artwork {
        margin-top: 20px;
    }

    .cart-qty-plus-minus .inc.ec_qtybtn:before {
        padding-top: 4px;
        content: "";
    }

    .cart-qty-plus-minus {
        border: 1px solid #ededed;
        display: inline-block;
        height: 35px;
        overflow: hidden;
        padding: 0;
        position: relative;
        width: 84px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        margin: 0 auto;
    }

    .cart-qty-plus-minus input {
        background: transparent none repeat scroll 0 0;
        border: medium none;
        color: #444444;
        float: left;
        font-size: 14px;
        height: auto;
        margin: 0;
        padding: 0;
        text-align: center;
        width: 40px;
        outline: none;
        font-weight: 600;
        line-height: 38px;
    }

    .cart-qty-plus-minus .ec_cart_qtybtn {
        color: #444444;
        float: left;
        font-size: 20px;
        height: auto;
        margin: 0;
        padding: 0;
        width: 40px;
        height: 38px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
    }

    .cart-qty-plus-minus .ec_qtybtn {
        width: 100%;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        cursor: pointer;
        font-size: 0;
        color: #444444;
        height: 19px;
        position: relative;
    }

    .cart-qty-plus-minus .ec_qtybtn:before {
        width: 100%;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        cursor: pointer;
        font-size: 20px;
        color: #444444;
        height: 19px;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        content: "";
        font-family: "EcIcons";
        overflow: hidden;
    }

    .cart-qty-plus-minus .dec.ec_qtybtn:before {
        padding-bottom: 4px;
        content: "";
    }

    .cart-qty-plus-minus .inc.ec_qtybtn:before {
        padding-top: 4px;
        content: "";
    }

    .product-line-price p {
        font-size: 12px;
    }

    .artwork span {
        font-size: 17px;
        color: #EE8013;
        font-weight: 500;
        padding-top: 20px;
        letter-spacing: -0.2px;
    }

    .ec-cart-pro-remove span i {
        color: #444444;
        font-size: 18px;
    }

    .ec-cart-summary-total .text-left {
        font-size: 14px !important;
        font-weight: 500 !important;
    }

    .ec-cart-summary .text-right a {
        color: #eb2629 !important;
        font-weight: 600 !important;
        font-size: 18px !important;
    }

    .ec-cart-pro-remove {
        margin-right: 20px;
    }

    .artwork p {
        font-weight: 600;
        color: black;
        font-size: 18px;
        letter-spacing: -0.5px;
        padding-top: 20px;

    }

    .artwork .btn {
        font-size: 18px;
        margin-top: 20px;
        margin-bottom: 20px;

    }

    .ec-cart-summary-total {
        border: 0 !important;
        padding-top: 0px !important;
        margin-bottom: 10px !important;
        margin-top: 0px !important;
    }



    .nopad {
        padding-left: 0 !important;
        padding-right: 0 !important;
    }
    /*image gallery*/
    .image-checkbox {
        cursor: pointer;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        border: 4px solid transparent;
        margin-bottom: 0;
        outline: 0;
    }
    .image-checkbox input[type="checkbox"] {
        display: none;
    }
    .disabled_image-checkbox input[type="checkbox"] {
        display: none;
    }
    .disabled_image-checkbox{
        opacity: .5;
    }

    .image-checkbox-checked {
        border-color: #EE8013;
    }
    .image-checkbox .fa {
        position: absolute;
        color: #EE8013;
        background-color: #fff;
        padding: 10px;
        top: 0;
        right: 0;
    }
    .image-checkbox-checked .fa {
        display: block !important;
    }

    /*image radio buttons*/
    .radio_image {
        opacity: 0.8;
        width: 200px;
        height: 160px;
        background-position: center center;
        background-color: gray;
        display: inline-block;
        margin: 10px;
    }
    .radio_image:hover {
        opacity: 1;
    }

    .radio-img  input {
        display: none;
    }
    .radio-img  .radio_image {
        cursor: pointer;
        border: 2px solid black;
    }
    .radio-img  input:checked  .radio-img {
        border: 5px solid #EE8013;
    }

    .radio input {
        width: 100%;
        height: auto;
        appearance: none;
        outline: none;
        cursor: pointer;
        border-radius: 2px;
        padding: 20px 20px;
        font-weight: 500;
        background: white;
        font-size: 22px;
        transition: all 100ms linear;
        /* margin-bottom: 15px; */
        box-shadow: 0 0 4px rgb(35 31 32 / 30%);
    }

    .radio {
        margin-top: 20px;
        background: transparent;
        display: block;
        border-radius: 3px;
        /* box-shadow: inset 0 0 0 3px rgb(35 33 45 / 30%), 0 0 0 3px rgb(185 185 185 / 30%); */
        position: relative;
    }

    .radio input:before {
        content: attr(label);
        display: inline-block;
    }

    .radio .logo-img {
        position: absolute;
        top: 7%;
        right: 25px;
    }

    .radio .text-img {
        position: absolute;
        top: 62%;
        right: 25px;
    }

    .accordion-button:not(.collapsed) {
        color: #0c63e4;
        background-color: #e7f1ff;
        -webkit-box-shadow: none;
        box-shadow: none;
    }


    #accordionExample .accordion-header input[type="radio"] {

        width: 100%;
        height: auto;
        appearance: none;
        outline: none;
        cursor: pointer;
        border-radius: 2px;
        padding: 15px 20px;
        font-weight: 500;
        background: white;
        font-size: 22px;
        transition: all 100ms linear;
    }

    .radio5 input[type="radio"] {
        width: 100%;
        height: auto;
        appearance: none;
        outline: none;
        cursor: pointer;
        line-height: 0;
        border-radius: 2px;
        font-weight: 500;
        background: white;
        font-size: 22px;
        transition: all 100ms linear;
    }

    .radio5 input[type="radio"]:before {
        content: attr(label);
        display: inline-block;
        font-size: 14px;
        line-height: 1.5;
        text-align: center;
    }


    #activat .accordion-button::after{
        background-image: none;
    }
    #accordionExample .accordion-header input[type="radio"]:before {
        content: attr(label);
        display: inline-block;
        color: #000;
    }

    .accordion-item {
        background-color: #fff;
        border: none;
    }
</style>

<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">Cart</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="ec-breadcrumb-item active">Cart</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ec-page-content section-space-p" id="cart">
    <div class="container">
        <div class="row">
            <div class="ec-cart-leftside  col-lg-8 col-md-12 ">
                <?php $sub_total = 0;$inc =0; $vat = 0;$total = 0; $total_product_cost=0;$total_to_add_logo=0 ?>
                @if (session('cart'))
                    @foreach (session('cart') as $k=>$product)
                        <?php $used_positions=array($k=>array()); $total_product_cost+=$product['item_total']; $inc++; ?>

                        <div class="card">
                            <div class="card-body">
                                <div class="product row">
                                    <div class="product-image col-md-2">
                                        <img src="{{ $product['image'] }}">
                                    </div>
                                    <div class="product-details col-md-3 d-flex align-items-center">
                                        <div class="product-title"><a href="#">{{ $product['product_name'] }}</a></div>
                                    </div>
                                    <div class="product-details col-md-3 d-flex align-items-center">
                                        <div class="product-title">
                                            <!-- <span>Product Code: GD002</span> -->
                                            <p>{{ $product['color'] }}/{{ $product['size'] }}</p>
                                        </div>
                                    </div>

                                    <div class=" col-md-2 d-flex align-items-center">
                                        <div class="ec-cart-pro-remove">
                                            <span><i class="ecicon eci-trash-o"></i></span>
                                        </div>
                                        <div class="ec-cart-pro-qty">
                                            <div class="cart-qty-plus-minus">
                                                <input class="cart-plus-minus" type="text" name="cartqtybutton" value="{{ $product['qty'] }}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-line-price col-md-2 d-flex align-items-center justify-content-end">
                                        <div>
                                            <span><b>{{ $product['item_total'] }}</b></span>
                                            <p>each(exc. VAT)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $total_for_each_customization = 0; ?>
                            @if(!empty($product['customization']))
                                @foreach($product['customization'] as $c)

                                    <div class="card-body">
                                        <p>{{ucfirst($c['cus_type'])}} applied to this item</p>
                                        <div class="product row pt-3">
                                            <div class=" col-md-2 d-flex align-items-center">
                                                <div class="ec-cart-pro-remove">
                                                    <span><i class="ecicon eci-trash-o"></i></span>
                                                </div>
                                                @if($c['cus_type'] === 'Logo' and $c['is_logo'] === 'yes')
                                                    <div class="product-image">
                                                        <img src="{{(!empty($c['my_logo']) ? url('customization_images/'.$c['my_logo']) : "https://www.workwearexpress.com/dist/placeholder.142a17c58fac006abb2e3864aed1dfbf.jpg")}}" width=40">
                                                    </div>
                                                @elseif($c['cus_type'] === 'Logo' and $c['is_logo'] === 'no')
                                                    <div class="product-image">
                                                        <img src="https://www.workwearexpress.com/dist/placeholder.142a17c58fac006abb2e3864aed1dfbf.jpg" width=40">
                                                    </div>
                                                @else
                                                    <div class="product-image">
                                                        <b>T</b>
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="product-details col-md-8 d-flex align-items-center">
                                                <div class="product-title">
                                                    <span>{{ucfirst($c['layout'][0])}}  {{ucfirst($c['cus_type']) }} {{($c['cus_type'] === 'Logo' and $c['is_logo'] === 'no') ? ": We'll contact you" : ""}} </span>
                                                    <script>var jow =2</script>
                                                    <p>@foreach($c['position'] as $pos) <?php $total_for_each_customization+=5.5;  array_push($used_positions[$k],$pos) ?> <b>{{ucfirst($pos) }}</b>  @endforeach</p>
                                                </div>
                                            </div>
                                            <div class="product-line-price col-md-2 d-flex align-items-center justify-content-end">
                                                <a href="#"><i class="ecicon eci-edit"></i>Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="row">
                                <div class="col-md-5 ml-5  mb-3">
                                    {{--                            add_cs--}}

                                    <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal{{$inc}}"  data-item="{{$k}}" type="button">Add another logo to this item</button>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end ">

                                    <div class="ec-sb-block-content">
                                        <div class="ec-cart-summary-bottom">
                                            <div class="ec-cart-summary">
                                                <div>
                                                    <span class="text-left">Customisation cost: </span>
                                                    <span class="text-right" style="margin-left: 15px;">£{{$total_for_each_customization}}  </span>
                                                    <?php $total_to_add_logo+= $total_for_each_customization; ?>
                                                </div>
                                                <div>
                                                    <span class="text-left">Total item cost: </span>
                                                    <span class="text-right"><a class="ec-cart-coupan" style="margin-left: 15px;">£{{ $total_for_each_customization+$product['item_total']}} </a></span>
                                                    <?php  $total+=$total_for_each_customization+$product['item_total']; ?>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$inc}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        {{--                <h5 class="modal-title" id="exampleModalLabel"></h5>--}}
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                                        <?php $sessionData = session()->get('cart'); ?>
                                                                        @php $print = ['leftchest','centerchest','insideneck','largebackA3','largebackA4','largefrontA3','largefrontA4','leftsleeves','leftthigh','cap','mask','napeofneck','rightchest','rightsleeves','rightthigh','specifynotes'] @endphp
                                                                        @foreach($print as $p)
                                                                            <div class="col-lg-4 mt-3 ">
                                                                                <div class="card step-card currrent {{(!in_array($p,$used_positions[$k])) ? "image-checkbox" : "disabled_image-checkbox"}} ">
                                                                                    <div class="step-img">
                                                                                        <a>
                                                                                            <img src="{{ asset('public/assets/fahad/images/'.$p.'.png') }}">
                                                                                            <input {{(in_array($p,$used_positions[$k])) ? "disabled" : ""}} type="checkbox" class="selected_postion" name="position[]" value="{{$p}}"/>
                                                                                            <input type="hidden" name="item_code" value="{{$k}}"/>
                                                                                            <i class="fa fa-check hidden"></i>
                                                                                        </a>
                                                                                    </div>
                                                                                    <div class="labels">
                                                                                        <p><i class="ecicon eci-print pr-2"></i>Print Available</p>
                                                                                        <p><i class="ecicon eci-pencil pr-2"></i>Embroidery Available</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
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
                                                                            <input type="radio" data-itemNumber="{{$inc-1}}" class="selected_layout" checked="checked" name="layout[]" value="embroidery" />
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
                                                                            <input type="radio" data-itemNumber="{{$inc-1}}" class="selected_layout" name="layout[]" value="print" />
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
                                                                <input type="radio" class="currrent1 active21" label="Logo" data-itemNumber2="{{$inc-1}}" name="cus_type" value="Logo" checked="checked">
                                                                <img src="{{ asset('public/assets/gallery.png') }}" alt="logo" class="logo-img">

                                                                <input type="radio" class="currrent1" label="Text" data-itemNumber2="{{$inc-1}}" name="cus_type" value="Text" style="margin-top: 20px;">
                                                                <img src="{{ asset('public/assets/text.png') }}" alt="text" class="text-img">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="step-tab-panel" data-step="step5">
                                                        <div id="activat" class="activat">
                                                            {{--                                                        <form>--}}
                                                            <div class="accordion" id="accordionExample">
                                                                <div class="accordion-item ">
                                                                    <div for='r11' class="accordion-header currrent2 active22" id="headingOne">
                                                                        <input type='radio' id='r11' checked="checked" data-itemNumber3="{{$inc-1}}" name='is_logo' label="Upload your own logo" value='yes' required class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" />
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
                                                                <input type='radio' id='r11' name='is_logo' data-itemNumber3="{{$inc-1}}" value="no" label="Don't have your logo to hand? Don't worry, select here and we will contact after you place your order." />
                                                            </div>


                                                            <label><b>Notes</b></label>
                                                            <textarea id="text_notes2" name="note" rows="4" cols="50" class="card step-card" placeholder="Please let us know if you have any special requirements"></textarea>

                                                            {{--                                                        </form>--}}
                                                            {{--                                <form >--}}



                                                            {{--                                </form>--}}
                                                            {{--                                                        <div class="mt-3 mb-3 text-center ">--}}
                                                            {{--                                                            <span><b>alternatively...</b></span>--}}
                                                            {{--                                                        </div>--}}
                                                            {{--                                                        <div class="container">--}}
                                                            {{--                                                            <div class="row">--}}
                                                            {{--                                                                <div class="card step-card col-lg-12 p-4 text-center currrent2">--}}
                                                            {{--                                                                    <p>Don't have your logo to hand? Don't worry, select here and we will contact after you place your order.</p>--}}
                                                            {{--                                                                </div>--}}
                                                            {{--                                                            </div>--}}
                                                            {{--                                                        </div>--}}
                                                            {{--                                                        <div>--}}
                                                            {{--                                                            <form class="mt-3">--}}
                                                            {{--                                                                <label><b>Notes</b></label>--}}
                                                            {{--                                                                <textarea id="text_notes2" name="note" rows="4" cols="50" class="card step-card" placeholder="Please let us know if you have any special requirements"></textarea>--}}
                                                            {{--                                                            </form>--}}
                                                            {{--                                                        </div>--}}
                                                        </div>
                                                        <!-- Text -->
                                                        <div id="if_text" class="if_text">
                                                            {{--                                <form>--}}
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label mt-2">Text 1</label>
                                                                <input name="text_one" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                                <label for="exampleInputEmail1" class="form-label mt-2">Text 2 (OPTIONAL)</label>
                                                                <input name="text_two" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                                <label for="exampleInputEmail1" class="form-label mt-2">Text 3 (OPTIONAL)</label>
                                                                <input name="text_three" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                            </div>
                                                            {{--                                </form>--}}
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

                                                            {{--                                <form class="mt-3">--}}
                                                            <label><b>Notes</b></label>
                                                            <textarea id="text_notes" name="note" rows="4" cols="50" class="card step-card" placeholder="Please let us know if you have any special requirements"></textarea>
                                                            {{--                                </form>--}}

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
                                    <!-- <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                    @endforeach
                @else
                    Cart is empty
                @endif

                <div class="card mt-5">
                    <div class="card-body">
                        <div class="row d-flex justify-content-end">
                            <div class="col-lg-4">
                                <div class="ec-sb-block-content">
                                    <div class="ec-cart-summary-bottom">
                                        <div class="ec-cart-summary">
                                            <div>
                                                <span class="text-left">All logo setup costs:</span>
                                                <span class="text-right" style="margin-left: 15px;">£8.95</span>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-6 mt-4">
                    <div class="ec-sb-block-content">
                        <div class="ec-cart-summary-bottom">
                            <div class="ec-cart-summary">

                                <div class="ec-cart-coupan-content" style="display: block;">
                                    <form class="ec-cart-coupan-form" name="ec-cart-coupan-form" method="post" action="#">
                                        <input class="ec-coupan" type="text" required="" placeholder="Add a discount code" name="ec-coupan" value="">
                                        <button class="ec-coupan-btn button btn-primary" type="submit" name="subscribe" value="">Apply</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>


            <div class="ec-cart-rightside col-lg-4 col-md-12">
                <div class="ec-sidebar-wrap">
                    <!-- Sidebar Summary Block -->
                    <div class="ec-sidebar-block">
                        <div class="ec-sb-title">
                            <h3 class="ec-sidebar-title">Your order summary</h3>
                        </div>


                        <div class="ec-sb-block-content">
                            <div class="ec-cart-summary-bottom">
                                <div class="ec-cart-summary">
                                    <div>
                                        <span class="text-left">Product Costs </span>
                                        <span class="text-right">£{{$total_product_cost}} </span>
                                    </div>
                                    <div>
                                        <span class="text-left">Costs To Add Logo </span>
                                        <span class="text-right">£{{$total_to_add_logo}} </span>
                                    </div>
                                    <div>
                                        <span class="text-left">One Time Setup Fees</span>
                                        <span class="text-right">£10 </span>
                                    </div>
                                    <div>
                                        <span class="text-left">Total (ex. VAT)</span>
                                        <span class="text-right">£{{$total}}</span>
                                    </div>
                                    <div class="ec-cart-summary-total">
                                        <span class="text-left">VAT </span>
                                        <span class="text-right">£{{($total/100)*20}} </span>
                                    </div>
                                    <div>
                                        <span class="text-left">Your total (inc. VAT)</span>
                                        <span class="text-right"><a class="ec-cart-coupan">£{{$total+($total/100)*20}} </a></span>
                                    </div>
                                    <div>
                                        <span class="text-left"><b>Loved by over 600,000 businesses in the UK, just like yours</b></span>
                                        <span class="text-right"><img src="https://www.workwearexpress.com/dist/curled-arrow.9ae8ae622a3a29df5de4c67e36491b21.png"></span>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="ec-sb-block-content"><span><b>Adding a new logo or text?</b> We'll email a mock up to approve before we begin!</span></div>

                        <a href="checkout.php" class="btn btn-primary col-lg-12">Continue to checkout</a>
                        <a href="#" class="btn col-lg-12 mt-2" style="background-color: #ccc; color:black;">Share this Basket</a>

                    </div>
                    <!-- Sidebar Summary Block -->
                </div>
            </div>


        </div>
    </div>
</section>



<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('public/assets/jquery-steps/dist/jquery-steps.js')}}"></script>
<script src="{{ asset('public/assets/fahad/main.js')}}"></script>
<script src="{{ asset('public/assets/image-uploader/imageuploader.js')}}"></script>
<!-- <script src="assets/jquery-steps/dist/jquery-steps.min.js"></script> -->


<script>
    $('.demo').steps({
        onChange: function (event, currentIndex, newIndex){
            if(currentIndex === 4){
                var artwork_type = $("input[name='cus_type']:checked").val();
                console.log(artwork_type)
                if (artwork_type == 'Logo'){
                    $(".if_text").css('display','none')
                    $(".activat").css('display','block')
                }else{
                    $(".activat").css('display','none')
                    $(".if_text").css('display','block')
                }
            }
            return true;
        },
        onFinish: function() {
            let _token   = '{{csrf_token()}}';
            var data = new FormData($('.customization_form')[0]);
            data.append('_token',_token)
            $.ajax({
                url: '{{route('addCustomization')}}',
                type: 'POST',
                data:  data,
                contentType: false,
                cache: false,
                processData:false,
                beforeSend : function() {
                    $("#err").fadeOut();
                },
                success: function(data) {
                    console.log(data)
                },
                error: function(e) {
                    $("#err").html(e).fadeIn();
                }
            });
        },
        labels: {
            current: "current step:",
            pagination: "Pagination",
            finish: "Confirm",
            next: "Next",
            previous: "Previous",
            loading: "Loading ..."
        }
    });

    $("[name='text_one'],[name='text_two'],[name='text_three']").on('input',function (e){
        if (this.name === 'text_one')
            $(".one").html(this.value)
        else if(this.name === 'text_two')
            $(".two").html(this.value)
        else if(this.name === 'text_three')
            $(".three").html(this.value)
    })
    $("[name='colour'],[name='font']").on('change',function (e){
        if (this.name === 'colour')
            $(".one,.two,.three").css("color",this.value)
        if (this.name === 'font')
            $(".one,.two,.three").css("font-family",this.value)
    })
    $(".add_cs").on('click',function (e){
        let itemCode= $(this).attr('data-item');
        $("[name='item_code']").val(itemCode)
        $("#exampleModal").modal('show');
    })
</script>

<script>
    // Add active class to the current button (highlight it)
    //     var header = document.getElementById("activate5");
    var header = document.querySelectorAll(".activate5");
    header.forEach(function (e){
        var btns = e.getElementsByClassName("currrent5");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function () {
                var current = document.getElementsByClassName("active25");
                var CUSTOMIZATION_NUMBER= $(this).find('input').attr('data-itemNumber')
                current[CUSTOMIZATION_NUMBER].className = current[CUSTOMIZATION_NUMBER].className.replace("active25", "");
                this.className += " active25";
            });
        }
    })

    // }
</script>
<script>
    // Add active class to the current button (highlight it)
    var header = document.querySelectorAll(".activates");
    header.forEach(function (e) {
        var btns = e.getElementsByClassName("currrent1");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function () {
                if ($(this).find('input').attr('checked') === 'checked') {
                    $(this).find('input').attr('checked', false)
                } else {
                    $(this).find('input').attr('checked', true)
                }
                var current = document.getElementsByClassName("active21");
                var CUSTOMIZATION_NUMBER= $(this).attr('data-itemNumber2')
                current[CUSTOMIZATION_NUMBER].className = current[CUSTOMIZATION_NUMBER].className.replace(" active21", "");
                this.className += " active21";
            });
        }
    })
</script>

<script>
    // Add active class to the current button (highlight it)
    var header = document.querySelectorAll(".activat");
    header.forEach(function (e) {
        var btns = e.getElementsByClassName("currrent2");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function () {
                var current = document.getElementsByClassName("active22");
                var CUSTOMIZATION_NUMBER= $(this).find('input').attr('data-itemNumber3')
                current[CUSTOMIZATION_NUMBER].className = current[CUSTOMIZATION_NUMBER].className.replace(" active22", "");
                this.className += " active22";
            });
        }
    })

    // image gallery
    // init the state from the input
    $(".image-checkbox").each(function () {
        if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
            $(this).addClass('image-checkbox-checked');
        }
        else {
            $(this).removeClass('image-checkbox-checked');
        }
    });

    // sync the state to the input
    $(".image-checkbox").on("click", function (e) {
        $(this).toggleClass('image-checkbox-checked');
        var $checkbox = $(this).find('input[type="checkbox"]');
        $checkbox.prop("checked",!$checkbox.prop("checked"))
        e.preventDefault();
    });
</script>

<script>
    $('.input-images').imageUploader({
        extensions: ['.ai'],
        imagesInputName:"logo",
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('public/assets/jquery-steps/dist/jquery-steps.js')}}"></script>
<script src="{{ asset('public/assets/fahad/main.js')}}"></script>

@include('web.footer')
