<?php

namespace App\Http\Controllers;

use App\Models\Consultant;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\WorkSchedules;

class ScheduleAssignController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $workschedules = WorkSchedules::with(['Consultant', 'Schedule'])
            ->when($search, function ($query, $search) {
            return $query->whereHas('Consultant', function ($q) use ($search) {
                $q->where('Consultant_Name', 'like', "%{$search}%");
            });
            })->get();

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

        $alreadyExist = WorkSchedules::where('Consultant_ID', $request->Consultant_ID)
            ->where('Schedule_ID', $request->Schedule_ID)
            ->first();
        if ($alreadyExist) {
            return redirect()->route('scheduleassign')->with('error', 'Schedule already assigned.');
        }

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

        return view('Admin.Assign.updatescheduleassign', compact('workSchedule', 'schedules', 'consultants'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'Consultant_ID' => 'required|exists:consultants,Consultant_ID',
            'Schedule_ID' => 'required|exists:schedules,Schedule_ID',
        ]);

        $alreadyExist = WorkSchedules::where('Consultant_ID', $request->Consultant_ID)
            ->where('Schedule_ID', $request->Schedule_ID)
            ->where('WorkSchedule_ID', '!=', $id)
            ->first();
        if ($alreadyExist) {
            return redirect()->route('scheduleassign')->with('error', 'Schedule already assigned.');
        }

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
