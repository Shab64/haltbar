@include('admin.header')
<style>
    svg {
        width: 20px;
    }
</style>
<!-- [ Main Content ] start -->
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
                            <li class="breadcrumb-item"><a href="{{ Route('admin.index') }}">Home</a></li>

                            <li class="breadcrumb-item">Product</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- customar project  start -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6 text-right">
                                <!-- </?=site_url('admin/products/add-product')?> -->
                                <a href="{{ Route('admin.view.page',['add-product']) }}" class="btn btn-primary btn-sm mb-3 btn-round"><i class="feather icon-plus"></i> Product</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="report-table1" class="table mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Product</th>
                                        <th>Code</th>
                                        <th>Sku Quantity</th>
                                        <th>Single Price</th>
                                        <th>Primary Category</th>
                                        <th>Brand</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($ralawise))
                                    @foreach ($ralawise as $key => $r)
                                    <tr>
                                        <td class="align-middle">
                                            <img src="{{ $r->image_url }}" alt="contact-img" title="contact-img" class="rounded mr-3" height="48" />
                                            <p class="m-0 d-inline-block align-middle font-16">
                                                <a href="#!" class="text-body"></a>
                                            </p>
                                        </td>
                                        <td class="align-middle">
                                            {{ $r->code }}
                                        </td>
                                        <td class="align-middle">
                                            0
                                        </td>
                                        <td class="align-middle">
                                            {{ $r->single_list_price }}
                                        </td>
                                        <td class="align-middle">
                                            {{ $r->product_type }}
                                        </td>
                                        <td class="align-middle">
                                            {{ $r->brand }}
                                        </td>
                                        <td class="table-action">
                                            <a href="#!" class="btn btn-icon btn-outline-primary"><i class="feather icon-eye"></i></a>
                                            <a href="#!" class="btn btn-icon btn-outline-success"><i class="feather icon-edit"></i></a>
                                            <a href="#!" class="btn btn-icon btn-outline-danger"><i class="feather icon-trash-2"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <div class="w-100">{{ $ralawise->links() }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- customar project  end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Doctor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Name">Name</label>
                                <input type="text" class="form-control" id="Name" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Category">Category</label>
                                <select class="form-control" id="Category">
                                    <option value=""></option>
                                    <option value="1">Kids cloths</option>
                                    <option value="2">Man cloths</option>
                                    <option value="3">Man watch</option>
                                    <option value="3">Office Chairs</option>
                                    <option value="3">Travel bag</option>
                                    <option value="3">Woman cloath</option>
                                    <option value="3">Wooden Chairs</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Price">Price</label>
                                <input type="text" class="form-control" id="Price" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Quantity">Quantity</label>
                                <input type="text" class="form-control" id="Quantity" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label" for="Icon">Image</label>
                                <input type="file" class="form-control" id="Icon" placeholder="sdf">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label" for="Quantity">Color</label>
                                <input type="color" class="form-control" id="" placeholder="">

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-primary">Submit</button>
                            <button class="btn btn-danger">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
</div>
@include('admin.footer')