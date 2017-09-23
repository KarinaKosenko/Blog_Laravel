<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Upload - a Model to work with uploads.
 */
class Upload extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    public function article()
    {
        return $this->hasOne('App\Models\Article');
    }
}
