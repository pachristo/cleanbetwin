<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Select Country | Cleanodds.com</title>

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
    <meta property="og:title" content="Select Country | Cleanodds.com" />
    <meta property="og:description" content="Cleanodds is the best source of well-researched football statistics, analysis, and predictions.." />
    <meta property="og:image" content="https://www.cleanodds.com/cleanodds/images/r2-share.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="140" />
    <meta property="og:image:height" content="140" />

@extends('layout.master')
@section('title', 'Select Your Country')
@section('vip', 'active')
@section('levelCSS') @endsection

@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <br><br>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container" style="background: #fff; padding: 40px 15px; margin-bottom: 20px; margin-top: 20px;">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 text-justify section-head">
                    <br>
                    <h2 style="color: black;" class="well">Set Your Country</h2>
                    <div class="clear"></div>
                    <p>Kindly select your country below to customize your payment options. (You will only do this once).</p>
                    <hr>
                    <form action="{{route('/country')}}" id="countryForm" method="post">
                        <div class="form-group">
                            <select name="country" class="form-control crs-country" data-region-id="one" data-default-value="{{currentUser()->country}}" required id=""></select>
                        </div>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <button class="btn btn-md btn-success btn-block" id="countryBtn">PROCEED <i class="fa fa-arrow-circle-o-right"></i></button>
                        </div>
                    </form>
                    <br><br>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('levelJS')
    <script>
        $(document).ready(function () {
            $('#countryForm').submit(function (e) {
                e.preventDefault();
                $('#countryBtn').prop('disabled', true).html("SETTING COUNTRY <i class='fa fa-spinner fa-spin'></i>");
                var url =  $(this).attr('action');
                var method = $(this).attr('method');
                var formData = $(this).serialize();

                $.ajax({
                    type: method,
                    url: url,
                    data: formData,
                    dataType: "JSON",
                    success: function (data) {
                        if (data.status == 1) {
                            $('#countryBtn').prop('disabled', false).html("PROCEED <i class='fa fa-arrow-circle-right'></i>");
                            swal(data.post, '', 'warning');
                        }
                        else {
                            window.location.href="{{$url}}";
                        }
                    },
                    failure: function (e) {
                        swal('OOPS! SOMETHING IS BROKEN', 'Reloading Page', 'danger');
                        location.reload();
                    }
                })
            });
        });
    </script>
@endsection
