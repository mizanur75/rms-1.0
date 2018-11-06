<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupplierController extends Controller{

    public function index(){
        $suppliers=Supplier::all();
        return view('admin.supplier.index',compact('suppliers'));
    }

    public function create(){
        return view('admin.supplier.create');
    }


    public function store(Request $request){
        $supplier = new Supplier;
        $supplier->name=$request->txtName;
        $supplier->phone=$request->txtPhone;
        $supplier->email=$request->txtEmail;
        $supplier->address=$request->txtAddress;
        $supplier->save();

        return redirect()->route('supplier.index')->with('msg','Supplier Successfully Added!');
    }
    public function show($id){
        //
    }

    public function edit($id){
        $supplier = Supplier::find($id);
        return view('admin.supplier.edit',compact('supplier'));
    }

    public function update(Request $request, $id){
        $supplier = Supplier::find($id);
        $supplier->name=$request->txtName;
        $supplier->phone=$request->txtPhone;
        $supplier->email=$request->txtEmail;
        $supplier->address=$request->txtAddress;
        $supplier->save();
        return redirect()->route('supplier.index')->with('umsg','Supplier Successfully Updated!');
    }

    public function destroy($id){
        Supplier::find($id)
        ->delete();
        return redirect()->back()->with('dmsg','Supplier Successfully Deleted!');

    }
}
