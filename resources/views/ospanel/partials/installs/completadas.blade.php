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
                    <td><strong style="color:green;">{{ $completada->status->slug }}</strong></td>
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
                        Reprogramado: <strong>{{ $completada->reprogramado }}</strong> |
                        Responsable: <strong>{{ $completada->responsable->first_name }} {{ $completada->responsable->last_name }}</strong>

                    </td>
                </tr>
                <tr>
                    <td colspan="4">Última actualización: <strong>{{ $completada->updated_at }}</strong>
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