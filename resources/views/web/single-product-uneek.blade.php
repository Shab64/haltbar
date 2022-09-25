@include('web.header')
<link rel="stylesheet" href="{{ asset('public/assets/fahad/style.css') }}" />

<style>
    ul.cl {
        display: flex;
    }

    ul.cl li {
        padding: 5px 10px;
        border-radius: 5px;
        margin-right: 10px;
    }

    ul.cl li.active {
        background-color: #ccc;
    }

    .remove_colorbox {
        position: absolute;
        right: 80px;
        cursor: pointer
    }

    .custom-div {
        text-align: center;
    }

    .custom-div div {
        width: 90px;
    }

    .custom-div label {
        text-align: center;
    }

    .custom-div input {
        text-align: left;
        width: 100%;
        background-color: white;
        border: 1px solid gray;
        padding: 0px !important;
    }

    .custom-div input:focus {
        border: 2px solid #EE8013;
    }

    .custom-div input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }
</style>
<!-- <//?php var_dump($singleProduct); die; ?> -->
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            @if(session()->has('fail'))
            <div class="alert alert-danger">
                {{ session()->get('fail') }}
            </div>
            @endif
            <div class="ec-pro-rightside ec-common-rightside col-lg-12 col-md-12">

                <!-- Single product content Start -->
                <div class="single-pro-block">
                    <div class="single-pro-inner">
                        <div class="row">
                            <div class="single-pro-img single-pro-img-no-sidebar">
                                <div class="single-product-scroll">
                                    <div class="single-product-cover preview_active_color_code">
                                        @foreach ($singleProduct->images as $image)
                                        <div class="single-slide">
                                            <div class="single-slide zoom-image-hover">
                                                <img id="changeImage" src="{{$image->Large_Colour_Image}}" class="img-responsive" />
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="single-nav-thumb active_color_code">
                                        @foreach ($singleProduct->images as $image)
                                        <div class="single-slide">
                                            <div class="single-slide">
                                                <img src="{{$image->Large_Colour_Image}}" class="img-responsive" />
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="single-pro-desc single-pro-desc-no-sidebar">
                                <div class="single-pro-content">
                                    <h5 class="ec-single-title">{{ isset($singleProduct->Product_Name) ? 'Uneek '.$singleProduct->Product_Name : "-" }}</h5>
                                    <div class="ec-single-rating-wrap">

                                    </div>
                                    <div class="ec-single-desc">{!! isset($singleProduct->Full_Description) ? $singleProduct->Full_Description : '-' !!}</div>

                                    <div class="ec-single-price-stoke">
                                        <div class="ec-single-price">

                                            <span class="ec-single-ps-title">Price</span>
                                            <span class="new-price">${{ isset($singleProduct->multiplied_price) ? $singleProduct->multiplied_price : '-' }}</span>
                                        </div>
                                        <div class="ec-single-stoke">
                                            <span class="ec-single-ps-title">IN STOCK</span>
                                            <span class="ec-single-sku">SKU#: {{ isset($singleProduct->Product_Code) ? $singleProduct->Product_Code : "-" }}</span>
                                        </div>
                                    </div>
                                    <div class="ec-pro-variation">
                                        <!-- <div class="ec-pro-variation-inner ec-pro-variation-size">
                                            <span>SIZE</span>
                                            <div class="">
                                                <ul class='cl'>
                                                    <li onclick="activeList('first')" class="first active"> <span>7</span></li>
                                                    <li onclick="activeList('second')" class='second'><span>8</span></li>
                                                    <li onclick="activeList('third')" class='third'><span>9</span></li>
                                                </ul>
                                            </div>
                                        </div> -->
                                        <div class="ec-pro-variation-inner ec-pro-variation-color">
                                            <span>Choose colour:</span>
                                            <div class="ec-pro-variation-content">
                                                <ul>
                                                    @if(!empty($singleProduct->colors))
                                                    @foreach($singleProduct->colors as $k=>$color)
                                                    <li onclick="changeColor('{{ $color->Hex }}', '{{ $color->product_colourway_code }}', '{{ $color->Product_Code }}')"><span style="background-color:{{ $color->Hex }};"></span></li>
                                                    @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="slider4 mt-4">
                                            <h5 style="font-weight: 800;">Sizes + Quantity:</h5>
                                            <div class=" colors ">
                                                <ul>
                                                    <li>
                                                        <p id="sizeColor"></p>
                                                    </li>
                                                    <li>
                                                        <h6 id="colorName"></h6>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="row">
                                                @if(!empty($singleProduct->sizes))
                                                @foreach($singleProduct->sizes as $k=>$size)
                                                <label id="inputSizes" style="font-size:20px; text-align:right; color:black; font-weight:600;" class="col-sm-2 col-form-label">{{ $size->Size }} = </label>
                                                <div class="col-sm-10">
                                                    <input style="border-radius: 25px; text-align:center;" data-size="{{ $size->code }}" name="qty[]" type="number" min="0" max="249" value="0" class="form-control" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
                                                </div>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>

                                        <div id="customization-container">
                                            <!-- <div class="slider4">
                                                <div class="slide4">
                                                    <h2>CUSTOMISATION 1 - <span>ANY NAME</span></h2>
                                                    <div class="icon-action">
                                                        <span data-label="Remove" class="ec-cart-pro-remove"><a href="#"><i class="ecicon eci-edit"></i>&nbsp;edit</a>
                                                        </span>
                                                        <span data-label="Remove" class="ec-cart-pro-remove"><a href="#"><i class="ecicon eci-trash-o"></i>&nbsp;Delete</a>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="cpc_row cpc_detail">
                                                    <div class="cpc_desc">
                                                        <div class="cpc_desc_col">
                                                            <h3>TYPE OF CUSTOMISATION:</h3>
                                                            <span>Print</span>

                                                        </div>
                                                        <div class="cpc_desc_col">
                                                            <h3>TEXT CREATOR:</h3>
                                                            <span>Line 1: Fahad Ayaz</span>

                                                        </div>
                                                        <div class="cpc_desc_col">
                                                            <h3>DESIGN POSITION:</h3>
                                                            <span>Centre Front</span>

                                                        </div>
                                                        <div class="cpc_desc_col">
                                                            <h3>DESIGN WIDTH:</h3>
                                                            <span>10 cm</span>

                                                        </div>
                                                    </div>
                                                    <div class="cpc_preview">
                                                        <div class="label">Text Preview</div>
                                                        <div class="PTRed large"></div>

                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- <div class="slider4">
                                                <div class="slide4">
                                                    <h2>CUSTOMISATION 1 - <span>ANY NAME</span></h2>
                                                    <div class="icon-action">
                                                        <span data-label="Remove" class="ec-cart-pro-remove"><a href="#"><i class="ecicon eci-edit"></i>&nbsp;edit</a>
                                                        </span>
                                                        <span data-label="Remove" class="ec-cart-pro-remove"><a href="#"><i class="ecicon eci-trash-o"></i>&nbsp;Delete</a>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="cpc_row cpc_detail">
                                                    <div class="cpc_desc">
                                                        <div class="cpc_desc_col">
                                                            <h3>TYPE OF CUSTOMISATION:</h3>
                                                            <span>Print</span>

                                                        </div>
                                                        <div class="cpc_desc_col">
                                                            <h3>UPLOADED ARTWORK:</h3>
                                                            <span>Line 1: Fahad Ayaz</span>

                                                        </div>
                                                        <div class="cpc_desc_col">
                                                            <h3>DESIGN POSITION:</h3>
                                                            <span>Centre Front</span>

                                                        </div>
                                                        <div class="cpc_desc_col">
                                                            <h3>DESIGN WIDTH:</h3>
                                                            <span>10 cm</span>

                                                        </div>
                                                    </div>
                                                    <div class="cpc_preview">
                                                        <div class="label">Image Preview</div>
                                                        <div class="PTRed large">
                                                            <img src="{{ asset('public/assets/images/news/img-news-1.jpg') }}" width="100%" height="100%"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>

                                        <div id="customizationContainer">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                        <div class="collapse-content">
                                                            <h5 style="font-weight: 600;">Select the type of customization:</h5>
                                                            <div class="nav nav-pills tab mb-3">
                                                                <input type="text" value="Print" id="selected-type" hidden />
                                                                <button type="button" id="print-button" style="font-weight: 600;" class="tablinks nav-link" onclick="openCity(event, 'print-embroidery'); (function(){ $('#selected-type').val('Print') }())"><i class="ecicon eci-print"></i>Print</button>
                                                                <button type="button" id="embroidery-button" style="font-weight: 600;" class="tablinks nav-link" onclick="openCity(event, 'print-embroidery'); (function(){ $('#selected-type').val('Embroidery') }())"><i class="ecicon eci-pencil"></i>Embroidery</button>
                                                                <button type="button" id="name-number-button" style="font-weight: 600;" class="tablinks nav-link" onclick="togleText(); openCity(event, 'names'); (function(){ $('#selected-type').val('Names & Numbers') }()); (function(){ $('#selected-position').val('Back'); $('#pills-text-tab').removeClass('active'); $('#pills-upload-tab').removeClass('active') }());"><i class="ecicon eci-shirtsinbulk"></i>Names & Numbers</button>
                                                            </div>
                                                        </div>
                                                        <div id="print-embroidery" class="tabcontent mt-4">
                                                            <div class="slider" id="slider">
                                                                <h5 style="font-weight: 800;">Design Position</h5>
                                                                <input type="text" value="Left Chest" id="selected-position" hidden />
                                                                <div class="slide d-flex justify-content-center" id="slide">
                                                                    <div id="pe1" onclick="toggleText(); (function(){ $('#selected-position').val('Left Chest') }()); $('.item').removeClass('active'); $('#pe1').addClass('active')" class="item active">
                                                                        <a><img src="{{ asset('public/assets/fahad/images/leftchest.png') }}"></a>
                                                                    </div>
                                                                    <div id="pe2" onclick="toggleText(); (function(){ $('#selected-position').val('Right Chest') }()); $('.item').removeClass('active'); $('#pe2').addClass('active')" class="item">
                                                                        <a><img src="{{ asset('public/assets/fahad/images/rightchest.png') }}"></a>
                                                                    </div>
                                                                    <div id="pe3" onclick="toggleText(); (function(){ $('#selected-position').val('Front Center Chest') }()); $('.item').removeClass('active'); $('#pe3').addClass('active')" class="item">
                                                                        <a><img src="{{ asset('public/assets/fahad/images/centerchest.png') }}"></a>
                                                                    </div>
                                                                    <div id="pe4" onclick="toggleText(); (function(){ $('#selected-position').val('Nape Of Neck') }()); $('.item').removeClass('active'); $('#pe4').addClass('active')" class="item">
                                                                        <a><img src="{{ asset('public/assets/fahad/images/napeofneck.png') }}"></a>
                                                                    </div>
                                                                    <div id="pe5" onclick="toggleText(); (function(){ $('#selected-position').val('Large Front A4') }()); $('.item').removeClass('active'); $('#pe5').addClass('active')" class="item">
                                                                        <a> <img src="{{ asset('public/assets/fahad/images/largefrontA4.png') }}"></a>
                                                                    </div>
                                                                    <div id="pe9" onclick="toggleText(); (function(){ $('#selected-position').val('Large Back A4') }()); $('.item').removeClass('active'); $('#pe9').addClass('active')" class="item">
                                                                        <a><img src="{{ asset('public/assets/fahad/images/largebackA4.png') }}"></a>
                                                                    </div>
                                                                    <div id="pe14" onclick="toggleText(); (function(){ $('#selected-position').val('Large Front A3') }()); $('.item').removeClass('active'); $('#pe14').addClass('active')" class="item">
                                                                        <a> <img src="{{ asset('public/assets/fahad/images/largefrontA3.png') }}"></a>
                                                                    </div>
                                                                    <div id="pe6" onclick="toggleText(); (function(){ $('#selected-position').val('Large Back A3') }()); $('.item').removeClass('active'); $('#pe6').addClass('active')" class="item">
                                                                        <a><img src="{{ asset('public/assets/fahad/images/largebackA3.png') }}"></a>
                                                                    </div>
                                                                    <div id="pe7" onclick="toggleText(); (function(){ $('#selected-position').val('Left Sleeves') }()); $('.item').removeClass('active'); $('#pe7').addClass('active')" class="item">
                                                                        <a><img src="{{ asset('public/assets/fahad/images/leftsleeves.png') }}"></a>
                                                                    </div>
                                                                    <div id="pe8" onclick="toggleText(); (function(){ $('#selected-position').val('Right Sleeves') }()); $('.item').removeClass('active'); $('#pe8').addClass('active')" class="item">
                                                                        <a> <img src="{{ asset('public/assets/fahad/images/rightsleeves.png') }}"></a>
                                                                    </div>
                                                                    <!-- <div onclick="toggleText() (function(){ $('#selected-position').val('Large Front A4') }())" class="item">
                                                                        <a> <img src="{{ asset('public/assets/fahad/images/largebackA4.png') }}"></a>
                                                                    </div> -->
                                                                    <div id="pe10" onclick="toggleText(); (function(){ $('#selected-position').val('Cap') }()); $('.item').removeClass('active'); $('#pe10').addClass('active')" class="item">
                                                                        <a><img src="{{ asset('public/assets/fahad/images/cap.png') }}" style="width: 140px;"></a>
                                                                    </div>
                                                                    <div id="pe11" onclick="toggleText(); (function(){ $('#selected-position').val('Mask') }()); $('.item').removeClass('active'); $('#pe11').addClass('active')" class="item">
                                                                        <a><img src="{{ asset('public/assets/fahad/images/mask.png') }}" style="width: 145px;"></a>
                                                                    </div>
                                                                    <div id="pe12" onclick="toggleText(); (function(){ $('#selected-position').val('Left Thigh') }()); $('.item').removeClass('active'); $('#pe12').addClass('active')" class="item">
                                                                        <a><img src="{{ asset('public/assets/fahad/images/leftthigh.png') }}"></a>
                                                                    </div>
                                                                    <div id="pe13" onclick="toggleText(); (function(){ $('#selected-position').val('Right Thigh') }()); $('.item').removeClass('active'); $('#pe13').addClass('active')" class="item">
                                                                        <a><img src="{{ asset('public/assets/fahad/images/rightthigh.png') }}"></a>
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="ctrl-btn pro-prev "><i class="ecicon eci-chevron-left"></i></button>
                                                                <button type="button" class="ctrl-btn pro-next"><i class="ecicon eci-chevron-right"></i></button>
                                                            </div>
                                                        </div>

                                                        <div id="names" class="tabcontent">
                                                            <div class="slider2 mt-4">
                                                                <h5 style="font-weight: 800;">Design Position</h5>
                                                                <div class="slide d-flex justify-content-center">
                                                                    <div class="item active">
                                                                        <span>Back</span>
                                                                        <a> <img src="{{ asset('public/assets/fahad/images/name&number.png') }}"></a>
                                                                        <span>Names & Numbers</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="slider3 mt-4">
                                                                <h5 style="font-weight: 600;">FONT AND COLOUR:</h5>
                                                                <div class="row pt-2">
                                                                    <div class="col-md-8 ">
                                                                        <select class="form-select" onchange="previewNameAndNumber()" id="nn-font" aria-label="Default select example">
                                                                            <option selected value="">Fonts</option>
                                                                            <option value="Ballantines Script">Ballantines Script</option>
                                                                            <option value="Block One">Block One</option>
                                                                            <option value="Block Two">Block Two</option>
                                                                            <option value="Civic">Civic</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="color" class="form-control-color" onchange="previewNameAndNumber()" id="nn-color" title="Choose your color">
                                                                    </div>

                                                                    <div class="tshirt">
                                                                        <div class="item">
                                                                            <!-- <a><img src="{{ asset('public/assets/fahad/images/leftchest.png') }}"></a> -->
                                                                        </div>
                                                                        <div class="tshirt-detail">
                                                                            <!-- <div>Quantity: 1</div>
                                                                        <div>XS</div>
                                                                        <div>Maroon</div> -->
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-4 text-center">
                                                                            <input style="border-radius: 25px; text-align:center;" onkeyup="previewNameAndNumber()" type="text" class="form-control" id="nn-name" placeholder="Name">
                                                                        </div>
                                                                        <div class="col-md-3 text-center">
                                                                            <input style="border-radius: 25px; text-align:center;" onchange="previewNameAndNumber()" onkeyup="previewNameAndNumber()" type="number" class="form-control" id="nn-number" placeholder="No.">
                                                                        </div>
                                                                        <div class="col-md-5 text-center ">
                                                                            <div class="preview">
                                                                                <div style="display: block;width: 100%;padding-top: 8px">
                                                                                    <p id="nn-name-preview"></p>
                                                                                </div>
                                                                                <div style="display: block;width: 100%;">
                                                                                    <p id="nn-number-preview" style="font-size: 50px"></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="preview-detail">The name fields to change the preview view.</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <h5 style="font-weight: 600;">Customisation Name:</h5>
                                                                            <input placeholder="Customisation Name" class="form-control" type="text" id="nn-cname" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="artwork">
                                                                        <span>Please note, if you have uploaded new artwork, we will send you an artwork proof request by email once your artwork is processed. You must approve the proof before your order can progress to production.</span>
                                                                        <p>You can add up to 3 artwork positions per garment.</p>
                                                                        <div>
                                                                            <span id="nameNumberErr" style="color: red;font-size: 15px; width: 100%;display: none">* Please fill the required field</span>
                                                                        </div>
                                                                        <!-- Name and Number Back Confirm Art work -->
                                                                        <div id="confirm-container2">
                                                                            <div class="alert alert-danger" role="alert">
                                                                                *Please Select the Garment Size and Color Quantity
                                                                            </div>
                                                                            <!-- <button type="button" class="btn btn-primary" onclick="validatingCustomization('nameNumbers','text')"><i class="ecicon eci-thumbs-up"></i> CONFIRM THIS ARTWORK</button> -->
                                                                            <!--
                                                                                <div class="alert alert-danger" role="alert">
                                                                                    *Please Select the Garment Size and Color Quantity
                                                                                </div>
                                                                            -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="slider1" id="Myid" style="display: none;">
                                                    <h6 style="font-weight: 800;">Artwork</h6>
                                                    <input id="selected-artwork" value="Upload Image" hidden />
                                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button type="button" class="nav-link" id="pills-upload-tab" data-bs-toggle="pill" data-bs-target="#pills-upload" onclick="(function(){ $('#selected-artwork').val('Upload Image') }())" type="button" role="tab" aria-controls="pills-upload" aria-selected="true" style="font-weight: 600;"><i class="ecicon eci-cloud-upload"></i>Upload Image</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button type="button" class="nav-link" id="pills-text-tab" data-bs-toggle="pill" data-bs-target="#pills-text" onclick="(function(){ $('#selected-artwork').val('Text Creator') }())" type="button" role="tab" aria-controls="pills-text" aria-selected="false" style="font-weight: 600;"><i class="ecicon eci-text-height"></i>Text Creator</button>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content" id="pills-tabContent">
                                                        <div class="tab-pane fade show" id="pills-upload" role="tabpanel" aria-labelledby="pills-upload-tab">
                                                            <!-- Uploads  -->
                                                            <!-- <input type="file" id="testFile" name="testFile" accept="image/*"/> -->
                                                            <form id="file-upload-form" class="uploader">
                                                                <input id="file-upload" type="file" name="fileUpload" accept="ai, cdr, eps, psd, jpeg, tiff, pdf, png" />
                                                                <label for="file-upload" id="file-drag">
                                                                    <img id="file-image" src="#" alt="Preview" class="hidden">
                                                                    <div id="start">
                                                                        <i class="fa fa-download" aria-hidden="true"></i>
                                                                        <div>Select a file or drag here</div>
                                                                        <div id="notimage" class="hidden">Please select an image</div>
                                                                        <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                                                                    </div>
                                                                    <div id="response" class="hidden">
                                                                        <div id="messages"></div>
                                                                        <progress class="progress" id="file-progress" value="0">
                                                                            <span>0</span>%
                                                                        </progress>
                                                                    </div>
                                                                </label>
                                                            </form>

                                                            <h6 style="font-weight: 800;">Choose design width:</h6>
                                                            <div class="row mt-3">
                                                                <div class="col-lg">
                                                                    <button type="button" class="btn btn-outline-primary" onclick="$('#custom-width2').val('5');">Small (5cm)</button>
                                                                </div>
                                                                <div class="col-lg">
                                                                    <button type="button" class="btn btn-outline-primary" onclick="$('#custom-width2').val('8');">Medium (8cm)</button>
                                                                </div>
                                                                <div class="col-lg">
                                                                    <button type="button" class="btn btn-outline-primary" onclick="$('#custom-width2').val('11');">Large (11cm)</button>
                                                                </div>
                                                            </div>
                                                            <form class="row g-3 mt-4">
                                                                <div class="col-auto">
                                                                    <label for="text" style="color: #444; font-weight: 600;">Custom width:</label>
                                                                    <input type="text" class="form-control" id="custom-width2" placeholder="0 | cm">
                                                                    <span id="widthRangeErr2" style="color: red;font-size: 12px;"></span>
                                                                </div>
                                                            </form>
                                                            <h6 class="mt-4" style="font-weight: 800;">Notes or special instructions:</h6>
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control" id="special-instruction2" placeholder="Please let us know if you have any special requirements">
                                                            </div>
                                                            <h6 class="mt-4" style="font-weight: 800;">Customisation name:</h6>
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control" id="customization-name2" placeholder="Enter the name of your customisation here">
                                                            </div>
                                                            <div class="artwork">
                                                                <span>Please note, if you have uploaded new artwork, we will send you an artwork proof request by email once your artwork is processed. You must approve the proof before your order can progress to production.</span>
                                                                <p>You can add up to 3 artwork positions per garments.</p>
                                                                <div>
                                                                    <span id="uploadErr" style="color: red;font-size: 15px; width: 100%;display: none">* Please fill the required field</span>
                                                                </div>
                                                                <!-- Upload Image Art Work -->
                                                                <div id="confirm-container1">
                                                                    <div class="alert alert-danger" role="alert">
                                                                        *Please Select the Garment Size and Color Quantity
                                                                    </div>
                                                                    <!-- <button type="button" class="btn btn-primary" onclick="validatingCustomization('printEmbroidery','image')"><i class="ecicon eci-thumbs-up"></i> CONFIRM THIS ARTWORK</button> -->
                                                                    <!--
                                                                        <div class="alert alert-danger" role="alert">
                                                                            *Please Select the Garment Size and Color Quantity
                                                                        </div>
                                                                    -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="pills-text" role="tabpanel" aria-labelledby="pills-text-tab">
                                                            <!-- <form> -->
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">LINE 1</label>
                                                                <input type="text" class="form-control" id="line1" onkeyup="setPreview('line1')" aria-describedby="emailHelp">
                                                            </div>
                                                            <!-- </form> -->
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <select class="form-select" id="l1-size" onchange="setPreview('line1')" aria-label="Default select example">
                                                                        <option selected value="">Size</option>
                                                                        <option value="25px">Small</option>
                                                                        <option value="40px">Medium</option>
                                                                        <option value="60px">Large</option>
                                                                        <option value="80px">X-Large</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <select class="form-select" id="l1-font" onchange="setPreview('line1')" aria-label="Default select example">
                                                                        <option selected value="">Fonts</option>
                                                                        <option value="Ballantines Script">Ballantines Script</option>
                                                                        <option value="Block One">Block One</option>
                                                                        <option value="Block Two">Block Two</option>
                                                                        <option value="Civic">Civic</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="color" class="form-control-color" id="l1-color" onchange="setPreview('line1')" value="" title="Choose your color">
                                                                </div>
                                                            </div>
                                                            <!-- <form> -->
                                                            <div class="mb-3 mt-3">
                                                                <label for="exampleInputEmail1" class="form-label">LINE 2 (OPTIONAL)</label>
                                                                <input type="text" class="form-control" id="line2" onkeyup="setPreview('line2')" aria-describedby="emailHelp">
                                                            </div>

                                                            <!-- </form> -->
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <select class="form-select" id="l2-size" onchange="setPreview('line2')" aria-label="Default select example">
                                                                        <option value="">Size</option>
                                                                        <option value="25px">Small</option>
                                                                        <option value="40px">Medium</option>
                                                                        <option value="60px">Large</option>
                                                                        <option value="80px">X-Large</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <select class="form-select" id="l2-font" onchange="setPreview('line2')" aria-label="Default select example">
                                                                        <option value="">Fonts</option>
                                                                        <option value="Ballantines Script">Ballantines Script</option>
                                                                        <option value="Block One">Block One</option>
                                                                        <option value="Block Two">Block Two</option>
                                                                        <option value="Civic">Civic</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="color" class="form-control-color" onchange="setPreview('line2')" id="l2-color" value="#563d7c" title="Choose your color">

                                                                </div>
                                                            </div>
                                                            <!-- <form> -->
                                                            <div class="mb-3 mt-3">
                                                                <label for="exampleInputEmail1" class="form-label">LINE 3 (OPTIONAL)</label>
                                                                <input type="text" class="form-control" id="line3" onkeyup="setPreview('line3')" aria-describedby="emailHelp">
                                                            </div>

                                                            <!-- </form> -->
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <select class="form-select" id="l3-size" onchange="setPreview('line3')" aria-label="Default select example">
                                                                        <option value="">Size</option>
                                                                        <option value="25px">Small</option>
                                                                        <option value="40px">Medium</option>
                                                                        <option value="60px">Large</option>
                                                                        <option value="80px">X-Large</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <select class="form-select" id="l3-font" onchange="setPreview('line3')" aria-label="Default select example">
                                                                        <option value="">Fonts</option>
                                                                        <option value="Ballantines Script">Ballantines Script</option>
                                                                        <option value="Block One">Block One</option>
                                                                        <option value="Block Two">Block Two</option>
                                                                        <option value="Civic">Civic</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="color" class="form-control-color" id="l3-color" onchange="setPreview('line3')" value="#563d7c" title="Choose your color">

                                                                </div>
                                                            </div>
                                                            <h6 class="mt-3" style="font-weight: 800;">Text Preview:</h6>
                                                            <div class="mb-4" id="ctm_textpreview">
                                                                <div style="display: block;width: 100%;">
                                                                    <p id="line1-preview"></p>
                                                                </div>
                                                                <div style="display: block;width: 100%;">
                                                                    <p id="line2-preview"></p>
                                                                </div>
                                                                <div style="display: block;width: 100%;">
                                                                    <p id="line3-preview"></p>
                                                                </div>
                                                            </div>
                                                            <h6 style="font-weight: 800;">Choose design width:</h6>
                                                            <div class="row mt-3">
                                                                <div class="col">
                                                                    <button type="button" class="btn btn-outline-primary" onclick="(function(){
                                                                        $('#custom-width').val('5');
                                                                    }())">Small (5cm)</button>

                                                                </div>
                                                                <div class="col">
                                                                    <button type="button" class="btn btn-outline-primary" onclick="(function(){
                                                                        $('#custom-width').val('8');
                                                                    }())">Medium (8cm)</button>

                                                                </div>
                                                                <div class="col">
                                                                    <button type="button" class="btn btn-outline-primary" onclick="(function(){
                                                                        $('#custom-width').val('11');
                                                                    }())">Large (11cm)</button>

                                                                </div>

                                                            </div>
                                                            <!-- <form class="row g-3 mt-4"> -->
                                                            <div class="col-auto">
                                                                <label for="text" style="color: #444; font-weight: 600;">Custom width:</label>
                                                                <input type="text" class="form-control" id="custom-width" placeholder="0 | cm">
                                                                <span id="widthRangeErr" style="color: red;font-size: 12px;"></span>
                                                            </div>
                                                            <!-- </form> -->
                                                            <h6 class="mt-4" style="font-weight: 800;">Notes or special instructions:</h6>
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control" id="special-instruction" placeholder="Please let us know if you have any special requirements">
                                                            </div>
                                                            <h6 class="mt-4" style="font-weight: 800;">Customisation name:</h6>
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control" id="customization-name" placeholder="Enter the name of your customisation here">
                                                            </div>
                                                            <div class="artwork">
                                                                <span>Please note, if you have uploaded new artwork, we will send you an artwork proof request by email once your artwork is processed. You must approve the proof before your order can progress to production.</span>
                                                                <p>You can add up to 3 artwork positions per garment.</p>
                                                                <div>
                                                                    <span id="err1" style="color: red;font-size: 15px; width: 100%;display: none">* Please fill the required field</span>
                                                                </div>
                                                                <!-- Text Creator Art Work -->
                                                                <div id="confirm-container">
                                                                    <div class="alert alert-danger" role="alert">
                                                                        *Please Select the Garment Size and Color Quantity
                                                                    </div>
                                                                    <!-- <button type="button" class="btn btn-primary" onclick="validatingCustomization('printEmbroidery','text')"><i class="ecicon eci-thumbs-up"></i> CONFIRM THIS ARTWORK</button> -->
                                                                    <!-- Replace the above button with the below alert divs
                                                                        <div class="alert alert-danger" role="alert">
                                                                            *Please Select the Garment Size and Color Quantity
                                                        `               </div>
                                                                    -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <p id="button-container">
                                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Toggle first element</a>
                                        <button type="button" id="add-customization" class="btn btn-primary mt-2" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1" onclick="disableAddToCart()">Add Customization</button>
                                    </p> -->
                                        <div style="margin-top: 42px">
                                            <div class="card" id="priceCard" style="margin-bottom: 12px;width: 58%;box-shadow: rgb(0 0 0 / 16%) 0 3px 6px;display: none">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <p>Garments:<span> <span id="noDiscount"></span> <span id="garmentTotalPrice"></span> <span id="discountPercent" style="color: #ee8013;font-size: 11px;"></span></p>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="customPriceContainer" style="display: none;">
                                                        <div class="col-lg-12 col-md-12">
                                                            <p>Customization: <span id="customizationPrice"></span></p>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="setupChargesContainer" style="display: none;">
                                                        <div class="col-lg-12 col-md-12">
                                                            <p>Setup Charges: <span id="setupCharges">$8.50</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card" id="priceCard" style="margin-bottom: 12px;width: 58%;box-shadow: rgb(0 0 0 / 16%) 0 3px 6px;display: none">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <p>Garments:<span> <span id="noDiscount"><s></s></span> <span id="garmentTotalPrice"></span> <span id="discountPercent" style="color: #ee8013;font-size: 11px;"></span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 style="font-weight: 500">
                                                Total: <span style="color: #EE8013;font-weight: 600" id="totalPrice">$00.00</span>
                                            </h3>
                                        </div>

                                        <p style="color: red;" id="cartError"></p>
                                        <div class="ec-single-qty">
                                            <div class="ec-single-cart mt-4" style="display:flex;margin-left: 3px;">
                                                <button type="button" onclick="addToCart()" id="add-to-cart" class="btn btn-primary">Add To Cart</button>
                                                <!-- <button type="button" onclick="showQuoteModal()" id="add-to-cart" class="btn btn-primary">Request Quote</button> -->
                                            </div>
                                        </div>
                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Single product content End -->
                <!-- Single product tab start -->
                <div class="ec-single-pro-tab">
                    <div class="ec-single-pro-tab-wrapper">
                        <div class="ec-single-pro-tab-nav">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-details" role="tablist">Detail</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-info" role="tablist">More Information</a>
                                </li>
                                <!-- <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-review" role="tablist">Reviews</a>
                            </li> -->
                            </ul>
                        </div>
                        <div class="tab-content  ec-single-pro-tab-content">
                            <div id="ec-spt-nav-details" class="tab-pane fade show active">
                                <div class="ec-single-pro-tab-desc">
                                    <span>{!! isset($singleProduct->body) ? $singleProduct->body : '-' !!}</span>
                                    @if(isset($singleProduct->material))
                                    @foreach ($singleProduct->material as $details)
                                    <div>
                                        <h5>
                                            <strong>Fabric:</strong>
                                        </h5>
                                        <span>{{ $details->material }}</span>
                                    </div>
                                    <div>
                                        <h5>
                                            <strong>Weight:</strong>
                                        </h5>
                                        <span>{{ $details->material_weight }}</span>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <div id="ec-spt-nav-info" class="tab-pane fade">
                                <div class="ec-single-pro-tab-moreinfo">
                                    <ul>
                                        @if(isset($singleProduct->gender))
                                        <li><span>Gender</span> {{ $singleProduct->gender }}</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product details description area end -->
            </div>

        </div>
</section>

<!-- Cart Alert Modal -->
<div class="modal" id="cartAlertModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="margin-right: auto;margin-left: 2px">Alert!</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Please select the color size and quantity first.</p>
            </div>
            <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            <!-- </div> -->
        </div>
    </div>
</div>
<!-- Cart Alert Modal End -->
<!-- fahad -->

<script>
    //Get Color Name and Image
    function changeColor(color, colorCode, imageCode) {
        $('#sizeColor').css('background-color', color);

        $.ajax({
            type: "GET",
            url: "{{route('getColorName')}}",
            data: {
                colorCode,
                imageCode
            },
            success: function(response) {
                // console.log(response[0].title);
                $('#colorName').html(response[0].title);
                $('#changeImage').attr('src', response[1].image_url);
            }
        });
    }

    //Update Total On QTY Change
    $("input[name='qty[]']").bind('keyup mouseup', function() {
        var totalQty = 0;
        var productPrice = "{{ isset($singleProduct->single_price) ? $singleProduct->single_price : '-' }}";

        $("input[name='qty[]']").map(function() {
            totalQty += Number($(this).val());
        });

        if (totalQty != 0) {
            $.ajax({
                type: "GET",
                url: "{{route('updateAmount')}}",
                data: {
                    productPrice,
                    totalQty
                },
                success: function(response) {
                    //console.log(response);
                    if (response.totalPrice === undefined) {
                        $('#totalPrice').html('$00.00');
                        $('#priceCard').css('display', 'none');
                    } else {
                        $('#totalPrice').html('$' + response.totalPrice);
                        if (totalQty >= 5) {
                            $('#priceCard').css('display', 'block');
                            $('#noDiscount').html('<s>' + '$' + response.ActualPrice + '</s>');
                            $('#garmentTotalPrice').html('$' + response.totalPrice);
                            $('#discountPercent').html('(With %' + response.discountPercent + ' Discount)');
                        } else {
                            $('#priceCard').css('display', 'none');
                        }
                    }
                }
            });
        } else {
            $('#totalPrice').html('$00.00');
            $('#priceCard').css('display', 'none');
        }
    });

    //Add to Cart
    function addToCart() {
        let _token = '{{csrf_token()}}';
        var productID = "{{ isset($singleProduct->code) ? $singleProduct->code : '' }}";
        var color = $('#colorName').html();
        var image = $('#changeImage').attr('src');
        var sizesQty = $("input[name='qty[]']")
            .map(function() {
                if ($(this).val() != 0) {
                    return $(this).val() + $(this).attr('data-size');
                }
            }).get();

        if (color == '') {
            $('#cartError').html('Please select the color.');
        } else if (sizesQty == 0) {
            $('#cartError').html('Please select the quantity.');
        } else if ($('#totalPrice').html() == '$00.00') {
            $('#cartError').html('Quantity not available.');
        } else {
            $('#cartError').html('');
            $.post(
                '{{route("addToCart")}}', {
                    _token,
                    productID,
                    sizesQty,
                    image,
                    color
                },
                function(result) {
                    data = result.sessionData;
                    $('#openCart').trigger('click');
                    //console.log(data);
                    let cart = '';
                    let counter = 0;
                    let sub_total = 0;
                    let vat = 0;
                    let total = 0;

                    $.each(data.cart, function(index, value) {
                        sub_total += parseFloat(value.item_total);
                        vat = sub_total / 100 * 20;
                        total = sub_total + vat;
                        counter++;

                        cart += `<li id="removeProduct${index}">
                            <a href="#" class="sidekka_pro_img"><img src="${ value.image }" alt="product"></a>
                            <div class="ec-pro-content">
                                <a href="#" class="cart_pro_title">${ value.product_name }</a>
                                <span class="cart-price">${ value.color }/${ value.size }</span>
                                <span class="cart-price"><span>$${ value.item_total.toFixed(2) }</span> x ${ value.qty }</span>
                                
                                <input type="number" name="ec_qtybtn" data-productID="${index}" value="${ value.qty }" min="1" max="249" class="form-control form-control-sm col-sm-4" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"/>

                                <button class="remove remove_product" data-id="${index}">×</button>
                            </div>
                        </li>`;
                        // cart += `<li id="removeProduct${index}">
                        //         <a href="#" class="sidekka_pro_img"><img src="{{asset('uploads')}}/${ product_first_image[0] }" alt="product"></a>
                        //         <div class="ec-pro-content">
                        //             <a href="#" class="cart_pro_title">${ value.product_name.concat(" (", value.size, ")") }</a>
                        //             <span class="cart-price"><span>$${ value.price }</span></span>
                        //             <input type="hidden" id="price${index}" value="${ value.price }">
                        //             <div class="product-quantity">
                        //                 <input type="number" class="quantity" data-productID="${index}" value="${ value.qty }" min="1">
                        //             </div>
                        //             <input type="hidden" class="item_total" value="${index}" id="item_total${index}">
                        //             <button class="remove remove_product" data-id="${index}">x</button>
                        //         </div>
                        //     </li>`
                    });

                    $(".eccart-pro-items").html(cart);
                    $("#sub_total").html('$' + sub_total.toFixed(2));
                    $("#vat").html('$' + vat.toFixed(2));
                    $("#total").html('$' + total.toFixed(2));

                    $("#cartCount").html(counter);
                    // $(".ec-cart-bottom").css('display', 'block');
                    // $("#cartButton").css('display', 'block');
                    // $("#checkoutButton").css('display', 'block');
                    // alertify.success('Product has been added to your cart.');
                    // //document.getElementById("mySidebar").style.width = "350px";
                    // //window.location.replace("/altur/products/cart");

                    $(".remove_product").on('click', function(index) {
                        let product_id = $(this).attr("data-id");

                        if (confirm('Are you sure?')) {
                            $.ajax({
                                url: "{{ route('remove.from.cart') }}",
                                method: 'DELETE',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    product_id
                                },

                                success: function(response) {
                                    //console.log(response);
                                    $("#removeProduct" + product_id).remove();

                                    let sub_total = 0;
                                    let vat = 0;
                                    let total = 0;

                                    $.each(response.cart, function(index, value) {
                                        sub_total += value.item_total;
                                        vat = sub_total / 100 * 20;
                                        total = sub_total + vat;
                                        counter--;
                                    });

                                    $("#sub_total").html('$' + sub_total.toFixed(2));
                                    $("#vat").html('$' + vat.toFixed(2));
                                    $("#total").html('$' + total.toFixed(2));
                                    $("#cartCount").html(counter);

                                    if (total == 0) {
                                        // $(".ec-cart-bottom").css('display', 'none');
                                        // $("#cartButton").css('display', 'none');
                                        // $("#checkoutButton").css('display', 'none');
                                        $("#cartCount").html(0);
                                    }

                                    //alertify.success('Product has been removed.');
                                }
                            });
                        }
                    });

                    // $(".quantity").on('change', function(e) {
                    //     let product_id = $(this).attr('data-productID');
                    //     let quantity = $(this).val();
                    //     let price = $("#price" + product_id).val();
                    //     let item_total = quantity * price;

                    //     $("#item_total" + product_id).val(item_total);

                    //     //SubTotal
                    //     let sub_total = 0;
                    //     let tax = 0;
                    //     let total = 0;
                    //     $(".item_total").each(function() {
                    //         sub_total += parseInt($(this).val());
                    //         tax = sub_total / 100 * 5;
                    //         total = sub_total + tax;
                    //     });

                    //     $("#sub_total").text("$" + sub_total);
                    //     $("#tax").text("$" + tax);
                    //     $("#total").text("$" + total);

                    //     $.ajax({
                    //         url: "{{ route('update.cart') }}",
                    //         method: 'PATCH',
                    //         data: {
                    //             _token: '{{ csrf_token() }}',
                    //             product_id,
                    //             quantity
                    //         },

                    //         success: function(response) {
                    //             console.log(response);
                    //         }
                    //     });
                    // })
                }
            )
        }
    }
</script>

@include('web.footer')