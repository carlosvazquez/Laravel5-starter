@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Alta nueva orden de servicio</div>
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
                        {!! Form::open(['route' => 'ospanel.installs.store', 'method' => 'POST']) !!}
                        @include('ospanel.partials.installs.fields')
                        <div class="form-group text-center">
                            {!! Form::submit('Guardar', ['class'=>'btn btn-default btn-success btn-lg']); !!}
                            {!! link_to('ospanel', $title = 'Cancelar', $attributes = array("class" => "btn btn-default btn-warning btn-lg"), $secure = null) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
