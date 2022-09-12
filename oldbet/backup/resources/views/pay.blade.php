<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Make Payment | Cleanodds.com</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">

@extends('layout.master')
@section('title', $sub->category)
@section('vip', 'active')
@section('levelCSS') @endsection

@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <br><br>
                    <h2 class="header" style="margin-top: 60px;">
                        {{$sub->category}} > {{$sub->planName}}
                    </h2>
                    <h4 class="alert alert-success text-center">
                        @if(currentUser()->country=='Nigeria')
                            N{{number_format($sub->nairaPrice)}}
                        @elseif(currentUser()->country=='Kenya')
                            {{number_format($sub->keshPrice)}} KSH
                        @elseif(currentUser()->country=='Uganda')
                            {{number_format($sub->ugxPrice)}} UGX
                        @elseif(currentUser()->country=='Tanzania, United Republic of')
                            {{number_format($sub->tzsPrice)}} TZS
                        @elseif(currentUser()->country=='Ghana')
                            {{number_format($sub->cedPrice)}} GHS
                        @elseif(currentUser()->country=='South Africa')
                            {{number_format($sub->zarPrice)}} ZAR
                        @else
                            ${{number_format($sub->dollarPrice)}}
                        @endif
                        /
                        {{$sub->accessTime}}
                    </h4>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container" style="background: #fff; padding: 20px 15px; margin-bottom: 20px; margin-top: 20px;">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <blockquote>Payment methods available in <strong style="color: green;">{{currentUser()->country}}</strong>
                        <br><small>Not your country? <a href="{{route('/country')}}">Change Here</a></small></blockquote>
                    <br>
                    <br>

                    @if(currentUser()->country=='Nigeria')

                    <div class="col-sm-6">
                        <div class="col-sm-12 pay-header">ONLINE PAYMENT WITH PAYSTACK</div>
                        <div class="col-sm-12 pay-body">
                            <center><img src="{{asset('images/paystack-ii.png')}}" class="img-responsive" alt="Paystack"></center>
                            <center><h4>YOUR ACCOUNT WILL BE ACTIVATED AUTOMATICALLY AFTER SUCCESSFUL TRANSACTION</h4></center>
                        </div>
                        <div class="col-sm-12 pay-bottom">
                                <script src="https://js.paystack.co/v1/inline.js"></script>
                            <button onclick="payWithPaystack()" class="btn btn-danger btn-md">PAY N{{number_format($sub->nairaPrice)}}</button>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="col-sm-12 pay-header">BANK PAYMENT/MOBILE TRANSFER</div>
                        <div class="col-sm-12 pay-body">
                            <center><img src="{{asset('images/bank_trasfer.png')}}" class="img-responsive" alt="Paystack"></center>
                            <table class="table">
                                <tr>
                                    <th>Acct Name:</th>
                                    <td><strong class="text-danger">VICTOR MOSES</strong></td>
                                </tr>
                                <tr>
                                    <th>Acct No:</th>
                                    <td><strong class="text-danger">2175301599</strong></td>
                                </tr>
                                <tr>
                                    <th>Bank:</th>
                                    <td><strong class="text-danger">Zenith Bank</strong></td>
                                </tr>
                            </table>
                            <p>After Successful transaction, Kindly Forward us a mail containing “Your Email, Amount Paid and Teller Number, to <strong class="text-danger">contact@cleanodds.com</strong></p>
                            <p>You can also pay via mobile transfer, After Successful transaction, Kindly forward the screenshot (if possible) or your Account Name and Amount Paid to <strong class="text-danger">contact@cleanodds.com</strong></p>
                            <p>Your account will be activated instantly.</p>
                        </div>
                        <div class="col-sm-12 pay-bottom">
                        </div>
                    </div>

                    @endif

                    @if(currentUser()->country=='South Africa' || currentUser()->country=='Ghana' || currentUser()->country=='Kenya' || currentUser()->country=='Uganda' || currentUser()->country=='Tanzania, United Republic of')
                    <div class="col-sm-6">
                        <div class="col-sm-12 pay-header">
                            @if(currentUser()->country=='Kenya')
                                PAY ONLINE WITH MPESA
                            @elseif(currentUser()->country=='Uganda' || currentUser()->country=='Ghana' || currentUser()->country=='Tanzania, United Republic of')
                                PAY WITH MOBILE MONEY
                            @elseif(currentUser()->country=='South Africa')
                                PAY WITH YOUR BANK OR ATM CARD
                            @else
                                MAKE PAYMENT WITH CARD
                            @endif
                        </div>
                        <div class="col-sm-12 pay-body">
                            <center>
                                @if(currentUser()->country=='Kenya')
                                    <img src="{{asset('images/M-Pesa-Logo.png')}}" class="img-responsive" alt="PAY WITH MPESA" style="margin-bottom: 4px; max-height: 120px;">
                                @elseif(currentUser()->country=='Uganda')
                                    <img src="{{asset('images/ugx.jpg')}}" class="img-responsive" alt="PAY WITH MOBILE MONEY" style="margin-bottom: 4px;">
                                @elseif(currentUser()->country=='Ghana')
                                    <img src="{{asset('images/ghcmobile.png')}}" class="img-responsive" alt="PAY WITH MOBILE MONEY" style="margin-bottom: 4px;">
                                @elseif(currentUser()->country=='Tanzania, United Republic of')
                                    <img src="{{asset('images/pesa-share.png')}}" class="img-responsive" alt="PAY WITH MOBILE MONEY" style="margin-bottom: 4px; max-height: 150px;">
                                @elseif(currentUser()->country=='South Africa')
                                    <img src="{{asset('images/paywithbank.png')}}" class="img-responsive" alt="PAY WITH CARD OR BANK" style="margin-bottom: 4px; max-height: 150px;">
                                @else
                                    <img src="{{asset('images/flutterwave.png')}}" class="img-responsive" alt="PAY WITH ATM CARD OR BANK" style="margin-bottom: 4px;">
                                @endif
                            </center>
                            <center><h4>YOUR ACCOUNT WILL BE ACTIVATED AUTOMATICALLY AFTER SUCCESSFUL TRANSACTION</h4></center>
                        </div>
                        <div class="col-sm-12 pay-bottom">

                            <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>

                            <button onClick="payWithRave()" class="btn btn-danger btn-md">
                                    PAY
                                    @if(currentUser()->country=='Nigeria')
                                        N{{number_format($sub->nairaPrice)}}
                                    @elseif(currentUser()->country=='Kenya')
                                        {{number_format($sub->keshPrice)}} KSH
                                    @elseif(currentUser()->country=='Uganda')
                                        {{number_format($sub->ugxPrice)}} UGX
                                    @elseif(currentUser()->country=='Tanzania, United Republic of')
                                        {{number_format($sub->tzsPrice)}} TZS
                                    @elseif(currentUser()->country=='Ghana')
                                        {{number_format($sub->cedPrice)}} GHS
                                    @elseif(currentUser()->country=='South Africa')
                                        {{number_format($sub->zarPrice)}} ZAR
                                    @else
                                        ${{number_format($sub->dollarPrice)}}
                                    @endif
                                </button>
                        </div>
                    </div>
                    @endif

                    @if(currentUser()->country=='Kenya')
                    <div class="col-sm-6">
                        <div class="col-sm-12 pay-header">PAY WITH MPESA</div>
                        <div class="col-sm-12 pay-body">
                            <center><img src="{{asset('images/M-Pesa-Logo.png')}}" class="img-responsive" alt="MPesa"></center>
                            <table class="table">
                                <tr>
                                    <th>Payments should <br> be made ONLY to:</th>
                                    <td><strong class="text-danger">+254 795 406 999</strong></td>
                                </tr>
                            </table>
                            <p>After making deposits, send your Confirmation code, Registered E-mail and Amount paid as an E-mail to <strong class="text-danger">contact@cleanodds.com</strong></p>
                            <p>Your account will be activated instantly.</p>


                        </div>
                        <div class="col-sm-12 pay-bottom">
                        </div>
                    </div>

                    @endif


                    @if(currentUser()->country=='Ghana')
                    <div class="col-sm-6">
                        <div class="col-sm-12 pay-header">Ghana Mobile Money</div>
                        <div class="col-sm-12 pay-body">
                            <center><img src="{{asset('images/ghcmobile.png')}}" class="img-responsive" alt="Mobile Money"></center>
                            <table class="table">
                                <tr>
                                    <th>Payments should <br> be made ONLY to:</th>
                                    <td><strong class="text-danger">+233 547 187 157</strong></td>
                                </tr>
                            </table>
                            <p>After making deposits, send your Confirmation code, Registered E-mail and Amount paid as an E-mail to <strong class="text-danger">contact@cleanodds.com</strong></p>
                            <p>Your account will be activated instantly.</p>
                        </div>
                        <div class="col-sm-12 pay-bottom">
                        </div>
                    </div>
                    @endif


                    @if(currentUser()->country=='Uganda')
                        <div class="col-sm-6">
                            <div class="col-sm-12 pay-header">MTN Uganda to MPESA</div>
                            <div class="col-sm-12 pay-body">
                                <center><img src="{{asset('images/M-Pesa-Logo.png')}}" class="img-responsive" alt="MPesa"></center>
                                <div class="col-sm-12">
                                    <ol type="1" style="color: black;">
                                        <li>Dial *165#</li>
                                        <li>Select Send Money</li>
                                        <li>Select International Transfer</li>
                                        <li>Select Safaricom M-Pesa</li>
                                        <li>Enter this mobile number "<strong>+254 795 406 999"</strong></li>
                                        <li>Enter Amount and Pin</li>
                                        <li>Confirm &amp; Send</li>
                                    </ol>
                                </div>
                                <p>After making deposits, send your Confirmation code, Registered E-mail and Amount paid as an E-mail to <strong class="text-danger">contact@cleanodds.com</strong></p>
                                <p>Your account will be activated instantly.</p>

                                {{--<p>Please do not&nbsp;call (WhatsApp Only), Just go ahead and make payment.</p>--}}
                            </div>
                            <div class="col-sm-12 pay-bottom">
                            </div>
                        </div>
                    @endif

                    @if(currentUser()->country=='Tanzania, United Republic of')
                        <div class="col-sm-6">
                            <div class="col-sm-12 pay-header">VODACOM to MPESA</div>
                            <div class="col-sm-12 pay-body">
                                <center><img src="{{asset('images/M-Pesa-Logo.png')}}" class="img-responsive" alt="MPesa"></center>
                                <div class="col-sm-12">
                                    <ol type="1" style="">
                                        <li>Dial *150*00# or use the M-pesa app and select Send money.</li>
                                        <li>Select “M-pesa Kenya”</li>
                                        <li>Select “Send money”</li>
                                        <li>Enter this number <strong>“+254 795 406 999”</strong></li>
                                        <li>Enter Amount in Tanzanian Shillings</li>
                                        <li>Enter your M-pesa pin and confirm transaction</li>
                                    </ol>
                                </div>
                                <p>After making deposits, send your Confirmation code, Registered E-mail and Amount paid as an E-mail to <strong class="text-danger">contact@cleanodds.com</strong></p>
                                <p>Your account will be activated instantly.</p>

                                {{--<p>Please do not&nbsp;call (WhatsApp Only), Just go ahead and make payment.</p>--}}
                            </div>
                            <div class="col-sm-12 pay-bottom">
                            </div>
                        </div>
                    @endif


                    @if(currentUser()->country!='Kenya')
                    <div class="col-sm-6">
                        <div class="col-sm-12 pay-header">PAY WITH SKRILL</div>
                        <div class="col-sm-12 pay-body">
                            <center><img src="{{asset('images/skrill.gif')}}" class="img-responsive" alt="Skrill"></center>
                            <table class="table">
                                <tr>
                                    <th>Skrill address:</th>
                                    <td><strong class="text-danger">skrill@cleanodds.com</strong></td>
                                </tr>
                            </table>
                            <p>After a successful transaction, please Kindly send us a mail containing; (1). Your Email address, (2). Transaction ID (3). Amount paid to <strong class="text-danger">contact@cleanodds.com</strong></p>
                            <p>Your account will be activated instantly.</p>
                        </div>
                        <div class="col-sm-12 pay-bottom">
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="col-sm-12 pay-header">PAY WITH BITCOIN</div>
                        <div class="col-sm-12 pay-body">
                            <center><img src="{{asset('images/bitcoin-pay.png')}}" class="img-responsive" alt="Bitcoin"></center>
                            <table class="table">
                                <tr>
                                    <th>BITCOIN ADDRESS:</th>
                                </tr>
                                <tr>
                                    <td><strong class="text-danger">1GSXZgtSNKcL6r3c25cLXEXTCBu2NaDn5y</strong></td>
                                </tr>
                            </table>
                            <p>After a successful transaction, please Kindly send us a mail containing; (1). Your Email address, (2). Hash code, (3). Amount paid to <strong class="text-danger">contact@cleanodds.com</strong></p>
                            <p>Your account will be activated instantly.</p>
                        </div>
                        <div class="col-sm-12 pay-bottom">
                        </div>
                    </div>
                    @endif


                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="background: black; color: white;">
                                <h3 class="panel-title">DISCLAIMER:</h3>
                            </div>
                            <div class="panel-body">
                                The information transmitted is intended only for the persons or entity above the age of 18. Cleanodds do not refund cash paid for subscription and not liable to any money lost or gained. Countries that soccer staking is not legal should not subscribe to our plans. You can read through Our
                                <a href="{{route('/disclaimer')}}">Disclaimer</a> for more information on cleanodds.

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <script>
        var amount = Math.floor(({{$sub->nairaPrice}} * 100));
        var callback = "{{route('/paystack')}}";
        var subID = "{{$sub->id}}";
        var nowTim = "{{date('d-m-Y-h-i-a')}}-";
        function payWithPaystack(){
            var handler = PaystackPop.setup({
                key: 'pk_live_8f3ea6472dfe5bc566ccf8fdc87929a50a141f02',
                email: '{{currentUser()->email}}',
                amount: amount,
                ref: nowTim+'{{Str::slug($sub->category, '-')}}-{{Str::slug($sub->category, '-')}}-{{Str::slug($sub->planName, '-')}}-refID={{currentUser()->id}}', // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                label: 'cleanoddsting@gmail.com',
                metadata: {
                    custom_fields: [
                        {
                            display_name: "Mobile Number",
                            variable_name: "mobile_number",
                            value: "{{currentUser()->phone}}"
                        }
                    ]
                },
                callback: function(response){
                    window.location.href=callback+'/'+subID+'/'+response.reference;
                },
                onClose: function(){
//                    swal('YOU CANCELLED THE PAYMENT', '', 'warning');
                }
            });
            handler.openIframe();
        }
    </script>

    <script>
        // real FLWPUBK-0fbbffad6dc4ee78782d1f0508c98c95-X
        //test
        const API_publicKey = "FLWPUBK_TEST-0abc7a957a8d8c26078c1ec25c05478a-X";
        var callbackUrl = "{{route('/rave')}}";
        var subID = "{{$sub->id}}";
        var nowTim = "{{date('d-m-Y-h-i-a')}}-";
        var cur = "USD";
        var cou = "NG";
        var amt = "{{$sub->dollarPrice}}";
                @if(currentUser()->country=='Kenya')
        var cur = "KES";
        var cou = "KE";
        var amt = "{{$sub->keshPrice}}";
                @elseif(currentUser()->country=='Uganda')
        var cur = "UGX";
        var cou = "NG";
        var amt = "{{$sub->ugxPrice}}";
                @elseif(currentUser()->country=='Ghana')
        var cur = "GHS";
        var cou = "GH";
        var amt = "{{$sub->cedPrice}}";
                {{--@elseif(currentUser()->country=='South Africa')--}}
        {{--var cur = "ZAR";--}}
        {{--var cou = "ZA";--}}
        {{--var amt = "{{$sub->zarPrice}}";--}}
                @elseif(currentUser()->country=='Tanzania, United Republic of')
        var cur = "TZS";
        var cou = "NG";
        var amt = "{{$sub->tzsPrice}}";
        @endif

        function payWithRave() {
            var x = getpaidSetup({
                PBFPubKey: API_publicKey,
                customer_email: "{{currentUser()->email}}",
                amount: amt,
                customer_phone: "{{currentUser()->phone}}",
                currency: cur,
                country: cou, // GH can also be passed as country, only country options to pass are NG and GH.
                txref: nowTim+'{{Str::slug($sub->category, '-')}}-refID={{currentUser()->id}}',
                meta: [{
                    metaname: "subID",
                    metavalue: "{{$sub->id}}"
                }],
                onclose: function() {},
                callback: function(response) {
                    var txref = response.tx.txRef; // collect flwRef returned and pass to a 					server page to complete status check.
                    console.log("This is the response returned after a charge", response);
                    if (
                        response.tx.chargeResponseCode == "00" ||
                        response.tx.chargeResponseCode == "0"
                    ) {
                        window.location.href=callbackUrl+'/'+subID+'/'+txref;
                    } else {
                        // redirect to a failure page.
                    }

                    x.close(); // use this to close the modal immediately after payment.
                }
            });
        }
    </script>

@endsection

@section('levelJS') @endsection
