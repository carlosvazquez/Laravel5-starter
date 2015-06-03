@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">dashboard</div>
				<div class="panel-body">
					Bienvenido al dashboard {{ Inspiring::quote() }}
                </div>
			</div>
		</div>
        <div class="col-xs-12">
            <div class="form-group">
                {!! Form::label('label', 'Nombre:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
        </div>
	</div>
</div>
@endsection
