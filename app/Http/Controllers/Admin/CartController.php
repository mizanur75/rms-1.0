<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Migrations\Session;
use App\Item;
use App\Uom;


class CartController extends Controller
{
	function index(){
		return view('admin.cart.index');
	}
    function add(Request $request){
    	$items = $request->txtName;
		$newid = is_array(session()->get('items'))?count(session()->get('items')):1;
		$qty = $request->txtQty;
		$price = $request->txtPrice;
    	session()->push('items',[
			'id'=>$newid,
			'name'=>$items,
			'qty'=>$qty,
			'price'=>$price	
    	]);
    }
}
