<form action="{{ route('/ajaxVIPGameUpdate') }}/{{ $game->id }}/{{ $datain }}" method="POST"
    id="updateForm">
    <div class="container-fluid">
        <div class="col-xs-12">
            <div class="col-md-5 col-xs-12" style="background: whitesmoke; padding: 15px;">
                <div class="form-group col-xs-12">
                    <input type="text" name="teamOne" class="form-control" placeholder="TEAM ONE *"
                        value="{{ $game->teamOne }}" required>
                    <input type="hidden" value="{{ $game->gameType }}" name="gameType" required>
                </div>
                <div class="form-group col-md-6 col-xs-12">
                    <label for="team1odd">FORM</label>
                    <input type="text" name="teamOneForm" placeholder="eg. WWWLD" class="form-control"
                        value="{{ $game->teamOneForm }}" maxlength="5">
                </div>
                <div class="form-group col-md-6 col-xs-12">
                    <label for="team1odd">ODDS</label>
                    <input type="text" name="teamOneOdds" placeholder="eg. 1.5" class="form-control"
                        value="{{ $game->teamOneOdds }}">
                </div>
            </div>

            <div class="col-md-2 col-xs-12" style="margin: 10px 0px; background: grey; border-radius: 0px 0px 8px 8px;">
                <center><span
                        style="padding: 5px 10px; background: grey; color: white; border-radius: 100px; margin-top: -30px;">VS</span>
                </center>
                <br>
                {{-- <div class="form-group"> --}}
                {{-- <input class="form-control" name="drawOdd" type="text" value="{{$game->drawOdd}}" placeholder="DRAW ODD"> --}}
                {{-- </div> --}}
                <div class="form-group">
                    <input class="form-control" name="gameDate" id="matchdate" type="text" placeholder="MATCH DATE *"
                        value="{{ $game->gameDate }}" required>
                </div>
                <div class="form-group">
                    <input class="form-control" name="gameTime" id="matchtime" type="text" placeholder="MATCH TIME *"
                        value="{{ $game->gameTime }}" required>
                </div>
                <div class="form-group">
                    <select name="league" class="form-control select2" required>
                        @foreach ($allleagues->all() as $leagues)
                            <option value="{{ $leagues->code }}" @if ($game->league == $leagues->code) selected @endif>{{ $leagues->code }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-5 col-xs-12" style="background: whitesmoke; padding: 15px;">
                <div class="form-group col-xs-12">
                    <input type="text" name="teamTwo" class="form-control" placeholder="TEAM TWO *"
                        value="{{ $game->teamTwo }}" required>
                </div>

                <div class="form-group col-md-6 col-xs-12">
                    <label for="team1odd">FORM</label>
                    <input type="text" name="teamTwoForm" placeholder="eg. WWWLD" class="form-control"
                        value="{{ $game->teamTwoForm }}" maxlength="5">
                </div>
                <div class="form-group col-md-6 col-xs-12">
                    <label for="team1odd">ODDS</label>
                    <input type="text" name="teamTwoOdds" placeholder="eg. 1.5" class="form-control"
                        value="{{ $game->teamTwoOdds }}">
                </div>
            </div>
        </div>
    </div>
    <hr>












    <div class="row">
        <div class="form-group col-md-6">
            <h4>Sure 2 Package</h4>

            <div class="row bg-danger" style="padding: 10px;">
                <div class="col-sm-4">
                    <label>2 ODDS</label>
                    <select name="sure2Odds" class="form-control">
                        <option value="Yes" @if ($game->sure2Odds == 'Yes') selected @endif>Yes</option>
                        <option value="No" @if ($game->sure2Odds == 'No') selected @endif>No</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label>PREDICTION</label>
                    <input type="text" name="sure2OddsTip" value="{{ $game->sure2OddsTip }}" class="form-control">
                </div>
                <div class="col-sm-4">
                    <label>ODD</label>
                    <input type="text" name="sure2OddsOdds" value="{{ $game->sure2OddsOdds }}"
                        class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group col-md-6 ">
            <h4>Sure 5 Package</h4>
            <div class="row bg-success" style="padding: 10px;">
                <div class="col-sm-4">
                    <label>5 ODDS</label>
                    <select name="sure3Odds" class="form-control">
                        <option value="Yes" @if ($game->sure3Odds == 'Yes') selected @endif>Yes</option>
                        <option value="No" @if ($game->sure3Odds == 'No') selected @endif>No</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label>PREDICTION</label>
                    <input type="text" name="sure3OddsTip" value="{{ $game->sure3OddsTip }}" class="form-control">
                </div>
                <div class="col-sm-4">
                    <label>ODD</label>
                    <input type="text" name="sure3OddsOdds" value="{{ $game->sure3OddsOdds }}"
                        class="form-control">
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <hr>

    </div>
    <div class="row">
        {{-- <div class="form-group col-md-6">
            <h4>Sure 10 Package</h4>
            <div class="row bg-danger" style="padding: 10px;">
                <div class="col-sm-4">
                    <label>10 ODDS</label>
                    <select name="sure5Odds" class="form-control">
                        <option value="Yes" @if ($game->sure5Odds == 'Yes') selected @endif>Yes</option>
                        <option value="No" @if ($game->sure5Odds == 'No') selected @endif>No</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label>TIP</label>
                    <input type="text" name="sure5OddsTip" value="{{ $game->sure5OddsTip }}" class="form-control">
                </div>
                <div class="col-sm-4">
                    <label>ODD</label>
                    <input type="text" name="sure5OddsOdds" value="{{ $game->sure5OddsOdds }}"
                        class="form-control">
                </div>
            </div>
        </div> --}}
        <div class="form-group col-md-6">
            <h4>WEEKEND TIPS <small class="text-danger">(For all packages On weekends)</small></h4>
            <div class="row bg-success" style="padding: 10px;">


                <div class="col-sm-4">
                    <label>Weekend Tips</label>
                    <select name="weekendTips" class="form-control">
                        <option value="Yes" @if ($game->weekendTips == 'Yes') selected @endif>Yes</option>
                        <option value="No" @if ($game->weekendTips == 'No') selected @endif>No</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label>TIP</label>
                    <input type="text" name="weekendTipsTip" value="{{ $game->weekendTipsTip }}"
                        class="form-control">
                </div>
                <div class="col-sm-4">
                    <label>ODD</label>
                    <input type="text" name="weekendTipsOdds" value="{{ $game->weekendTipsOdds }}"
                        class="form-control">
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <hr>
        
        </div>
        <div class="form-group col-md-6">
            <h4>SUPER INVESTMENT TIPS</h4>
            <div class="row bg-success" style="padding: 10px;">
                <div class="col-sm-4">
                    <label>INVESTMENT TIP</label>
                    <select name="superInvestment" class="form-control">
                        <option value="Yes" @if ($game->superInvestment == 'Yes') selected @endif>Yes</option>
                        <option value="No" @if ($game->superInvestment == 'No') selected @endif>No</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label>TIP</label>
                    <input type="text" name="superInvestmentTip" value="{{ $game->superInvestmentTip }}"
                        class="form-control">
                </div>
                <div class="col-sm-4">
                    <label>ODD</label>
                    <input type="text" name="superInvestmentOdds"
                        value="{{ $game->superInvestmentOdds }}" class="form-control">
                </div>
            </div>
        </div>


        <div class="form-group col-md-6">
            <h4>TODAY'S VIP TIPS</h4>
            <div class="row bg-danger" style="padding: 10px;">
                <div class="col-sm-4">
                    <label>TODAY'S VIP</label>
                    <select name="tvt" class="form-control">
                        <option value="Yes" @if ($game->tvt == 'Yes') selected @endif>Yes</option>
                        <option value="No" @if ($game->tvt == 'No') selected @endif>No</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label>TIP</label>
                    <input type="text" name="tvtTips" value="{{ $game->tvtTips }}"
                        class="form-control">
                </div>
                <div class="col-sm-4">
                    <label>ODD</label>
                    <input type="text" name="tvtOdds"
                        value="{{ $game->tvtOdds }}" class="form-control">
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <hr>
        
        </div>
        <div class="form-group col-md-12">
            <h4>TODAY'S ORDINARY TIPS</h4>
            <div class="row bg-success" style="padding: 10px;">
                <div class="col-sm-4">
                    <label>TODAY'S ORDINARY</label>
                    <select name="tot" class="form-control">
                        <option value="Yes" @if ($game->tot == 'Yes') selected @endif>Yes</option>
                        <option value="No" @if ($game->tot == 'No') selected @endif>No</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label>TIP</label>
                    <input type="text" name="totTips" value="{{ $game->totTips }}"
                        class="form-control">
                </div>
                <div class="col-sm-4">
                    <label>ODD</label>
                    <input type="text" name="totOdds"
                        value="{{ $game->totOdds }}" class="form-control">
                </div>
            </div>
        </div>




        <div class="col-sm-12">
            <hr>
        
        </div>
        <div class="form-group col-md-6">
            <h4>TODAY'S VVIP TIPS</h4>
            <div class="row bg-danger" style="padding: 10px;">
                <div class="col-sm-4">
                    <label>TODAY'S VVIP</label>
                    <select name="tvvt" class="form-control">
                        <option value="Yes" @if ($game->tvvt == 'Yes') selected @endif>Yes</option>
                        <option value="No" @if ($game->tvvt == 'No') selected @endif>No</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label>TIP</label>
                    <input type="text" name="tvvtTips" value="{{ $game->tvvtTips }}"
                        class="form-control">
                </div>
                <div class="col-sm-4">
                    <label>ODD</label>
                    <input type="text" name="tvvtOdds"
                        value="{{ $game->tvvtOdds }}" class="form-control">
                </div>
            </div>
        </div>


        <div class="form-group col-md-6">
            <h4>FRIDAY'S VIP TIPS</h4>
            <div class="row bg-success" style="padding: 10px;">
                <div class="col-sm-4">
                    <label>FRIDAY'S VIP</label>
                    <select name="frivt" class="form-control">
                        <option value="Yes" @if ($game->frivt == 'Yes') selected @endif>Yes</option>
                        <option value="No" @if ($game->frivt == 'No') selected @endif>No</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label>TIP</label>
                    <input type="text" name="frivtTips" value="{{ $game->frivtTips }}"
                        class="form-control">
                </div>
                <div class="col-sm-4">
                    <label>ODD</label>
                    <input type="text" name="frivtOdds"
                        value="{{ $game->frivtOdds }}" class="form-control">
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <hr>
        
        </div>
        <div class="form-group col-md-6">
            <h4>SATURDAY'S VVIP TIPS</h4>
            <div class="row bg-success" style="padding: 10px;">
                <div class="col-sm-4">
                    <label>SATURDAY'S VVIP</label>
                    <select name="satvt" class="form-control">
                        <option value="Yes" @if ($game->satvt == 'Yes') selected @endif>Yes</option>
                        <option value="No" @if ($game->satvt == 'No') selected @endif>No</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label>TIP</label>
                    <input type="text" name="satvtTips" value="{{ $game->satvtTips }}"
                        class="form-control">
                </div>
                <div class="col-sm-4">
                    <label>ODD</label>
                    <input type="text" name="satvtOdds"
                        value="{{ $game->satvtOdds }}" class="form-control">
                </div>
            </div>
        </div>


        <div class="form-group col-md-6">
            <h4>SUNDAY'S VIP TIPS</h4>
            <div class="row bg-danger" style="padding: 10px;">
                <div class="col-sm-4">
                    <label>SUNDAY'S VIP</label>
                    <select name="sunvt" class="form-control">
                        <option value="Yes" @if ($game->sunvt == 'Yes') selected @endif>Yes</option>
                        <option value="No" @if ($game->sunvt == 'No') selected @endif>No</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label>TIP</label>
                    <input type="text" name="sunvtTips" value="{{ $game->sunvtTips }}"
                        class="form-control">
                </div>
                <div class="col-sm-4">
                    <label>ODD</label>
                    <input type="text" name="sunvtOdds"
                        value="{{ $game->sunvtOdds }}" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">



      
            {{-- <div class="row"> --}}
            <div class="col-sm-12">
            
                {{-- </div> --}}
                {{-- 'tvt', 'tvtTips', 'tvtOdds', 'tvvt', 'tvvtTips', 'tvvtOdds', 'tot', 'totTips', 'totOdds', 'frivt', 'frivtTips', 'frivtOdds', 'satvt', 'satvtTips', 'satvtOdds', 'sunvt', 'sunvtTips', 'sunvtOdds', --}}
                {!! csrf_field() !!}

                <div class="col-sm-12">
                    <div id="settingstatus" class="col-xs-6"></div>
                    <div class="form-group col-sm-12">
                        <button class="btn btn-md btn-success" name="submit" id="submitsetting">UPDATE
                            PREDICTION</button>
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
    $(document).ready(function() {
        $('#updateForm').submit(function(e) {
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
                success: function(data) {
                    if (data.status == 1) {
                        $('#submitsetting').prop('disabled', false).html(
                            "UPDATE PREDICTION");
                        swal(data.encounters, '', 'warning');
                    } else {
                        swal(data.encounters, '', 'success');
                        $('#updategame').modal('hide');
                    }
                }
            });

        });
    });
</script>
