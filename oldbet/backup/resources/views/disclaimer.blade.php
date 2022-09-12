<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Disclaimer | Cleanodds.com</title>

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
    <meta property="og:title" content="Disclaimer | Cleanodds.com" />
    <meta property="og:description" content="Cleanodds is the best source of well-researched football statistics, analysis, and predictions.." />
    <meta property="og:image" content="https://www.cleanodds.com/cleanodds/images/r2-share.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="140" />
    <meta property="og:image:height" content="140" />

@extends('layout.master')
@section('title', 'Disclaimer')
@section('disclaimer', 'active')
@section('levelCSS') @endsection

@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <br><br>
                    <h2 class="header" style="margin-top: 60px; margin-bottom: 40px;">
                        Disclaimer
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
                        Terms and Conditions of Use and Disclaimer
                    </blockquote>

                    <p>Cleanodds.com is a trading name of Vitek Web Solutions (a company registered in Nigeria, RC - 2886941)</p>
                    <p>Tips, predictions, and strategy published on this website are only our own opinions. They are not definite predictions or 'no lose' guaranteed strategies.</p>
                    <p>Bet at your own risk and bet sensibly. Don't bet more than you can afford to lose.</p>
                    <p>Cleanodds.com cannot be held responsible for the actions of its site's users. Any losses incurred through gambling are the sole responsibility of the user.</p>
                    <p>Betting is illegal in some countries, or areas of countries. It is the sole responsibility of the user to act in accordance with their local laws.</p>
                    <p>If you would like to reproduce any of the original material on this site please contact us and we will be happy to consider your request.</p>
                    <p>Any views or opinions expressed on this site are entirely the opinions of either Cleanodds.com or, in the instance of user voting or submission of views to public areas of the site such as message boards, the views of our visitors.</p>
                    <p>Any opinions expressed here about, but not limited to, strategy, bookmakers, and football predictions, are solely opinions and are not meant to be representative of a wider, inferred population.</p>
                    <p>Cleanodds.com does not publish football fixtures or fixture lists, and has no intention to do so. To the best of our knowledge we therefore do not breach any copyright on fixture publication, nor do hold any licence(s) to publish fixtures.</p>
                    <p>If you do believe that any data published on Cleanodds.com is in breach of copyright or trademark law, please contact us immediately and we will deal with your request.</p>
                    <p>To the best of our knowledge, all information presented on Cleanodds.com is accurate and up to date. However, we cannot be held responsible for inaccurate information or mis-calculations in our data.</p>

                    <br><br>

                </div>
            </div>
        </div>
    </section>

@endsection

@section('levelJS') @endsection
