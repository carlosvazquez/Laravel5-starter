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
            <h2>Reporte del cliente</h2>
                <ul>
                    <li>{{ $report->potencia  }}</li>
                    <li>{{ $report->download  }}</li>
                    <li>{{ $report->upload }}</li>
                    <li>{{ $report->dto  }}</li>
                    <li>{{ $report->terminal  }}</li>
                    <li>{{ $report->ont  }}</li>
                    <li>{{ $report->opcion  }}</li>
                    <li>{{ $report->id  }}</li>

                    <li>{{ $report->created_at  }}</li>
                    <li>{{ $report->updated_at  }}</li>

                </ul>
        </div> <!-- .col-xs-12 -->
    </div> <!-- .row -->

</div> <!-- .container -->
@endsection