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
                        <div class="col-xs-12">
                            <div class="form-group">
                                   <div class="well">
                                       {!! Form::open(array('action' => 'SearchController@index')) !!}
                                       <div class="form-group">
                                       {!! Form::label('campo_os', 'Orden de Servicio') !!}
                                       {!! Form::text('campo_os', null, array('class' => 'form-control')) !!}
                                       </div>
                                       {!! Form::submit('Buscar', array('class' => 'btn btn-success')) !!}
                                   </div>
                            </div>
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
            @if($resultados == null)
            <h3>No hay resultados</h3>
            @endif
            @if($resultados)
            <h3>Resultados:</h3>
            <table class="table table-striped">
                <tr>
                <td><strong>OS:</strong></td>
                <td><strong>Área:</strong></td>
                <td><strong>Nombre:</strong></td>
                <td><strong>Teléfono:</strong></td>
                <td><strong>Domicilio:</strong></td>
                <td><strong>Estado:</strong></td>
                <td><strong>Creado:</strong></td>
                <td><strong>Tecnico:</strong></td>
                <td><strong>Ver</strong></td>
                </tr>
                @foreach ($resultados as $resultado)
                <tr>
                    <td>{{ $resultado->os }}</td>
                    <td>{{ $resultado->area->name }}</td>
                    <td>{{ $resultado->name }}</td>
                    <td>{{ $resultado->telefono }}</td>
                    <td>{{ $resultado->domicilio }}</td>
                    <td>{{ $resultado->status->slug }}</td>
                    <td>{{ $resultado->created_at }}</td>
                    <td>{{ $resultado->user->username }}</td>
                    <td><a class="btn btn-success" href="{{ url('installs/'.$resultado->id) }}">Ver</a></td>
                </tr>
                @endforeach

            </table>
            @endif

		</div>
	</div>

</div>
@endsection
