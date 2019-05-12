<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    protected $table    = 'catalogos';
    protected $fillable = ['nombre', 'tipo', 'descripcion', 'dimensiones', 'voltaje_nominal', 'potencia_nominal', 'corriente_nominal', 'vida_util', 'temperatura'];
    protected $dates    = ['created_at', 'updated_at'];

    protected $dateFormat = 'Y-m-d H:i:s.000';
    public $timestamps    = false;

    public function luminaria()
    {
        //creamos una relacion con el modelo Luminaria
        return $this->hasMany('App\Luminaria');
    }

}
