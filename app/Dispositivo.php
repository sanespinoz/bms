<?php

namespace App;

use App\Piso;
use App\Sector;
use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    protected $table      = 'dispositivos';
    protected $fillable   = ['codigo', 'marca', 'tipo', 'nombre', 'descripcion', 'estado', 'fecha_alta', 'fecha_baja', 'piso_id', 'sector_id'];
    protected $dates      = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s.000';
    public $timestamps    = false;

    public function sector()
    {
        return $this->belongsTo('App\Sector');
    }

    public function piso()
    {
        return $this->belongsTo('App\Piso');
    }
    public function scopeSearchdispositivos($query, $idPiso, $idSector = "")
    {
        if ($idSector == "") {
            $dispositivos = $query->where('piso_id', '=', $idPiso);

        } else {
            $dispositivos = $query->where('piso_id', '=', $idPiso)
                ->where(function ($q) use ($idPiso, $idSector) {
                    $q->where('sector_id', '=', $idSector);
                });

        }
        return $dispositivos;
    }

}
