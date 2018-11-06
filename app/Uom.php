<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uom extends Model{
   function items(){
   	return $this->hasMany('App\Item');
   }

   function orders(){
   	return $this->hasMany('App\Order');
   }
}
