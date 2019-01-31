<div class="col-sm-6">
    <div class="form-group">
        {!! Form::text('name', null, ['class'=>'form-control floating-label']) !!}
    </div>
    <div class="form-group">
        {!! Form::text('email', null, ['class'=>'form-control floating-label']) !!}
    </div>
    <div class="form-group">
        {!!Form::password('password',['class'=>'form-control floating-label','placeholder'=>'Ingrese la password'])!!}
    </div>
    <div class="form-group">
        {!! Form::select('rol_id',$rols,old('rol_id'),['class'=>'form-control floating-label']) !!}
    </div>
</div>
