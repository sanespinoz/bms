<?php

namespace App;

use App\Grupo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Luminaria extends Model
{
    protected $table    = 'luminarias';
    protected $fillable = ['codigo', 'nombre', 'tipo', 'descripcion', 'dimensiones', 'voltaje_nominal', 'potencia_nominal', 'corriente_nominal', 'fecha_alta', 'fecha_baja', 'vida_util', 'cant_activaciones', 'cant_hs_uso', 'temperatura', 'grupo_id'];
    protected $dates    = ['created_at', 'updated_at'];

    protected $dateFormat = 'Y-m-d H:i:s.000';
    public $timestamps    = false;

    public function grupo()
    {
        return $this->belongsTo('App\Grupo');
    }

    public function estado_luminaria()
    {
        //creamos una relacion con el modelo estadoLuminaria
        return $this->hasMany('App\EstadoLuminaria');
    }

    public function estado($id)
    {
        $estado = EstadoLuminaria::where('luminaria_id', $id)
            ->get()->first();

        return $estado;
    }

    public function scopeSearchluminarias($query, $idPiso, $idSector = "", $idGrupo = "")
    {
        //dd($idPiso, $idSector, $idGrupo);
        //no viene grupo

        if ($idSector == "") {

            //no viene sector
            $l      = new Collection;
            $grupos = Grupo::where('piso_id', $idPiso)
                ->get();
            //dd($grupos);
            foreach ($grupos as $g) {
                $idg   = $g->id;
                $lumis = Luminaria::where('grupo_id', $idg)
                    ->orderBy('nombre', 'desc');

                $l          = $l->merge($lumis);
                $luminarias = collect($l);

            }

            return $luminarias;
        } else {
            //viene un sector y no un grupo
            //die('estoy en search');
            $luminarias = new Collection;
            $grupos     = Grupo::where('piso_id', $idPiso)
                ->where('sector_id', $idSector)
                ->get();
            //dd($grupos);
            foreach ($grupos as $g) {
                $idg = $g->id;

                $lumis = Luminaria::where('grupo_id', $idg)
                    ->get();
                $luminarias = $luminarias->merge($lumis);

            }

        }
        //dd($luminarias);
        return $luminarias;
    }

}
