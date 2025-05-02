<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserType;

use function PHPSTORM_META\map;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $users = User::when($search, function ($query, $search) {
            return $query->where('User_Name', 'like', "%{$search}%");
        })->paginate(5);

        $users->map(function ($user) {
            $user->TypeName = UserType::find($user->Type_ID)->TypeName;
            return $user;
        });

        $sortedUsers = $users->getCollection()->sortBy(function($user) {
            $order = [
                'Super Admin' => 0,
                'Admin' => 1,
                'User' => 2
            ];
            return $order[$user->TypeName];
        });

        $users->setCollection($sortedUsers);

        return view('Admin.User.Usermanagement', compact('users'));
    }

    public function create()
    {
        // Fetch all user types for the dropdown
        $userTypes = UserType::all();
        return view('users.create', compact('userTypes'));
    }

    public function store(Request $request)
    {
        $alreadyExist = User::where('User_Email', $request->User_Email)->first();
        if ($alreadyExist) {
            return redirect()->route('usermanagement')->with('error', 'User already exists.');
        }

        // Validate the request
        $request->validate([
            'User_Name' => 'required|string|max:255',
            'User_Email' => 'required|string|email|max:255|unique:users',
            'User_Password' => 'required|string|max:225',
            'User_Age' => 'required|integer',
            'User_Phone' => 'required|string|max:15',
            'Type_ID' => 'required|integer|exists:usertype,Type_ID', // Add validation for Type_Name
        ]);

        // Create a new user
        User::create([
            'User_Name' => $request->User_Name,
            'User_Email' => $request->User_Email,
            'User_Password' => bcrypt($request->User_Password),
            'User_Age' => $request->User_Age,
            'User_Phone' => $request->User_Phone,
            'Type_ID' => $request->Type_ID,
        ]);

        return redirect()->route('usermanagement')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $user->TypeName = UserType::find($user->Type_ID)->TypeName;
    
        return view('Admin.User.UpdateUser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $alreadyExist = User::where('User_Email', $request->User_Email)->where('User_ID', '!=', $id)->first();
        if ($alreadyExist) {
            return redirect()->route('usermanagement')->with('error', 'User already exists.');
        }

        // Validate the request
        $request->validate([
            'User_Name' => 'required|string|max:255',
            'User_Email' => 'required|string|email|max:255|unique:users,User_Email,' . $id . ',User_ID',
            'User_Age' => 'required|integer',
            'User_Phone' => 'required|string|max:15'
        ]);

        // Update the user
        $user = User::findOrFail($id);
        $user->update([
            'User_Name' => $request->User_Name,
            'User_Email' => $request->User_Email,
            'User_Age' => $request->User_Age,
            'User_Phone' => $request->User_Phone
        ]);
        
        
        return redirect()->route('usermanagement')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        if ($id == 1) {
            return redirect()->route('usermanagement')->with('error', 'You cannot delete the admin user.');
        }
        else{
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('usermanagement')->with('success', 'User deleted successfully.');
        }
    }
}