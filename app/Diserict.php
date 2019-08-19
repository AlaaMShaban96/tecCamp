<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diserict extends Model
{
    public function hosptal()
    {
        return $this->hasMany('App\Hosptal');
    }
}
