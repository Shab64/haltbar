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
            @if(!$all_coupons->isEmpty())
                @foreach($all_coupons as $c)
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="assets/images/pages/discount.svg" alt="" class="img-fluid w-50">
                        <h5 class="mt-3">{{$c->discount_amount}}% off</h5>
                        <hr>
                        <div class="row align-items-center m-l-0">
                            <div class="col-sm-6 text-left">
                                <button type="button" class="btn  btn-icon btn-outline-danger"><i class="feather icon-trash-2"></i></button>
                            </div>
                            <div class="col-sm-6 text-right">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" data-id="{{$c['id']}}" name="status" {{($c['status'] === 'yes') ? "checked" : ""}} class="custom-control-input" id="customSwitch{{$c->id}}" value="yes">
                                    <label class="custom-control-label" for="customSwitch{{$c->id}}">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
            @endif
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
        <form action="{{route('admin.addCoupons')}}" method="post">
            @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Coupons</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="Name"><small class="text-danger">* </small>Name</label>
                            <input type="text" required name="name" class="form-control" id="Name" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="Code"><small class="text-danger">* </small>Coupon Code</label>
                            <input type="text" required name="coupon_code" class="form-control" id="Code" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="Discount">Discount in %</label>
                            <input type="number" name="discount_amount" required class="form-control" id="Discount" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label class="d-block mb-2">Published</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="status" value="yes" class="custom-control-input" checked>
                            <label class="custom-control-label" for="customRadioInline1">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="status" value="no" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">No</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"> Save </button>
                <button class="btn btn-danger"> Clear </button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
<script>
    $('.custom-control-input').on('change',function (e){
        let status = ""
        let _token = '{{csrf_token()}}'
        let id =$(this).attr('data-id');
        if ($(this).is(':checked') === true)
            status = 'yes'
        else
            status= 'no'

        $.post('{{route('admin.updateStatus')}}',{_token,id,status},function (e){
            console.log(e)
        })
    })
</script>
@include('admin.footer')
