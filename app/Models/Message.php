<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Message - a Model to work with guest book messages.
 */
class Message extends Model
{
    protected $fillable = ['name', 'text'];
}
