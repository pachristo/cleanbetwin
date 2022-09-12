



@section('levelJS') @endsection
@extends('layout.master')
@section('name')
 Disclaimer  -  Cleanodds.com
@endsection
@section('disclaimer')
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

                @include('partial.cat_head',['title'=>'Disclaimer'])

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
                      {{-- <div class="col-12 hideSM mb-10">
                          <div class="ne-banner-layout1 mt-20-r text-center">
                              <a  href="{{ $ad1->website }}" target="_blank">
                                  <img
                                  src="{{ $path }}/ads/{{ $ad1->ads_image }}"  alt="ad"
                                      class="img-fluid">
                              </a>
                          </div>
                      </div> --}}
                      @endif
                      @if (isset($ad2))
                      {{-- mobile ad --}}
                      {{-- <div class="col-lg-4 col-md-12 hideLG mb-10">


                                  <a  href="{{ $ad2->website }}" target="_blank">
                                  <img src="{{ $path }}/ads/{{ $ad2->ads_image }}" alt="news"
                                      class="img-fluid width-100">
                                  </a>

                      </div> --}}
                      @endif

                  </div>

                <?php $testimonials = \App\Focus\Modules\Prediction\Model\Prediction::where('display', '0')->where('testimonial', '1')->where('testimonialValue', '!=', '')->orderBy('updated_at', 'DESC')->paginate(40)->onEachSide(2); ?>

                <div class="col-xl-12 col-12 ">


                    <p><strong>Cleanodds.com</strong>&nbsp;does not offer bookmaking or services related to bookmaking. In order to place tips, etc. you must access the bookmakers&rdquo; websites and comply with the bookmakers&rdquo; terms and conditions. Any sort of information posted on our site from other websites, persons or organizations should be checked for accuracy and timeliness at the sources themselves and no reliance should be placed on the same as it appears on our site. We also do not accept any responsibility or liability for the comments of our viewers as may be posted on certain pages, example: message boards. If you are offended or in any way adversely affected by such contents, please contact us immediately and refrain from visiting those pages. we are not liable to remove any offending messages on any pages within our site. Please enter at your own risk!</p>
<p><strong>Cleanodds.com</strong>&nbsp;is not responsible for any decisions made, financial or otherwise, based or information, emails or links provided in this website. Cleanodds.com does not guarantee winnings and cannot be held liable for losses resulting from the use of information obtained from here.</p>
<p><strong> Cleanodds.com</strong>&nbsp;works round the clock to grow your football tips bankroll. When you engage with our platform, you can rest assure that you see things from the lens of our informed experts. You need not waste your time and resources in endless searches for configured competitions , because none exist. All you need to do is tune in to our daily list of best football tips and smile to the land of consistent winnings.</p>
<p><strong>WARNING</strong>:&nbsp;Tips can be very risky and users should only speculate with money that they can comfortably afford to lose and should ensure that the risks involved are fully understood, seeking advice if necessary. we do not offer refunds on our products or services. By using picks and&nbsp; tips on CLEANODDS.COM website or any of our affiliate sites, pages, and subscribe on the website, you agree to be bound by and to comply with our Terms and Conditions;</p>
<p>Please if you do not accept the Terms, do not use the Website. If you are having any issue with the subscription or have any questions,&nbsp;you can <a href="{{ route('/contact_us') }}">contact us here</a>.</p>
                </div>

                    <br><br>
                </div>

            </div>

        </section>








@endsection
