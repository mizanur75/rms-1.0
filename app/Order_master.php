<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_master extends Model
{
    function order_details(){
    	return $this->hasMany('App/Order_detail');
    }
}
