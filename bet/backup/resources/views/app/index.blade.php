@extends('app.layouts.master')

@section('title') Dashboard @endsection
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
                    <h3 class="panel-title">Your VIP Package</h3>
                </div>
                @if(activeUser())
                    <div class="panel-body text-center">
                        <h3>{{currentUser()->sub->category}}</h3>
                        <span><strong>{{currentUser()->sub->planName}} Plan</strong></span> <br>
                        <span>Date: <strong class="text-success">{{\Carbon\Carbon::parse(currentUser()->date_subscribed)->format('d M, Y @ h:ia')}}</strong></span>
                        <br>
                        <span>Expiry: <strong class="text-danger">{{\Carbon\Carbon::parse(currentUser()->next_due_date)->format('d M, Y @ h:ia')}}</strong></span>
                    </div>
                    <div class="panel-footer text-center">
                        <style>
                            .blink_text {
                                animation: blink 2s infinite;
                            }
                            @keyframes blink{
                                0% {opacity: 1.0;}
                                50% {opacity: 0.0;}
                                100% {opacity: 1.0;}
                            }
                        </style>
                        <center>
                            <a href="{{route('/tips_store')}}"><button class="btn btn-md btn-primary"><span class="blink_text">VIEW TODAY'S TIPS</span></button></a>
                        </center>
                    </div>

                @else
                    <div class="panel-body text-center">
                        <center>
                            <h5 class="text-danger">YOU DO NOT CURRENTLY HAVE A RUNNING SUBSCRIPTION PLAN</h5>
                            @if(currentUser()->sub_count>0)
                                <h5 class="text-warning text-uppercase">YOUR LAST SUBSCRIPTION OF <strong>{{currentUser()->sub->category}} PLAN ({{currentUser()->sub->planName}})</strong>  EXPIRED ON <strong>{{\Carbon\Carbon::parse(currentUser()->next_due_date)->format('d M, Y @ h:ia')}}</strong></h5>
                            @endif

                        </center>
                    </div>
                    <div class="panel-footer text-center">
                        <p>Don't miss out on our VIP Tips!</p>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{route('/vip_packages')}}"><button class="btn btn-md btn-primary btn-block">JOIN VIP MEMBERSHIP</button></a></li>
                    </ul>
                @endif
            </div>

        </div>

         <div class="col-sm-8">
            <div class="panel panel-primary">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel-heading">
                            <h3 class="panel-title">Account Overview</h3>
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
                                        <tr>
                                            <th>Email</th>
                                            <td>{{currentUser()->email}}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone Number</th>
                                            <td>{{currentUser()->phone}}
                                                                                     </td>
                                        </tr>
                                        <tr>
                                            <th>Registered</th>
                                            <td>{{\Carbon\Carbon::parse(currentUser()->created_at)->format('d M, Y @ h:ia')}}</td>
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
                                <div class="col-sm-12 text-center">
                                    <a href="{{route('/app/update_profile')}}"><button class="btn btn-danger btn-md">Edit Profile</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
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