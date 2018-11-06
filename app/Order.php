<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    function uom(){
    	return $this->belongsTo('App\Uom');
    }

    function item(){
    	return $this->belongsTo('App\Item');
    }
}
