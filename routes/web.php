<?php
Route::get('/','HomeController@index')->name('welcome');

Route::post('/reservation','ReservationController@reservation')->name('reservation');
Route::post('send', 'MailController@send')->name('send');


Auth::routes();
Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'admin'], function(){
	Route::get('dashboard', 'DashboardController@index')->name('admin.admin-dashboard');
	Route::resource('slider', 'SliderController');
	Route::resource('employee', 'EmployeeController');
	Route::resource('category', 'CategoryController');
	Route::resource('item', 'ItemController');
	Route::resource('supplier', 'SupplierController');
	Route::resource('role', 'RoleController');
	Route::resource('uom', 'UomController');
	Route::resource('order', 'OrderController');
  	Route::resource('kitchen', 'KitchenController');
	Route::get('cart', 'CartController@create')->name('cart.create');
	//Route::get('cart', 'CartController@add')->name('cart.add');
	Route::resource('reservation', 'ReservationController');
	
});

Route::get('cart','CartController@index');
Route::post('cart/add','CartController@add');
Route::get('cart/show','CartController@show');
Route::post('cart/save','CartController@save');



Route::get('/cart/delete/{id}',function($id){

	$items = session()->get('items');

    foreach ($items as $key => $val) {
        if($id == $val["id"]){
	      session()->forget('items.'.$key);
		}
	}
});

Route::get('/cart/flash',function(){
  session()->flash("items");
});

/*Route::get('/cart/save',function(){
	
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
});*/


