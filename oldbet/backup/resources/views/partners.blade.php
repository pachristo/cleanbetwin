<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Partners | Cleanodds.com</title>

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
    <meta property="og:title" content="Partners | Cleanodds.com" />
    <meta property="og:description" content="Cleanodds is the best source of well-researched football predictions, analysis, and picks for experts.." />
    <meta property="og:image" content="https://www.cleanodds.com/cleanodds/images/r2-share.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="140" />
    <meta property="og:image:height" content="140" />

@extends('layout.master')
@section('title', 'Partners')
@section('privacy', 'active')
@section('levelCSS') @endsection

@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <br><br>
                    <h2 class="header" style="margin-top: 60px; margin-bottom: 40px;">
                        Partners
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <?php $sponsors = \App\Focus\Modules\Partner\Model\Partner::latest()->get(); ?>

                <div class="col-sm-10 col-sm-offset-1 text-justify">
                    <br>
                    <center>
                        @foreach($sponsors as $key => $s)
                            <p><a href="{{$s->url}}" target="_blank" title="{{$s->description}}"> <i class="fa fa-external-link"></i> {{$s->name}}</a></p>
                        @endforeach
                    </center>
                    <hr>
                    <p class="alert alert-warning">ATTENTION:</p>
                    <p>This page is for our partners. If you want your site added, we recommend that you add us first to your page using the information below.</p>
                    <center>
                        <p><strong>Name: </strong>Cleanodds</p>
                        <p><strong>Description: </strong>Free Prediction Website</p>
                        <p><strong>URL: </strong>https://www.cleanodds.com</p>
                        <br>
                        <p>Then send us an email: contact@cleanodds.com</p>
                    </center>
                    <br><br>

                </div>
            </div>
        </div>
    </section>

@endsection

@section('levelJS') @endsection
