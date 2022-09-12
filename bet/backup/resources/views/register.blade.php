<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Register | Cleanodds.com</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link rel="icon" href="{{asset('images/favicon.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="images/favicon.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/favicon.png">
    <meta property="og:url" content="https://www.cleanodds.com/" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Register | Cleanodds.com" />
    <meta property="og:description" content="Cleanodds is the best source of well-researched football predictions, analysis, and picks from experts.." />
    <meta property="og:image" content="https://www.cleanodds.com/cleanodds/images/r2-share.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="140" />
    <meta property="og:image:height" content="140" />

@extends('layout.master')
@section('title', 'Create Account')
@section('store', 'active')
@section('levelCSS') @endsection

@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <br><br>
                    <h2 class="header" style="margin-top: 60px;">
                        Create Account
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container" style="background: #fff; padding: 20px 15px; margin-bottom: 20px; margin-top: 2px;">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3" style="background: whitesmoke; padding: 40px 25px;">
                    <form method="post" action="{{route('/register')}}" id="registerForm" data-callback="{{route('/login')}}">
                        @csrf
                        <div class="form-group-lg col-sm-12">
                            <label for="">Full Name *</label>
                            <input type="text" name="full_name" class="form-control" required placeholder="full name here">
                        </div>
                        <div class="form-group-lg col-sm-12"><br>
                            <label for="">Email Address *</label>
                            <input type="email" name="email" class="form-control" required placeholder="email address">
                        </div>
                        <div class="form-group-lg col-sm-7"><br>
                            <label for="">Phone Number </label>
                            <input type="text" name="phone" class="form-control" placeholder="phone number">
                        </div>
                        <div class="form-group-lg col-sm-5"><br>
                            <label for="">Country *</label>
                            <select name="country" class="form-control crs-country select2" data-region-id="one" required id="" style="height: 35px!important;"></select>
                        </div>
                        <div class="form-group-lg col-sm-6"><br>
                            <label for="">Password *</label>
                            <input type="password" name="password" required class="form-control">
                        </div>
                        <div class="form-group-lg col-sm-6"><br>
                            <label for="">Confirm Password *</label>
                            <input type="password" name="password_confirmation" required class="form-control">
                        </div>
                        <div class="form-group-lg col-sm-12"><br>
                            <button class="btn btn-md btn-danger" id="regBtn">CREATE ACCOUNT <i class='fa fa-arrow-circle-right'></i></button>
                        </div>
                    </form>
                    <div class="col-sm-12">
                        <hr>
                        <p>Already have an Account? <a href="{{route('/login')}}">Login Here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('levelJS') @endsection
