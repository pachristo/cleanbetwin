@extends('layouts.master')

@section('title')
    CLEANODDS | NEW VIP PREDICTION
@endsection

@section('page')
    New VIP Prediction
@endsection

@section('content')
    <div class="col" style="min-height: 323px;">
        <br><br>
        <?php
$date = new dateTime();
$d = $date->format('j F, Y');
?>

        <form method="POST" action="{{route('/loadPrediction')}}" id="predictionForm">
            <div class="row">
                <div class="col-md-5 col-xs-12" style="background: whitesmoke; padding: 15px;">
                    <div class="form-group col-xs-12">
                        <input type="text" name="teamOne" class="form-control" placeholder="TEAM ONE *" required>
                        <input type="hidden" value="1" name="gameType" required>
                    </div>
                    <div class="form-group col-md-6 col-xs-12">
                        <label for="team1odd">FORM</label>
                        <input type="text" name="teamOneForm" placeholder="eg. WWWLD" class="form-control" maxlength="5">
                    </div>
                    <div class="form-group col-md-6 col-xs-12">
                        <label for="team1odd">ODDS</label>
                        <input type="text" name="teamOneOdds" placeholder="eg. 1.5" class="form-control">
                    </div>
                </div>

                <div class="col-md-2 col-xs-12" style="margin: 10px 0px; background: grey; border-radius: 0px 0px 8px 8px;"><center><span style="padding: 5px 10px; background: grey; color: white; border-radius: 100px; margin-top: -30px;">VS</span></center>
                    <br>
                    {{--<div class="form-group">--}}
                        {{--<input class="form-control" name="drawOdd" type="text" placeholder="DRAW ODD">--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <input class="form-control" name="gameDate" id="matchdate" type="text" placeholder="MATCH DATE *" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="gameTime" id="matchtime" type="text" placeholder="MATCH TIME *" required>
                    </div>
                    <div class="form-group">
                        <select name="league" class="form-control select2" required>
                            <option value="">SELECT LEAGUE *</option>
                            @foreach($allLeagues as $leagues)
                                <option value="{{$leagues->code}}">{{$leagues->league}} ({{$leagues->code}})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-5 col-xs-12" style="background: whitesmoke; padding: 15px;">
                    <div class="form-group col-xs-12">
                        <input type="text" name="teamTwo" class="form-control" placeholder="TEAM TWO *" required>
                    </div>

                    <div class="form-group col-md-6 col-xs-12">
                        <label for="team1odd">FORM</label>
                        <input type="text" name="teamTwoForm" placeholder="eg. WWWLD" class="form-control" maxlength="5">
                    </div>
                    <div class="form-group col-md-6 col-xs-12">
                        <label for="team1odd">ODDS</label>
                        <input type="text" name="teamTwoOdds" placeholder="eg. 1.5" class="form-control">
                    </div>
                </div>
            </div>
            {{--<hr>--}}
            <h4>SUPER VIP PACKAGE TIPS</h4>
            <div class="row">
                <div class="form-group col-md-4 bg-danger" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>SURE 2 ODDS</label>
                            <select name="sure2Odds" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="sure2OddsTip" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="sure2OddsOdds" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 bg-success" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>SURE 3 ODDS</label>
                            <select name="sure3Odds" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="sure3OddsTip" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="sure3OddsOdds" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 bg-danger" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>OVER 3.5 GOALS</label>
                            <select name="overThree" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>ODD</label>
                            <input type="text" name="overThreeOdds" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 bg-success" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>BTTS/GG</label>
                            <select name="btts_gg" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <select name="bttsTip" class="form-control">
                                <option value="BTTS" selected>BTTS</option>
                                <option value="NG">NG</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="bttsOdds" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 bg-danger" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>DRAWS</label>
                            <select name="draws" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="drawsTip" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="drawsOdds" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 bg-success" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>WEEKEND TIPS</label>
                            <select name="weekendTips" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="weekendTipsTip" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="weekendTipsOdds" class="form-control">
                        </div>
                    </div>
                </div>


            </div>
            <hr>
            <h4>MEGA VIP PACKAGE TIPS</h4>
            <div class="row">
                <div class="form-group col-md-4 bg-danger" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>SURE 5 ODDS</label>
                            <select name="sure5Odds" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="sure5OddsTip" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="sure5OddsOdds" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 bg-success" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>SINGLE BETS</label>
                            <select name="singleBets" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="singleBetsTip" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="singleBetsOdds" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 bg-danger" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>MATCH CORNERS</label>
                            <select name="matchCorners" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="matchCornersTip" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="matchCornersOdds" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 bg-success" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Sure 20 odds</label>
                            <select name="correctScore" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="correctScoreTip" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="correctScoreOdds" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 bg-danger" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>EXPERT ACCA</label>
                            <select name="acca" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="accaTip" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="accaOdds" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4 bg-success" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>HT/FT TIPS</label>
                            <select name="HTFT" class="form-control">
                                <option value="1/1">1/1</option>
                                <option value="1/X">1/X</option>
                                <option value="1/2">1/2</option>
                                <option value="X/1">X/1</option>
                                <option value="X/2">X/2</option>
                                <option value="X/X">X/X</option>
                                <option value="2/1">2/1</option>
                                <option value="2/2">2/2</option>
                                <option value="2/X">2/X</option>
                                <option value="" selected>*-*-*-*-*-*-*-*-*-</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>ODD</label>
                            <input type="text" name="HTFTOdds" class="form-control">
                        </div>
                    </div>
                </div>
                {!! csrf_field() !!}
            </div>

            <hr>
            <h4>SUPER INVESTMENT TIPS</h4>
            <div class="row">
                <div class="form-group col-md-12 bg-success" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>INVESTMENT TIP</label>
                            <select name="superInvestment" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="superInvestmentTip" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="superInvestmentOdds" class="form-control">
                        </div>
                    </div>
                </div>
                <div id="pstatus" class="col-xs-6"></div>
                <div class="form-group col-sm-12">
                    <button class="btn btn-md btn-success" name="submit" id="predictionBtn">SUBMIT PREDICTION</button>
                </div>
            </div>
        </form>
    </div>
@endsection