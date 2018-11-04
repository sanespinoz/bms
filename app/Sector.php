<?php

namespace App;
use DB;
use Carbon\Carbon;
use App\Piso;


use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table    = 'sectores';
    protected $fillable = ['nombre', 'descripcion','piso_id'];
    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s.000';
    
    public $timestamps = false;

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
    public function scopeSearchpiso($query,$piso)
    {
   
        switch( $piso ) {
        case 'piso 0': return $query->where('piso_id', '=',61); break;
        case 'piso 1': return $query->where('piso_id', '=',62); break;
        case 'piso 2': return $query->where('piso_id', '=',63); break;
        case 'piso 3': return $query->where('piso_id', '=',66); break;
    }
    }

  /*  public function scopeSearch($query,$nombre)  // buscador por nombre de sector
    {
      return $query->where('nombre', '=','$nombre');
    }
       */
}
