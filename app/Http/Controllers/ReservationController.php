<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Reservation;

class ReservationController extends Controller{

    public function reservation(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'datepicker' => 'required',
            'message' => 'required',
        ]);

        $reservation = new Reservation;
        $reservation->name = $request->name;
        $reservation->phone = $request->phone;
        $reservation->email = $request->email;
        $reservation->date = $request->datepicker;
        $reservation->message = $request->message;
        $reservation->status = false;
        $reservation->save();

        Toastr::success('Reservation Request Sent Successfully, We will notify shortly', 'success',["positionClass","toast-top-center"]);
        return redirect()->back();
    }

    public function create(){
        //
    }

    public function store(Request $request){
        //
    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }
}
