<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Over 2.5 Goals | Cleanodds.com</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
        <meta name="keywords" content="Over 2.5 prediction, Under 2.5, free football prediction" />
        <meta name="description"content="Over 2.5 prediction, Under 2.5 goals and both teams to score tips. All matches are predicted using unique mathematical algorithm by our experts.."/>
        <meta property="article:publisher" content="https://www.facebook.com/cleanoddss/" />

<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link rel="icon" href="{{asset('images/favicon.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="images/favicon.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/favicon.png">
    <meta property="og:url" content="https://www.cleanodds.com/" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Over 2.5 Goals | Cleanodds.com" />
    <meta property="og:description" content="Over 2.5 prediction, Under 2.5 goals and both teams to score tips. All matches are predicted using unique mathematical algorithm by our experts" />
    <meta property="og:image" content="https://www.cleanodds.com/cleanodds/images/r2-share.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="140" />
    <meta property="og:image:height" content="140" />

@extends('layout.master')
@section('title', '2.5 Goals')
@section('winning', 'active')
@section('levelCSS') @endsection

@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <br><br>
                    <h2 class="header" style="margin-top: 60px; margin-bottom: 40px;">
                        2.5 Goals
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
                                                <td>{{$item->twoFiveGoals}}</td>
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
                                                <td>{{$item->twoFiveGoals}}</td>
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
                                                <td>{{$item->twoFiveGoals}}</td>
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
                        <p>Over 2.5 tips and Under 2.5 goals predictions for today are listed here. Bets on Over 2.5 goals market are accurate when 3 or more goals in a match are scored, regardless of which team scores. Conversely, bets on the under 2.5 goals market win where 2 goals or less are scored.</p>
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
