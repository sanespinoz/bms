<?php

namespace App;

use App\Grupo;
use App\Catalogo;
use DB;
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

    public function catalogo()
    {
        return $this->belongsTo('App\Catalogo');
    }

    public function estado_luminaria()
    {
        //creamos una relacion con el modelo estadoLuminaria
        return $this->hasMany('App\EstadoLuminaria');
    }

    public function estado($id)
    {
          $f = EstadoLuminaria::select(DB::raw('MAX(fecha) as fecha'))
                    ->join('luminarias', 'estado_luminarias.luminaria_id', '=', 'luminarias.id')
                    ->where('luminarias.id', '=', $id)
                    ->first();
        $fech= $f->fecha;
        $lumi = Luminaria::findOrFail($id);
       // dd($lumi->id);
        $est = EstadoLuminaria::select('id')
                ->where('fecha', $fech)
                ->where('luminaria_id',$lumi->id)
                ->orderBy('id', 'desc')
                ->first();
        $estad= $est->id;
         
        $estado = EstadoLuminaria::where('id', $estad)->first();
       // $lumi = Luminaria::findOrFail($id);
    

//dd($estado);
        return $estado;

    }

    public function fetch(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data  = DB::table('catalogos')
                ->where('nombre', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($data as $row) {
                $output .= '
       <li><a href="#">' . $row->nombre . '</a></li>
       ';
            }
            $output .= '</ul>';
            echo $output;
        }
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

           
        } else {
            //viene un sector y no un grupo
          
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
