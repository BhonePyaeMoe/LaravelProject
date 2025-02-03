<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\Country;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $universities = University::where('University_Name', 'like', "%{$search}%")->get();
        $countries = Country::all();
        return view('Admin.University.universitymanagement', compact('universities', 'countries'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'University_Name' => 'required|string|max:255',
            'Country_ID' => 'required|exists:countries,Country_ID',
        ]);

        University::create($request->all());

        return redirect()->route('universitymanagement')->with('success', 'University added successfully.');
    }

    public function edit($id)
    {
        $university = University::findOrFail($id);
        $countries = Country::all();
        return view('Admin.University.updateuniversity', compact('university', 'countries'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'University_Name' => 'required|string|max:255',
            'Country_ID' => 'required|exists:countries,Country_ID',
        ]);

        $university = University::findOrFail($id);
        $university->update([
            'University_Name' => $request->input('University_Name'),
            'Country_ID' => $request->input('Country_ID'),
        ]);

        return redirect()->route('universitymanagement')->with('success', 'University updated successfully.');
    }

    public function destroy($id)
    {
        $university = University::findOrFail($id);
        $university->delete();

        return redirect()->route('universitymanagement')->with('success', 'University deleted successfully.');
    }
}
