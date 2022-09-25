@include('user.header')
<!-- Ec breadcrumb start -->
<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">ORDER PROCESS</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="ec-breadcrumb-item active">ORDER PROCESS</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ec breadcrumb end -->

<!-- Start Privacy & Policy page -->
<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">

                    <h2 class="ec-title" style="color: #EE8013 !important;">{{ !empty($orderProcess) ? $orderProcess['title'] : 'Order Process' }}</h2>
                </div>
            </div>
            <div class="col-md-12">
                <div class="ec-common-wrapper">
                    <div class="col-sm-12 ec-cms-block">
                        <div class="ec-cms-block-inner">
                            <!-- <h3 class="ec-cms-block-title" style="color: #EE8013 !important;">Artwork Proofing</h3> -->
                            <p>{!! !empty($orderProcess) ? $orderProcess['description'] : 'No Description Found' !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Privacy & Policy page -->

@include('user.footer')