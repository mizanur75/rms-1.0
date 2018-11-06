<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Reservation;

class ReservationController extends Controller{

    public function index(){
        $reservations = Reservation::all();
        return view('admin.reservation.index',compact('reservations'));
    }

    public function update(Request $request, $id){
        $reservation = Reservation::find($id);
        $reservation->status = true;
        $reservation->save();
        Toastr::success('Reservation Successfully Confirmed!','Success',["positionClass","toast-top-center"]);
        return redirect()->back();
    }

    public function destroy($id){
        Reservation::find($id)->delete();
        return redirect()->back()->with('msg','Reservation Successfully Deleted!');
    }
}
