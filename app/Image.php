<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
   protected $guarded =[];

 

    /**
     * Get all of the owning imageable models.
    */
    public function imageable()
    {
        return $this->morphTo();
    }
}
