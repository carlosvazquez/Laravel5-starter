<div class="row">
    <div class="col-xs-12">
        <h2>Servicios confirmados</h2>
        @foreach ($confirmadas as $confirmada)
            <table class="table table-striped table-bordered" style="width:100%;">
                <tr class="success">
                    <th>OS</th>
                    <th>Área</th>
                    <th>División</th>
                    <th>Estatus</th>
                </tr>
                <tr>
                    <td><strong>{{ $confirmada->os }}</strong></td>
                    <td>{{ $confirmada->area->name }}</td>
                    <td>{{ $confirmada->division->name }}</td>
                    <td><strong class="statusF">{{ $confirmada->status->slug }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">Nombre: <strong>{{ $confirmada->name }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">Domicilio: <strong>{{ $confirmada->domicilio }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">Teléfono: <strong>{{ $confirmada->telefono }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">
                        Programado: <strong>{{ $confirmada->programado }}</strong> |
                        Reprogramado: <strong>{{ $confirmada->reprogramado }}</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        Tecnico: <strong>{{ $confirmada->user->first_name }} {{ $confirmada->user->last_name }}</strong> No. Empleado: {{ $confirmada->user->username}}
                    </td>
                </tr>
                <tr>
                    <td colspan="4">Actualizó: <strong>{{ $confirmada->responsable->first_name }} {{ $confirmada->responsable->last_name }}</strong> | Última actualización: <strong>{{ $confirmada->updated_at }}</strong>
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
        @endforeach
    </div> <!-- .col-xs-12 -->
</div> <!-- .row -->