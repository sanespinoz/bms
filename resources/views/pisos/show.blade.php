@extends('layouts.admin')
        <div class="form-group col-xs-12">
            <h2>Datos del piso {{$piso->nombre}} </h2>
            Descripción:
            {{$piso->descripcion}}

            <h3>Sectores en el piso</h3>
            <?php foreach($sectores as $sector){ ?>
            <ul> Nombre: {{$sector->nombre}}
                Descripción: {{$sector->descripcion}}</ul>



          <?php  }
            ?>

        </div>
	@stop
		