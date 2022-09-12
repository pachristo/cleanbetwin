<?php

namespace App\Http\Controllers;

use App\Promotion;
use App\ImageValidator;
use App\Partners;
use App\ResponseFacade;
use App\ValidationMessage;
use Illuminate\Http\Request;

use App\Http\Requests;

class PromotionController extends Controller
{
    public function getPromotion(Request $request)
    {
        if ($request->isMethod('POST'))
        {
            $title = trim($request['title']);
            $details = trim($request['details']);
            $publishOn = trim($request['publishOn']);
            $publishStatus = trim($request['publishStatus']);
            $accessible = trim($request['accessible']);

            if ($title==NULL || $details==NULL || $publishOn==NULL || $publishStatus==NULL || $accessible==NULL)
            {
                ResponseFacade::validationMessage('All fields are required', '1');
            }
            else{
                $publishOn = date('Y-m-d H:i:s', strtotime($publishOn));
                $promotion = new Promotion();

                if (isset($request['id']))
                {
                    $id = $request['id'];
                    Promotion::where('id', $id)->update(['title'=>$title, 'details'=>$details, 'publishOn'=>$publishOn, 'publishStatus'=>$publishStatus, 'accessible'=>$accessible]);
                }
                else{
                    $promotion->title = $title;
                    $promotion->details = $details;
                    $promotion->publishOn = $publishOn;
                    $promotion->publishStatus = $publishStatus;
                    $promotion->accessible = $accessible;
                    $promotion->save();
                }

                ResponseFacade::validationMessage('Ok', '0');
            }
        }
        else{
            $promotions = Promotion::get();
            return view('promotions', ['promotions'=>$promotions]);
        }
    }

    public function editPromotion($id)
    {
        $prom = Promotion::find($id);
        return view('ajaxfiles.promotion', ['prom'=>$prom, 'edit'=>1]);
    }

    public function viewProm($id)
    {
        $prom = Promotion::find($id);
        return view('ajaxfiles.promotion', ['prom'=>$prom]);
    }

    public function trashPromotion($id)
    {
        Promotion::find($id)->delete();
        echo 'Ok';
    }


    public function getProm(){
        $ads=Promotion::latest('created_at')->get();

        return view('promotion',compact('ads'));
    }

    public function postPromotion(Request $req){
        // return response()->json([$req->all()]);
        $request=$req->all();
            if (isset($req->file)) {
                $adname = ImageValidator::validator($request['file'], 'promotion');
    
   
                    $request['file']->move('images/promotion', $adname);
                        Promotion::create([
                            'image'=>$adname,
                            'link'=>$req->link
                        ]);
                    ResponseFacade::validationMessage('NEW PROMOTION ADDED SUCCESSFULLY', '0');
   
            } else {
                ResponseFacade::validationMessage('NO IMAGE SELECTED');
            }

        }

    public function update_status($id,$status){
        
        $data=Promotion::find($id);
        
        if($data!=null){
            if($status=="2"){
                Promotion::where('id',$id)->delete();
                ResponseFacade::validationMessage(' PROMOTION DELETED SUCCESSFULLY', '0');
            }else{
                Promotion::where('id',$id)->update(['status'=>$status]);
                ResponseFacade::validationMessage(' PROMOTION STATUS UPDATED SUCCESSFULLY', '0');
            }
        }
    }
    
}
