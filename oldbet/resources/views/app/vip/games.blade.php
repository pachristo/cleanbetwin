

@extends('app.layouts.master')

@section('title') {{ $title }} @endsection
@section('home') active @endsection
@section('levelCSS') @endsection

@section('body')

   <!--start content-->

    @if (session()->has('success'))
        <div class="col-sm-12">
            <div class="alert alert-success text-center">
                <h5>{{ session()->get('success') }}</h5>
            </div>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-warning text-center">
            <h5>{!! session()->get('error') !!}</h5>
        </div>
    @endif
    <?php
    $country = COUNTRYNAME;
    $ad1 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'catstore')
    ->inRandomOrder()
        ->where('status', '0')
        ->first();
        $ad2 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'mcatstore')
    ->inRandomOrder()
        ->where('status', '0')
        ->first();
        $cad1 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'code_catstore')
    ->inRandomOrder()
        ->where('status', '0')
        ->first();
        $cad2 = \App\Focus\Modules\Ad\Model\Ad::where('location', 'code_mcatstore')
    ->inRandomOrder()
        ->where('status', '0')
        ->first();

    ?>

     

    {{-- desktop only --}}
    <div class="row">
        @if (isset($ad1))
        <div class="col-12  hideSM mb-4">
            <div class="ne-banner-layout1 mt-20-r text-center">
                <a  href="{{ $ad1->website }}" target="_blank">
                    <img
                    src="{{ $path }}/ads/{{ $ad1->ads_image }}"  alt="ad"
                        class="img-fluid">
                </a>
            </div>
        </div>
        @endif
        @if (isset($ad2))
        {{-- mobile ad --}}
        <div class="col-lg-4 text-center col-md-12 hideLG">
            <div class="row tab-space1">

                <div class="col-sm-12 col-12">
                    <a  href="{{ $ad2->website }}" target="_blank">
                    <img src="{{ $path }}/ads/{{ $ad2->ads_image }}" alt="news"
                        class="img-fluid width-100">
                    </a>

                </div>

            </div>
        </div>
        @endif

        @if (isset($cad1))
        <div class="col-12  hideSM mb-4">
            {!! $cad1->website  !!}
        </div>
        @endif
        @if (isset($cad2))
        {{-- mobile ad --}}
        <div class="col-lg-4 text-center col-md-12 hideLG">
            {!! $cad2->website  !!}
        </div>
        @endif

    </div>
    <div class="col-12 col-lg-8 offset-lg-2 ">
        <div class="title" style="text-align: center; ">
            <h4 class="" style="
            background: none;
            /* background-color: transparent; */
            padding-top: 7px;
            margin-bottom: 55px;
            color:black;
            border-bottom: 2px solid #62ab38;"><strong><span>{{ $title }}</span></strong>
            </h4>
        
        </div>
        
    
        <div class="card shadow-sm border-0 overflow-hidden">
            <div class="card-body">
    
                <div class="col-sm-12 nopaddingsmall" style="">
                    <ul class="nav nav-pills " id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#yesterday" type="button" role="tab" aria-controls="home" aria-selected="true">Yesterday</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#today" type="button" role="tab" aria-controls="profile" aria-selected="false">Today</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#tomorrow" type="button" role="tab" aria-controls="messages" aria-selected="false">Tomorrow</button>
                        </li>
                    
                      </ul>
                      
                      <div class="tab-content" style="    margin-top: 15px;">
                        <div class="tab-pane " id="yesterday" role="tabpanel" aria-labelledby="home-tab">
                            @if (count($yy) > 0)
                            <table class="table table-striped smTableFontSize"
                                style="background-color: #f8f9f9; font-size: 14px; width: 100%; margin-top: -10px;">
                                <tbody>
                                    <tr style="height: 9px;" class="text-black">
                                        <td
                                            style="width: 8%; height: 9px;  text-align: center;">
                                            <span >TIME</span></td>
                                        <td
                                            style="width: 10%; height: 9px; ; text-align: center;">
                                            <span >LEAG</span></td>
                                        <td
                                            style="width: 55%; height: 9px;; text-align: center;">
                                            <span >FIXTURE</span></td>
                                        <td
                                            style="width: 12%; height: 9px;  text-align: center;">
                                            <span >TIP</span></td>
                                        {{-- <td style="width: 12%; height: 9px; background-color: #024b30; text-align: center;"><span >ODD</span></td> --}}
                                        <td
                                            style="width: 15%; height: 9px;  text-align: center;">
                                            <span >RESULT</span></td>
                                    </tr>
                                    <?php $yyOdds = 1; ?>
                                    @foreach ($yy as $key => $item)
                                        <tr style="height: 3px;">
                                            <td style="height: 3px; text-align: center;"><span
                                                    style="color: #024b30;"><strong>{{ $item->gameTime }}</strong></span>
                                            </td>
                                            <td style="height: 3px;  text-align: center;">{{ $item->league }}</td>
                                            <td style="height: 3px; text-align: center;">{{ ucfirst($item->teamOne) }}
                                                <span style="color: #024b30;"><strong>VS</strong></span>
                                                {{ ucfirst($item->teamTwo) }}</td>
                                            @if ($keys == 'sure2')
                                                <td class="text-center"><span>{{ $item->sure2OddsTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->sure2OddsOdds}}</span></td> --}}
                                            @elseif($keys=='sure3')
                                                <td class="text-center"><span>{{ $item->sure3OddsTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->sure3OddsOdds}}</span></td> --}}
                                            @elseif($keys=='sure5')
                                                <td><span>{{ $item->sure5OddsTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->sure5OddsOdds}}</span></td> --}}
                                            @elseif($keys=='draws')
                                                <td class="text-center"><span>{{ $item->drawsTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->drawsOdds}}</span></td> --}}
                                            @elseif($keys=='btts')
                                                <td class="text-center"><span>{{ $item->bttsTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->bttsOdds}}</span></td> --}}
                                            @elseif($keys=='matchCorner')
                                                <td class="text-center"><span>{{ $item->matchCornersTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->matchCornersOdds}}</span></td> --}}
                                            @elseif($keys=='ssingles')
                                                <td class="text-center"><span>{{ $item->singleBetsTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->singleBetsOdds}}</span></td> --}}
                                            @elseif($keys=='ov3')
                                                <td class="text-center"><span>{{ $item->overThree }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->overThreeOdds}}</span></td> --}}
                                            @elseif($keys=='htft')
                                                <td class="text-center"><span>{{ $item->HTFT }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->HTFTOdds}}</span></td> --}}
                                            @elseif($keys=='cs')
                                                <td><span>{{ $item->correctScoreTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->correctScoreOdds}}</span></td> --}}
                                            @elseif($keys=='wt')
                                                <td><span>{{ $item->weekendTipsTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->weekendTipsOdds}}</span></td> --}}
                                            @elseif($keys=='acca')
                                                <td  class="text-center"><span>{{ $item->accaTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->accaOdds}}</span></td> --}}
                                            @elseif($keys=='suInTip')
                                                <td class="text-center"><span>{{ $item->superInvestmentTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->superInvestmentOdds}}</span></td> --}}
                                            @endif
                
                                            <td class="text-center">{{ $item->teamOneScore }}:{{ $item->teamTwoScore }}
                                            </td>
                                        </tr>
                
                                        {{-- @if ($keys == 'sure2')
                                            <?php if (isset($item->sure2OddsOdds)) {
                                                $yyOdds = $yyOdds * $item->sure2OddsOdds;
                                            } ?>
                                        @elseif($keys=='sure3')
                                            <?php if (isset($item->sure3OddsOdds)) {
                                                $yyOdds = $yyOdds * $item->sure3OddsOdds;
                                            } ?>
                                        @elseif($keys=='ov3')
                                            <?php if (isset($item->overThreeOdds)) {
                                                $yyOdds = $yyOdds * $item->overThreeOdds;
                                            } ?>
                                        @elseif($keys=='acca')
                                            <?php if (isset($item->accaOdds)) {
                                                $yyOdds = $yyOdds * $item->accaOdds;
                                            } ?>
                                        @elseif($keys=='btts')
                                            <?php if (isset($item->bttsOdds)) {
                                                $yyOdds = $yyOdds * $item->bttsOdds;
                                            } ?>
                                        @elseif($keys=='ssingles')
                                            <?php if (isset($item->singleBetsOdds)) {
                                                $yyOdds = $yyOdds * $item->singleBetsOdds;
                                            } ?>
                                        @elseif($keys=='matchCorner')
                                            <?php if (isset($item->matchCornersOdds)) {
                                                $yyOdds = $yyOdds * $item->matchCornersOdds;
                                            } ?>
                                        @elseif($keys=='sure5')
                                            <?php if (isset($item->sure5OddsOdds)) {
                                                $yyOdds = $yyOdds * $item->sure5OddsOdds;
                                            } ?>
                                        @elseif($keys=='draws')
                                            <?php if (isset($item->drawsOdds)) {
                                                $yyOdds = $yyOdds * $item->drawsOdds;
                                            } ?>
                                        @elseif($keys=='wt')
                                            <?php if (isset($item->weekendTipsOdds)) {
                                                $yyOdds = $yyOdds * $item->weekendTipsOdds;
                                            } ?>
                                        @elseif($keys=='htft')
                                            <?php if (isset($item->HTFTOdds)) {
                                                $yyOdds = $yyOdds * $item->HTFTOdds;
                                            } ?>
                                        @elseif($keys=='cs')
                                            <?php if (isset($item->correctScoreOdds)) {
                                                $yyOdds = $yyOdds * $item->correctScoreOdds;
                                            } ?>
                                        @elseif($keys=='suInTip')
                                            <?php if (isset($item->superInvestmentOdds)) {
                                                $yyOdds = $yyOdds * $item->superInvestmentOdds;
                                            } ?>
                                        @endif --}}
                                    @endforeach
                                    {{-- @if ($keys == 'btts' || $keys == 'draws' || $keys == 'wt' || $keys == 'ov3' || $keys == 'htft' || $keys == 'cs' || $keys == 'acca' || $keys == 'ssingles' || $keys == 'matchCorner') --}}
                
                                    @if ($keys == 'btts' || $keys == 'draws' || $keys == 'wt' || $keys == 'ov3' || $keys == 'htft' || $keys == 'acca' || $keys == 'ssingles' || $keys == 'matchCorner')
                                    @else
                                        {{-- <tr>
                                            <td colspan="5" style="font-size: 16px;" class="text-success"><strong>Total Odds:</strong> {{$yyOdds}}</td>
                                        </tr> --}}
                                    @endif
                                    @if (isset($cy))
                                        <tr>
                                            <td colspan="5" class="btn-success">
                                                <h5>Code: <strong>{{ $cy->bookingCode }} -
                                                        ({{ $cy->bookMaker }})</strong></h5>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{-- <div class="col-sm-12"><h3 class="text-primary badge" style="background-color: #000;"> Odd Value =  <strong style="font-size: 16px;" class="text-primary">{{number_format($yyOdds, 2)}}</strong> </h3></div> --}}
                        @else
                            <h4 class="alert alert-warning text-center"><i
                                    class="fa fa-times-circle text-danger"></i>We had no tips here yesterday!.</h4>
                        @endif
                        </div>
                        <div class="tab-pane active" id="today" role="tabpanel" aria-labelledby="profile-tab">
                            @if (count($tt) > 0)
                            <table class="table table-striped smTableFontSize"
                                style="background-color: #f8f9f9; font-size: 14px; width: 100%; margin-top: -10px;">
                                <tbody>
                                    <tr style="height: 9px;">
                                        <td
                                            style="width: 8%; height: 9px;  text-align: center;">
                                            <span >TIME</span></td>
                                        <td
                                            style="width: 10%; height: 9px; text-align: center;">
                                            <span >LEAG</span></td>
                                        <td
                                            style="width: 55%; height: 9px;  text-align: center;">
                                            <span >FIXTURE</span></td>
                                        <td
                                            style="width: 12%; height: 9px;  text-align: center;">
                                            <span >TIP</span></td>
                                        {{-- <td style="width: 12%; height: 9px; background-color: #024b30; text-align: center;"><span >ODD</span></td> --}}
                                    </tr>
                                    <?php $ttOdds = 1; ?>
                                    @foreach ($tt as $key => $item)
                                        <tr style="height: 3px;">
                                            <td style="height: 3px; text-align: center;"><span
                                                    style="color: #024b30;"><strong>{{ $item->gameTime }}</strong></span>
                                            </td>
                                            <td style="height: 3px;  text-align: center;">{{ $item->league }}</td>
                                            <td style="height: 3px; text-align: center;">
                                                {{ ucfirst($item->teamOne) }} <span
                                                    style="color: #024b30;"><strong>VS</strong></span>
                                                {{ ucfirst($item->teamTwo) }}</td>
                                            @if ($keys == 'sure2')
                                                <td class="text-center"><span>{{ $item->sure2OddsTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->sure2OddsOdds}}</span></td> --}}
                                            @elseif($keys=='sure3')
                                                <td class="text-center"><span>{{ $item->sure3OddsTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->sure3OddsOdds}}</span></td> --}}
                                            @elseif($keys=='sure5')
                                                <td class="text-center"><span>{{ $item->sure5OddsTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->sure5OddsOdds}}</span></td> --}}
                                            @elseif($keys=='draws')
                                                <td class="text-center"><span>{{ $item->drawsTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->drawsOdds}}</span></td> --}}
                                            @elseif($keys=='btts')
                                                <td class="text-center"><span>{{ $item->bttsTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->bttsOdds}}</span></td> --}}
                                            @elseif($keys=='matchCorner')
                                                <td class="text-center"><span>{{ $item->matchCornersTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->matchCornersOdds}}</span></td> --}}
                                            @elseif($keys=='ssingles')
                                                <td class="text-center"><span>{{ $item->singleBetsTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->singleBetsOdds}}</span></td> --}}
                                            @elseif($keys=='ov3')
                                                <td class="text-center"><span>{{ $item->overThree }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->overThreeOdds}}</span></td> --}}
                                            @elseif($keys=='htft')
                                                <td class="text-center"><span>{{ $item->HTFT }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->HTFTOdds}}</span></td> --}}
                                            @elseif($keys=='cs')
                                                <td class="text-center"><span>{{ $item->correctScoreTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->correctScoreOdds}}</span></td> --}}
                                            @elseif($keys=='wt')
                                                <td class="text-center"><span>{{ $item->weekendTipsTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->weekendTipsOdds}}</span></td> --}}
                                            @elseif($keys=='acca')
                                                <td class="text-center"><span>{{ $item->accaTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->accaOdds}}</span></td> --}}
                                            @elseif($keys=='suInTip')
                                                <td class="text-center"><span>{{ $item->superInvestmentTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->superInvestmentOdds}}</span></td> --}}
                                            @endif
                                        </tr>
                                        {{-- @if ($keys == 'sure2')
                                            <?php if (isset($item->sure2OddsOdds)) {
                                                $ttOdds = $ttOdds * $item->sure2OddsOdds;
                                            } ?>
                                        @elseif($keys=='sure3')
                                            <?php if (isset($item->sure3OddsOdds)) {
                                                $ttOdds = $ttOdds * $item->sure3OddsOdds;
                                            } ?>
                                        @elseif($keys=='ov3')
                                            <?php if (isset($item->overThreeOdds)) {
                                                $ttOdds = $ttOdds * $item->overThreeOdds;
                                            } ?>
                                        @elseif($keys=='acca')
                                            <?php if (isset($item->accaOdds)) {
                                                $ttOdds = $ttOdds * $item->accaOdds;
                                            } ?>
                                        @elseif($keys=='btts')
                                            <?php if (isset($item->bttsOdds)) {
                                                $ttOdds = $ttOdds * $item->bttsOdds;
                                            } ?>
                                        @elseif($keys=='ssingles')
                                            <?php if (isset($item->singleBetsOdds)) {
                                                $ttOdds = $ttOdds * $item->singleBetsOdds;
                                            } ?>
                                        @elseif($keys=='matchCorner')
                                            <?php if (isset($item->matchCornersOdds)) {
                                                $ttOdds = $ttOdds * $item->matchCornersOdds;
                                            } ?>
                                        @elseif($keys=='sure5')
                                            <?php if (isset($item->sure5OddsOdds)) {
                                                $ttOdds = $ttOdds * $item->sure5OddsOdds;
                                            } ?>
                                        @elseif($keys=='draws')
                                            <?php if (isset($item->drawsOdds)) {
                                                $ttOdds = $ttOdds * $item->drawsOdds;
                                            } ?>
                                        @elseif($keys=='wt')
                                            <?php if (isset($item->weekendTipsOdds)) {
                                                $ttOdds = $ttOdds * $item->weekendTipsOdds;
                                            } ?>
                                        @elseif($keys=='htft')
                                            <?php if (isset($item->HTFTOdds)) {
                                                $ttOdds = $ttOdds * $item->HTFTOdds;
                                            } ?>
                                        @elseif($keys=='cs')
                                            <?php if (isset($item->correctScoreOdds)) {
                                                $ttOdds = $ttOdds * $item->correctScoreOdds;
                                            } ?>
                                        @elseif($keys=='suInTip')
                                            <?php if (isset($item->superInvestmentOdds)) {
                                                $ttOdds = $ttOdds * $item->superInvestmentOdds;
                                            } ?>
                                        @endif --}}
                                    @endforeach
                                    {{-- @if ($keys == 'btts' || $keys == 'draws' || $keys == 'wt' || $keys == 'ov3' || $keys == 'htft' || $keys == 'cs' || $keys == 'acca' || $keys == 'ssingles' || $keys == 'matchCorner') --}}
                                    @if ($keys == 'btts' || $keys == 'draws' || $keys == 'wt' || $keys == 'ov3' || $keys == 'htft' || $keys == 'acca' || $keys == 'ssingles' || $keys == 'matchCorner')
                                    @else
                                        {{-- <tr>
                                            <td colspan="5" style="font-size: 16px;" class="text-success"><strong>Total Odds:</strong> {{$ttOdds}}</td>
                                        </tr> --}}
                                    @endif
                                    @if (isset($ct))
                                        <tr>
                                            <td colspan="5" class="btn-success">
                                                <h5>Code: <strong>{{ $ct->bookingCode }} -
                                                        ({{ $ct->bookMaker }})</strong></h5>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                
                            {{-- <div class="col-sm-12"><h3 class="text-primary badge" style="background-color: #000;"> Odd Value =  <strong style="font-size: 16px;" class="text-primary">{{number_format($ttOdds, 2)}}</strong> </h3></div> --}}
                        @else
                            <h4 class="alert alert-warning text-center"><i class="fa fa-spin fa-spinner"></i> Games
                                are loading! Please Check Back.</h4>
                        @endif
                        </div>
                        <div class="tab-pane" id="tomorrow" role="tabpanel" aria-labelledby="messages-tab">
                            @if (count($tm) > 0)
                            <table class="table table-striped smTableFontSize"
                                style="background-color: #f8f9f9; font-size: 14px; width: 100%; margin-top: -10px;">
                                <tbody>
                                    <tr style="height: 9px;">
                                        <td
                                            style="width: 8%; height: 9px;  text-align: center;">
                                            <span >TIME</span></td>
                                        <td
                                            style="width: 10%; height: 9px;  text-align: center;">
                                            <span >LEAG</span></td>
                                        <td
                                            style="width: 55%; height: 9px;  text-align: center;">
                                            <span >FIXTURE</span></td>
                                        <td
                                            style="width: 12%; height: 9px;  text-align: center;">
                                            <span >TIP</span></td>
                                        {{-- <td style="width: 12%; height: 9px; background-color: #024b30; text-align: center;"><span >ODD</span></td> --}}
                                    </tr>
                                    <?php $tmOdds = 1; ?>
                                    @foreach ($tm as $key => $item)
                                        <tr style="height: 3px;">
                                            <td style="height: 3px; text-align: center;"><span
                                                    style="color: #024b30;"><strong>{{ $item->gameTime }}</strong></span>
                                            </td>
                                            <td style="height: 3px;  text-align: center;">{{ $item->league }}</td>
                                            <td style="height: 3px; text-align: center;">
                                                {{ ucfirst($item->teamOne) }} <span
                                                    style="color: #024b30;"><strong>VS</strong></span>
                                                {{ ucfirst($item->teamTwo) }}</td>
                                            @if ($keys == 'sure2')
                                                <td class="text-center"><span>{{ $item->sure2OddsTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->sure2OddsOdds}}</span></td> --}}
                                            @elseif($keys=='sure3')
                                                <td class="text-center"><span>{{ $item->sure3OddsTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->sure3OddsOdds}}</span></td> --}}
                                            @elseif($keys=='sure5')
                                                <td class="text-center"><span>{{ $item->sure5OddsTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->sure5OddsOdds}}</span></td> --}}
                                            @elseif($keys=='draws')
                                                <td class="text-center"><span>{{ $item->drawsTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->drawsOdds}}</span></td> --}}
                                            @elseif($keys=='btts')
                                                <td class="text-center"><span>{{ $item->bttsTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->bttsOdds}}</span></td> --}}
                                            @elseif($keys=='matchCorner')
                                                <td class="text-center"><span>{{ $item->matchCornersTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->matchCornersOdds}}</span></td> --}}
                                            @elseif($keys=='ssingles')
                                                <td><span>{{ $item->singleBetsTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->singleBetsOdds}}</span></td> --}}
                                            @elseif($keys=='ov3')
                                                <td class="text-center"><span>{{ $item->overThree }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->overThreeOdds}}</span></td> --}}
                                            @elseif($keys=='htft')
                                                <td class="text-center"><span>{{ $item->HTFT }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->HTFTOdds}}</span></td> --}}
                                            @elseif($keys=='cs')
                                                <td class="text-center"><span>{{ $item->correctScoreTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->correctScoreOdds}}</span></td> --}}
                                            @elseif($keys=='wt')
                                                <td class="text-center"><span>{{ $item->weekendTipsTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->weekendTipsOdds}}</span></td> --}}
                                            @elseif($keys=='acca')
                                                <td class="text-center"><span>{{ $item->accaTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->accaOdds}}</span></td> --}}
                                            @elseif($keys=='suInTip')
                                                <td class="text-center"><span>{{ $item->superInvestmentTip }}</span></td>
                                                {{-- <td style="width: 9%; background-color: #013220; color: #ffffff"><span>{{$item->superInvestmentOdds}}</span></td> --}}
                                            @endif
                                        </tr>
                                        {{-- @if ($keys == 'sure2')
                                        <?php if (isset($item->sure2OddsOdds)) {
                                            $tmOdds = $tmOdds * $item->sure2OddsOdds;
                                        } ?>
                                        @elseif($keys=='sure3')
                                        <?php if (isset($item->sure3OddsOdds)) {
                                            $tmOdds = $tmOdds * $item->sure3OddsOdds;
                                        } ?>
                                        @elseif($keys=='ov3')
                                        <?php if (isset($item->overThreeOdds)) {
                                            $tmOdds = $tmOdds * $item->overThreeOdds;
                                        } ?>
                                        @elseif($keys=='acca')
                                        <?php if (isset($item->accaOdds)) {
                                            $tmOdds = $tmOdds * $item->accaOdds;
                                        } ?>
                                        @elseif($keys=='btts')
                                        <?php if (isset($item->bttsOdds)) {
                                            $tmOdds = $tmOdds * $item->bttsOdds;
                                        } ?>
                                        @elseif($keys=='ssingles')
                                        <?php if (isset($item->singleBetsOdds)) {
                                            $tmOdds = $tmOdds * $item->singleBetsOdds;
                                        } ?>
                                        @elseif($keys=='matchCorner')
                                        <?php if (isset($item->matchCornersOdds)) {
                                            $tmOdds = $tmOdds * $item->matchCornersOdds;
                                        } ?>
                                        @elseif($keys=='sure5')
                                        <?php if (isset($item->sure5OddsOdds)) {
                                            $tmOdds = $tmOdds * $item->sure5OddsOdds;
                                        } ?>
                                        @elseif($keys=='draws')
                                        <?php if (isset($item->drawsOdds)) {
                                            $tmOdds = $tmOdds * $item->drawsOdds;
                                        } ?>
                                        @elseif($keys=='wt')
                                        <?php if (isset($item->weekendTipsOdds)) {
                                            $tmOdds = $tmOdds * $item->weekendTipsOdds;
                                        } ?>
                                        @elseif($keys=='htft')
                                        <?php if (isset($item->HTFTOdds)) {
                                            $tmOdds = $tmOdds * $item->HTFTOdds;
                                        } ?>
                                        @elseif($keys=='cs')
                                        <?php if (isset($item->correctScoreOdds)) {
                                            $tmOdds = $tmOdds * $item->correctScoreOdds;
                                        } ?>
                                        @elseif($keys=='suInTip')
                                        <?php if (isset($item->superInvestmentOdds)) {
                                            $tmOdds = $tmOdds * $item->superInvestmentOdds;
                                        } ?>
                                        @endif --}}
                                    @endforeach
                                    {{-- @if ($keys == 'btts' || $keys == 'draws' || $keys == 'wt' || $keys == 'ov3' || $keys == 'htft' || $keys == 'cs' || $keys == 'acca' || $keys == 'ssingles' || $keys == 'matchCorner') --}}
                                    @if ($keys == 'btts' || $keys == 'draws' || $keys == 'wt' || $keys == 'ov3' || $keys == 'htft' || $keys == 'acca' || $keys == 'ssingles' || $keys == 'matchCorner')
                                    @else
                                        <tr>
                                            <td colspan="5" style="font-size: 16px;" class="text-success">
                                                <strong>Total Odds:</strong> {{ $tmOdds }}</td>
                                        </tr>
                                    @endif
                                    @if (isset($ctm))
                                        <tr>
                                            <td colspan="5" class="btn-success">
                                                <h5>Code: <strong>{{ $ctm->bookingCode }} -
                                                        ({{ $ctm->bookMaker }})</strong></h5>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{-- <div class="col-sm-12"><h3 class="text-primary badge" style="background-color: #000;"> Odd Value =  <strong style="font-size: 16px;" class="text-primary">{{number_format($tmOdds, 2)}}</strong> </h3></div> --}}
                        @else
                            <h4 class="alert alert-warning text-center"><i class="fa fa-spin fa-spinner"></i> Games
                                are loading! Please Check Back.</h4>
                        @endif
                        </div>
                       
                      </div>
                      
                      <script>
                        var firstTabEl = document.querySelector('#myTab li:last-child a')
                        var firstTab = new bootstrap.Tab(firstTabEl)
                      
                        firstTab.show()
                      </script>
    
                </div>
            </div>
    
    
    
    
        </div>
    
    </div>
    









@endsection

@section('levelJS') @endsection
