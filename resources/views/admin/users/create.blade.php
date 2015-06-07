@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Alta nuevo usuario</div>
                    <div class="panel-body">
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                        {!! Form::open(['route' => 'admin.users.store', 'method' => 'POST']) !!}
                        @include('admin.users.partials.fields')
                        <div class="form-group text-right">
                            {!! Form::submit('Guardar usuario', ['class'=>'btn btn-default btn-success btn-lg']); !!}
                            <a class="btn btn-default btn-warning btn-lg" href="{{ route('admin.users.index') }}">Cancelar</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection