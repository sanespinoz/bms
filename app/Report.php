<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table    = 'reports';
    protected $fillable = ['name', 'description_date','report_date'];
    protected $dates = ['created_at', 'updated_at'];
    //protected $dateFormat = 'Y-m-d H:i:s.000';

    public function edificio()
    {
        return $this->belongsTo('App\Edificio');
    }

    public function rols()
    {
        return $this->belongsToMany('App\Report')->withTimestamps();
    }
}
