<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table      = 'reports';
    protected $fillable   = ['name', 'description', 'date'];
    protected $dates      = ['created_at', 'updated_at'];
    protected $dateFormat = 'Y-m-d H:i:s.000';
    public $timestamps    = false;



        public function energiaPisos()
    {
        //creamos una relacion con el modelo energiaPiso
        return $this->hasMany('App\EnergiaPiso');
    }
}
