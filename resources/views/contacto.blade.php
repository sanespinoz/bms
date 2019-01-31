@extends('layouts.principal')
	@section('content')
	@include('alerts.success')
<!---contact-->
<div class="main-contact">
    <h3 class="head">
        Contáctanos
    </h3>
    <p>
        Estamos para ayudarte
    </p>
    <div class="contact-form">
        {!!Form::open(['route'=>'mail.store','method'=>'POST'])!!}
                    {!! csrf_field() !!}
        <div class="col-md-6 contact-left">
            {!!Form::text('name',null,['class'=> 'form-control','placeholder' => 'Nombre'])!!}
                            {!!Form::text('email',null,['class'=> 'form-control','placeholder' => 'Email'])!!}
        </div>
        <div class="col-md-6 contact-right">
            {!!Form::textarea('mensaje',null,['class'=> 'form-control','placeholder' => 'Mensaje'])!!}
        </div>
        {!!Form::submit('ENVIAR')!!}
                     {!!Form::close()!!}
    </div>
</div>
@endsection
