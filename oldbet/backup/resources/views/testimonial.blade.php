<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Recent Winnings | Cleanodds.com</title>

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
    <meta property="og:title" content="Recent Winnings | Cleanodds.com" />
    <meta property="og:description" content="Cleanodds is the best source of well-researched football predictions, analysis, and picks from experts.." />
    <meta property="og:image" content="https://www.cleanodds.com/cleanodds/images/r2-share.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="140" />
    <meta property="og:image:height" content="140" />

@extends('layout.master')
@section('title', 'Testimonials')
@section('winning', 'active')
@section('levelCSS') @endsection

@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <br><br>
                    <h2 class="header" style="margin-top: 60px; margin-bottom: 40px;">
                        Testimonials
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <?php $testimonials = \App\Focus\Modules\Prediction\Model\Prediction::where('display', '0')->where('testimonial', '1')->where('testimonialValue', '!=', '')->orderBy('updated_at', 'DESC')->paginate(40); ?>

                <div class="col-sm-8 col-sm-offset-2">
                    @if(count($testimonials)>0)
                        <table class="table table-bordered table-striped text-center" style="font-size: 13px;">
                            <thead>
                            <tr style="color: orange; background: black">
                                <th><center>Date</center></th>
                                <th><center>League</center></th>
                                <th><center>Fixture</center></th>
                                <th><center>Tip</center></th>
                                <th><center>Result</center></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($testimonials as $key => $item)
                                <tr>
                                    <td>{{\Carbon\Carbon::parse($item->gameDate)->format('d/m')}}</td>
                                    <td>{{$item->league}}</td>
                                    <td>{{$item->teamOne}} <span>VS</span> {{$item->teamTwo}}</td>
                                    <td style="background: #152e3d; color: white">{{$item->testimonialValue}}</td>
                                    <td><strong>{{$item->teamOneScore}}:{{$item->teamTwoScore}}</strong></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="alert alert-warning">NO TESTIMONIALS YET</p>
                    @endif
                        <hr>
                    {{$testimonials->render()}}
                </div>
            </div>
        </div>
    </section>

@endsection

@section('levelJS') @endsection
