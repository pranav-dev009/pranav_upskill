<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() {
        return view('login.index');
    }

    public function auth(LoginRequest $request) {
        $user = User::where([
            'email' => $request->email
        ])->first();
        if($request->email == $user->email) {
            if(Hash::check($request->password, $user->password)) {
                $request->session()->put('user', 'pranav');
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
    
    public function logout() {
        Session::forget('user');
        $data = session()->all();
        return redirect()->route('login.index');
    }
}