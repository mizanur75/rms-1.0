<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model{
    function role(){
    	return $this->belongsTo('App\Role')->orderBy('id','ASC');
    }
}
