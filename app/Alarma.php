<?php

namespace App;

use App\Grupo;
use Illuminate\Database\Eloquent\Model;

class Alarma extends Model
{
    protected $table      = 'alarmas';
    protected $fillable   = ['mensaje', 'fecha', 'grupo_id'];
    protected $dates      = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s.000';
    public $timestamps    = false;

    public function grupo()
    {
        return $this->belongsTo('App\Grupo');
    }

}
