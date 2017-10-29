@extends('layouts.admin')

@section('content')
    {{--@include('alerts.request')--}}

    <h1>Operaciones</h1>
    <?php
    $o = Auth::user()->rol_id;
    var_dump($o);
    ?>
@endsection