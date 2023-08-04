<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id()) {
            if(Auth::user()->usertype == 0){
                $doctors = Doctor::all();
                return view('user.home', compact('doctors'));
            } else {
                return view('admin.home');
            }
        } else {

        }
    }

    public function index()
    {
        if(Auth::id()){
            return redirect('home');
        } else {
            $doctors = Doctor::all();
            return view('user.home', compact('doctors'));
        }
    }

    public function appointment(Request $request)
    {
        $appointment = new Appointment;
        $appointment->name=$request->name;
        $appointment->email=$request->email;
        $appointment->phone=$request->phone;
        $appointment->doctor=$request->doctor;
        $appointment->date=$request->date;
        $appointment->message=$request->message;
        $appointment->status = 'In progress';
        if(Auth::id())
        {
            $appointment->user_id = Auth::user()->id;
        }
        $appointment->save();
        return redirect()->back()->with('message','Appointment request successful. We will contact with you soon.');
    }

    public function myappointment()
    {
        if(Auth::id()){
            $appointments = Appointment::where('user_id',Auth::user()->id)->get();
            return view('user.my_appointment', compact('appointments'));
        } else {
            return redirect()->back();
        }
    }

    public function cancel_appointment($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
        return redirect()->back();
    }
}
