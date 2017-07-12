<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'author', 'content', 'user_id', 'image_link'];
    protected $dates = ['deleted_at'];


    /**
     * Scope a query to include recent articles for widget.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRecent($query, $count)
    {
        return $query->latest()
            ->take($count)
            ->get();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function upload()
    {
        return $this->hasOne('App\Models\Upload');
    }



}
