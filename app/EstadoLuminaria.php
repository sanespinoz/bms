<?php

namespace App;

use App\Luminaria;
use Illuminate\Database\Eloquent\Model;

class EstadoLuminaria extends Model
{
    protected $table      = 'estado_luminarias';
    protected $fillable   = ['fecha', 'estado', 'on_off', 'valor_regulacion', 'luminaria_id','observacion'];
    protected $dates      = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s.000';
    public $timestamps    = false;

    public function luminaria()
    {
        return $this->belongsTo('App\Luminaria');
    }

    public function estado($id, $fecha)
    {
        $el = EstadoLuminaria::where('luminaria_id', $id)->where('fecha', $fecha)->get();
        return $el;

    }
}
