<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'author', 'content'];


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


    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

}
