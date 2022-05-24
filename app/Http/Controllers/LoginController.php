<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Mail;
class LoginController extends Controller
{
    public function index() {
        return view('login.index');
    }

    public function auth(LoginRequest $request) {
        $user = User::where([
            'email' => $request->email
        ])->first();
        if($user) {
            if($request->email == $user->email) {
                if(Hash::check($request->password, $user->password)) {
                    $request->session()->put('user', $user->name);
                    return redirect()->route('items.index');
                }
                else {
                    return redirect()->back()->with('failedLogin', 'Password is incorrect');
                }
            }
        }
        else {
            return redirect()->back()->with('failedLogin', 'Username not found');
        }
    }
    
    public function logout() {
        Session::forget('user');
        return redirect()->route('login.index');
    }

    // google login
    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    // google callback
    public function handleGoogleCallback () {
        try {
            $request = Socialite::driver('google')->stateless()->user();
            $checkUser = User::where([
                'email' => $request->email
            ])->first();
            Session::put('user', $request->name);
            if(!$checkUser) {
                $newUser = new User();
                $newUser->name = $request->name;
                $newUser->email = $request->email;
                $newUser->password = Hash::make($request->getId());
                $newUser->save();
            }
            $data['name'] = $request->name;
            $data['email'] = $user['email'] = $request->email;
            $data['password'] = $request->getId();
            Mail::send('mail', $data, function($messages) use ($user) {
                $messages->to($user['email']);
                $messages->subject('Registration Successful');
            });
            return redirect()->route('items.index');
        }
        catch(\Throwable $th) {
            throw $th;
        }
    }

    // google login
    public function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    // google callback
    public function handleFacebookCallback () {
        try {
            $request = Socialite::driver('facebook')->stateless()->user();
            $checkUser = User::where([
                'email' => $request->email
            ])->first();
            Session::put('user', $request->name);
            if(!$checkUser) {
                $newUser = new User();
                $newUser->name = $request->name;
                $newUser->email = $request->email;
                $newUser->password = Hash::make($request->getId());
                $newUser->save();
            }
            return redirect()->route('items.index');
        }
        catch(\Throwable $th) {
            throw $th;
        }
    }   
}