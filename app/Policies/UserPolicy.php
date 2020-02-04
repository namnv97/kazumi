<?php

namespace App\Policies;

use App\Model\User;
// use App\Modelusers;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any users.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\User  $users
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the users.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\User  $users
     * @return mixed
     */
    public function view(User $user, User $users)
    {
        //
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the users.
     *
     * @param  \App\Model\User  $user
     * @param  \App\users  $users
     * @return mixed
     */
    public function update(User $user, User $users)
    {
        //
    }

    /**
     * Determine whether the user can delete the users.
     *
     * @param  \App\Model\User  $user
     * @param  \App\users  $users
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->hasAction('delete-user');
    }

    /**
     * Determine whether the user can restore the users.
     *
     * @param  \App\Model\User  $user
     * @param  \App\users  $users
     * @return mixed
     */
    public function restore(User $user, User $users)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the users.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\User  $users
     * @return mixed
     */
    public function forceDelete(User $user, User $users)
    {
        //
    }
}
