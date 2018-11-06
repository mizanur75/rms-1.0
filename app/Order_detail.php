<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model{
    function order_master(){
    	return $this->belongsTo('App/Order_master');
    }
}
