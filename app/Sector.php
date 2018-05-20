<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table    = 'sectores';
    protected $fillable = ['nombre', 'descripcion','piso_id'];
    protected $dates = ['created_at', 'updated_at'];
   protected $dateFormat = 'Y-m-d H:i:s.000';

    public function piso()
    {
        return $this->belongsTo('App\Piso');
    }

    public function grupos()
    {
        //creamos una relacion con el nodelo equipo
        return $this->hasMany('App\Grupo');
    }

    public function energiaSectores()
    {
        //creamos una relacion con el modelo energiaSector
        return $this->hasMany('App\EnergiaSector');
    }

    //orm scope
    public function scopeSectores($query,$id)
    {
      return $query->where('piso_id', $id);
        // return Sector::where('piso_id',$id)
      //   ->get();
       }
}
