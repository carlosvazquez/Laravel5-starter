{!! Form::hidden('status_id', '1', ['class'=>'form-control']) !!}
{!! Form::hidden('user_id', $user, ['class'=>'form-control']) !!}
{!! Form::hidden('division_id', '1', ['class'=>'form-control']) !!}
{!! Form::hidden('status_id', '1', ['class'=>'form-control']) !!}
{!! Form::hidden('programado', null, ['class'=>'form-control']) !!}
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

<div class="well">
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                {!! Form::label('hora', 'Hora') !!}
                {!! Form::select('hora', array('07' => '07','08' => '08','09' => '09','10' => '10','11' => '11','12' => '12','13' => '13','14' => '14','15' => '15','16' => '16','17' => '17','18' => '18','19' => '19','20' => '20'), '1', ['class'=>'form-control']) !!}
        </span>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                {!! Form::label('minuto', 'Minuto') !!}
                {!! Form::select('minuto', array('00' => '00','15' => '15','30' => '30','45' => '45'), '1', ['class'=>'form-control']) !!}
        </span>
            </div>
        </div>
    </div>

</div>