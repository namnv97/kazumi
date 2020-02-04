<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Article;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlesPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any articles.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the articles.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Article  $articles
     * @return mixed
     */
    public function view(User $user, articles $articles)
    {
        return true;
    }

    /**
     * Determine whether the user can create articles.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->id > 0;
    }

    /**
     * Determine whether the user can update the articles.
     *
     * @param  \App\Model\User  $user
     * @param  \App\articles  $articles
     * @return mixed
     */
    public function update(User $user, articles $articles)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the articles.
     *
     * @param  \App\Model\User  $user
     * @param  \App\articles  $articles
     * @return mixed
     */
    public function delete(User $user, articles $articles)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the articles.
     *
     * @param  \App\Model\User  $user
     * @param  \App\articles  $articles
     * @return mixed
     */
    public function restore(User $user, articles $articles)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the articles.
     *
     * @param  \App\Model\User  $user
     * @param  \App\articles  $articles
     * @return mixed
     */
    public function forceDelete(User $user, articles $articles)
    {
        return true;
    }
}
