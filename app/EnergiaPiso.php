<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnergiaPiso extends Model
{
    protected $table      = 'energia_pisos';
    protected $fillable   = ['energia', 'pico', 'prom_tension', 'max_tension', 'min_tension', 'prom_corriente', 'energia_iluminacion', 'fecha', 'eficiencia', 'piso_id'];
    protected $dates      = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s.000';
    public $timestamps    = false;

    public function piso()
    {
        return $this->belongsTo('App\Piso');
    }
        public function report()
    {
        return $this->belongsTo('App\Report');
    }
}
