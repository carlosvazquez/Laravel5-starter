@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="text-center">
                <h2>Reporte de cancelación de OS: <strong>{{ $data->install->os }}</strong></h2>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-6">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Datos</div>
                        <div class="panel-body">
                            Nombre: <strong>{{ $data->install->name }}</strong><br>
                            Domicilio: {{ $data->install->domicilio }}<br>
                            Teléfono: <strong>{{ $data->install->telefono }}</strong><br>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Servicio</div>
                        <div class="panel-body">
                            Día: <strong>{{ \Carbon\Carbon::now('America/Tijuana', $data->install->created_at ) }}</strong><br>
                            Estatus: <strong>{{ $data->install->status->slug  }}</strong><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center"><strong>Resumen</strong></h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-condensed table-bordered">
                        <thead>
                        <tr class="success">
                            <th class="text-center"><strong>Potencia</strong></th>
                            <th class="text-center"><strong>Download</strong></th>
                            <th class="text-center"><strong>Upload</strong></th>
                            <th class="text-center"><strong>DTO</strong></th>
                            <th class="text-center"><strong>Terminal</strong></th>
                            <th class="text-center"><strong>ONT</strong></th>
                            <th class="text-center"><strong>Opción</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">{{ $data->potencia }}</td>
                            <td class="text-center">{{ $data->download }}</td>
                            <td class="text-center">{{ $data->upload }}</td>
                            <td class="text-center">{{ $data->dto }}</td>
                            <td class="text-center">{{ $data->terminal }}</td>
                            <td class="text-center">{{ $data->ont }}</td>
                            <td class="text-center">{{ $data->opcion }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-condensed table-bordered">
                        <thead>
                        <tr class="success">
                            <th class="text-center"><strong>Dist. 25</strong></th>
                            <th class="text-center"><strong>Dist. 50</strong></th>
                            <th class="text-center"><strong>Dist. 75</strong></th>
                            <th class="text-center"><strong>Dist. 125</strong></th>
                            <th class="text-center"><strong>Modem ADLS</strong></th>
                            <th class="text-center"><strong>ONT nueva</strong></th>
                            <th class="text-center"><strong>No tiene</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">{{ ($data->dist25) ? 'X' : '' }}</td>
                            <td class="text-center">{{ ($data->dist50) ? 'X' : '' }}</td>
                            <td class="text-center">{{ ($data->dist75) ? 'X' : '' }}</td>
                            <td class="text-center">{{ ($data->dist125) ? 'X' : '' }}</td>
                            <td class="text-center">{{ $data->modemadsl }}</td>
                            <td class="text-center">{{ ($data->ont_nueva) ? 'X' : '' }}</td>
                            <td class="text-center">{{ ($data->no_tiene) ? 'X' : '' }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-condensed table-bordered">
                        <thead>
                        <tr class="success">
                            <th class="text-center"><strong>Se negó</strong></th>
                            <th class="text-center"><strong>Proveedor</strong></th>
                            <th class="text-center"><strong>Factura</strong></th>
                            <th class="text-center"><strong>Contratista</strong></th>
                            <th class="text-center"><strong>No. Empleado</strong></th>
                            <th class="text-center"><strong>WSW NT</strong></th>
                            <th class="text-center"><strong>Vel. Upload</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">{{ ($data->se_nego) ? 'X' : '' }}</td>
                            <td class="text-center">{{ $data->proveedor }}</td>
                            <td class="text-center">{{ $data->factura }}</td>
                            <td class="text-center">{{ $data->contratista }}</td>
                            <td class="text-center">{{ $data->noempleado }}</td>
                            <td class="text-center">{{ $data->wsw_ont }}</td>
                            <td class="text-center">{{ $data->velupload }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="col-xs-12">{!! link_to_route('installs.show', $title = 'Regresar', $parameters = array('id' => $data->install_id), $attributes = array('class'=>'btn btn-success btn-lg', 'aria-label'=>'Left Align"')) !!}</div>
    </div>
</div>
@endsection