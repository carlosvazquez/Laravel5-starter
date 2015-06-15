{!! Form::hidden('status_id', '1', ['class'=>'form-control']) !!}
{!! Form::hidden('user_id', $user, ['class'=>'form-control']) !!}
{!! Form::hidden('division_id', '1', ['class'=>'form-control']) !!}
{!! Form::hidden('status_id', '3', ['class'=>'form-control']) !!}
{!! Form::hidden('userupdate', $user, ['class'=>'form-control']) !!}

<div class="form-group">
    {!! Form::label('os', 'Orden de servicio') !!}
    {!! Form::text('os', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('area_id', 'Área') !!}
    {!! Form::select('area_id', array('1' => 'Tijuana', '2' => 'Ensenada', '3' => 'Mexicali'), '1', ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('telefono', 'Teléfono') !!}
    {!! Form::number('telefono', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('domicilio', 'Domicilio') !!}
    {!! Form::textarea('domicilio', null, ['rows' => '3', 'class'=>'form-control']) !!}
</div>