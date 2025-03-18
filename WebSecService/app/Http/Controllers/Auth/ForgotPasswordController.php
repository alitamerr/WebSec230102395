<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ForgotPasswordController extends Controller
{
    public function showSecurityQuestionForm()
    {
        return view('auth.forgot-password');
    }

    public function checkSecurityAnswer(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'security_answer' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!Hash::check($request->security_answer, $user->security_answer)) {
            return back()->withErrors(['security_answer' => 'Incorrect answer to security question.']);
        }

        return view('auth.forgot-password', ['email' => $request->email]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('status', 'Password successfully reset. You can now log in.');
    }
}
