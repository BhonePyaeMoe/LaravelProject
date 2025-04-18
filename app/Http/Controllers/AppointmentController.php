<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Consultant;
use App\Models\Country;
use App\Models\ConsultingCountry;
use App\Models\Schedule;
use App\Models\WorkSchedules;
use App\Models\Date;
use App\Models\WorkDates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function showconsultant()
    {
        $consultants = Consultant::with(['countries'])->get();
        
        return view('Customer.chooseconsultant', compact('consultants'));
    }

    public function showdatetime($id)
    {
        $workdates = Consultant::with(['dates'])->find($id);
        $workschedules = Consultant::with(['schedules'])->find($id);

        return view('Customer.choosedatetime', compact('workdates', 'workschedules'));
    }
    public function showappointment($id1, $id2, $date)
    {
        $schedules = Schedule::find($id1);
        $consultants = Consultant::find($id2);
        $dates = Date::where('Date', $date)->first();

        return view('Customer.bookappointment', compact('consultants', 'schedules', 'dates'));
    }

    public function storeappointment(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'consultant_id' => 'required',
            'status' => 'required',
            'appointment_date' => 'required',
            'appointment_starttime' => 'required',
            'appointment_endtime' => 'required',
            'topic' => 'required|string|max:255',
            'user_information' => 'required|string|max:255',
            'notes' => 'nullable',
            'consultant_name' => 'string',
        ]);

        $appointment = new Appointment();
        $appointment->User_ID = $validatedData['user_id'];
        $appointment->Consultant_ID = $validatedData['consultant_id'];
        $appointment->Status = $validatedData['status'];
        $appointment->AppointmentDate = $validatedData['appointment_date'];
        $appointment->Appointment_StartTime = $validatedData['appointment_starttime'];
        $appointment->Appointment_EndTime = $validatedData['appointment_endtime'];
        $appointment->Appointment_Topic = $validatedData['topic'];
        $appointment->User_Information = $validatedData['user_information'];
        $appointment->Appointment_Note = $validatedData['notes'] ?? null;

        $appointment->save();

        return redirect()->route('home') ->with('success', 'Appointment booked successfully!');
    }

    public function showappointmentlist($userid)
    {
        if($userid == 'empty') {
            return redirect()->route('home')->with('error', 'Please Login First');
        }

        $appointments = Appointment::where('User_ID', $userid)->with(['consultant'])->get();
        if ($appointments->isEmpty()) {
            return redirect()->route('home')->with('error', 'No appointments found.');
        }
        
        return view('Customer.history', compact('appointments'));
    }

}

