<?php

namespace App\Http\Controllers;

use App\Focus\Modules\Subscription\Model\Subscription;
use App\sms_subcription;
//use Illuminate\Support\Facades\Validator;

use App\Focus\Modules\User\Model\User;
use App\Helpers\ImageValidator;
use App\Helpers\JSONResponder;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Focus\Modules\BookingCode\Model\BookingCode;
use App\Focus\Modules\Prediction\Model\Prediction;

class AppController extends Controller
{
    public $prediction;
	public $code;

	public function __construct(Prediction $prediction, BookingCode $code) {
		$this->prediction = $prediction;
		$this->code = $code;
	}

    public function getverifyphone()
    {
      return redirect('/');
        return view('app.phone_verify_start');
    }
    public function getIndex()
    {

        $yy = [];
		$tt = [];
		$tm = [];

		$cy = [];
		$ct = [];
		$ctm = [];

		$title = '';
		$keys = '';
        
        if(activeUser()){
            if(currentUser()->sub->id=='1' || currentUser()->sub->id=='2'|| currentUser()->sub->id=='12'){
                       // sure 2
        $yy = $this->prediction->yesterdayGame()->where('sure2Odds', 'Yes')->get();
		$tt = $this->prediction->todayGame()->where('sure2Odds', 'Yes')->get();
		$tm = $this->prediction->today1Game()->where('sure2Odds', 'Yes')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'sure2')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'sure2')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'sure2')->first();

		$title = 'Sure 2 Odds';
		$keys = 'sure2';
            }
            
            if(currentUser()->sub->id=='3' || currentUser()->sub->id=='4'|| currentUser()->sub->id=='13'){

        // sure 3
        $yy = $this->prediction->yesterdayGame()->where('sure3Odds', 'Yes')->get();
		$tt = $this->prediction->todayGame()->where('sure3Odds', 'Yes')->get();
		$tm = $this->prediction->today1Game()->where('sure3Odds', 'Yes')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'sure3')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'sure3')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'sure3')->first();

		$title = 'Sure 5 Odds';
		$keys = 'sure3';
            }

            if(currentUser()->sub->id=='5' || currentUser()->sub->id=='6'|| currentUser()->sub->id=='14'){
        // sure 5

        $yy = $this->prediction->yesterdayGame()->where('sure5Odds', 'Yes')->get();
		$tt = $this->prediction->todayGame()->where('sure5Odds', 'Yes')->get();
		$tm = $this->prediction->today1Game()->where('sure5Odds', 'Yes')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'sure5')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'sure5')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'sure5')->first();

		$title = 'Sure 10 Odds';
		$keys = 'sure5';
            }
      

        if(currentUser()->sub->id=='9' || currentUser()->sub->id=='10'|| currentUser()->sub->id=='11'){
        // investment
        $yy = $this->prediction->yesterdayGame()->where('superInvestment', 'Yes')->get();
		$tt = $this->prediction->todayGame()->where('superInvestment', 'Yes')->get();
		$tm = $this->prediction->today1Game()->where('superInvestment', 'Yes')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'investment')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'investment')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'investment')->first();

		$title = 'Investment Scheme';
		$keys = 'suInTip';


        }



        if(currentUser()->sub->id=='15'){
		$yy = $this->prediction->yesterdayGame()->where('tvt', 'Yes')->get();
		$tt = $this->prediction->todayGame()->where('tvt', 'Yes')->get();
		$tm = $this->prediction->today1Game()->where('tvt', 'Yes')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'tvt')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'tvt')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'tvt')->first();

		$title = 'Today\'s VIP Tips';
		$keys = 'tvt';
		
	}
    if(currentUser()->sub->id=='16'){
		$yy = $this->prediction->yesterdayGame()->where('tvvt', 'Yes')->get();
		$tt = $this->prediction->todayGame()->where('tvvt', 'Yes')->get();
		$tm = $this->prediction->today1Game()->where('tvvt', 'Yes')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'tvvt')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'tvvt')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'tvvt')->first();

		$title = 'Today\'s VVIP Tips';
		$keys = 'tvvt';
		
	}
    if(currentUser()->sub->id=='17'){
		$yy = $this->prediction->yesterdayGame()->where('tot', 'Yes')->get();
		$tt = $this->prediction->todayGame()->where('tot', 'Yes')->get();
		$tm = $this->prediction->today1Game()->where('tot', 'Yes')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'tot')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'tot')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'tot')->first();

		$title = 'Today\'s Ordinary VIP Tips';
		$keys = 'tot';
		
	}
    if(currentUser()->sub->id=='18'){
		$yy = $this->prediction->yesterdayGame()->where('frivt', 'Yes')->get();
		$tt = $this->prediction->todayGame()->where('frivt', 'Yes')->get();
		$tm = $this->prediction->today1Game()->where('frivt', 'Yes')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'frivt')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'frivt')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'frivt')->first();

		$title = 'Friday\'s  VIP Tips';
		$keys = 'frivt';
		
	}

    if(currentUser()->sub->id=='19') {
		$yy = $this->prediction->yesterdayGame()->where('satvt', 'Yes')->get();
		$tt = $this->prediction->todayGame()->where('satvt', 'Yes')->get();
		$tm = $this->prediction->today1Game()->where('satvt', 'Yes')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'satvt')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'satvt')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'satvt')->first();

		$title = 'Saturday\'s  VIP Tips';
		$keys = 'satvt';
		
	}


    if(currentUser()->sub->id=='20') {
		$yy = $this->prediction->yesterdayGame()->where('sunvt', 'Yes')->get();
		$tt = $this->prediction->todayGame()->where('sunvt', 'Yes')->get();
		$tm = $this->prediction->today1Game()->where('sunvt', 'Yes')->get();

		$cy = $this->code->yesterdayGame()->where('VIPCategory', 'sunvt')->first();
		$ct = $this->code->todayGame()->where('VIPCategory', 'sunvt')->first();
		$ctm = $this->code->today1Game()->where('VIPCategory', 'sunvt')->first();

		$title = 'Sunday\'s  VIP Tips';
		$keys = 'sunvt';
		
	}
	

        }
       




	




        return view('app.index',compact('title', 'keys', 'yy', 'tt', 'tm', 'cy', 'ct', 'ctm'));
    }

     public function getSmsCampaign()
    {
      return redirect('/');
         $sub=sms_subcription::where('category',currentUser()->sms_cat)->first();

        //$sub=$sub[0];
        return view('app.sms_campaign',compact('sub'));
    }
    public function getGeneralActivatePhone(){
      return redirect('/');
       return view('general_verify_phone');

    }


    public function getEditProfile()
    {
     // return redirect('/');
        return view('app.editProfile');
    }
    public function getSmsPaymentPage($plan ,Request $request)
    {
      return redirect('/');
        $sub=sms_subcription::where('planName',$plan)->first();
        //die(print_r($sub));
        Session::put('subRoute', $request->url());
        if (currentUser()->sms_status=='1' &&  \Carbon\Carbon::parse(currentUser()->sms_due_date)->format('d M, Y @ h:ia' )> \Carbon\Carbon::parse(date('Y-m-d H:i:s'))->format('d M, Y @ h:ia' ) ) {
            $request->session()->flash("error", "YOU HAVE AN ACTIVE SMS SUBSCRIPTION <strong>WE DO NOT CURRENTLY SUPPORT DOUBLE-SUBSCRIPTION</strong>");
           return redirect('/app/sms_campaign');
         }
       //die($sub[0]);
      // if (currentUser()->country=='Nigeria' || currentUser()->country=='Kenya' || currentUser()->country=='Uganda' || currentUser()->country=='Ghana'||currentUser()->country=='Tanzania, United Republic of') {
      //     # code...
      
        return view('sms_pay',compact('sub'));
      // }else{

      //   $sub='';

      //   $country='Sorry, this Plan only support countries like Nigeria,Tanzania,Uganda,Ghana & Tanzania';

      //   return view('sms_pay',compact('country','sub'));
      //}




    }

    public function postUpdateProfile(Request $request, User $user)
    {
      
     // return redirect('/');
        $data = $request->except('_token');
        $validate = Validator::make($data, [
            'full_name' => 'string|required',
            'email' => 'required|email',
            'phone' => 'required|string',
            'country' => 'required|string'
        ]);
        if ($validate->fails()) JSONResponder::validationMessage('All * Fields Are Required');
        if (isset($request['file']))
        {
            $image = ImageValidator::validator($request['file'], $request['email']);
            $request['file']->move('images/users', $image);
            $user->where('id', currentUser()->id)->update(['passport'=>$image]);
        }
        if (isset($request['password']))
        {
            if ($request['password']==$request['password_confirmation']) { $user->where('id', currentUser()->id)->update(['password'=>bcrypt($request['password'])]); }
            else { JSONResponder::validationMessage('Password Do Not Match'); }

        }
        if (currentUser()->phone!=$data['phone']) {
            $user->where('id', currentUser()->id)->update(['phone_status'=>0]);
        }
            $user->where('id', currentUser()->id)->update($request->all(['full_name', 'username', 'email', 'phone', 'country', 'state']));
            if(currentUser()->phone!=$data['phone']  && currentUser()->sms_status=='1'){
                 JSONResponder::validationMessage('Ok', '3');
            }else{
                 JSONResponder::validationMessage('Ok', '0');
            }
       
    }
}
