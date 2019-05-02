<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded =[];


    /**
     * Get the post's image.
     */
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

     /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }


     /**
     * Get all of the post's comments.
     */
    public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
    }
}
