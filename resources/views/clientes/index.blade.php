@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Dashboard
				</div>
				<div class="panel-body text-center">
					<a class="btn btn-success btn-lg" href="{{ url('/areas') }}">Nuevo Cliente</a>

                </div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<h2>Lista de clientes</h2>
			@for ($i = 0; $i < 10; $i++)
			<table class="table table-striped table-bordered">
			  <tr class="success">
				<th>#</th>
				<th>OS</th>
				<th>Área</th>
				<th>División</th>
				<th>Fecha agendación</th>
				<th>Ok</th>
			  </tr>
			  <tr>
				<td>1</td>
				<td>10934778432</td>
				<td>Ensenada</td>
			    <td>Telnor</td>
				<td>4-may-15</td>
				<td>X</td>
			  </tr>
			<tr>
				<td>Nombre: <strong>Gim Labs SA de CV</strong></td>
				<td colspan="2">Domicilio: <strong>Pse. Ensenada 2230, Col. Playas, Sección Dorado</strong></td>
				<td>Teléfono: <strong>67612122</strong></td>
				<td>Fecha migración: <strong>4-may-15</strong></td>
			  </tr>
			</table>
			@endfor

		</div>
	</div>

<hr>
	<div class="row">
		<div class="col-xs-12">
			<h2>Cliente: <strong>Gim Labs SA de CV</strong></h2>
			<table class="table table-striped table-bordered">
			  <tr>
				<th>#</th>
				<th>OS</th>
				<th>Área</th>
				<th>División</th>
				<th>Nombre</th>
				<th>Teléfono</th>
				<th>Fecha agendación</th>
				<th>Fecha migración</th>
				<th>Potencia</th>
				<th>Download</th>
				<th>Upload</th>
				<th>Status OS</th>
				<th>DTO</th>
				<th>Terminal óptica</th>
				<th>ONT</th>
				<th>Aerea/Sub</th>
				<th>Ok</th>
			  </tr>
			  <tr>
				<td>1</td>
				<td>10934778432</td>
			    <td>Telnor</td>
			    <td>Gim Labs SA de CV</td>
				<td>Pse. Ensenada 2230, Col. Playas, Sección Dorado</td>
				<td>67612122</td>
				<td>4-may-15</td>
				<td>4-may-15</td>
				<td>17.84</td>
				<td>19.79</td>
				<td>5.87</td>
				<td>Instalada</td>
				<td>PLY0043</td>
				<td>B2/8</td>
				<td>ALCLFAD8F5BD</td>
				<td>Aerea</td>
				<td>X</td>
			  </tr>
			</table>

		</div>
	</div>
</div>
@endsection
