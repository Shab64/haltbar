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

                <!-- Shop content Start -->
                <div class="shop-pro-content">
                    <div class="shop-pro-inner">
                        <div class="row" id="products">

                            @if(!empty($products))
                            @foreach($products as $key => $product)

                            @if (!isset($product->type))
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                                <div class="ec-product-inner">
                                    <div class="ec-pro-image-outer">
                                        <div class="ec-pro-image">
                                            <a href="product-left-sidebar.html" class="image">
                                                <img class="main-image" src="{{ $product->image_url }}" alt="Product" />
                                                <img class="hover-image" src="{{ $product->image_url }}" alt="Product" />
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
                                        <h5 class="ec-pro-title"><a href="{{route('product-view', ['ralawise',$product->code])}}">{{ isset($product->title) ? $product->title : "-" }}</a></h5>
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
                                                @if(isset($product->single_list_price))
                                                <?php
                                                $totalPrice =  ($product->single_list_price * $ralawise_pricing['service_charges_pp']);
                                                $discount = ($totalPrice / 100) * $ralawise_pricing['discount_per_percent'];
                                                $highestPrice = $totalPrice - $discount;

                                                $highDiscount = ($totalPrice / 100) * $ralawise_pricing_last['discount_per_percent'];
                                                $lowestPrice = $totalPrice - $highDiscount;
                                                ?>
                                                {{ '$'.round($lowestPrice,2).' - '.'$'.round($highestPrice,2)}}
                                                @else
                                                -
                                                @endif
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                                <div class="ec-product-inner">
                                    <div class="ec-pro-image-outer">
                                        <div class="ec-pro-image">
                                            <a href="#" class="image">
                                                <img class="main-image" src="{{ $product->Model_Small_Image }}" alt="Product" />
                                                <img class="hover-image" src="{{ $product->Model_Small_Image }}" alt="Product" />
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
                                        <h5 class="ec-pro-title"><a href="{{route('product-view', ['uneek',$product->Product_Code])}}">{{ isset($product->Product_Name) ? 'Uneek '.$product->Product_Name : "-" }}</a></h5>
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
                                                @if(isset($product->Price_Single))
                                                <?php
                                                $totalPrice =  ($product->Price_Single * $uneek_pricing['service_charges_pp']);
                                                $discount = ($totalPrice / 100) * $uneek_pricing['discount_per_percent'];
                                                $highestPrice = $totalPrice - $discount;

                                                $highDiscount = ($totalPrice / 100) * $uneek_pricing_last['discount_per_percent'];
                                                $lowestPrice = $totalPrice - $highDiscount;
                                                ?>
                                                {{ '$'.round($lowestPrice,2).' - '.'$'.round($highestPrice,2)}}
                                                @else
                                                No Price
                                                @endif
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- Ec Pagination Start -->
                    {{$products->withQueryString()->links()}}
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
                        <form action="{{route('productSideFilter')}}" method="GET">
                            <!-- @csrf -->
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
                            <!-- <div class="ec-sidebar-block ec-sb-block-content">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Price</h3>
                                </div>
                                <div id="slider"></div>
                                <input id="sliderValueInput" name="price" type="hidden" value="">
                            </div> -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Brand</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <ul style="height: 200px;overflow: hidden;overflow-y: scroll">
                                        @foreach($brands as $b)
                                        <li>
                                            <div class="ec-sidebar-block-item">
                                                <input type="checkbox" class="my-brand" value="{{$b['brand']}}" name="brand[]" /><a href="#">{{$b['brand']}}</a><span class="checked"></span>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="ec-sidebar-block ec-sb-block-content">
                                <input type="submit" value="Apply Filters" class="btn btn-primary btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // var slider = noUiSlider.create($("#slider")[0], {
    //     start: [0, 200],
    //     connect: true,
    //     tooltips: true,
    //     range: {
    //         'min': 0,
    //         'max': 200
    //     },
    //     step: 0.1,

    // });
</script>

@include('web.footer')
