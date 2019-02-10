@extends('layouts.admin')
    @section('content')
       @include('alerts.request')
<div class="form-group col-xs-12">
    <h2>
        Datos del usuario {{$user->name}}
    </h2>
    {!!Form::model($user,['route'=> ['user.update',$user->id],'method'=>'PUT',$rols,$rolse])!!}
            @include('user.partials.fields')
    <div class="form-group col-xs-12">
        {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
      {!! Form::close()!!}

{!! Form::open(['route'=>['user.destroy',$user->id],'method'=>'DELETE']) !!}
{!! csrf_field() !!}
{!! Form::submit('Eliminar',['class'=>'btn btn-danger']) !!}
   {!! Form::close() !!}
{!! link_to(URL::previous(), 'Cancelar', ['class' => 'btn btn-default']) !!}
    </div>
</div>
@endsection
