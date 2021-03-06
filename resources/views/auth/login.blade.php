@extends('layouts.login')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="loginpage col-md-8 col-md-offset-2">
            <div class="content text-center" style="margin-bottom: 40px;">
                <img style="width: 240px; height: auto;" src="/images/logo.svg" alt=""/>
            </div>
			<div class="panel panel-default">
				<div class="panel-heading text-center">Acceso</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Ups!</strong> Hay algunos problemas con sus datos.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Usuario</label>
							<div class="col-md-6">
                                <input type="username" class="form-control" name="username" value="{{ old('username') }}" >
							</div>
						</div>
						<div class="form-group ">
							<label class="col-md-4 control-label">Contraseña</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Recordarme
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary btn-lg">Entrar</button>

								<a class="btn btn-link" href="{{ url('/password/email') }}">¿Olvidó su contraseña?</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
