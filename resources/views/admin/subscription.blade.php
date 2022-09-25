



    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Subscription</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                                <li class="breadcrumb-item">Subscription</li>
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
                            <label for="">Subscription Type:</label>
                            <div class="form-group">

                                <div class="">
                                    <input type="radio" name="radio1" class="" id="customCheckdef1">
                                    <label class="" for="customCheckdef1">Basic</label>
                                </div>
                                <div class="">
                                    <input type="radio" name="radio1" class="" id="customCheckdef2">
                                    <label class="" for="customCheckdef2">Medium</label>
                                </div>
                                <div class="">
                                    <input type="radio" name="radio1" class="" id="customCheckdef3" >
                                    <label class="" for="customCheckdef3">Pro</label>
                                </div>

                            </div>


                            <div class="form-group">
                                <label for="">Details</label>
                                <textarea name="content" id="classic-editor" class="form-control">
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="d-flex">
                                <div class="ml-auto">
                                    <input type="submit" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- customar project  end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->

    </div>


    <script src="assets/js/plugins/ckeditor.js"></script>
    <script type="text/javascript">
        $(window).on('load', function() {
            ClassicEditor.create(document.querySelector('#classic-editor'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
