<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Labs extends Model
{
    public function busniss()
    {
      return $this->belongsTo('App\Busniss');
    }
}
