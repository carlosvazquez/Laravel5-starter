@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Panel</div>
                    <div class="panel-body text-center">
                        @role('admin')
                        Eres administrador
                        @endrole
                        @role('manager')
                        Eres gerente
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection