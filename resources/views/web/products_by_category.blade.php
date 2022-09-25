@include('web.header')
<style>
    .ec-pro-pagination button.previous i:before {
        padding-right: 7px;
        font-size: 15px;
    }

    .ec-pro-pagination button.previous {
        width: auto;
        padding: 0 13px;
        margin-left: 12px;
        border: 1px solid #eeeeee;
        line-height: 30px;
        margin-right: 10px;
    }

    .ec-pro-pagination a.next {
        margin-left: 10px;
    }

    .ec-pro-pagination button.next {
        width: auto;
        padding: 0 13px;
        border: 1px solid #eeeeee;
        line-height: 30px;
    }

    .ec-pro-pagination button.next i:before {
        padding-right: 7px;
        font-size: 15px;
    }

    .noUi-connect {
        background: orange !important;
    }

    /*.noUi-touch-area{*/
    /*    background: darkorange!important;*/
    /*}*/
    .noUi-horizontal .noUi-handle {
        background: darkorange !important;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.0/nouislider.css" integrity="sha512-MKxcSu/LDtbIYHBNAWUQwfB3iVoG9xeMCm32QV5hZ/9lFaQZJVaXfz9aFa0IZExWzCpm7OWvp9zq9gVip/nLMg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="ec-shop-rightside col-lg-9 order-lg-last col-md-12 order-md-first margin-b-30">
                <!-- Shop Top Start -->
                <div class="ec-pro-list-top d-flex">
                    <div class="col-md-6 ec-grid-list">
                        <div class="ec-gl-btn">
                            <button class="btn btn-grid active"><img src="{{ asset('public/assets/images/icons/grid.svg') }}" class="svg_img gl_svg" alt="" /></button>
                            <button class="btn btn-list"><img src="{{ asset('public/assets/images/icons/list.svg') }}" class="svg_img gl_svg" alt="" /></button>
                        </div>
                    </div>

                </div>
                <!-- Shop Top End -->

                <!-- </?php var_dump($ralawise_products); die; ?>     -->

                <!-- Shop content Start -->
                <div class="shop-pro-content">
                    <div class="shop-pro-inner">
                        <div class="row" id="products">
                            @if(!empty($products))
                            @foreach($products as $product)
                            @if(!empty($product))
                            <?php $pro = $product; ?>
                            @if($pro['type'] === "ralawise")
                            <?php $img = (!empty($pro['PrimaryImage'])) ? $pro['PrimaryImage'] : $pro['ColourImage']; ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content" onclick="singleProduct('<?= $pro['id'] ?>','ralawise')">
                                <div class="ec-product-inner">
                                    <div class="ec-pro-image-outer">
                                        <div class="ec-pro-image">
                                            <a href="product-left-sidebar.html" class="image">
                                                <img class="main-image" src="{{ url('/public/assets/ralawise/images/'.str_replace(' and ',' & ',$img)) }}" alt="Product" />
                                                <img class="hover-image" src="{{ url('/public/assets/ralawise/images/'.str_replace(' and ',' & ',$img)) }}" alt="Product" />
                                            </a>
                                            <!-- <span class="percentage">20%</span> -->
                                            <a href="#" class="quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><img src="{{ asset('public/assets/images/icons/quickview.svg') }}" class="svg_img pro_svg" alt="" /></a>
                                            <div class="ec-pro-actions">
                                                <!-- <a href="compare.html" class="ec-btn-group compare" title="Compare"><img src="{{ asset('public/assets/images/icons/compare.svg') }}" class="svg_img pro_svg" alt="" /></a> -->
                                                <button title="Add To Cart" class=" add-to-cart"><img src="{{ asset('public/assets/images/icons/cart.svg') }}" class="svg_img pro_svg" alt="" /> Add To Cart</button>
                                                <a class="ec-btn-group wishlist" title="Wishlist"><img src="{{ asset('public/assets/images/icons/wishlist.svg') }}" class="svg_img pro_svg" alt="" /></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ec-pro-content">
                                        <h5 class="ec-pro-title"><a href="javascript:void(0)" onclick="singleProduct('<?= $pro['id'] ?>','ralawise')">{{ isset($pro['ProductName']) ? $pro['Brand'].' '.$pro['ProductName'] : "-" }}</a></h5>
                                        <!-- <div class="ec-pro-rating">
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star"></i>
                                                                        </div> -->
                                        <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
                                        <span class="ec-price">
                                            <!-- <span class="old-price">$27.00</span> -->
                                            <span class="new-price">
                                                @if(isset($pro['SinglePrice']))
                                                <?php
                                                $totalPrice =  ($pro['SinglePrice'] * $ralawise_pricing['service_charges_pp']);
                                                $discount = ($totalPrice / 100) * $ralawise_pricing['discount_per_percent'];
                                                $highestPrice = $totalPrice - $discount;

                                                $highDiscount = ($totalPrice / 100) * $ralawise_pricing_last['discount_per_percent'];
                                                $lowestPrice = $totalPrice - $highDiscount;
                                                ?>
                                                {{ '£'.round($lowestPrice,2).' - '.'£'.round($highestPrice,2)}}
                                                @else
                                                -
                                                @endif
                                            </span>
                                        </span>
                                        <!-- <div class="ec-pro-option">
                                                            <div class="ec-pro-color">
                                                                <span class="ec-pro-opt-label">Color</span>
                                                                <ul class="ec-opt-swatch ec-change-img">
                                                                    <li class="active"><a href="#" class="ec-opt-clr-img" data-src="{{ asset('public/assets/images/product-image/6_1.jpg') }}" data-src-hover="assets/images/product-image/6_1.jpg" data-tooltip="Gray"><span style="background-color:#e8c2ff;"></span></a></li>
                                                                    <li><a href="#" class="ec-opt-clr-img" data-src="{{ asset('public/assets/images/product-image/6_2.jpg') }}" data-src-hover="assets/images/product-image/6_2.jpg" data-tooltip="Orange"><span style="background-color:#9cfdd5;"></span></a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="ec-pro-size">
                                                                <span class="ec-pro-opt-label">Size</span>
                                                                <ul class="ec-opt-size">
                                                                    <li class="active"><a href="#" class="ec-opt-sz" data-old="$25.00" data-new="$20.00" data-tooltip="Small">S</a></li>
                                                                    <li><a href="#" class="ec-opt-sz" data-old="$27.00" data-new="$22.00" data-tooltip="Medium">M</a></li>
                                                                    <li><a href="#" class="ec-opt-sz" data-old="$30.00" data-new="$25.00" data-tooltip="Large">X</a></li>
                                                                    <li><a href="#" class="ec-opt-sz" data-old="$35.00" data-new="$30.00" data-tooltip="Extra Large">XL</a></li>
                                                                </ul>
                                                            </div>
                                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            @elseif($pro['type'] === "uneek")
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content" onclick="singleProduct('<?= $pro['id'] ?>','uneek')">
                                <div class="ec-product-inner">
                                    <div class="ec-pro-image-outer">
                                        <div class="ec-pro-image">
                                            <a href="product-left-sidebar.html" class="image">
                                                <img class="main-image" src="{{ $pro['Model_Small_Image'] }}" alt="Product" />
                                                <img class="hover-image" src="{{ $pro['Model_Small_Image'] }}" alt="Product" />
                                            </a>
                                            <!-- <span class="percentage">20%</span> -->
                                            <a href="#" class="quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><img src="{{ asset('public/assets/images/icons/quickview.svg') }}" class="svg_img pro_svg" alt="" /></a>
                                            <div class="ec-pro-actions">
                                                <!-- <a href="compare.html" class="ec-btn-group compare" title="Compare"><img src="{{ asset('public/assets/images/icons/compare.svg') }}" class="svg_img pro_svg" alt="" /></a> -->
                                                <button title="Add To Cart" class="add-to-cart"><img src="{{ asset('public/assets/images/icons/cart.svg') }}" class="svg_img pro_svg" alt="" /> Add To Cart</button>
                                                <a class="ec-btn-group wishlist" title="Wishlist"><img src="{{ asset('public/assets/images/icons/wishlist.svg') }}" class="svg_img pro_svg" alt="" /></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ec-pro-content">
                                        <h5 class="ec-pro-title"><a href="javascript:void(0)" onclick="singleProduct('<?= $pro['id'] ?>','uneek')">{{ isset($pro['Product_Name']) ? 'Uneek '.$pro['Product_Name'] : "-" }}</a></h5>
                                        <!-- <div class="ec-pro-rating">
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star fill"></i>
                                                                            <i class="ecicon eci-star"></i>
                                                                        </div> -->
                                        <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
                                        <span class="ec-price">
                                            <!-- <span class="old-price">$27.00</span> -->
                                            <span class="new-price">
                                                @if(isset($pro['Price_Single']))
                                                <?php
                                                $totalPrice =  ($pro['Price_Single'] * $uneek_pricing['service_charges_pp']);
                                                $discount = ($totalPrice / 100) * $uneek_pricing['discount_per_percent'];
                                                $highestPrice = $totalPrice - $discount;

                                                $highDiscount = ($totalPrice / 100) * $uneek_pricing_last['discount_per_percent'];
                                                $lowestPrice = $totalPrice - $highDiscount;
                                                ?>
                                                {{ '£'.round($lowestPrice,2).' - '.'£'.round($highestPrice,2)}}
                                                @else
                                                No Price
                                                @endif
                                            </span>
                                        </span>
                                        <!-- <div class="ec-pro-option">
                                                                            <div class="ec-pro-color">
                                                                                <span class="ec-pro-opt-label">Color</span>
                                                                                <ul class="ec-opt-swatch ec-change-img">
                                                                                    <li class="active"><a href="#" class="ec-opt-clr-img" data-src="assets/images/product-image/6_1.jpg" data-src-hover="assets/images/product-image/6_1.jpg" data-tooltip="Gray"><span style="background-color:#e8c2ff;"></span></a></li>
                                                                                    <li><a href="#" class="ec-opt-clr-img" data-src="assets/images/product-image/6_2.jpg" data-src-hover="assets/images/product-image/6_2.jpg" data-tooltip="Orange"><span style="background-color:#9cfdd5;"></span></a></li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="ec-pro-size">
                                                                                <span class="ec-pro-opt-label">Size</span>
                                                                                <ul class="ec-opt-size">
                                                                                    <li class="active"><a href="#" class="ec-opt-sz" data-old="$25.00" data-new="$20.00" data-tooltip="Small">S</a></li>
                                                                                    <li><a href="#" class="ec-opt-sz" data-old="$27.00" data-new="$22.00" data-tooltip="Medium">M</a></li>
                                                                                    <li><a href="#" class="ec-opt-sz" data-old="$30.00" data-new="$25.00" data-tooltip="Large">X</a></li>
                                                                                    <li><a href="#" class="ec-opt-sz" data-old="$35.00" data-new="$30.00" data-tooltip="Extra Large">XL</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endif
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- Ec Pagination Start -->

                    <div class="ec-pro-pagination" id="custom-pagination">
                        <span id="pag-count">Showing 1-{{($total_size > 21) ? 21 : $total_size}} of <?= isset($total_size) ? $total_size : 0 ?> item(s)</span>
                        <ul class="ec-pro-pagination-inner">
                            @if($total_size > 21)
                            <!-- if item grater than 21 -->
                            @php
                            $numberOfPaginations = ceil($total_size/21);
                            @endphp
                            <li>
                                <button class="previous" disabled onclick="updatePagination('Previous','{{ $numberOfPaginations }}',21)"><i class="ecicon eci-angle-left"></i>Previous
                                </button>
                            </li>
                            @for($i=1;$i<=$numberOfPaginations;$i++) <li><a <?= $i == 1 ? 'class="active"' : '' ?> href="javascript:void(0)" id="{{ $i }}" onclick="updatePagination('{{ $i }}','{{ $numberOfPaginations }}',21)">{{ $i }}</a>
                                </li>
                                @endfor
                                <li>
                                    <button class="next" href="javascript:void(0)" onclick="updatePagination('Next','{{ $numberOfPaginations }}',21)">Next <i class="ecicon eci-angle-right"></i></button>
                                </li>
                                @endif
                        </ul>
                    </div>
                    <!-- Ec Pagination End -->
                </div>
                <!--Shop content End -->
            </div>
            <!-- Sidebar Area Start -->
            <div class="ec-shop-leftside col-lg-3 order-lg-first col-md-12 order-md-last">
                <div id="shop_sidebar">
                    <div class="ec-sidebar-heading">
                        <h1>Filter Products By</h1>
                    </div>
                    <div class="ec-sidebar-wrap">
                        <!-- Sidebar Category Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Fabric</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <?php $fabric = ['100% cotton', '100% polyester', 'Denim', 'Organic', 'Polycotton']  ?>
                                <ul>
                                    @foreach($fabric as $fab)
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" class="my-fabric" name="fab[]" value="{{$fab}}" /> <a href="#">{{$fab}}</a><span class="checked"></span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Size Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Size</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    @php $sizes = ['S','L','M','X','XL','2XL','3XL','4XL','5XL'] @endphp
                                    @foreach($sizes as $s)
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" class="my-size" value="{{$s}}" name="size[]" /><a href="#">{{$s}}</a><span class="checked"></span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                        <!-- Sidebar Price Block -->
                        <div class="ec-sidebar-block ec-sb-block-content">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Price</h3>
                            </div>
                            <div id="slider"></div>
                            <input id="sliderValueInput" type="hidden" value="">
                        </div>
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Brand</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul style="height: 200px;overflow: hidden;overflow-y: scroll">
                                    @foreach($brands as $b)
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" class="my-brand" value="{{$b['Brand']}}" name="brand[]" /><a href="#">{{$b['Brand']}}</a><span class="checked"></span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Sidebar Supplier Block -->
                        {{-- <div class="ec-sidebar-block">--}}
                        {{-- <div class="ec-sb-title">--}}
                        {{-- <h3 class="ec-sidebar-title">Supplier</h3>--}}
                        {{-- </div>--}}
                        {{-- <div class="ec-sb-block-content">--}}
                        {{-- <ul>--}}
                        {{-- <li>--}}
                        {{-- <div class="ec-sidebar-block-item">--}}
                        {{-- <input type="checkbox" class="my-supplier" value="ralawise" name="supplier[]" /><a href="#">Ralawise</a><span class="checked"></span>--}}
                        {{-- </div>--}}
                        {{-- </li>--}}
                        {{-- <li>--}}
                        {{-- <div class="ec-sidebar-block-item">--}}
                        {{-- <input type="checkbox" class="my-supplier" value="uneek" name="supplier[]" /><a href="#">Uneek</a><span class="checked"></span>--}}
                        {{-- </div>--}}
                        {{-- </li>--}}
                        {{-- </ul>--}}
                        {{-- </div>--}}
                        {{-- </div>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var slider = noUiSlider.create($("#slider")[0], {
        start: [0, 200],
        connect: true,
        tooltips: true,
        range: {
            'min': 0,
            'max': 200
        },
        step: 0.1,

    });

    //filtration
    let category = ['{{\Illuminate\Support\Facades\Request::segment(2)}}'];
    let size = [];
    let price = [];
    let supplier = [];
    let fabric = [];
    let brand = [];
    //size
    $(".my-size").on('click', function(e) {
        if ($(this).is(':checked') === true) {
            size.push(this.value)
        } else {
            let checkSize = size.indexOf(this.value);
            if (checkSize !== -1) {
                size.splice(checkSize, 1);
            }
        }
        filter()

    })
    //supplier
    $(".my-supplier").on('click', function(e) {
        if ($(this).is(':checked') === true) {
            supplier.push(this.value)
        } else {
            let checkSupplier = supplier.indexOf(this.value);
            if (checkSupplier !== -1) {
                supplier.splice(checkSupplier, 1);
            }
        }
        filter()
    })
    //brand
    $(".my-brand").on('click', function(e) {
        if ($(this).is(':checked') === true) {
            brand.push(this.value)
        } else {
            let checkBrand = brand.indexOf(this.value);
            if (checkBrand !== -1) {
                brand.splice(checkBrand, 1);
            }
        }
        filter()
    })
    //fabric
    $(".my-fabric").on('click', function(e) {
        if ($(this).is(':checked') === true) {
            fabric.push(this.value)
        } else {
            let checkFabric = fabric.indexOf(this.value);
            if (checkFabric !== -1) {
                fabric.splice(checkFabric, 1);
            }
        }
        filter()
    })
    //price
    $("#sliderValueInput").val(slider.get());
    slider.on("change", function() {
        $("#sliderValueInput").val(slider.get());
        price = [];
        price.push(slider.get())
        filter()
    });

    function filter() {
        let _token = '{{csrf_token()}}';
        $.post("{{route('filterBy')}}", {
            _token,
            fabric,
            size,
            category,
            price,
            supplier,
            brand
        }, function(resp) {
            let res = JSON.parse(resp);
            var html = ``;
            if (res.products.length > 0) {
                res.products.forEach(function(val, index) {
                    console.log(val)
                    let val1 = val;
                    if (val1.type === "ralawise") {
                        let img = (val1.PrimaryImage != null) ? val1.PrimaryImage : val1.ColourImage;
                        html += `<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content" onclick="singleProduct('${val1.id}','ralawise')">
            <div class="ec-product-inner">
            <div class="ec-pro-image-outer">
            <div class="ec-pro-image">
            <a href="javascript:void(0)" onclick="singleProduct('${val1.id}','ralawise')" class="image">
            <img class="main-image" src="{{ asset('public/assets/ralawise/images') }}${'/' + img.replace(' and ',' & ')}" alt="Product" />
            <img class="hover-image" src="{{ asset('public/assets/ralawise/images') }}${'/' + img.replace(' and ',' & ')}" alt="Product" />
            </a>
            <!-- <span class="percentage">20%</span> -->
            <a href="#" class="quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><img src="{{ asset('public/assets/images/icons/quickview.svg') }}" class="svg_img pro_svg" alt="" /></a>
            <div class="ec-pro-actions">
            <!-- <a href="compare.html" class="ec-btn-group compare" title="Compare"><img src="{{ asset('public/assets/images/icons/compare.svg') }}" class="svg_img pro_svg" alt="" /></a> -->
            <button title="Add To Cart" class=" add-to-cart"><img src="{{ asset('public/assets/images/icons/cart.svg') }}" class="svg_img pro_svg" alt="" /> Add To Cart</button>
            <a class="ec-btn-group wishlist" title="Wishlist"><img src="{{ asset('public/assets/images/icons/wishlist.svg') }}" class="svg_img pro_svg" alt="" /></a>
            </div>
            </div>
            </div>
            <div class="ec-pro-content">
            <h5 class="ec-pro-title"><a href="javascript:void(0)" onclick="singleProduct('${val1.id}','ralawise')">${val.ProductName != "undefined" ? val1.Brand + ' ' + val1.ProductName : '-'}</a></h5>
            <!-- <div class="ec-pro-rating">
            <i class="ecicon eci-star fill"></i>
            <i class="ecicon eci-star fill"></i>
            <i class="ecicon eci-star fill"></i>
            <i class="ecicon eci-star fill"></i>
            <i class="ecicon eci-star"></i>
            </div> -->
            <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
            <span class="ec-price">
            <!-- <span class="old-price">$27.00</span> -->
            <span class="new-price">
            ${function calPrice() {
                            priceHtml = ``;
                            if (val1.SinglePrice != "undefined" && res.ralawise_pricing['service_charges_pp']) {
                                var totalPrice = val1.SinglePrice * res.ralawise_pricing['service_charges_pp'];
                                var discount = (totalPrice / 100) * res.ralawise_pricing['discount_per_percent'];
                                var highestPrice = totalPrice - discount;

                                var highDiscount = (totalPrice / 100) * res.ralawise_pricing_last['discount_per_percent'];
                                var lowestPrice = totalPrice - highDiscount;
                                priceHtml += '£' + lowestPrice.toFixed(2) + ' - ' + '£' + highestPrice.toFixed(2);
                            } else {
                                priceHtml += '-';
                            }
                            return priceHtml;
                        }()}

            </span>
            </span>
            <!-- <div class="ec-pro-option">
            <div class="ec-pro-color">
            <span class="ec-pro-opt-label">Color</span>
            <ul class="ec-opt-swatch ec-change-img">
            <li class="active"><a href="#" class="ec-opt-clr-img" data-src="{{ asset('public/assets/images/product-image/6_1.jpg') }}" data-src-hover="assets/images/product-image/6_1.jpg" data-tooltip="Gray"><span style="background-color:#e8c2ff;"></span></a></li>
            <li><a href="#" class="ec-opt-clr-img" data-src="{{ asset('public/assets/images/product-image/6_2.jpg') }}" data-src-hover="assets/images/product-image/6_2.jpg" data-tooltip="Orange"><span style="background-color:#9cfdd5;"></span></a></li>
            </ul>
            </div>
            <div class="ec-pro-size">
            <span class="ec-pro-opt-label">Size</span>
            <ul class="ec-opt-size">
            <li class="active"><a href="#" class="ec-opt-sz" data-old="$25.00" data-new="$20.00" data-tooltip="Small">S</a></li>
            <li><a href="#" class="ec-opt-sz" data-old="$27.00" data-new="$22.00" data-tooltip="Medium">M</a></li>
            <li><a href="#" class="ec-opt-sz" data-old="$30.00" data-new="$25.00" data-tooltip="Large">X</a></li>
            <li><a href="#" class="ec-opt-sz" data-old="$35.00" data-new="$30.00" data-tooltip="Extra Large">XL</a></li>
            </ul>
            </div>
            </div> -->
            </div>
            </div>
            </div>`;
                    } else if (val1.type === "uneek") {
                        html += `<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content" onclick="singleProduct('${val1.id}','uneek')">
            <div class="ec-product-inner">
            <div class="ec-pro-image-outer">
            <div class="ec-pro-image">
            <a href="javascript:void(0);" onclick="singleProduct('${val1.id}','uneek')" class="image">
            <img class="main-image" src="${val1.Model_Small_Image}" alt="Product" />
            <img class="hover-image" src="${val1.Model_Large_Image}" alt="Product" />
            </a>
            <!-- <span class="percentage">20%</span> -->
            <a href="#" class="quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><img src="{{ asset('public/assets/images/icons/quickview.svg') }}" class="svg_img pro_svg" alt="" /></a>
            <div class="ec-pro-actions">
            <!-- <a href="compare.html" class="ec-btn-group compare" title="Compare"><img src="{{ asset('public/assets/images/icons/compare.svg') }}" class="svg_img pro_svg" alt="" /></a> -->
            <button title="Add To Cart" class=" add-to-cart"><img src="{{ asset('public/assets/images/icons/cart.svg') }}" class="svg_img pro_svg" alt="" /> Add To Cart</button>
            <a class="ec-btn-group wishlist" title="Wishlist"><img src="{{ asset('public/assets/images/icons/wishlist.svg') }}" class="svg_img pro_svg" alt="" /></a>
            </div>
            </div>
            </div>
            <div class="ec-pro-content">
            <h5 class="ec-pro-title"><a href="javascript:void(0)" onclick="singleProduct('${val1.id}','ralawise')">${val.Product_Name != "undefined" ? 'Uneek ' + val1.Product_Name : '-'}</a></h5>
            <!-- <div class="ec-pro-rating">
            <i class="ecicon eci-star fill"></i>
            <i class="ecicon eci-star fill"></i>
            <i class="ecicon eci-star fill"></i>
            <i class="ecicon eci-star fill"></i>
            <i class="ecicon eci-star"></i>
            </div> -->
            <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
            <span class="ec-price">
            <!-- <span class="old-price">$27.00</span> -->
            <span class="new-price">
            ${function calPrice() {
                            priceHtml = ``;
                            if (val1.Price_Single != "undefined" && res.uneek_pricing['service_charges_pp']) {
                                var totalPrice = val1.Price_Single * res.uneek_pricing['service_charges_pp'];
                                var discount = (totalPrice / 100) * res.uneek_pricing['discount_per_percent'];
                                var highestPrice = totalPrice - discount;

                                var highDiscount = (totalPrice / 100) * res.uneek_pricing_last['discount_per_percent'];
                                var lowestPrice = totalPrice - highDiscount;
                                priceHtml += '£' + lowestPrice.toFixed(2) + ' - ' + '£' + highestPrice.toFixed(2);
                            } else {
                                priceHtml += '-';
                            }
                            return priceHtml;
                        }()}
            </span>
            </span>
            <!-- <div class="ec-pro-option">
            <div class="ec-pro-color">
            <span class="ec-pro-opt-label">Color</span>
            <ul class="ec-opt-swatch ec-change-img">
            <li class="active"><a href="#" class="ec-opt-clr-img" data-src="{{ asset('public/assets/images/product-image/6_1.jpg') }}" data-src-hover="assets/images/product-image/6_1.jpg" data-tooltip="Gray"><span style="background-color:#e8c2ff;"></span></a></li>
            <li><a href="#" class="ec-opt-clr-img" data-src="{{ asset('public/assets/images/product-image/6_2.jpg') }}" data-src-hover="assets/images/product-image/6_2.jpg" data-tooltip="Orange"><span style="background-color:#9cfdd5;"></span></a></li>
            </ul>
            </div>
            <div class="ec-pro-size">
            <span class="ec-pro-opt-label">Size</span>
            <ul class="ec-opt-size">
            <li class="active"><a href="#" class="ec-opt-sz" data-old="$25.00" data-new="$20.00" data-tooltip="Small">S</a></li>
            <li><a href="#" class="ec-opt-sz" data-old="$27.00" data-new="$22.00" data-tooltip="Medium">M</a></li>
            <li><a href="#" class="ec-opt-sz" data-old="$30.00" data-new="$25.00" data-tooltip="Large">X</a></li>
            <li><a href="#" class="ec-opt-sz" data-old="$35.00" data-new="$30.00" data-tooltip="Extra Large">XL</a></li>
            </ul>
            </div>
            </div> -->
            </div>
            </div>
            </div>`;
                    }

                });
            }
            if (html.length > 0) {
                $('#products').html(html);
                let numberOfPaginations = Math.ceil(res.total_size / 21);
                let pagination = `

                       <span id="pag-count">Showing 1-${(numberOfPaginations > 1 ? 21 : res.total_size)} of ${res.total_size} item(s)</span>
                        <ul class="ec-pro-pagination-inner">`
                if (res.total_size > 21) {
                    pagination += `
                                <li>
                                    <button class="previous" disabled
                                            onclick="updatePagination('Previous',${numberOfPaginations},21)"><i
                                        class="ecicon eci-angle-left"></i>Previous
                                    </button>
                                </li>`

                    for (let i = 1; i <= numberOfPaginations; i++) {
                        pagination += `
                                        <li><a ${(i === 1) ? 'class="active"' : ''} href="javascript:void(0)"
                                               id="${i}"
                                               onclick="updatePagination(${i},${numberOfPaginations},21)">${i}</a>
                                        </li>`
                    }

                    pagination += `<li>
                                    <button class="next" href="javascript:void(0)"
                                            onclick="updatePagination('Next','${ numberOfPaginations }',21)">Next <i
                                        class="ecicon eci-angle-right"></i></button>
                                </li>`
                }
                `</ul>
                            `
                $('#custom-pagination').html(pagination);
            } else {
                $("#products").html('No Product Found ..')
            }
        })
    }

    function applyFilter() {
        //arrayss
        let seletctedCategories = [];
        let selectedSizes = [];
        // let selectedColors = [];
        let selectedSuppliers = [];

        let minPrice = $('#min_price').val();
        let maxPrice = $('#max_price').val();

        //add values to array
        let category = $('[name="cat[]"]:checked').map(function() {
            seletctedCategories.push($(this).val());
        });
        let size = $('[name="size[]"]:checked').map(function() {
            selectedSizes.push($(this).val());
        });
        let supplier = $('[name="supplier[]"]:checked').map(function() {
            selectedSuppliers.push($(this).val());
        });

        let _token = "{{ csrf_token() }}";
        $.ajax({
            type: "post",
            url: "{{ Route('filter') }}",
            data: {
                _token,
                seletctedCategories,
                selectedSizes,
                selectedSuppliers,
                minPrice,
                maxPrice,
            }
        }).success(function(data) {
            console.log(data);
        }).fail(function(err) {
            console.log(err);
        });
    }

    function singleProduct(productID, supplierType) {
        window.location.href = `{{ url("/product-view")}}` + '/' + supplierType + '/' + productID;
    }

    function updatePagination(current, max, limit) {
        var fromRange = 0;
        var toRange = 0;
        if (current == "Next" || current == "Previous") {
            //get the current pagination
            if (current == "Next") {
                //get the ID of the current active pagination
                var currentID = $('li').find(".active").attr('id');

                //disable next button if at last position of pagination
                if (parseInt(currentID) + 1 == parseInt(max)) {
                    $('.next').attr('disabled', true)
                }

                //if next button disable than enabled it
                if (typeof $('.previous').attr('disabled') != 'undefined' || $('.previous').attr('disabled') != false) {
                    $('.previous').attr('disabled', false)
                }

                //check if the next ID is present by cheking the lenght greater than zero
                if ($('#' + (parseInt(currentID) + 1)).length > 0) {
                    $('#' + currentID).removeClass('active'); //remove active class from current
                    $('#' + (parseInt(currentID) + 1)).addClass('active') //add active class to next pagination
                    //set from range and to range of data
                    toRange = (parseInt(currentID) + 1) * limit;
                    fromRange = toRange - limit;
                } else { //set toRange to zero if the the pagination other than next is not present
                    //to prevent from getting data
                    toRange = 0;
                }

            } else if (current == "Previous") {
                //get the ID of the current active pagination
                var currentID = $('li').find(".active").attr('id');

                //disabled previous if current pagination is at position 1
                if ((parseInt(currentID) - 1) == 1) {
                    $('.previous').attr('disabled', true);
                }

                //if next button disable than enabled it
                if (typeof $('.next').attr('disabled') != 'undefined' || $('.next').attr('disabled') != false) {
                    $('.next').attr('disabled', false)
                }

                //check if the previous ID is present by cheking the lenght greater than zero
                if ($('#' + (parseInt(currentID) - 1)).length > 0) {
                    $('#' + currentID).removeClass('active'); //remove active class from current
                    $('#' + (parseInt(currentID) - 1)).addClass('active') //add active class to previous pagination
                    //set from range and to range of product data
                    toRange = (parseInt(currentID) - 1) * limit;
                    fromRange = toRange - limit;
                } else {
                    //set toRange to zero if the the pagination other than previous is not present
                    //to prevent from getting data
                    toRange = 0;
                }

            }
        } else {
            //disable next and previous according to the current position of the pagination
            //remove the class from current
            $('li').find(".active").removeClass('active');
            //add the class to current selected
            $('#' + parseInt(current)).addClass('active');
            if (parseInt(current) == 1) {
                $('.previous').attr('disabled', true);
                $('.next').attr('disabled', false);
            } else if (parseInt(current) == parseInt(max)) {
                $('.previous').attr('disabled', false);
                $('.next').attr('disabled', true);
            } else {
                $('.previous').attr('disabled', false);
                $('.next').attr('disabled', false);
            }
            //set from range and to range of product data
            toRange = parseInt(current) * limit;
            fromRange = toRange - limit;
        }

        //Send the fromRange and toRange and get the data and display usgin jquery
        {
            {
                --$.post("{{route('filterBy')}}", {
                        _token,
                        fabric,
                        size,
                        category,
                        price,
                        supplier
                    }, function(resp) {
                        --
                    }
                }
                var _token = '{{ csrf_token() }}';
                $.ajax({
                    // type: 'json',
                    method: 'post',
                    {
                        {
                            --url: '{{ route("getPagData") }}', --
                        }
                    }
                    url: '{{ route("filterBy") }}',
                    data: {
                        _token,
                        limit,
                        fromRange,
                        toRange,
                        fabric,
                        size,
                        category,
                        price,
                        supplier,
                        brand
                    },
                    success: function(res) {
                        var html = ``;
                        if (res.length > 0) {
                            res = JSON.parse(res);
                            //For Ralawise Products
                            if (Object.keys(res.products).length > 0) {
                                res.products.forEach(function(val, index) {

                                    let val1 = val;
                                    if (val1.type === "ralawise") {
                                        let img = (val1.PrimaryImage != null) ? val1.PrimaryImage : val1.ColourImage;
                                        html += `<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content" onclick="singleProduct('${val1.id}','ralawise')">
            <div class="ec-product-inner">
            <div class="ec-pro-image-outer">
            <div class="ec-pro-image">
            <a href="javascript:void(0)" onclick="singleProduct('${val1.id}','ralawise')" class="image">
            <img class="main-image" src="{{ asset('public/assets/ralawise/images') }}${'/' + img.replace(' and ',' & ')}" alt="Product" />
            <img class="hover-image" src="{{ asset('public/assets/ralawise/images') }}${'/' + img.replace(' and ',' & ')}" alt="Product" />
            </a>
            <!-- <span class="percentage">20%</span> -->
            <a href="#" class="quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><img src="{{ asset('public/assets/images/icons/quickview.svg') }}" class="svg_img pro_svg" alt="" /></a>
            <div class="ec-pro-actions">
            <!-- <a href="compare.html" class="ec-btn-group compare" title="Compare"><img src="{{ asset('public/assets/images/icons/compare.svg') }}" class="svg_img pro_svg" alt="" /></a> -->
            <button title="Add To Cart" class=" add-to-cart"><img src="{{ asset('public/assets/images/icons/cart.svg') }}" class="svg_img pro_svg" alt="" /> Add To Cart</button>
            <a class="ec-btn-group wishlist" title="Wishlist"><img src="{{ asset('public/assets/images/icons/wishlist.svg') }}" class="svg_img pro_svg" alt="" /></a>
            </div>
            </div>
            </div>
            <div class="ec-pro-content">
            <h5 class="ec-pro-title"><a href="javascript:void(0)" onclick="singleProduct('${val1.id}','ralawise')">${val.ProductName != "undefined" ? val1.Brand + ' ' + val1.ProductName : '-'}</a></h5>
            <!-- <div class="ec-pro-rating">
            <i class="ecicon eci-star fill"></i>
            <i class="ecicon eci-star fill"></i>
            <i class="ecicon eci-star fill"></i>
            <i class="ecicon eci-star fill"></i>
            <i class="ecicon eci-star"></i>
            </div> -->
            <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
            <span class="ec-price">
            <!-- <span class="old-price">$27.00</span> -->
            <span class="new-price">
            ${function calPrice() {
                                    priceHtml = ``;
                                    if (val1.SinglePrice != "undefined" && res.ralawise_pricing['service_charges_pp']) {
                                        var totalPrice = val1.SinglePrice * res.ralawise_pricing['service_charges_pp'];
                                        var discount = (totalPrice / 100) * res.ralawise_pricing['discount_per_percent'];
                                        var highestPrice = totalPrice - discount;

                                        var highDiscount = (totalPrice / 100) * res.ralawise_pricing_last['discount_per_percent'];
                                        var lowestPrice = totalPrice - highDiscount;
                                        priceHtml += '£' + lowestPrice.toFixed(2) + ' - ' + '£' + highestPrice.toFixed(2);
                                    } else {
                                        priceHtml += '-';
                                    }
                                    return priceHtml;
                                }()}

            </span>
            </span>
            <!-- <div class="ec-pro-option">
            <div class="ec-pro-color">
            <span class="ec-pro-opt-label">Color</span>
            <ul class="ec-opt-swatch ec-change-img">
            <li class="active"><a href="#" class="ec-opt-clr-img" data-src="{{ asset('public/assets/images/product-image/6_1.jpg') }}" data-src-hover="assets/images/product-image/6_1.jpg" data-tooltip="Gray"><span style="background-color:#e8c2ff;"></span></a></li>
            <li><a href="#" class="ec-opt-clr-img" data-src="{{ asset('public/assets/images/product-image/6_2.jpg') }}" data-src-hover="assets/images/product-image/6_2.jpg" data-tooltip="Orange"><span style="background-color:#9cfdd5;"></span></a></li>
            </ul>
            </div>
            <div class="ec-pro-size">
            <span class="ec-pro-opt-label">Size</span>
            <ul class="ec-opt-size">
            <li class="active"><a href="#" class="ec-opt-sz" data-old="$25.00" data-new="$20.00" data-tooltip="Small">S</a></li>
            <li><a href="#" class="ec-opt-sz" data-old="$27.00" data-new="$22.00" data-tooltip="Medium">M</a></li>
            <li><a href="#" class="ec-opt-sz" data-old="$30.00" data-new="$25.00" data-tooltip="Large">X</a></li>
            <li><a href="#" class="ec-opt-sz" data-old="$35.00" data-new="$30.00" data-tooltip="Extra Large">XL</a></li>
            </ul>
            </div>
            </div> -->
            </div>
            </div>
            </div>`;
                                    } else if (val1.type === "uneek") {
                                        html += `<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content" onclick="singleProduct('${val1.id}','uneek')">
            <div class="ec-product-inner">
            <div class="ec-pro-image-outer">
            <div class="ec-pro-image">
            <a href="javascript:void(0);" onclick="singleProduct('${val1.id}','uneek')" class="image">
            <img class="main-image" src="${val1.Model_Small_Image}" alt="Product" />
            <img class="hover-image" src="${val1.Model_Large_Image}" alt="Product" />
            </a>
            <!-- <span class="percentage">20%</span> -->
            <a href="#" class="quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#ec_quickview_modal"><img src="{{ asset('public/assets/images/icons/quickview.svg') }}" class="svg_img pro_svg" alt="" /></a>
            <div class="ec-pro-actions">
            <!-- <a href="compare.html" class="ec-btn-group compare" title="Compare"><img src="{{ asset('public/assets/images/icons/compare.svg') }}" class="svg_img pro_svg" alt="" /></a> -->
            <button title="Add To Cart" class=" add-to-cart"><img src="{{ asset('public/assets/images/icons/cart.svg') }}" class="svg_img pro_svg" alt="" /> Add To Cart</button>
            <a class="ec-btn-group wishlist" title="Wishlist"><img src="{{ asset('public/assets/images/icons/wishlist.svg') }}" class="svg_img pro_svg" alt="" /></a>
            </div>
            </div>
            </div>
            <div class="ec-pro-content">
            <h5 class="ec-pro-title"><a href="javascript:void(0)" onclick="singleProduct('${val1.id}','ralawise')">${val.Product_Name != "undefined" ? 'Uneek ' + val1.Product_Name : '-'}</a></h5>
            <!-- <div class="ec-pro-rating">
            <i class="ecicon eci-star fill"></i>
            <i class="ecicon eci-star fill"></i>
            <i class="ecicon eci-star fill"></i>
            <i class="ecicon eci-star fill"></i>
            <i class="ecicon eci-star"></i>
            </div> -->
            <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
            <span class="ec-price">
            <!-- <span class="old-price">$27.00</span> -->
            <span class="new-price">
            ${function calPrice() {
                                    priceHtml = ``;
                                    if (val1.Price_Single != "undefined" && res.uneek_pricing['service_charges_pp']) {
                                        var totalPrice = val1.Price_Single * res.uneek_pricing['service_charges_pp'];
                                        var discount = (totalPrice / 100) * res.uneek_pricing['discount_per_percent'];
                                        var highestPrice = totalPrice - discount;

                                        var highDiscount = (totalPrice / 100) * res.uneek_pricing_last['discount_per_percent'];
                                        var lowestPrice = totalPrice - highDiscount;
                                        priceHtml += '£' + lowestPrice.toFixed(2) + ' - ' + '£' + highestPrice.toFixed(2);
                                    } else {
                                        priceHtml += '-';
                                    }
                                    return priceHtml;
                                }()}
            </span>
            </span>
            <!-- <div class="ec-pro-option">
            <div class="ec-pro-color">
            <span class="ec-pro-opt-label">Color</span>
            <ul class="ec-opt-swatch ec-change-img">
            <li class="active"><a href="#" class="ec-opt-clr-img" data-src="{{ asset('public/assets/images/product-image/6_1.jpg') }}" data-src-hover="assets/images/product-image/6_1.jpg" data-tooltip="Gray"><span style="background-color:#e8c2ff;"></span></a></li>
            <li><a href="#" class="ec-opt-clr-img" data-src="{{ asset('public/assets/images/product-image/6_2.jpg') }}" data-src-hover="assets/images/product-image/6_2.jpg" data-tooltip="Orange"><span style="background-color:#9cfdd5;"></span></a></li>
            </ul>
            </div>
            <div class="ec-pro-size">
            <span class="ec-pro-opt-label">Size</span>
            <ul class="ec-opt-size">
            <li class="active"><a href="#" class="ec-opt-sz" data-old="$25.00" data-new="$20.00" data-tooltip="Small">S</a></li>
            <li><a href="#" class="ec-opt-sz" data-old="$27.00" data-new="$22.00" data-tooltip="Medium">M</a></li>
            <li><a href="#" class="ec-opt-sz" data-old="$30.00" data-new="$25.00" data-tooltip="Large">X</a></li>
            <li><a href="#" class="ec-opt-sz" data-old="$35.00" data-new="$30.00" data-tooltip="Extra Large">XL</a></li>
            </ul>
            </div>
            </div> -->
            </div>
            </div>
            </div>`;
                                    }

                                });
                            }
                            if (html.length > 0) {
                                console.log(res)
                                $('#products').html(html);
                                $('#pag-count').text('Showing ' + res.from_size + '-' + res.to_size + ' of ' + res.total_size + ' item(s)');
                            }
                        }
                    },
                    fail: function(err) {
                        console.log(err.responseJson);
                    }
                });
            }
</script>

@include('web.footer')