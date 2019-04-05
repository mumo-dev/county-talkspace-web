<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded =[];
    /**
     * Get all of the owning commentable models.
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * Get all of the comments comments.
    */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    /**
     * Get the comments's image.
     */
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
