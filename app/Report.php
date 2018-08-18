<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table    = 'reports';
    protected $fillable = ['name', 'description_date','report_date'];
    protected $dates = ['created_at', 'updated_at'];
   // protected $dateFormat = 'Y-m-d H:i:s.000';
    public $timestamps = true;

    public function edificio()
    {
        return $this->belongsTo('App\Edificio');
    }

    public function rols()
    {
        return $this->belongsToMany('App\Report')->withTimestamps();
    }
}
