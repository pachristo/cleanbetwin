<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Reset Password | Cleanodds.com</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">

@extends('layout.master')
@section('title', 'Password Reset')
@section('store', 'active')
@section('levelCSS') @endsection

@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-4">
                    <br><br>
                    <h2 class="header" style="margin-top: 60px;">
                        Password Reset
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container" style="background: #fff; padding: 20px 15px; margin-bottom: 20px; margin-top: 2px;">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4" style="background: whitesmoke; padding: 40px 25px;">
                    <form method="post"  id="resetForm" action="{{route('/resetPassword')}}">
                        @csrf
                        <div class="form-group-lg col-sm-12"><br>
                            <label for="">Email Address *</label>
                            <input type="email" name="email" class="form-control" required placeholder="email address">
                        </div>
                        <div class="form-group-lg col-sm-12">
                            <br>
                            <button class="btn btn-md btn-success btn-block" id="resetBtn">RESET PASSWORD </button>
                        </div>
                    </form>
                    <div class="col-sm-12">
                        <hr>
                        <p>Remember password? <a href="{{route('/login')}}">Login here?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('levelJS') @endsection
