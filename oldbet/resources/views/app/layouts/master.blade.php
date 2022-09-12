
<!doctype html>
<html lang="en" class="light-theme">

<head>
<meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta content="" name="description" />
    <meta content="christian umanah" name="author" />
    <!-- App favicon -->

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
  <!--plugins-->
  <link href="{{asset('snacked/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
  <link href="{{asset('snacked/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
  <link href="{{asset('snacked/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="{{asset('snacked/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('snacked/assets/css/bootstrap-extended.css')}}" rel="stylesheet" />
  <link href="{{asset('snacked/assets/css/style.css')}}" rel="stylesheet" />
  <link href="{{asset('snacked/assets/css/icons.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- loader-->
	<link href="{{asset('snacked/assets/css/pace.min.css')}}" rel="stylesheet" />

  <!--Theme Styles-->
  <link href="{{asset('snacked/assets/css/dark-theme.css')}}" rel="stylesheet" />
  <link href="{{asset('snacked/assets/css/light-theme.css')}}" rel="stylesheet" />
  <link href="{{asset('snacked/assets/css/semi-dark.css')}}" rel="stylesheet" />
  <link href="{{asset('snacked/assets/css/header-colors.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('sweetalert/sweetalert.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Doppio+One|Monda|Philosopher" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Concert+One|Mukta|Staatliches" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
  <link  rel="stylesheet" type="text/css" href="{{asset('file_upload/bootstrap-fileupload.min.css')}}">
<style>
    .card {
        position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #142912;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
    height: 100%;
}
body {
    font-size: 14px;
    color: #ffffff;
    letter-spacing: .5px;
    font-family: Roboto, sans-serif;
    background-color: #f7f8fa;
    overflow-x: hidden;
}
.pale {
    color: #509208;
}
@media(max-width:978px){
    .row{
        margin-right:0px;
        margin-left:0px;
    }
    .page-content{
        padding:0px;
    }
}
.btn-primary {
    color: #fff;
    background-color: #6e6f0b;
    border-color: #6e6f0b;
}
.list-group-item {
    position: relative;
    display: block;
    padding: .5rem 1rem;
    color: #212529;
    text-decoration: none;
    background-color: #142912;
    text-align: center;
    border: 1px solid rgba(0,0,0,.125);
}


.pace .pace-progress {
    background: #cdb257;
    position: fixed;
    z-index: 2000;
    top: 0;
    right: 100%;
    width: 100%;
    height: 3px;
}
.pace .pace-activity {
    display: block;
    position: fixed;
    z-index: 2000;
    top: 15px;
    right: 15px;
    width: 20px;
    height: 20px;
    border: solid 3px transparent;
    border-top-color: #cdb257;
    border-left-color: #cdb257;
    border-radius: 10px;
    -webkit-animation: pace-spinner .4s linear infinite;
    -moz-animation: pace-spinner .4s linear infinite;
    -ms-animation: pace-spinner .4s linear infinite;
    -o-animation: pace-spinner .4s linear infinite;
    animation: pace-spinner .4s linear infinite;
}
.btn-check:active+.btn-primary, .btn-check:checked+.btn-primary, .btn-primary.active, .btn-primary:active, .show>.btn-primary.dropdown-toggle {
    color: #fff;
    background-color: #92ca0a;
    border-color: #92ca0a;
}
.category_box {
  height: 100px;
  text-align: center;
  justify-content: center;
  align-items: center;
  background-color: #000;
  border: 3px solid #000;
  display: flex;
  color: #f5f5f5;
  font-weight: 400;
  font-size: 25px;
  font-family: source sans pro,cursive;
  margin-bottom: 15px;
}
.category_box>h4{
  color:white;
  font-weight: 400;
  font-size: 19px;
}
.simplebar-content-wrapper{

    background: #142912;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #6e6f0b;
}
.nav-pills .nav-link {
    border-radius: .25rem;
    color: #f8f9f9;
}
.nopaddingsmall {
                padding-left: 0px !important;
                padding-right: 0px !important;
            }

        }


        footer .footer-area-top {
    padding: 60px 0 10px;
    margin-top: 65px;
    border-top: 4px solid #2ca745;
    border-bottom: 1px solid #4d4d4d;
}


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

footer .footer-box {
    width: 100%;
    margin-bottom: 40px;
    display: inline-block;
}
h2.title-bold-light {
    font-weight: 700;
    color: #fff;
}


footer .footer-box ul.popular-categories li {
    margin-right: 20px;
    margin-bottom: 10px;
    position: relative;
}
footer .footer-box ul.popular-categories li:before {
    content: "";
    background-color: #051b0b;
    width: 0;
    height: 1px;
    left: 0;
    bottom: 0;
    position: absolute;
}
footer .footer-box ul.popular-categories li a {
    display: block;
    color: #fff;
    font-size: 14px;
    font-family: Poppins, sans-serif;
}
footer .footer-box ul.popular-categories li a span {
    position: absolute;
    top: 0;
    right: 0;
    z-index: 2;
    font-size: 14px;
    color: #2ca745;
}
footer .footer-box ul.popular-categories li a span {
    position: absolute;
    top: 0;
    right: 0;
    z-index: 2;
    font-size: 14px;
}

footer .footer-box ul.popular-categories li a {
    display: block;
    color: #fff;
    font-size: 14px;
    font-family: Poppins, sans-serif;
}
footer .footer-area-bottom {
    padding: 13px 0 9px;
}
ul.footer-social {
    margin-bottom: 30px;
}
footer .footer-area-bottom p {
    color: #b9b9b9;
}
footer {
    background-color: #051b0b;
}
.popular-categories {
    list-style: none none;
    margin: 0;
    padding: 0;
}
.title-bar-left {
    position: relative;
    margin-bottom: 27px;
}
ul.footer-social li {
    display: inline-block;
    margin-right: 5px;
    margin-bottom: 8px;
}
ul.footer-social li a {
    width: 45px;
    height: 40px;
    line-height: 40px;
    background-color: #404040;
    text-align: center;
    color: #fff;
    display: block;
    -webkit-transition: all 0.5s ease-out;
    -moz-transition: all 0.5s ease-out;
    -ms-transition: all 0.5s ease-out;
    -o-transition: all 0.5s ease-out;
    transition: all 0.5s ease-out;
}
a {
    color: #f79418;

}
.row {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(var(--bs-gutter-y) * -1);
    margin-right: 0px;
    margin-left: 0px;
}

</style>
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
      <header class="top-header">
        <nav class="navbar navbar-expand gap-3">
          <div class="mobile-toggle-icon fs-3">
              <i class="bi bi-list"></i>
            </div>
            <form class="searchbar">
              </form>
            <div class="top-navbar-right ms-auto">
              <ul class="navbar-nav align-items-center">
                <li class="nav-item search-toggle-icon">

              </li>
              <li class="nav-item dropdown dropdown-user-setting">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                <div class="user-setting d-flex align-items-center">
                  <img src="@if(currentUser()->passport) {{$localPath}}/users/{{currentUser()->passport}} @else {{$localPath}}/avatar.png @endif" class="user-img" alt="">
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                   <a class="dropdown-item" href="#">
                     <div class="d-flex align-items-center">
                        <img src="@if(currentUser()->passport) {{$localPath}}/users/{{currentUser()->passport}} @else {{$localPath}}/avatar.png @endif" alt="" class="rounded-circle" width="54" height="54">
                        <div class="ms-3">
                          <h6 class="mb-0 dropdown-user-name">{{currentUser()->full_name}}</h6>
                          {{-- <small class="mb-0 dropdown-user-designation text-secondary">HR Manager</small> --}}
                        </div>
                     </div>
                   </a>
                 </li>
                 <li><hr class="dropdown-divider"></li>
                 <li>
                    <a class="dropdown-item" href="{{route('/app/index')}}">
                       <div class="d-flex align-items-center">
                         <div class=""><i class="bi bi-person-fill"></i></div>
                         <div class="ms-3"><span>Profile</span></div>
                       </div>
                     </a>
                  </li>


                  <li>
                    <a class="dropdown-item" href="{{route('/app/update_profile')}}">
                       <div class="d-flex align-items-center">
                         <div class=""><i class="bi bi-gear-fill"></i></div>
                         <div class="ms-3"><span>Edit Profile</span></div>
                       </div>
                     </a>
                  </li>

                  <li>
                    <a class="dropdown-item" href="{{route('/logout')}}">
                       <div class="d-flex align-items-center">
                         <div class=""><i class="bi bi-lock-fill"></i></div>
                         <div class="ms-3"><span>Logout</span></div>
                       </div>
                     </a>
                  </li>
              </ul>
            </li>
              <li class="nav-item dropdown dropdown-large">

              </li>
              <li class="nav-item dropdown dropdown-large">

              </li>
              <li class="nav-item dropdown dropdown-large">

              </li>
              </ul>
              </div>
        </nav>
      </header>
       <!--end top header-->

        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
          <div class="sidebar-header">
            <a href="{{ url('/')}}" class="row" >
                <div class=" col-sm-12">
               <img src="{{ asset('assets/img/logo.png') }}" alt="logo" style="    padding: 24px;" class="img-fluid">
            </div>
            <div class=" col">

            </div></a>

            <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
            </div>
          </div>
          <!--navigation-->
          <ul class="metismenu" id="menu">
            <li>
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Dashboard</div>
              </a>
              <ul>
                <li>
                    <a  href="{{route('/app/index')}}">
                   <i class="bi bi-person-fill"></i>Profile
                     </a>
                  </li>


                  <li>
                    <a  href="{{route('/app/update_profile')}}">
                      <i class="bi bi-gear-fill"></i> Edit Profile
                     </a>
                  </li>

                  <li>
                    <a href="{{route('/logout')}}">
                      <i class="bi bi-lock-fill"></i>Logout
                     </a>
                  </li>
              </ul>
            </li>


            <li class="mm-active">
                <a href="javascript:;" class="has-arrow">
                  <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                  </div>
                  <div class="menu-title">Vip Tips</div>
                </a>
                <ul class="mm-collapse mm-show">

                    @if (activeUser())

                    @if(    currentUser()->sub->id=='1' || currentUser()->sub->id=='2'|| currentUser()->sub->id=='12')
                  <li >
                      <a  href=" {{  route('/sureTwoOdds') }}"><i class="fa fa-arrow-circle-right"></i>
                        Sure 2 Odds

                      </a>
                  </li>

                  <li >
                    <a  href=" {{  route('/weekend_tips') }}"><i class="fa fa-arrow-circle-right"></i>
                    Weekend Tips

                    </a>
                </li>
                @elseif( currentUser()->sub->id=='3' || currentUser()->sub->id=='4'|| currentUser()->sub->id=='13')

                <li >
                    <a    href="{{ route('/sureThreeOdds')   }}"><i class="fa fa-arrow-circle-right"></i>
                      Sure 5 Odds

                    </a>
                </li>

                <li >
                  <a  href=" {{  route('/weekend_tips') }}"><i class="fa fa-arrow-circle-right"></i>
                  Weekend Tips

                  </a>
              </li>
              @elseif(currentUser()->sub->id=='5' || currentUser()->sub->id=='6'|| currentUser()->sub->id=='14')

              <li >
                <a      href="{{
                    route('/sureFiveOdds')}}"><i class="fa fa-arrow-circle-right"></i>
                  Sure 10 Odds

                </a>
            </li>

            <li >
              <a  href=" {{  route('/weekend_tips') }}"><i class="fa fa-arrow-circle-right"></i>
              Weekend Tips

              </a>
          </li>
          @elseif(currentUser()->sub->id=='9' || currentUser()->sub->id=='10'|| currentUser()->sub->id=='11')

          <li >
            <a     href="{{
                route('/super_investment_tip') }}"><i class="fa fa-arrow-circle-right"></i>
      Investemnt

            </a>
        </li>

                 @endif


                  @else
                  <li >
                    <a     href="{{
                        route('/vip_packages') }}"><i class="fa fa-arrow-circle-right"></i>
              Join Our Vip

                    </a>
                </li>

                  @endif



                </ul>
              </li>


            {{-- <li class="mm-active">
              <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                </div>
                <div class="menu-title">Free Tips</div>
              </a>
              <ul class="mm-collapse mm-show">
                <li >
                    <a href="{{route('/1_5_goals')}}">
                        <i class="fa fa-arrow-circle-right"></i>
                            1.5 Goals
                    </a>
                </li>

                <li >
                    <a href="{{route('/2_5_goals')}}">  <i class="fa fa-arrow-circle-right"></i>
                      2.5 Goals
                    </a>
                </li>

                <li >
                    <a href="{{route('/double_chance')}}">
                        <i class="fa fa-arrow-circle-right"></i>
                            Double Chance
                    </a>
                </li>

                <li >
                    <a href="{{route('/win_either_half')}}">
                        <i class="fa fa-arrow-circle-right"></i>
                            Win Either Half
                    </a>
                </li>

                <li >
                    <a href="{{route('/gg_btts')}}"> <i class="fa fa-arrow-circle-right"></i>
                      GG/BTTS
                    </a>
                </li>

                <li >
                    <a href="{{route('/single_bets')}}"> <i class="fa fa-arrow-circle-right"></i>
                        Single Bets
                    </a>
                </li>

                <li>
                    <a href="{{route('/draw_no_bet')}}">
                        <i class="fa fa-arrow-circle-right"></i>    Draw No Bet
                    </a>
                </li>


                <li >
                    <a href="{{route('/half_time_results')}}"><i class="fa fa-arrow-circle-right"></i>
                    Under 3.5 Goals

                    </a>
                </li>



              </ul>
            </li> --}}


            <li>
              <a href="{{ route('/contact_us') }}" target="_blank">
                <div class="parent-icon"><i class="bi bi-telephone-fill"></i>
                </div>
                <div class="menu-title">Support</div>
              </a>
            </li>
          </ul>
          <!--end navigation-->
       </aside>
       <!--end sidebar -->
   {{--<div class="row">--}}
    <main class="page-content">
    @yield('body')

    <div class="row">
        <div class="col-12 col-lg-12 mt-2 nopaddingsmall">
   <!-- Footer Area Start Here -->
   <style>
       footer {
    background-color: #051b0b;
    padding: 25px 12px 0px 12px;
}
.title-bar-left {
    position: relative;
    margin-bottom: 27px;
    font-size: 17px;
    font-weight: 900;
}
   </style>
   <footer>
    <div class="footer-area-top mt-9">
        <div class="container nopaddingsmall">
            <div class="row">

                <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-box">
                        <h4 class="title-bold-light title-bar-left text-uppercase">Main Navigation</h4>
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
                                <a href="{{route('/terms')}}">Terms & Conditions
                                    <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                </a>
                            </li>


                        </ul>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-box">
                        <h4 class="title-bold-light title-bar-left text-uppercase">USEFUL LINKS </h4>
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
                                <a href="{{route('/privacy')}}">Privacy Policy
                                    <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                </a>
                            </li>

                            <li>
                                <a href="{{route('/disclaimer')}}">Disclaimer
                                    <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                </a>
                            </li>


                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-box">
                        <h4 class="title-bold-light title-bar-left text-uppercase">CONTACT INFO </h4>
                        <ul class="popular-categories">
                            <li>
                              <span class=" text-danger"> For Calls : </span> <span class="text-white"> <strong>+256784632861</strong></span>
                              <a>
                                <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                              </a>

                            </li>
                            <li>
                                <span class=" text-success"> For Whatsapp : </span> <span class="text-white"> <strong>+256784632861</strong></span>
                                <a>
                                    <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                  </a>
                              </li>
                            <li>
                                <span class=" text-warning"> For Enquiry : </span> <span class="text-white"> <a href="mailto:info@cleanodds.com" class="d-inline"  target="_blank"><strong>info@cleanodds.com</strong></a></span>
                                <a>
                                    <span><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                                  </a>

                            </li>
                            <li>

                                    <span class=" text-warning"> For Advert : </span> <span class="text-white"> <a href="mailto:advert@cleanodds.com" class="d-inline"  target="_blank"><strong>advert@cleanodds.com</strong></a></span>
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
                    <p>© {{ date('Y') }} Cleanodds Designed by <a target="_blank"
                            href="https://www.vitekwebsolutions.com">vitek solutions</a>. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<!-- Footer Area End Here -->
    </main>


        <!-- Modal Start-->
       <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
       <!--end overlay-->


  </div>
  <!--end wrapper-->


  <!-- Bootstrap bundle JS -->
  <script src="{{asset('snacked/assets/js/bootstrap.bundle.min.js')}}"></script>
  <!--plugins-->
  <script src="{{asset('snacked/assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('snacked/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
  <script src="{{asset('snacked/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
  <script src="{{asset('snacked/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
  <script src="{{asset('snacked/assets/js/pace.min.js')}}"></script>
  <script src="{{asset('snacked/assets/plugins/chartjs/js/Chart.min.js')}}"></script>
  <script src="{{asset('snacked/assets/plugins/chartjs/js/Chart.extension.js')}}"></script>
  <script src="{{asset('snacked/assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
  <!--app-->
  <script src="{{asset('snacked/assets/js/app.js')}}"></script>
  <script src="{{asset('snacked/assets/js/index.js')}}"></script>
  <script>
    new PerfectScrollbar(".best-product")
 </script>
 <script type="text/javascript"  src="{{asset('sweetalert/sweetalert.min.js')}}"></script>


 <script src="{{asset('file_upload/bootstrap-fileupload.js')}}"></script>
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
