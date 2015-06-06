@extends('layouts.homepage')

@section('content')
@endsection
<html>
	<head>
		<title>Laravel</title>

		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>


	</head>
	<body>
		<div class="container">
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
					<a class="btn btn-default btn-lg btn-success" href="{{ url('/clientes') }}">Sistema</a>
					<a class="btn btn-default btn-lg btn-danger" href="{{ url('/auth/logout') }}">Logout</a>
				</div>
			</div>
			@endif
		</div>
	</body>
</html>
