<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>My Account Panel | Cleanodds.com</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <base href="https://www.cleanodds.com/" target="_top">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">

<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link rel="icon" href="{{asset('images/favicon.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="images/favicon.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/favicon.png">
    <meta property="og:url" content="https://www.cleanodds.com/" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="My Account Panel | Cleanodds.com" />
    <meta property="og:description" content="Cleanodds is the best source of well-researched football statistics, analysis, and predictions.." />
    <meta property="og:image" content="https://www.cleanodds.com/cleanodds/images/r2-share.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="140" />
    <meta property="og:image:height" content="140" />

    <!-- Css Files -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('sweetalert/sweetalert.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Doppio+One|Monda|Philosopher" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Concert+One|Mukta|Staatliches" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <link  rel="stylesheet" type="text/css" href="{{asset('file_upload/bootstrap-fileupload.min.css')}}">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    @yield('levelCSS')
    <link href="https://fonts.googleapis.com/css?family=Arya" rel="stylesheet">
    <link href="{{asset('portal/bootsnav/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('portal/bootsnav/css/bootsnav.css')}}" rel="stylesheet">
    <link href="{{asset('portal/bootsnav/css/style.css')}}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-79267618-8"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-79267618-8');
</script>

</head>
<body style="font-family: 'Mukta', sans-serif;">
<style>
    @media (max-width: 978px) {
        .nopaddingsmall {
            padding: 0px!important;
        }
        .smTableFontSize{
            font-size: 12px!important;
        }
        #tabs a{
            padding: .7em .9em;
        }
        .accountHolder{margin-top: 50px;}
        nav.navbar.bootsnav ul.nav > li > a{
            color: #2E86C1;
        }
        .forceLogo{float: right!important; margin-top: 4px;}
        .hideLG{display: block!important;}
        .hideSM{display: none}
    }
    .hideLG{display: none}
</style>
<nav class="navbar navbar-default navbar-mobile navbar-sidebar bootsnav">

    <div class="container">
        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars" style="color: #260000"></i>
            </button>
            <a class="navbar-brand" href="{{route('/')}}"><img src="{{asset('images/logo_deep.png')}}" class="logo forceLogo" alt=""></a>
        </div>
        <!-- End Header Navigation -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <!-- Start Menu -->
            <ul class="nav navbar-nav" data-in="fadeInDown" data-out="fadeOutUp" style="">
                <li class="dropdown accountHolder" style="background: transparent!important;">
                    <img src="@if(currentUser()->passport) {{$localPath}}/users/{{currentUser()->passport}} @else {{$localPath}}/avatar.png @endif" class="img-circle img-responsive" style="max-height: 50px; float: left; position: relative; z-index: 99999; margin-right: 10px;" alt="Avatar">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background: transparent!important;"><span class="text-uppercase">{{currentUser()->full_name}}</span>
                    </a>
                    <ul class="dropdown-menu" style="background: transparent!important;">
                        <li><a href="{{route('/app/index')}}">Account</a></li>
                        <li><a href="{{route('/app/update_profile')}}">Edit Profile</a></li>
                        <li><a href="{{route('/logout')}}">Logout</a></li>
                    </ul>
                </li>
                <br>

                <li>
                    <a href="{{route('/')}}">
                        {{--<i class="fa fa-home"></i>--}}
                        <i class="fa fa-angle-double-right pull-right"></i>
                        <span class="menu-text">HOMEPAGE</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="">
                    <a href="{{route('/app/index')}}">
                        {{--<i class="fa fa-tachometer"></i>--}}
                        <i class="fa fa-angle-double-right pull-right"></i>
                        <span class="menu-text">MY ACCOUNT</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li>
                    <a href="{{route('/app/update_profile')}}">
                        {{--<i class="fa fa-edit"></i>--}}
                        <i class="fa fa-angle-double-right pull-right"></i>
                        <span class="menu-text">EDIT PROFILE</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="text-primary"><strong></strong></li>
                <li class="@yield('vip')">
                    <a href="{{route('/vip_packages')}}">
                        {{--<i class="fa fa-th-list"></i>--}}
                        <i class="fa fa-angle-double-right pull-right"></i>
                        <span class="menu-text">VIP PRICES</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="@yield('vip')">
                    <a href="{{route('/app/sms_campaign')}}">
                        {{--<i class="fa fa-th-list"></i>--}}
                        <i class="fa fa-angle-double-right pull-right"></i>
                        <span class="menu-text">SMS CAMPAIGN</span>
                        <span class="selected"></span>
                    </a>
                </li>

                @if(activeUser())
                    <li>
                        <hr>
                    </li>
                    @if(currentUser()->sub->category=='Super Plan' || currentUser()->sub->category=="Mega Plan")
                        <li>
                            <a href="{{route('/btts_gg')}}" style="">
                                <i class="fa fa-check-square"></i>
                                <i class="fa fa-caret-right pull-right"></i>
                                <span class="menu-text">BTTS/GG</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li style="">
                            <a href="{{route('/draws')}}" style="">
                                <i class="fa fa-check-square"></i>
                                <i class="fa fa-caret-right pull-right"></i>
                                <span class="menu-text">Draws</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li style="">
                            <a href="{{route('/weekend_tips')}}" style="">
                                <i class="fa fa-check-square"></i>
                                <i class="fa fa-caret-right pull-right"></i>
                                <span class="menu-text">Weekend Tips</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li style="">
                            <a href="{{route('/over35goals')}}" style="">
                                <i class="fa fa-check-square"></i>
                                <i class="fa fa-caret-right pull-right"></i>
                                <span class="menu-text">Over 3.5</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li style="color: black;">
                            <a href="{{route('/sureTwoOdds')}}" style="">
                                <i class="fa fa-check-square"></i>
                                <i class="fa fa-caret-right pull-right"></i>
                                <span class="menu-text">Sure 2 Odds</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li style="">
                            <a href="{{route('/sureThreeOdds')}}" style="">
                                <i class="fa fa-check-square"></i>
                                <i class="fa fa-caret-right pull-right"></i>
                                <span class="menu-text">Sure 3 Odds</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                    @if(currentUser()->sub->category=="Mega Plan")
                        <li style="">
                            <a href="{{route('/ht_ft')}}" style="">
                                <i class="fa fa-check-square"></i>
                                <i class="fa fa-caret-right pull-right"></i>
                                <span class="menu-text">HT/FT</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li style="">
                            <a href="{{route('/correct_score')}}" style="">
                                <i class="fa fa-check-square"></i>
                                <i class="fa fa-caret-right pull-right"></i>
                                <span class="menu-text">Correct Score</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li style="">
                            <a href="{{route('/expert_ACCA')}}" style="">
                                <i class="fa fa-check-square"></i>
                                <i class="fa fa-caret-right pull-right"></i>
                                <span class="menu-text">Expert ACCA</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li style="">
                            <a href="{{route('/single_bets')}}" style="">
                                <i class="fa fa-check-square"></i>
                                <i class="fa fa-caret-right pull-right"></i>
                                <span class="menu-text">Single Bets</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li style="">
                            <a href="{{route('/sureFiveOdds')}}" style="">
                                <i class="fa fa-check-square"></i>
                                <i class="fa fa-caret-right pull-right"></i>
                                <span class="menu-text">Sure 5 Odds</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                        <li style="">
                            <a href="{{route('/match_corners')}}" style="">
                                <i class="fa fa-check-square"></i>
                                <i class="fa fa-caret-right pull-right"></i>
                                <span class="menu-text">Match Corner</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif
                    @if(currentUser()->sub->category="Investment Scheme")

                        <li style="">
                            <a href="{{route('/super_investment_tip')}}" style="">
                                <i class="fa fa-check-square"></i>
                                <i class="fa fa-caret-right pull-right"></i>
                                <span class="menu-text">Investment Scheme</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    @endif

                {{--<li>--}}
                    {{--<a href="{{route('/app/make_payment')}}">--}}
                        {{--<i class="fa fa-money"></i>--}}
                        {{--<i class="fa fa-angle-double-right pull-right"></i>--}}
                        {{--<span class="menu-text">Renew VIP Plan</span>--}}
                        {{--<span class="selected"></span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                @else
                <li></li>

                    <li>
                        <hr>
                    </li>
                    <li class="text-primary"><strong>Free Tips Stores</strong></li>
                    <li>
                        <a href="{{route('/1_5_goals')}}">
                            <span class="badge pull-right">free</span>
                            <span class="menu-text">1.5 Goals</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('/2_5_goals')}}">
                            <span class="badge pull-right">free</span>
                            <span class="menu-text">2.5 Goals</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('/double_chance')}}">
                            <span class="badge pull-right">free</span>
                            <span class="menu-text">Double Chance</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('/draw_no_bet')}}">
                            <span class="badge pull-right">free</span>
                            <span class="menu-text">Draw No Bet</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('/win_either_half')}}">
                            <span class="badge pull-right">free</span>
                            <span class="menu-text">Win Either Half</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('/half_time_results')}}">
                            <span class="badge pull-right">free</span>
                            <span class="menu-text">Half-Time Results</span>
                        </a>
                    </li>
                @endif
            </ul>
            <!-- End Menu -->
        </div><!-- /.navbar-collapse -->
    </div>
</nav>
<section>
    <div class="container" style="background: #013220; border-bottom: 3px solid #024b30; margin-top: -20px;">
        <div class="row">
            <div class="col-sm-12" style="margin-top: 35px;">
                <div id="cssmenu">
                    <h3 style="color: whitesmoke">@yield('title')</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 nopaddingsmall" style="margin-top: 10px;">
                @yield('body')
                <br><br><br><br><br>
            </div>
        </div>
    </div>
</section>

<div class="footer">
    <div class="container">
        <div class="row ">
            <!-- footer-about -->
            <div class="col-sm-3 col-xs-12">
                <div class="footer-widget ">
                    <div class="ft-logo"><img src="{{asset('images/logo.png')}}" style="max-height: 50px;" alt=""></div>
                    <br>
                    {{--<div class="footer-title">We Predict Right!</div>--}}
                    <p>Cleanodds is the best site when you are searching for the free football betting tips and prediction sites.</p>
                </div>
            </div>
            <!-- /.footer-about -->
            <!-- footer-links -->
            <div class="col-sm-3 col-xs-12">
                <div class="footer-widget ">
                    <div class="footer-title">Quick Links</div>
                    <ul class="list-unstyled">
                        <li><a href="{{route('/tips_store')}}">Tips Store <i class="fa fa-angle-right pull-right"></i></a></li>
                        <li><a href="{{route('/testimonials')}}">Testimonials <i class="fa fa-angle-right pull-right"></i></a></li>
                        <li><a href="{{route('/blog')}}">Blog <i class="fa fa-angle-right pull-right"></i></a></li>
                        <li><a href="{{route('/about_us')}}">About Us <i class="fa fa-angle-right pull-right"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- /.footer-links -->
            <!-- footer-links -->
            <div class="col-sm-3 col-xs-12">
                <div class="footer-widget ">
                    <div class="footer-title">Information</div>
                    <ul class="list-unstyled">
                        <li><a href="{{route('/disclaimer')}}">Disclaimer <i class="fa fa-angle-right pull-right"></i></a></li>
                        <li><a href="{{route('/privacy_policy')}}">Privacy Policy <i class="fa fa-angle-right pull-right"></i></a></li>
                        <li><a href="{{route('/faq')}}">FAQs <i class="fa fa-angle-right pull-right"></i></a></li>
                        <li><a href="{{route('/partners')}}">Partners <i class="fa fa-angle-right pull-right"></i></a></li>
                        {{--<li><a href="{{route('/advertise')}}">Advertise</a></li>--}}
                    </ul>
                </div>
            </div>
            <!-- /.footer-links -->
            <!-- footer-links -->
            <div class="col-sm-3 col-xs-12">
                <div class="footer-widget ">
                    <div class="footer-title">Contact Us</div>
                    <ul class="list-unstyled">
                        <li><a href="#"><strong style="color: orange">Email Addresses:</strong></a></li>
                        <br>
                        <li><a href="mailto:contact@cleanodds.com">contact@cleanodds.com</a></li>
                        <li><a href="mailto:advert@cleanodds.com">advert@cleanodds.com</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.footer-links -->
            <!-- tiny-footer -->
        </div>
        <div class="row ">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center ">
                <div class="tiny-footer">
                    <p>Designed by <a href="https://www.technica.com.ng" target="_blank" class="copyrightlink" style="color: #888D90">Technica Solutions</a></p>
                </div>
            </div>
            <!-- /. tiny-footer -->
        </div>
    </div>
</div>

<!-- jQuery (necessary for JavaScript plugins) -->


<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script type="text/javascript"  src="{{asset('sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('bootsnav/js/bootsnav.js')}}"></script>
{{--<script type="text/javascript"  src="{{asset('script/native.js')}}"></script>--}}

<script src="{{asset('file_upload/bootstrap-fileupload.js')}}"></script>
@yield('levelJS')
@if(currentUser()->sms_status=='1')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    (function($){

        $('#updateProfile').submit(function (e) {
            e.preventDefault();
            $('#updateBtn').prop('disabled', true).html("SAVING <i class='fa fa-spinner fa-spin'></i>");
            var url =  $(this).attr('action');
            var method = $(this).attr('method');
            var formData = new FormData($(this)[0]);

            $.ajax({
                type: method,
                url: url,
                data: formData,
                processData: false,
                contentType: false,
                async: true,
                dataType: "JSON",
                success: function (data) {
                    if (data.status == 1) {
                        $('#updateBtn').prop('disabled', false).html("SAVE UPDATES <i class='fa fa-arrow-circle-right'></i>");
                        swal(data.post, '', 'warning');
                    }
                    else {
                        if(data.status==3){
                        swal('UPDATED SUCCESSFULLY', '', 'success');
                        $('#updateBtn').prop('disabled', false).html("SAVE UPDATES <i class='fa fa-arrow-circle-right'></i>");
                        window.open('{{route("/activate/gen/phone")}}');

                    }else{
                         swal('UPDATED SUCCESSFULLY', '', 'success');
                        $('#updateBtn').prop('disabled', false).html("SAVE UPDATES <i class='fa fa-arrow-circle-right'></i>");
                    }
                    }
                },
                failure: function (e) {
                    swal('OOPS! SOMETHING IS BROKEN', 'Reloading Page', 'danger');
                    location.reload();
                }
            })
        });
    })(jQuery);
</script>
@else
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    (function($){

        $('#updateProfile').submit(function (e) {
            e.preventDefault();
            $('#updateBtn').prop('disabled', true).html("SAVING <i class='fa fa-spinner fa-spin'></i>");
            var url =  $(this).attr('action');
            var method = $(this).attr('method');
            var formData = new FormData($(this)[0]);

            $.ajax({
                type: method,
                url: url,
                data: formData,
                processData: false,
                contentType: false,
                async: true,
                dataType: "JSON",
                success: function (data) {
                    if (data.status == 1) {
                        $('#updateBtn').prop('disabled', false).html("SAVE UPDATES <i class='fa fa-arrow-circle-right'></i>");
                        swal(data.post, '', 'warning');
                    }
                    else {
                        swal('UPDATED SUCCESSFULLY', '', 'success');
                        $('#updateBtn').prop('disabled', false).html("SAVE UPDATES <i class='fa fa-arrow-circle-right'></i>");

                    }
                },
                failure: function (e) {
                    swal('OOPS! SOMETHING IS BROKEN', 'Reloading Page', 'danger');
                    location.reload();
                }
            })
        });
    })(jQuery);
</script>
@endif
</body>
</html>
