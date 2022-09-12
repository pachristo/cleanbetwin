<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Frequently asked question | Cleanodds.com</title>

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
    <meta property="og:title" content="Frequently asked question | Cleanodds.com" />
    <meta property="og:description" content="Cleanodds is the best source of well-researched football predictions, analysis, and picks from experts.." />
    <meta property="og:image" content="https://www.cleanodds.com/cleanodds/images/r2-share.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="140" />
    <meta property="og:image:height" content="140" />

@extends('layout.master')
@section('title', 'FAQs')
@section('faq', 'active')
@section('levelCSS') @endsection

@section('body')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <br><br>
                    <h2 class="header" style="margin-top: 60px; margin-bottom: 40px;">
                        Frequently asked question (FAQ)
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 text-justify" style="margin-bottom: 30px;">

                    {{--<ul id="accordion" class="col-sm-6 col-md-12">--}}
                        {{--<!-- Question one -->--}}
                        {{--<li>--}}
                            {{--<div id="choose" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >--}}
                                {{--How often do you upgrade the system ?--}}
                                {{--<span class="fa fa-chevron-up fa-1x text-info pull-right"></span>--}}
                            {{--</div>--}}
                            {{--<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">--}}
                                {{--<div class="card-body">--}}
                                    {{--Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    <h2>1. What is the best Football Prediction website in the world?</h2>
                    <p>Cleanodds is the best football prediction service in the world, Cleanodds carefully analyze all aspects of football matches to ensure the football predictions are as accurate as possible, and also provide value for our users</p>
                    <br>
                    <h2>2. Where can I get free Football Predictions?</h2>
                    <p>Cleanodds offers accurate football predictions, selected by football experts and gurus to ensure you place guided bets and make maximum wins and profits.</p>
                    <br>
                    <h2>3. What are 1.5 Goals Football Predictions?</h2>
                    <p>It is expected all football predictions in this category, have at least two goals or more by Full Time (90-minutes).</p>
                    <br>
                    <h2>4. What are Double chance Football Predictions?</h2>
                    <p>Double Chance football predictions allows you to make selections covering two out of three possible outcomes (Home - Draw - Away) in any football match. A (1X) Prediction indicates a Home Win or Draw, whereas a (X2) Prediction means Away Win or Draw. You win if the third outcome does not occur.</p>
                    <br>
                    <h2>5. What are Correct Score Football Predictions?</h2>
                    <p>These football predictions are selected with the expected score line after Full-Time (90-minutes). It is difficult to forecast the score line hence why bookmakers set very high odds for this market, but our experts ensure our customers get value.</p>
                    <br>
                    <h2>6. What are First Half Results Football Predictions?</h2>
                    <p>This Prediction category is divided into two sections:</p>
                    <p>First Half Wins: Football Predictions in this section have a team that is expected to win the first half.</p>
                    <p>Prediction (1) means Home team to win 1st Half, while (2) indicates Away team to win 1st Half.</p>
                    <p>First Half Draws: Football predictions in this section are expected to end as a draw in the first half.</p>
                    <br>
                    <h2>7. What are Draws Football Predictions?</h2>
                    <p>Football predictions in this category have a very high probability of ending in a draw at Full-Time (90-minutes).</p>
                    <br>
                    <h2>8. What is Weekend Football predictions?</h2>
                    <p>These Football predictions start from Friday and end on Sunday. It is a combination of matches with various Market, Predictions that could make your weekend.</p>
                    <br>
                    <h2>9. What are Both Teams to Score Football predictions?</h2>
                    <p>Football Predictions displayed in this category have teams that are expected to score at least one goal against their opponent by Full-Time (90 mins). Predictions indicates we are sure to see both teams score in the match.</p>
                    <br>
                    <h2>10. What are 2.5 Goals Football Predictions?</h2>
                    <p>These are Football Predictions that sets a benchmark of the number of goals scored in a match. An (UNDER) Football Prediction indicates that less than 3-goals will be scored by Full-Time (90-minutes). Whereas an (OVER) Football Prediction means that more than 2-goals will be scored by Full-Time. That is the match will end in 3 goals or more.</p>
                    <br>
                    <h2>11. What is Under 1.5 Half-Time Football Predictions?</h2>
                    <p>Football Predictions under 1.5 goals at half-time there must be 1 or 0 goals scored in the first half</p>
                    <br>
                    <h2>12. What are Win Either Halves Football Predictions?</h2>
                    <p>These are Football Predictions which shows matches whereby a team is expected to win at one half (1st Half or 2nd Half) regardless of the full-time result. A (1) Prediction means the Home team will win one half, and a (2) indicates that the Away team will win either half.</p>
                    <br>
                    <h2>13. What does 1X2 mean?</h2>
                    <p>1-tip on home team winning, X-tip on tie, 2-tip on visiting team winning, 1X- tip on home team not losing, X2-tip on visiting team not losing.</p>
                    <br>
                    <h2>14. What is Banker Of The Day Predictions?</h2>
                    <p>These Football Predictions has winning rate of 70-90%, selected from experts predictions of the day and It is completely free.</p>
                    <br>
                    <h2>15. What are First Half Goals Football Predictions?</h2>
                    <p>These are recommended football predictions, First Halves are expected to end over the stated goal number. In the Over 0.5 Goals section, a (OVER) Prediction means at least 1-goal will be scored in the 1st Half. While in the Over 1.5 Goals section, a (OVER) Prediction means at least 2-goals will be scored in 1st Half of the match.</p>
                    <br>
                    <h2>16. What are Half/Full Time Football Predictions?</h2>
                    <p>These are football Predictions where the expected results are forecasted for the 1st Half & 2nd Half. A (1/1) Prediction means the Home team will win at Half-Time and Full-Time, while a (X/X) Prediction means both teams will draw at Half-Time and draw at Full-Time. Finally, a (2/2) Prediction means the Away team will win at Half-Time and Full-Time.</p>
                    <br>
                    <h2>17. What are Highest Scoring Half Football Predictions?</h2>
                    <p>These are Football Predictions which half will have the highest number of goals in selected matches. A (1) Prediction means most goals will be scored in the 1st Half, while (X) Prediction means both Halves will have equal number of goals scored. Finally, a (2) Prediction means the 2nd Half will have the highest number of goals.</p>
                    <br>
                    <h2>18. What are Multi Goal Football Predictions?</h2>
                    <p>These are Football Predictions that offers predictions for the total number of goals scored in a match after Full-Time (90-minutes) based on different ranges offered. For example a (2-5) Prediction means the total number of goals scored by Full-Time will be from 2 to 5 goals. So anything less than 2-goals or more than 5-goals is an unsuccessful outcome.</p>

                </div>
            </div>
        </div>
    </section>

@endsection

@section('levelJS')
    <script>
        $(document).ready(function () {
            $(function(){
                //$(".chevron-down").
                $("div[data-toggle=collapse]").click(function(){
                    $(this).children('span').toggleClass("fa-chevron-down fa-chevron-up");
                });
            })
        });
    </script>
@endsection
