<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment - a Model to work with comments.
 */
class Comment extends Model 
{
	protected $fillable = ['user_id', 'username', 'text', 'article_id', 'parent_id'];

    public function article()
    {
        return $this->belongsTo('App\Models\Article');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function childs()
    {
        return $this->hasMany('App\Models\Comment','parent_id','id') ;
    }
}
