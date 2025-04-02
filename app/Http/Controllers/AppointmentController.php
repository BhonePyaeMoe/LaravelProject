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
}

