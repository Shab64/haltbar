@include('admin.header')


<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5>Pricing Explainedlicy</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.blade.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="#!">Pricing Explainedlicy</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->

        @if (empty($pricingExplained))
        <div class="row justify-content-center">
            <div class="col-sm-12 text-right mb-4">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPricingExplained"><i class="fas fa-plus"></i>
                    Add Pricing Explained
                </button>
            </div>
        </div>
        @endif

        <div class="row">
            <!-- customar project  start -->
            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body ">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table id="report-table" class="table mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (!empty($pricingExplained))
                                                    <tr>
                                                        <td class="align-middle">
                                                            {{ $pricingExplained['title'] }}
                                                        </td>

                                                        <td class="align-middle">
                                                            {{ strip_tags($pricingExplained['description']) }}
                                                        </td>
                                                        <td class="align-middle"><span class="badge badge-success">Published</span></td>

                                                        <td class="align-middle table-action"><a href="javascript:void(0);" data-toggle="modal" data-target="#editPricingExplained" class="btn btn-icon btn-outline-success"><i class="fas fa-edit"></i></a></td>
                                                    </tr>
                                                    @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


            </div>

            <!-- customar project  end -->
        </div>
        <!-- [ Main Content ] end -->
        <footer class="text-center" style="margin-bottom: 100px;">© 2022 Financify</footer>

    </div>
</div>

<!-- [ Main Content ] end -->

<!-- Add Pricing Modal -->
<div id="addPricingExplained" class="modal fade bd-example-modal-md" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="h6">Add Pricing Explained</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-lg-12">
                        <form id="cmsPricing" action="#" class="row">
                            <div class="col-12 form-field">
                                <label for="Leads" class="title-small c-blue">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="title">
                                <small id="error_title" class="form-text text-danger"></small>
                            </div>

                            <div class="col-12 form-field" style="margin-top: 10px;">
                                <label for="desc" class="form-label">Description</label>
                                <textarea name="description" id="summernoteAdd" class="form-control description"></textarea>
                                <small id="error_description" class="form-text text-danger"></small>
                            </div>

                            <div class="col-sm-5 form-field ml-auto" style="margin-top: 10px;">
                                <div class="btns justify-content-end"><input type="submit" class="btn btn-primary" value="Save">
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" aria-label="Close">Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Pricing Modal -->
<div id="editPricingExplained" class="modal fade bd-example-modal-md" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="h6">Edit Pricing Explained</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-lg-12">
                        <form id="editPricingForm" action="#" class="row">
                            <input type="hidden" id="pricingID" name="id" value="{{ !empty($pricingExplained) ? $pricingExplained['id'] : '' }}">
                            <div class="col-12 form-field">
                                <label for="Leads" class="title-small c-blue">Title</label>
                                <input type="text" name="title" id="edit_title" class="form-control" value="{{ !empty($pricingExplained) ? $pricingExplained['title'] : '' }}">
                                <small id="edit_error_title" class="form-text text-danger"></small>
                            </div>

                            <div class="col-12 form-field" style="margin-top: 10px;">
                                <label for="desc" class="form-label">Description</label>
                                <textarea name="description" id="summernoteUpdate" class="form-control edit_description">{{ !empty($pricingExplained) ? $pricingExplained['description'] : '' }}</textarea>
                                <small id="edit_error_description" class="form-text text-danger"></small>
                            </div>

                            <div class="col-sm-5 form-field ml-auto" style="margin-top: 10px;">
                                <div class="btns justify-content-end"><input type="submit" class="btn btn-primary" value="Save">
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" aria-label="Close">Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#summernoteAdd').summernote();
        $('#summernoteUpdate').summernote();
    });
</script>

<!-- Add Pricing -->
<script>
    $('#cmsPricing').on('submit', function(e) {
        e.preventDefault();

        let _token = "{{csrf_token()}}";
        let title = $('#title').val();
        let description = $('.description').val();

        $("#error_title").html('');
        $("#error_description").html('');

        $.ajax({
            type: "POST",
            url: "{{route('storePricingExplained')}}",
            data: {
                _token,
                title,
                description
            },
            success: function(response) {
                if (response == 200) {
                    location.reload();
                    //alertify.success('Saved Successfully');
                }
            },
            error: function(validation) {
                if (validation.status === 422) {
                    let response = $.parseJSON(validation.responseText);
                    $.each(response.errors, function(index, value) {
                        $("#error_" + index).html(value);
                    });
                }
            }
        });
    });

    $('#editPricingForm').on('submit', function(e) {
        e.preventDefault();

        let _token = "{{csrf_token()}}";
        let id = $('#pricingID').val();
        let title = $('#edit_title').val();
        let description = $('.edit_description').val();

        $("#edit_error_title").html('');
        $("#edit_error_description").html('');

        $.ajax({
            type: "POST",
            url: "{{route('updatePricingExplained')}}",
            data: {
                _token,
                id,
                title,
                description
            },
            success: function(response) {
                if (response == 200) {
                    location.reload();
                    //alertify.success('Saved Successfully');
                }
            },
            error: function(validation) {
                if (validation.status === 422) {
                    let response = $.parseJSON(validation.responseText);
                    $.each(response.errors, function(index, value) {
                        $("#edit_error_" + index).html(value);
                    });
                }
            }
        });
    });
</script>

@include('admin.footer')
