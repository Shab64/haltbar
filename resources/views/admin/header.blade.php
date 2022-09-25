<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Panel</title>
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="" />

	<!-- Favicon icon -->
	<link rel="icon" href="{{ asset('public/assets/images/favicon.svg') }}" type="image/x-icon">

	<link rel="stylesheet" href="{{ asset('public/assets/css/plugins/dataTables.bootstrap4.min.css')}}">


	<!-- font css -->
	<link rel="stylesheet" href="{{ asset('public/assets/fonts/font-awsome-pro/css/pro.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/assets/fonts/feather.css') }}">
	<link rel="stylesheet" href="{{ asset('public/assets/fonts/fontawesome.css') }}">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('public/assets/css/customizer.css') }}">
	<link rel="stylesheet" href="{{ asset('public/assets/css/update.css') }}">
	<link rel="stylesheet" href="{{ asset('public/assets/dropify/dropify.css') }}">

	<script src="{{ asset('public/assets/js/vendor-all.min.js') }}"></script>
{{--	<script src="{{ asset('public/assets/js/jquery.min.js') }}"></script>--}}

	<script>
		(function(h, o, t, j, a, r) {
			h.hj = h.hj || function() {
				(h.hj.q = h.hj.q || []).push(arguments)
			};
			h._hjSettings = {
				hjid: 1951099,
				hjsv: 6
			};
			a = o.getElementsByTagName('head')[0];
			r = o.createElement('script');
			r.async = 1;
			r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
			a.appendChild(r);
		})(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
	</script>

</head>

<body class="">

	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ Mobile header ] start -->
	<div class="pc-mob-header pc-header">
		<div class="pcm-logo">
			<img src="{{ asset('public/assets/images/haltbar.png') }}" alt="" class="logo logo-lg">
		</div>
		<div class="pcm-toolbar">
			<a href="#!" class="pc-head-link" id="mobile-collapse">
				<div class="hamburger hamburger--arrowturn">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>
				<!-- <i data-feather="menu"></i> -->
			</a>
			<a href="#!" class="pc-head-link" id="headerdrp-collapse">
				<i data-feather="align-right"></i>
			</a>
			<a href="#!" class="pc-head-link" id="header-collapse">
				<i data-feather="more-vertical"></i>
			</a>
		</div>
	</div>
	<!-- [ Mobile header ] End -->

	<!-- [ navigation menu ] start -->
	<nav class="pc-sidebar ">
		<div class="navbar-wrapper">
			<div class="m-header">
				<a href="#" class="b-brand">
					<!-- ========   change your logo hear   ============ -->

					<img src="{{ asset('public/assets/haltbar.png') }}" alt="" class="logo logo-lg img-fluid img-responsive">
					<img src="{{ asset('public/assets/haltbar.png' ) }}" alt="" class="logo logo-sm">
				</a>
			</div>
			<div class="navbar-content">
				<ul class="pc-navbar">
					<li class="pc-item pc-caption">
						<!-- <label>Navigation</label> -->

					</li>
					<li class="pc-item pc-hasmenu">
						<a href="{{ Route('admin.index') }}" class="pc-link "><span class="pc-micon"><i data-feather="home"></i></span><span class="pc-mtext">Dashboard</span><span class="pc-arrow"></span></a>

					</li>

					<li class="pc-item">
						<a href="{{ Route('admin.view.page',['users']) }}" class="pc-link "><span class="pc-micon"><i data-feather="user"></i></span><span class="pc-mtext">Users</span></a>
					</li>

					<li class="pc-item">
						<a href="{{ Route('admin.view.page',['ralawise']) }}" class="pc-link "><span class="pc-micon"><i class="fa fa-cart-plus"></i></span><span class="pc-mtext">Ralawise</span></a>
					</li>
					<li class="pc-item">
						<a href="{{ Route('admin.view.page',['uneek']) }}" class="pc-link "><span class="pc-micon"><i class="fa fa-cart-plus"></i></span><span class="pc-mtext">Uneek</span></a>
					</li>

					<li class="pc-item">
						<a href="{{ Route('admin.view.page',['order']) }}" class="pc-link "><span class="pc-micon"><i class="fa fa-dollar-sign"></i></span><span class="pc-mtext">Orders</span></a>
					</li>
					<li class="pc-item">
						<a href="{{ Route('admin.view.page',['coupons']) }}" class="pc-link "><span class="pc-micon"><i class="fa fa-dollar-sign"></i></span><span class="pc-mtext">Coupons</span></a>
					</li>
                    <li class="pc-item text-center text-white"><span>Website Content Edit</span></li>
                    <li class="pc-item">
                        <a href="{{ Route('admin.view.page',['slider']) }}" class="pc-link"><span class="pc-micon"><span class="pc-mtext">Slider</span></a>
                    </li>

                    <li class="pc-item">
                        <a href="{{url('admin/about')}}" class="pc-link "><span class="pc-mtext">About Us</span></a>
                    </li>

                    <li class="pc-item">
                        <a href="{{url('admin/privacy')}}" class="pc-link "><span class="pc-mtext">Privacy Policy</span></a>
                    </li>

                    <li class="pc-item">
                        <a href="{{url('admin/cookies')}}" class="pc-link "><span class="pc-mtext">Cookies Policy</span></a>
                    </li>

                    <li class="pc-item">
                        <a href="{{url('admin/delivery')}}" class="pc-link "><span class="pc-mtext">Delivery</span></a>
                    </li>

                    <li class="pc-item">
                        <a href="{{url('admin/return')}}" class="pc-link "><span class="pc-mtext">Return Policy</span></a>
                    </li>


                    <li class="pc-item">
                        <a href="{{url('admin/orderprocess')}}" class="pc-link "><span class="pc-mtext">Order Process</span></a>
                    </li>

                    <li class="pc-item">
                        <a href="{{url('admin/personal-data')}}" class="pc-link "><span class="pc-mtext">Personal Data Protection Policy</span></a>
                    </li>
                    <li class="pc-item">
                        <a href="{{url('admin/artwork')}}" class="pc-link "><span class="pc-mtext">Artwork Guidelines</span></a>
                    </li>
                    <li class="pc-item">
                        <a href="{{url('admin/pricing-explainded')}}" class="pc-link "><span class="pc-mtext">Pricing Explained</span></a>
                    </li>
                    <li class="pc-item">
                        <a href="{{url('admin/print-method')}}" class="pc-link "><span class="pc-mtext">Print Method</span></a>
                    </li>
                    <li class="pc-item">
                        <a href="{{url('admin/terms-condition')}}" class="pc-link "><span class="pc-mtext">Terms and Condition</span></a>
                    </li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="pc-header ">
		<div class="header-wrapper">
			<div class="mr-auto pc-mob-drp">
				<ul class="list-unstyled">

				</ul>
			</div>
			<div class="ml-auto">
				<ul class="list-unstyled">
					<li class="dropdown pc-h-item">
						<a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<i data-feather="search"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right pc-h-dropdown drp-search">
							<form class="px-3">
								<div class="form-group mb-0 d-flex align-items-center">
									<i data-feather="search"></i>
									<input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . .">
								</div>
							</form>
						</div>
					</li>
					<li class="dropdown pc-h-item pc-cart-menu">
						<a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<i data-feather="shopping-cart"></i>
							<span class="badge badge-success pc-h-badge">3</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right pc-h-dropdown drp-cart">
							<div class="cart-head">
								<h4 class="mb-0">3 Items</h4>
								<a href="#!" class="text-danger float-right"><u>Remove All</u></a>
								<p class="mb-0">in your cart</p>
							</div>
							<div class="cart-item">
								<img src="{{ asset('public/assets/images/product/prod-1.jpg')}}" alt="Product-img" title="Product-img" class="rounded mr-3 border">
								<div class="cart-desc">
									<a href="#!" class="text-body">
										<h6 class="d-inline-block mb-0">Villus Snow Ankle b...</h6>
									</a>
									<p class="mb-0">Army green,7</p>
									<span><span class="text-primary">$ 148.66</span> for <span class="text-primary">9</span> </span>
									<a href="#!" class="text-danger float-right"><i data-feather="trash-2"></i></a>
								</div>
							</div>
							<div class="cart-item">
								<img src="{{ asset('public//assets/images/product/prod-2.jpg') }}" alt="Product-img" title="Product-img" class="rounded mr-3 border">
								<div class="cart-desc">
									<a href="#!" class="text-body">
										<h6 class="d-inline-block mb-0">Bullets Wireless Black</h6>
									</a>
									<p class="mb-0">Dark Black</p>
									<span><span class="text-primary">$ 299</span> for <span class="text-primary">5</span> </span>
									<a href="#!" class="text-danger float-right"><i data-feather="trash-2"></i></a>
								</div>
							</div>
							<div class="cart-item">
								<img src="{{ asset('public//assets/images/product/prod-3.jpg')}}" alt="Product-img" title="Product-img" class="rounded mr-3 border">
								<div class="cart-desc">
									<a href="#!" class="text-body">
										<h6 class="d-inline-block mb-0">Parkas Thick Jackets</h6>
									</a>
									<p class="mb-0">Am Wine Red</p>
									<span><span class="text-primary">$ 599</span> for <span class="text-primary">3</span> </span>
									<a href="#!" class="text-danger float-right"><i data-feather="trash-2"></i></a>
								</div>
							</div>
							<div class="table-responsive cart-item">
								<table class="table table-borderless mb-0 table-xs">
									<tbody>
										<tr>
											<td>
												<h6 class="m-0">Sub Total:</h6>
											</td>
											<td class="text-right">
												$1070
											</td>
										</tr>
										<tr>
											<td>
												<h6 class="m-0">Shipping:</h6>
											</td>
											<td class="text-right">
												FREE
											</td>
										</tr>
										<tr>
											<td>
												<h5 class="m-0">Total:</h5>
											</td>
											<td class="text-right">
												<h5 class="m-0 text-primary font-weight-bold">$1070</h5>
											</td>
										</tr>
										<tr>
											<td colspan="2">
												<button class="btn btn-primary btn-sm btn-block mt-2">Check out</button>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</li>
					<li class="pc-h-item">
						<a class="pc-head-link mr-0" href="#" data-toggle="modal" data-target="#notification-modal">
							<i data-feather="bell"></i>
							<span class="badge badge-danger pc-h-badge dots"><span class="sr-only"></span></span>
						</a>
					</li>
					<li class="dropdown pc-h-item">
						<a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<img src="{{ asset('public/assets/images/user/avatar-2.jpg')}}" alt="user-image" class="user-avtar">
							<span>
								<span class="user-name">Joseph William</span>
								<span class="user-desc">Administrator</span>
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right pc-h-dropdown">
							<div class=" dropdown-header">
								<h6 class="text-overflow m-0">Welcome !</h6>
							</div>
							<a href="#!" class="dropdown-item">
								<i data-feather="user"></i>
								<span>My Account</span>
							</a>
							<a href="#!" class="dropdown-item">
								<i data-feather="settings"></i>
								<span>Settings</span>
							</a>
							<a href="#!" class="dropdown-item">
								<i data-feather="life-buoy"></i>
								<span>Support</span>
							</a>
							<a href="#!" class="dropdown-item">
								<i data-feather="lock"></i>
								<span>Lock Screen</span>
							</a>
							<a href="#!" class="dropdown-item">
								<i data-feather="power"></i>
								<span onclick="event.preventDefault(); document.getElementById('input-form').submit();">Logout</a>
								<form action="{{ route('admin.logout') }}" id="input-form" method="POST" class="d-none">
								@csrf
								</form>
							</a>
						</div>
					</li>
				</ul>
			</div>

		</div>
	</header>

	<!-- Modal -->
	<div class="modal notification-modal fade" id="notification-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<ul class="nav nav-pill tabs-light mb-3" id="pc-noti-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="pc-noti-home-tab" data-toggle="pill" href="#pc-noti-home" role="tab" aria-controls="pc-noti-home" aria-selected="true">Notification</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pc-noti-news-tab" data-toggle="pill" href="#pc-noti-news" role="tab" aria-controls="pc-noti-news" aria-selected="false">News<span class="badge badge-danger ml-2 d-none d-sm-inline-block">4</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pc-noti-settings-tab" data-toggle="pill" href="#pc-noti-settings" role="tab" aria-controls="pc-noti-settings" aria-selected="false">Setting<span class="badge badge-success ml-2 d-none d-sm-inline-block">Update</span></a>
						</li>
					</ul>
					<div class="tab-content pt-4" id="pc-noti-tabContent">
						<div class="tab-pane fade show active" id="pc-noti-home" role="tabpanel" aria-labelledby="pc-noti-home-tab">
							<div class="media">
								<img src="{{ asset('public/assets/images/user/avatar-1.jpg')}}" alt="images" class="img-fluid avtar avtar-l">
								<div class="media-body ml-3 align-self-center">
									<div class="float-right">
										<div class="btn-group card-option">
											<button type="button" class="btn shadow-none">
												<i data-feather="heart" class="text-danger"></i>
											</button>
											<button type="button" class="btn shadow-none px-0 dropdown-toggle arrow-none" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i data-feather="more-horizontal"></i>
											</button>
											<div class="dropdown dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#!"><i data-feather="refresh-cw"></i> reload</a>
												<a class="dropdown-item" href="#!"><i data-feather="trash"></i> remove</a>
											</div>
										</div>
									</div>
									<h6 class="mb-0 d-inline-block">Ashoka T.</h6>
									<p class="mb-0 d-inline-block f-12 text-muted"> • 06/20/2019 at 6:43 PM </p>
									<p class="my-3">Cras sit amet nibh libero in gravida nulla Nulla vel metus scelerisque ante sollicitudin.</p>
									<div class="p-3 border rounded">
										<div class="media align-items-center">
											<div class="media-body">
												<h6 class="mb-1 f-14">Death Star original maps and blueprint.pdf</h6>
												<p class="mb-0 text-muted">by<a href="#!"> Ashoka T </a>.</p>
											</div>
											<div class="btn-group d-none d-sm-inline-flex">
												<button type="button" class="btn shadow-none">
													<i data-feather="download-cloud"></i>
												</button>
												<button type="button" class="btn shadow-none px-0 dropdown-toggle arrow-none" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i data-feather="more-horizontal"></i>
												</button>
												<div class="dropdown dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#!"><i data-feather="refresh-cw"></i> reload</a>
													<a class="dropdown-item" href="#!"><i data-feather="trash"></i> remove</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<hr class="mb-4">
							<div class="media">
								<img src="{{ asset('public/assets/images/user/avatar-2.jpg') }}" alt="images" class="img-fluid avtar avtar-l">
								<div class="media-body ml-3 align-self-center">
									<div class="float-right">
										<div class="btn-group card-option">
											<button type="button" class="btn shadow-none px-0 dropdown-toggle arrow-none" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i data-feather="more-horizontal"></i>
											</button>
											<div class="dropdown dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#!"><i data-feather="refresh-cw"></i> reload</a>
												<a class="dropdown-item" href="#!"><i data-feather="trash"></i> remove</a>
											</div>
										</div>
									</div>
									<h6 class="mb-0 d-inline-block">Ashoka T.</h6>
									<p class="mb-0 d-inline-block  f-12 text-muted"> • 06/20/2019 at 6:43 PM </p>
									<p class="my-3">Cras sit amet nibh libero in gravida nulla Nulla vel metus scelerisque ante sollicitudin.</p>
									<img src="assets/images/slider/img-slide-3.jpg" alt="images" class="img-fluid wid-90 rounded m-r-10 m-b-10">
									<img src="assets/images/slider/img-slide-7.jpg" alt="images" class="img-fluid wid-90 rounded m-r-10 m-b-10">
								</div>
							</div>
							<hr class="mb-4">
							<div class="media mb-3">
								<img src="{{ asset('public/assets/images/user/avatar-3.jpg')}}" alt="images" class="img-fluid avtar avtar-l">
								<div class="media-body ml-3 align-self-center">
									<div class="float-right">
										3 <i data-feather="heart" class="text-danger fill-danger"></i>
									</div>
									<h6 class="mb-0 d-inline-block">Ashoka T.</h6>
									<p class="mb-0 d-inline-block  f-12 <text-muted></text-muted>"> • 06/20/2019 at 6:43 PM </p>
									<p class="my-3">Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur.</p>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="pc-noti-news" role="tabpanel" aria-labelledby="pc-noti-news-tab">
							<div class="pb-3 border-bottom mb-3 media">
								<a href="#!"><img src="assets/images/news/img-news-2.jpg" class="wid-90 rounded" alt="..."></a>
								<div class="media-body ml-3">
									<p class="float-right mb-0 text-success"><small>now</small></p>
									<a href="#!">
										<h6>This is a news image</h6>
									</a>
									<p class="mb-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
								</div>
							</div>
							<div class="pb-3 border-bottom mb-3 media">
								<a href="#!"><img src="assets/images/news/img-news-1.jpg" class="wid-90 rounded" alt="..."></a>
								<div class="media-body ml-3">
									<p class="float-right mb-0 text-muted"><small>3 mins ago</small></p>
									<a href="#!">
										<h6>Industry's standard dummy</h6>
									</a>
									<p class="mb-2">Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
									<a href="#" class="badge badge-light">Html</a>
									<a href="#" class="badge badge-light">UI/UX designed</a>
								</div>
							</div>
							<div class="pb-3 border-bottom mb-3 media">
								<a href="#!"><img src="assets/images/news/img-news-2.jpg" class="wid-90 rounded" alt="..."></a>
								<div class="media-body ml-3">
									<p class="float-right mb-0 text-muted"><small>5 mins ago</small></p>
									<a href="#!">
										<h6>Ipsum has been the industry's</h6>
									</a>
									<p class="mb-2">Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
									<a href="#" class="badge badge-light">JavaScript</a>
									<a href="#" class="badge badge-light">Scss</a>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="pc-noti-settings" role="tabpanel" aria-labelledby="pc-noti-settings-tab">
							<h6 class="mt-2"><i data-feather="monitor" class="mr-2"></i>Desktop settings</h6>
							<hr>
							<div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input" id="pcsetting1" checked>
								<label class="custom-control-label f-w-600 pl-1" for="pcsetting1">Allow desktop notification</label>
							</div>
							<p class="text-muted ml-5">you get lettest content at a time when data will updated</p>
							<div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input" id="pcsetting2">
								<label class="custom-control-label f-w-600 pl-1" for="pcsetting2">Store Cookie</label>
							</div>
							<h6 class="mb-0 mt-5"><i data-feather="save" class="mr-2"></i>Application settings</h6>
							<hr>
							<div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input" id="pcsetting3">
								<label class="custom-control-label f-w-600 pl-1" for="pcsetting3">Backup Storage</label>
							</div>
							<p class="text-muted mb-4 ml-5">Automaticaly take backup as par schedule</p>
							<div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input" id="pcsetting4">
								<label class="custom-control-label f-w-600 pl-1" for="pcsetting4">Allow guest to print file</label>
							</div>
							<h6 class="mb-0 mt-5"><i data-feather="cpu" class="mr-2"></i>System settings</h6>
							<hr>
							<div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input" id="pcsetting5" checked>
								<label class="custom-control-label f-w-600 pl-1" for="pcsetting5">View other user chat</label>
							</div>
							<p class="text-muted ml-5">Allow to show public user message</p>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light-danger btn-sm" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-light-primary btn-sm">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<!-- [ Header ] end -->
