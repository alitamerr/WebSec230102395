<?php

namespace App\Policies;

use App\Models\User;

class AdminPolicy
{
    /**
     * Allow only admins to access the dashboard.
     */
    public function accessAdminDashboard(User $user)
    {
        return $user->hasRole('admin');
    }

    /**
     * Allow only admins to assign roles.
     */
    public function assignRole(User $user)
    {
        return $user->hasRole('admin');
    }

    /**
     * Allow only admins to remove roles.
     */
    public function removeRole(User $user)
    {
        return $user->hasRole('admin');
    }
}
