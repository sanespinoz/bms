<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lampara extends Model
{
    protected $table    = 'lamparas';
    protected $fillable = ['luminaria_id', 'marca', 'tipo', 'voltaje', 'factor_potencia', 'fecha_instalacion', 'potencia', 'vida', 'horas_activas', 'tiempo_restante', 'estado'];
    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s.000';
    
    public function luminaria()
    {
        return $this->belongsTo('App\Luminaria');
    }
}
