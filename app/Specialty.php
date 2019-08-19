<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    public function hosptal()
    {
        return $this->belongsToMany('App\Hosptal');
    }
}
