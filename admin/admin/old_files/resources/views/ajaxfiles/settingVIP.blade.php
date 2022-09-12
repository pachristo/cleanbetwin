<form action="{{route('/ajaxVIPGameUpdate')}}/{{$game->id}}/{{$datain}}" method="POST" id="updateForm">
    <div class="container-fluid">
        <div class="col-xs-12">
            <div class="col-md-5 col-xs-12" style="background: whitesmoke; padding: 15px;">
                <div class="form-group col-xs-12">
                    <input type="text" name="teamOne" class="form-control" placeholder="TEAM ONE *" value="{{$game->teamOne}}" required>
                    <input type="hidden" value="{{$game->gameType}}" name="gameType" required>
                </div>
                <div class="form-group col-md-6 col-xs-12">
                    <label for="team1odd">FORM</label>
                    <input type="text" name="teamOneForm" placeholder="eg. WWWLD" class="form-control" value="{{$game->teamOneForm}}" maxlength="5">
                </div>
                <div class="form-group col-md-6 col-xs-12">
                    <label for="team1odd">ODDS</label>
                    <input type="text" name="teamOneOdds" placeholder="eg. 1.5" class="form-control" value="{{$game->teamOneOdds}}">
                </div>
            </div>

            <div class="col-md-2 col-xs-12" style="margin: 10px 0px; background: grey; border-radius: 0px 0px 8px 8px;"><center><span style="padding: 5px 10px; background: grey; color: white; border-radius: 100px; margin-top: -30px;">VS</span></center>
                <br>
                {{--<div class="form-group">--}}
                    {{--<input class="form-control" name="drawOdd" type="text" value="{{$game->drawOdd}}" placeholder="DRAW ODD">--}}
                {{--</div>--}}
                <div class="form-group">
                    <input class="form-control" name="gameDate" id="matchdate" type="text" placeholder="MATCH DATE *" value="{{$game->gameDate}}" required>
                </div>
                <div class="form-group">
                    <input class="form-control" name="gameTime" id="matchtime" type="text" placeholder="MATCH TIME *" value="{{$game->gameTime}}" required>
                </div>
                <div class="form-group">
                    <select name="league" class="form-control select2" required>
                        @foreach($allleagues->all() as $leagues)
                            <option value="{{$leagues->code}}" @if($game->league==$leagues->code) selected @endif>{{$leagues->code}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-5 col-xs-12" style="background: whitesmoke; padding: 15px;">
                <div class="form-group col-xs-12">
                    <input type="text" name="teamTwo" class="form-control" placeholder="TEAM TWO *" value="{{$game->teamTwo}}" required>
                </div>

                <div class="form-group col-md-6 col-xs-12">
                    <label for="team1odd">FORM</label>
                    <input type="text" name="teamTwoForm" placeholder="eg. WWWLD" class="form-control" value="{{$game->teamTwoForm}}" maxlength="5">
                </div>
                <div class="form-group col-md-6 col-xs-12">
                    <label for="team1odd">ODDS</label>
                    <input type="text" name="teamTwoOdds" placeholder="eg. 1.5" class="form-control" value="{{$game->teamTwoOdds}}">
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-sm-12"><h4>SUPER VIP PACKAGE TIPS</h4></div>
    <div class="container-fluid">
        <div class="form-group col-md-6 bg-danger" style="padding: 10px;">
            <div class="row">
                <div class="col-sm-4">
                    <label>2 ODDS</label>
                    <select name="sure2Odds" class="form-control">
                        <option value="Yes" @if($game->sure2Odds=='Yes') selected @endif>Yes</option>
                        <option value="No" @if($game->sure2Odds=='No') selected @endif>No</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label>PREDICTION</label>
                    <input type="text" name="sure2OddsTip" value="{{$game->sure2OddsTip}}" class="form-control">
                </div>
                <div class="col-sm-4">
                    <label>ODD</label>
                    <input type="text" name="sure2OddsOdds" value="{{$game->sure2OddsOdds}}" class="form-control">
                </div>
            </div>
        </div>

        <div class="form-group col-md-6 bg-success" style="padding: 10px;">
            <div class="row">
                <div class="col-sm-4">
                    <label>3 ODDS</label>
                    <select name="sure3Odds" class="form-control">
                        <option value="Yes" @if($game->sure3Odds=='Yes') selected @endif>Yes</option>
                        <option value="No" @if($game->sure3Odds=='No') selected @endif>No</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label>PREDICTION</label>
                    <input type="text" name="sure3OddsTip" value="{{$game->sure3OddsTip}}" class="form-control">
                </div>
                <div class="col-sm-4">
                    <label>ODD</label>
                    <input type="text" name="sure3OddsOdds" value="{{$game->sure3OddsOdds}}" class="form-control">
                </div>
            </div>
        </div>

        <div class="form-group col-md-6 bg-success" style="padding: 10px;">
            <div class="row">
                <div class="col-sm-6">
                    <label>OVER 3.5 GOALS</label>
                    <select name="overThree" class="form-control">
                        <option value="Yes" @if($game->overThree=='Yes') selected @endif>Yes</option>
                        <option value="No" @if($game->overThree=='No') selected @endif>No</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label>ODD</label>
                    <input type="text" name="overThreeOdds" value="{{$game->overThreeOdds}}" class="form-control">
                </div>
            </div>
        </div>

        <div class="form-group col-md-6 bg-danger" style="padding: 10px;">
            <div class="row">
                <div class="col-sm-4">
                    <label>BTTS/GG</label>
                    <select name="btts_gg" class="form-control">
                        <option value="Yes" @if($game->btts_gg=='Yes') selected @endif>Yes</option>
                        <option value="No" @if($game->btts_gg=='No') selected @endif>No</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label>TIP</label>
                    <select name="bttsTip" class="form-control">
                        <option value="BTTS" @if($game->btts_gg=='BTTS') selected @endif>BTTS</option>
                        <option value="NG" @if($game->btts_gg=='NG') selected @endif>NG</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label>ODD</label>
                    <input type="text" name="bttsOdds" value="{{$game->bttsOdds}}" class="form-control">
                </div>
            </div>
        </div>

        <div class="form-group col-md-6 bg-danger" style="padding: 10px;">
            <div class="row">
                <div class="col-sm-4">
                    <label>DRAWS</label>
                    <select name="draws" class="form-control">
                        <option value="Yes" @if($game->draws=='Yes') selected @endif>Yes</option>
                        <option value="No" @if($game->draws=='No') selected @endif>No</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label>TIP</label>
                    <input type="text" name="drawsTip" value="{{$game->drawsTip}}" class="form-control">
                </div>
                <div class="col-sm-4">
                    <label>ODD</label>
                    <input type="text" name="drawsOdds" value="{{$game->drawsOdds}}" class="form-control">
                </div>
            </div>
        </div>

        <div class="form-group col-md-6 bg-success" style="padding: 10px;">
            <div class="row">
                <div class="col-sm-4">
                    <label>WEEKEND TIPS</label>
                    <select name="weekendTips" class="form-control">
                        <option value="Yes" @if($game->weekendTips=='Yes') selected @endif>Yes</option>
                        <option value="No" @if($game->weekendTips=='No') selected @endif>No</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label>TIP</label>
                    <input type="text" name="weekendTipsTip" value="{{$game->weekendTipsTip}}" class="form-control">
                </div>
                <div class="col-sm-4">
                    <label>ODD</label>
                    <input type="text" name="weekendTipsOdds" value="{{$game->weekendTipsOdds}}" class="form-control">
                </div>
            </div>
        </div>

    </div>
    <hr>
    <div class="col-sm-12"><h4>MEGA VIP PACKAGE TIPS</h4></div>
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-12">
                <div class="form-group col-md-6 bg-danger" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>5 ODDS</label>
                            <select name="sure5Odds" class="form-control">
                                <option value="Yes" @if($game->sure5Odds=='Yes') selected @endif>Yes</option>
                                <option value="No" @if($game->sure5Odds=='No') selected @endif>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="sure5OddsTip" value="{{$game->sure5OddsTip}}" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="sure5OddsOdds" value="{{$game->sure5OddsOdds}}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-6 bg-success" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>SINGLE BETS</label>
                            <select name="singleBets" class="form-control">
                                <option value="Yes" @if($game->singleBets=='Yes') selected @endif>Yes</option>
                                <option value="No" @if($game->singleBets=='No') selected @endif>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="singleBetsTip" value="{{$game->singleBetsTip}}" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="singleBetsOdds" value="{{$game->singleBetsOdds}}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-6 bg-success" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>MATCH CORNERS</label>
                            <select name="matchCorners" class="form-control">
                                <option value="Yes" @if($game->matchCorners=='Yes') selected @endif>Yes</option>
                                <option value="No" @if($game->matchCorners=='No') selected @endif>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="matchCornersTip" value="{{$game->matchCornersTip}}" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="matchCornersOdds" value="{{$game->matchCornersOdds}}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-6 bg-danger" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>SURE 20 ODDS</label>
                            <select name="correctScore" class="form-control">
                                <option value="Yes" @if($game->correctScore=='Yes') selected @endif>Yes</option>
                                <option value="No" @if($game->correctScore=='No') selected @endif>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="correctScoreTip" value="{{$game->correctScoreTip}}" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="correctScoreOdds" value="{{$game->correctScoreOdds}}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-6 bg-danger" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>EXPERT ACCA</label>
                            <select name="acca" class="form-control">
                                <option value="Yes" @if($game->acca=='Yes') selected @endif>Yes</option>
                                <option value="No" @if($game->acca=='No') selected @endif>No</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>TIP</label>
                            <input type="text" name="accaTip" value="{{$game->accaTip}}" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>ODD</label>
                            <input type="text" name="accaOdds" value="{{$game->accaOdds}}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-6 bg-success" style="padding: 10px;">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>HT/FT TIPS</label>
                            <select name="HTFT" class="form-control">
                                <option value="1/1" @if($game->HTFT=='1/1') selected @endif>1/1</option>
                                <option value="1/X" @if($game->HTFT=='1/X') selected @endif>1/X</option>
                                <option value="1/2" @if($game->HTFT=='1/2') selected @endif>1/2</option>
                                <option value="X/1" @if($game->HTFT=='X/1') selected @endif>X/1</option>
                                <option value="X/2" @if($game->HTFT=='X/2') selected @endif>X/2</option>
                                <option value="X/X" @if($game->HTFT=='X/X') selected @endif>X/X</option>
                                <option value="2/1" @if($game->HTFT=='2/1') selected @endif>2/1</option>
                                <option value="2/2" @if($game->HTFT=='2/2') selected @endif>2/2</option>
                                <option value="2/X" @if($game->HTFT=='2/X') selected @endif>2/X</option>
                                <option value=""  @if($game->HTFT=='') selected @endif>*-*-*-*-*-*-*-*-*-</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>ODD</label>
                            <input type="text" name="HTFTOdds" value="{{$game->HTFTOdds}}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="col-sm-12">
            <div class="col-sm-12"><h4>SUPER INVESTMENT TIPS</h4></div>
        </div>
        {{--<div class="row">--}}
            <div class="col-sm-12">
                <div class="col-sm-12">
                    <div class="form-group col-md-12 bg-success" style="padding: 10px;">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>INVESTMENT TIP</label>
                                <select name="superInvestment" class="form-control">
                                    <option value="Yes" @if($game->superInvestment=='Yes') selected @endif>Yes</option>
                                    <option value="No" @if($game->superInvestment=='No') selected @endif>No</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label>TIP</label>
                                <input type="text" name="superInvestmentTip" value="{{$game->superInvestmentTip}}" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label>ODD</label>
                                <input type="text" name="superInvestmentOdds" value="{{$game->superInvestmentOdds}}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            {{--</div>--}}
        {!! csrf_field() !!}

        <div class="col-sm-12">
            <div id="settingstatus" class="col-xs-6"></div>
            <div class="form-group col-sm-12">
                <button class="btn btn-md btn-success" name="submit" id="submitsetting">UPDATE PREDICTION</button>
            </div>
        </div>

    </div>
</form>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        $('#updateForm').submit(function (e) {
            e.preventDefault();
            $('#submitsetting').prop('disabled', true).html("UPDATING PREDICTION");
            var url = $(this).attr('action');

            var dataString = $(this).serialize();
            console.log(dataString);
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#submitsetting').prop('disabled', false).html("UPDATE PREDICTION");
                        swal(data.encounters, '', 'warning');
                    }
                    else{
                        swal(data.encounters, '', 'success');
                        $('#updategame').modal('hide');
                    }
                }
            });

        });
    });
</script>