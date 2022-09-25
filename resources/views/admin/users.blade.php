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
                            <h5>User List</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="#!">user</a></li>
                            <li class="breadcrumb-item">User list</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->

        <div class="d-flex mt-5 px-5">
            <div class="ml-auto">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-report"><i class="feather icon-plus"></i>New User</button>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card user-profile-list">
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="user-list-table" class="table nowrap">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="d-inline-block align-middle">
                                            <img src="assets/images/user/avatar-1.jpg" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                                            <div class="d-inline-block">
                                                <h6 class="m-b-0">Quinn Flynn</h6>
                                                <p class="m-b-0">Qf@domain.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Support </td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011/04/25</td>
                                    <td>
                                        <span class="badge badge-light-success">Active</span>
                                        <div class="overlay-edit">
                                            <button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button>
                                            <button type="button" class="btn btn-icon btn-danger"><i class="feather icon-trash-2"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-inline-block align-middle">
                                            <img src="assets/images/user/avatar-2.jpg" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                                            <div class="d-inline-block">
                                                <h6 class="m-b-0">Garrett Winters</h6>
                                                <p class="m-b-0">gw@domain.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Seller</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011/07/25</td>
                                    <td>
                                        <span class="badge badge-light-danger">Disabled</span>
                                        <div class="overlay-edit">
                                            <button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button>
                                            <button type="button" class="btn btn-icon btn-danger"><i class="feather icon-trash-2"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-inline-block align-middle">
                                            <img src="assets/images/user/avatar-3.jpg" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                                            <div class="d-inline-block">
                                                <h6 class="m-b-0">Ashton Cox</h6>
                                                <p class="m-b-0">ac@domain.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Seller</td>
                                    <td>San Francisco</td>
                                    <td>66</td>
                                    <td>2009/01/12</td>
                                    <td>
                                        <span class="badge badge-light-danger">Disabled</span>
                                        <div class="overlay-edit">
                                            <button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button>
                                            <button type="button" class="btn btn-icon btn-danger"><i class="feather icon-trash-2"></i></button>
                                        </div>
                                    </td>
                                </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

<div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="First"><small class="text-danger">* </small>First Name</label>
                            <input type="text" class="form-control" id="Name" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="Last"><small class="text-danger">* </small>Last Name</label>
                            <input type="text" class="form-control" id="Last" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="Email"><small class="text-danger">* </small>Email Address</label>
                            <input type="email" class="form-control" id="Email" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="Password"><small class="text-danger">* </small>New Password</label>
                            <input type="password" class="form-control" id="Password" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="Membership"><small class="text-danger">* </small>Change Membership</label>
                            <select class="form-control" id="Membership">
                                <option value=""></option>
                                <option value="2">Bronze</option>
                                <option value="3">Gold</option>
                                <option value="4">Platinum</option>
                                <option value="5">Silver</option>
                                <option value="1">Trial</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label" for="Extend">Extend Membership</label>
                            <input type="date" class="form-control" id="Extend" placeholder="123">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="d-block mb-2">Status</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" checked>
                            <label class="custom-control-label" for="customRadioInline1">Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">Inactive</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline3" name="customRadioInline1" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline3">Pending</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline4" name="customRadioInline1" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline3">Banned</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="d-block mb-2 mt-3">User Type</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="customRadioInline2" class="custom-control-input" checked>
                            <label class="custom-control-label" for="customRadioInline21">Seller</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="customRadioInline2" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline22">Supportor</label>
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <label class="d-block mb-2">Newsletter Subscriber</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="customRadioInline3" class="custom-control-input" checked>
                            <label class="custom-control-label" for="customRadioInline31">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="customRadioInline3" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline32">No</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="d-block mb-2">Send Email Notification</label>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1"><Yes></Yes></label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group mt-3">
                            <label class="floating-label" for="Note">User Note</label>
                            <textarea class="form-control" id="Note" rows="6" spellcheck="false"></textarea>
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

<!-- [ Main Content ] end -->
</div>
@include('admin.footer')
