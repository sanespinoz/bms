<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table    = 'rols';
    protected $dateFormat = 'dmy h:m:s';
    protected $fillable = ['rol'];

    public function users()
    {
        //creamos una relacion con el modelo user
        return $this->hasMany('App\User');
    }
}
