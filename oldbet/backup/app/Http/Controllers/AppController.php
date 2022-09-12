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

class AppController extends Controller
{

    public function getverifyphone()
    {
        return view('app.phone_verify_start');
    }
    public function getIndex()
    {
        return view('app.index');
    }

     public function getSmsCampaign()
    {
         $sub=sms_subcription::where('category',currentUser()->sms_cat)->first();

        //$sub=$sub[0];
        return view('app.sms_campaign',compact('sub'));
    }
    public function getGeneralActivatePhone(){

       return view('general_verify_phone');

    }


    public function getEditProfile()
    {
        return view('app.editProfile');
    }
    public function getSmsPaymentPage($plan ,Request $request)
    {

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
        if (currentUser()->phone!= $data['phone']) {
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
