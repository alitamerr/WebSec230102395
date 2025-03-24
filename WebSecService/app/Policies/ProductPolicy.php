<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->hasRole('admin') || $user->hasPermissionTo('view_products');
    }

    public function view(User $user, Product $product)
    {
        return true; // Allow viewing of products
    }

    public function create(User $user)
    {
        return $user->hasRole('admin'); // Only admin can create products
    }

    public function update(User $user, Product $product)
    {
        return $user->hasRole('admin'); // Only admin can edit products
    }

    public function delete(User $user, Product $product)
    {
        return $user->hasRole('admin'); // Only admin can delete products
    }
}
