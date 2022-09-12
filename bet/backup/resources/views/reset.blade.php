<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Reset Password | Cleanodds.com</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">

@extends('layout.master')
@section('title', 'New Password')
@section('store', 'active')
@section('levelCSS') @endsection

@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-4">
                    <br><br>
                    <h2 class="header" style="margin-top: 60px;">
                        New Password
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container" style="background: #fff; padding: 20px 15px; margin-bottom: 20px; margin-top: 2px;">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4" style="background: whitesmoke; padding: 40px 25px;">
                    <form method="post" action="{{route('/resetPasswordNow')}}">
                        @csrf
                        <div class="form-group-lg col-sm-12"><br>
                            <label for="">New Password *</label>
                            <input type="password" name="password" required class="form-control" placeholder="password">
                            <input type="hidden" name="email" value="{{$email}}">
                            <input type="hidden" name="code" value="{{$code}}">

                        </div>
                        <div class="form-group-lg col-sm-12"><br>
                            <label for="">Confirm Password *</label>
                            <input type="password" name="password_confirmation" required class="form-control" placeholder="password">
                        </div>
                        <div class="form-group-lg col-sm-12">
                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible">
                                    <p>{{session('error')}}</p>
                                </div>
                            @endif
                            @if(count($errors)> 0)
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible">
                                        <p>{{$error}}</p>
                                    </div>
                                @endforeach
                            @endif
                                <br>
                            <button class="btn btn-md btn-success btn-block" id="resetBtn">SAVE PASSWORD </button>
                        </div>
                    </form>
                    <div class="col-sm-12">
                        <hr>
                        <p>Back to login? <a href="{{route('/reset-password')}}">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('levelJS') @endsection
