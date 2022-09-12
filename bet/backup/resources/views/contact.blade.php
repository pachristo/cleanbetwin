<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Contact Us | Cleanodds.com</title>

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
    <meta property="og:title" content="Contact Us | Cleanodds.com" />
    <meta property="og:description" content="Cleanodds is the best source of well-researched football statistics, analysis, and predictions.." />
    <meta property="og:image" content="https://www.cleanodds.com/cleanodds/images/r2-share.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="140" />
    <meta property="og:image:height" content="140" />

@extends('layout.master')
@section('title', 'Contact Us')
@section('contact', 'active')
@section('levelCSS') @endsection

@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <br><br>
                    <h2 class="header" style="margin-top: 60px; margin-bottom: 40px;">
                        Contact Us
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
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="icon">
                                        <div class="image"><i class="fa fa-envelope" aria-hidden="true" style="margin-left: 10px;"></i></div>
                                        <div class="info">
                                            <h3 class="title">MAIL & PHONE</h3>
                                            <p>
                                                <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp contact@cleanodds.com
                                              <br>
                                                <br>
                                        <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp advert@cleanodds.com
                                                <br>
                                                <br>
                                                <i class="fa fa-phone" aria-hidden="true"></i> &nbsp ***
                                            </p>

                                        </div>
                                    </div>
                                    <div class="space"></div>
                                </div>
                            </div>
                        </div>

                        {{--<div class="col-sm-6">--}}
                            {{--<form action="#" class="contact-form" method="post">--}}

                                {{--<div class="form-group">--}}
                                    {{--<input type="text" class="form-control" id="name" name="nm" placeholder="Name" required="" autofocus="">--}}
                                {{--</div>--}}


                                {{--<div class="form-group form_left">--}}
                                    {{--<input type="email" class="form-control" id="email" name="em" placeholder="Email" required="">--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                    {{--<input type="text" class="form-control" id="phone" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" placeholder="Mobile No." required="">--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<textarea class="form-control textarea-contact" rows="5" id="comment" name="FB" placeholder="Type Your Message/Feedback here..." required=""></textarea>--}}
                                    {{--<br>--}}
                                    {{--<button class="btn btn-default btn-send"> <span class="glyphicon glyphicon-send"></span> Send </button>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    </div>
                    <br><br><br><br>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('levelJS') @endsection
