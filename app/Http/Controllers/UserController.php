<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $users = User::query()
            ->where('User_Name', 'LIKE', "%{$search}%")
            ->orWhere('User_Email', 'LIKE', "%{$search}%")
            ->orWhere('User_Phone', 'LIKE', "%{$search}%")
            ->get();

        return view('Admin.User.Usermanagement', compact('users', 'search'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('Admin.User.UpdateUser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('usermanagement')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('usermanagement')->with('success', 'User deleted successfully');
    }
}