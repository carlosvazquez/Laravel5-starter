@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Acciones</div>
                    <div class="panel-body text-center">
                        <a class="btn btn-success btn-lg" href="{{ url('/installs/create') }}">Nueva Orden de Servicio</a><br>
                    </div>
                </div>
            </div>
        </div>  <!-- .row -->
        <hr/>
        <div class="row">
            <div class="col-xs-12">
                <h2>Mis Órdenes de Servicio</h2>
                @foreach ($installs as $install)
                    <table class="table table-striped table-bordered" style="width:100%;">
                        <tr class="success">
                            <th>OS</th>
                            <th>Área</th>
                            <th>División</th>
                            <th>Estatus</th>
                        </tr>
                        <tr>
                            <td><strong>{{ $install->os }}</strong></td>
                            <td>{{ $install->area->name }}</td>
                            <td>{{ $install->division->name }}</td>
                            <td><strong class="status{{ $install->status->name }}">{{ $install->status->slug }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="4">Nombre: <strong>{{ $install->name }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="4">Domicilio: <strong>{{ $install->domicilio }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="4">Teléfono: <strong>{{ $install->telefono }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                Programado: <strong>{{ $install->programado }}</strong> |
                                Reprogramado: <strong>{{ $install->reprogramado }}</strong> |
                                Responsable: <strong>{{ $install->responsable->first_name }} {{ $install->responsable->last_name }}</strong>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">Última actualización: <strong>{{ $install->updated_at }}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">
                                {!! link_to_route('installs.show', $title = 'Ver cliente', $parameters = array($install->id), $attributes = array('class' => 'btn btn-default btn-success')) !!}
                            </td>
                        </tr>
                    </table>
                @endforeach
            </div> <!-- .col-xs-12 -->
        </div> <!-- .row -->

    </div> <!-- .container -->
@endsection