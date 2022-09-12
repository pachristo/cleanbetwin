<?php

namespace App\Http\Controllers;

use App\Focus\Modules\BookingCode\Model\BookingCode;
use App\Focus\Modules\Prediction\Model\Prediction;

class PredictionController extends Controller {
	public $prediction;
	public $code;

	public function __construct(Prediction $prediction, BookingCode $code) {
		$this->prediction = $prediction;
		$this->code = $code;
	}

	public function getTestimonial() {
		return view('testimonial');
	}

	public function getDoubleChance() {
		$yy = $this->prediction->yesterdayGame()->where('doubleChance', '!=', '')->get();
		$tt = $this->prediction->todayGame()->where('doubleChance', '!=', '')->get();
		$tm = $this->prediction->today1Game()->where('doubleChance', '!=', '')->get();

		return view('stores.double_chance', compact('yy', 'tt', 'tm'));
	}

	public function getOver15() {
		$yy = $this->prediction->yesterdayGame()->where('oneFiveGoals', '!=', '')->get();
		$tt = $this->prediction->todayGame()->where('oneFiveGoals', '!=', '')->get();
		$tm = $this->prediction->today1Game()->where('oneFiveGoals', '!=', '')->get();

		return view('stores.over_1_5', compact('yy', 'tt', 'tm'));
	}

	public function getOver25() {
		$yy = $this->prediction->yesterdayGame()->where('twoFiveGoals', '!=', '')->get();
		$tt = $this->prediction->todayGame()->where('twoFiveGoals', '!=', '')->get();
		$tm = $this->prediction->today1Game()->where('twoFiveGoals', '!=', '')->get();

		return view('stores.over_2_5', compact('yy', 'tt', 'tm'));
	}

	public function getBTTSs() {
		$yy = $this->prediction->yesterdayGame()->where('BTTS', '!=', 'No')->get();
		$tt = $this->prediction->todayGame()->where('BTTS', '!=', 'No')->get();
		$tm = $this->prediction->today1Game()->where('BTTS', '!=', 'No')->get();

		return view('stores.btts', compact('yy', 'tt', 'tm'));
	}

	public function getDNB() {
		$yy = $this->prediction->yesterdayGame()->where('drawNoBet', '!=', '')->get();
		$tt = $this->prediction->todayGame()->where('drawNoBet', '!=', '')->get();
		$tm = $this->prediction->today1Game()->where('drawNoBet', '!=', '')->get();

		return view('stores.dnb', compact('yy', 'tt', 'tm'));
	}

	public function getDrawss() {
		$yy = $this->prediction->yesterdayGame()->where('draws', 'X')->get();
		$tt = $this->prediction->todayGame()->where('draws', 'X')->get();
		$tm = $this->prediction->today1Game()->where('draws', 'X')->get();

		return view('stores.draws', compact('yy', 'tt', 'tm'));
	}

	public function getSingleBets() {
		$yy = $this->prediction->yesterdayGame()->where('singleBets', '!=', '')->get();
		$tt = $this->prediction->todayGame()->where('singleBets', '!=', '')->get();
		$tm = $this->prediction->today1Game()->where('singleBets', '!=', '')->get();

		return view('stores.singles', compact('yy', 'tt', 'tm'));
	}

	public function getWEH() {
		$yy = $this->prediction->yesterdayGame()->where('winEitherHalf', '!=', '')->get();
		$tt = $this->prediction->todayGame()->where('winEitherHalf', '!=', '')->get();
		$tm = $this->prediction->today1Game()->where('winEitherHalf', '!=', '')->get();

		return view('stores.weh', compact('yy', 'tt', 'tm'));
	}

	public function getWeekend() {
		$yy = $this->prediction->yesterdayGame()->where('halfTimeResults', '!=', '')->get();
		$tt = $this->prediction->todayGame()->where('halfTimeResults', '!=', '')->get();
		$tm = $this->prediction->today1Game()->where('halfTimeResults', '!=', '')->get();

		return view('stores.weekend', compact('yy', 'tt', 'tm'));
	}

	public function getBanker() {
		$yy = $this->prediction->yesterdayGame()->where('bankerOfTheDay', '!=', '')->get();
		$tt = $this->prediction->todayGame()->where('bankerOfTheDay', '!=', '')->get();
		$tm = $this->prediction->today1Game()->where('bankerOfTheDay', '!=', '')->get();

		return view('stores.banker', compact('yy', 'tt', 'tm'));
	}

	//    vip

	public function getSureTwoOdds() {
		$yy = $this->prediction->yesterdayGame()->where('sure2Odds', 'Yes')->get();
		$tt = $this->prediction->todayGame()->where('sure2Odds', 'Yes')->get();
		$tm = $this->prediction->today1Game()->where('sure2Odds', 'Yes')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'sure2')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'sure2')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'sure2')->first();

		$title = 'Sure 2 Odds';
		$keys = 'sure2';
		return view('app.vip.games', compact('title', 'keys', 'yy', 'tt', 'tm', 'cy', 'ct', 'ctm'));
	}

	public function getSureThreeOdds() {
		$yy = $this->prediction->yesterdayGame()->where('sure3Odds', 'Yes')->get();
		$tt = $this->prediction->todayGame()->where('sure3Odds', 'Yes')->get();
		$tm = $this->prediction->today1Game()->where('sure3Odds', 'Yes')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'sure3')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'sure3')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'sure3')->first();

		$title = 'Sure 5 Odds';
		$keys = 'sure3';
		return view('app.vip.games', compact('title', 'keys', 'yy', 'tt', 'tm', 'cy', 'ct', 'ctm'));
	}

	public function getOver35goals() {
		$yy = $this->prediction->yesterdayGame()->where('overThree', 'Yes')->get();
		$tt = $this->prediction->todayGame()->where('overThree', 'Yes')->get();
		$tm = $this->prediction->today1Game()->where('overThree', 'Yes')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'over35')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'over35')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'over35')->first();

		$title = 'Over 3.5 Goals';
		$keys = 'ov3';
		return view('app.vip.games', compact('title', 'keys', 'yy', 'tt', 'tm', 'cy', 'ct', 'ctm'));
	}

	public function getSuperSingles() {
		$yy = $this->prediction->yesterdayGame()->where('singleBets', 'Yes')->get();
		$tt = $this->prediction->todayGame()->where('singleBets', 'Yes')->get();
		$tm = $this->prediction->today1Game()->where('singleBets', 'Yes')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'singleBets')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'singleBets')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'singleBets')->first();

		$title = 'Single Bets';
		$keys = 'ssingles';
		return view('app.vip.games', compact('title', 'keys', 'yy', 'tt', 'tm', 'cy', 'ct', 'ctm'));
	}

	public function getSureFiveOdds() {
		$yy = $this->prediction->yesterdayGame()->where('sure5Odds', 'Yes')->get();
		$tt = $this->prediction->todayGame()->where('sure5Odds', 'Yes')->get();
		$tm = $this->prediction->today1Game()->where('sure5Odds', 'Yes')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'sure5')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'sure5')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'sure5')->first();

		$title = 'Sure 10 Odds';
		$keys = 'sure5';
		return view('app.vip.games', compact('title', 'keys', 'yy', 'tt', 'tm', 'cy', 'ct', 'ctm'));
	}

	public function getMatchCorner() {
		$yy = $this->prediction->yesterdayGame()->where('matchCorners', 'Yes')->get();
		$tt = $this->prediction->todayGame()->where('matchCorners', 'Yes')->get();
		$tm = $this->prediction->today1Game()->where('matchCorners', 'Yes')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'matchCorner')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'matchCorner')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'matchCorner')->first();

		$title = 'Match Corners';
		$keys = 'matchCorner';
		return view('app.vip.games', compact('title', 'keys', 'yy', 'tt', 'tm', 'cy', 'ct', 'ctm'));
	}

	public function getWeekendTips() {
		$yy = $this->prediction->yesterdayGame()->where('weekendTips', 'Yes')->get();
		$tt = $this->prediction->todayGame()->where('weekendTips', 'Yes')->get();
		$tm = $this->prediction->today1Game()->where('weekendTips', 'Yes')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'weekend')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'weekend')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'weekend')->first();

		$title = 'Weekend Tips';
		$keys = 'wt';
		return view('app.vip.games', compact('title', 'keys', 'yy', 'tt', 'tm', 'cy', 'ct', 'ctm'));
	}

	public function getDraws() {
		$yy = $this->prediction->yesterdayGame()->where('draws', 'Yes')->get();
		$tt = $this->prediction->todayGame()->where('draws', 'Yes')->get();
		$tm = $this->prediction->today1Game()->where('draws', 'Yes')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'draws')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'draws')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'draws')->first();

		$title = 'Draws';
		$keys = 'draws';
		return view('app.vip.games', compact('title', 'keys', 'yy', 'tt', 'tm', 'cy', 'ct', 'ctm'));
	}

	public function getBTTS() {
		$yy = $this->prediction->yesterdayGame()->where('btts_gg', 'Yes')->get();
		$tt = $this->prediction->todayGame()->where('btts_gg', 'Yes')->get();
		$tm = $this->prediction->today1Game()->where('btts_gg', 'Yes')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'btts')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'btts')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'btts')->first();

		$title = 'BTTS/GG';
		$keys = 'btts';
		return view('app.vip.games', compact('title', 'keys', 'yy', 'tt', 'tm', 'cy', 'ct', 'ctm'));
	}

	public function getCorrectScore() {
		$yy = $this->prediction->yesterdayGame()->where('correctScore', 'Yes')->get();
		$tt = $this->prediction->todayGame()->where('correctScore', 'Yes')->get();
		$tm = $this->prediction->today1Game()->where('correctScore', 'Yes')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'correctScore')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'correctScore')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'correctScore')->first();

		$title = 'Sure 20 Odds';
		$keys = 'cs';
		return view('app.vip.games', compact('title', 'keys', 'yy', 'tt', 'tm', 'cy', 'ct', 'ctm'));
	}

	public function getACCA() {
		$yy = $this->prediction->yesterdayGame()->where('acca', 'Yes')->get();
		$tt = $this->prediction->todayGame()->where('acca', 'Yes')->get();
		$tm = $this->prediction->today1Game()->where('acca', 'Yes')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'acca')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'acca')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'acca')->first();

		$title = 'Expert ACCA';
		$keys = 'acca';
		return view('app.vip.games', compact('title', 'keys', 'yy', 'tt', 'tm', 'cy', 'ct', 'ctm'));
	}

	public function getHTFT() {
		$yy = $this->prediction->yesterdayGame()->where('HTFT', '!=', '')->get();
		$tt = $this->prediction->todayGame()->where('HTFT', '!=', '')->get();
		$tm = $this->prediction->today1Game()->where('HTFT', '!=', '')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'htft')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'htft')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'htft')->first();

		$title = 'HT/FT Tips';
		$keys = 'htft';
		return view('app.vip.games', compact('title', 'keys', 'yy', 'tt', 'tm', 'cy', 'ct', 'ctm'));
	}

	public function getInvestmentTips() {
		$yy = $this->prediction->yesterdayGame()->where('superInvestment', 'Yes')->get();
		$tt = $this->prediction->todayGame()->where('superInvestment', 'Yes')->get();
		$tm = $this->prediction->today1Game()->where('superInvestment', 'Yes')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'investment')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'investment')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'investment')->first();

		$title = 'Investment Scheme';
		$keys = 'suInTip';
		return view('app.vip.games', compact('title', 'keys', 'yy', 'tt', 'tm', 'cy', 'ct', 'ctm'));
	}

	public function getLikeTip($id, $token) {
		$ex_likes = [];
		$post = Prediction::find($id);
		$likes = $post->likes;
		if ($likes) {
			$ex_likes = json_decode($likes);
			if (in_array($token, $ex_likes)) {
				return 'Ok';
			}

		}
		array_push($ex_likes, $token);
		Prediction::whereId($id)->update(['likes' => json_encode($ex_likes)]);
		return 'Ok';
	}

	public function getDisLikeTip($id, $token) {
		$ex_likes = [];
		$post = Prediction::find($id);
		$likes = $post->dislikes;
		if ($likes) {
			$ex_likes = json_decode($likes);
			if (in_array($token, $ex_likes)) {
				return 'Ok';
			}

		}
		array_push($ex_likes, $token);
		Prediction::whereId($id)->update(['dislikes' => json_encode($ex_likes)]);
		return 'Ok';
	}
}
