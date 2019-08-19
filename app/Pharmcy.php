<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmcy extends Model
{
    public function busniss()
    {
      return $this->belongsTo('App\Busniss');
    }
}
