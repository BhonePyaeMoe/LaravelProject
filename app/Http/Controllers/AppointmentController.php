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

}

