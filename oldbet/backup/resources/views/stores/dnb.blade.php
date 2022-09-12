<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Draw No Bet | Cleanodds.com</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
        <meta name="keywords" content="Draw No Bet prediction, free football prediction" />
        <meta name="description"content="Draw No Bet (DNB) is a betting market offered by many online bookmakers. In this market, the draw result returns the full stake back to the players."/>
        <meta property="article:publisher" content="https://www.facebook.com/cleanoddss/" />

<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link rel="icon" href="{{asset('images/favicon.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="images/favicon.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/favicon.png">
    <meta property="og:url" content="https://www.cleanodds.com/" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Draw No Bet | Cleanodds.com" />
    <meta property="og:description" content="Draw No Bet (DNB) is a betting market offered by many online bookmakers. In this market, the draw result returns the full stake back to the players. " />
    <meta property="og:image" content="https://www.cleanodds.com/cleanodds/images/r2-share.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="140" />
    <meta property="og:image:height" content="140" />

@extends('layout.master')
@section('title', 'Draw No Bet')
@section('winning', 'active')
@section('levelCSS') @endsection

@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <br><br>
                    <h2 class="header" style="margin-top: 60px; margin-bottom: 40px;">
                        Draw No Bet
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">

                @include('partial.headerAd')

                <div class="col-sm-8 col-sm-offset-2 nopaddingsmall">

                    <div class="rolandthemes-circle-tabs">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Yesterday</a></li>
                            <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Today</a></li>
                            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Tomorrow</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane" id="home">
                                @if(count($yy)>0)
                                    <table class="table table-bordered table-striped text-center" style="font-size: 13px;">
                                        <thead>
                                        <tr style="color: orange; background: black">
                                            <th><center>Time</center></th>
                                            <th><center>League</center></th>
                                            <th><center>Fixture</center></th>
                                            <th><center>Tip</center></th>
                                            <th><center>Result</center></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($yy as $key => $item)
                                            <tr>
                                                <td>{{\Carbon\Carbon::parse($item->gameTime)->format('H:i')}}</td>
                                                <td>{{$item->league}}</td>
                                                <td>{{$item->teamOne}} <span>VS</span> {{$item->teamTwo}}</td>
                                                <td>{{$item->drawNoBet}}</td>
                                                <td><strong>{{$item->teamOneScore}}:{{$item->teamTwoScore}}</strong></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p><center>There was no tip here!</center></p>
                                @endif
                            </div>
                            <div role="tabpanel" class="tab-pane active" id="profile">

                                @if(count($tt)>0)
                                    <table class="table table-bordered table-striped text-center" style="font-size: 13px;">
                                        <thead>
                                        <tr style="color: orange; background: black">
                                            <th><center>Time</center></th>
                                            <th><center>League</center></th>
                                            <th><center>Fixture</center></th>
                                            <th><center>Tip</center></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tt as $key => $item)
                                            <tr>
                                                <td>{{\Carbon\Carbon::parse($item->gameTime)->format('H:i')}}</td>
                                                <td>{{$item->league}}</td>
                                                <td>{{$item->teamOne}} <span>VS</span> {{$item->teamTwo}}</td>
                                                <td>{{$item->drawNoBet}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p><center>Today's Tips are not available yet!</center></p>
                                @endif

                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages">
                                @if(count($tm)>0)
                                    <table class="table table-bordered table-striped text-center" style="font-size: 13px;">
                                        <thead>
                                        <tr style="color: orange; background: black">
                                            <th><center>Time</center></th>
                                            <th><center>League</center></th>
                                            <th><center>Fixture</center></th>
                                            <th><center>Tip</center></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($tm as $key => $item)
                                            <tr>
                                                <td>{{\Carbon\Carbon::parse($item->gameTime)->format('H:i')}}</td>
                                                <td>{{$item->league}}</td>
                                                <td>{{$item->teamOne}} <span>VS</span> {{$item->teamTwo}}</td>
                                                <td>{{$item->drawNoBet}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p><center>Tomorrow's Tips are not available yet!</center></p>
                                @endif
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="col-sm-12 text-justify">
                        <p>Draw No Bet [DNB] is a market offered by many online bookmakers. In this market, the draw result returns the full stake back to the players. In general, it is a safer option for punters.</p>
                        <br><br>
                    </div>
                </div>
                <div class="col-sm-12">
                    @include('partial.store')
                </div>
            </div>
        </div>
    </section>

@endsection

@section('levelJS') @endsection
