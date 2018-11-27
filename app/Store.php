<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;
use \Illuminate\Database\Eloquent\Model;
/**
 * Description of Store
 *
 * @author yongquizheng
 */
class Store extends Model {
    
    protected $table='store';
    
    protected $fillable=[
        'id','address','city','state','zipcode','nickname','area'
    ];
    //put your code here
    
    public function belongArea(){
        return $this->hasOne('App\Area','id','area');
    }
}
