<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller{

    public function index(){
        $roles = Role::all();
        return view('admin.role.index',compact('roles'));
    }

    public function create(){
        return view('admin.role.create');
    }

    public function store(Request $request){
        $role = new Role;
        $role->name=$request->txtName;
        $role->save();

        return redirect()->route('role.index')->with('msg','Role Successfully Added!');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $role=Role::find($id);
        return view('admin.role.edit', compact('role'));
    }

    public function update(Request $request, $id){
        $role = Role::find($id);
        $role->name=$request->txtName;
        $role->save();

        return redirect()->route('role.index')->with('umsg','Role Successfully Updated!');
    }

    public function destroy($id){
        Role::find($id)
        ->delete();

        return redirect()->back()->with('dmsg','Role Successfully Deleted!');
    }
}
