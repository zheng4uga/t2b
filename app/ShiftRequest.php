<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Model;
/**
 * Description of ShiftRequest
 *
 * @author yongquizheng
 */
class ShiftRequest extends Model {
    //put your code here
    
    protected $table = 'shift_request';
    
    protected $fillable = ['id','start','end','status','title','assigned_member','request_member'];
    
    protected $appends = ['url','encodedMapAddress'];
    protected $casts =[
        'start'=>'datetime:Y-m-d\TH:i:s',
        'end'=>'datetime:Y-m-d\TH:i:s'
    ];
    
    public function requestedStore(){
        return $this->hasOne('App\Store','id','store');
    }
    
    public function requestMember(){
        return $this->hasOne('App\User','id','request_member');    
    }
    
    public function assignedMember(){
        return $this->hasOne('App\User','id','assigned_member'); 
    }
    
    public function getUrlAttribute(){
        
     return url('shift/'.$this->getAttribute('id'));
        
    }
    public function getEncodedMapAddressAttribute(){
       $addr = $this->requestedStore->address;
        $city = $this->requestedStore->city;
        $state = $this->requestedStore->state;
        $zip = $this->requestedStore->zipcode;
        $fullAddress = $addr.' '.$city.' '.$state.' '.$zip;
        return htmlentities($fullAddress);


    }
}
