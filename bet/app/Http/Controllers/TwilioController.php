<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Focus\Modules\User\Model\User;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Authy\AuthyApi;
use App\Helpers\JSONResponder;
class TwilioController extends Controller
{
   protected $authy;
   protected $sid;
   protected $authToken;
   protected $twilioFrom;

   public function __construct() {
       // Initialize the Authy API and the Twilio Client
       $this->authy = new AuthyApi(config('app.twilio')['AUTHY_API_KEY']);
       // Twilio credentials
       $this->sid = config('app.twilio')['TWILIO_ACCOUNT_SID'];
       $this->authToken = config('app.twilio')['TWILIO_AUTH_TOKEN'];
       $this->twilioFrom = config('app.twilio')['TWILIO_PHONE'];
   }

public function verifyPhone(Request $request) {
       // Validate form input
		//die(print_r($request->all()));
  return redirect('/');
	$data=$request->all();
		       $validate=Validator::make($data, [
           'country_code' => 'required|string|max:5',
           'phone' => 'required|string|max:14',
           'via' => 'required|string'
       ]);

		      if ($validate->fails()) {
		      	return redirect()->back()->withErrors($validate);
		      }

       //Call the "phoneVerification" method from the Authy API and pass the phone number, country code and verification channel(whether sms or call) as parameters to this method.
       if (currentUser()->phone_status=='1') {

       	if ($data['phone']==currentUser()->phone && $data['country_code']==currentUser()->country_code ) {
       		session()->flash('message','*Number already Verified');
       		return redirect()->route('/app/phone');
       	}
       }
       $response = $this->authy->phoneVerificationStart($data['phone'], $data['country_code'], $data['via']);
      
       if ($response->ok()) {
       	 $update_user=User::find(currentUser()->id)->update(['phone'=>$data['phone'],'country_code'=>$data['country_code']]);
       	
       	return view('app.phone_verification_code',compact('data'));
           
       } else  {

         session()->flash('message','*Unmatch country code With phone Number ');
         session()->flash('message1','*Make sure Your phone Line is Not a DND activated type or Landline ');
       		return redirect()->route('/app/phone');
       }
}


public function verifyCode(Request $request) {
       // Call the method responsible for checking the verification code sent.
  return redirect('/');
	$data=$request->all();
       $response = $this->authy->phoneVerificationCheck($data['phone'],$data['country_code'],$data['code']);

       if($response->ok()) {
           $update_user=User::where('id',currentUser()->id)->update(['phone'=>$data['phone'],'country_code'=>$data['country_code'],'phone_status'=>'1']);
            session()->flash('message','*Number verification successfull ');
            if ($update_user) {
            	return redirect()->route('/app/index');
            }else{

            	session()->flash('wrongmessage','*An Error occured try again later ');
         
       		return redirect()->route('/app/phone');

            }
           
       } else {
          session()->flash('wrongmessage','*Invalid Confirmation Number ');
         
       		return redirect()->route('/app/phone');
       }
}
}
