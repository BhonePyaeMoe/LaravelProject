<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $countries = Country::where('Country_Name', 'like', "%{$search}%")->get();
        return view('Admin.Country.countrymanagement', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Country_Name' => 'required|string|max:255',
        ]);

        Country::create($request->all());

        return redirect()->route('countrymanagement')->with('success', 'Country added successfully.');
    }

    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('Admin.Country.updatecountry', compact('country'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Country_Name' => 'required|string|max:255',
        ]);

        $country = Country::findOrFail($id);
        $country->update($request->all());

        return redirect()->route('countrymanagement')->with('success', 'Country updated successfully.');
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();

        return redirect()->route('countrymanagement')->with('success', 'Country deleted successfully.');
    }
}
