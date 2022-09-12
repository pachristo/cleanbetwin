<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Focus\Modules\Blog\Model\Blog;
use App\Focus\Modules\Prediction\Model\Prediction;
use App\Focus\Modules\Subscription\Model\Subscription;
use App\Focus\Modules\User\Model\User;
use App\Helpers\JSONResponder;
use App\sms_subcription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PublicController extends Controller {
	// public function getHome()
	// {

	//     return redirect('/home');
	// }

	public function getIndex(Prediction $prediction) {

		if (!isset($_COOKIE['focuspredict'])) {
			$code = rand(111111111, 999999999);
			setcookie("focuspredict", $code, time() + (10 * 365 * 24 * 60 * 60), '/') or die('unable to create cookie');
		}
		$tomorrow = Carbon::today()->addDay(1)->format('d-m-Y');
		$nextt = Carbon::today()->addDays(2)->format('d-m-Y');
		$nexttt = Carbon::today()->addDays(3)->format('d-m-Y');
		$nextttt = Carbon::today()->addDays(4)->format('d-m-Y');

		$freeYesterday = $prediction->yesterdayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
		$freeToday = $prediction->todayGame()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
		$freeTomorrow = $prediction->today1Game()->where('freePick', 'Yes')->orderBy('id', 'DESC')->take(40)->get();
		$inview = Prediction::where('display', '0')->where('upcomingGame', 'Yes')
			->where(function ($query) use ($tomorrow, $nextt, $nexttt, $nextttt) {
				$query->where('gameDate', $tomorrow)->orWhere('gameDate', $nextt)->orWhere('gameDate', $nexttt)->orWhere('gameDate', $nextttt);
			})
			->orderBy('id', 'ASC')->take(20)->get();

		$news = Blog::whereStatus('Publish')->latest()->take(3)->get();
		return view('welcome', compact('freeYesterday', 'freeToday', 'freeTomorrow', 'inview', 'news'));
	}

	public function getPricing($country = null, Subscription $subscription) {
//        if (!currentUser() && $country==null) return redirect('/select_country');
		// return redirect('/');
		$sms = sms_subcription::all();

		$sure2 = $subscription->where('category', 'Sure 2')->where('status','0')->get();

		$sure3 = $subscription->where('category', 'Sure 3')->where('status','0')->get();

		$sure5 = $subscription->where('category', 'Sure 5')->where('status','0')->get();

		$investment = $subscription->where('category', 'Investment Scheme')->where('status','0')->get();
		return view('vip', compact('sure2', 'sure3', 'investment', 'sure5'));
	}

	public function getCountry() {
		$url = Session::get('subRoute');
		$noAd = true;
		return view('country', compact('url', 'noAd'));
	}

	public function postCountry(Request $request) {
		$country = $request->country;
		User::where('id', currentUser()->id)->update(['country' => $country]);
		JSONResponder::validationMessage('Ok', '0');
	}

    public function getHowPay($COUNTRY = null, Request $request)
    {
        return view('how_to_pay', compact('COUNTRY'));
    }
    public function Selectcountry(Request $request)
    {

        $country=$request->request->get('COUNTRY');

        return response()->json(url('/how-to-pay').'/'.$country);
    }

}
