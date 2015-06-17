<div class="row">
    <div class="col-xs-12">
        <h2>Servicios asignados</h2>
        @foreach ($asignadas as $asignada)
            <table class="table table-striped table-bordered" style="width:100%;">
                <tr class="success">
                    <th>OS</th>
                    <th>Área</th>
                    <th>División</th>
                    <th>Estatus</th>
                </tr>
                <tr>
                    <td><strong>{{ $asignada->os }}</strong></td>
                    <td>{{ $asignada->area->name }}</td>
                    <td>{{ $asignada->division->name }}</td>
                    <td><strong class="statusA"">{{ $asignada->status->slug }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">Nombre: <strong>{{ $asignada->name }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">Domicilio: <strong>{{ $asignada->domicilio }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">Teléfono: <strong>{{ $asignada->telefono }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">
                        Programado: <strong>{{ $asignada->programado }}</strong> |
                        Reprogramado: <strong>{{ $asignada->reprogramado }}</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        Tecnico: <strong>{{ $asignada->user->first_name }} {{ $asignada->user->last_name }}</strong> No. Empleado: {{ $asignada->user->username}}
                    </td>
                </tr>
                <tr>
                    <td colspan="4">Actualizó: <strong>{{ $asignada->responsable->first_name }} {{ $asignada->responsable->last_name }}</strong> | Última actualización: <strong>{{ $asignada->updated_at }}</strong>
                    </td>
                </tr>

                <tr>
                    <td colspan="4" class="text-right">
                        {!! link_to_route('installs.show', $title = 'Ver cliente', $parameters = array($asignada->id), $attributes = array('class' => 'btn btn-info')) !!}
                    </td>
                </tr>
            </table>
        @endforeach
    </div> <!-- .col-xs-12 -->
</div> <!-- .row -->