<?php

namespace App\Http\Controllers;

use App;
use App\EnergiaPiso;
use App\Http\Controllers\Controller;
use App\Luminaria;
use App\Piso;
use App\Edificio;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


//Solo accesible a los usuarios admin y de mantenimiento
class ReporteController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	} 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$nomb_edificio = Edificio::first();
    	$nombre = $nomb_edificio->nombre;
    	$anios = EnergiaPiso::
    	select(DB::raw('YEAR(fecha) as anio'))
    	->distinct()
    	->orderBy('anio', 'asc')
    	->get();

    	if ($request->get('anio') != "") {
    		if ($request->get('mes') == "00") {
    			$anio    = $request->get('anio');
    			$etotals = EnergiaPiso::
    			select(DB::raw('SUM(energia_pisos.energia) as energia, pisos.nombre'))
    			->join('pisos', 'pisos.id', '=', 'energia_pisos.piso_id')
    			->where(DB::raw('YEAR(energia_pisos.fecha)'), '=', $anio)
    			->groupBy('pisos.nombre')
    			->get();

    			$eiluminacions = EnergiaPiso::
    			select(DB::raw('SUM(energia_pisos.energia_iluminacion) as energia, pisos.nombre'))
    			->join('pisos', 'pisos.id', '=', 'energia_pisos.piso_id')
    			->where(DB::raw('YEAR(energia_pisos.fecha)'), '=', $anio)
    			->groupBy('pisos.nombre')
    			->get();

    			$demanda = EnergiaPiso::
    			select(DB::raw('SUM(energia_pisos.energia_iluminacion) as energiailu'), DB::raw('SUM(energia_pisos.energia) as energia'), DB::raw('MAX(energia_pisos.pico) as max_demanda'), DB::raw('pisos.nombre'))
    			->join('pisos', 'pisos.id', '=', 'energia_pisos.piso_id')
    			->where(DB::raw('YEAR(energia_pisos.fecha)'), '=', $anio)
    			->groupBy('pisos.nombre')
    			->get();
    			$tit         = 'Consumo Energético durante el ' . $anio;

    			return view('reportes.ener', ['nombre'=>$nombre,'tit' => $tit,'etotals' => $etotals, 'eiluminacions' => $eiluminacions, 'anios' => $anios, 'demanda' => $demanda]);

    		} else {

    			$mes  = $request->get('mes');
    			$anio = $request->get('anio');

    			$etotals = EnergiaPiso::
    			select(DB::raw('SUM(energia_pisos.energia) as energia, pisos.nombre'))
    			->join('pisos', 'pisos.id', '=', 'energia_pisos.piso_id')
    			->where(DB::raw('YEAR(energia_pisos.fecha)'), '=', $anio)
    			->where(DB::raw('MONTH(energia_pisos.fecha)'), '=', $mes)
    			->groupBy('pisos.nombre')
    			->get();

    			$eiluminacions = EnergiaPiso::
    			select(DB::raw('SUM(energia_pisos.energia_iluminacion) as energia, pisos.nombre'))
    			->join('pisos', 'pisos.id', '=', 'energia_pisos.piso_id')
    			->where(DB::raw('YEAR(energia_pisos.fecha)'), '=', $anio)
    			->where(DB::raw('MONTH(energia_pisos.fecha)'), '=', $mes)
    			->groupBy('pisos.nombre')
    			->get();

    			$demanda = EnergiaPiso::
    			select(DB::raw('SUM(energia_pisos.energia_iluminacion) as energiailu'), DB::raw('SUM(energia_pisos.energia) as energia'), DB::raw('MAX(energia_pisos.pico) as max_demanda'), DB::raw('pisos.nombre'))
    			->join('pisos', 'pisos.id', '=', 'energia_pisos.piso_id')
    			->where(DB::raw('YEAR(energia_pisos.fecha)'), '=', $anio)
    			->where(DB::raw('MONTH(energia_pisos.fecha)'), '=', $mes)
    			->groupBy('pisos.nombre')
    			->get();
    			$tit          = 'Consumo Energético durante el ' .$mes. '/'. $anio;

    			return view('reportes.ener', ['nombre'=>$nombre,'tit' => $tit,'etotals' => $etotals, 'eiluminacions' => $eiluminacions, 'anios' => $anios, 'demanda' => $demanda]);
    		}
    	} else {
//cdo se ejecuta por primera vez el request viene vacio entonces busco por 2019
    		$anios = Luminaria::select(DB::raw('YEAR(fecha_alta) as anio'))->orderBy(DB::raw('YEAR(fecha_alta)'), 'desc')
    		->groupBy(DB::raw('YEAR(fecha_alta)'))
    		->get();
    		$a   = $anios->first()->anio;
            // select('rols.id','rols.rol')->get();
    		$etotals = EnergiaPiso::
    		select(DB::raw('SUM(energia_pisos.energia) as energia, pisos.nombre'))
    		->join('pisos', 'pisos.id', '=', 'energia_pisos.piso_id')
    		->where(DB::raw('YEAR(energia_pisos.fecha)'), '=', $a)
    		->groupBy('pisos.nombre')
    		->get();

    		$eiluminacions = EnergiaPiso::
    		select(DB::raw('SUM(energia_pisos.energia_iluminacion) as energia, pisos.nombre'))
    		->join('pisos', 'pisos.id', '=', 'energia_pisos.piso_id')
    		->where(DB::raw('YEAR(energia_pisos.fecha)'), '=', $a)
    		->groupBy('pisos.nombre')
    		->get();

    		$demanda = EnergiaPiso::
    		select(DB::raw('SUM(energia_pisos.energia_iluminacion) as energiailu'), DB::raw('SUM(energia_pisos.energia) as energia'), DB::raw('MAX(energia_pisos.pico) as max_demanda'), DB::raw('pisos.nombre'))
    		->join('pisos', 'pisos.id', '=', 'energia_pisos.piso_id')
    		->where(DB::raw('YEAR(energia_pisos.fecha)'), '=', $a)
    		->groupBy('pisos.nombre')
    		->get();
    		$tit       = 'Consumo Energético durante el ' . $a;

    		return view('reportes.ener', ['nombre'=>$nombre,'tit' => $tit,'etotals' => $etotals, 'eiluminacions' => $eiluminacions, 'anios' => $anios, 'demanda' => $demanda]);

    	}
    }

    public function tendenciaConsumo(Request $request)
    {
    	$nomb_edificio = Edificio::first();
    	$nombre = $nomb_edificio->nombre;
    	$meses = EnergiaPiso::
    	select(DB::raw('MONTH(fecha) as mes'))
    	->distinct()
    	->orderBy('mes', 'asc')
    	->get();
    	$pisos = Piso::all();
    	if ($request->get('anio') != "") {
    		if ($request->get('mes') == "00") {
    			$anio = $request->get('anio');
    			$piso = $request->get('piso');
    			$nom_piso = Piso::select('nombre')->where('id',$piso)->first();
    			$nom_piso = $nom_piso->nombre;
    			$tendencia = EnergiaPiso::
    			select(
    				DB::raw('MAX(pico) as max_pic'),
    				DB::raw('ROUND(Sum(energia),2,0) as energia'),
    				DB::raw('Sum(energia_iluminacion) as energia_iluminacion'),
    				DB::raw('fecha = MONTH(DATEADD( DAY ,DATEDIFF( DAY ,0,fecha),0))'))
    			->where(DB::raw('YEAR(fecha)'), '=', $anio)
    			->where('piso_id', '=', $piso)
    			->groupBy(DB::raw('MONTH(DATEADD( DAY ,DATEDIFF( DAY ,0,fecha),0))'))
    			->get();
    			$plu         = $tendencia->pluck('max_pic')->all();
    			$maximo_pico = max($plu);
    			$fpmax = EnergiaPiso::
    			select(
    				DB::raw('fecha'))
    			->where(DB::raw('YEAR(fecha)'), '=', $anio)
    			->where(DB::raw('pico'), '=', $maximo_pico)
    			->get();
    			$fechmax = $fpmax->first();
    			$pei     = EnergiaPiso::
    			select(
    				DB::raw('ROUND(Sum(energia),2,0) as energia'),
    				DB::raw('Sum(energia_iluminacion) as energia_iluminacion'),
    				DB::raw('fecha = MONTH(DATEADD( DAY ,DATEDIFF( DAY ,0,fecha),0))'),
    				DB::raw('ROUND((Sum(energia_iluminacion)/Sum(energia)),2,0) as division'))
    			->where(DB::raw('YEAR(fecha)'), '=', $anio)
    			->where('piso_id', '=', $piso)
    			->groupBy(DB::raw('MONTH(DATEADD( DAY ,DATEDIFF( DAY ,0,fecha),0))'))
    			->orderBy('fecha','asc')
    			->get();
    			$anios = EnergiaPiso::select(DB::raw('YEAR(fecha) as anio'))->orderBy(DB::raw('YEAR(fecha)'), 'asc')
    			->groupBy(DB::raw('YEAR(fecha)'))
    			->get();
                //dd($pei);
    			$tit       = 'Tendencia de Consumo Energético para el '.$nom_piso. ' durante el ' . $anio;
    			$tit1 ='Proporción de Energía consumida por el sistema con respecto al consumo total (PEI) durante el '. $anio;
    			return view('reportes.tendencia', ['nombre'=>$nombre,'tit'=>$tit,'tit1'=> $tit1,'pisos' => $pisos, 'anios' => $anios, 'tendencia' => $tendencia, 'pei' => $pei, 'maximo' => $maximo_pico, 'fechpic' => $fechmax]);
    		} else {
    			$mes       = $request->get('mes');
    			$anio      = $request->get('anio');
    			$piso      = $request->get('piso');
    			$nom_piso = Piso::select('nombre')->where('id',$piso)->first();
    			$nom_piso = $nom_piso->nombre;
    			$tendencia = EnergiaPiso::
    			select(
    				DB::raw('MAX(pico) as max_pic'),
    				DB::raw('ROUND(Sum(energia),2,0) as energia'),
    				DB::raw('Sum(energia_iluminacion) as energia_iluminacion'),
    				DB::raw('fecha = DAY(DATEADD( DAY ,DATEDIFF( DAY ,0,fecha),0))'))
    			->where(DB::raw('YEAR(fecha)'), '=', $anio)
    			->where(DB::raw('MONTH(fecha)'), '=', $mes)
    			->where('piso_id', '=', $piso)
    			->groupBy(DB::raw('DAY(DATEADD( DAY ,DATEDIFF( DAY ,0,fecha),0))'))
    			->get();
    			$plu         = $tendencia->pluck('max_pic')->all();
    			$maximo_pico = round(max($plu), 2);
    			$fpmax = EnergiaPiso::
    			select(
    				DB::raw('fecha'))
    			->where(DB::raw('YEAR(fecha)'), '=', $anio)
    			->where(DB::raw('pico'), '=', $maximo_pico)
    			->get();
    			$fechmax = $fpmax->first();
                // dd($tendencia);
    			$anios = EnergiaPiso::select(DB::raw('YEAR(fecha) as anio'))->orderBy(DB::raw('YEAR(fecha)'), 'asc')
    			->groupBy(DB::raw('YEAR(fecha)'))
    			->get();
    			$pei = EnergiaPiso::
    			select(
    				DB::raw('ROUND(Sum(energia),2,0) as energia'),
    				DB::raw('Sum(energia_iluminacion) as energia_iluminacion'),
    				DB::raw('fecha = MONTH(DATEADD( DAY ,DATEDIFF( DAY ,0,fecha),0))'),
    				DB::raw('ROUND((Sum(energia_iluminacion)/Sum(energia)),2,0) as division'))
    			->where(DB::raw('YEAR(fecha)'), '=', $anio)
    			->where(DB::raw('MONTH(fecha)'), '=', $mes)
    			->where('piso_id', '=', $piso)
    			->groupBy(DB::raw('MONTH(DATEADD( DAY ,DATEDIFF( DAY ,0,fecha),0))'))
    			->orderBy('fecha','asc')
    			->get();
    			$tit       = 'Tendencia de Consumo Energético para el '
    			.$nom_piso. ' durante el ' . $mes. '/' . $anio;
    			$tit1 ='Proporción de Energía consumida por el sistema con respecto al consumo total (PEI) durante el '. $mes. '/' . $anio;

    			return view('reportes.tendenciam', ['nombre'=>$nombre,'tit'=>$tit,'tit1'=> $tit1,'pisos' => $pisos, 'anios' => $anios, 'tendencia' => $tendencia, 'pei' => $pei, 'maximo' => $maximo_pico, 'fechpic' => $fechmax]);
    		}
    	} else {
//cdo se ejecuta por primera vez el request viene vacio entonces busco por 2019
    		$anios = EnergiaPiso::select(DB::raw('YEAR(fecha) as anio'))->orderBy(DB::raw('YEAR(fecha)'), 'desc')
    		->groupBy(DB::raw('YEAR(fecha)'))
    		->get();
    		$a = $anios->first()->anio;
            // dd($a);
    		$tendencia = EnergiaPiso::
    		select(
    			DB::raw('MAX(pico) as max_pic'),
    			DB::raw('ROUND(Sum(energia),2,0) as energia'),
    			DB::raw('Sum(energia_iluminacion) as energia_iluminacion'),
    			DB::raw('fecha = MONTH(DATEADD( DAY ,DATEDIFF( DAY ,0,fecha),0))'))
    		->where(DB::raw('YEAR(fecha)'), '=', $a)
    		->groupBy(DB::raw('MONTH(DATEADD( DAY ,DATEDIFF( DAY ,0,fecha),0))'))
    		->get();
    		$pei = EnergiaPiso::
    		select(
    			DB::raw('ROUND(Sum(energia),2,0) as energia'),
    			DB::raw('Sum(energia_iluminacion) as energia_iluminacion'),
    			DB::raw('fecha = MONTH(DATEADD( DAY ,DATEDIFF( DAY ,0,fecha),0))'),
    			DB::raw('ROUND((Sum(energia_iluminacion)/Sum(energia)),2,0) as division'))
    		->where(DB::raw('YEAR(fecha)'), '=', $a)
    		->groupBy(DB::raw('MONTH(DATEADD( DAY ,DATEDIFF( DAY ,0,fecha),0))'))
    		->orderBy('fecha','asc')
    		->get();
           // dd($pei);
    		$plu         = $tendencia->pluck('max_pic')->all();
    		$maximo_pico = max($plu);
    		$fpmax = EnergiaPiso::
    		select(
    			DB::raw('fecha'))
    		->where(DB::raw('YEAR(fecha)'), '=', $a)
    		->where(DB::raw('pico'), '=', $maximo_pico)
    		->get();
    		$fechmax = $fpmax->first();
    		$tit       = 'Tendencia de Consumo Energético del Edificio durante el ' . $a;
    		$tit1 ='Proporción de Energía consumida por el sistema con respecto al consumo total (PEI) durante el '. $a;

    		return view('reportes.tendencia', ['nombre'=>$nombre,'tit'=> $tit,'tit1'=> $tit1,'pisos' => $pisos, 'anios' => $anios, 'tendencia' => $tendencia, 'pei' => $pei, 'maximo' => $maximo_pico, 'fechpic' => $fechmax]);
    	}
    }

    public function performanceLuminaria(Request $request)
    {
    	$nomb_edificio = Edificio::first();
    	$nombre = $nomb_edificio->nombre;
        //Detalle  %  de luminarias q cumplen su vida util
    	$c = Luminaria::select(DB::raw('count(*) as total'))
    	->whereNotNull(DB::raw('fecha_baja'))
    	->where(DB::raw('cant_hs_uso'), '>', DB::raw('vida_util'))
    	->get();
    	$baj_cv = $c->first()->total;
    	$c      = Luminaria::select(DB::raw('count(*) as total'))
    	->whereNotNull(DB::raw('YEAR(fecha_baja)'))
    	->get();
    	$baj_tot  = $c->first()->total;
    	$porc_cvu = round(($baj_cv / $baj_tot), 2);
        //Detalle  promedio hs activas
    	$promhsact = Luminaria::select(DB::raw('avg(cant_hs_uso) as hs_activas'), DB::raw('tipo'))
    	->whereNull(DB::raw('fecha_baja'))
    	->groupBy(DB::raw('tipo'))
    	->get();
        //Detalle promedio de vida util
    	$promcanthsuso = Luminaria::select(DB::raw('avg(cant_hs_uso) as hs_activas'), DB::raw('tipo'))
    	->whereNotNull(DB::raw('fecha_baja'))
    	->groupBy(DB::raw('tipo'))
    	->get();
        //dd($request->get('mes'), $request->get('anio'));
    	if ($request->get('piso') != "") {
    		if ($request->get('anio') != "") {
    			if ($request->get('mes') == "00") {

    				$anio  = $request->get('anio');
    				$piso  = $request->get('piso');
                   // dd($piso);
    				$nom_piso = Piso::select('nombre')->where('id',$piso)->first();
    				$nom_piso = $nom_piso->nombre;
    				$datos = array();

                    //Detalle total de cambios
    				$c = Luminaria::select(DB::raw('count(*) as total'))
    				->join('grupos', 'grupos.id', '=', 'luminarias.grupo_id')
    				->join('pisos', 'pisos.id', '=', 'grupos.piso_id')
    				->where(DB::raw('YEAR(fecha_baja)'), '=', $anio)->get();
    				$total_cambios = $c->first()->total;
                    //Fin detalle
    				$tiposLumi = Luminaria::select(DB::raw('tipo'))
    				->join('grupos', 'grupos.id', '=', 'luminarias.grupo_id')
    				->join('pisos', 'pisos.id', '=', 'grupos.piso_id')
    				->where(DB::raw('YEAR(fecha_alta)'), '=', $anio)
    				->groupBy(DB::raw('tipo'))
    				->get();
    				foreach ($tiposLumi as $tipol) {
    					$t       = $tipol->tipo;
    					$bajasAt = Luminaria::select(DB::raw('count(*) as bajas'))
    					->join('grupos', 'grupos.id', '=', 'luminarias.grupo_id')
    					->join('pisos', 'pisos.id', '=', 'grupos.piso_id')
    					->where(DB::raw('YEAR(fecha_baja)'), '=', $anio)
    					->where(DB::raw('tipo'), '=', $t)
    					->get();
    					$b                   = $bajasAt->first()->bajas;
    					$bajasPreviasxFallas = Luminaria::select(DB::raw('count(*) as fallas'))
    					->join('grupos', 'grupos.id', '=', 'luminarias.grupo_id')
    					->join('pisos', 'pisos.id', '=', 'grupos.piso_id')
    					->where(DB::raw('YEAR(fecha_baja)'), '=', $anio)
    					->where(DB::raw('vida_util'), '>', DB::raw('cant_hs_uso'))
    					->where(DB::raw('tipo'), '=', $t)
    					->get();
    					$bpf       = $bajasPreviasxFallas->first()->fallas;
    					$activasAt = Luminaria::select(DB::raw('count(*) as activas'))
    					->join('grupos', 'grupos.id', '=', 'luminarias.grupo_id')
    					->join('pisos', 'pisos.id', '=', 'grupos.piso_id')
    					->where(DB::raw('fecha_baja'), '=', null)
    					->where(DB::raw('YEAR(fecha_alta)'), '=', $anio)
    					->where(DB::raw('tipo'), '=', $t)
    					->get();
    					$a               = $activasAt->first()->activas;
    					$cantidadesPtipo = ['nombre'=>$nombre,'tipo' => $t, 'bajas' => $b, 'fallas' => $bpf, 'activas' => $a, 'promha' => $promhsact];
    					$datos           = array_prepend($datos, $cantidadesPtipo);
    				}
    				$anios = Luminaria::select(DB::raw('YEAR(fecha_alta) as anio'))
    				->join('grupos', 'grupos.id', '=', 'luminarias.grupo_id')
    				->join('pisos', 'pisos.id', '=', 'grupos.piso_id')
    				->orderBy(DB::raw('YEAR(fecha_alta)'), 'desc')
    				->groupBy(DB::raw('YEAR(fecha_alta)'))
    				->get();
                    //dd($anios);
    				$pisos  = Piso::all();
    				$tit= 'Eficiencia de las Luminarias para el '. $nom_piso . ' durante el '. $anio;
    				return view('reportes.performance', ['nombre'=>$nombre,'tit' => $tit, 'pisos' => $pisos, 'datos' => $datos, 'anios' => $anios, 'totales' => $total_cambios, 'porcentaje' => $porc_cvu, 'promha' => $promhsact, 'promvu' => $promcanthsuso]);
    			} else {
    				$mes   = $request->get('mes');
    				$anio  = $request->get('anio');
    				$piso  = $request->get('piso');
    				$nom_piso = Piso::select('nombre')->where('id',$piso)->first();
    				$nom_piso = $nom_piso->nombre;
    				$datos = array();
                

                    //Detalle total de cambios
    				$c = Luminaria::select(DB::raw('count(*) as total'))
    				->join('grupos', 'grupos.id', '=', 'luminarias.grupo_id')
    				->join('pisos', 'pisos.id', '=', 'grupos.piso_id')
    				->where(DB::raw('YEAR(fecha_baja)'), '=', $anio)
    				->where(DB::raw('MONTH(fecha_baja)'), '=', $mes)->get();
    				$total_cambios = $c->first()->total;

    				$tiposLumi = Luminaria::select(DB::raw('tipo'))
    				->join('grupos', 'grupos.id', '=', 'luminarias.grupo_id')
    				->join('pisos', 'pisos.id', '=', 'grupos.piso_id')
    				->where(DB::raw('YEAR(fecha_alta)'), '=', $anio)
    				->groupBy(DB::raw('tipo'))
    				->get();
                  
    				foreach ($tiposLumi as $tipol) {
    					$t       = $tipol->tipo;
    					$bajasAt = Luminaria::select(DB::raw('count(*) as bajas'))
    					->join('grupos', 'grupos.id', '=', 'luminarias.grupo_id')
    					->join('pisos', 'pisos.id', '=', 'grupos.piso_id')
    					->where(DB::raw('YEAR(fecha_baja)'), '=', $anio)
    					->where(DB::raw('MONTH(fecha_baja)'), '=', $mes)
    					->where(DB::raw('tipo'), '=', $t)
    					->get();
    					$b                   = $bajasAt->first()->bajas;
    					$bajasPreviasxFallas = Luminaria::select(DB::raw('count(*) as fallas'))
    					->join('grupos', 'grupos.id', '=', 'luminarias.grupo_id')
    					->join('pisos', 'pisos.id', '=', 'grupos.piso_id')
    					->where(DB::raw('YEAR(fecha_baja)'), '=', $anio)
    					->where(DB::raw('MONTH(fecha_baja)'), '=', $mes)
    					->where(DB::raw('vida_util'), '>', DB::raw('cant_hs_uso'))
    					->where(DB::raw('tipo'), '=', $t)
    					->get();
    					$bpf       = $bajasPreviasxFallas->first()->fallas;
    					$activasAt = Luminaria::select(DB::raw('count(*) as activas'))
    					->join('grupos', 'grupos.id', '=', 'luminarias.grupo_id')
    					->join('pisos', 'pisos.id', '=', 'grupos.piso_id')
    					->where(DB::raw('fecha_baja'), '=', null)
    					->where(DB::raw('MONTH(fecha_alta)'), '=', $mes)
    					->where(DB::raw('YEAR(fecha_alta)'), '=', $anio)
    					->where(DB::raw('tipo'), '=', $t)
    					->get();
    					$a               = $activasAt->first()->activas;
    					$cantidadesPtipo = ['nombre'=>$nombre,'tipo' => $t, 'bajas' => $b, 'fallas' => $bpf, 'activas' => $a];
    					$datos           = array_prepend($datos, $cantidadesPtipo);
    				}
    				$anios = Luminaria::select(DB::raw('YEAR(fecha_alta) as anio'))
    				->join('grupos', 'grupos.id', '=', 'luminarias.grupo_id')
    				->join('pisos', 'pisos.id', '=', 'grupos.piso_id')
    				->orderBy(DB::raw('YEAR(fecha_alta)'), 'desc')
    				->groupBy(DB::raw('YEAR(fecha_alta)'))
    				->get();

                
    				$pisos  = Piso::all();
    				$tit= 'Eficiencia de las Luminarias para el '. 
    				$nom_piso . ', '. $mes . '/'. $anio;
    				return view('reportes.performance', ['nombre'=>$nombre,'tit' => $tit,'pisos' => $pisos, 'datos' => $datos, 'anios' => $anios, 'totales' => $total_cambios, 'porcentaje' => $porc_cvu, 'promha' => $promhsact, 'promvu' => $promcanthsuso]);
    			}
    		}
    	} else {
//cdo se ejecuta por primera vez el request viene vacio entonces busco por 2019 para todo el edificio
    		$anios = Luminaria::select(DB::raw('YEAR(fecha_alta) as anio'))->orderBy(DB::raw('YEAR(fecha_alta)'), 'desc')
    		->groupBy(DB::raw('YEAR(fecha_alta)'))
    		->get();
    		$anio    = $anios->first()->anio;
    		$anombre = $anios->first()->nombre;

    		$datos = array();
            //Detalle total de cambios
    		$c = Luminaria::select(DB::raw('count(*) as total'))
    		->where(DB::raw('YEAR(fecha_baja)'), '=', $anio)->get();
    		$total_cambios = $c->first()->total;
    		$tiposLumi     = Luminaria::select(DB::raw('tipo'))->where(DB::raw('YEAR(fecha_alta)'), '=', $anio)
    		->groupBy(DB::raw('tipo'))
    		->get();
    		foreach ($tiposLumi as $tipol) {
    			$t       = $tipol->tipo;
    			$bajasAt = Luminaria::select(DB::raw('count(*) as bajas'))
    			->where(DB::raw('YEAR(fecha_baja)'), '=', $anio)->where(DB::raw('tipo'), '=', $t)
    			->get();
    			$b                   = $bajasAt->first()->bajas;
    			$bajasPreviasxFallas = Luminaria::select(DB::raw('count(*) as fallas'))->where(DB::raw('YEAR(fecha_baja)'), '=', $anio)
    			->where(DB::raw('vida_util'), '>', DB::raw('cant_hs_uso'))
    			->where(DB::raw('tipo'), '=', $t)
    			->get();
    			$bpf       = $bajasPreviasxFallas->first()->fallas;
    			$activasAt = Luminaria::select(DB::raw('count(*) as activas'))
    			->where(DB::raw('fecha_baja'), '=', null)
    			->where(DB::raw('YEAR(fecha_alta)'), '=', $anio)
    			->where(DB::raw('tipo'), '=', $t)
    			->get();
    			$a               = $activasAt->first()->activas;
    			$cantidadesPtipo = ['nombre'=>$nombre,'tipo' => $t, 'bajas' => $b, 'fallas' => $bpf, 'activas' => $a];
    			$datos           = array_prepend($datos, $cantidadesPtipo);
    			$pisos           = Piso::all();
    			$tit       = 'Eficiencia de las Luminarias en Todo Edificio durante el ' . $anio;
            } //dd($anios);
            return view('reportes.performance', ['nombre'=>$nombre,'tit' => $tit, 'a' => $anio, 'pisos' => $pisos, 'datos' => $datos, 'anios' => $anios, 'totales' => $total_cambios, 'porcentaje' => $porc_cvu, 'promha' => $promhsact, 'promvu' => $promcanthsuso]);
        }
    }

    public function eficienciaEnergetica(Request $request)
    {
    	$nomb_edificio = Edificio::first();
    	$nombre = $nomb_edificio->nombre;
    	$meses = EnergiaPiso::
    	select(DB::raw('MONTH(fecha) as mes'))
    	->distinct()
    	->groupBy(DB::raw('MONTH(fecha)'))
    	->orderBy('mes', 'asc')
    	->get();
    	$pisos = Piso::all();

    	if ($request->get('anio') != "") {
    		if ($request->get('mes') == "00") {

    			$anio = $request->get('anio');
    			$piso = $request->get('piso');

    			$nom_piso = Piso::select('nombre')->where('id',$piso)->first();
    			$nom_piso = $nom_piso->nombre;
    			$eficiencias = EnergiaPiso::select(DB::raw('MONTH(fecha) as mes'), DB::raw('AVG(eficiencia) as eficiencia'))
    			->where(DB::raw('YEAR(fecha)'), '=', $anio)
    			->where('piso_id', $piso)
    			->groupBy(DB::raw('MONTH(fecha)'))
    			->orderBy(DB::raw('MONTH(fecha)'),'asc')
    			->get();
    			$anios = EnergiaPiso::select(DB::raw('YEAR(fecha) as anio'))
    			->groupBy(DB::raw('YEAR(fecha)'))
    			->orderBy(DB::raw('YEAR(fecha)'), 'desc')
    			->get();
    			$tit= 'Índice de Eficiencia Energética para el '. $nom_piso . ' durante el '. $anio;

    			return view('reportes.eficiencia', ['nombre'=>$nombre,'tit' => $tit,'pisos' => $pisos, 'anios' => $anios, 'eficiencias' => $eficiencias]);
    		} else {
                //viene el mes
    			$mes  = $request->get('mes');
    			$anio = $request->get('anio');
    			$piso = $request->get('piso');

    			$nom_piso = Piso::select('nombre')->where('id',$piso)->first();
    			$nom_piso = $nom_piso->nombre;

    			$eficienciamensual = EnergiaPiso::
    			select(DB::raw('DAY(fecha) as dia'), DB::raw('AVG(eficiencia) as eficiencia'))
    			->where(DB::raw('YEAR(fecha)'), '=', $anio)
    			->where('piso_id', '=', $piso)
    			->where(DB::raw('MONTH(fecha)'), '=', $mes)
    			->groupBy(DB::raw('DAY(fecha)'), DB::raw('MONTH(fecha)'))
    			->orderBy(DB::raw('MONTH(fecha)'),'asc')
    			->get();
    			$anios = EnergiaPiso::select(DB::raw('YEAR(fecha) as anio'))->orderBy(DB::raw('YEAR(fecha)'), 'desc')
    			->groupBy(DB::raw('YEAR(fecha)'))
    			->get();
    			$tit='Índice de Eficiencia Energética para el '. 
    			$nom_piso . ', '. $mes . '/'. $anio;

    			return view('reportes.eficiencia', ['nombre'=>$nombre,'tit' => $tit,'pisos' => $pisos, 'anios' => $anios, 'eficienciamensual' => $eficienciamensual]);
    		}
    	} else {
//cdo se ejecuta por primera vez el request viene vacio entonces busco por el ultimo año y para todos los pisos por mes
            // dd($request->get('anio'), $request->get('mes'), $request->get('piso'));
    		$anios = EnergiaPiso::select(DB::raw('YEAR(fecha) as anio'))
    		->orderBy(DB::raw('YEAR(fecha)'), 'desc')
    		->groupBy(DB::raw('YEAR(fecha)'))
    		->get();
    		$a = $anios->first()->anio;
            //dd($a); 1905
    		$eficienciagral = EnergiaPiso::
    		select(DB::raw('MONTH(fecha) as mes'), DB::raw('AVG(eficiencia) as eficiencia'))
    		->where(DB::raw('YEAR(fecha)'), '=', $a)
    		->groupBy(DB::raw('MONTH(fecha)'))
    		->orderBy(DB::raw('MONTH(fecha)'),'asc')
    		->get();
    		$tit= 'Índice de Eficiencia Energética durante el '. $a;
            //dd($eficienciagral);
    		return view('reportes.eficiencia', ['nombre'=>$nombre,'tit' => $tit,'pisos' => $pisos, 'anios' => $anios,  'eficienciagral' => $eficienciagral]);
    	}
    }

    public function createPDF(Request $request)
    {
    	$r = $request->input('hidden_html');
    	$titulo = $request->input('hidden_html_titulo');
    //dd($titulo);exit();
    	if ($r != "") {
    		$html ='<html><head><meta charset=UTF-8"/>';
    		$html .= '<meta content="width=device-width, initial-scale=1" name="viewport"/>';
    		$html .= '<title style="font-weight: bold;">SAI</title>';
    		$html .= '<link rel="stylesheet" href="~assets/css/style.css">';
    		$html .= '<link rel="stylesheet" href="~assets/css/sb-admin-2.css">';
    		$html .= '<link rel="stylesheet" href="~assets/css/bootstrap.min.css">';
    		$html .= '<link rel="stylesheet" href="~assets/fonts/rotobo">';
    		$html .= '<link rel="stylesheet" href="~assets/fonts">';

    		$html .= '</head><body>';
    		$html .= '<div align="center">';
    		$html .= $r;
    		$html .= '</div>';
    		$html .= '</body></html>';

    		$pdf = App::make('dompdf.wrapper');

    		$pdf->loadHTML($html);
    		$pdf->setPaper('a4', 'portrait')->setWarnings(false);
    		return $pdf->stream($titulo . date('d/m/Y H:i:s') . '.pdf', array("Attachment" => false));

    	}
    }
}
