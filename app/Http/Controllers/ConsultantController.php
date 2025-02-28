<?php

namespace App\Http\Controllers;

use App\Models\Consultant;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Storage;

class ConsultantController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $consultants = Consultant::when($search, function ($query, $search) {
            return $query->where('Consultant_Name', 'like', "%{$search}%");
        })->get();

        return view('Admin.Consultant.consultantmanagement', compact('consultants'));
    }

    public function create()
    {
        return view('Admin.Consultant.createConsultant');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Consultant_Name' => 'required|string|max:255',
            'Profile' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'Experience' => 'required|string|max:255',
            'Consultant_Email' => 'required|string|email|max:255|unique:consultants',
        ]);

        $data = $request->all();

        if ($request->hasFile('Profile')) {
            $file = $request->file('Profile');
            $uploadedFileUrl = Cloudinary::upload($file->getRealPath())->getSecurePath();
            $data['Profile'] = $uploadedFileUrl;
        }

        $consultant = Consultant::create($data);
        return redirect()->route('consultantmanagement')->with('success', 'Consultant created successfully.');
    }

    public function edit($id)
    {
        $consultant = Consultant::findOrFail($id);
        return view('Admin.Consultant.updateConsultant', compact('consultant'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Consultant_Name' => 'required|string|max:255',
            'Profile' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'Experience' => 'required|string|max:255',
            'Consultant_Email' => 'required|string|email|max:255|unique:consultants,Consultant_Email,' . $id . ',Consultant_ID',
        ]);

        $consultant = Consultant::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('Profile')) {
            $file = $request->file('Profile');
            $uploadedFileUrl = Cloudinary::upload($file->getRealPath())->getSecurePath();
            $data['Profile'] = $uploadedFileUrl;
        }
        
        $consultant->update($data);

        return redirect()->route('consultantmanagement')->with('success', 'Consultant updated successfully.');
    }

    public function destroy($id)
    {
        $consultant = Consultant::findOrFail($id);
        $consultant->delete();

        return redirect()->route('consultantmanagement')->with('success', 'Consultant deleted successfully.');
    }
}
