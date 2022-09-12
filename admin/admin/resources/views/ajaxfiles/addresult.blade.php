
<form action="{{route('/addResult')}}" method="POST" id="addresultform">
    <div class="container-fluid">
        <div class="col-xs-12">
            <input type="hidden" name="id" value="{{$game->id}}">
            <div class="col-md-5 col-xs-12" style="background: whitesmoke; padding: 15px;">
                <h1 class="text-center">{{$game->teamOne}}</h1><hr>

                <div class="form-group col-md-12 col-xs-12">
                    <label for="score1">SCORE/GOAL(S)</label>
                    <input type="text" name="score1" class="form-control" required value="{{$game->teamOneScore}}">
                </div>

            </div>

            <div class="col-md-2 col-xs-12" style="margin: 10px 0px; background: grey; border-radius: 0px 0px 8px 8px;"><center><span style="padding: 5px 10px; background: grey; color: white; border-radius: 100px; margin-top: -30px;">VS</span></center>
                <br>
                <div class="form-group">
                    <input class="form-control" name="matchdate" id="matchdate" type="text" placeholder="MATCH DATE" required value="{{$game->gameDate}}" disabled>
                </div>
                <div class="form-group">
                    <input class="form-control" name="matchtime" id="matchtime" type="text" placeholder="MATCH TIME" required value="{{$game->gameTime}}" disabled>
                </div>
            </div>

            <div class="col-md-5 col-xs-12" style="background: whitesmoke; padding: 15px;">
                <h1 class="text-center">{{$game->teamTwo}}</h1><hr>

                <div class="form-group col-md-12 col-xs-12">
                    <label for="score2">SCORE/GOAL(S)</label>
                    <input type="number" name="score2" class="form-control" maxlength="5" min="0" value="{{$game->teamTwoScore}}">
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-12">
                    <span class="text-danger">If the match is postponed, just type "<strong>pstp</strong>" in the home-team result box!</span>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-sm-12">
        <div class="form-group col-sm-12">
            <label>SELECT POTENTIAL PREDICTION</label>
            <select name="potential" class="form-control">
                <option value="">Select here...</option>
                @if($game->gameType=='1')
                @if($game->weekendTips=='Yes')<option value="{{$game->weekendTips}}"   @if($game->testimonialValue==$game->weekendTips) selected @endif><b>Weekend Tips</b> : {{$game->weekendTips}}</option> @endif
                    @if($game->sure2Odds=='Yes')<option value="{{$game->sure2OddsTip}}"  @if($game->testimonialValue==$game->sure2OddsTip) selected @endif><b>Sure 2 Odds</b> : {{$game->sure2OddsTip}}</option> @endif
                    @if($game->sure3Odds=='Yes')<option value="{{$game->sure3OddsTip}}"   @if($game->testimonialValue==$game->sure3OddsTip) selected @endif><b>Sure 3 Odds</b> : {{$game->sure3OddsTip}}</option> @endif
                    @if($game->sure5Odds=='Yes')<option value="{{$game->sure5OddsTip}}"   @if($game->testimonialValue==$game->sure5OddsTip) selected @endif><b>Sure 5 Odds</b> : {{$game->sure5OddsTip}}</option> @endif
                    @if($game->tvt=='Yes')<option value="{{$game->tvtTips}}"   @if($game->testimonialValue==$game->tvtTips) selected @endif><b>Today's VIP Odds</b> : {{$game->tvtTips}}</option> @endif

                    @if($game->tvvt=='Yes')<option value="{{$game->tvvtTips}}"   @if($game->testimonialValue==$game->tvvtTips) selected @endif><b>Today's VVIP Tips</b> : {{$game->tvvtTips}}</option> @endif

                    @if($game->tot=='Yes')<option value="{{$game->totTips}}"   @if($game->testimonialValue==$game->totTips) selected @endif><b>Today's Ordinary Tips</b> : {{$game->totTips}}</option> @endif


                    @if($game->frivt=='Yes')<option value="{{$game->frivtTips}}"   @if($game->testimonialValue==$game->frivtTips) selected @endif><b>Friday's VIP Tips</b> : {{$game->frivtTips}}</option> @endif
                    @if($game->satvt=='Yes')<option value="{{$game->satvtTips}}"   @if($game->testimonialValue==$game->satvtTips) selected @endif><b>Sarturday's VIP Tips</b> : {{$game->satvtTips}}</option> @endif

                    @if($game->sunvt=='Yes')<option value="{{$game->sunvtTips}}"   @if($game->testimonialValue==$game->sunvtTips) selected @endif><b>Sunday's VIP Tips</b> : {{$game->sunvtTips}}</option> @endif

                    {{-- @if($game->overThree=='Yes')<option value="{{$game->overThree}}"   @if($game->testimonialValue==$game->overThree) selected @endif><b>Over 3.5 Goals</b> : {{$game->overThree}}</option> @endif
                    @if($game->btts_gg=='Yes')<option value="{{$game->bttsTip}}"   @if($game->testimonialValue==$game->bttsTip) selected @endif><b>BTTS/GG</b> : {{$game->bttsTip}}</option> @endif
                    @if($game->singleBets=='Yes')<option value="{{$game->singleBetsTip}}"   @if($game->testimonialValue==$game->singleBetsTip) selected @endif><b>Single Bets</b> : {{$game->singleBetsTip}}</option> @endif
                    @if($game->weekendTips=='Yes')<option value="{{$game->weekendTips}}"   @if($game->testimonialValue==$game->weekendTips) selected @endif><b>Weekend Tips</b> : {{$game->weekendTips}}</option> @endif
                    @if($game->matchCorners=='Yes')<option value="{{$game->matchCornersTip}}"   @if($game->testimonialValue==$game->matchCornersTip) selected @endif><b>Match Corners</b> : {{$game->matchCornersTip}}</option> @endif
                    @if($game->correctScore=='Yes')<option value="{{$game->correctScoreTip}}"   @if($game->testimonialValue==$game->correctScoreTip) selected @endif><b>Sure 20 odds</b> : {{$game->correctScoreTip}}</option> @endif
                    @if($game->acca=='Yes')<option value="{{$game->accaTip}}"   @if($game->testimonialValue==$game->accaTip) selected @endif><b>ACCA</b> : {{$game->accaTip}}</option> @endif
                    @if($game->draws=='Yes')<option value="{{$game->drawsOdds}}"   @if($game->testimonialValue==$game->drawsOdds) selected @endif><b>Draws</b> : {{$game->drawsOdds}}</option> @endif
                    @if($game->HTFT!='')<option value="{{$game->HTFT}}"   @if($game->testimonialValue==$game->HTFT) selected @endif><b>HT/FT Tips</b> : {{$game->HTFT}}</option> @endif --}}
                    @if($game->superInvestment=='Yes')<option value="{{$game->superInvestmentTip}}"   @if($game->testimonialValue==$game->superInvestmentTip) selected @endif><b>Investment Tip</b> : {{$game->superInvestmentTip}}</option> @endif
                @else
                    <option value="{{$game->FTRecommendation}}" @if($game->testimonialValue==$game->FTRecommendation) selected @endif><b>Full-Time Recommendation</b> : {{$game->FTRecommendation}}</option>
                    {{-- <option value="{{$game->doubleChance}}" @if($game->testimonialValue==$game->doubleChance) selected @endif><b>Double Chance</b> : {{$game->doubleChance}}</option>
                    <option value="{{$game->oneFiveGoals}}"   @if($game->testimonialValue==$game->oneFiveGoals) selected @endif><b>Over 1.5</b> : {{$game->oneFiveGoals}}</option>
                    <option value="{{$game->twoFiveGoals}}" @if($game->testimonialValue==$game->twoFiveGoals) selected @endif><b>2.5 Goals</b> : {{$game->twoFiveGoals}}</option>
                    <option value="{{$game->winEitherHalf}}" @if($game->testimonialValue==$game->winEitherHalf) selected @endif><b>Win Either Half</b> : {{$game->winEitherHalf}}</option>
                    <option value="{{$game->BTTS}}" @if($game->testimonialValue==$game->BTTS) selected @endif><b>BTTS/GG</b> : {{$game->BTTS}}</option> --}}
                    {{-- <option value="{{$game->draws}}" @if($game->testimonialValue==$game->draws) selected @endif><b>Draws</b> : {{$game->draws}}</option> --}}
                    {{-- <option value="{{$game->singleBets}}" @if($game->testimonialValue==$game->singleBets) selected @endif><b>Single Bets</b> : {{$game->singleBets}}</option>
                    <option value="{{$game->halfTimeResults}}" @if($game->testimonialValue==$game->halfTimeResults) selected @endif><b>Under 3.5</b> : {{$game->halfTimeResults}}</option>
                    <option value="{{$game->drawNoBet}}" @if($game->testimonialValue==$game->drawNoBet) selected @endif><b>Draw No Bet</b> : {{$game->drawNoBet}}</option>
                    <option value="{{$game->bankerOfTheDay}}" @if($game->testimonialValue==$game->bankerOfTheDay) selected @endif><b>Banker of D Day</b> : {{$game->bankerOfTheDay}}</option> --}}
                @endif
            </select>
        </div>
        @if($game->superInvestment=='Yes')
            <div class="form-group col-sm-6 bg-danger" style="padding: 25px">
                <label>SUPER INVESTMENT STATUS</label>
                <select name="investment" class="form-control">
                    <option value="">Select here...</option>
                        <option value="1" @if($game->moreOption=='1') selected @endif>Successful</option>
                        <option value="2" @if($game->moreOption=='2') selected @endif>Failed</option>
                        <option value="3" @if($game->moreOption=='3') selected @endif>Postponed</option>
                </select>
            </div>
        @endif
        {{-- @if($game->superInvestment=='Yes') --}}
        <div class="form-group col-sm-6 bg-success" style="padding: 25px">
            <label>GAME STATUS</label>
            <select name="free_status" class="form-control">
                <option value="">Select here...</option>
                    <option value="1" @if($game->free_status=='1') selected @endif>Successful</option>
                    <option value="2" @if($game->free_status=='2') selected @endif>Failed</option>
                    <option value="3" @if($game->free_status=='3') selected @endif>Postponed</option>
            </select>
        </div>
    {{-- @endif --}}
        
    </div>
    <div class="container-fluid">
        {!! csrf_field() !!}

        <div id="settingstatus" class="col-xs-6"></div>
        <div class="form-group col-sm-12">
            <button class="btn btn-md btn-success" name="submit" id="submitsetting">SAVE & CLOSE</button>
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
        $('#addresultform').submit(function (e) {
            e.preventDefault();
            $('#submitsetting').prop('disabled', true).html('SAVING RESULT');
            var url = $(this).attr('action');
            var dataString = $(this).serialize();
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#submitsetting').prop('disabled', false).html('SAVE RESULT');
                        swal(data.encounters, '', 'warning');
                    }
                    else{
                        swal(data.encounters, '', 'success');
                        $('#pred{{$game->id}}').css({'background':'lightgreen', 'color':'darkgreen'});
                        $('#addresult').modal('hide');
                    }
                }
            });

        });
    });
</script>