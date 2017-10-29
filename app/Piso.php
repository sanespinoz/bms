<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piso extends Model
{
    protected $table = 'pisos';
    protected $fillable = ['nombre', 'descripcion', 'edificio_id'];

    public function sectores()
    {
        //creamos una relacion con el modelo sector
        return $this->hasMany('App\Sector');
    }
    public function edificio()
    {
        return $this->belongsTo('App\Edificio');
    }
}
