<?php

namespace App\Http\Controllers;

use App\Models\Consultant;
use App\Models\Date;
use App\Models\WorkDate;
use Illuminate\Http\Request;
use App\Models\WorkDates;

class DateAssignController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $workdates = WorkDates::with(['Consultant', 'Date'])
            ->when($search, function ($query, $search) {
                return $query->whereHas('Consultant', function ($q) use ($search) {
                    $q->where('Consultant_Name', 'like', "%{$search}%");
                });
            })
            ->paginate(5);

        $dates = Date::where('Date', '>=', now()->format('Y-m-d'))
            ->orderBy('Date')
            ->get();
        $consultants = Consultant::orderBy('Consultant_Name')->get();

        return view('Admin.Assign.dateassign', compact('dates', 'consultants', 'workdates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Consultant_ID' => 'required|exists:consultants,Consultant_ID',
            'Date_ID' => 'required|exists:dates,Date_ID',
        ]);

        $alreadyExist = WorkDates::where('Consultant_ID', $request->Consultant_ID)
            ->where('Date_ID', $request->Date_ID)
            ->first();
        if ($alreadyExist) {
            return redirect()->route('dateassign')->with('error', 'Date already assigned.');
        }

        try {
            WorkDates::create([
                'Consultant_ID' => $request->Consultant_ID,
                'Date_ID' => $request->Date_ID,
            ]);

            return redirect()->route('dateassign')->with('success', 'Date assigned successfully.');
        } catch (\Exception $e) {
            return redirect()->route('dateassign')->with('error', 'Failed to assign date.');
        }
    }

    public function edit($id)
    {
        $workdates = WorkDates::findOrFail($id);
        $dates = Date::all();
        $consultants = Consultant::all();

        return view('Admin.Assign.updatedateassign', compact('workdates', 'dates', 'consultants'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Consultant_ID' => 'required|exists:consultants,Consultant_ID',
            'Date_ID' => 'required|exists:dates,Date_ID',
        ]);

        $alreadyExist = WorkDates::where('Consultant_ID', $request->Consultant_ID)
            ->where('Date_ID', $request->Date_ID)
            ->where('WorkDate_ID', '!=', $id)
            ->first();
        if ($alreadyExist) {
            return redirect()->route('dateassign')->with('error', 'Date already assigned.');
        }

        $workDate = WorkDates::findOrFail($id); // Use $id to find the correct WorkDate
        $workDate->update([
            'Consultant_ID' => $request->Consultant_ID,
            'Date_ID' => $request->Date_ID,
        ]);

        return redirect()->route('dateassign')->with('success', 'Date updated successfully.');
    }

    public function destroy($id)
    {
        $workDate = WorkDates::findOrFail($id);
        $workDate->delete();

        return redirect()->route('dateassign')->with('success', 'Date deleted successfully.');
    }
}
