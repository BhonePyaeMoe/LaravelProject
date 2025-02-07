<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function checkUser(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('username', $username)
            ->where('password', $password)
            ->first();

        if ($user) {
            $Type_ID = $user->Type_ID;
            $User_ID = $user->id;

            session(['User_ID' => $User_ID]);
            
            if($Type_ID == 1){
                return redirect()->route('users/dashboard');
            }
            else if($Type_ID == 2)
            {
                return redirect()->route('users/dashboard');
            }
            if($Type_ID == 3)
            {
                return redirect()->route('users/dashboard');
            }


        } else {
            return response()->json(['status' => 'failure']);
        }
    }
}
