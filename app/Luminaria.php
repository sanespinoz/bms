<?php

namespace App;

use App\EstadoLuminaria;
use Illuminate\Database\Eloquent\Model;

class Luminaria extends Model
{
    protected $table    = 'luminarias';
    protected $fillable = ['codigo', 'nombre', 'tipo', 'descripcion', 'dimensiones', 'voltaje_nominal', 'potencia_nominal', 'corriente_nominal', 'fecha_alta', 'fecha_baja', 'vida_util', 'estado', 'temperatura', 'grupo_id'];
    protected $dates    = ['created_at', 'updated_at'];

    protected $dateFormat = 'Y-m-d H:i:s.000';
    public $timestamps    = false;

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

    public function bajas($periodo, $año)
    {

    }

    public function tiempoUso($tipo_lumi)
    {
        //fecha de baja menos fecha de insta (en horas)< vida util
    }

    public function estado($id, $fecha)
    {
        $estado = EstadoLuminaria::where('luminaria_id', $id)
            ->where('fecha', $fecha)
            ->get()->first();

        return $estado;
    }

}
