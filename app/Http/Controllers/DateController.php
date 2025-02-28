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
        })->get();

        return view('Admin.Date.datemanagement', compact('dates'));
    }

    public function store(Request $request)
    {
        $date = new Date();
        $date->Date = $request->input('Date');
        $date->Day = $request->input('Day');
        $date->save();

        return redirect()->route('datemanagement');
    }

    public function edit($id)
    {
        $date = Date::findOrFail($id);
        return view('Admin.Date.updatedate', compact('date'));
    }

    public function update(Request $request, $id)
    {
        $date = Date::findOrFail($id);
        $date->Date = $request->input('Date');
        $date->Day = $request->input('Day');
        $date->save();

        return redirect()->route('datemanagement');
    }

    public function destroy($id)
    {
        $date = Date::findOrFail($id);
        $date->delete();

        return redirect()->route('datemanagement');
    }
}
