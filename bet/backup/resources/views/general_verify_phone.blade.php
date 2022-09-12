@extends('layout.master')
@section('title', 'Activate  Phone Number')
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
                       ACTIVATE PHONE NUMBER
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
                             @if(session()->has('success'))
                                <div class="col-sm-12">
                                    <div class="alert alert-success"><h5>{{session()->get('success')}}</h5></div>
                                </div>
                            @endif

                            <form action="#"  method="post" id="smsForm">
                                <center>
                                    <div class="form-group-lg">

                                        @if(currentUser()->phone_status=='0' && currentUser()->sms_status=='1')
                                        <label><small class="text-danger">Please proceed to Activate Your Phone  number .</small></label>
                                        <br>
                                                                            </div>
                                    
                                    <div class="form-group-lg">
                                        <br>
                                    
                                        <a href="{{route('/join_sms_list')}}"  class="btn btn-md btn-primary">Activate Number</a>

                                        <br><br><br>
                                    </div>
                                    @endif


                                     @if(currentUser()->phone_status=='1' && currentUser()->sms_status=='1')
                                        <label><p class="text-success">Opps Your Phone number is Already verified!.</p></label>
                                        <br>
                                                                            </div>
                                    
                                    <div class="form-group-lg">
                                        <br>
                                    
                                        

                                        <br><br><br>
                                    </div>
                                    @endif

                                    @if(currentUser()->phone_status=='0' && currentUser()->sms_status=='')
                                        <label><p class="text-danger">*Sorry You do not have the facility to verify your phone Number. <br>Please You can subscribe to our VIP SMS packages <a href="{{route('/vip_packages')}}?misc">>>here</p></label>
                                        <br>
                                                                            </div>
                                    
                                    <div class="form-group-lg">
                                        <br>
                                    
                                        

                                        <br><br><br>
                                    </div>
                                    @endif



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