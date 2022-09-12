@extends('layout.master')
@section('title', 'Home of Prediction')
@section('home', 'active')
@section('levelCSS') @endsection

@section('body')
    <?php $u_token = $_COOKIE['focuspredict'] ?: ''; ?>
    <section style="background-image: url('{{asset('images/back-r2.jpg')}}'); background-position: center; background-attachment: fixed; background-size: cover; padding: 80px 10px; color: white; padding: 0px;">
        <div style="background: rgba(0,0,0,.8); padding: 60px 5px;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="col-sm-8 nopaddingsmall">
                            <br><br>
                            <h1>Accurate Football Predictions!</h1>
                            <p style="font-size: large">Cleanodds.com is a free football prediction tips website and the best of it kind.. We are the best site when you are searching for the free football betting tips and prediction sites.</p>
                            <br>
                            <a href="{{route('/vip_packages')}}"><button class="btn btn-md btn-danger" style="background: #D9534F;">VIP Packages</button></a>
                            @if(!currentUser())
                                <a href="{{route('/register')}}"><button class="btn btn-md btn-warning">Create Account</button></a>
                            @else
                                <a href="{{route('/app/index')}}"><button class="btn btn-md btn-success">My Account</button></a>
                            @endif
                            <br><br>
                        </div>
                        <div class="col-sm-4 col-10"><br>
                            <?php
                            $ad1 = App\Focus\Modules\Ad\Model\Ad::where('location', 'ad1')->where('status', '0')->first();
                            ?>
                            @if(isset($ad1))
                                {{--<center><a href="{{$ad1->website}}" target="_blank"><img src="{{$path}}/ads/{{$ad1->ads_image}}" alt="" class="img-responsive"></a></center>--}}
                               <center><script type="text/javascript" src="//ad.responservbzh.icu/deliver/js/b48d629153f1dd0" async></script></center>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="padding: 15px 10px">
                    <?php
                    $ad2 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'ad2a')->where('status', '0')->first();
                    ?>
                    <div class="hideSM">
                        <center>
                            @if(isset($ad2))
                                <a href="{{$ad2->website}}" class="hideSM" target="_blank"><img src="{{$path}}/ads/{{$ad2->ads_image}}" alt="" class="img-responsive"></a>
                            @endif
                        </center>
                    </div>

                    <center>
                        <?php
                        $ad3 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'ad2b')->where('status', '0')->first();
                        ?>
                        <div class="hideLG">
                            @if(isset($ad3))
                                <a href="{{$ad3->website}}"target="_blank"><img src="{{$path}}/ads/{{$ad3->ads_image}}" alt="" class="img-responsive"></a>
                            @endif
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container" style="margin-top: 20px;">
            <div class="row">
                <div class="col-sm-7 nopaddingsmall" style="margin-bottom: 25px;">
                    <div class="title">
                        <h4><strong><span style="color: #d18902;">FREE MAESTRO PICKS</span></strong></h4>
                    </div>

                    <div class="rolandthemes-circle-tabs">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Yesterday</a></li>
                            <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Today</a></li>
                            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Tomorrow</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane" id="home">
                                @if(count($freeYesterday)>0)
                                    <table class="table table-striped text-center" style="font-size: 13px;">
                                        <thead>
                                        <tr style="color: orange; background: black">
                                            <!--<th><center>Time</center></th>-->
                                            <th><center>League</center></th>
                                            <th><center>Fixture</center></th>
                                            <th><center>Tip</center></th>
                                            <th><center>Result</center></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($freeYesterday as $key => $item)
                                            <tr>

                                                <td>{{$item->league}}</td>
                                                <td>{{$item->teamOne}} <span><strong>VS</strong></span> {{$item->teamTwo}}</td>
                                                <td>{{$item->FTRecommendation}}</td>
                                                <td><strong>{{$item->teamOneScore}}:{{$item->teamTwoScore}}</strong></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p><center>There was no tip here!</center></p>
                                @endif
                            </div>
                            <div role="tabpanel" class="tab-pane active" id="profile">

                                @if(count($freeToday)>0)
                                    <table class="table table-striped text-center" style="font-size: 13px;">
                                        <thead>
                                        <tr style="color: orange; background: black">
                                            <!--<th><center>Time</center></th>-->
                                            <th><center>League</center></th>
                                            <th><center>Fixture</center></th>
                                            <th><center>Tip</center></th>
                                            <th colspan="2"><center>Rate</center></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($freeToday as $key => $item)
                                            <tr>

                                                <td>{{$item->league}}</td>
                                                <td>{{$item->teamOne}} <span>VS</span> {{$item->teamTwo}}</td>
                                                <td>{{$item->FTRecommendation}}</td>

                                                <td class="text-success" style="padding-right: 0px;"><button @if($item->likes!='') @if(in_array($u_token, json_decode($item->likes))) disabled @endif @endif @if($item->dislikes!='') @if(in_array($u_token, json_decode($item->dislikes))) disabled @endif @endif class="btn-success btn-xs likeBtn" data-id="{{$item->id}}" id="like{{$item->id}}"><i class="fa fa-thumbs-up"></i> <small><sup id="likeCount{{$item->id}}">@if($item->likes!='') {{count(json_decode($item->likes))}} @else 0 @endif</sup></small></button></td>

                                                <td class="text-danger" style="padding-left: 0px;"><button @if($item->likes!='') @if(in_array($u_token, json_decode($item->likes))) disabled @endif @endif @if($item->dislikes!='') @if(in_array($u_token, json_decode($item->dislikes))) disabled @endif @endif class="btn-danger btn-xs unlikeBtn" data-id="{{$item->id}}" id="unlike{{$item->id}}"><i class="fa fa-thumbs-down"></i> <small><sup id="dislikeCount{{$item->id}}">@if($item->dislikes!='') {{count(json_decode($item->dislikes))}} @else 0 @endif</sup></small></button></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p><center>Today's Tips are not available yet!</center></p>
                                @endif

                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages">
                                @if(count($freeTomorrow)>0)
                                    <table class="table table-striped text-center" style="font-size: 13px;">
                                        <thead>
                                        <tr style="color: orange; background: black">
                                            <!--<th><center>Time</center></th>-->
                                            <th><center>League</center></th>
                                            <th><center>Fixture</center></th>
                                            <th><center>Tip</center></th>
                                            <th colspan="2"><center>Rate</center></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($freeTomorrow as $key => $item)
                                            <tr>

                                                <td>{{$item->league}}</td>
                                                <td>{{$item->teamOne}} <span>VS</span> {{$item->teamTwo}}</td>
                                                <td>{{$item->FTRecommendation}}</td>

                                                <td class="text-success" style="padding-right: 0px;"><button @if($item->likes!='') @if(in_array($u_token, json_decode($item->likes))) disabled @endif @endif @if($item->dislikes!='') @if(in_array($u_token, json_decode($item->dislikes))) disabled @endif @endif class="btn-success btn-xs likeBtn" data-id="{{$item->id}}" id="like{{$item->id}}"><i class="fa fa-thumbs-up"></i> <small><sup id="likeCount{{$item->id}}">@if($item->likes!='') {{count(json_decode($item->likes))}} @else 0 @endif</sup></small></button></td>

                                                <td class="text-danger" style="padding-left: 0px;"><button @if($item->likes!='') @if(in_array($u_token, json_decode($item->likes))) disabled @endif @endif @if($item->dislikes!='') @if(in_array($u_token, json_decode($item->dislikes))) disabled @endif @endif class="btn-danger btn-xs unlikeBtn" data-id="{{$item->id}}" id="unlike{{$item->id}}"><i class="fa fa-thumbs-down"></i> <small><sup id="dislikeCount{{$item->id}}">@if($item->dislikes!='') {{count(json_decode($item->dislikes))}} @else 0 @endif</sup></small></button></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p><center>Tomorrow's Tips are not available yet!</center></p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <center>
                            <br>
                            <a href="{{route('/banker_of_d_day')}}"><button class="btn btn-md btn-danger" style="background: #D9534F">Today Banker</button></a>
                            <a href="{{route('/vip_packages')}}"><button class="btn btn-md btn-success">Upgrade to VIP</button></a>
                        </center>
                        <br>
                    </div>

                    <div class="col-sm-12 text-center" style="background: whitesmoke"><br>
                        <h4 style="font-weight: bold"><strong>Join Our Telegram Channel for Sure football predictions daily!!!</strong></h4>
                        <a href="https://t.me/cleanoddss" target="_blank"><button class="btn btn-md btn-primary"><strong>Click to Join</strong></button></a>
                        <br><br>
                    </div>

                </div>
                <div class="col-sm-5 nopaddingsmall">
                    <div class="title">
                        <h4><strong><span style="color: #d18902;">POPULAR SPORT NEWS</span></strong></h4>
                    </div>

                    <div style="margin-top: -10px;">
                        {{--<div class="row">--}}
                            <div class="col-sm-12">
                                <div class="blog-grids">
                        @foreach($news as $new)

                                        <div class="grid">
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <div class="entry-media">
                                                        <img width="300" height="200" src="{{$path}}blog/{{$new->display_image}}" class="attachment-medium size-medium wp-post-image" alt="" /> </div>
                                                </div>
                                                <div class="col-xs-8">
                                                    <div class="entry-body">

                                                        <h3><a href="{{route('/article')}}/{{$new->slug}}">{{$new->title}}</a></h3>
                                                        <div class="read-more-date">
                                                            <a href="{{route('/article')}}/{{$new->slug}}"><button class="btn btn-sm btn-danger">Read News</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                        @endforeach
                                </div>
                            </div>
                        {{--</div>--}}
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mt10">
                    <center>
                        <?php
                        $ad4 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'ad3a')->where('status', '0')->first();
                        ?>
                        <div class="hideSM"><br>
                            @if(isset($ad4))
                                <a href="{{$ad4->website}}" target="_blank"><img src="{{$path}}/ads/{{$ad4->ads_image}}" alt="" class="img-responsive"></a>
                            @endif
                        </div>
                    </center>
                    <center>
                        <?php
                        $ad4b = \App\Focus\Modules\Ad\Model\Ad::where('location', 'ad3b')->where('status', '0')->first();
                        ?>
                        <div class="hideLG">
                            @if(isset($ad4b))
                                <a href="{{$ad4b->website}}" target="_blank"><img src="{{$path}}/ads/{{$ad4b->ads_image}}" alt="" class="img-responsive"></a>
                            @endif
                        </div>
                    </center>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="background: black; margin-top: 30px; margin-bottom: 20px;">
            <div class="row">
                <div class="hideLG"><br></div>
                <div class="col-sm-12 nopaddingsmall" style="padding: 80px 20px; color: whitesmoke">
                    {{--<div class="row">--}}
                    <div class="col-sm-4" style="border-right: 1px solid grey">
                        <div class="col-sm-12 text-center" style="color: green;">
                            <center>
                                <img src="{{asset('images/sms.png')}}" class="img-responsive" style="max-height: 150px;" alt="">
                            </center>

                            <h3 class="blockquote" style="margin-top: -5px;">Get 2-10 odds delivered to your mobile phone every weekend <br> <p style="margin-top: 4px; color: #ef5350;">It's absolutely free!</p></h3>
                            <a href="{{route('/vip_packages')}}?misc"><button class="btn btn-md btn-danger">JOIN THE LIST NOW <i class="fa fa-arrow-right"></i></button></a>
                            <br><br>
                        </div>

                        <hr class="hideLG">
                    </div>
                    <div class="col-sm-4 text-center">
                        <h2><strong>BE A WINNER TODAY!!!</strong></h2>
                        <p>Discover the world of football investment and make profit steadily everyday. Join our professional experts as they provide <span style="color: #339966;"><strong>1.50 - 2.00 Odds</strong></span> to enable you invest and make profit steadily everyday.</p>
                        <a href="{{route('/vip_packages')}}"><button style="background-color: whitesmoke; border: none; font-weight: bold; padding: 12px 12px; font-size: 16px; border-radius: 6px; color: #000">Get Access Now (1.50 - 2.00 Odds)</button></a>

                    </div>
                    <style>
                        .timer li {
                            display: inline-block;
                            font-size: 1.0em;
                            list-style-type: none;
                            padding: 0.5em;
                            text-transform: uppercase;
                        }

                        .timer li span {
                            display: block;
                            font-size: 3.5rem;
                        }
                    </style>
                    <div class="col-sm-4">
                        <div class="col-sm-12" style="background-color: white; border-radius: 8px; margin-top: 15px; color: black; padding-top: 8px; padding-bottom: 8px;">
                            <h3 class="text-center text-success"><strong>Investment Scheme</strong></h3>
                            <?php $first = \App\Focus\Modules\Prediction\Model\Prediction::where('superInvestment', 'Yes')->where('gameDate', \Carbon\Carbon::today()->format('d-m-Y'))->where('display', '0')->orderBy('id', 'DESC')->first(); ?>
                            @if(isset($first))
                                <center>
                                    <h2><strong>TOTAL ODDS: <span class="text-success">{{$first->superInvestmentOdds}}</span></strong></h2>
                                    <a href="{{route("/super_investment_tip")}}"><button class="btn btn-md btn-success"><i class="fa fa-eye"></i> VIEW HERE</button></a>
                                </center>
                                <hr>
                                <?php $time = strtotime(\Carbon\Carbon::now()->addHour('1')->format('h:i A')); ?>
                                <center>
                                    @if($time >= strtotime($first->gameTime))
                                        <h3 class="alert alert-success" style="margin-bottom: -20px!important;">Game Started!</h3>
                                        <br>
                                    @else
                                        <div class="containerCT">
                                            <h3 id="head" class="alert alert-danger" style="margin-top: -10px; margin-bottom: -10px;"><strong>Investment Game Starts</strong></h3>
                                            <ul class="timer">
                                                <li><span id="hours"></span>Hours</li>
                                                <li><span id="minutes"></span>Minutes</li>
                                                <li><span id="seconds"></span>Seconds</li>
                                            </ul>
                                        </div>
                                    @endif
                                </center>
                            @else
                                <h4 class="alert alert-warning text-center">Today's game is coming soon!</h4>
                                <br>
                            @endif

                        </div>
                    </div>
                    <br><br>
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 nopaddingsmall">
                    <div class="title">
                        <h4><strong><span style="color: #d18902;">UPCOMING FREE TIPS</span></strong></h4>
                    </div>

                    @if(count($inview)>0)
                        <table class="table table-bordered table-striped text-center" style="font-size: 13px;">
                            <thead>
                            <tr style="color: orange; background: black">
                                <th><center>Date</center></th>
                                <th><center>League</center></th>
                                <th><center>Fixture</center></th>
                                <th><center>Tip</center></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($inview as $key => $item)
                                <tr>
                                    <td>{{\Carbon\Carbon::parse($item->gameDate)->format('d/m')}}</td>
                                    <td>{{$item->league}}</td>
                                    <td>{{$item->teamOne}} <span>VS</span> {{$item->teamTwo}}</td>
                                    <td>{{$item->FTRecommendation}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="alert alert-warning">No Upcoming Tips Posted Yet</p>
                    @endif
                    <br>
                    <?php
                    $ad5 = App\Focus\Modules\Ad\Model\Ad::where('location', 'ad4')->where('status', '0')->first();
                    ?>
                    @if(isset($ad5))
                       {{--<center><a href="{{$ad5->website}}" target="_blank"><img src="{{$path}}/ads/{{$ad5->ads_image}}" alt="" class="img-responsive"></a></center>--}}
                    @endif
                    <center><div data-ad="cleanodds.com_300x250_300x250" data-devices="m:1,t:1,d:1" class="demand-supply"></div></center>
                    <br>
                </div>
                <div class="col-sm-6 nopaddingsmall">
                    <div class="title">
                        <h4><strong><span style="color: #d18902;">RECENT WINNINGS</span></strong></h4>
                    </div>
                    <?php $testimonials = \App\Focus\Modules\Prediction\Model\Prediction::where('display', '0')->where('testimonial', '1')->where('testimonialValue', '!=', '')->orderBy('updated_at', 'DESC')->take(15)->get(); ?>

                    @if(count($testimonials)>0)
                        <table class="table table-bordered table-striped text-center" style="font-size: 13px;">
                            <thead>
                            <tr style="color: orange; background: black">
                                <th><center>Date</center></th>
                                <!--<th><center>League</center></th>-->
                                <th><center>Fixture</center></th>
                                <th><center>Tip</center></th>
                                <th><center>Result</center></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($testimonials as $key => $item)
                                <tr>
                                    <td>{{\Carbon\Carbon::parse($item->gameDate)->format('d/m')}}</td>

                                    <td>{{$item->teamOne}} <span>VS</span> {{$item->teamTwo}}</td>
                                    <td style="background: #152e3d; color: white">{{$item->testimonialValue}}</td>
                                    <td><strong>{{$item->teamOneScore}}:{{$item->teamTwoScore}}</strong></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <center>
                            <a href="{{route('/testimonials')}}"><button class="btn btn-md btn-success">See More Winnings</button></a>
                        </center>
                        <br><br>
                    @else
                        <p class="alert alert-warning">NO TESTIMONIALS YET</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mt10">
                    <center>
                        <?php
                        $ad6a = \App\Focus\Modules\Ad\Model\Ad::where('location', 'ad5a')->where('status', '0')->first();
                        ?>
                        <div class="hideSM"><br>
                            @if(isset($ad6a))
                                <a href="{{$ad6a->website}}" target="_blank"><img src="{{$path}}/ads/{{$ad6a->ads_image}}" alt="" class="img-responsive"></a>
                            @endif
                        </div>
                    </center>
                    <center>
                        <?php
                        $ad6b = \App\Focus\Modules\Ad\Model\Ad::where('location', 'ad5b')->where('status', '0')->first();
                        ?>
                        <div class="hideLG">
                            @if(isset($ad6b))
                                <a href="{{$ad6b->website}}" target="_blank"><img src="{{$path}}/ads/{{$ad6b->ads_image}}" alt="" class="img-responsive"></a>
                            @endif
                        </div>
                    </center>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="background: #08202e; padding: 40px 15px; margin-bottom: 20px; margin-top: 20px;">
            <center><h2 class="text-white" style="color: orange">TIPS CATEGORIES</h2></center>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    @include('partial.store')
                    @include('partial.super_vip')
                    @include('partial.mega_vip')
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 text-justify" style="font-size: 16px;">
                    <h2 class="text-left" style="text-align: center;"><strong>FREE FOOTBALL PREDICTION SITE</strong></h2>
<p><strong>Cleanodds.com is a free football prediction tips website and the best of it kind. </strong>Cleanodds is the best site when you are searching for the free football betting tips and prediction sites.</p>
<p>We are charge with the duty of providing you with <strong>accurate football predictions</strong> for today&rsquo;s punters, including top soccer predictions, bet9ja predictions and over 3.5 goals predictions for today and tomorrow.</p>
<p>Cleanodds does not only gives football predictions, we are also at the verge of teaching the world how to predict football matches correctly.</p>
<p>All of our <strong>best over 2.5 soccer prediction</strong> are collected by experienced soccer predictors who have a bigger of Football prediction experience and knowledge when it comes to soccer predictions.</p>
<p>Cleanodds, one of the top&nbsp;<strong>soccer/football prediction sites</strong>&nbsp;on the World Wide Web, provides the most updated and well-researched&nbsp;<strong>football betting tips</strong>,&nbsp;<strong>winning goal predictions</strong>&nbsp;and&nbsp;<strong>soccer team picks</strong>&nbsp;to its members.</p>
<p>Cleanodds.com is not a betting site but a&nbsp;<strong>football prediction website</strong>,&nbsp;we can help you keep your winning streak going strong with accurate, and current&nbsp;<strong>soccer predictions</strong>. And by current we mean you will get&nbsp;<strong>today&rsquo;s soccer tips</strong>&nbsp;fresh off the ball.</p>
<p>We optimise our&nbsp;<strong>soccer predictions</strong>&nbsp;and&nbsp;<strong>tips</strong>&nbsp;for maximum flexibility and convenience, with categories catering to different betting markets such as both teams to score (BTTS), over 1.5, over 2.5 goals, over 3.5 goals, 1st half goals, double chance, fulltime handicap, accumulators, Chance Mix, Combo, highest scoring half, win either half, win both halves, correct scores and many more.</p>
<p>Take the gamble out of the game. Use&nbsp;<strong>football predictions</strong>&nbsp;backed by numbers and experts to keep your money safe and make it grow.</p>
<p>You might love to take a look at the full description of <a href="https://en.wikipedia.org/wiki/Statistical_association_football_predictions"> football prediction on wikipedia </a></p>
<p>Football betting is fun, but without some level of knowledge and guidance, it can be a high-risk venture. Soccer fans looking for websites that offer accurate forecasts go straight to the best football prediction site in the world Cleanodds.com.</p>
<h3><strong>Best Prediction Site For Football</strong></h3>
<p>If you are looking for the best prediction site for the year, Though Cleanodds.com is the best prediction website, we also work hard all day to make sure that all the predictions we give are going through the hands of experts before they are released.</p>
<p>Cleanodds is a top football prediction website that guarantees real football predictions on every market available. Every day of the week, our team of expert analysts and statisticians are working tirelessly to guarantee our daily returns on their stake.</p>
<p>You can also get matches prediction tips here on our website today, which you can easily play on. Join our tipster community and share your football match predictions by making your own choices.</p>
<p>There&rsquo;s no doubt that football prediction is a fantastic source of joy and entertainment for sport lovers alike. Nonetheless, you should note that over 2.5 prediction for tomorrow is also a profitable technique only if it is done on a specific football prediction platform.</p>
<p>Whether it&rsquo;s soccer or football betting tips, you&rsquo;ve got to be sure about your own instinct, or the ideas you find useful.</p>
<h3><strong>How To Predict Football Matches Correctly</strong></h3>
<p>Many tipsters/punters failed because they didn&rsquo;t cross-check some prediction sites. Although it takes some time, it is wise to check these types of websites through a trustworthy third-party website and put them on the recommended websites list. When you can&rsquo;t find any, then you can say by your own that Cleanodds.com is the best for sure football prediction.</p>
<p>That will be enough to get the beginners to know exactly how the predictions in football today work. And just enough for the doubt to see how correct our predictions for football today are.</p>
<p>At Cleanodds, we provide daily predictions on all matches played today. We take the time to provide the predictions of matches today and every day. We are not only experts at this, but we are also sport-lovers and this passion spurs to always be available to provide the right information on all the matches that will be played today. So, you can be rest assured that there is no day you visit our site that we wouldn't have today's match prediction ready for you.</p>
<p>This is why Cleanodds is rated among the top soccer prediction site with sure bet prediction.</p>
<p>Our website visitors see and commends us as the best online soccer prediction website based on feedbacks gotten from our members both online and offline.</p>
<p>Cleanodds has led to global recognition as the best football prediction site in the world like i said, due to detailed and rewarding match predictions by our expert tipsters. if you are looking for the best free prediction website that can give accurate football prediction and make profits daily then you can count on us. because we are here to make your daily ticket green with all our analyzing manager&rsquo;s hands on deck to make football analysis a home of winning to all our fans.</p>
<br />
                </div>
            </div>
        </div>
    </section>

@endsection

@section('levelJS')
    <script src="{{asset('js/axios.js')}}"></script>
    <script>
        $(document).ready(function () {

            $('.likeBtn').click(function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                $('#like'+id).prop('disabled', true);
                $('#unlike'+id).prop('disabled', true);
                var likes = Number($('#likeCount'+id).html()) + 1;
                $('#likeCount'+id).html(likes);

                var token = '{{$u_token}}';
                var url = '{{route('/like_tip')}}';
                axios({
                    method: 'get',
                    url: url+'/'+id+'/'+token
                });
            });

            $('.unlikeBtn').click(function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                $('#like'+id).prop('disabled', true);
                $('#unlike'+id).prop('disabled', true);
                var dislikes = Number($('#dislikeCount'+id).html()) + 1;
                $('#dislikeCount'+id).html(dislikes);

                var token = '{{$u_token}}';
                var url = '{{route('/dislike_tip')}}';
                axios({
                    method: 'get',
                    url: url+'/'+id+'/'+token
                });
            });
        });
    </script>

    <script>
        var today = '';
                @if(isset($first))
        var today = "{{\Carbon\Carbon::parse($first->gameTime)->format('M d, Y H:i:s')}}";
                @endif
        const second = 1000,
            minute = second * 60,
            hour = minute * 60,
            day = hour * 24;

        var countDown = new Date(today).getTime(),
            x = setInterval(function() {

                var now = new Date().getTime(),
                    distance = countDown - now;
                document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                    document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
                    document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);

                // do something later when date is reached
                if (distance < 0) {
                    clearInterval(x);
                    // 'ITS MY BIRTHDAY!';
                }
            }, second);
    </script>

@endsection
