<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Sport News | Cleanodds.com</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <meta name="keywords" content="Latest football, news Football, news Nigeria, Sport News, Chelsea news, Manchester United news, Sport news" />
        <meta name="description"content="The latest soccer news, live scores, results, rumours, transfers, epl, Premier League all available on cleanodds..."/>

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link rel="icon" href="{{asset('images/favicon.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="images/favicon.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/favicon.png">
    <meta property="og:url" content="https://www.cleanodds.com/" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Sport News | Cleanodds.com" />
    <meta property="og:description" content="The latest soccer news, live scores, results, rumours, transfers, epl, Premier League all available on cleanodds." />
    <meta property="og:image" content="https://www.cleanodds.com/cleanodds/images/r2-share.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="140" />
    <meta property="og:image:height" content="140" />

@extends('layout.master')
@section('title', 'Sport News')
@section('blog', 'active')
@section('levelCSS') @endsection

@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <br><br>
                    <h2 class="header" style="margin-top: 60px; margin-bottom: 40px;">
                        Sport News
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section class="blog py-5 bg-ark">

        <div class="container">
            <div class="row">

                @foreach($news as $key => $new)
                    <div class="col-sm-3">
                        <div class="card">
                            <img src="{{$path}}blog/{{$new->display_image}}" class="w-100" style="width: 100%;">

                            <div class="card-block">
                                <div class="category">{{$new->category}}</div>
                                <p class="card-text text-white"><small style="color: whitesmoke;">{{\Carbon\Carbon::parse($new->created_at)->format('jS M, Y @ h:i a')}}</small></p>
                                <a href="{{route('/article')}}/{{$new->slug}}"><h3 class="card-title">{{$new->title}}</h3></a>
                                <br>
                                <a href="{{route('/article')}}/{{$new->slug}}" style="margin-bottom: 15px;"><button class="btn btn-sm btn-success">Read News</button></a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-sm-12">
                    {{$news->render()}}
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 text-justify">
                    <br>

                    <br><br>

                </div>
            </div>
        </div>
    </section>

@endsection

@section('levelJS') @endsection
