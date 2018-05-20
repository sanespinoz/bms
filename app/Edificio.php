<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Edificio extends Model
{
    protected $table    = 'edificios';
    protected $fillable = ['nombre', 'direccion', 'telefono', 'email', 'ciudad', 'provincia', 'codigo', 'descripcion'];
    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s.000';
    public $timestamps = false;
    
    public function sector()
    {
        return $this->belongsTo('App\Sector');
    }
  /*  public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s.000', $value);
    }

    public function getUpdateAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s.000', $value);
    }

    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d H:i:s.000');
    }

    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = Carbon::createFromFormat('Y-m-d H:i:s.000', $value)->format('Y-m-d H:i:s.000');
    }*/

    public function getCreatedAt(){
      return $this->created_at;
    }
    public function getUpdatedAt(){
      return $this->updated_at;
    }

}
