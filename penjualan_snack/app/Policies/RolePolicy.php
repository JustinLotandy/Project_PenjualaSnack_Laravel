<?php

namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the User can view any models.
     */
    public function viewAny(User $User): bool
    {
        return $User->can('view_any_spatie::permission::models::role');
    }

    /**
     * Determine whether the User can view the model.
     */
    public function view(User $User, Role $role): bool
    {
        return $User->can('view_spatie::permission::models::role');
    }

    /**
     * Determine whether the User can create models.
     */
    public function create(User $User): bool
    {
        return $User->can('create_spatie::permission::models::role');
    }

    /**
     * Determine whether the User can update the model.
     */
    public function update(User $User, Role $role): bool
    {
        return $User->can('update_spatie::permission::models::role');
    }

    /**
     * Determine whether the User can delete the model.
     */
    public function delete(User $User, Role $role): bool
    {
        return $User->can('delete_spatie::permission::models::role');
    }

    /**
     * Determine whether the User can bulk delete.
     */
    public function deleteAny(User $User): bool
    {
        return $User->can('delete_any_spatie::permission::models::role');
    }

    /**
     * Determine whether the User can permanently delete.
     */
    public function forceDelete(User $User, Role $role): bool
    {
        return $User->can('force_delete_spatie::permission::models::role');
    }

    /**
     * Determine whether the User can permanently bulk delete.
     */
    public function forceDeleteAny(User $User): bool
    {
        return $User->can('force_delete_any_spatie::permission::models::role');
    }

    /**
     * Determine whether the User can restore.
     */
    public function restore(User $User, Role $role): bool
    {
        return $User->can('restore_spatie::permission::models::role');
    }

    /**
     * Determine whether the User can bulk restore.
     */
    public function restoreAny(User $User): bool
    {
        return $User->can('restore_any_spatie::permission::models::role');
    }

    /**
     * Determine whether the User can replicate.
     */
    public function replicate(User $User, Role $role): bool
    {
        return $User->can('replicate_spatie::permission::models::role');
    }

    /**
     * Determine whether the User can reorder.
     */
    public function reorder(User $User): bool
    {
        return $User->can('reorder_spatie::permission::models::role');
    }
}
