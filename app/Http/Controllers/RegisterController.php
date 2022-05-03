<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterValidator;

class RegisterController extends Controller
{
    //
    public function index() {
        return view('register.index');
    }

    public function register(RegisterValidator $request) {
        $validator = $request->validated();
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login.index')->with('success', 'User Registered successfully');
    }
}
