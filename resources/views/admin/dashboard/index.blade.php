@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Panel</div>
                    <div class="panel-body text-center">aa
                        @role('admin')
                        Eres administrador
                        @endrole
                        @role('contralor')
                        Eres contralor
                        @endrole
                        @role('supervisor')
                        Eres supervisor
                        @endrole
                        @role('tecnico')
                        Eres técnico
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection