<?php

namespace App;

use App\Piso;
use App\Sector;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table      = 'grupos';
    protected $fillable   = ['nombre', 'descripcion', 'cant_luminarias', 'energia_consumida', 'piso_id', 'sector_id', 'cant_hs_activo', 'cant_activaciones'];
    protected $dates      = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s.000';

    public $timestamps = false;

    public function sector()
    {
        return $this->belongsTo('App\Sector');
    }

    public function luminarias()
    {
        //creamos una relacion con el modelo luminaria
        return $this->hasMany('App\Luminaria');
    }

    public function alarmas()
    {
        //creamos una relacion con el modelo alarma
        return $this->hasMany('App\Alarma');
    }
    public function energiaGrupos()
    {
        //creamos una relacion con el modelo energiaGrupo
        return $this->hasMany('App\EnergiaGrupo');
    }
    public function piso()
    {
        return $this->belongsTo('App\Piso');
    }

    public function scopeSearchgrupos($query, $idPiso, $idSector = "")
    {
        if ($idSector == "") {
            $grupos = $query->where('piso_id', '=', $idPiso);

        } else {
            $grupos = $query->where('piso_id', '=', $idPiso)
                ->where(function ($q) use ($idPiso, $idSector) {
                    $q->where('sector_id', '=', $idSector);
                });

        }
        return $grupos;
    }
    public function nombreSector($s)
    {

        $nombsector = $s->nombre;
        return $nombsector;

    }

}
