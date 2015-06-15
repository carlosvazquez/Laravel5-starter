@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Reporte de cancelación de la OS: <strong>{{ $osinstalacion }}</strong></div>
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
                        {!! Form::open(['route' => 'cancels.store', 'method' => 'POST']) !!}
                        @include('cancels.partials.fields')
                            <div class="form-group text-center">
                            {!! Form::submit('Finalizar cancelación', ['class'=>'btn btn-default btn-success btn-lg']); !!}
                            {!! link_to('/', $title = 'Cancelar', $attributes = array("class" => "btn btn-default btn-warning btn-lg"), $secure = null) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
