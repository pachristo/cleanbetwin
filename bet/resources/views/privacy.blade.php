



@section('levelJS') @endsection
@extends('layout.master')
@section('name')
  Privacy Policy   -  Cleanodds.com
@endsection
@section('policy')
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

                @include('partial.cat_head',['title'=>'Privacy Policy'])

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


                    <p>&nbsp;1.&nbsp;This privacy policy sets out how <strong>Cleanodds</strong> a <strong>Boom Service</strong> (U) Limited company (hereon referred to as Cleanodds) uses and protects any information that you give Cleanodds when you use this website.&nbsp;</p>
                    <p>2.&nbsp;<strong>Cleanodds</strong> is committed to ensuring that your privacy is protected. Should we ask you to provide certain information by which you can be identified when using this website, then you can be assured that it will only be used in accordance with this privacy statement.&nbsp;</p>
                    <p>3.&nbsp;<strong>Cleanodds</strong> may change this policy from time to time by updating this page. You should check this page from time to time to ensure that you are happy with any changes. This policy was effective from 02/November/2015.</p>
                    <p>4. What we collect We may collect the following information: Your name, your contact information including email address, Phone number and Date of Birth.&nbsp;</p>
                    <p>5.&nbsp;Other information relevant to customer surveys and/or offers What we do with the information we gather We require this information to understand your needs and provide you with a better service, and in particular for the following reasons:&nbsp;</p>
                    <p>6.&nbsp;Internal record keeping. We may periodically send emails and SMS consisting of our products and services using the email address and phone numbers which you have provided.&nbsp;</p>
                    <p>7.&nbsp;We may use the information to improve our products and services. We may periodically send promotional emails about new products, special offers or other information which we think you may find interesting using the email address which you have provided. From time to time, we may also use your information to contact you for market research purposes. We may contact you by email, phone or fax. We may use the information to customise the website according to your interests.&nbsp;</p>
                    <p>8. Security We are committed to ensuring that your information is secure. In order to prevent unauthorised access or disclosure, we have put in place suitable physical, electronic and managerial procedures to safeguard and secure the information we collect online.</p>
                    <p>9. Controlling your personal information You may choose to restrict the collection or use of your personal information in the following ways:&nbsp;</p>
                    <p>10.&nbsp;whenever you are asked to fill in a form on the website, look for the box that you can click to indicate that you do not want the information to be used by anybody for direct marketing purposes if you have previously agreed to us using your personal information for direct marketing purposes, you may change your mind at any time by writing to or emailing us at&nbsp;<a href="mailto:surecleanodds@gmail.com&nbsp;">surecleanodds@gmail.com&nbsp;</a>.</p>
                    <p>11.&nbsp;We will not sell, distribute or lease your personal information to third parties unless we have your permission or are required by law to do so. We may use your personal information to send you promotional information about third parties which we think you may find interesting if you tell us that you wish this to happen.&nbsp;</p>
                    <p>12.&nbsp;You may request details of personal information which we hold about you under the Data Protection Laws. If you believe that any information we are holding on you is incorrect or incomplete, please write to or email us as soon as possible at the above address. We will promptly correct any information found to be incorrect.</p>
                    <p>COMPANY REGISTRATION: <strong>80010000756743</strong></p>
                    <p>REGISTERED COMPANY ADDRESS Boom.UG house, Kampala, Uganda.</p>
                    <p>COPYRIGHT&copy;  {{ date('Y') }}&nbsp;BOOM SERVICES (U) LIMITED&nbsp;ALL RIGHTS RESERVED.</p>
                </div>

                    <br><br>
                </div>

            </div>

        </section>








@endsection
