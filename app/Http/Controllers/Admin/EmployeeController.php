<?php

namespace App\Http\Controllers\Admin;

use DB;
use Carbon\Carbon;
use App\Employee;
use App\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller{

    public function index(){
        $employees= Employee::all();
        return view('admin.employee.index',compact('employees'));
    }

    public function create(){
        $roles = Role::all();
        return view('admin.employee.create', compact('roles'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'cmbRole'=>'required',
            'txtName'=>'required',
            'txtPhone'=>'required',
            'txtEmail'=>'required',
            'txtPreAddress'=>'required',
            'txtPerAddress'=>'required',
            'txtGender'=>'required',
            'txtId'=>'required|mimes:jpeg,jpg,png',
        ]);

        $identity = $request->file('txtId');
        $slug = str_slug($request->txtName);

        if (isset($identity)) {
            $current = Carbon::now()->toDateString();
            $identityname = $slug.'-'.$current.'-'.uniqid().'.'.$identity->getClientOriginalExtension();

            if (!file_exists('uploads/employee')) {
                mkdir('uploads/employee');
            }

            $identity->move('uploads/employee',$identityname);
        }else{
            $identityname='default.png';
        }

        $employee = new Employee;
        $employee->role_id=$request->cmbRole;
        $employee->name=$request->txtName;
        $employee->phone=$request->txtPhone;
        $employee->email=$request->txtEmail;
        $employee->pre_address=$request->txtPreAddress;
        $employee->per_address=$request->txtPerAddress;
        $employee->sex=$request->txtGender;
        $employee->identity=$identityname;
        $employee->save();

        return redirect()->route('employee.index')->with('msg','Employee Successfully Added!');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $employee = Employee::find($id);
        $roles = Role::all();
        return view('admin.employee.edit', compact('employee',('roles')));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'cmbRole'=>'required',
            'txtName'=>'required',
            'txtPhone'=>'required',
            'txtEmail'=>'required',
            'txtPreAddress'=>'required',
            'txtPerAddress'=>'required',
            'txtGender'=>'required',
            'txtId'=>'mimes:jpeg,jpg,png',
        ]);

        $identity = $request->file('txtId');
        $slug = str_slug($request->txtName);
        $employee=Employee::find($id);
        if (isset($identity)) {
            $current = Carbon::now()->toDateString();
            $identityname = $slug.'-'.$current.'-'.uniqid().'.'.$identity->getClientOriginalExtension();

            if (!file_exists('uploads/employee')) {
                mkdir('uploads/employee');
            }

            $identity->move('uploads/employee',$identityname);
        }else{
            $identityname=$employee->identity;
        }

        $employee->role_id=$request->cmbRole;
        $employee->name=$request->txtName;
        $employee->phone=$request->txtPhone;
        $employee->email=$request->txtEmail;
        $employee->pre_address=$request->txtPreAddress;
        $employee->per_address=$request->txtPerAddress;
        $employee->sex=$request->txtGender;
        $employee->identity=$identityname;
        $employee->save();

        return redirect()->route('employee.index')->with('msg','Employee Successfully Updated!');
    }

    public function destroy($id){
        $employee = Employee::find($id);
        if (file_exists('uploads/employee/'.$employee->identity)) {
            unlink('uploads/employee/'.$employee->identity);
        }
        
        $employee->delete();
        return redirect()->back()->with('dmsg','Employee Successfully Deleted!');
    }
}
