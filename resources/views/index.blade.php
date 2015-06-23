@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">Acciones</div>
                <div class="panel-body text-center">
                    <a class="btn btn-success btn-lg" href="{{ url('/installs/create') }}">Nueva instalación</a>
                    <a class="btn btn-success btn-lg" href="{{ url('/installs') }}">Listar instalaciones</a><br>
                    @role('admin')
                    eres admin
                    @endrole
                    @role('contralor')
                    eres contralor
                    @endrole
                    @role('supervisor')
                        eres supervisor
                    @endrole
                    @role('tecnico')
                        eres tecnico
                    @endrole

                    @if(Auth::check() && Auth::user()->is('admin|contralor'))
                    lo ves si eres admin o contralor
                    @endif
                    @if(Auth::check() && Auth::user()->is('supervisor|tecnico'))
                        lo ves si eres supervisor o tecnico
                    @endif

                </div>
                </div>
        </div>
    </div>  <!-- .row -->
    <hr/>
    <div class="row">
        <div class="col-xs-12">
            <h2>Lista de instalaciones</h2>
            @foreach ($installs as $install)
            <table class="table table-striped table-bordered" style="width:100%;">
                <tr class="success">
                    <th>OS</th>
                    <th>Área</th>
                    <th>División</th>
                    <th>Ok</th>
                </tr>
                <tr>
                    <td><strong>{{ $install->os }}</strong></td>
                    <td>{{ $install->area->name }}</td>
                    <td>{{ $install->division->name }}</td>
                    <td><strong style="color:green;">{{ $install->status->slug }}</strong></td>
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
                        <a class="btn btn-default btn-info" href="#">Ver cliente</a>

                    </td>
                </tr>
            </table>
            @endforeach
            {!! $installs->render() !!}
        </div> <!-- .col-xs-12 -->
    </div> <!-- .row -->

</div> <!-- .container -->
@endsection