

<!doctype html>
<html lang="en">

<head>

        <meta charset="utf-8" />
        <title>Login | cleanodds.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="christian umanah" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">

        <!-- Bootstrap Css -->
        <link href="{{asset('layouts/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('layouts/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('layouts/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-dark">
                                <div class="row">
                                    <div class="col-12 col-sm-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-white">Welcome Back !</h5>
                                            <p>Sign in to continue to Cleanodds.</p>
                                        </div>
                                    </div>
                                    <div class="col-12  col-sm-5 align-self-end hideSM">
                                        <img src="{{asset('layouts/assets/images/profile-img.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="auth-logo">
                                    <a href="{{ url('/') }}" class="auth-logo-light">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{ asset('assets/img/favicon.png') }}" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>

                                    <a href="{{ url('/') }}" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{ asset('assets/img/favicon.png') }}" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <div class="form-group-lg col-sm-12">
                                        @if(session('err'))
                                            <div class="alert alert-danger alert-dismissible">
                                                <p>{{session('err')}}</p>
                                            </div>
                                        @endif
                                        @if(session('success'))
                                            <div class="alert alert-success alert-dismissible">
                                                <p>{{session('success')}}</p>
                                            </div>
                                        @endif

                                    </div>
                                    <form class="form-horizontal" action="{{route('/login')}}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" required placeholder="email address">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" name="password" required class="form-control" placeholder="password">
                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember-check">
                                            <label class="form-check-label" for="remember-check">
                                                Remember me
                                            </label>
                                        </div>

                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                        </div>


                                        <div class="mt-4 text-center">
                                            <a href="{{route('/reset-password')}}" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">

                            <div>
                                <p>Don't have an account ? <a href="{{route('/register')}}" class="fw-medium text-black"> Signup now </a> </p>
                                <p>© <script>document.write(new Date().getFullYear())</script> Cleanodds. Designed  <i class="mdi mdi-heart text-danger"></i> by <a target="_blank" href="https://vitekwebsolutions.com"> vitek Solutions</a></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
        <script src="{{asset('layouts/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('layouts/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('layouts/assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('layouts/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('layouts/assets/libs/node-waves/waves.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('layouts/assets/js/app.js')}}"></script>
    </body>

</html>
