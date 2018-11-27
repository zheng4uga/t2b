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
    //put your code here
    
    public function shiftRequests(){
        return ShiftRequest::with('requestMember')->with('assignedMember')->where('status','=','PENDING')->get()->toJson();
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
