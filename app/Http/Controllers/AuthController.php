<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function checkUser(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('User_Name', $username)->first();
        $user_password = $user->User_Password;
        
        if ($user && Hash::check($password, $user_password )) {
            $Type_ID = $user->Type_ID;

            session([
                'data' => $user,
                ]);
            
            if($Type_ID == 1 || $Type_ID == 2){
                return redirect()->route('dashboard') ->with('success', 'Admin Login successful.');
            }
            else
            {
                return redirect()->route('welcome')->with('success', 'Login successful.');
            }
        } else {
            return redirect()->route('login')->with('error', $user-> User_Email);
        }
    }

    public function Register(Request $request)
    {
        $request->validate([
            'User_Name' => 'required|string|max:255',
            'User_Email' => 'required|string|email|max:255|unique:users',
            'User_Phone' => 'required|string|max:15',
        ]);

        try {
            // Validation
            if ( $request->User_Password != $request->User_Password_confirmation) {
                return redirect()->route('login')->with('error', 'Password confirmation does not match.');
            }
            if (strlen($request->User_Password) < 8) {
                return redirect()->route('login')->with('error', 'Password must be at least 8 characters long.');
            }
            if (User::where('User_Email', $request->User_Email)->exists()) {
                return redirect()->route('login')->with('error', 'Email already exists.');
            }
            else
            {
                User::create([
                    'User_Name' => $request->User_Name,
                    'User_Email' => $request->User_Email,
                    'User_Phone' => $request->User_Phone,
                    'User_Password' => Hash::make($request->User_Password), // Ensure password is hashed
                    'Type_ID' => 3, // Assuming Type_ID 3 is for regular users
                ]);
    
                return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
            }

            
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Registration failed. Please try again.');
        }
    }

    public function logout()
    {
        session()->forget('data');
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }

    
}
