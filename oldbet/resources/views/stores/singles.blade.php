






@section('levelJS') @endsection
@extends('layout.master')
@section('name')
   Single Bets  -  Cleanodds.com
@endsection
@section('store')
    active
@endsection
@section('body')
   <!-- News Slider Area Start Here -->
   <?php

   $country = COUNTRYNAME;
   $announcements = \App\Announcement::all();

   ?>
        

        <section class="bg-body">
            <div class="container">
                <ul class="news-info-list text-center--md">

                    <li>
                        <i class="fa fa-calendar" aria-hidden="true"></i><span id="current_date"></span>
                    </li>

                </ul>
            </div>
        </section>


        <section class="bg-accent section-space-less2">
            <div class="container">

               @include('partial.cat_head',['title'=>'Single Bets'])
                  {{-- mobile ad --}}
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
      
                  ?>
              
                   
      
                  {{-- desktop only --}}
                  <div class="row">
                      @if (isset($ad1))
                      <div class="col-12 hideSM mb-10">
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
                      <div class="col-lg-4 col-md-12 hideLG mb-10">
                      
      
                                  <a  href="{{ $ad2->website }}" target="_blank">
                                  <img src="{{ $path }}/ads/{{ $ad2->ads_image }}" alt="news"
                                      class="img-fluid width-100">
                                  </a>
      
                      </div>
                      @endif
      
                  </div>
                <div class="row tab-space1">
              
                    <div class="col-sm-8 offset-sm-2 nopaddingsmall">


                         <ul class="nav nav-pills mb-3 mb-3 nav-justified " id="pills-tab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#home" role="tab" aria-controls="home" aria-selected="true">Yesterday</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Today</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#messages" role="tab" aria-controls="contact" aria-selected="false">Tomorrow</a>
                          </li>
                        </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane" id="home">
                                    @if(count($yy)>0)
                                        <table class="table table-bordered table-striped text-center" style="font-size: 13px;">
                                            <thead>
                                            <tr class="bg-dark text-white">
                                                <th><center>Time</center></th>
                                                <th><center>League</center></th>
                                                <th><center>Fixture</center></th>
                                                <th><center>Tip</center></th>
                                                <th><center>Result</center></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($yy as $key => $item)
                                                <tr>
                                                    <td>{{\Carbon\Carbon::parse($item->gameTime)->format('H:i')}}</td>
                                                    <td>{{$item->league}}</td>
                                                    <td>{{$item->teamOne}} <span class="mvs">VS</span> {{$item->teamTwo}}</td>
                                                    <td>{{$item->singleBets}}</td>
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

                                    @if(count($tt)>0)
                                        <table class="table table-bordered table-striped text-center" style="font-size: 13px;">
                                            <thead>
                                            <tr class="bg-dark text-white">
                                                <th><center>Time</center></th>
                                                <th><center>League</center></th>
                                                <th><center>Fixture</center></th>
                                                <th><center>Tip</center></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($tt as $key => $item)
                                                <tr>
                                                    <td>{{\Carbon\Carbon::parse($item->gameTime)->format('H:i')}}</td>
                                                    <td>{{$item->league}}</td>
                                                    <td>{{$item->teamOne}} <span class="mvs">VS</span> {{$item->teamTwo}}</td>
                                                    <td>{{$item->singleBets}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <p><center>Today's Tips are not available yet!</center></p>
                                    @endif

                                </div>
                                <div role="tabpanel" class="tab-pane" id="messages">
                                    @if(count($tm)>0)
                                        <table class="table table-bordered table-striped text-center" style="font-size: 13px;">
                                            <thead>
                                            <tr class="bg-dark text-white">
                                                <th><center>Time</center></th>
                                                <th><center>League</center></th>
                                                <th><center>Fixture</center></th>
                                                <th><center>Tip</center></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($tm as $key => $item)
                                                <tr>
                                                    <td>{{\Carbon\Carbon::parse($item->gameTime)->format('H:i')}}</td>
                                                    <td>{{$item->league}}</td>
                                                    <td>{{$item->teamOne}} <span class="mvs">VS</span> {{$item->teamTwo}}</td>
                                                    <td>{{$item->singleBets}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <p><center>Tomorrow's Tips are not available yet!</center></p>
                                    @endif
                                </div>
                            </div>

                        {{-- </div> --}}
                        <hr>

                    </div>
                    <div class="col-sm-12 text-justify mt-4">
                        <br><br>
                        <p>These are Football Predictions referred to selected matches that carry high odds (at least 1.50 odds) and can provide great value for the investor. However, they can be risky selections, so be careful when using multiple selections as part of an accumulator.</p>
                        <br><br>
                    </div>
                    <div class="col-sm-12">
                        @include('partial.store')
                    </div>
                </div>

                
            </div>

        </section>





@endsection
