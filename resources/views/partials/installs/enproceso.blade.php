<div class="row">
    <div class="col-xs-12">
        <h2>Servicios en proceso</h2>
        @foreach ($procesos as $proceso)
            <table class="table table-striped table-bordered" style="width:100%;">
                <tr class="success">
                    <th>OS</th>
                    <th>Área</th>
                    <th>División</th>
                    <th>Estatus</th>
                </tr>
                <tr>
                    <td><strong>{{ $proceso->os }}</strong></td>
                    <td>{{ $proceso->area->name }}</td>
                    <td>{{ $proceso->division->name }}</td>
                    <td><strong class="statusE">{{ $proceso->status->slug }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">Nombre: <strong>{{ $proceso->name }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">Domicilio: <strong>{{ $proceso->domicilio }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">Teléfono: <strong>{{ $proceso->telefono }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">
                        Programado: <strong>{{ $proceso->programado }}</strong> |
                        Reprogramado: <strong>{{ $proceso->reprogramado }}</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        Tecnico: <strong>{{ $proceso->user->first_name }} {{ $proceso->user->last_name }}</strong> No. Empleado: {{ $proceso->user->username}}
                    </td>
                </tr>
                <tr>
                    <td colspan="4">Actualizó: <strong>{{ $proceso->responsable->first_name }} {{ $proceso->responsable->last_name }}</strong> | Última actualización: <strong>{{ $proceso->updated_at }}</strong>
                    </td>
                </tr>

                <tr>
                    <td colspan="4" class="text-right">
                        {!! link_to_route('installs.show', $title = 'Ver cliente', $parameters = array($proceso->id), $attributes = array('class' => 'btn btn-info')) !!}
                        {!! link_to_route('reports.show', $title = 'Ver reporte', $parameters = array($proceso->id), $attributes = array('class' => 'btn btn-success')) !!}
                    </td>
                </tr>
            </table>
        @endforeach
    </div> <!-- .col-xs-12 -->
</div> <!-- .row -->