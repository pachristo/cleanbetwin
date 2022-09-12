@extends('layout.master')
@section('title', 'Join SMS List')
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
                        Join SMS List
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
                        <div class="col-sm-8 col-sm-offset-2">
                            <center><h2 class="text-success">Get 2-10 odds delivered to your mobile phone every weekend, this is absolutely free!</h2></center>

                            <form action="{{route('/join_list')}}" 
                             method="post" id="smsForm">
                                <center>
                                    <div class="col-sm-8 col-sm-offset-2">
                                      @if($errors->any())  
                                      Note:
                                      <span style="color:red;">*Your phone numbers should not be more than 11 characters</span><br>
                                      <span style="color:red;">*It should not contain country codes</span>
                                      @endif
                                     <span style="color:red;">{{session('message') ?? ''}}</span><br>
                                    <span style="color:red;">{{session('message1') ?? ''}}</span><br>
                                    <span style="color:red;">{{session('wrongmessage') ?? ''}}</span><br>
                                    <span style="color:green;">{{session('success') ?? ''}}</span><br>

                                    </div>
                                    @if(session()->has('success'))
                                    <script type="text/JavaScript">
                                    redirectTime = "1500";
                                    redirectURL = "https://cleanodds.com";
                                    
                                        setTimeout("location.href = redirectURL;",redirectTime);
                                    
                                    </script>
                                    
                                    @endif
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <div class="form-group col-sm-6">
                                <label>Country Code*</label>
                                @include('app.layouts.country_list')
                                    </div>

                        <div class="form-group col-sm-6">
                            <label>Phone*</label>
                            <input type="text" name="phone" style="width: 100%!important;" class="form-control ">
                        </div>
                    </div>
                        <div class="form-group">
                            <input type="hidden" name="via" value="sms">
                        </div>

                                    
                                    {{ csrf_field() }}
                                    <div class="form-group-lg">
                                        <br>
                                        <button class="btn btn-md btn-primary" type="submit" id="smsBtn">VERIFY PHONE NUMBER</button>
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