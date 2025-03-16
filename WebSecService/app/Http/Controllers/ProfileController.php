<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function changePassword()
    {
        return view('users.change-password'); // Ensure this Blade file exists in the "users" folder
    }

    public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:6|confirmed',
    ]);

    $user = Auth::user(); // ✅ Get the logged-in user

    if (!$user || !Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Current password is incorrect.']);
    }

    // ✅ Explicitly retrieve the user from the database
    $user = \App\Models\User::find($user->id);
    $user->password = Hash::make($request->new_password);
    $user->save(); // ✅ Now, save() should work correctly

    return redirect()->route('profile')->with('status', 'Password changed successfully.');
}
}
