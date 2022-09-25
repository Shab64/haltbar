@include('admin.header')
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Coupons</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                            <li class="breadcrumb-item">Coupons</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row justify-content-center">
            <!-- liveline-section start -->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="assets/images/pages/gift-card.svg" alt="" class="img-fluid w-50">
                        <h5 class="mt-3">10% off</h5>
                        <hr>
                        <div class="row align-items-center m-l-0">
                            <div class="col-sm-6 text-left">
                                <button type="button" class="btn  btn-icon btn-outline-danger"><i class="feather icon-trash-2"></i></button>
                            </div>
                            <div class="col-sm-6 text-right">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                                    <label class="custom-control-label" for="customSwitch1">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="assets/images/pages/coupon.svg" alt="" class="img-fluid w-50">
                        <h5 class="mt-3">10% off</h5>
                        <hr>
                        <div class="row align-items-center m-l-0">
                            <div class="col-sm-6 text-left">
                                <button type="button" class="btn  btn-icon btn-outline-danger"><i class="feather icon-trash-2"></i></button>
                            </div>
                            <div class="col-sm-6 text-right">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                    <label class="custom-control-label" for="customSwitch2">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="assets/images/pages/coupon1.svg" alt="" class="img-fluid w-50">
                        <h5 class="mt-3">10% off</h5>
                        <hr>
                        <div class="row align-items-center m-l-0">
                            <div class="col-sm-6 text-left">
                                <button type="button" class="btn  btn-icon btn-outline-danger"><i class="feather icon-trash-2"></i></button>
                            </div>
                            <div class="col-sm-6 text-right">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch3" checked>
                                    <label class="custom-control-label" for="customSwitch3">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="assets/images/pages/voucher.svg" alt="" class="img-fluid w-50">
                        <h5 class="mt-3">10% off</h5>
                        <hr>
                        <div class="row align-items-center m-l-0">
                            <div class="col-sm-6 text-left">
                                <button type="button" class="btn  btn-icon btn-outline-danger"><i class="feather icon-trash-2"></i></button>
                            </div>
                            <div class="col-sm-6 text-right">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch4" checked>
                                    <label class="custom-control-label" for="customSwitch4">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="assets/images/pages/discount.svg" alt="" class="img-fluid w-50">
                        <h5 class="mt-3">10% off</h5>
                        <hr>
                        <div class="row align-items-center m-l-0">
                            <div class="col-sm-6 text-left">
                                <button type="button" class="btn  btn-icon btn-outline-danger"><i class="feather icon-trash-2"></i></button>
                            </div>
                            <div class="col-sm-6 text-right">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch5" checked>
                                    <label class="custom-control-label" for="customSwitch5">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 text-center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-report"><i class="feather icon-plus"></i>New Coupon</button>
            </div>
            <!-- liveline-section end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit email template</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="Name"><small class="text-danger">* </small>Name</label>
                            <input type="text" class="form-control" id="Name" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="Code"><small class="text-danger">* </small>Coupon Code</label>
                            <input type="text" class="form-control" id="Code" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="Apply"><small class="text-danger">* </small>Apply to Product</label>
                            <select class="form-control" id="Apply">
                                <option value=""></option>
                                <option value="2">Product 1</option>
                                <option value="3">Product 2</option>
                                <option value="4">Product 3</option>
                                <option value="5">Product 4</option>
                                <option value="1">Product 5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="Discount">Discount Amount</label>
                            <input type="text" class="form-control" id="Discount" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label class="d-block mb-2">Published</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" checked>
                            <label class="custom-control-label" for="customRadioInline1">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">No</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary"> Save </button>
                <button class="btn btn-danger"> Clear </button>
            </div>
        </div>
    </div>
</div>
</div>
@include('admin.footer')