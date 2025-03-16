<?php

namespace App\Http\Controllers;


use DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        return view('users.register');
    }

    public function doRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); // Automatically log in after registration
        return redirect()->route('profile')->with('status', 'Registration successful.');
    }

    public function login()
    {
        return view('users.login');
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('home'); // Redirect to main menu
        }
    
        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function doLogout()
    {
        Auth::logout();
        return redirect('/')->with('status', 'You have been logged out.');
    }

    public function showProfile()
    {
        return view('users.profile', ['user' => Auth::user()]);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Incorrect old password.']);
        }
    }
}


