@section('levelJS') @endsection
@extends('layout.master')
@section('name')
    Tips Store - Cleanodds.com
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



    <section class="bg-accent section-space-default">
        <div class="container">

            @include('partial.cat_head',['title'=>'Tips Categories'])

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
                <div class="col-lg-4 col-md-12 hideLG">
                    <div class="row tab-space1">

                        <div class="col-sm-12 col-12 mb-10">
                            <a  href="{{ $ad2->website }}" target="_blank">
                            <img src="{{ $path }}/ads/{{ $ad2->ads_image }}" alt="news"
                                class="img-fluid width-100">
                            </a>

                        </div>

                    </div>
                </div>
                @endif
                @if (isset($cad1))
                <div class="col-12 hideSM mb-10">
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

            <div class="col-lg-12  tipstore-bg">
                {{-- @include('partial.store') --}}
                @include('partial.mega_vip')
            </div>

        </div>

    </section>








@endsection
