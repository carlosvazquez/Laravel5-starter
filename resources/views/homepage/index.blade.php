@extends('layouts.homepage')

@section('content')

        <div class="content">
            <div class="title">Eistel</div>
        </div>
        @if (Auth::guest())
            <div class="row">
                <div class="xs-col-12">
                    <a class="btn btn-default btn-lg btn-success" href="{{ url('/auth/login') }}">Login</a>
                </div>
            </div>
        @else
            <div class="row">
                <div class="xs-col-12">
                    @role('supervisor|tecnico')
                    <p>eres supervisor o tecnico</p>
                    <a class="btn btn-default btn-lg btn-success" href="{{ url('/panel') }}">Sistema</a>
                    <a class="btn btn-default btn-lg btn-danger" href="{{ url('/auth/logout') }}">Logout</a>
                    @endrole
                    @role('admin|contralor')
                    <p>Eres admin o contralor</p>
                    <a class="btn btn-default btn-lg btn-success" href="{{ url('/admin') }}">Sistema</a>
                    <a class="btn btn-default btn-lg btn-danger" href="{{ url('/auth/logout') }}">Logout</a>
                    @endrole
                </div>
            </div>
        @endif
        <div class="row">
            <div class="xs-col-12" style="text-transform: capitalize; margin-top: 40px;">

                {{ $fecha }}</div>
        </div>
@endsection