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
                    <td><strong style="color:green;">{{ $asignada->status->slug }}</strong></td>
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
                        Reprogramado: <strong>{{ $asignada->reprogramado }}</strong> |
                        Responsable: <strong>{{ $asignada->responsable->first_name }} {{ $asignada->responsable->last_name }}</strong>

                    </td>
                </tr>
                <tr>
                    <td colspan="4">Última actualización: <strong>{{ $asignada->updated_at }}</strong>
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