@include('admin.header')
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard sale</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ Route('admin.index') }}">Home</a></li>
                            <li class="breadcrumb-item">Dashboard sale</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        @if(Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        <div class="row">
            <!-- support-section start -->
            <div class="col-xl-12 col-md-12">
                <div class="card flat-card">
                    <div class="row-table">
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-users text-primary mb-1 d-block"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>1000</h5>
                                    <span>Customers</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 d-none d-md-table-cell d-lg-table-cell d-xl-table-cell card-body br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-globe text-primary mb-1 d-block"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>$1252</h5>
                                    <span>Revenue</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-trending-up text-primary mb-1 d-block"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>600</h5>
                                    <span>Growth</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-table">
                        <div class="col-sm-6 card-body br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-rotate-ccw text-primary mb-1 d-block"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>3550</h5>
                                    <span>Returns</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 d-none d-md-table-cell d-lg-table-cell d-xl-table-cell card-body br">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-download text-primary mb-1 d-block"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>3550</h5>
                                    <span>Downloads</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="icon feather icon-shopping-cart text-primary mb-1 d-blockz"></i>
                                </div>
                                <div class="col-sm-8 text-md-center">
                                    <h5>100%</h5>
                                    <span>Order</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- support-section end -->
            <!-- customer-section start -->

            <div class="col-xl-12 col-md-12">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card prod-p-card background-pattern">
                            <div class="card-body">
                                <div class="row align-items-center m-b-0">
                                    <div class="col">
                                        <h6 class="m-b-5">Total Profit</h6>
                                        <h3 class="m-b-0">$1,783</h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-money-bill-alt text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card prod-p-card bg-primary background-pattern-white">
                            <div class="card-body">
                                <div class="row align-items-center m-b-0">
                                    <div class="col">
                                        <h6 class="m-b-5 text-white">Total Orders</h6>
                                        <h3 class="m-b-0 text-white">15,830</h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-database text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card prod-p-card bg-primary background-pattern-white">
                            <div class="card-body">
                                <div class="row align-items-center m-b-0">
                                    <div class="col">
                                        <h6 class="m-b-5 text-white">Average Price</h6>
                                        <h3 class="m-b-0 text-white">$6,780</h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card prod-p-card background-pattern">
                            <div class="card-body">
                                <div class="row align-items-center m-b-0">
                                    <div class="col">
                                        <h6 class="m-b-5">Product Sold</h6>
                                        <h3 class="m-b-0">6,784</h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-tags text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-12 col-md-12">

                <div class="card table-card">
                    <div class="card-header">
                        <h5>New Products</h5>
                    </div>
                    <div class="pro-scroll" style="min-height:255px;position:relative;">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>HeadPhone</td>
                                            <td><img src="assets/images/widget/p1.jpg" alt="" class="img-20"></td>
                                            <td>
                                                <div><label class="badge badge-light-warning">Pending</label></div>
                                            </td>
                                            <td>$10</td>
                                            <td><a href="#!"><i class="icon feather icon-edit f-16  text-success"></i></a><a href="#!"><i class="feather icon-trash-2 ml-3 f-16 text-danger"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>Iphone 6</td>
                                            <td><img src="assets/images/widget/p2.jpg" alt="" class="img-20"></td>
                                            <td>
                                                <div><label class="badge badge-light-danger">Cancel</label></div>
                                            </td>
                                            <td>$20</td>
                                            <td><a href="#!"><i class="icon feather icon-edit f-16  text-success"></i></a><a href="#!"><i class="feather icon-trash-2 ml-3 f-16 text-danger"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>Jacket</td>
                                            <td><img src="assets/images/widget/p3.jpg" alt="" class="img-20"></td>
                                            <td>
                                                <div><label class="badge badge-light-success">Success</label></div>
                                            </td>
                                            <td>$35</td>
                                            <td><a href="#!"><i class="icon feather icon-edit f-16 text-success"></i></a><a href="#!"><i class="feather icon-trash-2 ml-3 f-16 text-danger"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>Sofa</td>
                                            <td><img src="assets/images/widget/p4.jpg" alt="" class="img-20"></td>
                                            <td>
                                                <div><label class="badge badge-light-danger">Cancel</label></div>
                                            </td>
                                            <td>$85</td>
                                            <td><a href="#!"><i class="icon feather icon-edit f-16 text-success"></i></a><a href="#!"><i class="feather icon-trash-2 ml-3 f-16 text-danger"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>Iphone 6</td>
                                            <td><img src="assets/images/widget/p2.jpg" alt="" class="img-20"></td>
                                            <td>
                                                <div><label class="badge badge-light-success">Success</label></div>
                                            </td>
                                            <td>$20</td>
                                            <td><a href="#!"><i class="icon feather icon-edit f-16 text-success"></i></a><a href="#!"><i class="feather icon-trash-2 ml-3 f-16 text-danger"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>HeadPhone</td>
                                            <td><img src="assets/images/widget/p1.jpg" alt="" class="img-20"></td>
                                            <td>
                                                <div><label class="badge badge-light-warning">Pending</label></div>
                                            </td>
                                            <td>$50</td>
                                            <td><a href="#!"><i class="icon feather icon-edit f-16 text-success"></i></a><a href="#!"><i class="feather icon-trash-2 ml-3 f-16 text-danger"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>Iphone 6</td>
                                            <td><img src="assets/images/widget/p2.jpg" alt="" class="img-20"></td>
                                            <td>
                                                <div><label class="badge badge-light-danger">Cancel</label></div>
                                            </td>
                                            <td>$30</td>
                                            <td><a href="#!"><i class="icon feather icon-edit f-16 text-success"></i></a><a href="#!"><i class="feather icon-trash-2 ml-3 f-16 text-danger"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- customer-section end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
</div>
@include('admin.footer')