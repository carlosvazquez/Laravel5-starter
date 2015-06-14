@extends('layouts.homepage')

@section('content')

        <div class="content">
            <img src="/images/logo.svg" alt=""/>
        </div>
        <div class="row">
            <div class="xs-col-12" style="text-transform: capitalize; margin-top: 40px;">{{ $fecha }}</div>
        </div>
        <hr/>
        @if (Auth::guest())
            <div class="row">
                <div class="xs-col-12">
                    <a class="btn btn-default btn-lg btn-success" href="{{ url('/auth/login') }}">Login</a>
                </div>
            </div>
        @else
            <div class="row">
                <div class="xs-col-12">
                    @if(Auth::check())
                        <a class="btn btn-default btn-lg btn-success" href="{{ url('/ospanel') }}">Sistema</a>
                        <a class="btn btn-default btn-lg btn-danger" href="{{ url('/auth/logout') }}">Salir</a>
                    @endif
                </div>
            </div>
        @endif

@endsection