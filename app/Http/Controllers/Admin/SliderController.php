<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Slider;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller{

    public function index(){
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create(){
        return view('admin.sliders.create');
    }


    public function store(Request $request){
        $this->validate($request,[
            'txtTitle'=>'required',
            'txtSubTitle'=>'required',
            'fileImage'=>'required|mimes:jpeg,jpg,png',
        ]);

        $image = $request->file('fileImage');
        $slug = str_slug($request->txtTitle);

        if (isset($image)) {
            $current =Carbon::now()->toDateString();
            $imagename=$slug.'-'.$current.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/slider')) {
                mkdir('uploads/slider', 0777,true);
            }
            $image->move('uploads/slider',$imagename);
        }else{
            $imagename='default.png';
        }

        $slider=new Slider;
        $slider->title =$request->txtTitle;
        $slider->sub_title =$request->txtSubTitle;
        $slider->image =$imagename;
        $slider->save();
        return redirect()->route('slider.index')->with('msg','Slider Successfully Added!');
    }


    public function show($id){
        //
    }

    public function edit($id){
        $slider= Slider::find($id);
        return view('admin.sliders.edit',compact('slider'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'txtTitle'=>'required',
            'txtSubTitle'=>'required',
            'fileImage'=>'mimes:jpeg,jpg,png',
        ]);

        $image = $request->file('fileImage');
        $slug = str_slug($request->txtTitle);
        $slider = Slider::find($id);

        if (isset($image)) {
            $current =Carbon::now()->toDateString();
            $imagename=$slug.'-'.$current.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/slider')) {
                mkdir('uploads/slider', 0777,true);
            }
            $image->move('uploads/slider',$imagename);
        }else{
            $imagename=$slider->image;
        }
        $slider->title =$request->txtTitle;
        $slider->sub_title =$request->txtSubTitle;
        $slider->image =$imagename;
        $slider->save();
        return redirect()->route('slider.index')->with('umsg','Slider Successfully Updated!');
    }

    public function destroy($id){
        $slider= Slider::find($id);
        unlink('uploads/slider/'.$slider->image);
        $slider->delete();
        return redirect()->back()->with('dmsg','Slider Successfully Deleted!');
    }
}
