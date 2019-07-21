<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Edificio extends Model
{
    protected $table    = 'edificios';
    protected $fillable = ['nombre', 'direccion', 'telefono', 'email', 'ciudad', 'provincia', 'codigo', 'descripcion'];
    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s';
   
    public $timestamps = false;
    
    public function sector()
    {
        return $this->belongsTo('App\Sector');
    }
 
}
