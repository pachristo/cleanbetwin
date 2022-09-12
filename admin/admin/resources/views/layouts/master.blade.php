<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="'Deji Busari">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="SHORTCUT ICON" href="{{asset('images/logo.png')}}">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Changa" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    
    {{--DATA TABLES--}}
    <link href="{{asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/select2/dist/css/select2.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-fileupload.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/anytime.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('summernote/summernote.css')}}" rel="stylesheet">
    <link href="{{asset('sweetalert/sweetalert.css')}}" rel="stylesheet">
    {{-- <link href="{{asset('css/file-upload-with-preview.min.css')}}" rel="stylesheet"> --}}
</head>

<body class="nav-md" style="font-family: 'Changa', sans-serif;">
<?php
if(Auth::check()){
    $admin = Auth::user();
}
?>
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0; margin-bottom: 20px; height: 100px;">
                    <br>
                    <a href="{{url('/home')}}" class="site_title" style="height: 60px; margin-top: -10px!important;"><center><img src="{{asset('images/logo.png')}}" class="img-responsive" style="max-height: 50px; margin-top: 10px; background: whitesmoke; padding: 5px 2px; border-radius: 5px;"></center></a>
                </div>
                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="
                            @if($admin->dp!=NULL)
                                {{asset('images')}}/{{$admin->dp}}
                            @else
                                {{asset('images/user.png')}}
                            @endif
                                " alt="" class="img-circle profile_img" style="height: 60px;" />
                    </div>
                    <div class="profile_info" style="margin-bottom: 30px;">
                        <span>Welcome,</span>
                        <h2>

                            {{$admin->name}}</h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                            @if($admin->category=='Super' || $admin->category=='Predictor')
                            <li><a><i class="fa fa-random"></i> PREDICTIONS <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a class="text-danger" style="color: chartreuse!important;;">VIP TIPS<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('/newVIPPrediction')}}">Add VIP Prediction </a></li>
                                            <li><a href="{{route('/VIPpredictions')}}">Manage VIP Tips </a></li>
                                           
                                        </ul>
                                    </li>
                                    {{-- <li><a class="text-success" style="color: chartreuse!important;;">BOOKING CODES<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('/newBookingCode')}}">Add Code </a></li>
                                            <li><a href="{{route('/bookingCodes')}}">Manage Codes </a></li>
                                            <li><a href="{{route('/VIPpredictions', 'customTips')}}">Manage Gold Tips </a></li>
                                        </ul>
                                    </li> --}}
                                    <li><a class="text-danger">FREE TIPS<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('/newPrediction')}}">Add Prediction </a></li>
                                            <li><a href="{{route('/predictions')}}">Manage Tips </a></li>
                                        </ul>
                                    </li>
                                    {{--<li><a style="color: red!important;;" data-target="#archiver" data-toggle="modal">MASS GAME ARCHIVE*R </a>--}}
                                    {{--</li>--}}
                                    {{--<li><a href="{{route('/archive')}}">Manage Archive</a>--}}
                                    {{--</li>--}}
                                    <li><a href="{{route('/testimonials')}}">Testimonials </a></li>
                                </ul>
                            </li>
                            @endif
                            @if($admin->category=='Super' || $admin->category=='Blogger'  || $admin->category=='General')
                                {{-- <li><a href="#" data-url="{{route('/getGallery')}}" data-target="#galleryModal" data-toggle="modal" id="galleryHandle"><i class="fa fa-file-image-o"></i> PICTURE GALLERY</a></li>
                                <li><a><i class="fa fa-share-alt"></i> BLOG & PREVIEWS <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{url('/nblog')}}">Create New Post</a>
                                        </li>
                                        <li><a href="{{url('/blogs')}}">Manage Posts</a>
                                        </li>
                                    </ul>
                                </li> --}}
                            @endif
                            @if($admin->category=='Super' || $admin->category=='General')
                                <li><a><i class="fa fa-users"></i> MEMBERSHIP <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                                                           <li><a href="{{route('/newMember')}}">Add New Member</a></li>
                                        <li><a href="{{url('/allmembers')}}">View/Manage </a></li>
                                        <li><a class="text-danger" style="color: chartreuse!important;;">SUBSCRIBED MEMBERS<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="{{route('/subscribed')}}" style="color: chartreuse!important;;">Currently Active</a>
                                                </li>
                                                <li><a href="{{route('/expired')}}" style="color: red!important;;">Expired Users</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="{{url('/dmembers')}}">Disabled Members </a>
                                        </li>
                                        <li><a href="{{url('/fmembers')}}">Flagged Members </a>
                                        </li>
                                    </ul>
                                </li>
                            <li><a><i class="fa fa-ticket"></i> ADS <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    {{-- <li><a href="{{route('/sponsored_ads')}}">Sponsored Ads Links</a></li> --}}
                                    <li><a href="{{url('/newads')}}">Image Ads Placement</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="{{ route('user.testimonials') }}"><i class="fa fa-flag-checkered "></i> USER TESTIMONIALS </a>
                              
                            </li>
                           
                            <li><a><i class="fa fa-soccer-ball-o"></i> LEAGUES <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{url('/loadleague')}}">Load Leagues</a>
                                    </li>
                                    <li><a href="{{url('/manageleague')}}">Manage Leagues</a>
                                    </li>
                                </ul>
                            </li>

                                <li><a><i class="fa fa-envelope"></i> EMAIL MANAGER <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{url('/bulkmail')}}">To All Member</a></li>
                                        <li><a class="text-danger" style="color: chartreuse!important;;">TO SUBSCRIBED MEMBERS<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="{{route('/bulkActive')}}" style="color: chartreuse!important;;">Currently Active</a>
                                                </li>
                                                <li><a href="{{route('/bulkExpired')}}" style="color: red!important;;">Expired Users</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="{{route('/individualMail')}}">To Individual(s)</a></li>
                                    </ul>
                                </li>
                                
                               
                                <li><a href="{{route('/announcement')}}"><i class="fa fa-bullhorn"></i>  ANNOUNCEMENT</a></li>
                                <li><a href="{{route('promotion.view')}}"><i class="fa fa-audio-description "></i>  PROMOTION</a></li>
                               
                                {{-- <li><a href="{{route('/partners')}}"><i class="fa fa-group"></i> PARTNERS</a></li> --}}

                            @endif
       


                             @if($admin->category=='Super' )
                              {{-- <li><a><i class="fa fa-envelope"></i> SMS BROADCAST <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a class="text-danger" >Phone Numbers<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('/ActiveNumbers')}}">Active Numbers </a></li>
                                            <li><a href="{{route('/InactiveNumbers')}}">Inactive Numbers</a></li>
                                           
                                        </ul>
                                    </li>
                                    <li><a class="text-success" >Send SMS<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('/ActiveSms')}}">Active Users </a></li>
                                            <li><a href="{{route('/InactiveSms')}}">Expired/Inactive Users </a></li>
                                            <li><a href="{{route('/GeneralSms')}}">All Users </a></li>
                                          
                                        </ul>
                                    </li>
                                       <li><a class="text-success" >SMS Settings <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{url('/ActivateSms')}}">Activate Plans</a></li>
                                            <li><a href="{{route('/LoadSmsPlans')}}">Set Plans</a></li>
                                         </ul>
                                     </li>
                                     <li ><a href="{{url('/allSmsmembers')}}">Members </a></li>
                                </ul>
                               
                            </li> --}}
                            <li Style="background:#0d271c;"><a href="{{ route('/plans_manager') }}"><i class="fa fa fa-credit-card-alt"></i> PLAN MANAGER <span class="fa fa-"></span></a>
                                
                               
                            </li>
                         

                            @endif


                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">

                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                @if($admin->dp!=NULL)<img src="{{asset('images')}}/{{$admin->dp}}" alt="" />@else<img src="{{asset('images/user.png')}}" alt="" />@endif{{$admin->username}}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="#" data-target="#admin" data-toggle="modal">  Profile</a>
                                </li>
                                <li>
                                    @if($admin->category=='Super')
                                    <a href="#" data-target="#newadmin" data-toggle="modal">
                                        <span>Create New Admin</span>
                                    </a>

                                    <a href="{{url('/admins')}}">
                                        <span>Manage Admin</span>
                                    </a>
                                </li>
                                @endif
                                <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="dashboard_graph" style="height: 100%;">

                        <div class="row x_title">
                            <div class="col-md-12">
                                <h3>Dashboard Controls: <span class="green">@yield('page')</span></h3>
                            </div>

                        </div>

                        @yield('content')

                        @include('modals.modal')

                        <div class="clearfix"></div>
                    </div>

                </div>

            </div>

        </div>
        <!-- /page content -->
        @if($admin->category=='Super' || $admin->category=='General')
        {{--<section class="drawer">--}}
            {{--<!-- <div> -->--}}
            {{--<header class="clickme">Sliders Manager</header>--}}
            {{--<!-- </div> -->--}}
            {{--<div class="drawer-content">--}}
                {{--<div class="drawer-items">--}}
                    {{--<ul>--}}
                        {{--<li>--}}
                            {{--<a href="{{route('/feedbackLoader')}}">--}}
                                {{--<div class="title">Feedback Review</div>--}}
                                {{--<div class="time">Approve/Publish</div>--}}
                                {{--<div class="location">Disapprove/Trash</div>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<a href="{{route('/sliderManager')}}">--}}
                                {{--<div class="title">Image Slider</div>--}}
                                {{--<div class="time">Frontend Image</div>--}}
                                {{--<div class="location">Slider Manager</div>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}
        @endif

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                &copy; CLEANODDS {{date('Y')}} | All rights reserved
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>

{{--Datatables --}}
<script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{asset('region_selector/jquery.crs.min.js')}}"></script>
<script src="{{asset('vendors/select2/dist/js/select2.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('summernote/summernote.js')}}"></script>
<script src="{{asset('js/bootstrap-fileupload.js')}}"></script>
<!--<script src="{{asset('js/anytime.js')}}"></script>-->
<script src="{{asset('sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('js/jquery.table2excel.min.js')}}"></script>
<script src="{{asset('js/jquery.slidedrawer.min.js')}}"></script>
<script src="{{asset('js/native.js')}}?version={{ rand(0,999999) }}"></script>
<script src="{{asset('js/anytime.js')}}"></script>

<script>
    
</script>
<script>
    AnyTime.picker( "matchdate",
            { format: "%d-%m-%Y", firstDOW: 1 } );

    $("#matchtime").AnyTime_picker(
            { format: "%H:%i", firstDOW: 1 } );
</script>
<script>
    $(function(){
        $('.select2').select2();

        $('.drawer').slideDrawer({
            showDrawer: false,
            // slideTimeout: true,
            slideSpeed: 600,
            slideTimeoutCount: 3000
        });
    });
</script>
@yield('levelJS')
</body>
</html>