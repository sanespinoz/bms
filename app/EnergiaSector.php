<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnergiaSector extends Model
{
    protected $table      = 'energia_sectores';
    protected $fillable   = ['fecha', 'energia', 'potencia_max', 'sector_id'];
    protected $dates      = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s.000';

    public $timestamps = false;

    public function sector()
    {
        return $this->belongsTo('App\Sector');
    }
}
