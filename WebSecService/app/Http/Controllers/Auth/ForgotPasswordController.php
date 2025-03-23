<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    /**
     * Show the forgot password form where users enter their email.
     */
    public function showSecurityQuestionForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Validate email and show security question form.
     */
    public function checkSecurityAnswer(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user->security_question) {
            return back()->withErrors(['email' => 'No security question is set for this account.']);
        }

        return view('auth.security-question', ['user' => $user]);
    }

    /**
     * Verify security answer and allow password reset.
     */
    public function verifySecurityAnswer(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'security_answer' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!Hash::check($request->security_answer, $user->security_answer)) {
            return back()->withErrors(['security_answer' => 'Incorrect answer to security question.']);
        }

        // Redirect to reset password form with email parameter
        return redirect()->route('reset.password.form', ['email' => $request->email]);
    }

    /**
     * Reset the user's password.
     */
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
