<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edificio extends Model
{
    protected $table    = 'edificios';
    protected $dateFormat = 'dmy h:m:s';
    protected $fillable = ['nombre', 'direccion', 'telefono', 'email', 'ciudad', 'provincia', 'codigo', 'descripcion'];

    public function pisos()
    {
        //creamos una relacion con el modelo piso
        return $this->hasMany('App\Piso');
    }
}
