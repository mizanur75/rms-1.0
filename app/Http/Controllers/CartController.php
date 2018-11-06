<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class CartController extends Controller
{
    function index(){
		return view('cart');
	}
    function add(Request $request){
    	$items = $request->txtName;
		$newid = is_array(session()->get('items'))?count(session()->get('items'))+1:1;
		$qty = $request->txtQty;
		$price = $request->txtPrice;

    	session()->push('items',[
			'id'=>$newid,
			'name'=>$items,
			'qty'=>$qty,
			'price'=>$price	
    	]);

    	return redirect()->back();
    }
    function show(){
    	$items=session()->get('items');
    	 	if(isset($items)){
    		echo "<table>";
    		echo "<tr><th>Id</th><th>Name</th><th>Qty</th><th>Price</th><th>Total</th></tr>";
    		$total=0;
    		foreach($items as $key=>$value){
    			$line_total=$value["qty"]*$value["price"];
    			$total+=$line_total;
    			echo "<tr><td>".$value["id"]."</td><td>".$value["name"]."</td><td>".$value["qty"]."</td><td>".$value["price"]."</td><td>".$line_total."</td><tr/>";
    		}
    		echo "<tr><td colspan='4'>Total</td><td>$total</td></tr>";
    		
    		echo "</table>";
    	}
    }

    function save(){
    	$items=session()->get('items');
    	$order_id=DB::table("order_master")->insertGetId(
    	 ['customer'=>'POS Customer']
    	);
    	
    	foreach($items as $key=>$value){
    			 $qty=$value["qty"];
    			 $price=$value["price"];
    			 $item=$value["name"];
    		
    		DB::insert("insert into order_details(order_id,item,qty,price)values('$order_id','$item','$qty','$price')");	
    	}
    	session()->flash("items");
    }

    function delete($id){
		$items = session()->get('items');

	    foreach ($items as $key => $val) {
	        if($id == $val["id"]){
		      session()->forget('items.'.$key);
			}
		}
    }
}
