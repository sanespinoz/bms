@extends('layouts.admin')
    @section('content')
<div class="form-group col-xs-12">
    <h2>
        Estado de la luminaria {{$luminaria->codigo}}
    </h2>
    <table class="table">
        <thead>
            <tr>
                <th>
                    Fecha
                </th>
                <th>
                    Estado
                </th>
                <th>
                    On-Off
                </th>
                <th>
                    Valor de regulación
                </th>
                <th>
                    Luminaria
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($estados as $estado)
            <tr>
                <td>
                    {{ $estado->fecha }}
                </td>
                <td>
                    {{$estado->estado}}
                </td>
                <td>
                    {{$estado->on_off}}
                </td>
                <td>
                    {{$estado->valor_regulacion}}
                </td>
                <td>
                    {{$estado->luminaria_id}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!!link_to_route('estadoluminaria.edit', $title = 'Editar', $parameters = $luminaria->id, $attributes = ['class'=>'btn btn-primary'])!!}
</div>
{!! $estados->render() !!}
<div class="form-group col-xs-12">
    {!! link_to(URL::previous(), 'Volver', ['class' => 'btn btn-default']) !!}
</div>
@endsection
