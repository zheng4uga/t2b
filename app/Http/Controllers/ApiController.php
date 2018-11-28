<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\ShiftRequest as ShiftRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

/**
 * Description of ApiController
 *
 * @author yongquizheng
 */
class ApiController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }
    //put your code here
    
    public function shiftRequests(){
        return ShiftRequest::with('requestMember')->with('assignedMember')->where('status','=','PENDING')->get()->toJson();
    }
    
    private function savePickupShift($jobRequestId){
         $user = Auth::user();
         $shift = ShiftRequest::find($jobRequestId);
         $allowedSave=false;
         $errorMessage='Your cannot pick up this shift. Please contact your manager';
         if($shift->requestMember->member_type == $user->member_type 
                 || $user->member_type == 3){
            // this mean if the user is flex or it match the same user type as request member
             $allocatedHour = $user->allocated_hour;
             if($allocatedHour < 40){
                 $allowedSave=true;
             }else{
                 // this mean it is over 40 we need to check if it allow overtime
                 $allowedSave = boolval($user->allow_overtime);
                 $errorMessage = 'No overtime allowed. Please contact your manager';
             }
         }
         if($allowedSave){
            $shift->assigned_member=$user->id;
            $shift->status='ASSIGNED';
            if($shift->save()){
                return ['status'=>'success','message'=>'You have pick up this shift with shift # '.$shift->id];
            }else{
                return ['status'=>'failed','message'=>$errorMessage];
            }
         }
    }


    public function pickupShift(Request $request){
        if(Auth::check() && $request ->isMethod('post')){
            $jobRequestId = $request->post('id');
            if(!empty($jobRequestId)){
               $resp = $this->savePickupShift($jobRequestId);
               return response()->json($resp);
            }else{
               return response()->json(['status'=>'failed','message'=>'Your request cannot be processed. Please contact your manager']);
            }
        }else{
            abort(403, 'Unauthorized action.');
        }
    }
    
    public function addShift(Request $request){
        if(Auth::check() && $request->isMethod("post")){
            // this mean this user is login
            // post variables
           $loginUser = Auth::user();
           $end = $request->post('end');
           $start = $request->post('start');
           $title = $request->post('title');
           $endDt = new DateTime($end);
           $startDt = new DateTime($start);
           if($endDt < $startDt || $endDt == $startDt){
               return response()->json(['status'=>'failed','message'=>'End date needs to be greater than start date']);
           }
           $shiftRequest = new ShiftRequest();
           $shiftRequest->end = $end;
           $shiftRequest->start = $start;
           $shiftRequest->title = $title;
           $shiftRequest->request_member=$loginUser->id;
           $shiftRequest->status='PENDING';
           $shiftRequest->store=$loginUser->store;
           
           if($shiftRequest->save()){
              return response()->json(['status'=>'success','message'=>'Request # '.$shiftRequest->id.' has been successfully save']);
           }else{
             return response()->json(['status'=>'failed','message'=>'Your request cannot be added. Please contact your manager']);
           }
         
        }else{
            abort(403, 'Unauthorized action.');
        }
    }
}
