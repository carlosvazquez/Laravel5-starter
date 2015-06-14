<div class="row">
    <div class="col-xs-12">
        <h2>Servicios reprogramados</h2>
        @foreach ($reprogramadas as $reprogramada)
            <table class="table table-striped table-bordered" style="width:100%;">
                <tr class="success">
                    <th>OS</th>
                    <th>Área</th>
                    <th>División</th>
                    <th>Estatus</th>
                </tr>
                <tr>
                    <td><strong>{{ $reprogramada->os }}</strong></td>
                    <td>{{ $reprogramada->area->name }}</td>
                    <td>{{ $reprogramada->division->name }}</td>
                    <td><strong style="color:green;">{{ $reprogramada->status->slug }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">Nombre: <strong>{{ $reprogramada->name }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">Domicilio: <strong>{{ $reprogramada->domicilio }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">Teléfono: <strong>{{ $reprogramada->telefono }}</strong></td>
                </tr>
                <tr>
                    <td colspan="4">
                        Programado: <strong>{{ $reprogramada->programado }}</strong> |
                        Reprogramado: <strong>{{ $reprogramada->reprogramado }}</strong> |
                        Responsable: <strong>{{ $reprogramada->responsable->first_name }} {{ $reprogramada->responsable->last_name }}</strong>

                    </td>
                </tr>
                <tr>
                    <td colspan="4">Última actualización: <strong>{{ $reprogramada->updated_at }}</strong>
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