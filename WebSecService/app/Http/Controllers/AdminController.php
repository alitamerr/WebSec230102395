<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate; // ✅ Import Gate for authorization

class AdminController extends Controller
{
    /**
     * Show Admin Dashboard.
     */
    public function index()
    {
        if (!Gate::allows('manageUsers')) {
            abort(403); // ✅ Prevent unauthorized access
        }

        return view('admin.dashboard'); // Ensure this view exists
    }

    /**
     * Show All Users with Roles.
     */
    public function users()
{
    if (!Gate::allows('manageUsers', Auth::user())) {
        abort(403); // 🚨 Prevent unauthorized access
    }

    $users = User::with('roles')->get();
    $roles = Role::all();

    return view('admin.users', compact('users', 'roles'));
}

    /**
     * Assign Role to a User.
     */
    public function assignRole(Request $request, $userId)
    {
        if (!Gate::allows('manageUsers')) {
            abort(403); // ✅ Prevent unauthorized access
        }

        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);

        $targetUser = User::findOrFail($userId);
        $targetUser->syncRoles([$request->role]);

        return redirect()->route('manage_users')->with('status', 'Role assigned successfully.');
    }

    /**
     * Remove a User's Role.
     */
    public function removeRole($userId)
    {
        if (!Gate::allows('manageUsers')) {
            abort(403); // ✅ Prevent unauthorized access
        }

        $targetUser = User::findOrFail($userId);
        $targetUser->syncRoles([]);

        return redirect()->route('manage_users')->with('status', 'User role removed successfully.');
    }
}
