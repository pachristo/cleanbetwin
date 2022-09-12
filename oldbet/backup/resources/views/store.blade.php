<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Tips Stores | Cleanodds.com</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link rel="icon" href="{{asset('images/favicon.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="images/favicon.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/favicon.png">
    <meta property="og:url" content="https://www.cleanodds.com/" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Tips Stores | Cleanodds.com" />
    <meta property="og:description" content="Cleanodds is the best source of well-researched football predictions, analysis, and picks from experts.." />
    <meta property="og:image" content="https://www.cleanodds.com/cleanodds/images/r2-share.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="140" />
    <meta property="og:image:height" content="140" />

@extends('layout.master')
@section('title', 'Tips Store')
@section('store', 'active')
@section('levelCSS') @endsection

@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <br><br>
                    <h2 class="header" style="margin-top: 60px;">
                        Tips Store
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid" style="background: #fff; padding: 40px 15px; margin-bottom: 20px; margin-top: 20px;">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    @if(currentUser())
                        @if(activeUser())
                            @if(currentUser()->sub->category=='Super Plan')
                                @include('partial.super_vip')
                                @include('partial.store')
                            @elseif(currentUser()->sub->category="Mega Plan")
                                @include('partial.mega_vip')
                                @include('partial.store')
                            @elseif(currentUser()->sub->category="Investment Scheme")
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
                                @include('partial.store')
                            @endif
                        @else
                            @include('partial.store')
                            @include('partial.super_vip')
                            @include('partial.mega_vip')
                        @endif
                    @else
                        @include('partial.store')
                        @include('partial.super_vip')
                        @include('partial.mega_vip')
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection

@section('levelJS') @endsection
