<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Free Football Prediction Site Worldwide | Cleanodds.com</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <base href="https://www.cleanodds.com/" target="_top">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <meta name="author" content="Cleanodds">
        <meta name="keywords" content="sure prediction, cleanodds prediction, football prediction site, soccer prediction site, site that predict football matches correctly, soccer prediction, best football prediction site free, free football prediction site" />
        <meta name="description"content="Free Football Predictions✅ and tips worldwide, Cleanodds is the best source of well-researched football statistics, analysis, and predictions.."/>
        <meta property="article:publisher" content="https://www.facebook.com/cleanoddss/" />

<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link rel="icon" href="{{asset('images/favicon.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="images/favicon.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/favicon.png">
    <meta property="og:url" content="https://www.cleanodds.com/" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Cleanodds | Free Football Prediction Website Worldwide" />
    <meta property="og:description" content="Cleanodds is the best source of well-researched football statistics, analysis, and predictions.." />
    <meta property="og:image" content="https://www.cleanodds.com/cleanodds/images/r2-share.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="140" />
    <meta property="og:image:height" content="140" />

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link  rel="stylesheet" type="text/css" href="{{asset('sweetalert/sweetalert.css')}}">
    <link rel="stylesheet" href="{{asset('select2/css/select2.min.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Chivo&family=Saira&display=swap" rel="stylesheet">


    <link rel="preload" as="script" href="https://live.demand.supply/up.js"><script async data-cfasync="false" type="text/javascript" src="https://live.demand.supply/up.js"></script>


    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-79267618-8"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-79267618-8');
</script>

<script>
(function(w,d,o,g,r,a,m){
d.write('<div id="'+(cid=(Math.random()*1e17).toString(36))+'"></div>');
w[r]=w[r]||function(){(w[r+'l']=w[r+'l']||[]).push(arguments)};
function e(b,w,r){if(w[r+'h']=b.pop()){
a=d.createElement(o),p=d.getElementsByTagName(o)[0];a.async=1;
a.src='//cdn.'+w[r+'h']+'/libs/b.js';a.onerror=function(){e(g,w,r)};p.parentNode.insertBefore(a,p)
}}if(!w.ABN){e(g,w,r)};w[r](cid,{id:1444107756})
})(window,document,'script',['ftd.agency'],'ABNS');
</script>
    @yield('levelCSS')
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="border-bottom: 4px solid black">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header pull-right">
            @if(currentUser())
                <div class="btn-group dropdown" style="margin-left: 10px; margin-right: 10px; margin-top: 11px;">
                    <button type="button" class="btn btn-sm btn-danger"><i class="fa fa-user"></i></button>
                    <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right" style="z-index: 999999;">
                        <li><a href="{{route('/app/index')}}"><i class="fa fa-user"></i> My Account</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route('/logout')}}"><i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                </div>
            @else
                <a href="{{route('/login')}}"><button type="button" class="btn btn-success btn-sm navbar-btn" style="margin-left: 10px; margin-right: 10px;"><i class="fa fa-sign-in"></i> LOGIN</button></a>
                {{--<a href="{{route('/')}}"><button type="button" class="btn btn-warning btn-sm navbar-btn" style="margin-left: 10px; margin-right: 10px;"><i class="fa fa-user"></i> REGISTER</button></a>--}}
            @endif
        </div>

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand navbar-brand-centered"><a href="{{route('/')}}"><img src="{{asset('images/logo.png')}}" class="img-responsive" style="margin-top: -11px; max-height: 40px; margin-left: -5px;" alt=""></a></div>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-brand-centered">
            <ul class="nav navbar-nav">
                <li class="@yield('home')"><a href="{{route('/')}}">Home</a></li>
                <li class="@yield('store')"><a href="{{route('/tips_store')}}">Tips Store</a></li>
                <li class="@yield('vip')"><a href="{{route('/vip_packages')}}">VIP Plans</a></li>
                <li class="@yield('winning')"><a href="{{route('/testimonials')}}">Testimonials</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="@yield('about')"><a href="{{route('/about_us')}}">About Us</a></li>
                <li class="@yield('blog')"><a href="{{route('/blog')}}">Blog</a></li>
                <li class="@yield('contact')" style="margin-right: 20px;"><a href="{{route('/contact_us')}}">Contact Us</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<style>
    @media (max-width: 978px) {
        .nopaddingsmall {
            padding: 0px!important;
        }
        .myTableSmall{
            font-size: 13px!important;
        }
        .newEmbed{
            height: 380px!important;
        }
        .hideSM{display: none;}
        .hideLG{display: block!important;}
    }
    .hideLG{display: none}
</style>

@yield('body')

<!-- footer -->
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
<!-- /.footer -->
<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script type="text/javascript"  src="{{asset('sweetalert/sweetalert.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('region_selector/jquery.crs.min.js')}}"></script>
<script type="text/javascript" src="{{asset('select2/js/select2.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2({
            placeholder: 'Select country'
        });
    });
</script>
@yield('levelJS')
</body>
</html>
