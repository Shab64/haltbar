<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Haltbar</title>
    <meta name="keywords" content="apparel, catalog, clean, ecommerce, ecommerce HTML, electronics, fashion, html eCommerce, html store, minimal, multipurpose, multipurpose ecommerce, online store, responsive ecommerce template, shops" />
    <meta name="description" content="Best ecommerce html template for single and multi vendor store.">
    <meta name="author" content="">

    <!-- site Favicon -->
    <link rel="icon" href="{{url('public')}}/assets/images/Favicon.png" sizes="32x32" />
    <!-- <link rel="apple-touch-icon" href="assets/images/favicon/favicon.png" /> -->
    <meta name="msapplication-TileImage" content="{{ asset('public/assets/web/images/favicon/favicon.png') }}" />

    <!-- css Icon Font -->
    <link rel="stylesheet" href="{{ asset('public/assets/web/css/vendor/ecicons.min.css') }}" />

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="{{ asset('public/assets/web/css/plugins/animate.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/assets/web/css/plugins/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/assets/web/css/plugins/jquery-ui.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/assets/web/css/plugins/countdownTimer.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/assets/web/css/plugins/slick.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/assets/web/css/plugins/bootstrap.css')}}" />

    <!-- Main Style -->

    <link rel="stylesheet" href="{{ asset('public/assets/web/css/demo1.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets/web/css/style.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/assets/web/css/responsive.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/assets/web/css/update.css')}}" />

    <!-- Background css -->
    <link rel="stylesheet" id="bg-switcher-css" href="{{ asset('public/assets/web/css/backgrounds/bg-4.css')}}">

    <script src="{{ asset('public/assets/web/js/vendor/jquery-3.5.1.min.js') }}"></script>
</head>

<?php //$s =session('cart'); var_dump($s);die; ?>
<body>
    <!-- <div id="ec-overlay"><span class="loader_img"></span></div> -->

    <!-- Header start  -->
    <header class="ec-header">
        <!--Ec Header Top Start -->
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Header Top social Start -->
                    <div class="col text-left header-top-left d-none d-lg-block">
                        <div class="header-top-social">
                            <span class="social-text text-upper">Follow us on:</span>
                            <ul class="mb-0">
                                <li class="list-inline-item"><a class="hdr-facebook" href="#"><i class="ecicon eci-facebook"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-twitter" href="#"><i class="ecicon eci-twitter"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-instagram" href="#"><i class="ecicon eci-instagram"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i class="ecicon eci-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Header Top social End -->
                    <!-- Header Top Message Start -->
                    <div class="col text-center header-top-center">
                        <div class="header-top-message text-upper">
                            <span>Free Shipping</span>This Week Order Over - $75
                        </div>
                    </div>
                    <!-- Header Top Message End -->
                    <!-- Header Top Language Currency -->
                    <div class="col header-top-right d-none d-lg-block">
                        <div class="header-top-lan-curr d-flex justify-content-end">
                            <!-- Currency Start -->
{{--                            <div class="header-top-curr dropdown">--}}
{{--                                <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Currency <i class="ecicon eci-caret-down" aria-hidden="true"></i></button>--}}
{{--                                <ul class="dropdown-menu">--}}
{{--                                    <li class="active"><a class="dropdown-item" href="#">USD $</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">EUR €</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
                            <!-- Currency End -->
                            <!-- Language Start -->

                            <!-- Language End -->

                        </div>
                    </div>
                    <!-- Header Top Language Currency -->
                    <!-- Header Top responsive Action -->
                    <div class="col d-lg-none ">
                        <div class="ec-header-bottons">
                            <!-- Header User Start -->
                            <div class="ec-header-user dropdown">
                                <button class="dropdown-toggle" data-bs-toggle="dropdown"><img src="{{ asset('public/assets/web/images/icons/user.svg')}}" class="svg_img header_svg" alt="" /></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    @if(empty(auth()->user()))
                                    <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
                                    <li><a class="dropdown-item" href="#">Login</a></li>
                                    @else
                                        <li><a class="dropdown-item" href="javascript:void(0)">{{auth()->user()->name}}</a></li>
                                    @endif
                                </ul>
                            </div>
                            <!-- Header User End -->
                            <!-- Header Cart Start -->
                            <a href="wishlist.php" class="ec-header-btn ec-header-wishlist">
                                <div class="header-icon"><img src="{{ asset('public/assets/web/images/icons/wishlist.svg')}}" class="svg_img header_svg" alt="" /></div>
                                <span class="ec-header-count">4</span>
                            </a>
                            <!-- Header Cart End -->

                            <!-- Header Cart Start -->
                            <a href="#ec-side-cart" id="openCart" class="ec-header-btn ec-side-toggle">
                                <div class="header-icon"><img src="{{ asset('public/assets/web/images/icons/cart.svg')}}" class="svg_img header_svg" alt="" /></div>
                                <span class="ec-header-count cart-count-lable">3</span>
                            </a>
                            <!-- Header Cart End -->
                            <!-- Header menu Start -->
                            <a href="#ec-mobile-menu" class="ec-header-btn ec-side-toggle d-lg-none">
                                <img src="{{ asset('public/assets/web/images/icons/menu.svg')}}" class="svg_img header_svg" alt="icon" />
                            </a>
                            <!-- Header menu End -->
                        </div>
                    </div>
                    <!-- Header Top responsive Action -->
                </div>
            </div>
        </div>
        <!-- Ec Header Top  End -->
        <!-- Ec Header Bottom  Start -->
        <div class="ec-header-bottom d-none d-lg-block">
            <div class="container position-relative">
                <div class="row">
                    <div class="ec-flex">
                        <!-- Ec Header Logo Start -->
                        <div class="align-self-center">
                            <div class="header-logo">
                                <a href="index.html"><img src="{{ asset('public/assets/web/images/haltbar.png')}}" alt="Site Logo" /></a>
                            </div>
                        </div>
                        <!-- Ec Header Logo End -->

                        <!-- Ec Header Search Start -->
                        <div class="align-self-center">
                            <div class="header-search">
                                <form class="ec-btn-group-form" action="{{route('search_products')}}" method="get" autocomplete="off">
                                    <input class="form-control" placeholder="Enter Your Product Name..." type="search" name="s" id="search_bar">
                                    <button id="search_btn" class="submit" type="submit"><img src="{{ asset('public/assets/web/images/icons/search.svg')}}" class="svg_img header_svg" alt="" /></button>
                                </form>
                            </div>
                        </div>
                        <!-- Ec Header Search End -->

                        <!-- Ec Header Button Start -->
                        <div class="align-self-center">
                            <div class="ec-header-bottons">

                                <!-- Header User Start -->
                                <div class="ec-header-user dropdown">
                                    <button class="dropdown-toggle" data-bs-toggle="dropdown"><img src="{{ asset('public/assets/web/images/icons/user.svg') }}" class="svg_img header_svg" alt="" /></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        @if(empty(auth()->user()))
                                            <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
                                            <li><a class="dropdown-item" href="#">Login</a></li>
                                        @else
                                            <li><a class="dropdown-item" href="javascript:void(0)">{{auth()->user()->name}}</a></li>
                                            <li><a class="dropdown-item" href="#">Profile</a></li>
                                            <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                                        @endif
                                    </ul>
                                </div>

                                <!-- Header wishlist End -->
                                <!-- Header Cart Start -->
                                <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                                    <div class="header-icon"><img src="{{ asset('public/assets/web/images/icons/cart.svg')}}" class="svg_img header_svg" alt="" /></div>
                                    <span id="cartCount" class="ec-header-count cart-count-lable">{{ session('cart') ? count(session('cart')) : 0 }}</span>
                                </a>
                                <!-- Header Cart End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec Header Button End -->
        <!-- Header responsive Bottom  Start -->
        <div class="ec-header-bottom d-lg-none">
            <div class="container position-relative">
                <div class="row ">

                    <!-- Ec Header Logo Start -->
                    <div class="col">
                        <div class="header-logo">
                            <!-- <a href="index.html"><img src="{{ asset('public/assets/web/images/logo/logo.png') }}" alt="Site Logo" /><img class="dark-logo" src="assets/images/logo/dark-logo.png" alt="Site Logo" style="display: none;" /></a> -->
                        </div>
                    </div>
                    <!-- Ec Header Logo End -->
                    <!-- Ec Header Search Start -->
                    <div class="col">
                        <div class="header-search">
                            <form class="ec-btn-group-form" action="#">
                                <input class="form-control" placeholder="Enter Your Product Name..." type="text">
                                <button class="submit" type="submit"><img src="{{ asset('public/assets/web/images/icons/search.svg')}}" class="svg_img header_svg" alt="icon" /></button>
                            </form>
                        </div>
                    </div>
                    <!-- Ec Header Search End -->
                </div>
            </div>
        </div>
        <!-- Header responsive Bottom  End -->
        <!-- EC Main Menu Start -->
        <div id="ec-main-menu-desk" class="d-none d-lg-block sticky-nav">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-md-12 align-self-center">
                        <div class="ec-main-menu">
                            <ul>
                                <li><a href="{{ Route('index') }}">Home</a></li>
                                <li class="dropdown position-static"><a href="javascript:void(0)">All Products</a>
                                    <ul class="mega-menu d-block">

                                        <li class="d-flex">
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="{{route('products_by_type', 'T-Shirt')}}">Tshirt</a></li>
                                                <li><a class="p-3" href="{{route('products_by_type', 'T-Shirt')}}"><img class="img-responsive" src="{{ asset('public/assets/web/images/categories/T Shirts.jpg')}}" alt=""></a></li>
                                                <li class="menu_title"><a href="{{route('products_by_type', 'Sweatshirt')}}">Sweatshirts</a></li>
                                                <li><a class="p-3" href="{{route('products_by_type', 'Sweatshirt')}}"><img class="img-responsive" src="{{ asset('public/assets/web/images/categories/Sweatshirts.jpg')}}" alt=""></a></li>
                                                <li class="menu_title"><a href="{{route('products_by_type', 'Fleece')}}">Fleeces</a></li>
                                                <li><a class="p-3" href="{{route('products_by_type', 'Fleece')}}"><img class="img-responsive" src="{{ asset('public/assets/web/images/haltbar.png')}}" alt=""></a></li>

                                            </ul>
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="{{route('products_by_type', 'Polo')}}">Polo Shirts</a></li>
                                                <li><a class="p-3" href="{{route('products_by_type', 'Polo')}}"><img class="img-responsive" src="{{ asset('public/assets/web/images/categories/Polos.jpg')}}" alt=""></a></li>
                                                <li class="menu_title"><a href="{{route('products_by_type', 'Hood')}}">Hoodies</a></li>
                                                <li><a class="p-3" href="{{route('products_by_type', 'Hood')}}"><img class="img-responsive" src="{{ asset('public/assets/web/images/categories/Hoodies.jpg')}}" alt=""></a></li>
                                                <li class="menu_title"><a href="{{route('products_by_type', 'Jacket')}}">Jackets</a></li>
                                                <li><a class="p-3" href="{{route('products_by_type', 'Jacket')}}"><img class="img-responsive" src="{{ asset('public/assets/web/images/categories/Jackets.jpg')}}" alt=""></a></li>

                                            </ul>
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Clothing</a></li>
                                                <li><a href="{{route('products_by_type', 'Polo')}}">Polo Shirts</a></li>
                                                <li><a href="{{route('products_by_type', 'Sweatshirt')}}">Sweatshirts</a></li>
                                                <li><a href="{{route('products_by_type', 'Hood')}}">Hoodies</a></li>
                                                <li><a href="{{route('products_by_type', 'Fleece')}}">Fleeces</a></li>
                                                <li><a href="{{route('products_by_type', 'Jacket')}}">Coats / Jackets</a></li>
                                                <li><a href="{{route('products_by_type', 'Gilet')}}">Bodywarmers &amp; Gilets</a></li>
                                                <li><a href="{{route('products_by_type', 'Suit Jacket')}}">Formal / Corporate</a></li>
                                                <li><a href="{{route('products_by_type', 'Headwear')}}">Headwear</a></li>
                                                <li><a href="{{route('products_by_type', 'Jumper')}}">Knitwear</a></li>
                                                <li><a href="{{route('products_by_type', 'Legging')}}">Leggings</a></li>
                                                <li><a href="{{route('products_by_type', 'Blouse')}}">Shirts &amp; Blouses</a></li>
                                            </ul>
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Accessories</a></li>
                                                <li><a href="{{route('products_by_type', 'Bag')}}">Bags</a></li>
                                                <li><a href="{{route('products_by_type', 'Face Mask')}}">Face Masks</a></li>
                                                <li><a href="{{route('products_by_type', 'Footwear')}}">Footwear</a></li>
                                                <li><a href="{{route('products_by_type', 'Headwear')}}">Headwear</a></li>
                                                <li><a href="{{route('products_by_type', 'Towel')}}">Towels</a></li>

                                                <li class="menu_title"><a href="javascript:void(0)">Junior / Kids</a></li>

                                                <li><a href="{{route('products_by_type', ['All in One?g=Infants'])}}">Baby &amp; Toddler</a></li>
                                                <li><a href="{{route('products_by_type', ['Hood?g=Kids'])}}">Hoodies</a></li>
                                                <li><a href="{{route('products_by_type', ['Jacket?g=Kids'])}}">Jackets</a></li>
                                                <li><a href="{{route('products_by_type', ['-?g=Kids?l=Sports'])}}">Kids Sports</a></li>
                                                <li><a href="{{route('products_by_type', ['-?g=Kids?l=Schoolwear'])}}">Schoolwear</a></li>
                                                <li><a href="{{route('products_by_type', ['T-Shirt?g=Kids'])}}">T-shirts</a></li>

                                            </ul>
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Workwear</a></li>

                                                <li><a href="{{route('products_by_type', 'Apron')}}">Aprons</a></li>
                                                <li><a href="{{route('products_by_type', ['-?g=?l=Chefswear'])}}">Chefwear</a></li>
                                                <li><a href="{{route('products_by_type', 'Footwear')}}">Footwear</a></li>
                                                <!-- <li><a href="#">Health &amp; Beauty</a></li> -->
                                                <li><a href="{{route('products_by_type', ['-?g=?l=Hi-Vis'])}}">Hi-Vis</a></li>
                                                <li><a href="{{route('products_by_type', 'Jumper')}}">Knitwear</a></li>
                                                <li><a href="{{route('products_by_type', 'Coverall')}}">Coveralls</a></li>
                                                <!-- <li><a href="#">PPE</a></li> -->
                                                <li><a href="{{route('products_by_type', 'Blouse')}}">Shirts &amp; Blouses</a></li>
                                                <li><a href="{{route('products_by_type', 'Trousers')}}">Trousers</a></li>
                                                <li><a href="{{route('products_by_type', 'Suit Jacket')}}">Workwear Jackets</a></li>

                                            </ul>
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Sportswear</a></li>
                                                <!-- <li><a href="#">Baselayers</a></li> -->
                                                <li><a href="{{route('products_by_type', ['-?g=?l=Sports Accessories'])}}">Sports Accessories</a></li>
                                                <li><a href="{{route('products_by_type', ['T-Shirt?g=?l=Sports'])}}">Sportswear T-shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['Polo?g=?l=Sports'])}}">Sportswear Polo Shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['T-Shirt?g=?l=Rugby'])}}">Rugby Shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['Hood?g=?l=Sports'])}}">Sportswear Hoodies</a></li>
                                                <li><a href="{{route('products_by_type', ['Sweatshirt?g=?l=Sports'])}}">Sportswear Sweatshirts</a></li>
                                                <li><a href="{{route('products_by_type', ['Fleece?g=?l=Sports'])}}">Sportswear Fleeces</a></li>
                                                <li><a href="{{route('products_by_type', ['Jacket?g=?l=Sports'])}}">Sportswear Jackets</a></li>
                                                <li><a href="{{route('products_by_type', ['Trousers?g=?l=Sports'])}}">Sportswear Trousers</a></li>
                                                <li><a href="{{route('products_by_type', ['Shorts?g=?l=Sports'])}}">Sportswear Shorts</a></li>
                                                <li><a href="{{route('products_by_type', ['Headwear?g=?l=Sports'])}}">Sports Headwear</a></li>
                                                <li><a href="{{route('products_by_type', ['Legging?g=?l=Sports'])}}">Sportswear Leggings</a></li>
                                                <li><a href="{{route('products_by_type', ['Bag?g=?l=Sports'])}}">Sports Bags</a></li>

                                            </ul>
                                        </li>

                                    </ul>
                                </li>

                                <li class="dropdown position-static"><a href="javascript:void(0)">T-Shirts</a>
                                    <ul class="mega-menu d-block">

                                        <li class="d-flex">
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Tshirt</a></li>
                                                <li><a class="p-3" href="{{route('products_by_type', 'T-Shirt')}}"><img class="img-responsive" src="{{ asset('public/assets/web/images/categories/T Shirts.jpg')}}" alt=""></a></li>
                                            </ul>
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Gender</a></li>

                                                <li><a href="{{route('products_by_type', ['T-Shirt?g=Unisex'])}}">Unisex T-shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['T-Shirt?g=Mens'])}}">Men's T-shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['T-Shirt?g=Ladies'])}}">Women's T-Shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['T-Shirt?g=Kids'])}}">Kids T-Shirts</a></li>

                                            </ul>
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Type</a></li>

                                                <li><a href="{{route('products_by_type', ['T-Shirt?fabric=100% Cotton.'])}}">100% Cotton</a></li>
                                                <li><a href="{{route('products_by_type', ['T-Shirt?attr=Contrast'])}}">Contrast T-Shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['T-Shirt?attr=Crew Neck'])}}">Crew Neck T-Shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['T-Shirt?attr=Light'])}}">Lightweight T-Shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['T-Shirt?attr=Heavy'])}}">Heavyweight T-Shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['T-Shirt?attr=Organic'])}}">Organic T-Shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['T-Shirt?attr=V Neck'])}}">V-neck T-Shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['T-Shirt?attr=Workwear'])}}">Workwear T-Shirts</a></li>


                                            </ul>
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Brands</a></li>

                                                <li><a href="{{route('products_by_type', ['T-Shirt?brand=Anthem'])}}">Anthem</a></li>
                                                <li><a href="{{route('products_by_type', ['T-Shirt?brand=Just Cool'])}}">AWDis Just Cool</a></li>
                                                <li><a href="{{route('products_by_type', ['T-Shirt?brand=Just Ts'])}}">AWDis Just T's</a></li>
                                                <!-- <li><a href="{{route('products_by_type', ['T-Shirt?brand=Anthem'])}}">B &amp; C Collection</a></li> -->
                                                <li><a href="{{route('products_by_type', ['T-Shirt?brand=Bella+Canvas'])}}">Bella+Canvas</a></li>
                                                <li><a href="{{route('products_by_type', ['T-Shirt?brand=Fruit of the Loom'])}}">Fruit of the Loom</a></li>
                                                <li><a href="{{route('products_by_type', ['T-Shirt?brand=Gildan'])}}">Gildan</a></li>
                                                <li><a href="{{route('products_by_type', ['T-Shirt?brand=Regatta Sport'])}}">Regatta Sport</a></li>
                                                <li><a href="{{route('products_by_type', ['T-Shirt?brand=SF'])}}">SF </a></li>
                                                <li><a href="{{route('products_by_type', ['T-Shirt?brand=Stormtech'])}}">Stormtech</a></li>
                                                <li><a href="{{route('products_by_type', ['T-Shirt?brand=Tombo'])}}">Tombo</a></li>
                                                <!-- <li><a href="{{route('products_by_type', ['T-Shirt?brand=Anthem'])}}">TriDri®</a></li> -->
                                                <li><a href="{{route('products_by_type', ['T-Shirt?brand=uneek'])}}">Uneek Clothing</a></li>


                                            </ul>
                                        </li>

                                    </ul>
                                </li>

                                <li class="dropdown position-static"><a href="javascript:void(0)">Polo Shirts</a>
                                    <ul class="mega-menu d-block">

                                        <li class="d-flex">
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Polo Shirts</a></li>
                                                <li><a class="p-3" href="#"><img class="img-responsive" src="{{ asset('public/assets/web/images/categories/Polos.jpg') }}" alt=""></a></li>
                                            </ul>
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Gender</a></li>

                                                <li><a href="{{route('products_by_type', ['Polo?g=Unisex'])}}">Unisex Polo Shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['Polo?g=Mens'])}}">Men's Polo Shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['Polo?g=Ladies'])}}">Women's Polo Shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['Polo?g=Kids'])}}">Kids Polo Shirts</a></li>

                                            </ul>
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Type</a></li>


                                                <li><a href="{{route('products_by_type', ['Polo?fabric=100% Cotton.'])}}">100% Cotton Polo Shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['Polo?attr=Classic'])}}">Classic Fit Polo Shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['Polo?attr=Contrast'])}}">Contrast Polo Shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['Polo?attr=Heavy'])}}">Heavyweight Polo Shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['Polo?attr=Light'])}}">Lightweight Polo Shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['Polo?attr=Long Sleeve'])}}">Long Sleeve Polo Shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['Polo?attr=Organic'])}}">Organic Polo Shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['Polo?attr=Short Sleeve'])}}">Short Sleeve Polo Shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['Polo?attr=Slim Fit'])}}">Slim Fit Polo Shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['Polo?attr=Workwear'])}}">Workwear Polo Shirts</a></li>



                                            </ul>
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Brands</a></li>


                                                <!-- <li><a href="{{route('products_by_type', ['Polo?brand=Tombo'])}}">Asquith &amp; Fox</a></li> -->
                                                <li><a href="{{route('products_by_type', ['Polo?brand=Just Polos'])}}">AWDis Just Polo's</a></li>
                                                <li><a href="{{route('products_by_type', ['Polo?brand=Fruit of the Loom'])}}">Fruit of the Loom</a></li>
                                                <li><a href="{{route('products_by_type', ['Polo?brand=Gildan'])}}">Gildan</a></li>
                                                <li><a href="{{route('products_by_type', ['Polo?brand=Henbury'])}}">Henbury</a></li>
                                                <li><a href="{{route('products_by_type', ['Polo?brand=Kustom Kit'])}}">Kustom Kit</a></li>
                                                <!-- <li><a href="{{route('products_by_type', ['Polo?brand=Tombo'])}}">Orn Clothing</a></li> -->
                                                <li><a href="{{route('products_by_type', ['Polo?brand=Portwest'])}}">Portwest</a></li>
                                                <li><a href="{{route('products_by_type', ['Polo?brand=Premier'])}}">Premier</a></li>
                                                <li><a href="{{route('products_by_type', ['Polo?brand=Pro RTX'])}}">Pro RTX</a></li>
                                                <li><a href="{{route('products_by_type', ['Polo?brand=Russell'])}}">Russell Collection</a></li>
                                                <li><a href="{{route('products_by_type', ['Polo?brand=uneek'])}}">Uneek Clothing</a></li>

                                            </ul>
                                        </li>

                                    </ul>
                                </li>

                                <li class="dropdown position-static"><a href="javascript:void(0)">Hoodies</a>
                                    <ul class="mega-menu d-block">

                                        <li class="d-flex">
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Hoodies</a></li>
                                                <li><a class="p-3" href="#"><img class="img-responsive" src="{{ asset('public/assets/web/images/categories/Hoodies.jpg') }}" alt=""></a></li>
                                            </ul>
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Gender</a></li>

                                                <li><a href="{{route('products_by_type', ['Hood?g=Unisex'])}}">Unisex Hoodies</a></li>
                                                <li><a href="{{route('products_by_type', ['Hood?g=Mens'])}}">Men's Hoodies</a></li>
                                                <li><a href="{{route('products_by_type', ['Hood?g=Ladies'])}}">Women's Hoodies</a></li>
                                                <li><a href="{{route('products_by_type', ['Hood?g=Kids'])}}">Kids Hoodies</a></li>



                                            </ul>
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Type</a></li>

                                                <li><a href="{{route('products_by_type', ['Hood?attr=Classic'])}}">Classic Hoodies</a></li>
                                                <li><a href="{{route('products_by_type', ['Hood?attr=Contrast'])}}">Contrast Hoodies</a></li>
                                                <li><a href="{{route('products_by_type', ['Hood?attr=Cropped'])}}">Cropped Hoodies</a></li>
                                                <li><a href="{{route('products_by_type', ['Hood?attr=Full Zip'])}}">Full Zip Hoodies</a></li>
                                                <li><a href="{{route('products_by_type', ['Hood?attr=Heavy'])}}">Heavyweight Hoodies</a></li>
                                                <li><a href="{{route('products_by_type', ['Hood?attr=Light'])}}">Lightweight Hoodies</a></li>
                                                <li><a href="{{route('products_by_type', ['Hood?attr=Midweight'])}}">Midweight Hoodies</a></li>
                                                <li><a href="{{route('products_by_type', ['Hood?attr=Organic'])}}">Organic Hoodies</a></li>

                                            </ul>
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Brands</a></li>


                                                <li><a href="{{route('products_by_type', ['Hood?brand=Anthem'])}}">Anthem</a></li>
                                                <li><a href="{{route('products_by_type', ['Hood?brand=Just Cool'])}}">AWDis Just Cool</a></li>
                                                <li><a href="{{route('products_by_type', ['Hood?brand=Just Hoods'])}}">AWDis Just Hoods</a></li>
                                                <!-- <li><a href="{{route('products_by_type', ['Hood?brand=Russell'])}}">B &amp; C Collection</a></li> -->
                                                <li><a href="{{route('products_by_type', ['Hood?brand=Bella+Canvas'])}}">Bella+Canvas</a></li>
                                                <!-- <li><a href="{{route('products_by_type', ['Hood?brand=Russell'])}}">Build Your Brand</a></li> -->
                                                <li><a href="{{route('products_by_type', ['Hood?brand=Fruit of the Loom'])}}">Fruit of the Loom</a></li>
                                                <li><a href="{{route('products_by_type', ['Hood?brand=Gildan'])}}">Gildan</a></li>
                                                <li><a href="{{route('products_by_type', ['Hood?brand=Russell'])}}">Russell Collection</a></li>
                                                <li><a href="{{route('products_by_type', ['Hood?brand=Next Level Apparel'])}}">Next Level Apparel</a></li>
                                                <!-- <li><a href="#">Uneek Clothing</a></li> -->




                                            </ul>
                                        </li>

                                    </ul>
                                </li>

                                <li class="dropdown position-static"><a href="javascript:void(0)">Jackets</a>
                                    <ul class="mega-menu d-block">

                                        <li class="d-flex">
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Jackets</a></li>
                                                <li><a class="p-3" href="#"><img class="img-responsive" src="{{ asset('public/assets/web/images/categories/Jackets.jpg') }}" alt=""></a></li>
                                            </ul>
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Gender</a></li>

                                                <ul class="cbp-links cbp-valinks cbp-valinks-vertical">
                                                    <li><a href="{{route('products_by_type', ['Jacket?g=Unisex'])}}">Unisex Hoodies</a></li>
                                                    <li><a href="{{route('products_by_type', ['Jacket?g=Mens'])}}">Men's Hoodies</a></li>
                                                    <li><a href="{{route('products_by_type', ['Jacket?g=Ladies'])}}">Women's Hoodies</a></li>
                                                    <li><a href="{{route('products_by_type', ['Jacket?g=Kids'])}}">Kids Hoodies</a></li>
                                                </ul>



                                            </ul>
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Type</a></li>

                                                <li><a href="{{route('products_by_type', ['Jacket?attr=Bodywarmers'])}}">Bodywarmers</a></li>
                                                <li><a href="{{route('products_by_type', ['Jacket?attr=Gilet'])}}">Gilet</a></li>
                                                <li><a href="{{route('products_by_type', ['Jacket?attr=Fleece'])}}">Fleece Jackets</a></li>
                                                <li><a href="{{route('products_by_type', ['Jacket?attr=Soft Shell'])}}">Softshell Jackets</a></li>
                                                <li><a href="{{route('products_by_type', ['Jacket?attr=Bombers'])}}">Bomber Jackets</a></li>
                                                <!-- <li><a href="{{route('products_by_type', ['Jacket?attr=Organic'])}}">Technical Jackets</a></li> -->
                                                <!-- <li><a href="{{route('products_by_type', ['Jacket?attr=Organic'])}}">Parker Jackets</a></li> -->
                                                <!-- <li><a href="{{route('products_by_type', ['Jacket?attr=Organic'])}}">Puffa Jackets</a></li> -->
                                                <li><a href="{{route('products_by_type', ['Tunic?attr=Chef'])}}">Chefs Jackets</a></li>
                                                <!-- <li><a href="{{route('products_by_type', ['Jacket?attr=Organic'])}}">Blazers</a></li> -->
                                                <!-- <li><a href="{{route('products_by_type', ['Jacket?attr=Organic'])}}">Sustainable Jackets</a></li> -->
                                            </ul>
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Brands</a></li>
                                                <!-- <li><a href="{{route('products_by_type', ['Jacket?brand=Russell'])}}">2786</a></li> -->
                                                <!-- <li><a href="{{route('products_by_type', ['Jacket?brand=Russell'])}}">B &amp; C Collection</a></li> -->
                                                <!-- <li><a href="{{route('products_by_type', ['Jacket?brand=Russell'])}}">Build Your Brand</a></li> -->
                                                <li><a href="{{route('products_by_type', ['Jacket?brand=Henbury'])}}">Henbury</a></li>
                                                <li><a href="{{route('products_by_type', ['Jacket?brand=Kariban'])}}">Kariban</a></li>
                                                <!-- <li><a href="{{route('products_by_type', ['Jacket?brand=Russell'])}}">Nimbus</a></li> -->
                                                <li><a href="{{route('products_by_type', ['Jacket?brand=Portwest'])}}">Portwest</a></li>
                                                <li><a href="{{route('products_by_type', ['Jacket?brand=Regatta'])}}">Regatta Professional</a></li>
                                                <li><a href="{{route('products_by_type', ['Jacket?brand=Result Urban'])}}">Result Urban</a></li>
                                                <!-- <li><a href="{{route('products_by_type', ['Jacket?brand=Russell'])}}">Result Workguard</a></li> -->
                                                <li><a href="{{route('products_by_type', ['Jacket?brand=Russell'])}}">Russell Collection</a></li>
                                                <li><a href="{{route('products_by_type', ['Jacket?brand=Stormtech'])}}">Stormtech</a></li>
                                            </ul>
                                        </li>

                                    </ul>
                                </li>

                                <li class="dropdown position-static"><a href="javascript:void(0)">Workwear</a>
                                    <ul class="mega-menu d-block">

                                        <li class="d-flex">
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Workwear</a></li>
                                                <li><a class="p-3" href="#"><img class="img-responsive" src="{{ asset('public/assets/web/images/categories/PPE.jpg') }}" alt=""></a></li>
                                            </ul>
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Gender</a></li>
                                                <li><a href="{{route('products_by_type', ['-?g=Unisex?l=Workwear'])}}">Unisex Workwear</a></li>
                                                <li><a href="{{route('products_by_type', ['-?g=Mens?l=Workwear'])}}">Men's Workwear</a></li>
                                                <li><a href="{{route('products_by_type', ['-?g=Ladies?l=Workwear'])}}">Women's Workwear</a></li>
                                            </ul>
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Type</a></li>

                                                <li><a href="{{route('products_by_type', 'Apron')}}">Aprons</a></li>
                                                <li><a href="{{route('products_by_type', ['-?g=?l=Chefswear'])}}">Chefwear</a></li>
                                                <li><a href="{{route('products_by_type', 'Footwear')}}">Footwear</a></li>
                                                <!-- <li><a href="#">Health &amp; Beauty</a></li> -->
                                                <li><a href="{{route('products_by_type', ['-?g=?l=Hi-Vis'])}}">Hi-Vis</a></li>
                                                <li><a href="{{route('products_by_type', 'Jumper')}}">Knitwear</a></li>
                                                <li><a href="{{route('products_by_type', 'Coverall')}}">Coveralls</a></li>
                                                <!-- <li><a href="#">PPE</a></li> -->
                                                <li><a href="{{route('products_by_type', 'Blouse')}}">Shirts &amp; Blouses</a></li>
                                                <li><a href="{{route('products_by_type', 'Trousers')}}">Trousers</a></li>
                                                <li><a href="{{route('products_by_type', 'Suit Jacket')}}">Workwear Jackets</a></li>

                                            </ul>
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Brands</a></li>

                                                <li><a href="{{route('products_by_type', ['Shirt?brand=Brook Taverner'])}}">Brook Taverner</a></li>
                                                <li><a href="{{route('products_by_type', ['Shirt?brand=Henbury'])}}">Henbury</a></li>
                                                <li><a href="{{route('products_by_type', ['Shirt?brand=Kustom Kit'])}}">Kustom Kit</a></li>
                                                <!-- <li><a href="{{route('products_by_type', ['Shirt?brand=Stormtech'])}}">Orn Clothing</a></li> -->
                                                <!-- <li><a href="{{route('products_by_type', ['Shirt?brand=Portwest'])}}">Portwest</a></li> -->
                                                <li><a href="{{route('products_by_type', ['Shirt?brand=Premier'])}}">Premier</a></li>
                                                <!-- <li><a href="{{route('products_by_type', ['Shirt?brand=Pro RTX'])}}">Pro RTX</a></li> -->
                                                <li><a href="{{route('products_by_type', ['Shirt?brand=NEOBLU'])}}">NEOBLU</a></li>
                                                <li><a href="{{route('products_by_type', ["Shirt?brand=SOL'S"])}}">SOL'S</a></li>
                                                <!-- <li><a href="{{route('products_by_type', ['Shirt?brand=Result Work-Guard'])}}">Result Workguard</a></li> -->
                                                <li><a href="{{route('products_by_type', ['Shirt?brand=Yoko'])}}">Yoko</a></li>
                                                <li><a href="{{route('products_by_type', ['Workwear?brand=uneek'])}}">Uneek Clothing</a></li>

                                            </ul>
                                        </li>

                                    </ul>
                                </li>
                                <li class="dropdown position-static"><a href="javascript:void(0)">Sustainable</a>
                                    <ul class="mega-menu d-block">

                                        <li class="d-flex">
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Sustainable</a></li>
                                                <li><a class="p-3" href="#"><img class="img-responsive" src="{{ asset('public/assets/web/images/haltbar.png')}}" alt=""></a></li>
                                            </ul>
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Gender</a></li>
                                                <li><a href="{{route('products_by_type', ['-?g=Unisex?l=Sustainable'])}}">Unisex Sustainable</a></li>
                                                <li><a href="{{route('products_by_type', ['-?g=Mens?l=Sustainable'])}}">Men's Sustainable</a></li>
                                                <li><a href="{{route('products_by_type', ['-?g=Ladies?l=Sustainable'])}}">Women's Sustainable</a></li>
                                                <li><a href="{{route('products_by_type', ['-?g=Kids?l=Sustainable'])}}">Kids Sustainable</a></li>
                                            </ul>
                                            <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Type</a></li>

                                                <li><a href="{{route('products_by_type', ['T-Shirt?g=?l=Sustainable'])}}">Sustainable T-shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['Polo?g=?l=Sustainable'])}}">Sustainable Polo shirts</a></li>
                                                <li><a href="{{route('products_by_type', ['Sweatshirt?g=?l=Sustainable'])}}">Sustainable Sweatshirts</a></li>
                                                <li><a href="{{route('products_by_type', ['Hood?g=?l=Sustainable'])}}">Sustainable Hoodies</a></li>
                                                <li><a href="{{route('products_by_type', ['Fleece?g=?l=Sustainable'])}}">Sustainable Fleeces</a></li>
                                                <li><a href="{{route('products_by_type', ['Jacket?g=?l=Sustainable'])}}">Sustainable Jackets</a></li>
                                                <li><a href="{{route('products_by_type', ['Trousers?g=?l=Sustainable'])}}">Sustainable Trousers & Leggings</a></li>
                                                <li><a href="{{route('products_by_type', ['Headwear?g=?l=Sustainable'])}}">Sustainable Headwear</a></li>
                                                <li><a href="{{route('products_by_type', ['Bag?g=?l=Sustainable'])}}">Sustainable Bags</a></li>

                                            </ul>
                                            <!-- <ul class="d-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Brands</a></li>

                                                <li><a href="#">Anthem</a></li>
                                                <li><a href="#">Asquith &amp; Fox</a></li>
                                                <li><a href="#">AWDis Ecologie</a></li>
                                                <li><a href="#">AWDis Just Hoods</a></li>
                                                <li><a href="#">B &amp; C Collection</a></li>
                                                <li><a href="#">Babybugz</a></li>
                                                <li><a href="#">Beechfield</a></li>
                                                <li><a href="#">Kariban</a></li>
                                                <li><a href="#">Regatta Honestly Made</a></li>
                                                <li><a href="#">Result Genuine Recycled</a></li>
                                                <li><a href="#">Stanley/Stella</a></li>
                                                <li><a href="#">Westford Mill</a></li>

                                            </ul> -->
                                        </li>

                                    </ul>
                                </li>

                                <li class="dropdown"><a href="javascript:void(0)">Others</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ url('about') }}">About us</a></li>
                                        <li><a href="{{ url('contact') }}">Contact Us</a></li>
                                        <li><a href="{{ url('blogs') }}">Blogs</a></li>
                                        <li><a href="{{ url('/delivery') }}">Delivery</a></li>
                                        <li><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
                                        <li><a href="{{ url('/return') }}">Return Policy</a></li>
                                        <li><a href="{{ url('/cookies') }}">Cookies Policy</a></li>
                                        <li><a href="{{ url('/personaldata') }}">Personal Data Protection Policy</a></li>
                                        <li><a href="{{ url('/termandcondition') }}">Term And Condition</a></li>
                                    </ul>
                                </li>


                                {{-- <li><a href="{{ Route('view.page',['blogs'])}}">Blogs</a></li>--}}
                                {{-- <li><a href="{{ url('faq') }}">FAQs</a></li> --}}
                                <!-- <li><a href="#">Hot Offers</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec Main Menu End -->
        <!-- ekka Mobile Menu Start -->
        <div id="ec-mobile-menu" class="ec-side-cart ec-mobile-menu">
            <div class="ec-menu-title">
                <span class="menu_title">My Menu</span>
                <button class="ec-close">×</button>
            </div>
            <div class="ec-menu-inner">
                <div class="ec-menu-content">
                    <ul>
                        <li><a href="{{ Route('index') }}">Home</a></li>
                        <li><a href="{{ Route('products')}}">Products</a></li>
                        {{-- <li><a href="{{ Route('view.page',['blogs'])}}">Blogs</a></li>--}}
                        {{-- <li><a href="{{ Route('view.page',['faq'])}}">FAQs</a></li>--}}
                        <li><a href="javascript:void(0)">Hot Offers</a></li>
                    </ul>
                </div>
                <div class="header-res-lan-curr">
                    <div class="header-top-lan-curr">
                        <!-- Language Start -->
                        <!-- Language End -->
                        <!-- Currency Start -->
{{--                        <div class="header-top-curr dropdown">--}}
{{--                            <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Currency <i class="ecicon eci-caret-down" aria-hidden="true"></i></button>--}}
{{--                            <ul class="dropdown-menu">--}}
{{--                                <li class="active"><a class="dropdown-item" href="#">USD $</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#">EUR €</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        <!-- Currency End -->
                    </div>
                    <!-- Social Start -->
                    <div class="header-res-social">
                        <div class="header-top-social">
                            <ul class="mb-0">
                                <li class="list-inline-item"><a class="hdr-facebook" href="#"><i class="ecicon eci-facebook"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-twitter" href="#"><i class="ecicon eci-twitter"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-instagram" href="#"><i class="ecicon eci-instagram"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i class="ecicon eci-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Social End -->
                </div>
            </div>
        </div>
        <!-- ekka mobile Menu End -->
    </header>
    <!-- Header End  -->

    <!-- ekka Cart Start -->
    <div class="ec-side-cart-overlay"></div>
    <div id="ec-side-cart" class="ec-side-cart">
        <div class="ec-cart-inner">
            <div class="ec-cart-top">
                <div class="ec-cart-title">
                    <span class="cart_title">My Cart</span>
                    <button class="ec-close">×</button>
                </div>
                <ul class="eccart-pro-items">

                    <?php $sub_total = 0 ?>
                    <?php $vat = 0 ?>
                    <?php $total = 0 ?>
                    @if (session('cart'))
                    @foreach (session('cart') as $k=>$product)
                    <?php $sub_total += $product['item_total'] ?>
                    <?php $vat = $sub_total / 100 * 20; ?>
                    <?php $total = $sub_total + $vat ?>

                    <li id="removeProduct{{$k}}">
                        <a href="#" class="sidekka_pro_img"><img src="{{ $product['image'] }}" alt="product"></a>
                        <div class="ec-pro-content">
                            <a href="#" class="cart_pro_title">{{ $product['product_name'] }}</a>
                            <span class="cart-price">{{ $product['color'] }}/{{ $product['size'] }}</span>
                            <span class="cart-price"><span>${{ $product['item_total'] }}</span> x {{ $product['qty'] }}</span>
                            <div class="qty-plus-minus">
                                <input type="text" name="ec_qtybtn" data-productID="{{ $k }}" value="{{ $product['qty'] }}" min="1" max="249" class="qty-input" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" />
                                <!-- <input class="qty-input" type="text" name="ec_qtybtn" value="1" /> -->
                            </div>
                            <a href="javascript:void(0)" class="remove remove_product" data-id="{{ $k }}">×</a>
                        </div>
                    </li>

                    @endforeach
                    @else
                    Cart is empty
                    @endif

                </ul>
            </div>
            <div class=" ec-cart-bottom">
                <div class="cart-sub-total">
                    <table class="table cart-table">
                        <tbody>
                            <tr>
                                <td class="text-left">Sub-Total :</td>
                                <td id="sub_total" class="text-right">${{ $sub_total }}</td>
                            </tr>
                            <tr>
                                <td class="text-left">VAT (20%) :</td>
                                <td id="vat" class="text-right">${{ $vat }}</td>
                            </tr>
                            <tr>
                                <td class="text-left">Total :</td>
                                <td id="total" class="text-right primary-color">${{ $total }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="cart_btn">
                    <a href="{{url('cart')}}" class="btn btn-primary">View Cart</a>
                    <a href="checkout.php" class="btn btn-secondary">Checkout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ekka Cart End -->
