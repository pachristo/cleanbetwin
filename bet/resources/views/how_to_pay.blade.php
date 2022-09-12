




@section('levelJS') @endsection
@extends('layout.master')
@section('name')
How To Pay   -  Cleanodds.com
@endsection
@section('vip')
  active
@endsection
@section('CSS')
<style>
select.form-control:not([size]):not([multiple]) {
    height: 44px;
    font-size: 1.3rem;
    border: 1px solid green;
}
</style>
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

                @include('partial.cat_head',['title'=>'How To Pay'])







                  <div class="col-sm-4 offset-sm-4 text-justify section-head">
                    <br>
                    <h2 style="color: black;" class="well">Set Your Country</h2>
                    <div class="clear"></div>
                    <p>Kindly select your country below to customize your payment options. (You will only do this once).
                    </p>
                    <hr>
                    <form action="{{ url('/select_country') }}" id="countryForm" method="get">
                        <div class="form-group">
                            <select name="COUNTRY" class="form-control crs-country" data-region-id="one"
                                data-default-value="@if (isset($country)) {{ $country }} @endif" required id=""></select>
                        </div>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <button class="btn btn-md btn-success btn-block" id="countryBtn">PROCEED <i
                                    class="fa fa-arrow-circle-o-right"></i></button>
                        </div>
                    </form>
                    <br><br>
                </div>


                <div class="col-sm-8  offset-sm-2"  style="background: #fff;  ">


                    @if (isset($COUNTRY))
                    @php
                        $country=$COUNTRY;
                    @endphp
                        <h3>Step-By-Step Approach</h3>
                        <ol type="1">
                            <li><strong>Register with "A VALID EMAIL ADDRESS":</strong>&nbsp;<br />The first thing you
                                need to do is to register your profile on the website by clicking on the "Register Here"
                                link, located at the&nbsp;head section of the website pages. Fill the form.
                              </li>
                            <li>Login into your account after registering. Click on the "See
                                Pricing"&nbsp;button&nbsp;under Current Plan,&nbsp;Then select any of the plans&nbsp;you
                                wish to pay for on the next page and proceed.<br /><br /></li>
                        </ol>
                        <p>Listed below are the different methods of payment available for your country:</p>

                        {{-- @if ($country == 'Nigeria') --}}



                        @if($country=='Kenya' || $country=='Uganda' || $country=='Ghana' ||$country=='Tanzania, United Republic of' || $country=='Rwanda'|| $country=='Zambia')

                            <p>&nbsp;</p>
                            <h4><strong>Pay with&nbsp;Mobile Money</strong></h4>
                            <ol type="1">

                                <li>All MTN Mobile  payments should be made ONLY to&nbsp;<strong><span
                                            style="color: #0000ff;">"256780430994"</span></strong></li>
                                            <li>All AIRTEL Mobile  payments should be made ONLY to&nbsp;<strong><span
                                                style="color: #0000ff;">"256751301852"</span></strong></li>


                                <li>After making deposits, send your Confirmation code, Registered E-mail and Amount
                                    paid as an E-mail to <strong><span
                                            style="color: #ff0000;">surecleanodds@gmail.com</span></strong> or through
                                    WhatsApp to <span style="color: #ff0000;"><strong>+256780430994</strong></span></li>
                                <li>Your Cleanodds account would be upgraded once payment is confirmed.</li>
                            </ol>
                            <p>Please do not&nbsp;call the number (<strong>WhatsApp Only</strong>), Go ahead and make
                                payment then send your details, your account will be upgraded.</p>
                            <p>&nbsp;</p>


                            <p>&nbsp;</p>
                            <h4><strong>Pay via&nbsp;Flutterwave</strong></h4>
                            <h4>{{ $country }} MOBILE MONEY</h4>
                            <ol>
                                <li>Choose "Pricing Plans" (Log in your Cleanodds Account)</li>
                                <li>Click on any of the displayed plans to subscribe for it</li>
                                <li>Locate&nbsp;"PAY WITH MOBILE MONEY" and click on the &ldquo;pay now&rdquo; button,
                                </li>
                                <li>Choose Network (MTN, AIRTEL TIGO or VODAFONE)&nbsp;</li>
                                <li>Insert your mobile number and click pay</li>
                                <li>Follow the steps on the next page as instructed</li>
                                <li>After making successful payment, you will be redirected back to the website and your
                                    Cleanodds account will be automatically upgraded to your selected plan for
                                    which you made payment.<br /><br /></li>
                            </ol>



                        @else

                        <p>&nbsp;</p>
                        <h4><strong>Pay via&nbsp;Flutterwave</strong></h4>
                        <h4>{{ $country }} MOBILE MONEY</h4>
                        <ol>
                            <li>Choose "Pricing Plans" (Log in your Cleanodds Account)</li>
                            <li>Click on any of the displayed plans to subscribe for it</li>
                            <li>Locate&nbsp;"PAY WITH CARD" and click on the &ldquo;pay now&rdquo; button,
                            </li>

                            <li>Insert your Card Details and click pay</li>
                            <li>Follow the steps on the next page as instructed</li>
                            <li>After making successful payment, you will be redirected back to the website and your
                                Cleanodds account will be automatically upgraded to your selected plan for
                                which you made payment.<br /><br /></li>
                        </ol>


                        @endif
                    @endif


                </div>


            </div>

        </section>








@endsection
@section('JS')
    <script>
        @php
        $url = '';
        @endphp
        $(document).ready(function() {
            $('#countryForm').submit(function(e) {
                e.preventDefault();
                $('#countryBtn').prop('disabled', true).html(
                    "SETTING COUNTRY <i class='fa fa-spinner fa-spin'></i>");
                var url = $(this).attr('action');
                var method = $(this).attr('method');
                var formData = $(this).serialize();

                $.ajax({
                    type: method,
                    url: url,
                    data: formData,
                    dataType: "JSON",
                    success: function(data) {
                        console.log(data);
                        if (data.status == 1) {
                            $('#countryBtn').prop('disabled', false).html(
                                "PROCEED <i class='fa fa-arrow-circle-right'></i>");
                            swal(data.post, '', 'warning');
                        } else {
                            window.location.href = data;
                        }
                    },
                    failure: function(e) {
                        swal('OOPS! SOMETHING IS BROKEN', 'Reloading Page', 'danger');
                        location.reload();
                    }
                })
            });
        });
    </script>
@endsection
