<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Item;
use App\Category;
use App\Uom;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller{

    public function index(){
        $items = Item::all();
        return view('admin.item.index',compact('items'));
    }

    public function create(){
        $categories = Category::all();
        $uoms = Uom::all();
        return view('admin.item.create',compact('categories','uoms'));
    }

    public function store(Request $request){
        $item = new Item;
        $item->category_id = $request->cmbCategory;
        $item->name = $request->txtName;
        $item->price = $request->txtPrice;
        $item->uom_id = $request->cmbUOM;
        $item->description = $request->txtDescription;
        $item->image = "default.png";
        $item->save();

        return redirect()->route('item.index')->with('msg','Item Successfully Added!');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $item = Item::find($id);
        $categories = Category::all();
        return view('admin.item.edit',compact('item','categories'));
    }

    public function update(Request $request, $id){
        $item = Item::find($id);
        $item->category_id = $request->cmbCategory;
        $item->name = $request->txtName;
        $item->price = $request->txtPrice;
        $item->uom = $request->txtUOM;
        $item->description = $request->txtDescription;
        $item->image = "default.png";
        $item->save();

        return redirect()->route('item.index')->with('umsg','Item Successfully Updated!');
    }

    public function destroy($id){
        Item::find($id)->delete();
        return redirect()->back()->with('dmsg','Item Successfully Deleted!');
    }
}
