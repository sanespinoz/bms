<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    protected $table    = 'dispositivos';
    protected $fillable = ['marca', 'codigo', 'tipo', 'nombre', 'descripcion', 'fecha_instalacion','estado','sector_id'];
    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s.000';
    public $timestamps = false;


}
