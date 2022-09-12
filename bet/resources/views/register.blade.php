


<!doctype html>
<html lang="en">

<head>

        <meta charset="utf-8" />
        <title>Register  | Cleanodds.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="christian umanah" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">

        <!-- owl.carousel css -->
        <link rel="stylesheet" href="{{asset('layouts/assets/libs/owl.carousel/assets/owl.carousel.min.css')}}">

        <link rel="stylesheet" href="{{asset('layouts/assets/libs/owl.carousel/assets/owl.theme.default.min.css')}}">

         <!-- Bootstrap Css -->
         <link href="{{asset('layouts/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
         <!-- Icons Css -->
         <link href="{{asset('layouts/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
         <!-- App Css-->
         <link href="{{asset('layouts/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
         <link  rel="stylesheet" type="text/css" href="{{asset('sweetalert/sweetalert.css')}}">
         <link rel="stylesheet" href="{{asset('select2/css/select2.min.css')}}">

    </head>

    <body>

        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-sm-7 col-12">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Free Register</h5>
                                            <p>Get your free Cleanodds account now.</p>
                                        </div>
                                    </div>

                                    <div class="col-5 col-sm-5 align-self-end hideSM">
                                        <img src="{{asset('layouts/assets/images/profile-img.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div>
                                    <a href="index.html">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{ asset('assets/img/favicon.png') }}" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form method="post" action="{{route('/register')}}" id="registerForm" data-callback="{{route('/login')}}" >
                                        @csrf

                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email</label>
                                            <input type="text" name="full_name" class="form-control" required placeholder="full name here">
                                            <div class="invalid-feedback">
                                                Full Name
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" id="useremail" placeholder="Enter email" required>
                                            <div class="invalid-feedback">
                                                Please Enter Email
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Phone Number</label>
                                            <input type="text" name="phone" class="form-control" placeholder="phone number">
                                            <div class="invalid-feedback">
                                                Phone Number
                                            </div>
                                        </div>



                                        <div class="mb-3">
                                            <label for="username" class="form-label">Select Country</label>
                                            <select name="country" class="form-control crs-country select2" data-region-id="one" required id="" style="height: 35px!important;"></select>
                                            <div class="invalid-feedback">
                                               Select Country
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="userpassword" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password" required>
                                            <div class="invalid-feedback">
                                                Please Enter Password
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="userpassword" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirmation" id="userpassword" placeholder="Enter password" required>
                                            <div class="invalid-feedback">
                                                Confirm Password
                                            </div>
                                        </div>


                                        <div class="mt-4 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" id="regBtn" >Register</button>
                                        </div>


                                        <div class="mt-4 text-center">
                                            <p class="mb-0">By registering you agree to the Cleanodds <a href="#" class="text-primary">Terms of Use</a></p>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">

                            <div>
                                <p>Already have an account ? <a href="{{ url('/login') }}" class="fw-medium text-black"> Login</a> </p>
                             
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>






        <!-- JAVASCRIPT -->
        <script src="{{asset('layouts/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('layouts/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('layouts/assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('layouts/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('layouts/assets/libs/node-waves/waves.min.js')}}"></script>

        <!-- owl.carousel js -->
        <script src="{{asset('layouts/assets/libs/owl.carousel/owl.carousel.min.js')}}"></script>

        <!-- validation init -->
        <script src="{{asset('layouts/assets/js/pages/validation.init.js')}}"></script>

        <!-- auth-2-carousel init -->
        <script src="{{asset('layouts/assets/js/pages/auth-2-carousel.init.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('layouts/assets/js/app.js')}}"></script>
        <script type="text/javascript"  src="{{asset('sweetalert/sweetalert.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('region_selector/jquery.crs.min.js')}}"></script>
<script type="text/javascript" src="{{asset('select2/js/select2.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
        <script>
            $(document).ready(function () {
                $('.select2').select2({
                    placeholder: 'Select country'
                });
            });
        </script>
    </body>
</html>
