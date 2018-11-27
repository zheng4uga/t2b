<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;

use App\CommunityBoard as CommunityBoard;

/**
 * Description of CommunityController
 *
 * @author yongquizheng
 */
class CommunityController extends Controller {
    //put your code here
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index(){
        return view('communityboard',['boards'=> CommunityBoard::all()]);
    }
}
