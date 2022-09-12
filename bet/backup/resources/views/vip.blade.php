<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>VIP Plans | Cleanodds.com</title>

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
    <meta property="og:title" content="VIP Plans | Cleanodds.com" />
    <meta property="og:description" content="Cleanodds is the best source of well-researched football predictions, analysis, and picks from experts.." />
    <meta property="og:image" content="https://www.cleanodds.com/cleanodds/images/r2-share.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="140" />
    <meta property="og:image:height" content="140" />

@extends('layout.master')
@section('title', 'VIP Packages')
@section('vip', 'active')
@section('levelCSS') @endsection

@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <br><br>
                    <h2 class="header" style="margin-top: 60px;">
                        VIP Packages
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container" style="background: #fff; padding: 20px 15px; margin-bottom: 20px; margin-top: 20px;">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    @if(session()->has('error'))
                        <div class="alert alert-warning"><h5>{!! session()->get('error') !!}</h5></div>
                        <hr>
                    @endif

                    <h4 class="alert alert-danger"><strong>SUPER VIP PLANS</strong></h4>
                    <div class="row">
                        <div class="col-sm-12">
                            @foreach($super as $key => $item)
                                <div class="col-sm-6">
                                    <div class="col-sm-12 vip-box">
                                        <h2>{{$item->planName}}</h2>
                                        <h4 style="color: #07ad6e;">
                                            N{{number_format($item->nairaPrice)}} / ${{number_format($item->dollarPrice)}} / TZS {{number_format($item->tzsPrice)}} / {{number_format($item->cedPrice)}} GHS /
                                            <br> KSH {{number_format($item->keshPrice)}} / UGX {{number_format($item->ugxPrice)}}
                                        </h4>
                                        <br>
                                        <p>{{$item->planBenefits}}</p>
                                        <br>

                                        <a href="{{route('/pay')}}/{{$item->category}}/{{$item->planName}}"><button class="btn btn-md btn-success">Subscribe to package</button></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <h4 class="alert alert-danger"><strong>MEGA VIP PLANS</strong></h4>
                    <div class="row">
                        <div class="col-sm-12">
                            @foreach($mega as $key => $item)
                                <div class="col-sm-6">
                                    <div class="col-sm-12 vip-box">
                                        <h2>{{$item->planName}}</h2>
                                        <h4 style="color: #07ad6e;">
                                            N{{number_format($item->nairaPrice)}} / ${{number_format($item->dollarPrice)}} / TZS {{number_format($item->tzsPrice)}} / {{number_format($item->cedPrice)}} GHS /
                                            <br> KSH {{number_format($item->keshPrice)}} / UGX {{number_format($item->ugxPrice)}}
                                        </h4>
                                        <br>
                                        <p>{{$item->planBenefits}}</p>
                                        <br>

                                        <a href="{{route('/pay')}}/{{$item->category}}/{{$item->planName}}"><button class="btn btn-md btn-success">Subscribe to package</button></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <h4 class="alert alert-danger"><strong>INVESTMENT SCHEME</strong></h4>
                    <p>This Scheme is reserved for investors looking to make meaningful profits from low odds accumulators. It has odds from 1.50 to 2.00. This Plan offers Football Predictions based on minimal risks with Over 90% Accuracy.</p>
                    <div class="row">
                        <div class="col-sm-12">
                            @foreach($investment as $key => $item)
                                <div class="col-sm-6">
                                    <div class="col-sm-12 vip-box">
                                        <h2>{{$item->planName}}</h2>
                                        <h4 style="color: #07ad6e;">
                                            N{{number_format($item->nairaPrice)}} / ${{number_format($item->dollarPrice)}} / TZS {{number_format($item->tzsPrice)}} / {{number_format($item->cedPrice)}} GHS /
                                            <br> KSH {{number_format($item->keshPrice)}} / UGX {{number_format($item->ugxPrice)}}
                                        </h4>
                                        <br>
                                        <p>{{$item->planBenefits}}</p>
                                        <br>

                                        <a href="{{route('/pay')}}/{{$item->category}}/{{$item->planName}}"><button class="btn btn-md btn-success">Subscribe to package</button></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
                    <script>
                        $(document).ready(function (){
                              if(window.location.href=="{{route('/vip_packages')}}?misc"){
                                $('html, body').animate({
                                    scrollTop: $("#miscCategory").offset().top
                                }, 2000);
                                return false;
                            }
                        });
                    </script>



                    <br><br>

                    <div id="miscCategory">
                    <h4 class="alert alert-danger" ><strong>PREMIUM SMS PLAN</strong></h4></div>
                     <p>Note:*The SMS package is only supported in countries such as Nigeria,Kenya,Uganda,Tanzania & Ghana </p>
                    <div class="row"  >
                        <div class="col-sm-12">
                            @foreach($sms as $key => $item)
                                <div class="col-sm-6">
                                    <div class="col-sm-12 vip-box">
                                        <h2>{{$item->planName}}</h2>
                                        <h4 style="color: #07ad6e;">
                                            N{{number_format($item->nairaPrice)}} {{-- / ${{number_format($item->dollarPrice)}} --}} / TZS {{number_format($item->tzsPrice)}} / {{number_format($item->cedPrice)}} GHS /
                                            <br> KSH {{number_format($item->keshPrice)}} / UGX {{number_format($item->ugxPrice)}}
                                        </h4>
                                        <br>
                                        <p>{{$item->planBenefits}}</p>
                                        <br>

                                        <a href="{{url('/pay_sms/'.$item->planName)}}{{-- /{{$item->category}}/{{$item->planName}} --}}"><button class="btn btn-md btn-success">Subscribe to package</button></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

@endsection

@section('levelJS') @endsection
