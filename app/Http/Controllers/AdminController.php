<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use Notification;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function add_doctor_view()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == 1){
                return view('admin.add_doctor');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function upload_doctor(Request $request)
    {
        $doctor = new Doctor;
        $image = $request->file;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->file->move('doctor_image', $imagename);
        $doctor->image = $imagename;

        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;
        $doctor->save();
        return redirect()->back()->with('message','Doctor added successfully');
    }

    public function showappointment()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == 1){
                $appointments = Appointment::all();
                return view('admin.showappointment', compact('appointments'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function approved($id)
    {
        $data = Appointment::find($id);
        $data->status = 'Approved';
        $data->update();
        return redirect()->back()->with('message','Status updated successfully');
    }

    public function cancelled($id)
    {
        $data = Appointment::find($id);
        $data->status = 'Cancelled';
        $data->update();
        return redirect()->back()->with('message','Status updated successfully');
    }

    public function alldoctors()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == 1){
                $doctors = Doctor::all();
                return view('admin.alldoctors', compact('doctors'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function delete_doctor($id)
    {
        $data = Doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function update_doctor($id)
    {
        $doctor = Doctor::find($id);
        return view('admin.updatedoctor',compact('doctor'));
    }

    public function editdoctor(Request $request, $id)
    {
        $doctor = Doctor::find($id);

        $image = $request->file;
        if($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->file->move('doctor_image', $imagename);
            $doctor->image = $imagename;
        }
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;
        $doctor->update();
        return redirect()->back()->with('message','Doctor updated successfully');
    }

    public function emailview($id)
    {
        $data = Appointment::find($id);
        return view('admin.emailview',compact('data'));
    }

    public function sendemail($id, Request $request)
    {
        $data = Appointment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'end_part' => $request->end_part
        ];
        Notification::send($data, new SendEmailNotification($details));
        return redirect()->back()->with('message','Mail send successfully');
    }
}
