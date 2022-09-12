<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{

    protected $fillable =
        [

        'id', 'creator', 'gameDate', 'gameTime', 'teamOne', 'teamOneForm', 'teamOneOdds',
        'teamTwo', 'teamTwoForm', 'teamTwoOdds', 'drawOdd', 'league', 'freePick', 'upcomingGame',
        'popularTips', 'FTRecommendation', 'oneFiveGoals', 'doubleChance', 'twoFiveGoals', 'BTTS',
        'drawNoBet', 'winEitherHalf', 'halfTimeResults', 'bankerOfTheDay', 'bankerOfTheDayTip',
        'bankerOfTheDayOdds', 'likes', 'dislikes', 'testimonial', 'testimonialValue', 'cornerStatus',
        'cornerResult', 'teamOneScore', 'teamTwoScore', 'teamOneWon', 'teamTwoWon', 'status', 'display',
        'moreOption', 'free_status', 'other', 'gameType', 'created_at', 'updated_at', 'superInvestment',
        'superInvestmentTip', 'superInvestmentOdds', 'sure2Odds', 'sure2OddsTip', 'sure2OddsOdds', 'sure3Odds',
        'sure3OddsTip', 'sure3OddsOdds', 'overThree', 'overThreeOdds', 'HTFT', 'HTFTOdds', 'btts_gg',
        'bttsTip', 'bttsOdds', 'threeFiveGoals', 'handicap', 'zeroFiveGoals', 'weekend_5',
        'weekend_5_tips', 'weekend_5_odds', 'weekend_10', 'weekend_10_tips', 'weekend_10_odds',
        'draws', 'drawsTip', 'drawsOdds', 'sure5Odds', 'sure5OddsTip', 'sure5OddsOdds', 'singleBets',
        'singleBetsTip', 'singleBetsOdds', 'weekendTips', 'weekendTipsTip', 'weekendTipsOdds',
        'matchCorners', 'matchCornersTip', 'matchCornersOdds', 'correctScore', 'correctScoreTip',
        'correctScoreOdds', 'acca', 'accaTip', 'accaOdds', 'seo_banker', 'overthreefiveGoals',
        'overfourfiveGoals', 'underthreefiveGoals', 'singleBet', 'tvt', 'tvtTips', 'tvtOdds',
        'tvvt', 'tvvtTips', 'tvvtOdds', 'tot', 'totTips',
        'totOdds', 'frivt', 'frivtTips', 'frivtOdds', 'satvt', 'satvtTips', 
        'satvtOdds', 'sunvt', 'sunvtTips', 'sunvtOdds'

    ];

    public function getPrediction($id)
    {
        return $this->find($id);
    }

    public function addResult($request)
    {
        $id = trim($request['id']);
        $score1 = trim($request['score1']);
        $score2 = trim($request['score2']);

        $this->find($id)->update(['teamOneScore' => $score1, 'teamTwoScore' => $score2, 'teamOneWon' => 'Value']);
        if (isset($request['potential']) && $request['potential'] != '') {
            $this->find($id)->update(['testimonial' => '1', 'testimonialValue' => $request['potential']]);

        }
        if (isset($request['investment'])) {
            $this->find($id)->update(['moreOption' => $request['investment']]);

        }

        if (isset($request['free_status'])) {
            $this->find($id)->update(['free_status' => $request['free_status']]);

        }
        if (isset($request['cornerResult']) && $request['cornerResult'] != '') {
            $this->find($id)->update(['cornerStatus' => '1', 'cornerResult' => $request['cornerResult']]);

        }
        return true;
    }

    public function validateInput($request)
    {
        $teamOne = trim($request['teamOne']);
        $matchDate = trim($request['gameDate']);
        $matchTime = trim($request['gameTime']);
        $teamTwo = trim($request['teamTwo']);
        $league = trim($request['league']);

        if ($teamOne == null || $matchDate == null || $matchTime == null || $teamTwo == null || $league == null) {
            ResponseFacade::validationMessage('All * fields are required');
        }
    }

    public function checkValidate($request)
    {
        $teamOne = trim($request['teamOne']);
        $gameDate = trim($request['gameDate']);
        $teamTwo = trim($request['teamTwo']);
        $clause = trim($request['gameType']);

        $check = $this->where('gameDate', $gameDate)->where('teamOne', $teamOne)->where('teamTwo', $teamTwo)->where('gameType', $clause)->first();
        if ($check) {
            ResponseFacade::validationMessage('EXISTING PREDICTION FOUND! SAME MATCH ON SAME DATE. MULTIPLE PREDICTIONS CAN BE SUBMITTED WITH A SINGLE FORM');
        }
        return true;
    }

    public function checkValidateUpdate($request, $id)
    {
        $teamOne = trim($request['teamOne']);
        $gameDate = trim($request['gameDate']);
        $teamTwo = trim($request['teamTwo']);
        $clause = trim($request['gameType']);

        $check = $this->where('gameDate', $gameDate)->where('teamOne', $teamOne)->where('teamTwo', $teamTwo)->where('id', '!=', $id)->where('gameType', $clause)->first();
        if ($check) {
            ResponseFacade::validationMessage('EXISTING PREDICTION FOUND! SAME MATCH ON SAME DATE');
        }
        return true;
    }

    public function unarchiveGames($id)
    {
        $game = Archive::find($id);
        $this->create($game->attributes);
        Archive::destroy($id);
        return $id;
    }

    public function getGames($date, $key)
    {
        return $this->where('gameDate', $date)->where($key, 'Yes')->where('gameType', 1)->get();
    }
}
