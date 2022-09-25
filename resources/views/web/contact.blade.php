@include('web.header')


<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">Contact US</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="#">Home</a></li>
                            <li class="ec-breadcrumb-item active">Contact US</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="ec-common-wrapper">
                <div class="ec-contact-leftside">
                    <div class="ec-contact-container">
                        <div class="ec-contact-form">
                            <form action="#" method="post">
                                    <span class="ec-contact-wrap">
                                        <label>Forename*</label>
                                        <input type="text" name="Forename" placeholder="Enter your first name" required="">
                                    </span>
                                <span class="ec-contact-wrap">
                                        <label>Surname*</label>
                                        <input type="text" name="Surname" placeholder="Enter your last name" required="">
                                    </span>
                                <span class="ec-contact-wrap">
                                        <label>Email*</label>
                                        <input type="email" name="email" placeholder="Enter your email address" required="">
                                    </span>
                                <span class="ec-contact-wrap">
                                        <label>Phone Number*</label>
                                        <input type="text" name="phonenumber" placeholder="Enter your phone number" required="">
                                    </span>

                                <span class="ec-contact-wrap">
                                        <label>Company (Optional):*</label>
                                        <input type="text" name="company" placeholder="Enter your Company" required="">
                                    </span>
                                <span class="ec-contact-wrap">
                                        <label>Type of Clothing e.g T Shirts, polos:*</label>
                                        <input type="text" name="e.g T Shirts, polos" placeholder="e.g T Shirts, polos" required="">
                                    </span>
                                <span class="ec-contact-wrap">
                                        <label>Quantity:*</label>
                                        <input type="text" name="Quantity" placeholder="Enter your Quantity" required="">
                                    </span>

                                <span class="ec-contact-wrap">
                                        <label>Print or Embroidery:*</label>
                                        <input type="text" name="Quantity" placeholder="Enter your Print or Embroidery" required="">
                                    </span>

                                <span class="ec-contact-wrap">
                                        <label>Print/Embroidery Location(s):*</label>
                                        <input type="text" name="Quantity" placeholder="Enter your Print/Embroidery Location(s)" required="">
                                    </span>
                                <span class="ec-contact-wrap">
                                        <label>Upload of Artwork:*</label>
                                        <input type="file" name="type" >
                                    </span>

                                <span class="ec-contact-wrap">
                                        <label>Enter any Additional Information here:*</label>
                                        <textarea name="address" placeholder="Enter any Additional Information here.."></textarea>
                                    </span>

                                <span class="ec-contact-wrap ec-recaptcha">
                                        <span class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></span>
                                        <input class="form-control d-none" data-recaptcha="true" required="" data-error="Please complete the Captcha">
                                        <span class="help-block with-errors"></span>
                                    </span>
                                <span class="ec-contact-wrap ec-contact-btn">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </span>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="ec-contact-rightside">
                    <div class="ec_contact_map">
                        <div class="ec_map_canvas">
                            <iframe id="ec_map_canvas" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d71263.65594328841!2d144.93151478652146!3d-37.8734290780509!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1615963387757!5m2!1sen!2sus"></iframe>
                            <a href="https://sites.google.com/view/maps-api-v2/mapv2"></a>
                        </div>
                    </div>
                    <div class="ec_contact_info">
                        <h1 class="ec_contact_info_head">Contact us</h1>
                        <ul class="align-items-center">

                            <li class="ec-contact-item"><h4>Haltbar Ltd</h4></li>
                            <li class="ec-contact-item"><i class="ecicon eci-map-marker" aria-hidden="true"></i><span>Address :</span>8 Wakemans Hill Avenue
                                Kingsbury
                                London
                                NW9 0TY
                            </li>
                            <li class="ec-contact-item align-items-center"><i class="ecicon eci-phone" aria-hidden="true"></i><span>Call Us :</span><a href="tel:+44 7791 936 199">+44 7791 936 199</a>
                                   <a href="tel:+44 7960 350 116">+44 7960 350 116</a></li>
                            <li class="ec-contact-item align-items-center"><i class="ecicon eci-envelope" aria-hidden="true"></i><span>Email :</span><a href="mailto:example@ec-email.com">support@haltbarworkwear.co.uk</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('web.footer')
