<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Applies to all policies.
     *
     * @param  User $user
     * @return boolean
     */
    public function before($user, $ability)
    {
        return $user->isAdmin();
    }

    /**
     * List users.
     *
     * @param  User   $user
     * @return boolean
     */
    public function list(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the other user profile.
     *
     * @param  App\User  $userLogged
     * @param  App\User  $userViewed
     * @return mixed
     */
    public function view(User $userLogged, User $userViewed)
    {
        return true;
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  App\User  $userLogged
     * @param  App\User  $userModified
     * @return mixed
     */
    public function update(User $userLogged, User $userModified)
    {
        return $userLogged->user_id === $userModified->id;
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  App\User  $userLogged
     * @param  App\User  $userDeleted
     * @return mixed
     */
    public function delete(User $userLogged, User $userDeleted)
    {
        return false;
    }
}
