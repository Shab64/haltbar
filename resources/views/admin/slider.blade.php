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
                            <h5>Slider List</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="#!">Slider</a></li>
                            <li class="breadcrumb-item">Slider list</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->

        <div class="d-flex mt-5 px-5">
            <div class="ml-auto">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-report"><i class="feather icon-plus"></i>New Slider</button>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card Slider-profile-list">
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="user-list-table" class="table nowrap">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Date</th>
                                    <th>Actiom</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($all_sliders))
                                    @foreach($all_sliders as $s)
                                        <tr>
                                    <td>
                                        <div class="d-inline-block align-middle">
                                            <img src="{{asset('public/uploads/'.$s['image'])}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                                        </div>
                                    </td>
                                    <td>
                                        {{$s['created_at']}}
                                    </td>
                                    <td>
                                        <div class="overlay-edit">
{{--                                            <button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button>--}}
                                            <button type="button" class="btn btn-icon btn-danger"><i class="feather icon-trash-2"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                    @endforeach
                                @endif
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
            <form action="{{route('admin.add',['slider'])}}" enctype="multipart/form-data" method="post">
                @csrf
            <div class="modal-header">
                <h5 class="modal-title">Add Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label" for="First"><small class="text-danger">* </small>Upload Image</label>
                            <input type="file" name="slider" class="dropify" data-default-file="url_of_your_file" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"> Save </button>
                <button class="btn btn-danger"> Clear </button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- [ Main Content ] end -->
</div>
@include('admin.footer')

