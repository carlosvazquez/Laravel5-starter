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
                    <td><strong style="color:green;">{{ $proceso->status->slug }}</strong></td>
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
                        Reprogramado: <strong>{{ $proceso->reprogramado }}</strong> |
                        Responsable: <strong>{{ $proceso->responsable->first_name }} {{ $proceso->responsable->last_name }}</strong>

                    </td>
                </tr>
                <tr>
                    <td colspan="4">Última actualización: <strong>{{ $proceso->updated_at }}</strong>
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