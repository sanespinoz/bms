@extends('layouts.admin')
	@section('content')
        <div class="form-group col-xs-12">
            <h2>Datos del sector {{$sector->nombre}} </h2>
            Descripción:
            {{$sector->descripcion}}

            <h3>Grupos en el sector</h3>
            <?php foreach($grupos as $grupo){
             ?>

            <ul> 
            <li>Nombre: {{$grupo->nombre}}</li>
            <li>Descripción: {{$grupo->descripcion}}</li>
            <li>Cantidad de Luminarias: {{$grupo->cant_luminarias}}</li>
            <li>Energía Consumida: {{$grupo->energia_consumida}}</li>
            </ul>

          <?php  }
          ?>

        </div>
    @endsection
		