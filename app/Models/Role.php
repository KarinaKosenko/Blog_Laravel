<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $guarded = ['id', 'name'];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function privilegies()
    {
        return $this->belongsToMany('App\Models\Privilege');
    }
}
