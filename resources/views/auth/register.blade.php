<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Haltbar | Register</title>
    <link rel="shortcut icon" type="image/png" href="{{url('assets')}}/images/favicon.png" />
    <link href="{{url('public/assets')}}/css/login.css" rel="stylesheet">
</head>

<body>


<style>
    .gradient-custom-2 {

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, #D1A94D, #CC9E36, #C69320);

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, #D1A94D, #CC9E36, #C69320);

    }
    @media (min-width: 769px) {
        .gradient-custom-2 {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem;
        }
    }

    .btn-primary {
        border-color: #6e6e6e !important;
        background-color: #6e6e6e !important;
    }

    .btn-primary:hover {
        border-color: #6e6e6e !important;
        background-color: #6e6e6e !important;
    }


    .authincation {
        background: #f0fbfc;

    }
</style>

<section class="h-100 gradient-form authincation">
    <div class="container  h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-6 ">
                <div class="card rounded-3 text-black mt-5 mb-5" style="    box-shadow: 0 0 2.1875rem 0 rgb(154 161 171 / 15%);
    border-radius: 0.3125rem;">
                    <div class="row g-0">

                        <div class="col-lg-12">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">

                                    <img src="{{url('public/assets')}}/web/images/haltbar.png" alt="logo" style="height:60px;">
                                    <p class="mt-3">Register to your account</p>
                                </div>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example11">Name</label>
                                        <input type="text" id="form2Example11" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" />
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input type="hidden" name="role" value="customer">
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example12">Email Address</label>
                                        <input type="email" id="form2Example12" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email address" />
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example13">Password</label>
                                        <input type="password" id="form2Example13" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password" />
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example22">Confirm Password</label>
                                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="confirm password" />
                                    </div>

                                    <div class="text-center pt-1  mr-4">
                                        <button type="submit" class="  mb-3 mr-4 btn btn-primary">{{ __('Register') }}</button>

                                    </div>

                                    <div class="d-flex align-items-center justify-content-center ">
                                        <p class="mb-0 me-2">Already account?</p>
                                        <a href="{{route('login')}}" class="btn btn-outline-primary">Log In</a>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript -->
<!-- Required vendors -->
<script src="{{url('assets/admin')}}/vendor/global/global.min.js"></script>
<script src="{{url('assets/admin')}}/js/custom.min.js"></script>
<script src="{{url('assets/admin')}}/js/dlabnav-init.js"></script>
<script src="{{url('assets/admin')}}/js/styleSwitcher.js"></script>

</body>

</html>
