<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() {
        return view('login.index');
    }

    public function auth(Request $request) {
        $user = User::where([
            'email' => $request->email
        ])->first();
        if($request->email == $user->email) {
            if(Hash::check($request->password, $user->password)) {
                return redirect()->route('items.index');
            }
            else {
                return redirect()->back()->with('failedLogin', 'Password is incorrect');
            }
        }
        else {
            return redirect()->back()->with('failedLogin', 'Username not found');
        }
    }
}