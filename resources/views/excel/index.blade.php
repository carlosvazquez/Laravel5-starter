@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Generador de excel</h3>
                </div>
                <div class="panel-body">
                    <div class="row">

                        {!! Form::open(array('action' => 'ExcelController@generator', 'method'=>'POST')) !!}
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                    {!! Form::label('generarglobal', 'Generar por:') !!}
                                   <div class="well">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="option1" value="1" checked>
                                        Todos los técnicos
                                    </label>
                                   </div>
                                    <div class="well">
                                      <label>
                                          <input type="radio" name="optionsRadios" id="option2" value="0" >
                                          Técnico específico
                                      </label>
                                      {!! Form::select('id', $tecnicos, null, ['class'=>'form-control']) !!}
                                    </div>

                            </div>
                            <div class="form-group">
                                    {!! Form::label('area', 'Área:') !!}
                                    {!! Form::select('area', $area, null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                          {!! Form::label('fechainicial', 'Desde:') !!}
                          <div class="well">
                            <div class="row">
                              <div class="col-xs-4">
                                <div class="form-group">
                                {!! Form::label('iniciodia', 'Dia') !!}
                                {!! Form::text('iniciodia', '00', array('class' => 'form-control')) !!}
                                </div>
                              </div>
                              <div class="col-xs-4">
                                <div class="form-group">
                                {!! Form::label('iniciomes', 'Mes') !!}
                                {!! Form::text('iniciomes', null, array('class' => 'form-control')) !!}
                                </div>
                              </div>
                              <div class="col-xs-4">
                                <div class="form-group">
                                {!! Form::label('inicioanho', 'Años') !!}
                                {!! Form::text('inicioanho', null, array('class' => 'form-control')) !!}
                                </div>
                              </div>
                            </div>
                          </div>
                          {!! Form::label('fechafinal', 'Hasta:') !!}
                          <div class="well">
                            <div class="row">
                              <div class="col-xs-4">
                                <div class="form-group">
                                {!! Form::label('findia', 'Dia') !!}
                                {!! Form::text('findia', null, array('class' => 'form-control')) !!}
                                </div>
                              </div>
                            <div class="col-xs-4">
                              <div class="form-group">
                              {!! Form::label('finmes', 'Mes') !!}
                              {!! Form::text('finmes', null, array('class' => 'form-control')) !!}
                              </div>
                            </div>
                              <div class="col-xs-4">
                                <div class="form-group">
                                {!! Form::label('finanho', 'Años') !!}
                                {!! Form::text('finanho', null, array('class' => 'form-control')) !!}
                                </div>
                                <div class="form-group">
                                {!! Form::label('saludo', 'Saludo') !!}
                                {!! Form::text('saludo', null, array('class' => 'form-control')) !!}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-xs-12">

                        <div class="form-group form-group-lg">
                            {!! Form::date('fecha', \Carbon\Carbon::now(), array('class' => 'form-control', 'id'=>'formGroupInputLarge')); !!}
                        </div>
                        {!! Form::submit('Generar excel', array('class' => 'btn btn-success')) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
                <div class="panel-footer">Panel footer</div>
            </div>
        </div>
    </div>
    <hr/>
	<div class="row">
		<div class="col-xs-12">

            {{ $saludo }}
            @if($resultados)
            <h3>Resultados:</h3>
            <ul>
                @foreach ($resultados as $resultado)
                    <li><strong>Id</strong>: {{ $resultado->id }}<br><strong>OS</strong>: {{ $resultado->os }}<br><strong>Área:</strong> {{ $resultado->area->name }}<br><strong>Nombre</strong>: {{ $resultado->name }}<br><strong>Teléfono</strong>: {{ $resultado->telefono }}<br><strong>Domicilio</strong>: {{ $resultado->domicilio }}<br><strong>Estado</strong>: {{ $resultado->status->slug }}<br><strong>Creación</strong>: {{ $resultado->created_at }}</li>
                @endforeach
            </ul>
            @endif

		</div>
	</div>

</div>
@endsection
