<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of Appointment
 *
 * @author yongquizheng
 */
class DirectUsFiles extends Model{
    protected $table = 'directus_files';
    //put your code here
    protected $fillable=['id','storage','filename','title','type','uploaded_by','uploaded_on',
        'charset','filesize','width','height','duration','embed','folder','description','location','tags','metadata'];
    
}
