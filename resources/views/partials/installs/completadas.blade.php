<div class="row">
    <div class="col-xs-12">
        <h2>Servicios completados</h2>
        @foreach ($completadas as $completada)
            <table class="table table-striped table-bordered" style="width:100%;">
                <tr class="success">
                    <th>OS</th>
                    <th>Área</th>
                    <th>División</th>
                    <th>Estatus</th>
                </tr>
                <tr>
                    <td><strong>{{ $completada->os }}</strong></td>
                    <td>{{ $completada->area->name }}</td>
                    <td>{{ $completada->division->name }}</td>
                    <td><strong class="statusT">{{ $completada->status->slug }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">Nombre: <strong>{{ $completada->name }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">Domicilio: <strong>{{ $completada->domicilio }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">Teléfono: <strong>{{ $completada->telefono }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">
                        Programado: <strong>{{ $completada->programado }}</strong> |
                        Reprogramado: <strong>{{ $completada->reprogramado }}</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        Tecnico: <strong>{{ $completada->user->first_name }} {{ $completada->user->last_name }}</strong> No. Empleado: {{ $completada->user->username}}
                    </td>
                </tr>
                <tr>
                    <td colspan="4">Actualizó: <strong>{{ $completada->responsable->first_name }} {{ $completada->responsable->last_name }}</strong> | Última actualización: <strong>{{ $completada->updated_at }}</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right">
                        {!! link_to_route('installs.show', $title = 'Ver cliente', $parameters = array($completada->id), $attributes = array('class' => 'btn btn-info')) !!}
                        {!! link_to_route('reports.show', $title = 'Ver reporte', $parameters = array($completada->id), $attributes = array('class' => 'btn btn-success')) !!}
                    </td>
                </tr>
            </table>
        @endforeach
    </div> <!-- .col-xs-12 -->
</div> <!-- .row -->