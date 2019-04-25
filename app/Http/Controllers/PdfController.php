<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    // public function crearPDF($etotals, $eiluminacions, $anios, $demanda, $vistaurl, $tipo)
    public function crearPDF()
    {
        $file_name = 'google_chart.pdf';

        //$date = date('Y-m-d');
        //dd($etotals, $eiluminacions, $anios, $demanda, $vistaurl, $tipo, $date);die();
        // $view = \View::make($vistaurl, compact('etotals', 'eiluminacions', 'anios', 'demanda'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream($file_name, array("Attachment" => false));
        //if ($tipo == 1) {return $pdf->stream('reporte');}
        //if ($tipo == 2) {return $pdf->download('reporte.pdf');}
    }

    //public function crear_reporte_ener($tipo, $etotals, $eiluminacions, $anios, $demanda)
    public function crear_reporte_ener(graf)
    {

        //$vistaurl = "reportes.ener";

        //return $this->crearPDF($etotals, $eiluminacions, $anios, $demanda, $vistaurl, $tipo);
        return $this->crearPDF();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
