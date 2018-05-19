<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table    = 'rols';
    protected $fillable = ['rol'];
    protected $dates = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s.000';

    public function users()
    {
        //creamos una relacion con el modelo user
        return $this->hasMany('App\User');
    }

    public function reports()
    {
        //creamos una relacion con el modelo report
        return $this->belongsToMany('App\Report')->withTimestamps();;
    }
}
