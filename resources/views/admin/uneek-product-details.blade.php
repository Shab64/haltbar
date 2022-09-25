@include('admin.header')
<link rel="stylesheet" href="{{ asset('public/assets/dropify/dropify.css') }}">
<style>
    .addmorediv {
        padding: 20px 10px;
        text-align: center;
        border-radius: 10px;
        background-color: #fff3e8;
    }

    .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
        height: 160px !important;
    }
</style>


<div class="pc-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Product</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="#!">E-Commerce</a></li>
                            <li class="breadcrumb-item"> Products Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- customar project  start -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Product Detail</h5>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Product Price</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Quantity</label>
                                    <input type="number" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Product Cover Image</label>
                                    <input type="text" class="form-control dropify">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Product Description</label>
                                    <textarea name="content" class='form-control' id="classic-editor">
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Product Customization</h5>
                    </div>
                    <div class="card-body">
                        <div id="appendCustom">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Picture</label>
                                        <input type="file" class="form-control dropify">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <!-- </?php var_dump($single_product); die; ?> -->
                                        <input type="text" readonly value="{{ $single_product['Price_Single'] }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Quantity</label>
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Color</label>
                                        <input type="color" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Size</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-1 " style="margin-top: 33px;">
                                    <a href="javascript:void(0)" class="text-danger" style='font-size: 20px; font-weight:bold'> <i class='fa fa-trash delCustom'></i> </a>
                                </div>
                            </div>
                        </div>

                        <div class='addmorediv'>
                            <a href="javascript:void(0)" onclick='custom()' class="btn btn-primary">Add More</a>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Product Bulk Pricing</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ Route('admin.updateChanges') }}">
                            @csrf
                            <input type="text" value="uneek" name="supplier" hidden />
                            <input type="text" value="{{ $single_product['id'] }}" name="single_pro_id" hidden />
                            <div class="appendRanges">
                                @if(!empty($uneek_pricings))
                                @foreach($uneek_pricings as $k=>$pricing)
                                <input type="number" value="{{ $pricing['id'] }}" hidden name="ids[]" />
                                <div class="d-flex justify-content-between {{ $k == 0 ? '' : 'mt-3' }}">
                                    <div class='align-self-center'>
                                        <span>If quantity ranges between</span>
                                    </div>
                                    <div>
                                        <input type="number" value="{{ $pricing['quantity_from'] }}" readonly class="form-control">
                                    </div>
                                    <div class='align-self-center'>
                                        <span>and</span>
                                    </div>
                                    <div>
                                        <input type="number" value="{{ $pricing['quantity_to'] }}" readonly class="form-control">
                                    </div>
                                    <div class='align-self-center'>
                                        <span>With Discount %</span>
                                    </div>
                                    <div>
                                        <input type="number" name="discounts[]" required id="discount{{ $k }}" min="0" max="100" onpaste="return false;" onkeypress="event.preventDefault()" onchange="changePrice('{{ $k }}')" value="{{ $pricing['discount_per_percent'] }}" class="form-control">
                                    </div>
                                    <div class='align-self-center'>
                                        <span>Multiplier</span>
                                    </div>
                                    <div>
                                        <input type="number" name="multipliers[]" required id="multiplier{{ $k }}" min="0" step="0.01" max="100" onpaste="return false;" onkeypress="event.preventDefault()" onchange="changePrice('{{ $k }}')" value="{{ $pricing['service_charges_pp'] }}" class="form-control">
                                    </div>
                                    <div class='align-self-center'>
                                        <span>The Price will be</span>
                                    </div>
                                    <div>
                                        <?php $totalPrice =  ($single_product['Price_Single'] * $pricing['service_charges_pp']);
                                        $discount = ($totalPrice / 100) * $pricing['discount_per_percent'];
                                        $priceWillBe = $totalPrice - $discount;
                                        ?>
                                        <input type="text" id="priceWillBe{{ $k }}" readonly value="{{ round($priceWillBe,2) }}" class="form-control">
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                <!-- <div class="d-flex justify-content-between">
                                <div class='align-self-center'>
                                    <span>If quantity ranges between</span>
                                </div>
                                <div>
                                    <input type="number" readonly class="form-control">
                                </div>
                                <div class='align-self-center'>
                                    <span>and</span>
                                </div>
                                <div>
                                    <input type="number" readonly class="form-control">
                                </div>
                                <div class='align-self-center'>
                                    <span>The Price will be</span>
                                </div>
                                <div>
                                    <input type="text" class="form-control">
                                </div>
                            </div> -->
                            </div>
                            <div class='addmorediv mt-5'>
                                <input type="submit" class="btn btn-primary" value="Save Changes" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- customar project  end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

</div>

<script src="{{ asset('public/assets/dropify/dropfiy.js') }}"></script>
<script>
    $('.dropify').dropify();
</script>

<!-- Ckeditor js -->
<script src="{{ asset('public/assets/js/plugins/ckeditor.js') }}"></script>
<script type="text/javascript">
    $(window).on('load', function() {
        ClassicEditor.create(document.querySelector('#classic-editor'))
            .catch(error => {
                console.error(error);
            });
    });
</script>
<script>
    function custom() {

        const row = document.createElement('div');
        row.className = 'row';
        row.innerHTML = `
        <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Picture</label>
                                    <input type="file" class="form-control dropify">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Quantity</label>
                                    <input type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Color</label>
                                    <input type="color" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Size</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-1 " style="margin-top: 33px;">
                                    <a href="javascript:void(0)"  class="text-danger" style='font-size: 20px; font-weight:bold'> <i class='fa fa-trash delCustom'></i>  </a>
                                </div>
        `;
        const appendDiv = document.querySelector('#appendCustom');
        appendDiv.appendChild(row);
        $('.dropify').dropify();
    }

    document.getElementById('appendCustom').addEventListener('click', function(e) {
        if (e.target.classList.contains('delCustom')) {
            e.target.parentElement.parentElement.parentElement.remove();
        }
    })


    function ranges() {
        const row = document.createElement('div');
        row.className = 'd-flex justify-content-between mt-3';
        row.innerHTML = `
        <div class='align-self-center'>
                                    <span>If quantity ranges between</span>
                                </div>
                                <div>
                                    <input type="number" class="form-control">
                                </div>
                                <div class='align-self-center'>
                                    <span>and</span>
                                </div>
                                <div>
                                    <input type="number" class="form-control">
                                </div>
                                <div class='align-self-center'>
                                    <span>The Price will be</span>
                                </div>
                                <div>
                                    <input type="text" class="form-control">
                                </div>
        `;
        const appendDiv = document.querySelector('.appendRanges');
        appendDiv.appendChild(row);

    }

    function changePrice(no) {
        let price = $('#priceWillBe' + no);
        let singlePrice = '<?= $single_product['Price_Single'] ?>';
        let discount = $('#discount' + no).val();
        let multiplier = $('#multiplier' + no).val();

        let totalPrice = (singlePrice * multiplier);
        let calcDiscount = (totalPrice / 100) * discount;
        let priceWillBe = totalPrice - calcDiscount;

        price.val(priceWillBe.toPrecision(3));
    }
</script>
@include('admin.footer')