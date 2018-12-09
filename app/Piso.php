<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piso extends Model
{
    protected $table      = 'pisos';
    protected $fillable   = ['nombre', 'descripcion', 'edificio_id'];
    protected $dates      = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s.000';
    public $timestamps    = false;

    public function sectores()
    {
        //creamos una relacion con el modelo sector
        return $this->hasMany('App\Sector');
    }
    public function grupos()
    {
        //creamos una relacion con el modelo grupo
        return $this->hasMany('App\Grupo');
    }
    public function edificio()
    {
        return $this->belongsTo('App\Edificio');
    }
    public function energiaPisos()
    {
        //creamos una relacion con el modelo energiaPiso
        return $this->hasMany('App\EnergiaPiso');
    }

}
