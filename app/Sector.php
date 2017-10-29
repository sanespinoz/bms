<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table    = 'sectores';
    protected $fillable = ['piso_id', 'nombre', 'descripcion'];

    public function piso()
    {
        return $this->belongsTo('App\Piso');
    }

    public function grupos()
    {
        //creamos una relacion con el nodelo equipo
        return $this->hasMany('App\Grupo');
    }

}
