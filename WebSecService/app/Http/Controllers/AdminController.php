<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role; // ✅ Correctly import the Role class
use Spatie\Permission\Models\Permission; // ✅ Correctly import the Permission class
use Illuminate\Support\Facades\Hash; // ✅ Correctly import the Hash facade
use Illuminate\Support\Facades\Validator; // ✅ Correctly import the Validator facade
use Illuminate\Support\Facades\Auth; // ✅ Correctly import the Auth facade




class AdminController extends Controller
{
    public function __construct()
{
    $this->middleware(['auth', 'can:manage-admin']); // ✅ Use permission-based middleware
}


    /**
     * Show Admin Dashboard.
     */
    public function index()
    {
        return view('admin.dashboard'); // ✅ Ensure `admin/dashboard.blade.php` exists
    }

    /**
     * Show All Users with Roles.
     */
    public function users()
    {
        $users = User::with('roles')->get(); // ✅ Fetch users with roles
        return view('admin.users', compact('users'));
    }

    /**
     * Assign Role to User.
     */
    public function assignRole(Request $request, $userId)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::findOrFail($userId);
        $user->syncRoles([$request->role]); // ✅ Remove old roles & assign new one

        return redirect()->route('admin.users')->with('status', 'Role updated successfully.');
    }

    /**
     * Remove a User's Role.
     */
    public function removeRole($userId)
    {
        $user = User::findOrFail($userId);
        $user->syncRoles([]); // ✅ Removes all roles

        return redirect()->route('admin.users')->with('status', 'User role removed.');
    }
}
