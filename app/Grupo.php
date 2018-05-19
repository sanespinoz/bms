<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table    = 'grupos';
    protected $fillable = ['nombre', 'descripcion','cant_luminarias','energia_consumida','piso_id','sector_id','cant_hs_activo','cant_activaciones'];
    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s.000';

    public function sector()
    {
        return $this->belongsTo('App\Sector');
    }

    public function luminarias()
    {
        //creamos una relacion con el nodelo luminaria
        return $this->hasMany('App\Luminaria');
    }

    public function energiaGrupos()
    {
        //creamos una relacion con el modelo energiaGrupo
        return $this->hasMany('App\EnergiaGrupo');
    }
}
