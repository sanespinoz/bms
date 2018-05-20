<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Luminaria extends Model
{
    protected $table    = 'luminarias';
    protected $fillable = ['grupo_id', 'identificacion', 'ubicacion', 'cant_lamparas', 'denominacion', 'marca', 'tipo', 'consumo', 'tiempo_uso'];
    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s.000';
    public $timestamps = false;

    public function grupo()
    {
        return $this->belongsTo('App\Grupo');
    }

    public function lamparas()
    {

        return $this->hasMany('App\Lampara');
    }

    public function estados()
    {
        //creamos una relacion con el modelo estadoLuminaria
        return $this->hasMany('App\EstadoLuminarias');
    }
}
