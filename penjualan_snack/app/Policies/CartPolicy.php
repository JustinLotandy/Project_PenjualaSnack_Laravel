<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Cart;

class CartPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_cart');
    }

    public function view(User $user, Cart $cart): bool
    {
        return $user->can('view_cart');
    }

    public function create(User $user): bool
    {
        return $user->can('create_cart');
    }

    public function update(User $user, Cart $cart): bool
    {
        return $user->can('update_cart');
    }

    public function delete(User $user, Cart $cart): bool
    {
        return $user->can('delete_cart');
    }

    public function restore(User $user, Cart $cart): bool
    {
        return $user->can('restore_cart');
    }

    public function forceDelete(User $user, Cart $cart): bool
    {
        return $user->can('force_delete_cart');
    }

    public function reorder(User $user): bool
    {
        return $user->can('reorder_cart');
    }

    public function replicate(User $user, Cart $cart): bool
    {
        return $user->can('replicate_cart');
    }

    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_cart');
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_cart');
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_cart');
    }
}
