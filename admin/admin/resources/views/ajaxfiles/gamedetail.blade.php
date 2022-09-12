<div class="row">
        <div class="col-md-6">
            <?php
$g11 = substr($game->teamOneForm, 0, 1);
$g12 = substr($game->teamOneForm, 1, 1);
$g13 = substr($game->teamOneForm, 2, 1);
$g14 = substr($game->teamOneForm, 3, 1);
$g15 = substr($game->teamOneForm, 4, 1);

$g21 = substr($game->teamTwoForm, 0, 1);
$g22 = substr($game->teamTwoForm, 1, 1);
$g23 = substr($game->teamTwoForm, 2, 1);
$g24 = substr($game->teamTwoForm, 3, 1);
$g25 = substr($game->teamTwoForm, 4, 1);
?>
            <style>
                .class1{color: white; background: green; padding: 3px 8px; border-radius: 100px; font-weight: bold;}
                .class2{color: green; background: yellow; padding: 4px 10px; border-radius: 100px; font-weight: bold;}
                .class3{color: white; background: red; padding: 3px 10px; border-radius: 100px; font-weight: bold;}
                .cont{margin-bottom: 0px; margin-top: 0px; text-align: center;}
            </style>

                <table class="table">
                    <tr>
                        <td><h3 class="cont">{{$game->teamOne}}</h3></td>
                        <td rowspan="3" style="background: darkgreen; color: red; text-align: center" valign="bottom">VS</td>
                        <td><h3 class="cont">{{$game->teamTwo}}</h3></td>
                    </tr>
                    <tr>
                        <td>
                            @if($g11=='W') <span class="class1">{{$g11}}</span>    @elseif ($g11=='D') <span class="class2">{{$g11}}</span>
                            @else    <span class="class3">{{$g11}}</span>   @endif

                            @if($g12=='W') <span class="class1">{{$g12}}</span> @elseif ($g12=='D') <span class="class2">{{$g12}}</span>
                            @else     <span class="class3">{{$g12}}</span>    @endif

                            @if($g13=='W') <span class="class1">{{$g13}}</span> @elseif ($g13=='D') <span class="class2">{{$g13}}</span>
                            @else     <span class="class3">{{$g13}}</span>    @endif

                            @if($g14=='W') <span class="class1">{{$g14}}</span> @elseif ($g14=='D') <span class="class2">{{$g14}}</span>
                            @else     <span class="class3">{{$g14}}</span>    @endif

                            @if($g15=='W') <span class="class1">{{$g15}}</span> @elseif ($g15=='D') <span class="class2">{{$g15}}</span>
                            @else     <span class="class3">{{$g15}}</span>    @endif
                        </td>
                        <td>
                            @if($g21=='W') <span class="class1">{{$g21}}</span>    @elseif ($g21=='D') <span class="class2">{{$g21}}</span>
                            @else    <span class="class3">{{$g21}}</span>   @endif

                            @if($g22=='W') <span class="class1">{{$g22}}</span> @elseif ($g22=='D') <span class="class2">{{$g22}}</span>
                            @else     <span class="class3">{{$g22}}</span>    @endif

                            @if($g23=='W') <span class="class1">{{$g23}}</span> @elseif ($g23=='D') <span class="class2">{{$g23}}</span>
                            @else     <span class="class3">{{$g23}}</span>    @endif

                            @if($g24=='W') <span class="class1">{{$g24}}</span> @elseif ($g24=='D') <span class="class2">{{$g24}}</span>
                            @else     <span class="class3">{{$g24}}</span>    @endif

                            @if($g25=='W') <span class="class1">{{$g25}}</span> @elseif ($g25=='D') <span class="class2">{{$g25}}</span>
                            @else     <span class="class3">{{$g25}}</span>    @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 120%;"><strong>ODDS: </strong>{{$game->teamOneOdds}}</td>
                        <td style="font-size: 120%;"><strong>ODDS: </strong>{{$game->teamTwoOdds}}</td>
                    </tr>
                    @if($game->teamOneWon=='')
                        <tr>
                            <td colspan="3" style="background: darkgreen; color: red; text-align: center"><center>RESULT NOT YET ADDED</center></td>
                        </tr>
                        @else
                        <tr>
                            <td style="background: darkgreen; color: red;"><b>Score: </b> {{$game->teamOneScore}}</td>
                            <td style="background: darkgreen; color: red;"><center></center></td>
                            <td style="background: darkgreen; color: red;"><b>Score: </b> {{$game->teamTwoScore}}</td>
                        </tr>
                    @endif
                    @if($game->cornerStatus=='1')
                        <tr>
                            <th>Corner Result</th>
                            <td></td>
                            <td>{{$game->cornerResult}}</td>
                        </tr>
                    @endif
                </table>
                <hr>
            <table class="table table-striped">
                @if($game->gameType=='0')
                    <tr>            <th>FREE EXPERT TIPS</th>            <td>{{$game->freePick}}</td>        </tr>
                    <tr>            <th>UPCOMING PICKS</th>            <td>{{$game->upcomingGame}}</td>        </tr>
                    <tr>            <th>FULL-TIME RECOMMEND.</th>            <td>{{$game->FTRecommendation}}</td>        </tr>
                    {{-- <tr>            <th>DOUBLE CHANCE</th>            <td>{{$game->doubleChance}}</td>        </tr> --}}
                @else
                    <tr>            <th>SURE 2 ODDS</th>            <td>{{$game->sure2Odds}} @if($game->sure2Odds=='Yes') ({{$game->sure2OddsTip}} - {{$game->sure2OddsOdds}} Odd) @endif</td>        </tr>
                    <tr>            <th>SURE 3 ODDS</th>            <td>{{$game->sure3Odds}} @if($game->sure3Odds=='Yes') ({{$game->sure3OddsTip}} - {{$game->sure3OddsOdds}} Odd) @endif</td>        </tr>
                    <tr>            <th>SURE 5 ODDS</th>            <td>{{$game->sure5Odds}} @if($game->sure5Odds=='Yes') ({{$game->sure5OddsTip}} - {{$game->sure5OddsOdds}} Odd) @endif</td>        </tr>
                    {{-- <tr>            <th>OVER 3.5 GOALS</th>            <td>{{$game->overThree}} @if($game->overThree=='Yes') ({{$game->overThreeOdds}} Odd) @endif</td>        </tr> --}}
                @endif
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-striped">
                @if($game->gameType=='0')
                    {{-- <tr>            <th>1.5 GOALS</th>            <td>{{$game->oneFiveGoals}}</td>        </tr> --}}
                    {{-- <tr>            <th>2.5 GOALS</th>            <td>{{$game->twoFiveGoals}}</td>        </tr> --}}
                    {{-- <tr>            <th>BTTS/GG</th>            <td>{{$game->BTTS}}</td>        </tr> --}}
                    {{-- <tr>            <th>SINGLE BETS</th>            <td>{{$game->singleBets}}</td>        </tr> --}}
                    {{-- <tr>            <th>DRAW NO BET</th>            <td>{{$game->drawNoBet}}</td>        </tr> --}}
                    {{--<tr>            <th>DRAWS</th>            <td>{{$game->draws}}</td>        </tr>--}}
                    {{-- <tr>            <th>WIN EITHER HALF</th>            <td>{{$game->winEitherHalf}}</td>        </tr> --}}
                    {{-- <tr>            <th>Under 3.5 Goals</th>            <td>{{$game->halfTimeResults}}</td>        </tr> --}}
                    {{-- <tr>            <th>BANKER OF D DAY</th>            <td>{{$game->bankerOfTheDay}}</td>        </tr> --}}
                @else
                    {{-- <tr>            <th>BTTS/GG</th>            <td>{{$game->btts_gg}} @if($game->btts_gg=='Yes') ({{$game->bttsTip}} - {{$game->drawsOdds}} Odd) @endif</td>        </tr>
                    <tr>            <th>SINGLE BETS</th>            <td>{{$game->singleBets}} @if($game->singleBets=='Yes') ({{$game->singleBetsTip}} - {{$game->singleBetsOdds}} Odd) @endif</td>        </tr>
                    <tr>            <th>WEEKEND TIPS</th>            <td>{{$game->weekendTips}} @if($game->weekendTips=='Yes') ({{$game->weekendTipsTip}} - {{$game->weekendTipsOdds}} Odd) @endif</td>        </tr>
                    <tr>            <th>MATCH CORNERS</th>            <td>{{$game->matchCorners}} @if($game->matchCorners=='Yes') ({{$game->matchCornersTip}} - {{$game->matchCornersOdds}} Odd) @endif</td>        </tr>
                    <tr>            <th>SURE 20 Odds</th>            <td>{{$game->correctScore}} @if($game->correctScore=='Yes') ({{$game->correctScoreTip}} - {{$game->correctScoreOdds}} Odd) @endif</td>        </tr>
                    <tr>            <th>EXPERT ACCA</th>            <td>{{$game->acca}} @if($game->acca=='Yes') ({{$game->accaTip}} - {{$game->accaOdds}} Odd) @endif</td>        </tr>
                    <tr>            <th>DRAWS</th>            <td>{{$game->draws}} @if($game->draws=='Yes') ({{$game->drawsOdds}} - {{$game->drawsOdds}} Odd) @endif</td>        </tr>
                    <tr>            <th>HT/FT TIPS</th>            <td>{{$game->HTFT}} @if($game->HTFT!='') ({{$game->HTFTOdds}} Odd) @endif</td>        </tr> --}}


                    <tr>            <th>TODAY'S VIP TIPS</th>            <td>{{$game->tvt}} @if($game->tvt=='Yes') ({{$game->tvtTips}} - {{$game->tvtOdds}} Odd) @endif</td>        </tr>
                    <tr>            <th>TODAY'S VVIP TIPS</th>            <td>{{$game->tvvt}} @if($game->tvvt=='Yes') ({{$game->tvvtTips}} - {{$game->tvvtOdds}} Odd) @endif</td>        </tr>

                    <tr>            <th>TODAY'S ORDINARY TIPS</th>            <td>{{$game->tot}} @if($game->tot=='Yes') ({{$game->totTips}} - {{$game->totOdds}} Odd) @endif</td>        </tr>
                    <tr>            <th>FRIDAY'S VIP TIPS</th>            <td>{{$game->frivt}} @if($game->frivt=='Yes') ({{$game->frivtTips}} - {{$game->frivtOdds}} Odd) @endif</td>        </tr>
                    <tr>            <th>SATURDAY'S VIP TIPS</th>            <td>{{$game->satvt}} @if($game->satvt=='Yes') ({{$game->satvtTips}} - {{$game->satvtOdds}} Odd) @endif</td>        </tr>
                    <tr>            <th>SUNDAY'S VIP TIPS</th>            <td>{{$game->sunvt}} @if($game->sunvt=='Yes') ({{$game->sunvtTips}} - {{$game->sunvtOdds}} Odd) @endif</td>        </tr>

                    <tr>            <th>WEEKEND TIPS</th>            <td>{{$game->weekendTips}} @if($game->weekendTips=='Yes') ({{$game->weekendTipsTip}} - {{$game->weekendTipsOdds}} Odd) @endif</td>        </tr>
                    <tr>            <th style="color: red;">INVESTMENT TIPS</th>            <td>{{$game->superInvestment}} @if($game->superInvestment=='Yes') ({{$game->superInvestmentTip}} - {{$game->superInvestmentOdds}} Odd) @endif</td>        </tr>
                @endif
                <tr>            <th>TESTIMONIAL</th>            <td>{{$game->testimonialValue}}</td>        </tr>
            </table>
        </div>
</div>
