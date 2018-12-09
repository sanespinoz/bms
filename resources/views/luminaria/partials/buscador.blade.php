<div class="panel-body">
    {!! Form::open(['route' => 'luminaria.index', 'method' =>'GET', 'class' => 'navbar-form navbar-left pull-right', 'role'=>'search']) !!}
    <div class="col-sm-6">
        <div class="form-group">
            <select>
                <option value="0">
                </option>
                <option value="01">
                    Enero
                </option>
                <option value="02">
                    Febrero
                </option>
                <option value="03">
                    Marzo
                </option>
                <option value="04">
                    Abril
                </option>
                <option value="05">
                    Mayo
                </option>
                <option value="06">
                    Junio
                </option>
                <option value="07">
                    Julio
                </option>
                <option value="08">
                    Agosto
                </option>
                <option value="09">
                    Septiembre
                </option>
                <option value="10">
                    Octubre
                </option>
                <option value="11">
                    Noviembre
                </option>
                <option value="12">
                    Diciembre
                </option>
            </select>
            {!! Form::select('anios',$anios,null,['id'=>'anio']) !!}
               @foreach($anios as $anio)
            <option value="$anio">
                {{ $anio->anio}}
            </option>
            @endforeach
        </div>
        <button class="btn btn-default" type="submit">
            Buscar
        </button>
    </div>
</div>
