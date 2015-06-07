@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar usuario: {{ $user->first_name." ".$user->last_name }}</div>
                    <div class="panel-body">
                        {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}
                        @include('admin.users.partials.fields')
                        <div class="form-group text-right">
                            {!! Form::submit('Actualizar usuario', ['class'=>'btn btn-default btn-success btn-lg']); !!}
                            <a class="btn btn-default btn-warning btn-lg" href="{{ route('admin.users.index') }}">Cancelar</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection