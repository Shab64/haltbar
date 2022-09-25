@include('user.header')
<style>
    .ec-cms-block .ec-cms-block-title {
        margin-bottom: 5px;
        margin-top: 10px;
    }
</style>


<!-- Ec breadcrumb start -->
<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">Terms & Condition</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="ec-breadcrumb-item active">Terms & Condition</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ec breadcrumb end -->

<!-- Start Terms & Condition page -->
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">

                    <h2 class="ec-title" style="color: #EE8013 !important;">{{ !empty($terms) ? $terms['title'] : 'Terms and Condition' }}</h2>
                </div>
            </div>
            <div class="col-md-12">
                <div class="ec-common-wrapper">
                    <div class="col-sm-12 ec-cms-block">
                        <div class="ec-cms-block-inner">
                            <!-- <h3 class="ec-cms-block-title" style="color: #EE8013 !important;">Artwork Proofing</h3> -->
                            <p>{!! !empty($terms) ? $terms['description'] : 'No Description Found' !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Terms & Condition page -->



@include('user.footer')