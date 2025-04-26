<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
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
        if ($user) {
            $user_password = $user->User_Password;

            if (Hash::check($password, $user_password)) {
                $Type_ID = $user->Type_ID;

                session([
                    'data' => $user,
                ]);

                if ($Type_ID == 1 || $Type_ID == 2) {

                    $groupedUsers = User::selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, COUNT(*) as count')
                        ->whereBetween('created_at', [
                            now()->subMonths(6)->startOfMonth(),
                            now()->endOfMonth()
                        ])
                        ->groupByRaw('MONTH(created_at), YEAR(created_at)')
                        ->orderByRaw('YEAR(created_at) ASC, MONTH(created_at) ASC')
                        ->get()
                        ->mapWithKeys(function ($item) {
                            $item->month = date('F', mktime(0, 0, 0, $item->month, 10));
                            $item->year = $item->year;
                            $item->month_year = $item->month . '-' . $item->year;
                            return [$item->month_year => $item->count];
                        });

                    $allMonths = collect();
                    for ($i = 0; $i <= 6; $i++) {
                        $date = now()->subMonths($i);
                        $monthYear = $date->format('F-Y');
                        $allMonths->put($monthYear, $groupedUsers->get($monthYear, 0));
                    }

                    $groupedUsers = $allMonths->reverse();

                    $groupedAppointments = Appointment::selectRaw('DATE_FORMAT(AppointmentDate, "%d-%m") as day_month, COUNT(*) as count')
                        ->whereBetween('AppointmentDate', [
                            now()->subMonths(6)->startOfMonth(),
                            now()->endOfMonth()
                        ])
                        ->groupByRaw('DATE_FORMAT(AppointmentDate, "%d-%m")')
                        ->orderByRaw('MIN(AppointmentDate) ASC')
                        ->get()
                        ->mapWithKeys(function ($item) {
                            return [$item->day_month => $item->count];
                        });

                    $allDays = collect();
                    for ($i = 0; $i <= 7; $i++) {
                        $date = now()->addDays($i);
                        $dayMonth = $date->format('d-m');
                        $allDays->put($dayMonth, $groupedAppointments->get($dayMonth, 0));
                    }

                        session([
                            'groupedUsers' => $groupedUsers,
                            'groupedAppointments' => $allDays,
                        ]);

                    return redirect()->route('dashboard')->with('success', 'Admin Login successful.');
                } else 
                {
                    return redirect()->route('home')->with('success', 'User Login successful.');
                }
            } else {
                return redirect()->route('login')->with('error', 'Invalid username or password.');
            }
        }
        else    {
            return redirect()->route('login')->with('error', 'Invalid username or password.');
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
            if ($request->User_Password != $request->User_Password_confirmation) {
                return redirect()->route('login')->with('error', 'Password confirmation does not match.');
            }
            if (strlen($request->User_Password) < 8) {
                return redirect()->route('login')->with('error', 'Password must be at least 8 characters long.');
            }
            if (User::where('User_Email', $request->User_Email)->exists()) {
                return redirect()->route('login')->with('error', 'Email already exists.');
            } else {
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

    public function Creturn()
    {
        return redirect()->route('home')->with('error', 'Please Log In First');
    }

    public function Areturn()
    {
        session()->forget('data');
        return redirect()->route('login')->with('error', 'You are not authorized to access this page.');
    }
}
