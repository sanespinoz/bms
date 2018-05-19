@extends('layouts.admin')
	@section('content')
        <div class="form-group col-xs-12">
            <h2>Datos del grupo {{$grupo->nombre}} </h2>
            Descripción:
            {{$grupo->descripcion}}

            <h3>Luminarias en el sector</h3>
            <?php foreach($luminarias as $luminaria){
             ?>

            <ul> 
            <li>Identificación: {{$luminaria->identificacion}}</li>
            <li>Ubicación: {{$luminaria->ubicacion}}</li>
            <li>Marca: {{$luminaria->marca}}</li>
            <li>Tipo: {{$luminaria->tipo}}</li>
            <li>Denominación: {{$luminaria->denominacion}}</li>
            <li>Cantidad de lámparas: {{$luminaria->cant_lamparas}}</li>
            <li>Consumo: {{$luminaria->consumo}}</li>
            <li>Tiempo de uso: {{$luminaria->tiempo_uso}}</li>
            
            </ul>

          <?php  }
          ?>

        </div>
	@endsection