<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hosptal extends Model
{
  public function busniss()
  {
    return $this->belongsTo('App\Busniss');
  }

  public function diserict()
  {
    return $this->belongsTo('App\Diserict');
  }

  public function specialties()
  {
    return $this->belongsToMany('App\Specialty');
  }
}
