<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $schedules = Schedule::when($search, function ($query, $search) {
            return $query->where('StartTime', 'like', "%{$search}%")
                 ->orWhere('EndTime', 'like', "%{$search}%");
        })->get();

        return view('Admin.Schedule.schedulemanagement', compact('schedules'));
    }

    public function store(Request $request)
    {
        $schedule = new Schedule();
        $schedule->StartTime = $request->input('StartTime');
        $schedule->EndTime = $request->input('EndTime');
        $schedule->save();

        return redirect()->route('schedulemanagement');
    }

    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('Admin.Schedule.updateschedule', compact('schedule'));
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->StartTime = $request->input('StartTime');
        $schedule->EndTime = $request->input('EndTime');
        $schedule->save();

        return redirect()->route('schedulemanagement');
    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('schedulemanagement');
    }
}
