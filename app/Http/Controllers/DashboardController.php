<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\CommunityBoard;
use App\ShiftRequest;
/**
 * Description of DashboardController
 *
 * @author yongquizheng
 */
class DashboardController extends Controller {
    //put your code here
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index(){
        return view('dashboard');
    }
    
    public function dashboard(){
        return view('communityboard',['boards'=> CommunityBoard::all()]);
    }
    
    public function shiftrequest(){
         return view('shift/request');
    }
    
    public function viewShift($id){
        if(!empty($id) && is_numeric($id)){
           $shift = ShiftRequest::find($id);
           if($shift){
            return view('shift/viewshift',['curshift'=>$shift]);
           }else{
               abort(404);
           }
        }else{
            abort(404);
        }
    }
}
