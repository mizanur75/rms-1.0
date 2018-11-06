<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    function employees(){
    	return $this->hasMany('App\Employee');
    }
}
