<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">Acciones</div>
            <div class="panel-body text-center">
                @role('admin')
                {!! link_to_action('ListadosController@index', $title = 'Listar todas las OS', $parameters = array(), $attributes = array('class' => 'btn btn-success')) !!}

                {!! link_to_action('SearchController@index', $title = 'Buscar', $parameters = array(), $attributes = array('class' => 'btn btn-success')) !!}

                {!! link_to_action('ExcelController@index', $title = 'Generar excel', $parameters = array(), $attributes = array('class' => 'btn btn-success')) !!}
                
                @endrole
                @role('contralor')
                {!! link_to_action('ListadosController@index', $title = 'Listar todas las OS', $parameters = array(), $attributes = array('class' => 'btn btn-success')) !!}
                @endrole
                @role('supervisor')
                Eres supervisor
                @endrole
                @role('tecnico')
                Eres tecnico
                @endrole

            </div>
        </div>
    </div>
