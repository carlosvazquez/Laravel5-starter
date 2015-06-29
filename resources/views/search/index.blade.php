@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Buscador</h3>
                </div>
                <div class="panel-body">

                    <div class="row">
                        {!! Form::open(array('action' => 'SearchController@results')) !!}
                        <div class="col-xs-12 col-sm-6">
                            @role('admin')
                            <div class="form-group">
                                {!! Form::label('empleado', 'Generar por técnico:') !!}
                                <div class="well">
                                    <label>
                                        <input type="radio" name="empleado" id="todos" value="0" checked>
                                        Todos los técnicos
                                    </label>
                                </div>
                                <div class="well">
                                    <label>
                                        <input type="radio" name="empleado" id="unico" value="1" >
                                        Técnico específico
                                    </label>
                                    {!! Form::select('id_empleado', $tecnicos, null, ['class'=>'form-control']) !!}
                                </div>
                            </div>
                            @endrole


                            <div class="form-group">
                                {!! Form::label('status', 'Generar por estatus:') !!}
                                <div class="well">
                                    <label>
                                        <input type="radio" name="status" id="status" value="0" checked>
                                        Todos los estatus de OS
                                    </label>
                                </div>
                                <div class="well">
                                    <label>
                                        <input type="radio" name="status" id="status" value="1" >
                                        Estatus específico de OS
                                    </label>
                                    {!! Form::select('id_status', $status, null, ['class'=>'form-control']) !!}
                                </div>
                            </div> <!-- .form-group -->

                        </div>
                        <div class="col-xs-12 col-sm-6">

                            @role('admin')
                            <div class="form-group">
                                {!! Form::label('area', 'Generar por área:') !!}
                                <div class="well">
                                    <label>
                                        <input type="radio" name="area" id="area" value="0" checked>
                                        Todas las áreas
                                    </label>
                                </div>
                                <div class="well">
                                    <label>
                                        <input type="radio" name="area" id="area" value="1" >
                                        Área específica
                                    </label>
                                    {!! Form::select('id_area', $area, null, ['class'=>'form-control']) !!}
                                </div>
                            </div> <!-- .form-group -->
                            @endrole

                            {!! Form::label('ini_fecha', 'Fecha inicial:') !!}
                            <div class="form-group form-group-lg">
                                {!! Form::date('ini_dia', \Carbon\Carbon::now(), array('class' => 'form-control', 'id'=>'formGroupInputLarge')); !!}
                            </div>
                            {!! Form::label('fin_fecha', 'Fecha final') !!}
                            <div class="form-group form-group-lg">
                                {!! Form::date('fin_dia', \Carbon\Carbon::now(), array('class' => 'form-control', 'id'=>'formGroupInputLarge')); !!}
                            </div>
                            <div class="form-group form-group-lg">
                                {!! Form::submit('Buscar', array('class' => 'btn btn-success')) !!}
                            </div>
                            {!! Form::close() !!}

                        </div>

                    </div><!-- .row -->

                </div> <!-- .panel-body -->
                <div class="panel-footer">Panel footer</div>
            </div>
        </div>
    </div>
</div>
@endsection
