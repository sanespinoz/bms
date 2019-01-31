@extends('layouts.admin')
@section('content')
		 @include('alerts.request') 
		
		{!!Form::model($luminaria,['route'=> ['luminaria.update',$luminaria->id],'method'=>'PUT',$pisos,$sectdelp, $gruposdelp, $p, $g, $s])!!}
			@include('luminaria.partials.fields')
<div class="form-group col-xs-12">
    {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
</div>
<div class="form-group col-xs-12">
    {!!Form::open(['route'=> ['luminaria.destroy',$luminaria->id],'method'=>'DELETE'])!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
</div>
@endsection
@section('scripts')     
    {!! Html::script('js/editlumis.js') !!}
    {!! Html::script('js/editlumisgrupos.js') !!} 
    {!! Html::script('js/datepick.js') !!}
@endsection
