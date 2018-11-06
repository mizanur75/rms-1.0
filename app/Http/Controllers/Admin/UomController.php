<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Uom;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UomController extends Controller{
   
    public function index(){
        $uoms = Uom::all();
        return view('admin.uom.index',compact('uoms'));
    }

    public function create(){
        return view('admin.uom.create');
    }

    public function store(Request $request){
        $uom = new Uom;
        $uom->name = $request->txtName;
        $uom->save();

        return redirect()->route('uom.index')->with('msg','UOM Successfully Added!');
    }

    public function show($id){

    }

    public function edit($id){
        $uom = Uom::find($id);
        return view('admin.uom.edit',compact('uom'));
    }

    public function update(Request $request, $id){
        $uom = Uom::find($id);
        $uom->name = $request->txtName;
        $uom->save();

        return redirect()->route('uom.index')->with('umsg','UOM Successfully Updated!');
    }

    public function destroy($id){
        Uom::find($id)->delete();
        return redirect()->back()->with('dmsg','UOM Successfully Deleted!');
    }
}
