@extends('layouts.admin')
@section('content')
{{--@include('alerts.request')--}}
<h1>Registrar Luminaria</h1>

{!! Form::open(['route'=>'luminaria.store']) !!}

	@include('luminaria.partials.form')

<div class="form-group col-xs-12"> 
{!!  Form::button('Guardar', ['type'=>'submit', 'class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}
</div>

{!! Form::close() !!}
@endsection

@section('scripts')  

  {!!Html::script('js/lumigroup.js')!!}
	{!!Html::script('js/lumi.js')!!}
  
	{!!Html::script('js/datepick.js')!!}

     <script type="text/javascript">
       
         function resta(){
                var v = document.getElementById("vida");
                var hsact = document.getElementById("horas_activas");
                var trestante = v.value - hsact.value;
                 document.getElementById("tiempo_restante").value = trestante;
//limpiar las variables funcion clear a null
            }
    </script>
@endsection

