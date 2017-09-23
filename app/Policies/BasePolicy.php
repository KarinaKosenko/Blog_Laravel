<?php

namespace App\Policies;

use Illuminate\Support\Facades\Auth;

/**
 * BasePolicy class defines a collection of privileges for current user.
 */
class BasePolicy
{
    protected $privilege;

    public function __construct()
    {
        $this->privilege = Auth::user()->role->privilegies->pluck('description');
    }
}