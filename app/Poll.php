<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $guarded =[];

    public function choices() {
        return $this->hasMany(Choice::class);
    }
}
