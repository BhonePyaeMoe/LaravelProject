<?php

namespace App\Http\Controllers;

use App\Models\Consultant;
use App\Models\Country;
use App\Models\ConsultingCountry;
use Illuminate\Http\Request;

class CountryAssignController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $consultingCountries = ConsultingCountry::with(['Consultant', 'Country'])
            ->when($search, function ($query, $search) {
                return $query->whereHas('Consultant', function ($q) use ($search) {
                    $q->where('Consultant_Name', 'like', "%{$search}%");
                });
            })->get();

        $countries = Country::all();
        $consultants = Consultant::all();

        return view('Admin.Assign.countryassign', compact('countries', 'consultants', 'consultingCountries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Consultant_ID' => 'required|exists:consultants,Consultant_ID',
            'Country_ID' => 'required|exists:countries,Country_ID',
        ]);

        try {
            ConsultingCountry::create([
                'Consultant_ID' => $request->Consultant_ID,
                'Country_ID' => $request->Country_ID,
            ]);

            return redirect()->route('countryassign')->with('success', 'Country assigned successfully.');
        } catch (\Exception $e) {
            return redirect()->route('countryassign')->with('error', 'Failed to assign country.');
        }
    }

    public function edit($id)
    {
        $consultingCountry = ConsultingCountry::findOrFail($id);
        $countries = Country::all();
        $consultants = Consultant::all();

        return view('Admin.Assign.updatecountryassign', compact('consultingCountry', 'countries', 'consultants'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Consultant_ID' => 'required|exists:consultants,Consultant_ID',
            'Country_ID' => 'required|exists:countries,Country_ID',
        ]);

        $consultingCountry = ConsultingCountry::findOrFail($id);
        $consultingCountry->update([
            'Consultant_ID' => $request->Consultant_ID,
            'Country_ID' => $request->Country_ID,
        ]);

        return redirect()->route('countryassign')->with('success', 'Country updated successfully.');
    }

    public function destroy($id)
    {
        $consultingCountry = ConsultingCountry::findOrFail($id);
        $consultingCountry->delete();

        return redirect()->route('countryassign')->with('success', 'Country unassigned successfully.');
    }
}
