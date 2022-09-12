@extends('layout.master')
@section('title', 'Verify Phone Number')
@section('contact', 'active')
@section('levelCSS')
    <link rel="stylesheet" href="{{asset('phone_plugin/intlTelInput.min.css')}}">
@endsection

@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <br><br>
                    <h2 class="header" style="margin-top: 60px; margin-bottom: 40px;">
                        Verify Phone Number
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 text-justify">

                    <div class="col-sm-12" id="parent">
                        <div class="col-sm-6 col-sm-offset-3">

                            <form action="{{route('/confirm_phone_number')}}"  method="post" id="smsForm">
                                <center>
                                    <div class="form-group-lg">
                                        <label>INPUT THE OTP YOU RECEIVED BELOW <br><small class="text-danger">The OTP might take some minutes before you receive it.</small></label>
                                        <br>
                                        <input type="hidden" name="phone" value="{{$data['phone']}}">
                                        <input type="hidden" name="country_code" value="{{$data['country_code']}}">
                                        <input type="number" placeholder="Input One-Time PIN"  name="code" autofocus id="otp" class="form-control" required name="otp">
                                    </div>
                                    {{ csrf_field() }}
                                    <div class="form-group-lg">
                                        <br>
                                        <button class="btn btn-md btn-primary" type="submit" id="smsBtn">CONFIRM OTP</button>
                                        <br><br>
                                        <a href="{{route('/join_sms_list')}}">Don't receive OTP? Retry again here</a>
                                        <br><br><br>
                                    </div>
                                </center>
                            </form>
                        </div>
                    </div>
                    <br><br><br><br>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('levelJS')
 


@endsection