<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'user_id',
    ];

    /**
     * Get the associated user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
