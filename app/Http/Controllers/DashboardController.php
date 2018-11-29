<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\CommunityBoard;
use App\ShiftRequest;
use Illuminate\Support\Facades\Auth;
use App\Store as Store;
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
    
    public function index($id = null){
        $storeId = empty($id)?Auth::user()->memberStore->id:$id;
        $data = array('displayStores'=>$this->getDisplayStores($id),'storeId'=>$storeId);
        return view('dashboard',$data);
    }
    
    private function getDisplayStores($id = null){
         $storeId = empty($id)?Auth::user()->memberStore->id:$id;
        return Store::where('id','!=',$storeId)->get();
    }


    public function community(){
        
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
