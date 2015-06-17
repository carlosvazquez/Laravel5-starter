@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar/Finalizar OS: {{ $reporte->install->os }}</div>
                    <div class="panel-body">
                        {!! Form::model($reporte, ['route' => ['reports.update', $reporte], 'method' => 'PUT']) !!}
                        @include('reports.partials.fields-edit')
                        <div class="form-group text-right">
                            {!! Form::submit('Actualizar reporte', ['class'=>'btn btn-default btn-success btn-lg']); !!}
                            <a class="btn btn-default btn-warning btn-lg" href="{{ route('reports.index') }}">Cancelar</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection