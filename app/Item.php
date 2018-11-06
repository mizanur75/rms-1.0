<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    function category(){
    	return $this->belongsTo('App\Category');
    }

    function uom(){
    	return $this->belongsTo('App\Uom');
    }
}
