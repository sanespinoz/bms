<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Luminaria extends Model
{
    protected $table    = 'luminarias';
    protected $fillable = ['grupo_id', 'identificacion', 'ubicacion', 'cant_lamparas', 'denominacion', 'marca', 'tipo', 'consumo', 'tiempo_uso'];

    public function grupo()
    {
        return $this->belongsTo('App\Grupo');
    }

    public function lamparas()
    {

        return $this->hasMany('App\Lampara');
    }
}
