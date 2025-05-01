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

    public function index(Request $request)
    {
        $search = $request->input('search');
        $appointments = Appointment::with(['consultant', 'user'])
            ->when($search, function ($query, $search) {
                return $query->whereHas('consultant', function ($q) use ($search) {
                    $q->where('Consultant_Name', 'like', "%{$search}%");
                })->orWhereHas('user', function ($q) use ($search) {
                    $q->where('User_Name', 'like', "%{$search}%");
                });
            })->get();
        return view('Admin.Appointment.appointmentmanagement', compact('appointments'));    
    }

    
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $consultants = Consultant::all();
        $countries = Country::all();
        $schedules = Schedule::all();
        $dates = Date::all();
        return view('Admin.Appointment.updateAppointment', compact('appointment', 'consultants', 'countries', 'schedules', 'dates'));
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());
        return redirect()->route('appointmentmanagement')->with('success', 'Appointment updated successfully.');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->route('appointmentmanagement')->with('success', 'Appointment deleted successfully.');
    }


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
    // public function showappointment($id1, $id2, $date)
    // {
    //     $schedules = Schedule::find($id1);
    //     $consultants = Consultant::find($id2);
    //     $dates = Date::where('Date', $date)->first();

    //     return view('Customer.bookappointment', compact('consultants', 'schedules', 'dates'));
    // }

    public function checkvalid($id1, $id2, $date)
    {
        $schedules = Schedule::find($id1);
        $consultants = Consultant::find($id2);
        $dates = Date::where('Date', $date)->first();
        $appointment = Appointment::all();

        $check = Appointment::where('Consultant_ID', $id2)
            ->where('AppointmentDate', $date)
            ->where('Status', 'Active')
            ->where('Appointment_StartTime', $schedules->StartTime)
            ->where('Appointment_EndTime', $schedules->EndTime)
            ->first();

        if ($date < now()->toDateString()) {
            return redirect()->route('choosedatetime', ['id' => $id2])->with('error', 'The appointment date has already passed.');
        }

        if ($check) {
            return redirect()->route('choosedatetime', ['id' => $id2])->with('error', 'This time slot is already booked.');
        }
        else {
            return view('Customer.bookappointment', compact('consultants', 'schedules', 'dates', 'check'));
        }
        
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
            'notes' => 'nullable|string',
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

        return view('Customer.history', compact('appointments'));
    }

    public function cancelappointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->Status = 'Cancelled';
        $appointment->save();

        return redirect()->route('history', ['userid' => $appointment->User_ID])->with('success', 'Appointment cancelled successfully.');
    }

}

