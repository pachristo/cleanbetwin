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
          
            <div class="row">
                <div class="form-group col-md-6 " >
                    <h4>Sure 2 Package</h4>
                    <div class="row bg-danger " style="padding: 10px;">
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



            <div class="form-group col-md-6 " >
                <h4> Sure 5 Package</h4>
                <div class="row bg-success"style="padding: 10px;">
                    <div class="col-sm-4">
                        <label>SURE 5 ODDS</label>
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
            </div>

   
        
            {{-- <hr>
          
            <div class="row">
                <div class="form-group col-md-6 ">
                    <h4>Sure 10 Package</h4>
                    <div class="row bg-danger" style="padding: 10px;">
                        <div class="col-sm-4">
                            <label>SURE 10 ODDS</label>
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
                <div class="form-group col-md-6 ">
                    <h4> WEEKEND TIPS <small class="text-danger">(For all packages On weekends)</small></h4>
                    <div class="row bg-success" style="padding: 10px;">
                        <div class="col-sm-4">
                            <label>Weekend Tips</label>
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

               
                {!! csrf_field() !!}
            </div> --}}
          
           <hr>
            <div class="row">
                <div class="form-group col-md-6 ">
                    <h4>SUPER INVESTMENT TIPS</h4>
                    <div class="row bg-success" style="padding: 10px;">
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

                <div class="form-group col-md-6 ">
                    <h4>TODAY'S VIP TIPS</h4>
                    <div class="row bg-danger" style="padding: 10px;">
                        <div class="col-sm-4">
                            <label>Today's VIP </label>
                            <select name="tvt" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="tvtTips" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="tvtOdds" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <hr>
                </div>
                <div class="form-group col-md-6 ">
                    <h4>TODAY'S VVIP TIPS</h4>
                    <div class="row bg-success" style="padding: 10px;">
                        <div class="col-sm-4">
                            <label>TODAY'S VVIP</label>
                            <select name="tvvt" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="tvvtTips" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="tvvtOdds" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-6 ">
                    <h4>TODAY'S ORDINARY TIPS</h4>
                    <div class="row bg-danger" style="padding: 10px;">
                        <div class="col-sm-4">
                            <label>Today's ORDINARY </label>
                            <select name="tot" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="totTips" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="totOdds" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <hr>
                </div>

                <div class="form-group col-md-6 ">
                    <h4>FRIDAY'S VIP TIPS</h4>
                    <div class="row bg-success" style="padding: 10px;">
                        <div class="col-sm-4">
                            <label>FRIDAY'S VIP</label>
                            <select name="frivt" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="frivtTips" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="frivtOdds" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-6 ">
                    <h4>SATURDAY'S VIP TIPS</h4>
                    <div class="row bg-danger" style="padding: 10px;">
                        <div class="col-sm-4">
                            <label>SATURDAY's VIP </label>
                            <select name="satvt" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="satvtTips" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="satvtOdds" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <hr>
                </div>
                <div class="form-group col-md-12 ">
                    <h4>SUNDAY'S VIP TIPS</h4>
                    <div class="row bg-danger" style="padding: 10px;">
                        <div class="col-sm-4">
                            <label>SUNDAY's VIP </label>
                            <select name="sunvt" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="sunvtTips" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="sunvtOdds" class="form-control">
                        </div>
                    </div>
                </div>
{{-- 
                'tvt', 'tvtTips', 'tvtOdds', 'tvvt', 'tvvtTips', 'tvvtOdds', 'tot', 'totTips', 'totOdds', 'frivt', 'frivtTips', 'frivtOdds', 'satvt', 'satvtTips', 'satvtOdds', 'sunvt', 'sunvtTips', 'sunvtOdds', --}}
                <div id="pstatus" class="col-xs-6"></div>
                <div class="form-group col-sm-12">
                    <button class="btn btn-md btn-success" name="submit" id="predictionBtn">SUBMIT PREDICTION</button>
                </div>
            </div>
        </form>
    </div>
@endsection