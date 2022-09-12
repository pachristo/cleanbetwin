@extends('layout.master')
@section('title')
 CLEAN ODDS - Fixed Betting tips 100% Sure, Football Betting Tips and Predictions, Free &amp; Daily - CLEAN ODDS
@endsection
@section('home')
    active
@endsection
@section('body')

    <?php

    $country = COUNTRYNAME;
    $announcements = \App\Announcement::all();

    ?>
    <section class="bg-accent ">
        <div class="container py-2">
            <table class="bg-announcement text-white py-5" style="width: 100%">
                <tbody>
                    <tr>
                        <td class="bg-announcement text-white py-5 px-3">
                            <?php

                            $active_carousel = 0;

                            ?>
                            @foreach ($announcements as $key => $value)
                                <?php
                                $show_carousel = '';
                                $active_carousel++;
                                if ($active_carousel == 1) {
                                    $show_carousel = 'active';
                                }
                                ?>
                                @if ($value->type == 'text')

                                    {!! $value->body !!}


                                @endif
                            @endforeach
                        <td>



                    </tr>
                </tbody>
            </table>

        </div>
    </section>

    {{-- <section class="bg-body">
            <div class="container">
                <ul class="news-info-list text-center--md">

                    <li>
                        <i class="fa fa-calendar" aria-hidden="true"></i><span id="current_date"></span>
                    </li>

                </ul>
            </div>
        </section> --}}


    <section class="bg-accent section-space-less2">
        <div class="container">


            <?php
            $country = COUNTRYNAME;
            $ad1 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'first_ads')
                ->inRandomOrder()
                ->where('status', '0')
                ->first();
            $ad2 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'mfirst_ads')
                ->inRandomOrder()
                ->where('status', '0')
                ->first();
                $cad1 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'code_first_ads')
                ->inRandomOrder()
                ->where('status', '0')
                ->first();
            $cad2 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'code_mfirst_ads')
                ->inRandomOrder()
                ->where('status', '0')
                ->first();

            ?>



            {{-- desktop only --}}
            <div class="row">
                @if (isset($ad1))
                    <div class="col-12 hideSM mb-4">
                        <div class="ne-banner-layout1 mt-20-r text-center">
                            <a href="{{ $ad1->website }}" target="_blank">
                                <img src="{{ $path }}/ads/{{ $ad1->ads_image }}" alt="ad" class="img-fluid">
                            </a>
                        </div>
                    </div>
                @endif
                @if (isset($ad2))
                    {{-- mobile ad --}}
                    <div class="col-lg-4 col-md-12 hideLG">
                        <div class="row tab-space1">

                            <div class="col-sm-12 col-12">
                                <a href="{{ $ad2->website }}" target="_blank">
                                    <img src="{{ $path }}/ads/{{ $ad2->ads_image }}" alt="news"
                                        class="img-fluid width-100">
                                </a>
                                <br>
                                <br>
                            </div>

                        </div>
                    </div>
                @endif
                @if (isset($cad1))
                <div class="col-12 hideSM mb-4">
                   {!! $cad1->website !!}
                </div>
            @endif
            @if (isset($cad2))
                {{-- mobile ad --}}
                <div class="col-lg-4 col-md-12 hideLG">
                    {!! $cad2->website !!}
                </div>
            @endif
            </div>

            <div class="row tab-space1 justify-content-center">









                <div class="col-lg-8 col-md-8">

                    <div class=" nopaddingsmall" style="margin-bottom: 25px; ">
                        <div class="title" style="text-align: center; ">
                            <h4 class="py-2 bg-primary text-white"><strong><span>FREE SOCCER PICKS</span></strong>
                            </h4>

                        </div>


                        <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">Yesterday</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#profile"
                                    role="tab" aria-controls="profile" aria-selected="false">Today</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#contact"
                                    role="tab" aria-controls="contact" aria-selected="false">Tomorrow</a>
                            </li>
                        </ul>


                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade  " id="home" role="tabpanel" aria-labelledby="home-tab">


                                @if (count($freeYesterday) > 0)
                                    <table class="table table-striped text-center mastro-tips" style="font-size: 13px;">
                                        <thead>
                                            <tr class="bg-primary text-white">
                                                <th>
                                                    <center>Time</center>
                                                </th>
                                                <th>
                                                    <center>League</center>
                                                </th>
                                                <th>
                                                    <center>Fixture</center>
                                                </th>
                                                <th>
                                                    <center>Tip</center>
                                                </th>
                                                <th>
                                                    <center>Result</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($freeYesterday as $key => $item)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($item->gameTime)->format('H:i') }}
                                                    </td>
                                                    <td>{{ $item->league }}</td>
                                                    <td>{{ $item->teamOne }} <span
                                                            class="mvs"><strong>VS</strong></span>
                                                        {{ $item->teamTwo }}
                                                    </td>
                                                    <td>{{ $item->FTRecommendation }}</td>
                                                    <td><strong>{{ $item->teamOneScore }}:{{ $item->teamTwoScore }}</strong>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>
                                        <center>There was no tip here!</center>
                                    </p>
                                @endif
                            </div>
                            <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                aria-labelledby="profile-tab">
                                @if (count($freeToday) > 0)
                                    <table class="table table-striped text-center mastro-tips" style="font-size: 13px;">
                                        <thead>
                                            <tr class="bg-primary text-white">
                                                <th>
                                                    <center>Time</center>
                                                </th>
                                                <th>
                                                    <center>League</center>
                                                </th>
                                                <th>
                                                    <center>Fixture</center>
                                                </th>
                                                <th>
                                                    <center>Tip</center>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($freeToday as $key => $item)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($item->gameTime)->format('H:i') }}
                                                    </td>
                                                    <td>{{ $item->league }}</td>
                                                    <td>{{ $item->teamOne }} <span class="mvs">VS</span>
                                                        {{ $item->teamTwo }}</td>
                                                    <td>{{ $item->FTRecommendation }}</td>


                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>
                                        <center>Today's Tips are not available yet! Choose VIP PLAN, Make payment and get 100% sure TIPS.!</center>
                                    </p>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                @if (count($freeTomorrow) > 0)
                                    <table class="table table-striped text-center mastro-tips" style="font-size: 13px;">
                                        <thead>
                                            <tr class="bg-primary text-white">
                                                <th>
                                                    <center>Time</center>
                                                </th>
                                                <th>
                                                    <center>League</center>
                                                </th>
                                                <th>
                                                    <center>Fixture</center>
                                                </th>
                                                <th>
                                                    <center>Tip</center>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($freeTomorrow as $key => $item)
                                                <tr>
                                                    <td>{{ \Carbon\Carbon::parse($item->gameTime)->format('H:i') }}
                                                    </td>
                                                    <td>{{ $item->league }}</td>
                                                    <td>{{ $item->teamOne }} <span class="mvs">VS</span>
                                                        {{ $item->teamTwo }}</td>
                                                    <td>{{ $item->FTRecommendation }}</td>


                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p>
                                        <center>Tomorrow's  Tips are not available yet! Choose VIP PLAN, Make payment and get 100% sure TIPS.!</center>
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-8 offset-sm-2 ">
                            <div class="row">
                                @if (currentUser())
                                    <div class="col-sm-6  col-6 px-3">
                                        <a href="{{ route('/app/index') }}">
                                            <button class="btn btn-md btn-success w-100">My Account
                                            </button>
                                        </a>
                                    </div>

                                @else

                                    <div class="col-sm-6 col-6 px-3">
                                        <a href="{{ route('/register') }}">
                                            <button class="btn btn-md btn-success w-100">Register
                                            </button>
                                        </a>
                                    </div>



                                @endif

                                <div class="col-sm-6 col-6 px-3">
                                    <a href="{{route('/vip_packages')}}">
                                        <button class="btn btn-md btn-danger w-100">Upgrade to VIP</button>
                                    </a>
                                </div>

                            </div>







                        </div>


                    </div>


                </div>
                <?php


                $ad2 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'bfreetips')
                    ->inRandomOrder()
                    ->where('status', '0')
                    ->first();
                    $cad2 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'code_bfreetips')
                    ->inRandomOrder()
                    ->where('status', '0')
                    ->first();

                ?>


                    @if (isset($ad2))
                        {{-- mobile ad --}}
                        <div class="col-lg-4 col-md-4 hideSM">
                            <div class="row tab-space1">

                                <div class="col-sm-12 col-12">
                                    <a href="{{ $ad2->website }}" target="_blank">
                                        <img src="{{ $path }}/ads/{{ $ad2->ads_image }}" alt="news"
                                            class="img-fluid width-100">
                                    </a>
                                    <br>
                                    <br>
                                </div>

                            </div>
                        </div>
                    @endif
                    @if (isset($cad2))
                    {{-- mobile ad --}}
                    <div class="col-lg-4 col-md-4 hideSM">
                     {!! $cad2->website !!}
                    </div>
                @endif
            </div>

            <?php
            $country = COUNTRYNAME;
            $ad1 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'invest_ads')
                ->inRandomOrder()
                ->where('status', '0')
                ->first();
            $ad2 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'minvest_ads')
                ->inRandomOrder()
                ->where('status', '0')
                ->first();

                $cad1 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'code_invest_ads')
                ->inRandomOrder()
                ->where('status', '0')
                ->first();
            $cad2 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'code_minvest_ads')
                ->inRandomOrder()
                ->where('status', '0')
                ->first();

            ?>



            {{-- desktop only --}}
            <div class="row">
                @if (isset($ad1))
                    <div class="col-12 hideSM mb-4">
                        <div class="ne-banner-layout1 mt-20-r text-center">
                            <a href="{{ $ad1->website }}" target="_blank">
                                <img src="{{ $path }}/ads/{{ $ad1->ads_image }}" alt="ad"
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>
                @endif
                @if (isset($ad2))
                    {{-- mobile ad --}}
                    <div class="col-lg-4 col-md-12 hideLG">
                        <div class="row tab-space1">

                            <div class="col-sm-12 col-12">
                                <a href="{{ $ad2->website }}" target="_blank">
                                    <img src="{{ $path }}/ads/{{ $ad2->ads_image }}" alt="news"
                                        class="img-fluid width-100">
                                </a>

                            </div>

                        </div>
                    </div>
                @endif

                  {{-- desktop only --}}
            <div class="row">
                @if (isset($cad1))
                    <div class="col-12 hideSM mb-4">
                       {!! $cad1->website !!}
                    </div>
                @endif
                @if (isset($cad2))
                    {{-- mobile ad --}}
                    <div class="col-lg-4 col-md-12 hideLG">
                     {!! $cad2->website !!}
                    </div>
                @endif

            </div>


        </div>
        <div class="container text-white" style=" padding: 0">
            <div class=" mt-2" style="    background-image: url({{asset('/assets/img/grass.jpg')}});
                                            background-size: cover;
                                            margin-bottom: 0px;
                                            height: 100%;
                                            width: 100%;
                                            color: whitesmoke;
                                            text-align: center;
                                        padding:0px;
                                        ">
                {{-- <div class="container-fluid" style="background-color: #171d27;"> --}}
                <div class="row mx-0" style=" background:#051b0bc4">
                    <div class="col-sm-12" style=" padding: 17px 10px; ">
                        <div class="row mx-0">
                            <div class="col-sm-6 mt-20  whatsapp_investment">

                                <p class="text-white">
                                    Do you want to ride on our experienced, professional experts shoulders as they
                                    provide
                                    <strong>1.50 - 2.00 Odds</strong> to enable you invest and make profit steadily
                                    everyday,
                                    <strong>Receive 2 sets of sure Odds from an assigned expert everyday, Full
                                        guidance and assistance of matches or bets you provide. </strong><br>
                                    <a href="" class="btn btn-danger" style="    padding: 3px;
                                   margin-top: 10px;">Click here &nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                                </p>

                            </div>


                            <style>
                                .timer li {
                                    display: inline-block;
                                    font-size: 0.8em;
                                    list-style-type: none;
                                    padding: 0.5em;
                                    text-transform: uppercase;
                                }

                                .timer li span {
                                    display: block;
                                    font-size: 1.3rem;
                                }

                            </style>
                            <div class="col-sm-6">
                                <div class="col-sm-12 " style="    /* background-color: #e0b70a; */
                                                    border-radius: 7px;
                                                    margin-top: 2px;
                                                    color: #f8f8f8;
                                                    padding-top: 8px;
                                                    padding-bottom: 8px;
                                                ">
                                    @php
                                        $first = \App\Focus\Modules\Prediction\Model\Prediction::where('superInvestment', 'Yes')
                                            ->where('gameDate', \Carbon\Carbon::today()->format('d-m-Y'))
                                            ->where('display', '0')
                                            ->orderBy('id', 'DESC')
                                            ->first();
                                        $invfirst = \App\Focus\Modules\Prediction\Model\Prediction::where('gameType', '1')
                                            ->where('superInvestment', 'Yes')
                                            ->where('gameDate', \Carbon\Carbon::today()->format('d-m-Y'))
                                            ->get();
                                        $yyOdds = 1;

                                        foreach ($invfirst as $key => $item) {
                                            if (isset($item->superInvestmentOdds)) {
                                                $yyOdds = $yyOdds * $item->superInvestmentOdds;
                                            }
                                        }
                                    @endphp
                                    <h1 class="text-center "><strong>Investment Tips</strong></h1>
                                    @if (isset($first))
                                        <div class="row">
                                            <div class="col-sm-8 offset-sm-2">
                                                <span><span>TOTAL ODDS: <span class="text-success">
                                                            {{ number_format($yyOdds, 2) }}

                                                        </span></span></span>
                                                <a class="btn btn-md btn-success d-inline" href="{{
                                                    route('/super_investment_tip') }}"><i
                                                        class="fa fa-eye"></i>
                                                    VIEW
                                                    TIP</a>
                                            </div>
                                            <div class="col-sm-12 mt-20 nopaddingsmall">
                                                <?php
                                                $time = strtotime(
                                                    \Carbon\Carbon::now()
                                                        ->addHour('1')
                                                        ->format('h:i A'),
                                                );
                                                ?>
                                                @if ($time < strtotime($first->gameTime))
                                                    <span id="head" class="alert alert-success "><strong> Investment Game
                                                            Starts</strong></span>
                                                @endif


                                            </div>



                                        </div>



                                        <?php
                                        $time = strtotime(
                                            \Carbon\Carbon::now()
                                                ->addHour('1')
                                                ->format('h:i A'),
                                        );
                                        ?>
                                        <center>
                                            @if ($time >= strtotime($first->gameTime))
                                                <h3 class="alert alert-success" style="margin-bottom: -20px!important;">
                                                    Game Already Started!</h3>
                                            @endif
                                            @if ($time < strtotime($first->gameTime))

                                                <div class="containerCT mt-20">
                                                    <style>
                                                        .timer>li {
                                                            border: 4px solid #e0b70a;
                                                            border-radius: 31px;
                                                            width: 77px;
                                                        }

                                                    </style>
                                                    <ul class="timer">
                                                        <li><span id="hours">00</span>Hours</li>
                                                        <li><span id="minutes">00</span>Minutes</li>
                                                        <li><span id="seconds">00</span>Seconds</li>
                                                    </ul>
                                                </div>
                                            @endif
                                        </center>
                                    @else
                                        <h6 class="alert alert-warning text-center">Today's Investment Tip is not yet
                                            available!</h6>
                                    @endif
                                    {{-- <h5 class="alert alert-warning text-center">Today's Investment Tip is not yet available!</h5> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $country = COUNTRYNAME;
            $ad1 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'uinv')
                ->inRandomOrder()
                ->where('status', '0')
                ->first();
            $ad2 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'muinv')
                ->inRandomOrder()
                ->where('status', '0')
                ->first();
                $cad1 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'code_uinv')
                ->inRandomOrder()
                ->where('status', '0')
                ->first();
            $cad2 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'code_muinv')
                ->inRandomOrder()
                ->where('status', '0')
                ->first();

            ?>



            {{-- desktop only --}}
            <div class="row">
                @if (isset($ad1))
                    <div class="col-12 hideSM mb-4">
                        <div class="ne-banner-layout1 mt-20-r text-center">
                            <a href="{{ $ad1->website }}" target="_blank">
                                <img src="{{ $path }}/ads/{{ $ad1->ads_image }}" alt="ad"
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>
                @endif
                @if (isset($ad2))
                    {{-- mobile ad --}}
                    <div class="col-lg-4 col-md-12 hideLG">
                        <div class="row tab-space1">

                            <div class="col-sm-12 col-12">
                                <a href="{{ $ad2->website }}" target="_blank">
                                    <img src="{{ $path }}/ads/{{ $ad2->ads_image }}" alt="news"
                                        class="img-fluid width-100">
                                </a>

                            </div>

                        </div>
                    </div>
                @endif
                @if (isset($cad1))
                <div class="col-12 hideSM mb-4">
                    {!! $cad1->website !!}

                </div>
            @endif
            @if (isset($cad2))
                {{-- mobile ad --}}
                <div class="col-lg-4 col-md-12 hideLG">
                    {!! $cad2->website !!}
                </div>
            @endif

            </div>

        </div>

    </section>

    <section class="bg-accent section-space-default">
        <div class="container">
            <div class="col-lg-12  tipstore-bg">
                {{-- @include('partial.store') --}}
                @include('partial.mega_vip')
            </div>
            <?php
            $country = COUNTRYNAME;
            $ad1 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'ustore')
                ->inRandomOrder()
                ->where('status', '0')
                ->first();
            $ad2 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'mustore')
                ->inRandomOrder()
                ->where('status', '0')
                ->first();

                $cad1 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'code_ustore')
                ->inRandomOrder()
                ->where('status', '0')
                ->first();
            $cad2 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'code_mustore')
                ->inRandomOrder()
                ->where('status', '0')
                ->first();

            ?>



            {{-- desktop only --}}
            <div class="row">
                @if (isset($ad1))
                    <div class="col-12 hideSM mb-4">
                        <div class="ne-banner-layout1 mt-20-r text-center">
                            <a href="{{ $ad1->website }}" target="_blank">
                                <img src="{{ $path }}/ads/{{ $ad1->ads_image }}" alt="ad"
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>
                @endif
                @if (isset($ad2))
                    {{-- mobile ad --}}
                    <div class="col-lg-4 col-md-12 hideLG">
                        <div class="row tab-space1">

                            <div class="col-sm-12 col-12">
                                <a href="{{ $ad2->website }}" target="_blank">
                                    <img src="{{ $path }}/ads/{{ $ad2->ads_image }}" alt="news"
                                        class="img-fluid width-100">
                                </a>

                            </div>

                        </div>
                    </div>
                @endif

                @if (isset($cad1))
                    <div class="col-12 hideSM mb-4">
                       {!! $cad1->website !!}
                    </div>
                @endif
                @if (isset($cad2))
                    {{-- mobile ad --}}
                    <div class="col-lg-4 col-md-12 hideLG">
                       {!! $cad2->website !!}
                    </div>
                @endif

            </div>
               <?php $testimonials = \App\Focus\Modules\Prediction\Model\Prediction::where('display', '0')->where('testimonial', '1')->where('testimonialValue', '!=', '')->orderBy('updated_at', 'DESC')->paginate(10)->onEachSide(2); ?>

                <div class="row">
                            <div class="title col-sm-12 px-0" style="text-align: center; ">
                            <h4 class="py-2 bg-primary text-white"><strong><span>Recent Winnings</span></strong>
                            </h4>

                        </div>

                    @if(count($testimonials)>0)
                        <table class="table table-bordered table-striped text-center testimonials-table" style="font-size: 13px;">
                            <thead>
                            <tr class="text-center text-white bg-dark">
                                <th><center>Date</center></th>
                                <th><center>League</center></th>
                                <th><center>Fixture</center></th>
                                <th><center>Tip</center></th>
                                <th><center>Result</center></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($testimonials as $key => $item)
                                <tr>
                                    <td>{{\Carbon\Carbon::parse($item->gameDate)->format('d/m')}}</td>
                                    <td>{{$item->league}}</td>
                                    <td>{{$item->teamOne}} <span>VS</span> {{$item->teamTwo}}</td>
                                    <td >{{$item->testimonialValue}}</td>
                                    <td><strong>{{$item->teamOneScore}}:{{$item->teamTwoScore}}</strong></td>
                                </tr>
                            @endforeach
                            <tr >
                                <td colspan="5">
                                     <a class="btn btn-success text-white" href="{{ route('/testimonials') }}"><i
                                                        class="fa fa-eye"></i> View More</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    @else
                        <p class="alert alert-warning">NO Winnings YET</p>
                    @endif



                </div>


        </div>

    </section>


    <section class="bg-accent section-space-default">
        <div class="container px-4">
            <br>
            <br>

            <p style="text-align: center;"><strong>CLEAN ODDS PREDICTION</strong></p>
            <p><strong>MAKE PROFITS </strong></p>
            <p><strong>Clean Odds</strong> is an exceptional platform to acquire the best full time prediction and tips to place bets on any bookmaker that turns green on every bet slip. <strong>CLEAN ODDS</strong> can guarantee to you that we have the best fixed games. Our fixed matches are 100% accurate and reliable. As a proof that our fixed matches are the best in the market, you can check our past 100% real archives. If you accept this offer it will bring you huge profit-guaranteed. We are happy with chance to work with you and change your life with 100% safe bet fixed matches. That&rsquo;s why we have customers who trust us and buy our fixed games. In the first place we always put our customers. That&rsquo;s the reason that all costumers respect us and want work with us on a long term. If you are still looking for a strong and reliable source, there is no doubt that you are in the right place.</p>
            <p>Turn Your Passion for Football to Profit!!! Anywhere, Anytime, Any Betting Platform Empower yourself to convert the thrill of watching your favourite teams and players play on match day to cool cash.</p>
            <p><strong>Clean Odds</strong> as a prediction site highlights the best and accurate football full time prediction. All best football full time predictions today which include odds with a high winning chance are offered freely to every visitor of our site. You can also choose from our Football prediction or Football tips. This gives you full control over the number of odds you are willing to bet.<strong> Clean Odds</strong> also allows you check our bookmarkers list to get free bets on deposits with different secure methods.</p>
            <p>Range of Betting Prediction and Prediction Tips <strong>Clean Odds</strong> offers precise betting predictions for the expected outcome of a given football match as well as other sports. We offer the best types of full time prediction categories and accumulators including but not limited to Sure 2 odds , Sure 3 odds, Sure 5 odds and the 500 plus odds value bet accumulator.</p>
            <p>We are the best source of free football full time betting tips and football full time predictions and betting statistics, football results, football statistics and trends. We offer daily full time match betting previews and analysis for every major and minor league around the world, including the English Premier League (EPL), the German Bundesliga, the Italian Serie A, Spanish Laliga, the French Ligue 1, UEFA Champions (UCL), UEFA Europa League (UEL) and other competitions involving several national teams across the globe. These include the FIFA World Cup, UEFA European Championship, the African Nations Cup, America's Cup and many others.</p>
            <p>Our range of football full time predictions and tips feature forms with which most bookmakers present their odds. Our football full time prediction tips include;</p>
            <p><strong> &bull; Both Teams to Score </strong></p>
            <p><strong>&bull; Draw </strong></p>
            <p><strong>&bull; Over 1.5 Goals</strong></p>
            <p><strong> &bull; Over 2.5 Goals</strong></p>
            <p><strong> &bull; Under 2.5 Goals</strong></p>
            <p><strong> &bull; Corner Stats</strong></p>
            <p><strong> &bull; Corner Stats</strong></p>
            <p><strong> &bull; XG Stats</strong></p>
            <p><strong> &bull; 1st and 2nd Half Goals </strong></p>
            <p><strong>&bull; Scored in Both Halves</strong></p>
            <p><strong> &bull; Correct Scores </strong></p>
            <p><strong>&bull; Yellow and Red Cards</strong></p>
            <p><strong> &bull; Clean Sheets</strong></p>
            <p><strong> &bull; Home Advantages </strong></p>
            <p><strong>&bull; Offside Stats</strong></p>
            <p><strong> &bull; Referee Stats</strong></p>
            <p>Our full time predictions accumulate tips for all year (365) football days with football actions. Team of Experts With us at <strong>Clean Odds</strong>, the difficulty of having to pick the right team and odds to bet on is reduced drastically with the help of our team of experts. Our full time prediction platform has a wide range of teams which is composed of experts to help you achieve unbelievable winning outcomes and streaks. Our team of experts is quite informative sports analysts, highly regarded in the industry mainly because of their distinctiveness in the ideas they put forward. These football experts offer their personal full time predictions, entirely conceived and updated in real-time according to the various current events. Taking into account all the factors that can influence a game, our team of specialists reveal their opinions on all games in diverse leagues across the world, the best full time prediction and tips to be favoured in the coupons. Our experts utilize sophisticated algorithms to come up with the best full time predictions, by inputting data acquired about the team, players, referee and other modalities involved. This team interprets graphics produced by the algorithm which shows every stat from how many goals a team scores averagely per game, to a team's most frequent correct scores over the last 20 games and a league table which shows their past scorelines against teams in different league positions, head to head stats, the influence of referee, home and neutral stadium to be used and lots more. Basically, the computerized algorithm provides all information important to make educated full time predictions and tips.</p>
            <p>High Returns and Improved Payout Percentage At<strong> Clean Odds</strong>, we provide our clients and viewers with full time predictions and tips for odds that are not just accurate but also high. Our range of full time predictions covers single bets, rollover and accumulators, which allows you to increase your payout in various bookmakers. Accumulators offer vary for every bookmaker and are usually only available for certain bets.</p>
            <p>These are used as common incentives to entice their customers to bet with them. With the help of our intelligent algorithm, Clean Odds provides you with such selections that not only predict the most likely match result but also calculate the odds and possible returns. With this information, you can decide the perfect amount to stake on the bets. Winning Rate of Over 90% of Our Previous Full Time Predictions At Clean Odds, we are proud of the success rate of our full time predictions so far.</p>
            <p>Not all football prediction sites get close to our football bet return rate of over 90% for our correct full time prediction and tips. We are extremely careful and meticulous during our full time predictions and tips. This is usually formulated and backed up with detailed statistics and match trends. Clean Odds is the best site for today soccer full time prediction in the world. Are you in doubt of how dependable our football full time predictions are? Check our results for yesterday's predictions to help boost your confidence.</p>
            <p>We have worked hard to achieve this record and we won't stop improving and maintaining this reputation in the industry. Excellent Customer Service and Zero Time Response Rate Clean Odds offers our clients an excellent and highly responsive customer service unit to put you through how to apply the full time predictions and tips from our experts. Our Customer Service Unit is swift to respond to any complaints, requests and replies regarding any event on the platform. Betting is time-based, and a one-second delay before placing a bet could mean the loss of millions. At Clean Odds, we understand this.</p>
            <p>Thus, we have provided a series of contact platforms to access our customer service. <strong>Clean Odds</strong>, The home of reliable betting tips. We convert your passion for sports into profit.</p>
            <p class="mb-5">For any feedback,<a href="{{ route('/contact_us') }}"> Contact Us</a>.</p>
            <br>
            <br>
            <br>
        </div>

        </div>

    </section>
@endsection
@section('JS')
    <script>
        var today = '';
        @if (isset($first))
            var today = "{{ \Carbon\Carbon::parse($first->gameTime)->format('M d, Y H:i:s') }}";
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
