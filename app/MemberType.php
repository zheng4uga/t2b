<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;



use Illuminate\Database\Eloquent\Model as Model;


/**
 * Description of MemberType
 *
 * @author yongquizheng
 */
class MemberType extends Model {
    //put your code here
    
    protected $table='member_type';
    
    protected $fillable =['id','name','group'];
    
    public function memberGroup(){
        return $this->hasOne('App\Group','id','group');
    }
}
