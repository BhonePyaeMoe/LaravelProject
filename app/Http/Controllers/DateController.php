<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Date;

class DateController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $dates = Date::when($search, function ($query, $search) {
            return $query->where('Date', 'like', "%{$search}%")
                 ->orWhere('Day', 'like', "%{$search}%");
        })->orderBy('Date')->get();

        return view('Admin.Date.datemanagement', compact('dates'));
    }

    public function store(Request $request)
    {
        $alreadyExist = Date::where('Date', $request->Date)->first();
        if ($alreadyExist) {
            return redirect()->route('datemanagement')->with('error', 'Date already exists.');
        }

        $date = new Date();
        $date->Date = $request->input('Date');
        $date->Day = $request->input('Day');
        $date->save();

        return redirect()->route('datemanagement')->with('success', 'Date created successfully.');
    }

    public function edit($id)
    {
        $date = Date::findOrFail($id);
        return view('Admin.Date.updatedate', compact('date'));
    }

    public function update(Request $request, $id)
    {
        $alreadyExist = Date::where('Date', $request->Date)->where('Date_ID', '!=', $id)->first();
        if ($alreadyExist) {
            return redirect()->route('datemanagement')->with('error', 'Date already exists.');
        }

        $date = Date::findOrFail($id);
        $date->Date = $request->input('Date');
        $date->Day = $request->input('Day');
        $date->save();

        return redirect()->route('datemanagement')->with('success', 'Date updated successfully.');
    }

    public function destroy($id)
    {
        $date = Date::findOrFail($id);
        $date->delete();

        return redirect()->route('datemanagement') ->with('success', 'Date deleted successfully.');
    }
}
