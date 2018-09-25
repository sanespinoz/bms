<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Luminaria extends Model
{
    protected $table    = 'luminarias';
    protected $fillable = ['identificacion','codigo','nombre','tipo','descripcion', 'dimensiones','voltaje_nominal','potencia_nominal','corriente_nominal','fecha_alta','fecha_baja','vida_util','estado','grupo_id'];
    protected $dates = ['created_at', 'updated_at'];
    //protected $dateFormat = 'Y-m-d H:i:s.000';
    public $timestamps = true;

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

    public function obtenergrupo($id){
        $lu= $this->find($id);
        $g= $lu->grupo()->get();
        return $g;

    }
}
