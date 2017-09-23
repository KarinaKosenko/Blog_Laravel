<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Privilege - a Model to work with privilege.
 */
class Privilege extends Model
{
    protected $table = 'privilege';
    protected $guarded = ['id', 'description'];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'privilege_role', 'privilege_id', 'role_id');
    }
}
