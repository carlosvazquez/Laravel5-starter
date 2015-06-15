@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h2>OS: <strong>{{ $install->name }}</strong></h2>
			<table class="table table-striped table-bordered" style="width:100%;">
			  <tr class="success">
				<th>OS</th>
				<th>Área</th>
				<th>División</th>
				<th>Estatus</th>
			  </tr>
			  <tr>
				<td><strong>{{ $install->os }}</strong></td>
				<td>{{ $install->area->name }}</td>
			    <td>{{ $install->division->name }}</td>
				<td><strong class="status{{ $install->status->name }}">{{ $install->status->slug }}</strong></td>
			  </tr>
			  <tr>
				<td colspan="4">Domicilio: <strong>{{ $install->domicilio }}</strong></td>
			  </tr>
			<tr>
				<td colspan="4">Teléfono: <strong>{{ $install->telefono }}</strong></td>
			  </tr>
			<tr>
				<td colspan="4">
					Programado: <strong>{{ $install->programado }}</strong> |
					Reprogramado: <strong>{{ $install->reprogramado }}</strong> |
                    Responsable: <strong>{{ $install->responsable->first_name }} {{ $install->responsable->last_name }}</strong>
					</td>
			  </tr>
			<tr>
                <tr>
                    <td colspan="4">
                        Reporte:
                        @if($install->reporte != null )
                        Potencia: <strong>{{ $install->reporte->potencia }}</strong> |
                        @endif

                    </td>
                </tr>
                <tr>
				<td colspan="4" class="text-right">
                    {!! link_to_route('index', $title = 'Volver', $parameters = array(), $attributes = array('class' => 'btn btn-default')) !!}
                    @if($install->reporte != null )
                        {!! link_to_route('reports.show', $title = 'Ver instalación', $parameters = array("id" => $install->id), $attributes = array('class' => 'btn btn-success')) !!}
                        {!! link_to_route('reports.edit', $title = 'Finalizar la OS', $parameters = array("id" => $install->id), $attributes = array('class' => 'btn btn-info')) !!}
                    @else
                        {!! link_to_route('reports.create', $title = 'Realizar Instalación', $parameters = array("id" => $install->id), $attributes = array('class' => 'btn btn-success')) !!}
                    @endif


                    @if($install->cancelacion != null )
                        {!! link_to_route('cancels.show', $title = 'Ver cancelación', $parameters = array("id" => $install->id), $attributes = array('class' => 'btn btn-danger')) !!}
                    @else
                        {!! link_to_route('cancels.create', $title = 'Generar cancelación', $parameters = array("id" => $install->id), $attributes = array('class' => 'btn btn-danger')) !!}
                    @endif
				</td>
			</tr>
			</table>
		</div>
	</div>


</div>
@endsection

<script>
    function ConfirmFinish()
    {
        var x = confirm("Finalizar la orden? No podrá cambiar el estado");
        if (x)
            return true;
        else
            return false;
    }
</script>