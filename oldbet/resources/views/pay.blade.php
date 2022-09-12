@extends('layout.master')
@section('name')
    {{ $sub->category }} Plan - Cleanodds.com
@endsection
@section('vip')
    active
@endsection

@section('body')
    <!-- News Slider Area Start Here -->
    <?php

    $country = COUNTRYNAME;
    $announcements = \App\Announcement::all();

    ?>
    <style>
        .text-primary {
            color: #ee342a !important;
            text-decoration: none;
            background-color: transparent;
            -webkit-text-decoration-skip: objects;
        }

        blockquote {
            display: inline-block;
            padding: 15px 15px 4px 72px;
            position: relative;
            font-size: 16px;
            line-height: 24px;
            font-style: italic;
            border-left: 3px solid #051b0b;
        }

    </style>

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

            <h2 class="header" style="    text-align: center;
                border-bottom: 2px dotted #2ca745;
                padding: 2px 35px;
            ">
                {{ $sub->planName }} <strong>{{ $sub->category }} </strong> ( @if (currentUser()->country == 'Nigeria')
                    N{{ number_format($sub->nairaPrice) }}
                @elseif(currentUser()->country=='Kenya')
                    {{ number_format($sub->keshPrice) }} KSH
                @elseif(currentUser()->country=='Uganda')
                    {{ number_format($sub->ugxPrice) }} UGX
                @elseif(currentUser()->country=='Tanzania, United Republic of')
                    {{ number_format($sub->tzsPrice) }} TZS
                @elseif(currentUser()->country=='Ghana')
                    {{ number_format($sub->cedPrice) }} GHS
                @elseif(currentUser()->country=='South Africa')
                    {{ number_format($sub->zarPrice) }} ZAR
                @elseif(currentUser()->country=='Zambia')
                    {{ number_format($sub->zmwPrice) }} ZMW
                @else
                    ${{ number_format($sub->dollarPrice) }}
                @endif
                /
                {{ $sub->accessTime }})
            </h2>




            <div class="col-lg-12 nopaddingsmall ">

                <section>
                    <div class="container"
                        style="background: #fff; padding: 20px 15px; margin-bottom: 20px; margin-top: 20px;">
                        <div class="row">
                            <div class="col-sm-8 offset-sm-2 text-center nopaddingsmall">
                                <blockquote>Payment methods available in <strong
                                        style="color: green;">{{ currentUser()->country }}</strong>
                                    <br><small>Not your country? <a class="text-primary"
                                            href="{{ route('/country') }}">Change Here</a></small>
                                </blockquote>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="col-sm-12 pay-header" style="
                                              font-weight: 900;
                                            background: linear-gradient(
                                        45deg, #051b0b, #25c532c9);
                                            color: white;
                                            border-radius: 20px;">
                                            @if (currentUser()->country == 'Kenya')
                                                PAY ONLINE WITH MPESA
                                            @elseif(currentUser()->country=='Uganda' || currentUser()->country=='Ghana'
                                                || currentUser()->country=='Tanzania, United Republic of' ||
                                                currentUser()->country=='Zambia' )
                                                PAY WITH MOBILE MONEY
                                            @elseif(currentUser()->country=='South Africa')
                                                PAY WITH YOUR BANK OR ATM CARD
                                            @elseif(currentUser()->country=='Nigeria')
                                                PAY WITH YOUR BANK OR ATM CARD



                                            @else
                                                MAKE PAYMENT WITH CARD
                                            @endif
                                        </div>
                                        <div class="col-sm-12 pay-body nopaddingsmall">
                                            <center>
                                                @if (currentUser()->country == 'Kenya')
                                                    <img src="{{ asset('images/M-Pesa-Logo.png') }}"
                                                        class="img-responsive" alt="PAY WITH MPESA"
                                                        style="margin-bottom: 4px; max-height: 120px;">
                                                @elseif(currentUser()->country=='Uganda')
                                                    <img src="{{ asset('images/ugx.jpg') }}" class="img-responsive"
                                                        alt="PAY WITH MOBILE MONEY" style="margin-bottom: 4px;">
                                                @elseif(currentUser()->country=='Ghana')
                                                    <img src="{{ asset('images/ghcmobile.png') }}" class="img-responsive"
                                                        alt="PAY WITH MOBILE MONEY" style="margin-bottom: 4px;">
                                                @elseif(currentUser()->country=='Zambia')
                                                    <img src="{{ asset('img/mtn_zmw.png') }}" class="img-responsive"
                                                        alt="PAY WITH MOBILE MONEY" style="margin-bottom: 4px;">

                                                @elseif(currentUser()->country=='Tanzania, United Republic of')
                                                    <img src="{{ asset('images/pesa-share.png') }}"
                                                        class="img-responsive" alt="PAY WITH MOBILE MONEY"
                                                        style="margin-bottom: 4px; max-height: 150px;">
                                                @elseif(currentUser()->country=='South Africa')
                                                    <img src="{{ asset('images/paywithbank.png') }}"
                                                        class="img-responsive" alt="PAY WITH CARD OR BANK"
                                                        style="margin-bottom: 4px; max-height: 150px;">
                                                @else
                                                    <img src="{{ asset('images/flutterwave.png') }}"
                                                        class="img-responsive" alt="PAY WITH ATM CARD OR BANK"
                                                        style="margin-bottom: 4px;">
                                                @endif
                                            </center>
                                            <center>
                                                <h6> <strong></strong>YOUR ACCOUNT WILL BE ACTIVATED AUTOMATICALLY AFTER
                                                    SUCCESSFUL
                                                    TRANSACTION</strong></h6>
                                            </center>
                                        </div>
                                        <div class="col-sm-6 offset-lg-3 pay-bottom">

                                            <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>

                                            <button onClick="payWithRave()" class="btn btn-success btn-md width-100">
                                                PAY
                                                @if (currentUser()->country == 'Nigeria')
                                                    N{{ number_format($sub->nairaPrice) }}
                                                @elseif(currentUser()->country=='Kenya')
                                                    {{ number_format($sub->keshPrice) }} KSH
                                                @elseif(currentUser()->country=='Uganda')
                                                    {{ number_format($sub->ugxPrice) }} UGX
                                                @elseif(currentUser()->country=='Tanzania, United Republic of')
                                                    {{ number_format($sub->tzsPrice) }} TZS
                                                @elseif(currentUser()->country=='Ghana')
                                                    {{ number_format($sub->cedPrice) }} GHS
                                                @elseif(currentUser()->country=='South Africa')
                                                    {{ number_format($sub->zarPrice) }} ZAR
                                                @elseif(currentUser()->country=='Zambia')
                                                    {{ number_format($sub->zarPrice) }} ZMW
                                                @else
                                                    ${{ number_format($sub->dollarPrice) }}
                                                @endif
                                            </button>
                                        </div>
                                    </div>

                                    @if(currentUser()->country=='Kenya' || currentUser()->country=='Uganda' ||currentUser()->country=='Tanzania, United Republic of' || currentUser()->country=='Rwanda'|| currentUser()->country=='Zambia' || currentUser()->country=='Ghana')
                                    <div class="col-sm-12">
                                        <br><br>

                                        <div class="col-sm-12 pay-header" style="
                                            font-weight: 900;
                                          background: linear-gradient(
                                      45deg, #051b0b, #25c532c9);
                                          color: white;
                                          border-radius: 20px;">MOBILE MONEY</div>
                                        <div class="col-sm-12 pay-body">
                                            <center><img src="{{ asset('images/M-Pesa-Logo.png') }}" class="img-responsive"
                                                    alt="MPesa" style="    height: 58px;
                                                    margin-top: 4px;"></center>
                                            <div class="col-sm-12">
                                                <ol type="1" style="color: black;">


                                                    <li>For MTN Users please make your payment To this mobile number
                                                        "<strong>+256780430994"</strong></li>

                                                    <li>For Airtel Users please make your payment To this mobile number
                                                        "<strong>+256751301852"</strong></li>
                                                </ol>
                                            </div>
                                            <p>After making deposits, send your Confirmation code, Registered E-mail and
                                                Amount paid as an E-mail to <span
                                                    style="color: #993300;">surecleanodds@gmail.com</span>&nbsp; or through
                                                WhatsApp to <span style="color: #0000ff;">+256780430994</span></p>
                                            <p>Your account will be activated instantly.</p>

                                            {{-- <p>Please do not&nbsp;call (WhatsApp Only), Just go ahead and make payment.</p> --}}
                                        </div>
                                        <div class="col-sm-12 pay-bottom">
                                        </div>
                                    </div>
                                    @endif





                                </div>

                            </div>
                        </div>



                    </div>
                </section>

                <script>
                    var amount = Math.floor(({{ $sub->nairaPrice }} * 100));
                    var callback = "{{ route('/paystack') }}";
                    var subID = "{{ $sub->id }}";
                    var nowTim = "{{ date('d-m-Y-h-i-a') }}-";

                    function payWithPaystack() {
                        var handler = PaystackPop.setup({
                            key: 'pk_live_8f3ea6472dfe5bc566ccf8fdc87929a50a141f02',
                            //key: 'pk_test_6bf927c4fcf4172fae59cf27c7b7688853682f74',
                            email: '{{ currentUser()->email }}',
                            amount: amount,
                            ref: nowTim +
                                '{{ Str::slug($sub->category, '-') }}-{{ Str::slug($sub->category, '-') }}-{{ Str::slug($sub->planName, '-') }}-refID={{ currentUser()->id }}', // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                            label: 'cleanoddsting@gmail.com',
                            metadata: {
                                custom_fields: [{
                                    display_name: "Mobile Number",
                                    variable_name: "mobile_number",
                                    value: "{{ currentUser()->phone }}"
                                }]
                            },
                            callback: function(response) {
                                window.location.href = callback + '/' + subID + '/' + response.reference;
                            },
                            onClose: function() {
                                //                    swal('YOU CANCELLED THE PAYMENT', '', 'warning');
                            }
                        });
                        handler.openIframe();
                    }
                </script>

                <script>
                    // real FLWPUBK-0fbbffad6dc4ee78782d1f0508c98c95-X
                    //test
                    const API_publicKey = "FLWPUBK-86ab8135529e15db90bd4d3c73fe8126-X";
                    var callbackUrl = "{{ route('/rave') }}";
                    var subID = "{{ $sub->id }}";
                    var nowTim = "{{ date('d-m-Y-h-i-a') }}-";
                    var cur = "USD";
                    var cou = "NG";
                    var amt = "{{ $sub->dollarPrice }}";
                    @if (currentUser()->country == 'Kenya')
                        var cur = "KES";
                        var cou = "KE";
                        var amt = "{{ $sub->keshPrice }}";
                    @elseif(currentUser()->country=='Uganda')
                        var cur = "UGX";
                        var cou = "NG";
                        var amt = "{{ $sub->ugxPrice }}";
                    @elseif(currentUser()->country=='Ghana')
                        var cur = "GHS";
                        var cou = "GH";
                        var amt = "{{ $sub->cedPrice }}";
                    @elseif(currentUser()->country=='South Africa')
                        var cur = "ZAR";
                        var cou = "ZA";
                        var amt = "{{ $sub->zarPrice }}";
                    @elseif(currentUser()->country=='Tanzania, United Republic of')
                        var cur = "TZS";
                        var cou = "TZ";
                        var amt = "{{ $sub->tzsPrice }}";
                    @elseif(currentUser()->country=='Zambia')
                        var cur = "ZMW";
                        var cou = "ZM";
                        var amt = "{{ $sub->zmwPrice }}";
                    @endif

                    function payWithRave() {
                        var x = getpaidSetup({
                            PBFPubKey: API_publicKey,
                            customer_email: "{{ currentUser()->email }}",
                            amount: amt,
                            customer_phone: "{{ currentUser()->phone }}",
                            currency: cur,
                            country: cou, // GH can also be passed as country, only country options to pass are NG and GH.
                            txref: nowTim + '{{ Str::slug($sub->category, '-') }}-refID={{ currentUser()->id }}',
                            meta: [{
                                metaname: "subID",
                                metavalue: "{{ $sub->id }}"
                            }],
                            onclose: function() {},
                            callback: function(response) {
                                var txref = response.tx
                                    .txRef; // collect flwRef returned and pass to a 					server page to complete status check.
                                console.log("This is the response returned after a charge", response);
                                if (
                                    response.tx.chargeResponseCode == "00" ||
                                    response.tx.chargeResponseCode == "0"
                                ) {
                                    window.location.href = callbackUrl + '/' + subID + '/' + txref;
                                } else {
                                    // redirect to a failure page.
                                }

                                x.close(); // use this to close the modal immediately after payment.
                            }
                        });
                    }
                </script>
            </div>

        </div>

    </section>








@endsection
