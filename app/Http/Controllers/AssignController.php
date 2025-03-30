<?php

namespace App\Http\Controllers;

use App\Models\Consultant;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\WorkSchedules;

class AssignController extends Controller
{
    public function index()
    {
        $workschedules = WorkSchedules::with(['Consultant', 'Schedule'])->get();
        $workschedules = $workschedules->sortBy('Schedule.StartTime');

        $schedules = Schedule::all();
        $consultants = Consultant::all();

        return view('Admin.Assign.scheduleassign', compact('schedules', 'consultants', 'workschedules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Consultant_ID' => 'required|exists:consultants,Consultant_ID',
            'Schedule_ID' => 'required|exists:schedules,Schedule_ID',
        ]);

        try {
            WorkSchedules::create([
                'Consultant_ID' => $request->Consultant_ID,
                'Schedule_ID' => $request->Schedule_ID,
            ]);

            return redirect()->route('scheduleassign')->with('success', 'Schedule assigned successfully.');
        } catch (\Exception $e) {
            return redirect()->route('scheduleassign')->with('error', 'Failed to assign schedule.');
        }
    }

    public function edit($id)
    {
        $workSchedule = WorkSchedules::findOrFail($id);
        $schedules = Schedule::all();
        $consultants = Consultant::all();

        return view('Admin.Assign.editassign', compact('workSchedule', 'schedules', 'consultants'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'Consultant_ID' => 'required|exists:consultants,Consultant_ID',
            'Schedule_ID' => 'required|exists:schedules,Schedule_ID',
        ]);

        $workSchedule = WorkSchedules::findOrFail($id);
        $workSchedule->update([
            'Consultant_ID' => $request->Consultant_ID,
            'Schedule_ID' => $request->Schedule_ID,
        ]);

        return redirect()->route('scheduleassign')->with('success', 'Schedule updated successfully.');
    }

    public function destroy($id)
    {
        $workSchedule = WorkSchedules::findOrFail($id);
        $workSchedule->delete();

        return redirect()->route('scheduleassign')->with('success', 'Schedule unassigned successfully.');
    }
}
