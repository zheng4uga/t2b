<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Description of Group
 *
 * @author yongquizheng
 */
class Group extends Model {
    //put your code here
    protected $table = 'group';
    protected $fillable=['id','group_name'];
}
