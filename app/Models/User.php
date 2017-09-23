<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User - a Model to work with users.
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
}
