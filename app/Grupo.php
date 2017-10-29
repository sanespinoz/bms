<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table    = 'grupos';
    protected $fillable = ['nombre', 'descripcion', 'cant_luminarias', 'energia_consumida', 'sector_id'];

    public function sector()
    {
        return $this->belongsTo('App\Sector');
    }

    public function luminarias()
    {
        //creamos una relacion con el nodelo equipo
        return $this->hasMany('App\Luminaria');
    }
}
