<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoLuminaria extends Model
{
    protected $table    = 'grupos';
    protected $fillable = ['fecha', 'estado', 'on_off', 'valor_regulacion', 'luminaria_id'];
    protected $dates = ['created_at', 'updated_at'];
    //protected $dateFormat = 'Y-m-d H:i:s.000';
}
