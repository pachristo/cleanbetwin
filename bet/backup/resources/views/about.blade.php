<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>About Us | Cleanodds.com</title>

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
    <meta property="og:title" content="About Us | Cleanodds.com" />
    <meta property="og:description" content="Cleanodds is the best source of well-researched football statistics, analysis, and predictions.." />
    <meta property="og:image" content="https://www.cleanodds.com/cleanodds/images/r2-share.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="140" />
    <meta property="og:image:height" content="140" />
@extends('layout.master')
@section('title', 'About Us')
@section('about', 'active')
@section('levelCSS') @endsection

@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <br><br>
                    <h2 class="header" style="margin-top: 60px; margin-bottom: 40px;">
                        About Cleanodds.com
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 text-justify">
                    <blockquote>
                        Cleanodds.com is a trading name of Vitek Web Solutions (a company registered in Nigeria, RC - 2886941).
                        <br>Cleanodds.com is a free / premium website, offering football predictions and tips
                    </blockquote>
                    <h2>WHAT IS OUR GOAL? WHAT DO YOU GET?</h2>
                    <h3>We</h3>
                    <ul>
                        <li>Carefully analyze football matches</li>
                        <li>Thoroughly examine upcoming sporting events</li>
                        <li>Analyze all aspects to make sure the result we predict will be as accurate as possible</li>
                        <li>Avoid predicting uncertain football matches</li>
                        <li>Provide expert picks for our users to make selections</li>
                    </ul>

                    <h3>You</h3>
                    <ul>
                        <li>Receive a complete analysis of upcoming football matches</li>
                        <li>Form your ideas and opinions based on our guidance</li>
                        <li>Make your bets on single or multiple games</li>
                        <li>Increase the success rate of your bets with any bookmaker</li>
                        <li>Aren’t spending a lot of time making match forecasts on your own</li>
                    </ul>

                    <h2>HOW WE OPERATE</h2>
                    <p>Our team of experts offers you complete details concerning upcoming football matches. You are not compelled to take all our selections. It is your choice whether to place a bet on recommended result. We help you make decisions, which provide real monetary value for you.</p>
                    <p>Cleanodds will increase the success rate of your bets!</p>
                    <br><br>

                </div>
            </div>
        </div>
    </section>

@endsection

@section('levelJS') @endsection
