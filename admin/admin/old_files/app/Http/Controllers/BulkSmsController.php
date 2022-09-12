<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\SMS;
use App\User;
use App\Sms_subscription;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\ResponseFacade;

class BulkSmsController extends Controller
{
     public function sendSms( Request $request )
     {
       // Your Account SID and Auth Token from twilio.com/console

       $sid    = env( 'TWILIO_SID' );
       $token  = env( 'TWILIO_AUTH_TOKEN' );
       $client = new Client( $sid, $token );
       $validator = Validator::make($request->all(), [
           'numbers' => 'required',
           'message' => 'required'
       ]);

       if ( $validator->passes() ) {

           $numbers_in_arrays = explode( ',' , $request->input( 'numbers' ) );

           $message = $request->input( 'message' );
           $count = 0;
           $data='';

           foreach( $numbers_in_arrays as $number )
           {
               
               try {

               	$client->messages->create(
                   $number,
                   [
                       'from' => env( 'TWILIO_NUMBER' ),
                       'body' => $message,
                   ]
               );
               		$count++;
               } catch (\Exception $e) {
               	$data=$data.','.$number;
               }
               
           }
           //die(print_r($data));
             session()->flash('message1', $count . " messages sent!");
             session()->flash('data1',$data);

          // $content=SMS::select('phone_number')->get();
   	// die(print_r($content));
      	/*$bulk='';
      	$i=0;
      	foreach ($content as $key => $value) {
      		$phone=substr($value->phone, 1);
      		if($i==0){
      			$bulk=$phone;
      		}else{

      			$bulk=$bulk.','.$phone;
      		}

      		$i++;
    		
      	}
      */
   	//die($bulk);
   	// return view('sms.bulk_sms',compact('bulk','data'));
         return redirect()->route('/ActiveSms')->with('page','the lord is good');
              
       } else {
           return redirect()->back()->withErrors( $validator );
       }
   }
      public function sendInactiveSms( Request $request )
     {
       // Your Account SID and Auth Token from twilio.com/console

       $sid    = env( 'TWILIO_SID' );
       $token  = env( 'TWILIO_AUTH_TOKEN' );
       $client = new Client( $sid, $token );
       $validator = Validator::make($request->all(), [
           'numbers' => 'required',
           'message' => 'required'
       ]);

       if ( $validator->passes() ) {

           $numbers_in_arrays = explode( ',' , $request->input( 'numbers' ) );

           $message = $request->input( 'message' );
           $count = 0;
           $data='';

           foreach( $numbers_in_arrays as $number )
           {
               
               try {

                  $client->messages->create(
                   $number,
                   [
                       'from' => env( 'TWILIO_NUMBER' ),
                       'body' => $message,
                   ]
               );
                     $count++;
               } catch (\Exception $e) {
                  $data=$data.','.$number;
               }
               
           }
           //die(print_r($data));
             session()->flash('message2', $count . " messages sent!");
             session()->flash('data2',$data);

          // $content=SMS::select('phone_number')->get();
      // die(print_r($content));
         /*$bulk='';
         $i=0;
         foreach ($content as $key => $value) {
            $phone=substr($value->phone, 1);
            if($i==0){
               $bulk=$phone;
            }else{

               $bulk=$bulk.','.$phone;
            }

            $i++;
         
         }
      */
      //die($bulk);
      // return view('sms.bulk_sms',compact('bulk','data'));
         return redirect()->route('/InactiveSms');
              
       } else {
           return back()->withErrors( $validator );
       }
   }
      public function sendGeneralSms( Request $request )
     {
       // Your Account SID and Auth Token from twilio.com/console

       $sid    = env( 'TWILIO_SID' );
       $token  = env( 'TWILIO_AUTH_TOKEN' );
       $client = new Client( $sid, $token );
       $validator = Validator::make($request->all(), [
           'numbers' => 'required',
           'message' => 'required'
       ]);

       if ( $validator->passes() ) {

           $numbers_in_arrays = explode( ',' , $request->input( 'numbers' ) );

           $message = $request->input( 'message' );
           $count = 0;
           $data='';

           foreach( $numbers_in_arrays as $number )
           {
               
               try {

                  $client->messages->create(
                   $number,
                   [
                       'from' => env( 'TWILIO_NUMBER' ),
                       'body' => $message,
                   ]
               );
                     $count++;
               } catch (\Exception $e) {
                  $data=$data.','.$number;
               }
               
           }
           //die(print_r($data));
             session()->flash('message3', $count . " messages sent!");
             session()->flash('data3',$data);

          // $content=SMS::select('phone_number')->get();
      // die(print_r($content));
         /*$bulk='';
         $i=0;
         foreach ($content as $key => $value) {
            $phone=substr($value->phone, 1);
            if($i==0){
               $bulk=$phone;
            }else{

               $bulk=$bulk.','.$phone;
            }

            $i++;
         
         }
      */
      //die($bulk);
      // return view('sms.bulk_sms',compact('bulk','data'));
         return redirect()->route('/GeneralSms');
              
       } else {
           return back()->withErrors( $validator );
       }
   }
   public function getbulksms ()
   {
            $case='active';
            $status='';
            $sign='';
         if ($case=='active') {
            $sign='>';
            $status='1';
         }else{
            $sign='<';
            $status='';
         }
        
   	 $user=User::where('sms_status',$status)
                  ->where('phone_status','1')
                  ->where('sms_due_date',$sign , date('Y-m-d H:i:s'))->get();
   	//die(print_r($user));
   $ghana_numbers='';
      $nigeria_numbers='';
      $tanzania_numbers='';
      $uganda_numbers='';
      $kenya_numbers='';
      $other_numbers='';
      $a=0;
      $b=0;
      $c=0;
      $d=0;
      $e=0;
      $f=0;
      foreach ($user as $key  => $value) {

         if($value->country_code=='233'){


               if($a==0){
                  $ghana_numbers='+'.$value->country_code.substr($value->phone, 1);
               }else{

                  $ghana_numbers=$ghana_numbers.','.'+'.$value->country_code.substr($value->phone, 1);
                  $a++;
               }
         }
             
         if($value->country_code=='234'){


               if($b==0){
                  // die('goat');
                  $nigeria_numbers='+'.$value->country_code.substr($value->phone, 1);
               }
               if($b>0){

                  $nigeria_numbers=$nigeria_numbers.','.'+'.$value->country_code.substr($value->phone, 1);
                  $b++;
               }
         }

         if($value->country_code=='254'){


               if($c==0){
                  $kenya_numbers='+'.$value->country_code.substr($value->phone, 1);
               }else{

                  $kenya_numbers=$kenya_numbers.','.'+'.$value->country_code.substr($value->phone, 1);
                  $c++;
               }
         }
         
           if($value->country_code=='255'){


               if($d==0){
                  $tanzania_numbers='+'.$value->country_code.substr($value->phone, 1);
               }else{

                  $tanzania_numbers=$tanzania_numbers.','.'+'.$value->country_code.substr($value->phone, 1);
                  $d++;
               }
         }
          if($value->country_code=='256'){


               if($e==0){
                  $uganda_numbers='+'.$value->country_code.substr($value->phone, 1);
               }else{

                  $uganda_numbers=$uganda_numbers.','.'+'.$value->country_code.substr($value->phone, 1);
                  $e++;
               }
         }
         if($value->country_code!='256' && $value->country_code!='255'&& $value->country_code!='254' && $value->country_code!='234' && $value->country_code!='233'){


               if($f==0){
                  $other_numbers='+'.$value->country_code.substr($value->phone, 1);
               }else{

                  $other_numbers=$other_numbers.','.'+'.$value->country_code.substr($value->phone, 1);
                  $f++;
               }
         }
      
      
      }
      
   	
  

   	//die($ghana_numbers.$kenya_numbers.$nigeria_numbers.$tanzania_numbers.$uganda_numbers);
   	return view('sms.bulk_sms',compact('ghana_numbers','kenya_numbers','nigeria_numbers','tanzania_numbers','uganda_numbers','other_numbers'));
   }
    public function getbulksmsInactive ()
   {
            $case='inactive';
            $status='';
            $sign='';
         if ($case=='active') {
            $sign='>';
            $status='1';
         }else{
            $sign='<';
            $status='';
         }
        
       $user=User::where('sms_status',$status)
                  ->where('phone_status','1')
                  ->where('sms_due_date',$sign , date('Y-m-d H:i:s'))->get();
      //die(print_r($user));
      $ghana_numbers='';
      $nigeria_numbers='';
      $tanzania_numbers='';
      $uganda_numbers='';
      $kenya_numbers='';
      $other_numbers='';
      $a=0;
      $b=0;
      $c=0;
      $d=0;
      $e=0;
      $f=0;
      foreach ($user as $key  => $value) {

         if($value->country_code=='233'){


               if($a==0){
                  $ghana_numbers='+'.$value->country_code.substr($value->phone, 1);
               }else{

                  $ghana_numbers=$ghana_numbers.','.'+'.$value->country_code.substr($value->phone, 1);
                  $a++;
               }
         }
             
         if($value->country_code=='234'){


               if($b==0){
                  // die('goat');
                  $nigeria_numbers='+'.$value->country_code.substr($value->phone, 1);
               }
               if($b>0){

                  $nigeria_numbers=$nigeria_numbers.','.'+'.$value->country_code.substr($value->phone, 1);
                  $b++;
               }
         }

         if($value->country_code=='254'){


               if($c==0){
                  $kenya_numbers='+'.$value->country_code.substr($value->phone, 1);
               }else{

                  $kenya_numbers=$kenya_numbers.','.'+'.$value->country_code.substr($value->phone, 1);
                  $c++;
               }
         }
         
           if($value->country_code=='255'){


               if($d==0){
                  $tanzania_numbers='+'.$value->country_code.substr($value->phone, 1);
               }else{

                  $tanzania_numbers=$tanzania_numbers.','.'+'.$value->country_code.substr($value->phone, 1);
                  $d++;
               }
         }
          if($value->country_code=='256'){


               if($e==0){
                  $uganda_numbers='+'.$value->country_code.substr($value->phone, 1);
               }else{

                  $uganda_numbers=$uganda_numbers.','.'+'.$value->country_code.substr($value->phone, 1);
                  $e++;
               }
         }
          if($value->country_code!='256'&& $value->country_code!='255'&& $value->country_code!='254'&& $value->country_code!='234'&& $value->country_code!='233'){


               if($f==0){
                  $other_numbers='+'.$value->country_code.substr($value->phone, 1);
               }else{

                  $other_numbers=$other_numbers.','.'+'.$value->country_code.substr($value->phone, 1);
                  $f++;
               }
         }
      
     
      }
      
  

      //die($ghana_numbers.$kenya_numbers.$nigeria_numbers.$tanzania_numbers.$uganda_numbers);
      return view('sms.bulk_sms',compact('ghana_numbers','kenya_numbers','nigeria_numbers','tanzania_numbers','uganda_numbers','other_numbers'));

   }

    public function getSendActiveSms ()
   {
           
        
       $user=User::where('sms_status','1')
                  ->where('phone_status','1')
                  ->where('sms_due_date','>', date('Y-m-d H:i:s'))->get();
      //die(print_r($user));
      $bulk='';
      $a=0;
      
      foreach ($user as $key  => $value) {

        


               if($a==0){
                  $bulk='+'.$value->country_code.substr($value->phone, 1);
               }else{

                  $bulk=$bulk.','.'+'.$value->country_code.substr($value->phone, 1);
                  $a++;
               }
         
      }
            
         $title='active';

            //die($ghana_numbers.$kenya_numbers.$nigeria_numbers.$tanzania_numbers.$uganda_numbers);
            return view('sms.sms',compact('bulk','title'));
      
   }
    public function getSendInactiveSms ()
   {
           
        
       $user=User::where('sms_status','1')
                  ->where('phone_status','1')
                  ->where('sms_due_date','<', date('Y-m-d H:i:s'))->get();
      //die(print_r($user));
      $bulk='';
      $a=0;
      
      foreach ($user as $key  => $value) {

        


               if($a==0){
                  $bulk='+'.$value->country_code.substr($value->phone, 1);
               }else{

                  $bulk=$bulk.','.'+'.$value->country_code.substr($value->phone, 1);
                  $a++;
               }
         
      }
      
       
         $title='inactive';

            //die($ghana_numbers.$kenya_numbers.$nigeria_numbers.$tanzania_numbers.$uganda_numbers);
            return view('sms.sms',compact('bulk','title'));
   }
   public function getSendGeneralSms ()
   {
           
        
       $user=User::where('sms_status','1')
                  ->where('phone_status','1')
                  ->get();
      //die(print_r($user));
      $bulk='';
      $a=0;
      
      foreach ($user as $key  => $value) {

        


               if($a==0){
                  $bulk='+'.$value->country_code.substr($value->phone, 1);
               }else{

                  $bulk=$bulk.','.'+'.$value->country_code.substr($value->phone, 1);
                  $a++;
               }
         
      }
      
       
         $title='general';

            //die($ghana_numbers.$kenya_numbers.$nigeria_numbers.$tanzania_numbers.$uganda_numbers);
            return view('sms.sms',compact('bulk','title'));
   }

    public function getActivateSms()
    {

      $plans=Sms_subscription::all();
      //die(print_r($plans));
      return view('sms.sms_activate',compact('plans'));

    }

    public function postActivateSms(Request $request)
    {

      $request=$request->all();

      //die($request['email']);
      // $content = $request['message'];
        $date = date('Y-m-d H:i:s');

        
//        dd($users);
        //foreach ($users->all() as $user) {
            //$mail = $users->email;
            $email = strtolower($request['email']);
            $users = User::where('email', $email)->get()->count();
            if ($users>0) {
               $get_plan=Sms_subscription::where('category',$request['plan'])->first();
               
            $due_date=date('Y-m-d H:i:s',strtotime('+'.$get_plan['duration']));
               $name=User::where('email',$email)->first();
               $name=$name['full_name'];
               $users = User::where('email', $email)->update(['sms_status'=>'1','sms_cat'=>$get_plan['category'],'sms_subscribed_date'=>$date,'sms_due_date'=>$due_date]);
             

             try {
         

               Mail::send('mailtemplate.sms_mail', ['name' => $name, 'sub'=>$get_plan], function ($message) use ( $email)  {
                        $message->to($email, 'CLEANODDS')
                        ->subject('SMS PLANS ACTIVATION');
                   });
               ResponseFacade::validationMessage('SMS ACCOUNT ACTIVATED SUCCESSFULLY','0');
               } catch (\Exception $e) {
                   ResponseFacade::validationMessage('SMS ACCOUNT ACTIVATED SUCCESSFULLY "But the email is not available online"','7');

               }  
            // Mail::send('mailtemplate.bc', ['name' => $name, 'content'=>$content], function ($message) use ($all) {
            // $message->to($all['toref'], 'CLEANODDS')
            //     ->subject($all['title']);
            //  });
               
                  
                  //ResponseFacade::validationMessage($due_date,'1');
               
            }else{
               ResponseFacade::validationMessage('SOMETHING  BROKEN','3');
            }
            
    }
     public function Loadsmsplans()
    {

      $plans=Sms_subscription::all();
      //die(print_r($plans));
      return view('sms.sms_plan',compact('plans'));

    }

    public function postUpdatePlan ( Request  $request)

    {
      //die('it is good');

      $validate=Validator::make($request->all(),[
         'planName'=>'required',
         'nairaPrice'=>'required',
         'keshPrice'=>'required',
         'ugxPrice'=>'required',
         'tzsPrice'=>'required',
         'cedPrice'=>'required',
         'dollarPrice'=>'required',
         'planBenefits'=>'required'

      ]);

      if($validate->fails()){

          session()->flash('danger', 'All Fields Are required ...!');
           

            return redirect()->route('/LoadSmsPlans');
      }else{

         $values=$request->all();
         //die(print_r($values));
         $data=[

         'planName'=>ucwords(strtolower($values['planName'])),
         'category'=>ucwords(strtolower($values['planName'])),
         'duration'=>$values['due1'].' '.$values['due2'],
         'nairaPrice'=>$values['nairaPrice'],
         'keshPrice'=>$values['keshPrice'],
         'ugxPrice'=>$values['ugxPrice'],
         'tzsPrice'=>$values['tzsPrice'],
         'cedPrice'=>$values['cedPrice'],
         'dollarPrice'=>$values['dollarPrice'],
         'planBenefits'=>$values['planBenefits']

         ];
         //die(print_r($data));
         try {

            $sms_create=Sms_subscription::where('id',$values['id'])->update($data);
           session()->flash('message', 'Plans Updated successfully!');
           //ResponseFacade::validationMessage('Ok', '0');
            return redirect('/LoadSmsPlans')->with('message','Plans Updated successfully!');
         } catch (\Exception $e) {
            session()->flash('danger', 'Something is broken ...!');
           

            return redirect()->route('/LoadSmsPlans');
         }
         

         
      }

      

    }
       public function postAddPlan(Request  $request)

    {

      $validate=Validator::make($request->all(),[
         'planName'=>'required',
         'nairaPrice'=>'required',
         'keshPrice'=>'required',
         'ugxPrice'=>'required',
         'tzsPrice'=>'required',
         'cedPrice'=>'required',
         'dollarPrice'=>'required',
         'planBenefits'=>'required'

      ]);
      if($validate->fails()){
       ResponseFacade::validationMessage('All field Required!', '1');
      }else{
         $values=$request->all();
         $data=[

         'planName'=>ucwords(strtolower($values['planName'])),
         'category'=>ucwords(strtolower($values['planName'])),
         'duration'=>$values['due1'].' '.$values['due2'],
         'nairaPrice'=>$values['nairaPrice'],
         'keshPrice'=>$values['keshPrice'],
         'ugxPrice'=>$values['ugxPrice'],
         'tzsPrice'=>$values['tzsPrice'],
         'cedPrice'=>$values['cedPrice'],
         'dollarPrice'=>$values['dollarPrice'],
         'planBenefits'=>$values['planBenefits']

         ];

         try {

            $sms_create=Sms_subscription::create($data);
            ResponseFacade::validationMessage('Ok', '0');
         } catch (\Exception $e) {

            ResponseFacade::validationMessage('We have a hitch somewhere ..... ', '3');
         }
         

         
      }

      

    }

    public function getdeleteSmsPlans($id=null )
    {

      $delete=Sms_subscription::where('id',$id)->delete();
      // return redirect()->route('LoadSmsPlans');
      ResponseFacade::validationMessage('Ok', '0');

    }
         public  function postAddPhoneNumber(Request $request)
     {
      $validate=Validator::make($request->all(),[
         'phone'=>'required',
         'email'=>'required',
         'country_code'=>'required',
   

      ]);
      if($validate->fails()){
       ResponseFacade::validationMessage('All field Required!', '1');
      }else{
        $request=$request->all();
        $email=strtolower($request['email']);

        $user=User::where('email',$email)->count();
        if ($user>0) {
          $update=User::where('email',$email)->update(['country_code'=>$request['country_code'],'phone_status'=>'1','phone'=>$request['phone']]);
           ResponseFacade::validationMessage('All field Required!', '0');

        }else{
          ResponseFacade::validationMessage($email, '7');
        }
       
      }


     }


    public function allSmsUsers()
    {
        $user = User::where('sms_status','1')->orderBy('id','desc')->paginate(200);
        //die(print_r($user));
        return view('/smsmembers', ['members' => $user, 'title'=>'All Members']);
    }


}
