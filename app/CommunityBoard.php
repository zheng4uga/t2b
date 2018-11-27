<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * Description of CommunityBoard
 *
 * @author yongquizheng
 */
class CommunityBoard extends Model {
    //put your code here
    
    protected $table = 'community_board';

    
    protected $fillable = [
        'id', 'title', 'description','created_by','published','created_at','image'
        ];
    
    
    protected function createdBy(){
    
       return $this->belongsTo('App\User', 'id','created_by');
        
    }
    
    protected function boardImage(){
        return $this->hasOne('App\DirectusFiles','id','image');
    }

}
