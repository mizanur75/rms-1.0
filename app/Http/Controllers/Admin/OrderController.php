<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Order;
use App\Item;
use App\Uom;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller{

    public function index(){
        $orders = Order::all();
        return view('admin.order.index',compact('orders'));
    }

    public function create(){
        $items = Item::all();
        $uoms = Uom::all();
        return view('admin.order.create',compact('items','uoms'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'txtName' => 'required',
            'txtPhone' => 'required',
            'txtAddress' => 'required',
            'cmbPayment' => 'required',
            'cmbItem' => 'required',
            'cmbUOM' => 'required',
            'txtQty' => 'required',
            'txtPrice' => 'required',
        ]);
        $order = new Order;
        $order->name=$request->txtName;
        $order->phone=$request->txtPhone;
        $order->address=$request->txtAddress;
        $order->payment_method=$request->cmbPayment;
        $order->item_id=$request->cmbItem;
        $order->uom_id=$request->cmbUOM;
        $order->qty=$request->txtQty;
        $order->price=$request->txtPrice;
        $order->save();

        return redirect()->route('order.index')->with('msg','Order Successfully Created!');
    }

    public function show($id){
        $order = Order::find($id);
        return view('admin.order.invoice',compact('order'));
    }

    public function edit($id){
        
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        Order::find($id)->delete();
        return redirect()->back()->with('dmsg','Order Successfully Deleted!');
    }

    public function session(){

    }
}
