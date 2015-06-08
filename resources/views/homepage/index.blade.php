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
                    <a class="btn btn-default btn-lg btn-success" href="{{ url('/dashboard') }}">Sistema</a>
                    <a class="btn btn-default btn-lg btn-danger" href="{{ url('/auth/logout') }}">Logout</a>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="xs-col-12" style="text-transform: capitalize; margin-top: 40px;">{{ $fecha }}</div>
        </div>
@endsection