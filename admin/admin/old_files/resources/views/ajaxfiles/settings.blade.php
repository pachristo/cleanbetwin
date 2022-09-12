    <form action="{{route('/ajaxGameUpdate')}}/{{$game->id}}/{{$datain}}" method="POST" id="updateForm">
        <div class="container-fluid">
        <div class="col-xs-12">
                <div class="col-md-5 col-xs-12" style="background: whitesmoke; padding: 15px;">
                    <div class="form-group col-xs-12">
                        <input type="text" name="teamOne" class="form-control" placeholder="TEAM ONE *" value="{{$game->teamOne}}" required>
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
<div class="container-fluid">
    <div class="form-group col-md-4">
        <label>FREE EXPERT TIPS</label>
        <select name="freePick" class="form-control">
            <option value="Yes" @if($game->freePick=='Yes') selected @endif>Yes</option>
            <option value="No" @if($game->freePick=='No') selected @endif>No</option>
        </select>
        <small class="text-danger">If YES, this game will show on homepage under Free Punter's Picks</small>
    </div>

    <div class="form-group col-md-4">
        <label>UPCOMING PICKS?</label>
        <select name="upcomingGame" class="form-control">
            <option value="Yes" @if($game->upcomingGame=='Yes') selected @endif>Yes</option>
            <option value="No" @if($game->upcomingGame=='No') selected @endif>No</option>
        </select>
        <small class="text-danger">If YES, this game will show on homepage under Upcoming Games</small>
    </div>

    <div class="form-group col-md-4">
        <label>FULL TIME RECOMMENDATION</label>
        <input type="text" name="FTRecommendation" class="form-control" value="{{$game->FTRecommendation}}">
        <small class="text-danger">Value here will show for Free Pick & Upcoming Game on homepage</small>
    </div>

    {{--<div class="form-group col-md-4">--}}
        {{--<label>ACTUAL POINT/ODD</label>--}}
        {{--<input type="text" name="actualPoint" class="form-control" value="{{$game->actualPoint}}">--}}
    {{--</div>--}}

    <div class="form-group col-md-4">
        <label>DOUBLE CHANCE</label>
        <select name="doubleChance" class="form-control">
            <option value="" @if($game->doubleChance=='') selected @endif>*-*-*-*-*-*-*-*-*-*</option>
            <option value="1X" @if($game->doubleChance=='1X') selected @endif>1X</option>
            <option value="12" @if($game->doubleChance=='12') selected @endif>12</option>
            <option value="2X" @if($game->doubleChance=='2X') selected @endif>2X</option>
        </select>
    </div>

    <div class="form-group col-md-4">
        <label>1.5 GOALS</label>
        <select name="oneFiveGoals" class="form-control">
            <option value="" @if($game->oneFiveGoals=='') selected @endif>*-*-*-*-*-*-*-*-*-*</option>
            <option value="Over 1.5" @if($game->oneFiveGoals=='Over 1.5') selected @endif>Over 1.5</option>
            <option value="Under 1.5" @if($game->oneFiveGoals=='Under 1.5') selected @endif>Under 1.5</option>
        </select>
    </div>

    <div class="form-group col-md-4">
        <label>2.5 GOALS</label>
        <select name="twoFiveGoals" class="form-control">
            <option value="" @if($game->twoFiveGoals=='') selected @endif>*-*-*-*-*-*-*-*-*-*</option>
            <option value="Over 2.5" @if($game->twoFiveGoals=='Over 2.5') selected @endif>Over 2.5</option>
            <option value="Under 2.5" @if($game->twoFiveGoals=='Under 2.5') selected @endif>Under 2.5</option>
        </select>
    </div>

    {{--<div class="form-group col-md-4">--}}
        {{--<label>BTTS/GG</label>--}}
        {{--<select name="BTTS" class="form-control">--}}
            {{--<option value="BTTS/GG" @if($game->BTTS=='BTTS/GG') selected @endif>BTTS/GG</option>--}}
            {{--<option value="No" @if($game->BTTS=='No') selected @endif>No</option>--}}
        {{--</select>--}}
    {{--</div>--}}

    <div class="form-group col-md-4">
        <label>WIN EITHER HALF</label>
        <select name="winEitherHalf" class="form-control">
            <option value="" @if($game->winEitherHalf=='') selected @endif>*-*-*-*-*-*-*-*-*-*</option>
            <option value="HWEH" @if($game->winEitherHalf=='Home WEH') selected @endif>HWEH</option>
            <option value="AWEH" @if($game->winEitherHalf=='Away WEH') selected @endif>AWEH</option>
        </select>
    </div>

    <div class="form-group col-md-4">
        <label>DRAW NO BET</label>
        <select name="drawNoBet" class="form-control">
            <option value="1 DNB" @if($game->drawNoBet=='1 DNB') selected @endif>1 DNB</option>
            <option value="2 DNB" @if($game->drawNoBet=='2 DNB') selected @endif>2 DNB</option>
            <option value="" @if($game->drawNoBet=='') selected @endif>*-*-*-*-*-*-*-*-*-*</option>
        </select>
    </div>

    {{--<div class="form-group col-md-4">--}}
        {{--<label>DRAWS</label>--}}
        {{--<select name="draws" class="form-control">--}}
            {{--<option value="X" @if($game->draws=='X') selected @endif>Yes</option>--}}
            {{--<option value="" @if($game->draws=='') selected @endif>*-*-*-*-*-*-*-*-*-*</option>--}}
        {{--</select>--}}
    {{--</div>--}}

    {{--<div class="form-group col-md-4">--}}
        {{--<label>SINGLE BETS</label>--}}
        {{--<input type="text" name="singleBets" class="form-control" value="{{$game->singleBets}}" placeholder="leave blank if nothing">--}}
    {{--</div>--}}

    <div class="form-group col-md-4">
        <label>UNDER 3.5 GOALS</label>
        <!-- <input type="text" name="halfTimeResults" class="form-control" value="{{$game->halfTimeResults}}" placeholder="leave blank if nothing"> -->
         <select name="halfTimeResults" class="form-control">
            <option value="" @if($game->halfTimeResults=='') selected @endif>*-*-*-*-*-*-*-*-*-*</option>
            <option value="Under 3.5" @if($game->halfTimeResults=='Under 3.5') selected @endif>Under 3.5</option>

        </select>
    </div>

    <div class="form-group col-md-4">
        <label>BANKER OF D DAY</label>
        <input type="text" name="bankerOfTheDay" class="form-control" value="{{$game->bankerOfTheDay}}" placeholder="leave blank if nothing">
    </div>

    {!! csrf_field() !!}

    <div id="settingstatus" class="col-xs-6"></div>
    <div class="form-group col-sm-12">
        <br>
        <button class="btn btn-md btn-success" name="submit" id="submitsetting">UPDATE PREDICTION</button>
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