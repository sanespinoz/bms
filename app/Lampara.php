<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lampara extends Model
{
    protected $table    = 'lamparas';
    protected $fillable = ['luminaria_id', 'marca', 'tipo', 'voltaje', 'factor_potencia', 'fecha_instalacion', 'potencia', 'vida', 'horas_activas', 'tiempo_restante', 'estado'];

    public function luminaria()
    {
        return $this->belongsTo('App\Luminaria');
    }
}
