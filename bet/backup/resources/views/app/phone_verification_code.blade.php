<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Verify Phone | Cleanodds.com</title>

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
    <meta property="og:title" content="Select Country | Cleanodds.com" />
    <meta property="og:description" content="Cleanodds is the best source of well-researched football statistics, analysis, and predictions.." />
    <meta property="og:image" content="https://www.cleanodds.com/cleanodds/images/r2-share.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="140" />
    <meta property="og:image:height" content="140" />

@extends('layout.master')
@section('title', 'Verify phone Number')
@section('vip', 'active')
@section('levelCSS') @endsection

@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <br><br>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container" style="background: #fff; padding: 40px 15px; margin-bottom: 20px; margin-top: 20px;">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 text-justify section-head">
                    <br>
                    <h2 style="color: black;" class="well">Verify Number</h2>
                    <span class="clear btn-md message" style="color: red;">{{session('wrongmessage') ?? ''}}</span><br>
                        <span class="clear btn-md message" style="color: red;">{{session('message1') ?? ''}}</span><br>
                           <span class="clear btn-md message" style="color: red;">{{session('message') ?? ''}}</span>
                    <p>Kindly Enter Confirmation code</p>
                    <hr>
                    <form action="{{route('/phone.verify.code')}}" id="countryForm" method="post">



                            <input type="hidden" name="phone" value="{{$data['phone']}}" class="form-control col-sm-4">
                            <input type="hidden" name="country_code" value="{{$data['country_code']}}" class="form-control col-sm-4">

                        <div class="form-group">
                            <label>Confirmation Code*</label>
                            <input type="text" name="code" class="form-control col-sm-4" placeholder="Confirmation Code">


                        </div>
                        {{ csrf_field() }}
                        <br>
                        <div class="form-group" style="margin-top: 9px;">
                            <button class="btn btn-md btn-success btn-block form-control" type="submit" id="countryBtn">PROCEED <i class="fa fa-arrow-circle-o-right"></i></button>
                        </div>
                    </form>
                    <br><br>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('levelJS')

@endsection
