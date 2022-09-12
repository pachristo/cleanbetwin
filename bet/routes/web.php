<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

//$localPath = 'https://cleanodds.com/images';
//$path = "https://cleanodds.com/administrator/images/";

$localPath =url('/images');
$path = url('/admin/images/');

View::share(compact('path', 'localPath'));

Route::get('/home', function () {
	return redirect('/');
})->name('/');

Route::get('/', 'PublicController@getIndex')->name('/home');
Route::get('/tips_store', function () {
	return view('store');
})->name('/tips_store');

Route::get('/about_us', function () {
	return view('about');
})->name('/about_us');

Route::get('/terms-and-conditions', function () {
	return view('terms');
})->name('/terms');

Route::get('/disclaimer', function () {
	return view('disclaimer');
})->name('/disclaimer');
Route::get('/privacy-policy', function () {
	return view('privacy');
})->name('/privacy');

Route::get('/how-to-pay/{COUNTRY?}',
[
	'uses' => 'PublicController@getHowPay',
]

)->name('how_to_pay');
Route::get('/select_country',[
    'uses' => 'PublicController@Selectcountry',
    ]);
Route::get('/disclaimer', function () {
	return view('disclaimer');
})->name('/disclaimer');

Route::get('/privacy_policy', function () {
	return view('privacy');
})->name('/privacy_policy');

Route::get('/advertise', function () {
	return view('advert');
})->name('/advertise');

Route::get('/partners', function () {
	return view('partners');
})->name('/partners');

Route::get('/faq', function () {
	return view('faq');
})->name('/faq');

Route::get('/contact_us', function () {
	return view('contact');
})->name('/contact_us');

Route::get('/vip_packages', [
	'uses' => 'PublicController@getPricing',
])->name('/vip_packages');

Route::get('/pay/{category?}/{title?}', [
	'uses' => 'PaymentController@getPayment',
	'middleware' => 'sentinelAuth',
])->name('/pay');

Route::get('/country', [
	'uses' => 'PublicController@getCountry',
	'middleware' => 'sentinelAuth',
])->name('/country');

Route::post('/country', [
	'uses' => 'PublicController@postCountry',
])->name('/country');

//SMS Routes
Route::get('/confirm_phone_number/{phone?}', [
	'uses' => 'SMSController@getVerify',
])->name('/confirm_phone_number');

Route::get('/join_sms_list', [
	'uses' => 'SMSController@getJoin',
	'middleware' => 'sentinelAuth',
])->name('/join_sms_list');

Route::post('/join/sms/list', [
	'uses' => 'SMSController@postJoin',
	'middleware' => 'sentinelAuth',
])->name('/join_list');

Route::post('/confirm_phone_number', [
	'uses' => 'SMSController@postVerify',
])->name('/confirm_phone_number');

Route::get('/pay_sms/{plan?}', [
	'uses' => 'AppController@getSmsPaymentPage',
	'middleware' => 'sentinelAuth',
])->name('/pay_sms');

Route::get('/recent_winings', [
	'uses' => 'PredictionController@getTestimonial',
])->name('/testimonials');

Route::get('/blog', [
	'uses' => 'BlogController@getBlog',
])->name('/blog');

Route::get('/article/{slug?}', [
	'uses' => 'BlogController@getArticle',
])->name('/article');

Route::get('/latest_winning', [
	'uses' => 'PredictionController@getArchive',
])->name('/latest_winning');

Route::get('/double_chance', [
	'uses' => 'PredictionController@getDoubleChance',
])->name('/double_chance');

Route::get('/1_5_goals', [
	'uses' => 'PredictionController@getOver15',
])->name('/1_5_goals');

Route::get('/2_5_goals', [
	'uses' => 'PredictionController@getOver25',
])->name('/2_5_goals');

Route::get('/gg_btts', [
	'uses' => 'PredictionController@getBTTSs',
])->name('/gg_btts');

Route::get('/draw_no_bet', [
	'uses' => 'PredictionController@getDNB',
])->name('/draw_no_bet');

Route::get('/draws', [
	'uses' => 'PredictionController@getDraws',
])->name('/draws');

Route::get('/single_bets', [
	'uses' => 'PredictionController@getSingleBets',
])->name('/single_bets');

Route::get('/banker_of_d_day', [
	'uses' => 'PredictionController@getBanker',
])->name('/banker_of_d_day');

Route::get('/win_either_half', [
	'uses' => 'PredictionController@getWEH',
])->name('/win_either_half');
Route::get('/half_time_results', function () {
	//
	return redirect('/under_3_5_goals');
});
Route::get('/under_3_5_goals', [
	'uses' => 'PredictionController@getWeekend',
])->name('/half_time_results');

Route::get('/super_investment_tip', [
	'uses' => 'PredictionController@getInvestmentTips',
])->name('/super_investment_tip')->middleware(['sentinelAuth', 'investmentGuard']);

Route::get('/sureTwoOdds', [
	'uses' => 'PredictionController@getSureTwoOdds',
])->name('/sureTwoOdds')->middleware(['sentinelAuth', 'sure2']);

Route::get('/sureFiveOdds', [
	'uses' => 'PredictionController@getSureThreeOdds',
])->name('/sureThreeOdds')->middleware(['sentinelAuth', 'sure3']);

Route::get('/over35goals', [
	'uses' => 'PredictionController@getOver35goals',
])->name('/over35goals')->middleware(['sentinelAuth', 'superGuard']);

// Route::get('/single_bets', [
// 	'uses' => 'PredictionController@getSuperSingles',
// ])->name('/single_bets')->middleware(['sentinelAuth', 'megaGuard']);

Route::get('/sureTenOdds', [
	'uses' => 'PredictionController@getSureFiveOdds',
])->name('/sureFiveOdds')->middleware(['sentinelAuth', 'sure5']);

Route::get('/match_corners', [
	'uses' => 'PredictionController@getMatchCorner',
])->name('/match_corners')->middleware(['sentinelAuth', 'megaGuard']);

Route::get('/weekend_tips', [
	'uses' => 'PredictionController@getWeekendTips',
])->name('/weekend_tips')->middleware(['sentinelAuth', 'weekend']);

Route::get('/draws', [
	'uses' => 'PredictionController@getDraws',
])->name('/draws')->middleware(['sentinelAuth', 'superGuard']);

Route::get('/btts_gg', [
	'uses' => 'PredictionController@getBTTS',
])->name('/btts_gg')->middleware(['sentinelAuth', 'superGuard']);

Route::get('/ht_ft', [
	'uses' => 'PredictionController@getHTFT',
])->name('/ht_ft')->middleware(['sentinelAuth', 'megaGuard']);
Route::get('/correct_score', function () {
	return redirect('/sure_20_odds');
});
Route::get('/sure_20_odds', [
	'uses' => 'PredictionController@getCorrectScore',
])->name('/correct_score')->middleware(['sentinelAuth', 'megaGuard']);

Route::get('/expert_ACCA', [
	'uses' => 'PredictionController@getACCA',
])->name('/expert_ACCA')->middleware(['sentinelAuth', 'megaGuard']);

Route::get('/vip', function () {
	return view('plan');
})->name('/vip');

Route::get('/register', function () {
	return view('register');
})->name('/register');

Route::post('/register', [
	'uses' => 'AccountController@postRegister',
])->name('/register');

Route::post('/login', [
	'uses' => 'AccountController@postLogin',
])->name('/login');

Route::post('/resetPassword', [
	'uses' => 'ResetController@postReset',
])->name('/resetPassword');

Route::post('/resetPasswordNow', [
	'uses' => 'ResetController@postResetPassword',
])->name('/resetPasswordNow');

Route::get('/resetPassword/{email?}/{code?}', [
	'uses' => 'ResetController@getReset',
])->name('/resetPassword');

Route::get('/payment/{category?}/{title?}', [
	'uses' => 'PaymentController@getPayment',
	'middleware' => 'sentinelAuth',
])->name('/payment');

Route::get('/logout', [
	'uses' => 'AccountController@getLogout',
])->name('/logout');

Route::get('/login', function () {
	return view('login');
})->name('/login');

Route::get('/reset-password', function () {
	return view('resetPassword');
})->name('/reset-password');

Route::group(['prefix' => 'app', 'middleware' => ['sentinelAuth']], function () {

	Route::get('/account', [
		'uses' => 'AppController@getIndex',
	])->name('/app/index');

	Route::get('/sms_campaign', [
		'uses' => 'AppController@getSmsCampaign',
	])->name('/app/sms_campaign');

	Route::get('/activate/gen/phone', [
		'uses' => 'AppController@getGeneralActivatePhone',
	])->name('/activate/gen/phone');

	Route::post('/line/verify', ['uses' => 'TwilioController@verifyPhone'])->name('/phone.verify');
	Route::post('/verify-code', 'TwilioController@verifyCode')->name('/phone.verify.code');
	Route::get('/make_payment', [
		'uses' => 'AppController@getMakePayment',
	])->name('/app/make_payment');

	Route::get('/update_profile', [
		'uses' => 'AppController@getEditProfile',
	])->name('/app/update_profile');

	Route::post('/updateProfile', [
		'uses' => 'AppController@postUpdateProfile',
	])->name('/app/updateProfile');

	Route::get('/transactions', [
		'uses' => 'AppController@getTransactions',
	])->name('/app/transactions');
	Route::get('/verify/phone', [
		'uses' => 'AppController@getverifyphone',
	])->name('/app/phone');
});

Route::get('/paystack/{subID?}/{code?}', 'PaystackController@getPaymentStatus')->name('/paystack');
Route::get('/smspaystack/{subID?}/{code?}', 'smspaystack@getPaymentStatus')->name('/smspaystack')->middleware('sentinelAuth');

//RAVE ROUTE
Route::get('/rave/{id?}/{txRef?}', [
	'uses' => 'RavesController@getFinish',
])->name('/rave');
Route::get('/smsrave/{id?}/{txRef?}', [
	'uses' => 'smsrave@getFinish',
	'middleware' => 'sentinelAuth',
])->name('/smsrave');

Route::get('/like_tip/{id?}/{token?}', [
	'uses' => 'PredictionController@getLikeTip',
])->name('/like_tip');

Route::get('/dislike_tip/{id?}/{token?}', [
	'uses' => 'PredictionController@getDisLikeTip',
])->name('/dislike_tip');


Route::get('/todays-vip-tips', [
	'uses' => 'PredictionController@gettvt',
])->name('/todays_vip_tips')->middleware(['sentinelAuth', 'tvtWare']);

Route::get('/todays-vvip-tips', [
	'uses' => 'PredictionController@gettvvt',
])->name('/todays_vvip_tips')->middleware(['sentinelAuth', 'tvvtWare']);;

Route::get('/todays-ordinary-vip-tips', [
	'uses' => 'PredictionController@gettot',
])->name('/todays_ordinary_vip_tips')->middleware(['sentinelAuth', 'totWare']);;


Route::get('/fridays-vip-tips', [
	'uses' => 'PredictionController@getfrivt',
])->name('/fridays_vip_tips')->middleware(['sentinelAuth', 'frivtWare']);;

Route::get('/saturdays-vip-tips', [
	'uses' => 'PredictionController@getsatvt',
])->name('/saturdays_vip_tips')->middleware(['sentinelAuth', 'satvtWare']);;

Route::get('/sundays-vip-tips', [
	'uses' => 'PredictionController@getsunvt',
])->name('/sundays_vip_tips')->middleware(['sentinelAuth', 'sunvtWare']);;


Route::get('/daily-vip-packages',function(){
return view('dailyVip');
})->name('daily.vip.packages');