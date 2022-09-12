
<!doctype html>
<html class="no-js" lang="">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <!-- Normalize CSS -->
    	<link rel="canonical" href="https://cleanodds.com/" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="CLEAN ODDS - Fixed Betting tips 100% Sure, Football Betting Tips and Predictions, Free &amp; Daily - CLEAN ODDS" />
	<meta property="og:url" content="https://cleanodds.com/" />
	<meta property="og:site_name" content="Fixed Betting tips 100% Sure, Football Betting Tips and Predictions, Free &amp; Daily - CLEAN ODDS" />
    <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <!-- Font-awesome CSS-->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <!-- Owl Caousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/OwlCarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/OwlCarousel/owl.theme.default.min.css') }}">
    <!-- Main Menu CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <!-- Magnific CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!-- Switch Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/hover-min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ie-only.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/style.css') }}">
    <!-- For IE -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ie-only.css') }}" />
    <!-- Modernizr Js -->
    <link rel="stylesheet" type="text/css" href="{{ asset('sweetalert/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('select2/css/select2.min.css') }}">
    <script src="{{ asset('assets/js/modernizr-2.8.3.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('node_modules/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
    <style>
        @media (max-width: 978px) {
            .nopaddingsmall {
                padding: 0px !important;
            }

            .hideSM {
                display: none;
            }

            .hideLG {
                display: block !important;
            }
        }

        .hideLG {
            display: none
        }
        footer .footer-box ul.popular-categories li a span {
    position: absolute;
    top: 0;
    right: 0;
    z-index: 2;
    font-size: 14px;
    color: #2ca745;
}
.bg-dark {
    background-color: #006813!important;
}
.bg-primary {
    background-color: #186913 !important;
}

.nav-justified .nav-item {
    -ms-flex-preferred-size: 0;
    flex-basis: 0;
    -ms-flex-positive: 1;
    background: #186913;
    flex-grow: 1;
    border: 1px solid white;
    text-align: center;
    /* color: white; */
}
.mt-20-r {
    margin-top: 1rem;
}
.section-space-default {
    padding: 0px 0;
}
.section-space-less2 {
    padding: 0px 0 9px;
}
@media (max-width: 978px){
   .navbar-light .navbar-nav .nav-link {
    background: #154e12;
    color: rgba(0,0,0,.5);
    padding: 11px 5px;
    border-bottom: 1px solid;
    border-right: none;
}

.Desktop-Sticky {
    position: fixed;
    bottom: -50px!important;
    z-index: 9999;
    text-align: center;
}
}
.table td, .table th {
    padding: 0.4rem;
    vertical-align: top;
    border-top: 1px solid #f8f8f8;
}

/*footer {*/
/*    background-color: #186913;*/
/*}*/
.bg-announcement{
    background:#021601!important;
}
.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:63px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}
.float_text{
    position: fixed;
    width: 100%;
    bottom: 5px;
    background-color: #25d365;
    color: #f8f8f8;
    text-align: right;
    width: fit-content;
    font-size: 16px;
    z-index: 100;
    /* top: 2px; */
    padding: 4px;
    border-radius: 7px;
    right: 19px;
}
.Desktop-Sticky {
    position: fixed;
    bottom: 20px;
    z-index: 9999;
    text-align: center;
}
.my-float{
	margin-top:16px;
}
.sidebarads{
    display:block;
}
.divFLRALeft{
  position: fixed; top: 10%; width: 180px; height: 600px; overflow: hidden; z-index: 999; left: 0%
}
  .divFLRARight{   
position: fixed; top: 10%; width: 180px; height: 600px; overflow: hidden; z-index: 1; right:0%}
@media ( max-width:1440px){
    .divFLRALeft{
    left:-1%!important;
}
    .divFLRARight{
    right:-1%!important;
}
}
@media ( max-width:1024px){
    .sidebarads{
    display:none!important;
}

    .float_text{
        display:none;
    }
    .float {
    position: fixed;
    width: 51px;
    height: 49px;
    bottom: 50px;

    background-color: #25d366;
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    font-size: 27px;
    box-shadow: 2px 2px 3px #999;
    z-index: 100;
}
    .my-float {
    margin-top: 12px;
}
    .float{
        right:6px;
    }
}
.text-price {
    color: #e0b70a !important;
}

@media (min-width: 1200px){
   .container {
    max-width: 1051px;
} 


.divFLRALeft{
  position: fixed; top: 6%; width: 180px; height: 600px; overflow: hidden; z-index: 999; left: -1%
}
  .divFLRARight{   
position: fixed; top: 6%; width: 180px; height: 600px; overflow: hidden; z-index: 1; right:-1%}
}

@media (max-width: 700px){
    
    .divFLRALeft{
    display:none!important;
}
    .divFLRARight{
    display:none!important;
}  
}

    </style><!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ECFZMEJ36T"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-ECFZMEJ36T');
</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6957638061358408"
     crossorigin="anonymous"></script>
     
    @yield('CSS')
</head>

<body>


    <div id="wrapper" class="wrapper">


        <div class="container-fluid logo_header bg-dark">
            <div class="container">
                <div class="row no-gutters d-flex align-items-center">
                    <div class="col-lg-2 ">
                        <div class="logo-area">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <?php

                    $ad1 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'ad1')
                    ->inRandomOrder()
                        ->where('status', '0')
                        ->first();

                    $cad1 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'code_ad1')
                    ->inRandomOrder()
                        ->where('status', '0')
                        ->first();



                    ?>





                    <div class="col-xl-10 col-lg-10 ">
                        <div class="hideLG text-center mt-5">
                                @if (currentUser())

                            <a class="d-inline" href="{{ route('/app/index') }}" >


                                <button type="button" class="btn btn-success btn-sm navbar-btn"
                                    style="margin-left: 10px; margin-right: 10px;"><i class="fa fa-user-circle-o"></i>My
                                    Account </button>


                            </a>


                            {{-- <a href="{{route('/logout')}}"  class="nav-item nav-link"
                            style="color: white;"><i class="fa fa-sign-out"></i> Logout</a> --}}
                        @else
                            <a class="d-inline text-danger" href="{{ route('/login') }}" style="    padding: 3px;
                            border: 1px solid;
                            border-radius: 1px;"><strong>                                    LOGIN
</strong></a>&nbsp;&nbsp;&nbsp;
                            <a class="d-inline text-danger" href="{{route('/register')}}" style="    padding: 3px;
                            border: 1px solid;
                            border-radius: 1px;">
                                <strong>REGISTER</strong>
                                 </a>

                        @endif
                        </div>

                                                <div class="col-12 hideSM mb-4">
                            <div class="ne-banner-layout1 mt-20-r text-center">
                                @if (isset($ad1))
                                <a href="{{ $ad1->website }}" target="_blank">
                                    <img src="{{ $path }}/ads/{{ $ad1->ads_image }}" alt="ad"
                                        class="img-fluid">
                                </a>
                                @endif
                                @if (isset($cad1))
                                {!! $cad1->website !!}
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid px-0 text-white bg-dark" style="    border-bottom: 5px solid #62ab38;">
        <div class="container text-white bg-dark nav_padding">
            <nav class="navbar navbar-expand-lg navbar-light text-white bg-dark  py-0 navbar-fixed-top">
                <a class="navbar-brand hideLG text-white" href="#">Main Navigation</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar icon-bar-1"></span>
                    <span class="icon-bar icon-bar-2"></span>
                    <span class="icon-bar icon-bar-3"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link @yield('home') text-white " href="{{ url('/') }}"> <i
                                class="fa fa-home display-1" aria-hidden="true"></i>Home </a>
                        <a class="nav-item nav-link @yield('vip') text-white   " href="{{ route('/vip_packages') }}">Pricing</a>
                        <a class="nav-item nav-link @yield('store') text-white "
                            href="{{ route('/tips_store') }}">Tips Store</a>
                        <a class="nav-item nav-link @yield('winning') text-white "
                            href="{{ route('/testimonials') }}">Recent Winnings</a>
                        <a class="nav-item nav-link @yield('contact') text-white " href="{{ route('/contact_us') }}">Contact</a>
                        <a class="nav-item nav-link @yield('about') text-white " href="{{ route('/about_us') }}">About</a>

                        @if (currentUser())

                            <a class="nav-item nav-link" href="{{ route('/app/index') }}">


                                <button type="button" class="btn btn-success btn-sm navbar-btn"
                                    style="margin-left: 10px; margin-right: 10px;"><i class="fa fa-user-circle-o"></i>My
                                    Account </button>


                            </a>


                            {{-- <a href="{{route('/logout')}}"  class="nav-item nav-link"
                            style="color: white;"><i class="fa fa-sign-out"></i> Logout</a> --}}
                        @else
                            <a class="nav-item nav-link" href="{{ route('/login') }}"><button type="button"
                                    class="btn btn-success btn-sm navbar-btn"
                                    style="margin-left: 10px; margin-right: 10px;"><i class="fa fa-sign-in"></i>
                                    LOGIN</button></a>
                            {{-- <a class="nav-item nav-link" href="{{route('/register')}}">
                                <button type="button" class="btn btn-danger btn-sm navbar-btn"
                                style="margin-left: 10px; margin-right: 10px;"><i class="fa fa-sign-in"></i>
                                 REGISTER</button></a> --}}

                        @endif
                    </div>
                </div>
            </nav>
        </div>


    </div>



    @yield('body')
                        <?php
                    $country = COUNTRYNAME;
                    $sidebar1 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'sidebar1')
                        ->inRandomOrder()
                        ->where('status', '0')
                        ->first();
                    $sidebar2 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'sidebar2')
                        ->inRandomOrder()
                        ->where('status', '0')
                        ->first();
                   
                    
                    ?>



                
                        @if (isset($sidebar1))
                            <div id="divFLRALeft "
        style="" class="divFLRALeft">
        <center><a
                href="{{ $sidebar1->website }}"
                target="_blank" >
    <img class="sidebarads thumbnail" src="{{ $path }}/ads/{{ $sidebar1->ads_image }}" style="max-width:100%"
               ></a></center>
    </div>
                        @endif
@if (isset($sidebar2))
 <div id="divFLRARight   "
        style=" " class="divFLRARight">
        <center><a
                href="{{ $sidebar2->website }}"
                target="_blank">
    <img class="sidebarads thumbnail" src="{{ $path }}/ads/{{ $sidebar2->ads_image }}" style="max-width:100%"
                ></a></center>
    </div>
    @endif
    
                     <?php
                    $country = COUNTRYNAME;
                    $bfads = \App\Focus\Modules\Ad\Model\Ad::where('location', 'float_bottom_ads')
                        ->inRandomOrder()
                        ->where('status', '0')
                        ->first();
                    $cbfads = \App\Focus\Modules\Ad\Model\Ad::where('location', 'code_float_bottom_ads')
                        ->inRandomOrder()
                        ->where('status', '0')
                        ->first();
                   
                    
                    ?>
                        @if (isset($cbfads))
                        
                         {!! $cbfads->website !!}
                        @endif
                        
                        
                    @if (isset($bfads))
                    
    <center>
    <div class="Desktop-Sticky" style="width:100%;height:90px;">
        <center><a href="#"  class="advads-close-button" target="_blank" style=";color:#090;">
                <span   title="close"
                    style="width: 15px; height: 15px; background: #fff; position: absolute; top: 0; line-height: 15px; text-align: center; cursor: pointer; z-index: 10001; right:0">×</span>
            </a><a
                href="{{ $bfads->website }}"
                target="_blank" >
<img class="  thumbnail" src="{{ $path }}/ads/{{ $bfads->ads_image }}" style="max-width:100%"
                ></a>
        </center>
    </div>
</center>
@endif


    <!-- Footer Area Start Here -->
    <a href="https://api.whatsapp.com/send?phone=256780430994&text=Hello." class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
        </a>
        <span class="float_text">Click to chat with Us</span>
    <footer>

        <div class="footer-area-top">
            <div class="container">
                <div class="row">

                    <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-box">
                            <h2 class="title-bold-light title-bar-left text-uppercase">Main Navigation</h2>
                            <ul class="popular-categories">
                                <li>
                                    <a href="{{url('/')}}">Home
                                        <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('/tips_store') }}">Tips Store
                                        <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('daily.vip.packages')}}">Daily Vip Packages
                                        <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('/contact_us')}}">Contact
                                        <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('/about_us')}}">About
                                        <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{route('how_to_pay')}}">How To Pay
                                        <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('/privacy')}}">Privacy Policy
                                        <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                    </a>
                                </li>


                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-box">
                            <h2 class="title-bold-light title-bar-left text-uppercase">USEFUL LINKS </h2>
                            <ul class="popular-categories">
                                <li>
                                    <a href="{{route('/vip_packages')}}">Pricing
                                        <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('/register') }}">Register
                                        <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('/login')}}">Login
                                        <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('/app/index')}}">My Account
                                        <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('/disclaimer')}}">Disclaimer
                                        <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('/terms')}}">Terms & Conditions
                                        <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                    </a>
                                </li>






                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12">
                        <div class="footer-box">
                            <h2 class="title-bold-light title-bar-left text-uppercase">CONTACT INFO </h2>
                            <ul class="popular-categories">
                                <li>
                                  <span class=" text-danger"> For Calls : </span> <span class="text-white"> <strong>+256780430994</strong></span>
                                  <a>
                                    <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                  </a>

                                </li>
                                <li>
                                    <span class=" text-success"> For Whatsapp : </span> <span class="text-white"> <strong>+256780430994</strong></span>
                                    <a>
                                        <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                      </a>
                                  </li>
                                <li>
                                    <span class=" text-warning"> For Enquiry  : </span> <span class="text-white"> <a href="mailto:surecleanodds@gmail.com" class="d-inline"  target="_blank"><strong>surecleanodds@gmail.com</strong></a></span>
                                    <a>
                                        <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                      </a>

                                </li>
                                <li>

                                        <span class=" text-warning"> For Advert : </span> <span class="text-white"> <a href="mailto:Advert@cleanodds.com" class="d-inline"  target="_blank"><strong>Advert@cleanodds.com</strong></a></span>
                                        <a>
                                            <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                          </a>
                                </li>



                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer-area-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">

                        <ul class="footer-social">
                            <li>
                                <a href="#" title="facebook">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" title="twitter">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </li>

                            <li>
                                <a href="#" title="linkedin">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                            </li>

                        </ul>
                        <p>© {{ date('Y') }} CleanOdds Limited A Boom Services (U) Limited Company. Designed by <a target="_blank"
                                href="https://www.vitekwebsolutions.com">vitek solutions</a>. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End Here -->
    <!-- Modal Start-->


    </div>
    <!-- Wrapper End -->
    <!-- jquery-->
    <script src="{{ asset('assets/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
    <!-- Plugins js -->
    <script src="{{ asset('assets/js/plugins.js') }}" type="text/javascript"></script>
    <!-- Popper js -->
    <script src="{{ asset('assets/js/popper.js') }}" type="text/javascript"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- WOW JS -->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <!-- Owl Cauosel JS -->
    <script src="{{ asset('assets/vendor/OwlCarousel/owl.carousel.min.js') }}" type="text/javascript"></script>
    <!-- Meanmenu Js -->
    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}" type="text/javascript"></script>
    <!-- Srollup js -->
    <script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}" type="text/javascript"></script>
    <!-- jquery.counterup js -->
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <!-- Isotope js -->
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}" type="text/javascript"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Ticker Js -->
    <script src="{{ asset('assets/js/ticker.js') }}" type="text/javascript"></script>
    <!-- Custom Js -->
    <script src="{{ asset('assets/js/main.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('sweetalert/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('region_selector/jquery.crs.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('select2/js/select2.min.js') }}"></script>


    <script src="{{ asset('node_modules/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    @yield('JS')
    
    <script>
            $('.advads-close-button').click(function(e){
    e.preventDefault();
    console.log('hide ads')
    $('.Desktop-Sticky').hide();
    
    });
    </script>

<script data-cfasync="false" type="text/javascript" id="clever-core">
                                    (function (document, window) {
                                        var a, c = document.createElement("script");

                                        c.id = "CleverCoreLoader58548";
                                        c.src = "//scripts.cleverwebserver.com/59fd033a2de3bc87962411368496d912.js";

                                        c.async = !0;
                                        c.type = "text/javascript";
                                        c.setAttribute("data-target", window.name);
                                        c.setAttribute("data-callback", "put-your-callback-macro-here");

                                        try {
                                            a = parent.document.getElementsByTagName("script")[0] || document.getElementsByTagName("script")[0];
                                        } catch (e) {
                                            a = !1;
                                        }

                                        a || (a = document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]);
                                        a.parentNode.insertBefore(c, a);
                                    })(document, window);
                                </script>                            

</body>


</html>
