@extends('app.layouts.master')
@section('dashboard')

@endsection

@section('title')
    Dashboard - Cleanodds.com
@endsection

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
    <div class="row">
        <div class="col-12 col-lg-4 mt-2">
            <div class="card shadow-sm border-0 overflow-hidden">
                <div class="card-body">
                    <div class="profile-avatar text-center">
                        <img src="@if (currentUser()->passport) {{ $localPath }}/users/{{ currentUser()->passport }} @else {{ $localPath }}/avatar.png @endif" class="rounded-circle shadow" width="100" height="100" alt="">
                    </div>

                    <div class="text-center mt-2">
                        <h5 class="mb-1 pale">{{ currentUser()->full_name }}</h5>
                        {{-- <p class="mb-0 text-secondary">Sydney, Australia</p> --}}
                    </div>
                    <hr>
                    <div class="text-start">

                        @if (activeUser())
                            <div class="panel-body text-center">
                                <h3>{{ currentUser()->sub->category }}</h3>
                                <span><strong>{{ currentUser()->sub->planName }} Plan</strong></span> <br>
                                <span>Date: <strong
                                        class="text-success">{{ \Carbon\Carbon::parse(currentUser()->date_subscribed)->format('d M, Y @ h:ia') }}</strong></span>
                                <br>
                                <span>Expiry: <strong
                                        class="text-danger">{{ \Carbon\Carbon::parse(currentUser()->next_due_date)->format('d M, Y @ h:ia') }}</strong></span>
                            </div>
                            <div class="panel-footer text-center">
                                <style>
                                    .blink_text {
                                        animation: blink 2s infinite;
                                    }

                                    @keyframes blink {
                                        0% {
                                            opacity: 1.0;
                                        }

                                        50% {
                                            opacity: 0.0;
                                        }

                                        100% {
                                            opacity: 1.0;
                                        }
                                    }

                                </style>
                                <center>

                                </center>
                            </div>

                        @else
                            <div class="panel-body text-center">
                                <center>
                                    <h6 class="text-danger">Your subcription status is currently Inactive</h6>
                                    @if (currentUser()->sub_count > 0)
                                        <h6 class="text-warning text-capitalize">
                                            <strong>{{ currentUser()->sub->category }}
                                                Plan ({{ currentUser()->sub->planName }})</strong> Expired
                                            <strong>{{ \Carbon\Carbon::parse(currentUser()->next_due_date)->format('d M, Y @ h:ia') }}</strong>
                                        </h6>
                                    @endif

                                </center>
                            </div>

                            <ul class="list-group bg-dark">
                                <li class="list-group-item"><a href="{{ route('/vip_packages') }}"><button
                                            class="btn btn-md btn-primary btn-block">Click to join Vip <i
                                                class="fa fa-futbol-o" aria-hidden="true"></i></button></a></li>
                            </ul>
                        @endif

                    </div>

                </div>
            </div>
        </div>
         @if (activeUser())
        <div class="col-12 col-lg-8 mt-2 nopaddingsmall">
           <div class="card shadow-sm border-0 overflow-hidden">
            <div class="card-body px-0">
    
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
                                style="background-color: #f8f9f9; font-size: 13px; width: 100%; margin-top: -10px;">
                                <tbody>
                                    <tr style="height: 9px; " class="text-black font-open">
                                        <td
                                            style="width: 8%; height: 9px;  text-align: center;">
                                            <span >Time</span></td>
                                        <td
                                            style="width: 10%; height: 9px; ; text-align: center;">
                                            <span >Leag</span></td>
                                        <td
                                            style="width: 55%; height: 9px;; text-align: center;">
                                            <span >Fixture</span></td>
                                        <td
                                            style="width: 12%; height: 9px;  text-align: center;">
                                            <span >Tip</span></td>
                                         <td style="width: 12%; height: 9px; background-color: #024b30; text-align: center;color:white;"><span >Odds</span></td> 
                                        <td
                                            style="width: 15%; height: 9px;  text-align: center;">
                                            <span >Rslt</span></td>
                                    </tr>
                                    <?php $yyOdds = 1; ?>
                                    @foreach ($yy as $key => $item)
                                        <tr style="height: 3px;">
                                            <td style="height: 3px; text-align: center;"><span
                                                    style="color: #024b30;"><strong>{{ $item->gameTime }}</strong></span>
                                            </td>
                                            <td style="height: 3px;  text-align: center;">{{ $item->league }}</td>
                                            <td style="height: 3px; text-align: center;    padding: 5px 2px;">{{ ucfirst($item->teamOne) }}
                                                <span style="color: #024b30;"><strong>VS</strong></span>
                                                {{ ucfirst($item->teamTwo) }}</td>
                                            @if ($keys == 'sure2')
                                                <td class="text-center"><span>{{ $item->sure2OddsTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->sure2OddsOdds}}</span></td> 
                                            @elseif($keys=='sure3')
                                                <td class="text-center"><span>{{ $item->sure3OddsTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->sure3OddsOdds}}</span></td> 
                                            @elseif($keys=='sure5')
                                                <td><span>{{ $item->sure5OddsTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->sure5OddsOdds}}</span></td> 
                                            @elseif($keys=='draws')
                                                <td class="text-center"><span>{{ $item->drawsTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->drawsOdds}}</span></td> 
                                            @elseif($keys=='btts')
                                                <td class="text-center"><span>{{ $item->bttsTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->bttsOdds}}</span></td> 
                                            @elseif($keys=='matchCorner')
                                                <td class="text-center"><span>{{ $item->matchCornersTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->matchCornersOdds}}</span></td> 
                                            @elseif($keys=='ssingles')
                                                <td class="text-center"><span>{{ $item->singleBetsTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->singleBetsOdds}}</span></td> 
                                            @elseif($keys=='ov3')
                                                <td class="text-center"><span>{{ $item->overThree }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->overThreeOdds}}</span></td> 
                                            @elseif($keys=='htft')
                                                <td class="text-center"><span>{{ $item->HTFT }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->HTFTOdds}}</span></td> 
                                            @elseif($keys=='cs')
                                                <td><span>{{ $item->correctScoreTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->correctScoreOdds}}</span></td> 
                                            @elseif($keys=='wt')
                                                <td><span>{{ $item->weekendTipsTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->weekendTipsOdds}}</span></td> 
                                            @elseif($keys=='acca')
                                                <td  class="text-center"><span>{{ $item->accaTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->accaOdds}}</span></td> 
                                           
                                           
                                                @elseif($keys == 'tvt')
                                                <td class="text-center"><span>{{ $item->tvtTips }}</span>
                                                </td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->tvtOdds}}</span></td> 

                                            @elseif($keys == 'tvvt')
                                                <td class="text-center"><span>{{ $item->tvvtTips }}</span>
                                                </td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->tvvtOdds}}</span></td> 
                                            @elseif($keys == 'tot')
                                                <td class="text-center"><span>{{ $item->totTips }}</span>
                                                </td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->totOdds}}</span></td> 
                                            @elseif($keys == 'sunvt')
                                                <td class="text-center">
                                                    <span>{{ $item->sunvtTips }}</span>
                                                </td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->sunvtOdds}}</span></td> 

                                            @elseif($keys == 'satvt')
                                                <td class="text-center">
                                                    <span>{{ $item->satvtTips }}</span>
                                                </td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->satvtOdds}}</span></td> 
                                            @elseif($keys == 'frivt')
                                                <td class="text-center">
                                                    <span>{{ $item->frivtTips }}</span>
                                                </td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->frivtOdds}}</span></td> 

                                                @elseif($keys=='suInTip')
                                                <td class="text-center"><span>{{ $item->superInvestmentTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->superInvestmentOdds}}</span></td> 
                                            @endif
                
                                            <td class="text-center">{{ $item->teamOneScore }}:{{ $item->teamTwoScore }}
                                            </td>
                                        </tr>
                
                                         @if ($keys == 'sure2')
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

                                            
                                             @elseif($keys=='tvt')
                                                                                    
                                            <?php if (isset($item->tvtOdds)) {
                                                $yyOdds = $yyOdds * $item->tvtOdds;
                                            } ?>                                        
                                                                                    @elseif($keys=='tvvt')
                                                                                    
                                              <?php if (isset($item->tvvtOdds)) {
                                                  $yyOdds = $yyOdds * $item->tvvtOdds;
                                              } ?>                                        
                                                                                     @elseif($keys=='tot')
                                                 <?php if (isset($item->totOdds)) {
                                                   $yyOdds = $yyOdds * $item->totOdds;
                                               } ?>
                                                                                  
                                                                                      @elseif($keys=='frivt')
                                                                                      
                                                                                      
                                                  <?php if (isset($item->frivtOdds)) {
                                                $yyOdds = $yyOdds * $item->frivtOdds;
                                            } ?>                                     
                                                                                     @elseif($keys=='satvt')
                                             <?php if (isset($item->satvtOdds)) {
                                                $yyOdds = $yyOdds * $item->satvtOdds;
                                            } ?>                                       
                                                                                      @elseif($keys=='sunvt')
                                            
                                            
                                            
                                            
                                            
                                            
                                            <?php if (isset($item->sunvtOdds)) {
                                                $yyOdds = $yyOdds * $item->sunvtOdds;
                                            } ?>
                                        @endif 
                                    @endforeach
                                   
                
                                    @if ($keys == 'btts' || $keys == 'draws' || $keys == 'wt' || $keys == 'ov3' || $keys == 'htft' || $keys == 'acca' || $keys == 'ssingles' || $keys == 'matchCorner')
                                    @else
                                         <tr>
                                            <td colspan="5" style="font-size: 16px;text-align:right;" class="text-success"><strong>Total Odds:</strong> {{number_format($yyOdds,2)}}</td>
                                        </tr> 
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
                
                        @else
                            <h4 class="alert alert-warning text-center"><i
                                    class="fa fa-times-circle text-danger"></i>We had no tips here yesterday!.</h4>
                        @endif
                        </div>
                        <div class="tab-pane active" id="today" role="tabpanel" aria-labelledby="profile-tab">
                            @if (count($tt) > 0)
                            <table class="table table-striped smTableFontSize"
                                style="background-color: #f8f9f9; font-size: 13px; width: 100%; margin-top: -10px;">
                                <tbody>
                                    <tr style="height: 9px;">
                                        <td
                                            style="width: 8%; height: 9px;  text-align: center;">
                                            <span >Time</span></td>
                                        <td
                                            style="width: 10%; height: 9px; text-align: center;">
                                            <span >Leag</span></td>
                                        <td
                                            style="width: 55%; height: 9px;  text-align: center;">
                                            <span >Fixture</span></td>
                                        <td
                                            style="width: 12%; height: 9px;  text-align: center;">
                                            <span >Tip</span></td>
                                         <td style="width: 12%; height: 9px; background-color: #024b30; text-align: center;color:white;"><span >Odd</span></td> 
                                    </tr>
                                    <?php $ttOdds = 1; ?>
                                    @foreach ($tt as $key => $item)
                                        <tr style="height: 3px;">
                                            <td style="height: 3px; text-align: center;"><span
                                                    style="color: #024b30;"><strong>{{ $item->gameTime }}</strong></span>
                                            </td>
                                            <td style="height: 3px;  text-align: center;">{{ $item->league }}</td>
                                            <td style="height: 3px; text-align: center;    padding: 5px 2px;">
                                                {{ ucfirst($item->teamOne) }} <span
                                                    style="color: #024b30;"><strong>VS</strong></span>
                                                {{ ucfirst($item->teamTwo) }}</td>
                                            @if ($keys == 'sure2')
                                                <td class="text-center"><span>{{ $item->sure2OddsTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->sure2OddsOdds}}</span></td> 
                                            @elseif($keys=='sure3')
                                                <td class="text-center"><span>{{ $item->sure3OddsTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->sure3OddsOdds}}</span></td> 
                                            @elseif($keys=='sure5')
                                                <td class="text-center"><span>{{ $item->sure5OddsTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->sure5OddsOdds}}</span></td> 
                                            @elseif($keys=='draws')
                                                <td class="text-center"><span>{{ $item->drawsTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->drawsOdds}}</span></td> 
                                            @elseif($keys=='btts')
                                                <td class="text-center"><span>{{ $item->bttsTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->bttsOdds}}</span></td> 
                                            @elseif($keys=='matchCorner')
                                                <td class="text-center"><span>{{ $item->matchCornersTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->matchCornersOdds}}</span></td> 
                                            @elseif($keys=='ssingles')
                                                <td class="text-center"><span>{{ $item->singleBetsTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->singleBetsOdds}}</span></td> 
                                            @elseif($keys=='ov3')
                                                <td class="text-center"><span>{{ $item->overThree }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->overThreeOdds}}</span></td> 
                                            @elseif($keys=='htft')
                                                <td class="text-center"><span>{{ $item->HTFT }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->HTFTOdds}}</span></td> 
                                            @elseif($keys=='cs')
                                                <td class="text-center"><span>{{ $item->correctScoreTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->correctScoreOdds}}</span></td> 
                                            @elseif($keys=='wt')
                                                <td class="text-center"><span>{{ $item->weekendTipsTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->weekendTipsOdds}}</span></td> 
                                            @elseif($keys=='acca')
                                                <td class="text-center"><span>{{ $item->accaTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->accaOdds}}</span></td> 
                                          
                                                @elseif($keys == 'tvt')
                                                <td class="text-center"><span>{{ $item->tvtTips }}</span>
                                                </td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->tvtOdds}}</span></td> 

                                            @elseif($keys == 'tvvt')
                                                <td class="text-center"><span>{{ $item->tvvtTips }}</span>
                                                </td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->tvvtOdds}}</span></td> 
                                            @elseif($keys == 'tot')
                                                <td class="text-center"><span>{{ $item->totTips }}</span>
                                                </td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->totOdds}}</span></td> 
                                            @elseif($keys == 'sunvt')
                                                <td class="text-center">
                                                    <span>{{ $item->sunvtTips }}</span>
                                                </td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->sunvtOdds}}</span></td> 

                                            @elseif($keys == 'satvt')
                                                <td class="text-center">
                                                    <span>{{ $item->satvtTips }}</span>
                                                </td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->satvtOdds}}</span></td> 
                                            @elseif($keys == 'frivt')
                                                <td class="text-center">
                                                    <span>{{ $item->frivtTips }}</span>
                                                </td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->frivtOdds}}</span></td> 

                                          
                                                @elseif($keys=='suInTip')
                                                <td class="text-center"><span>{{ $item->superInvestmentTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->superInvestmentOdds}}</span></td> 
                                            @endif
                                        </tr>
                                         @if ($keys == 'sure2')
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

                                        @elseif($keys=='tvt')
                                        
                                           <?php if (isset($item->tvtOdds)) {
                                            $ttOdds = $ttOdds * $item->tvtOdds;
                                            // dd($item->tvtOdds);
                                        } ?>
                                        @elseif($keys=='tvvt')
                                         <?php if (isset($item->tvvtOdds)) {
                                              $ttOdds = $ttOdds * $item->tvvtOdds;
                                          } ?>
                                        
                                         @elseif($keys=='tot')
                                         <?php if (isset($item->totOdds)) {
                                               $ttOdds = $ttOdds * $item->totOdds;
                                           } ?>
                                          @elseif($keys=='frivt')
                                          
                                          <?php if (isset($item->frivtOdds)) {
                                            $ttOdds = $ttOdds * $item->frivtOdds;
                                        } ?>
                                           
                                         @elseif($keys=='satvt')
                                           <?php if (isset($item->satvtOdds)) {
                                            $ttOdds = $ttOdds * $item->satvtOdds;
                                        } ?>
                                          @elseif($keys=='sunvt')
                                        
                                     
                                         
                                          


                                        
                                     
                                        <?php if (isset($item->sunvtOdds)) {
                                            $ttOdds = $ttOdds * $item->sunvtOdds;
                                        } ?>
                                        @endif 
                                    @endforeach
                                   
                                    @if ($keys == 'btts' || $keys == 'draws' || $keys == 'wt' || $keys == 'ov3' || $keys == 'htft' || $keys == 'acca' || $keys == 'ssingles' || $keys == 'matchCorner')
                                    @else
                                         <tr>
                                            <td colspan="5" style="font-size: 16px;text-align:right;" class="text-success"><strong>Total Odds:</strong> {{number_format($ttOdds,2)}}</td>
                                        </tr> 
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
                
                       
                        @else
                            <h4 class="alert alert-warning text-center"><i class="fa fa-spin fa-spinner"></i> Games
                                are loading! Please Check Back.</h4>
                        @endif
                        </div>
                        <div class="tab-pane" id="tomorrow" role="tabpanel" aria-labelledby="messages-tab">
                            @if (count($tm) > 0)
                            <table class="table table-striped smTableFontSize"
                                style="background-color: #f8f9f9; font-size: 13px; width: 100%; margin-top: -10px;">
                                <tbody>
                                    <tr style="height: 9px;">
                                        <td
                                            style="width: 8%; height: 9px;  text-align: center;">
                                            <span >Time</span></td>
                                        <td
                                            style="width: 10%; height: 9px;  text-align: center;">
                                            <span >Leag</span></td>
                                        <td
                                            style="width: 55%; height: 9px;  text-align: center;">
                                            <span >Fixture</span></td>
                                        <td
                                            style="width: 12%; height: 9px;  text-align: center;">
                                            <span >Tip</span></td>
                                         <td style="width: 12%; height: 9px; background-color: #024b30; text-align: center;color:white;"><span >Odd</span></td> 
                                    </tr>
                                    <?php $tmOdds = 1; ?>
                                    @foreach ($tm as $key => $item)
                                        <tr style="height: 3px;">
                                            <td style="height: 3px; text-align: center;"><span
                                                    style="color: #024b30;"><strong>{{ $item->gameTime }}</strong></span>
                                            </td>
                                            <td style="height: 3px;  text-align: center;">{{ $item->league }}</td>
                                            <td style="height: 3px; text-align: center;    padding: 5px 2px;">
                                                {{ ucfirst($item->teamOne) }} <span
                                                    style="color: #024b30;"><strong>VS</strong></span>
                                                {{ ucfirst($item->teamTwo) }}</td>
                                            @if ($keys == 'sure2')
                                                <td class="text-center"><span>{{ $item->sure2OddsTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->sure2OddsOdds}}</span></td> 
                                            @elseif($keys=='sure3')
                                                <td class="text-center"><span>{{ $item->sure3OddsTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->sure3OddsOdds}}</span></td> 
                                            @elseif($keys=='sure5')
                                                <td class="text-center"><span>{{ $item->sure5OddsTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->sure5OddsOdds}}</span></td> 
                                            @elseif($keys=='draws')
                                                <td class="text-center"><span>{{ $item->drawsTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->drawsOdds}}</span></td> 
                                            @elseif($keys=='btts')
                                                <td class="text-center"><span>{{ $item->bttsTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->bttsOdds}}</span></td> 
                                            @elseif($keys=='matchCorner')
                                                <td class="text-center"><span>{{ $item->matchCornersTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->matchCornersOdds}}</span></td> 
                                            @elseif($keys=='ssingles')
                                                <td><span>{{ $item->singleBetsTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->singleBetsOdds}}</span></td> 
                                            @elseif($keys=='ov3')
                                                <td class="text-center"><span>{{ $item->overThree }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->overThreeOdds}}</span></td> 
                                            @elseif($keys=='htft')
                                                <td class="text-center"><span>{{ $item->HTFT }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->HTFTOdds}}</span></td> 
                                            @elseif($keys=='cs')
                                                <td class="text-center"><span>{{ $item->correctScoreTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->correctScoreOdds}}</span></td> 
                                            @elseif($keys=='wt')
                                                <td class="text-center"><span>{{ $item->weekendTipsTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->weekendTipsOdds}}</span></td> 
                                            @elseif($keys=='acca')
                                                <td class="text-center"><span>{{ $item->accaTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->accaOdds}}</span></td> 
                                           
                                                @elseif($keys == 'tvt')
                                                <td class="text-center"><span>{{ $item->tvtTips }}</span>
                                                </td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->tvtOdds}}</span></td> 

                                            @elseif($keys == 'tvvt')
                                                <td class="text-center"><span>{{ $item->tvvtTips }}</span>
                                                </td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->tvvtOdds}}</span></td> 
                                            @elseif($keys == 'tot')
                                                <td class="text-center"><span>{{ $item->totTips }}</span>
                                                </td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->totOdds}}</span></td> 
                                            @elseif($keys == 'sunvt')
                                                <td class="text-center">
                                                    <span>{{ $item->sunvtTips }}</span>
                                                </td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->sunvtOdds}}</span></td> 

                                            @elseif($keys == 'satvt')
                                                <td class="text-center">
                                                    <span>{{ $item->satvtTips }}</span>
                                                </td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->satvtOdds}}</span></td> 
                                            @elseif($keys == 'frivt')
                                                <td class="text-center">
                                                    <span>{{ $item->frivtTips }}</span>
                                                </td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->frivtOdds}}</span></td> 

                                           
                                           
                                                @elseif($keys=='suInTip')
                                                <td class="text-center"><span>{{ $item->superInvestmentTip }}</span></td>
                                                 <td style="width: 9%; background-color: #013220; color: #ffffff;text-align:center"><span>{{$item->superInvestmentOdds}}</span></td> 
                                            @endif
                                        </tr>
                                         @if ($keys == 'sure2')
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

                                        
                                         @elseif($keys=='tvt')
                                                                                
                                                 <?php if (isset($item->tvtOdds)) {
                                            $tmOdds = $tmOdds * $item->tvtOdds;
                                        } ?>                               
                                                                                @elseif($keys=='tvvt')
                                                                                  <?php if (isset($item->tvvtOdds)) {
                                              $tmOdds = $tmOdds * $item->tvvtOdds;
                                          } ?>
                                                                                
                                                                                 @elseif($keys=='tot')
                                                                                  <?php if (isset($item->totOdds)) {
                                               $tmOdds = $tmOdds * $item->totOdds;
                                           } ?>
                                                                                  @elseif($keys=='frivt')
                                                                                  
                                                                                  <?php if (isset($item->frivtOdds)) {
                                            $tmOdds = $tmOdds * $item->frivtOdds;
                                        } ?>
                                                                                   
                                                                                 @elseif($keys=='satvt')
                                                                                <?php if (isset($item->satvtOdds)) {
                                            $tmOdds = $tmOdds * $item->satvtOdds;
                                        } ?>
                                                                                  @elseif($keys=='sunvt')
                                        
                                        
                                        
                                         
                                        
                                        
                                        
                                        
                                        <?php if (isset($item->sunvtOdds)) {
                                            $tmOdds = $tmOdds * $item->sunvtOdds;
                                        } ?>
                                        @endif 
                                    @endforeach
                                 
                                    @if ($keys == 'btts' || $keys == 'draws' || $keys == 'wt' || $keys == 'ov3' || $keys == 'htft' || $keys == 'acca' || $keys == 'ssingles' || $keys == 'matchCorner')
                                    @else
                                        <tr>
                                            <td colspan="5" style="font-size: 16px;text-align:right;" class="text-success">
                                                <strong>Total Odds:</strong> {{ number_format($tmOdds,2) }}</td> 
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
                             {{--<div class="col-sm-12"><h3 class="text-primary badge" style="background-color: #000;"> Odd Value =  <strong style="font-size: 16px;" class="text-primary">{{number_format($tmOdds, 2)}}</strong> </h3></div> --}}
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
        @else
        <div class="col-lg-8 mt-2  py-2 tipstore-bg" style="    background: #f5c722;">

    @include('partial.mega_vip')
</div>
        @endif

    </div>
    {{-- <div class="alert alert-success text-center"><h5>error some where </h5></div> --}}








    <!--end page main-->


@endsection
