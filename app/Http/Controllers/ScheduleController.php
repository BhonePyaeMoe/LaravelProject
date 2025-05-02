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
        })->orderBy('StartTime')->get();

        $schedules = $schedules->sortBy(function($schedule) {
            return $schedule->StartTime;
        });

        return view('Admin.Schedule.schedulemanagement', compact('schedules'));
    }

    public function store(Request $request)
    {
        $alreadyExist = Schedule::where('StartTime', $request->StartTime)->where('EndTime', $request->EndTime)->first();
        if ($alreadyExist) {
            return redirect()->route('schedulemanagement')->with('error', 'Schedule already exists.');
        }

        $schedule = new Schedule();
        $schedule->StartTime = $request->input('StartTime');
        $schedule->EndTime = $request->input('EndTime');
        $schedule->save();

        return redirect()->route('schedulemanagement')->with('success', 'Schedule created successfully.');
    }

    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('Admin.Schedule.updateschedule', compact('schedule'));
    }

    public function update(Request $request, $id)
    {
        $alreadyExist = Schedule::where('StartTime', $request->StartTime)->where('EndTime', $request->EndTime)->where('Schedule_ID', '!=', $id)->first();
        if ($alreadyExist) {
            return redirect()->route('schedulemanagement')->with('error', 'Schedule already exists.');
        }

        $schedule = Schedule::findOrFail($id);
        $schedule->StartTime = $request->input('StartTime');
        $schedule->EndTime = $request->input('EndTime');
        $schedule->save();

        return redirect()->route('schedulemanagement')->with('success', 'Schedule updated successfully.');
    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('schedulemanagement') ->with('success', 'Schedule deleted successfully.');
    }
}
