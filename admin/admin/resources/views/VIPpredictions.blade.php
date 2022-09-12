@extends('layouts.master')

@section('title')
    CLEANODDS | ALL VIP PREDICTIONS
@endsection
@section('page')
    VIP Predictions
@endsection
@section('content')

    <div class="col" style="min-height: 323px;;">
        <br><br>
        <?php
        $date = new dateTime();
        $d = $date->format('j F, Y');
        ?>
        {{ $allprediction->render() }}
        <table id="datatable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>REL</th>
                    <th>Match Date</th>
                    <th>League</th>
                    <th></th>
                    <th class="red" style="background: #b1f10c; text-align: center"></th>
                    <th></th>
                    {{-- <th>Draw Odd</th> --}}
                    <th>Presence</th>
                    <th>Result</th>
                    <th>Details</th>
                    <th>Controls</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sn = 0;
                ?>
                @foreach ($allprediction->all() as $prediction)
                    <?php
                    $sn++;
                    ?>
                    <tr id="pred{{ $prediction->id }}" @if ($prediction->teamOneWon != '') style="background: lightgreen; color: darkgreen" @endif>
                        <td class="red">{{ $sn }}</td>
                        <td>
                            {{ $prediction->gameDate }} <br>
                            {{ $prediction->gameTime }}
                        </td>
                        <td>{{ $prediction->league }}</td>
                        <td>{{ $prediction->teamOne }}</td>
                        <td class="red" style="background: #b1f10c; text-align: center; font-weight: bold">VS</td>

                        <td>{{ $prediction->teamTwo }}</td>
                        {{-- <td>{{$prediction->drawOdd}}</td> --}}
                        <td>
                            <div class="tags">
                                <small>

                                    @if ($prediction->sure2Odds == 'Yes') <span class="tag">2 ODDS :{{ $prediction->sure2OddsTip }} - ({{ $prediction->sure2OddsOdds }} Odd) </span>@endif
                                    @if ($prediction->sure3Odds == 'Yes') <span class="tag"> 5 ODDS :{{ $prediction->sure3OddsTip }} - ({{ $prediction->sure3OddsOdds }} Odd) </span>@endif
                                    {{-- @if ($prediction->sure5Odds == 'Yes') <span class="tag"> 10 ODDS : {{ $prediction->sure5OddsTip }} - ({{ $prediction->sure5OddsOdds }} Odd) </span>@endif --}}

                                    @if ($prediction->tvt == 'Yes') <span class="tag">TODAY'S VIP TIPS :{{ $prediction->tvtTips }} - ({{ $prediction->tvtOdds }} Odd) </span>@endif
                                    @if ($prediction->tvvt == 'Yes') <span class="tag">TODAY'S VVIP TIPS :{{ $prediction->tvvtTips }} - ({{ $prediction->tvvtOdds }} Odd) </span>@endif
                                    @if ($prediction->tot == 'Yes') <span class="tag">TODAY'S ORDINARY TIPS :{{ $prediction->totTips }} - ({{ $prediction->totOdds }} Odd) </span> @endif

                                    @if ($prediction->frivt == 'Yes') <span class="tag">FRIDAY'S VIP TIPS : {{ $prediction->frivtTips }} - ({{ $prediction->frivtOdds }} Odd) </span>@endif
                                    @if ($prediction->satvt == 'Yes') <span class="tag">SATURDAY'S VIP TIPS :{{ $prediction->satvtTips }} - ({{ $prediction->satvtOdds }} Odd) </span> @endif
                                    @if ($prediction->sunvt == 'Yes') <span class="tag">SUNDAY'S VIP TIPS : {{ $prediction->sunvtTips }} - ({{ $prediction->sunvtOdds }} Odd) </span> @endif



                                    {{-- @if ($prediction->sure2Odds == 'Yes') <span class="tag">2 Odds: <strong>{{$prediction->sure2OddsTip}} - ({{$prediction->sure2OddsOdds}})</strong></span> @endif
                                @if ($prediction->sure3Odds == 'Yes') <span class="tag">3 Odds: <strong>{{$prediction->sure3OddsTip}} - ({{$prediction->sure3OddsOdds}})</strong></span> @endif
                                @if ($prediction->sure5Odds == 'Yes') <span class="tag">5 Odds: <strong>{{$prediction->sure5OddsTip}} - ({{$prediction->sure5OddsOdds}})</strong></span> @endif --}}
                                    {{-- @if ($prediction->overThree != 'No') <span class="tag">Over 3.5 Goals - ({{$prediction->overThreeOdds}})</span> @endif --}}
                                    @if ($prediction->superSingle == 'Yes') <span class="tag">Sup. Single: <strong>{{ $prediction->superSingleTip }} - ({{ $prediction->superSingleOdds }})</strong></span> @endif
                                    @if ($prediction->fiftyPlus == 'Yes') <span class="tag">50 Odds: <strong>{{ $prediction->fiftyPlusTip }} - ({{ $prediction->fiftyPlusOdds }})</strong></span> @endif
                                    @if ($prediction->btts_gg == 'Yes') <span class="tag">BTTS/GG: <strong>{{ $prediction->bttsTip }} - ({{ $prediction->bttsOdds }})</strong></span> @endif
                                    @if ($prediction->weekendTips == 'Yes') <span class="tag">Weekend: <strong>{{ $prediction->weekendTipsTip }} - ({{ $prediction->weekendTipsOdds }})</strong></span> @endif
                                    @if ($prediction->draws == 'Yes') <span class="tag">Draws: <strong>{{ $prediction->drawsTip }} - ({{ $prediction->drawsOdds }})</strong></span> @endif
                                    @if ($prediction->singleBets == 'Yes') <span class="tag">Single Bets: <strong>{{ $prediction->singleBetsTip }} - ({{ $prediction->singleBetsOdds }})</strong></span> @endif
                                    @if ($prediction->matchCorners == 'Yes') <span class="tag">Match Corners: <strong>{{ $prediction->matchCornersTip }} - ({{ $prediction->matchCornersOdds }})</strong></span> @endif
                                    @if ($prediction->correctScore == 'Yes') <span class="tag">Sure 20 Odds: <strong>{{ $prediction->correctScoreTip }} - ({{ $prediction->correctScoreOdds }})</strong></span> @endif
                                    @if ($prediction->acca == 'Yes') <span class="tag">Expert ACCA: <strong>{{ $prediction->accaTip }} - ({{ $prediction->accaOdds }})</strong></span> @endif
                                    @if ($prediction->HTFT != '') <span class="tag">HT/FT: <strong>{{ $prediction->HTFT }} - ({{ $prediction->HTFTOdds }})</strong></span> @endif
                                    @if ($prediction->superInvestment == 'Yes') <span class="tag" style="background: red;">Investment: <strong>{{ $prediction->superInvestmentTip }} - ({{ $prediction->superInvestmentOdds }})</strong></span> @endif
                                </small>
                            </div>
                        </td>
                        <td>@if ($prediction->teamOneWon) {{ $prediction->teamOneScore }} : {{ $prediction->teamTwoScore }} @endif</td>
                        <td><a class="gameview" href=""
                                data-url="{{ route('/gamedetails') }}/{{ $prediction->id }}/Prediction"
                                data-target="#gamedetail" data-toggle="modal"><span style="color: green;"><span
                                        class="fa fa-eye"></span> VIEW</span></a></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    Actions
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right" role="menu"
                                    style="background: whitesmoke; -webkit-box-shadow: inset 0px 0px 10px grey;-moz-box-shadow: inset 0px 0px 10px grey;box-shadow: inset 0px 0px 10px grey;">
                                    {{-- <li style="cursor: pointer;"><a style="color: red;" class="archiveGame" data-id="{{$prediction->id}}">ARCHIVE THIS</a> --}}
                                    <li style="cursor: pointer;"><a class="updategame" data-in="Prediction" href=""
                                            data-url="{{ route('/updateVIPprediction') }}/{{ $prediction->id }}/Prediction"
                                            data-target="#updategame" data-toggle="modal">EDIT/UPDATE</a>
                                    <li style="cursor: pointer;"><a class="addresult" href=""
                                            data-url="{{ route('/addresult') }}/{{ $prediction->id }}"
                                            data-target="#addresult" data-toggle="modal">ADD RESULT & TESTIMONIAL</a>

                                        @if ($prediction->display == '0')
                                    <li style="cursor: pointer;"><a class="hided" data-in="Prediction" href=""
                                            data-url="{{ route('/ajaxhide') }}/{{ $prediction->id }}/Prediction"
                                            id="h{{ $prediction->id }}">UNPUBLISH</a>
                                    @else
                                    <li style="cursor: pointer;"><a class="unhide" data-in="Prediction" href=""
                                            data-url="{{ route('/ajaxunhide') }}/{{ $prediction->id }}/Prediction"
                                            id="h{{ $prediction->id }}"><span style="color: green;">PUBLISH</span></a>
                @endif

                <li style="cursor: pointer;"><a class="gamedelete" data-in="Prediction"
                        data-url="{{ route('/ajaxgamedelete') }}/{{ $prediction->id }}/Prediction" data-id=""
                        href="">DELETE</a>
                </li>
                </ul>
    </div>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    {{ $allprediction->render() }}
    </div>

@endsection
