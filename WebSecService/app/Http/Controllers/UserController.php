<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
            'security_question' => 'required|string', // Ensure this is validated if required
            'security_answer' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'security_question' => $request->security_question, // Ensure these are included
            'security_answer' => $request->security_answer,
    
        ]);

        // Assign 'Customer' role to the new user
        $role = Role::findByName('Customer');
        $user->assignRole($role);

        Auth::login($user); // Automatically log in after registration
        return redirect()->route('profile')->with('status', 'Registration successful.');


        $user->assignRole('customer');
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
            $request->session()->regenerate(); // Regenerate session to prevent session fixation
            return redirect()->intended('home'); // Redirect to main menu
        }
    
        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function doLogout()
    {
        Auth::logout();
        request()->session()->invalidate();  // Invalidate the session
        request()->session()->regenerateToken();  // Regenerate CSRF token
        return redirect('/');
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

        $user->password = Hash::make($request->new_password);
        $user = Auth::user();

        return back()->with('status', 'Password successfully changed.');
    }
}
