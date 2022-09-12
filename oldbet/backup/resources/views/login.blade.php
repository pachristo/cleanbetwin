<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Login | Cleanodds.com</title>

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
    <meta property="og:title" content="Login Here | Cleanodds.com" />
    <meta property="og:description" content="Cleanodds is the best source of well-researched football predictions, analysis, and picks from experts.." />
    <meta property="og:image" content="https://www.cleanodds.com/cleanodds/images/r2-share.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="140" />
    <meta property="og:image:height" content="140" />

@extends('layout.master')
@section('title', 'Login')
@section('store', 'active')
@section('levelCSS') @endsection

@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-4">
                    <br><br>
                    <h2 class="header" style="margin-top: 60px;">
                        Login
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container" style="background: #fff; padding: 20px 15px; margin-bottom: 20px; margin-top: 2px;">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4" style="background: whitesmoke; padding: 40px 25px;">
                    <form method="post" action="{{route('/login')}}">
                        @csrf
                        <div class="form-group-lg col-sm-12"><br>
                            <label for="">Email Address *</label>
                            <input type="email" name="email" class="form-control" required placeholder="email address">
                        </div>
                        <div class="form-group-lg col-sm-12"><br>
                            <label for="">Password *</label>
                            <input type="password" name="password" required class="form-control" placeholder="password">
                        </div>
                        <div class="form-group col-sm-12">
                            <label> <br>
                                <input id="check1" name="rememberme" type="checkbox">
                                <label for="check1">Remember me</label>
                            </label>
                        </div>
                        <div class="form-group-lg col-sm-12">
                            @if(session('err'))
                                <div class="alert alert-danger alert-dismissible">
                                    <p>{{session('err')}}</p>
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <p>{{session('success')}}</p>
                                </div>
                            @endif

                            <button class="btn btn-md btn-success btn-block" id="regBtn">LOGIN </button>
                        </div>
                    </form>
                    <div class="col-sm-12">
                        <br>
                        <p>Forgot password? <a href="{{route('/reset-password')}}">Click here?</a></p>
                        <hr>
                        <center>
                            <p><a href="{{route('/register')}}">REGISTER HERE</a></p>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('levelJS') @endsection
