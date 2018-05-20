<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class EnergiaGrupo extends Model
{
  protected $dates = ['created_at', 'updated_at'];
  protected $dateFormat = 'Y-m-d H:i:s.000';
  public $timestamps = false;

    public function grupo()
    {
        return $this->belongsTo('App\Grupo');
    }
}
