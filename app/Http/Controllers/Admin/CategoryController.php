<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller{

    public function index(){
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'txtName'=> 'required',
        ]);

        $category=new Category;
        $category->name=$request->txtName;
        $category->slug = str_slug($request->txtName);
        $category->save();

        return redirect()->route('category.index')->with('msg','Category Successfully Added!');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'txtName'=> 'required',
        ]);

        $category=Category::find($id);
        $category->name=$request->txtName;
        $category->slug = str_slug($request->txtName);
        $category->save();

        return redirect()->route('category.index')->with('umsg','Category Successfully Updated!');
    }

    public function destroy($id){
        Category::find($id)->delete();

        return redirect()->back();
    }
}
