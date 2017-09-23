<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role - a Model to work with roles.
 */
class Role extends Model
{
    protected $table = 'roles';
    protected $guarded = ['id', 'name'];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function privilegies()
    {
        return $this->belongsToMany('App\Models\Privilege');
    }
}
