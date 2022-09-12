@extends('app.layouts.master')

@section('title') Sms Campaign @endsection
@section('home') active @endsection
@section('levelCSS') @endsection

@section('body')
    {{--<div class="row">--}}
        @if(session()->has('success'))
            <div class="col-sm-12">
                <div class="alert alert-success"><h5>{{session()->get('success')}}</h5></div>
            </div>
        @endif
    @if(session()->has('error'))
        <div class="alert alert-warning"><h5>{!! session()->get('error') !!}</h5></div>
    @endif
    <div class="col-sm-12"><br></div>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Your SMS Package</h3>
                </div>
                @if(currentUser()->sms_status!=0 && currentUser()->sms_status!='')
                    <div class="panel-body text-center">
                        <!-- <h3>{{$sub->category ?? ''}}</h3> -->
                        <span><strong>{{$sub->planName ?? ''}} Plan</strong></span> <br><br>

                        <span>Date: <strong class="text-success">{{\Carbon\Carbon::parse(currentUser()->sms_subscribed_date)->format('d M, Y @ h:ia')}}</strong></span>
                        <br>
                        <span>Expiry: <strong class="text-danger">{{\Carbon\Carbon::parse(currentUser()->sms_due_date)->format('d M, Y @ h:ia')}}</strong></span>
                    </div>
                    <div class="panel-footer text-center">
                        <style>
                            /*.blink_text {
                                animation: blink 2s infinite;
                            }
                            @keyframes blink{
                                0% {opacity: 1.0;}
                                50% {opacity: 0.0;}
                                100% {opacity: 1.0;}
                            }*/
                        </style>
                        @if(currentUser()->phone_status=='0' && \Carbon\Carbon::parse(currentUser()->sms_due_date)->format('d M, Y @ h:ia' )<= \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->format('d M, Y @ h:ia' ))
                        

                         <center>
                            <a href="{{route('/vip_packages')}}?misc"><button class="btn btn-md btn-primary btn-danger"><span class="blink_text">Renew Plan</span></button></a>
                        </center>

                        @elseif(currentUser()->phone_status=='1' && \Carbon\Carbon::parse(currentUser()->sms_due_date)->format('d M, Y @ h:ia' )<= \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->format('d M, Y @ h:ia' ))
                         <center>
                            <a href="{{route('/vip_packages')}}?misc"><button class="btn btn-md btn-primary btn-danger"><span class="blink_text">Renew Plan</span></button></a>
                        </center>
                        @elseif(currentUser()->phone_status=='0' && \Carbon\Carbon::parse(currentUser()->sms_due_date)->format('d M, Y @ h:ia' )> \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->format('d M, Y @ h:ia' ))

                       <center>
                            <a href="{{route('/join_sms_list')}}"><button class="btn btn-md btn-primary btn-danger"><span class="blink_text">Activate Phone Number</span></button></a>
                        </center>
                        @else
                          
                                                

                            
                        @endif
                    </div>

                @else
                    <div class="panel-body text-center">
                        <center>
                            <h5 class="text-danger">YOU DO NOT CURRENTLY HAVE A RUNNING SUBSCRIPTION PLAN</h5>
                           <!--  @if(currentUser()->sub_count>0)
                                <h5 class="text-warning text-uppercase">YOUR LAST SUBSCRIPTION OF <strong>{{currentUser()->sub->category}} PLAN ({{currentUser()->sub->planName}})</strong>  EXPIRED ON <strong>{{\Carbon\Carbon::parse(currentUser()->next_due_date)->format('d M, Y @ h:ia')}}</strong></h5>
                            @endif -->

                        </center>
                    </div>
                    <div class="panel-footer text-center">
                        <p>Please Don't miss out on our SMS VIP  Tips!</p>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{route('/vip_packages')}}?misc"><button class="btn btn-md btn-primary btn-block">JOIN SMS PLAN</button></a></li>
                    </ul>
                @endif
            </div>

        </div>
        @if(currentUser()->phone_status!=0)
        <div class="col-sm-8">
            <div class="panel panel-primary">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel-heading">
                            <h3 class="panel-title">SMS ACCOUNT DETAILS</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row clearfix">
                                <div class="col-sm-3">
                                    <img src="@if(currentUser()->passport)
                                    {{$localPath}}/users/{{currentUser()->passport}}
                                    @else
                                    {{$localPath}}/avatar.png
                                            @endif" class="img-rounded img-responsive" alt="Profile Picture">
                                </div>
                                <div class="col-sm-9">
                                    <table class="table table-striped table-bordered">
                                        
                                        <tr>
                                            <th>Full Name</th>
                                            <td>{{currentUser()->full_name}}</td>
                                        </tr>
                                       {{--  <tr>
                                            <th>Email</th>
                                            <td>{{currentUser()->email}}</td>
                                        </tr> --}}
                                        <tr>
                                            <th>Phone Number</th>
                                            <td>{{currentUser()->phone}}

                                                @if(currentUser()->phone_status=='0')
                                                <span style="color: pink; ">Unverified</span>
                                                @else
                                                <span style="color: green; ">verified✔</span>
                                                @endif
                                                                                     </td>
                                        </tr>
                                         <tr>
                                            <th>Status</th>
                                            <td>
                                                

                                             @if (  \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->format('d M, Y @ h:ia' )>= \Carbon\Carbon::parse(currentUser()->sms_due_date)->format('d M, Y @ h:ia' ))

                                                <span style="color:red;">Expired</span>

                                            @else
                                            <span style="color:red;">Active</span>

                                            @endif



                                                </td>
                                        </tr> 
                                        @if(currentUser()->username)
                                            <tr>
                                                <th>Username</th>
                                                <td>{{currentUser()->username}}</td>
                                            </tr>
                                        @endif
                                        @if(currentUser()->country)
                                            <tr>
                                                <th>Country/State</th>
                                                <td>{{currentUser()->country}}/{{currentUser()->state}}</td>
                                            </tr>
                                        @endif
                                    </table>
                                </div>
                               {{--  <div class="col-sm-12 text-center">
                                    <a href="{{route('/app/update_profile')}}"><button class="btn btn-danger btn-md">Edit Profile</button></a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        @endif
    {{--</div>--}}
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    TIPS CATEGORIES
                </h3>
            </div>
            <div class="panel-body">
                @if(activeUser())
                    @if(currentUser()->sub->category=='Super Plan' || currentUser()->sub->category=="Mega Plan")
                        @include('partial.super_vip')
                    @endif
                    @if(currentUser()->sub->category=="Mega Plan")
                        @include('partial.mega_vip')
                    @endif
                    @if(currentUser()->sub->category=="Investment Scheme")
                        <div class="col-sm-12">
                            <h3 style="color: orange">INVESTMENT SCHEME</h3>
                        </div>
                        <div class="col-sm-4 col-xs-6">
                            <a href="{{route('/')}}">
                                <div class="category_box">
                                    <h3>Investment Tips</h3>
                                </div>
                            </a>
                        </div>
                    @endif
                @else
                    @include('partial.store')
                @endif
            </div>
        </div>
    </div>
@endsection

@section('levelJS') @endsection