@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">Acciones</div>
				<div class="panel-body text-center">
					<a class="btn btn-success btn-lg" href="{{ url('/areas') }}">Nuevo Cliente</a>
					@role('admin')
					 eres admin
					@endrole
					@role('manager')
					 eres manager
					@endrole
					@role('tecnico')
					 eres tecnico
					@endrole


				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<h2>Lista de clientes</h2>
			@for ($i = 0; $i < 10; $i++)
			<table class="table table-striped table-bordered" style="width:100%;">
			  <tr class="success">
				<th>OS</th>
				<th>Área</th>
				<th>División</th>
				<th>Ok</th>
			  </tr>
			  <tr>
				<td><strong>10934778432</strong></td>
				<td>Ensenada</td>
			    <td>Telnor</td>
				<td><strong style="color:red;">X</strong></td>
			  </tr>
			  <tr>
				<td colspan="4">Nombre: <strong>Gim Labs SA de CV</strong></td>
			  </tr>
			  <tr>
				<td colspan="4">Domicilio: <strong>Pse. Ensenada 2230, Col. Playas, Sección Dorado</strong></td>
			  </tr>
			<tr>
				<td colspan="4">Teléfono: <strong>67612122</strong></td>
			  </tr>
			<tr>
				<td colspan="4">
					Agendación: <strong>4-may-15</strong>
					Migración: <strong>5-may-15</strong>
					</td>
			  </tr>
			<tr>
				<td colspan="4" class="text-right">
					<a class="btn btn-default btn-info" href="#">Ver cliente</a>
					<a class="btn btn-default btn-success" href="#">Reporte</a>
					<a class="btn btn-default btn-danger" href="#">Cancelar</a>
				</td>
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
