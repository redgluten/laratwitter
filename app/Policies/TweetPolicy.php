<?php

namespace App\Policies;

use App\User;
use App\Tweet;
use Illuminate\Auth\Access\HandlesAuthorization;

class TweetPolicy
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
     * List tweets.
     *
     * @param  User   $user
     * @return boolean
     */
    public function list(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the tweet.
     *
     * @param  App\User  $user
     * @param  App\Tweet  $tweet
     * @return mixed
     */
    public function view(User $user, Tweet $tweet)
    {
        return true;
    }

    /**
     * Determine whether the user can create tweets.
     *
     * @param  App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the tweet.
     *
     * @param  App\User  $user
     * @param  App\Tweet  $tweet
     * @return mixed
     */
    public function update(User $user, Tweet $tweet)
    {
        return $tweet->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the tweet.
     *
     * @param  App\User  $user
     * @param  App\Tweet  $tweet
     * @return mixed
     */
    public function delete(User $user, Tweet $tweet)
    {
        return $tweet->user_id === $user->id;
    }
}
