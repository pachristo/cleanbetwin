



@section('levelJS') @endsection
@extends('layout.master')
@section('name')
  Recent Winnings   -  Cleanodds.com
@endsection
@section('winning')
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



        <section class="bg-accent section-space-default">
            <div class="container">

                @include('partial.cat_head',['title'=>'Recent Winnings'])

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

                <?php $testimonials = \App\Focus\Modules\Prediction\Model\Prediction::where('display', '0')->where('testimonial', '1')->where('testimonialValue', '!=', '')->orderBy('updated_at', 'DESC')->paginate(40)->onEachSide(2); ?>

                <div class="col-xl-12 col-12 ">
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
                                    <td><strong
                                        class=" @if ($item->free_status == '1') text-success @elseif($item->free_status == '2' || $item->free_status == '3') text-danger @endif">
                                        @if ($item->free_status == '3' || $item->teamOneScore == 'pstp')
                                            pstp
                                            @else{{ $item->teamOneScore }}:{{ $item->teamTwoScore }}
                                        @endif
                                    </strong>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="alert alert-warning text-center w-100">NO Winnings YET</p>
                    @endif

                        <hr>
                        <div class="flex-wrap">

                       {!! $testimonials->render() !!}

                        </div>

                    <br><br>
                </div>

            </div>

        </section>








@endsection
