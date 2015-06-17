<div class="row">
    <div class="col-xs-12">
        <h2>Servicios cancelados</h2>
        @foreach ($canceladas as $cancelada)
            <table class="table table-striped table-bordered" style="width:100%;">
                <tr class="success">
                    <th>OS</th>
                    <th>Área</th>
                    <th>División</th>
                    <th>Estatus</th>
                </tr>
                <tr>
                    <td><strong>{{ $cancelada->os }}</strong></td>
                    <td>{{ $cancelada->area->name }}</td>
                    <td>{{ $cancelada->division->name }}</td>
                    <td><strong class="statusC">{{ $cancelada->status->slug }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">Nombre: <strong>{{ $cancelada->name }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">Domicilio: <strong>{{ $cancelada->domicilio }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">Teléfono: <strong>{{ $cancelada->telefono }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">
                        Programado: <strong>{{ $cancelada->programado }}</strong> |
                        Reprogramado: <strong>{{ $cancelada->reprogramado }}</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        Tecnico: <strong>{{ $cancelada->user->first_name }} {{ $cancelada->user->last_name }}</strong> No. Empleado: {{ $cancelada->user->username}}
                    </td>
                </tr>
                <tr>
                    <td colspan="4">Actualizó: <strong>{{ $cancelada->responsable->first_name }} {{ $cancelada->responsable->last_name }}</strong> | Última actualización: <strong>{{ $cancelada->updated_at }}</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right">
                        {!! link_to_route('installs.show', $title = 'Ver cliente', $parameters = array($cancelada->id), $attributes = array('class' => 'btn btn-info')) !!}
                        {!! link_to_route('cancels.show', $title = 'Ver cancelación', $parameters = array($cancelada->id), $attributes = array('class' => 'btn btn-danger')) !!}
                    </td>
                </tr>
            </table>
        @endforeach
    </div> <!-- .col-xs-12 -->
</div> <!-- .row -->