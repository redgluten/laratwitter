<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the associated tweets
     */
    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    /**
     * Check if current user is admin.
     * @return boolean
     */
    public function isAdmin()
    {
        return (bool) $this->admin;
    }
}
