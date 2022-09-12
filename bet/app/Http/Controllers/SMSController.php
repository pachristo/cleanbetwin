<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Focus\Modules\User\Model\User;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Authy\AuthyApi;
use App\Helpers\JSONResponder;
class SMSController extends Controller
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

    public function getJoin()
    {
      return redirect('/');
      if (currentUser()->sms_status=='1' && currentUser()->phone_status=='0') {
        return view('sms');
      }else{

        return redirect()->route('/app/sms_campaign');
      }
      
        
    }

    public function postJoin(Request $request)
    {
      return redirect('/');
      // Validate form input
        //die(print_r($request->all()));
    $data=$request->all();
               $validate=Validator::make($data, [
           'country_code' => 'required|string|max:4',
           'phone' => 'required|string|max:11',
           'via' => 'required|string'
       ],[
        'phone.max'=>'Your phone number should not be more than 11 characters'
       ]);

              if ($validate->fails()) {
                return redirect()->back()->withErrors($validate);
              }

       //Call the "phoneVerification" method from the Authy API and pass the phone number, country code and verification channel(whether sms or call) as parameters to this method.
              //$select_phone=User::where('phone',$data['phone'])->get()->count();
        $data_val=$request->all();
       if (currentUser()->phone==$data_val['phone'] && currentUser()->country_code==$data_val['country_code']) {

            session()->flash('message','*Number already Verified');
            return redirect()->route('/join_sms_list');
         
       }
       $response = $this->authy->phoneVerificationStart($data['phone'], $data['country_code'], $data['via']);
      
       if ($response->ok()) {
         
        
        return $this->getVerify($data);
           
       } else  {

         session()->flash('message','*Unmatch country code With phone Number ');
         session()->flash('message1','*Make sure Your phone Line is Not a DND activated type or Landline ');
            return redirect()->route('/join_sms_list');
       }
    }

    public function postVerify(Request $request)
    {     // Call the method responsible for checking the verification code sent.
      return redirect('/');
    $data=$request->all();
       $response = $this->authy->phoneVerificationCheck($data['phone'],$data['country_code'],$data['code']);

       if($response->ok()) {
           $update_user=User::where('id',currentUser()->id)->update([
            'phone'=>$data['phone'],'phone_status'=>'1',
            'country_code'=>$data['country_code']
           ]);
            session()->flash('success','*Your Number was successfully added to our list ');
            if ($update_user) {
                return redirect()->route('/join_sms_list');
            }else{

                session()->flash('wrongmessage','*An Error occured try again later ');
         
            return redirect()->route('/join_sms_list');

            }
           
       } else {
          session()->flash('wrongmessage','*Invalid Confirmation Number ');
         
            return redirect()->route('/join_sms_list');
       }

    }

    public function getVerify($data)
    {
      return redirect('/');
        return view('verify_phone', compact('data'));
    }

  
}
