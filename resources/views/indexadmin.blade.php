@extends('layouts.app')

@section('content')
<div class="container">
@include('layouts.panel.panelhead')
    </div>  <!-- .row -->
    <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1default" data-toggle="tab">Cancelada <span class="label label-danger">{{ $canceladas->count() }}</span></a></li>
                <li><a href="#tab2default" data-toggle="tab">Asignada <span class="label label-default">{{ $asignadas->count() }}</span></a></li>
                <li><a href="#tab3default" data-toggle="tab">Completada <span class="label label-success">{{ $completadas->count() }}</span></a></li>
                <li><a href="#tab4default" data-toggle="tab">En proceso <span class="label label-primary">{{ $procesos->count() }}</span></a></li>
                <li><a href="#tab5default" data-toggle="tab">Reprogramada <span class="label label-warning">{{ $reprogramadas->count() }}</span></a></li>
                <li><a href="#tab6default" data-toggle="tab">Confirmada <span class="label label-info">{{ $confirmadas->count() }}</span></a></li>
            </ul>
        </div>

            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab1default">@include('partials.installs.canceladas')</div>
                    <div class="tab-pane fade" id="tab2default">@include('partials.installs.asignadas')</div>
                    <div class="tab-pane fade" id="tab3default">@include('partials.installs.completadas')</div>
                    <div class="tab-pane fade" id="tab4default">@include('partials.installs.enproceso')</div>
                    <div class="tab-pane fade" id="tab5default">@include('partials.installs.reprogramadas')</div>
                    <div class="tab-pane fade" id="tab6default">@include('partials.installs.confirmadas')</div>
                </div>
            </div>


</div> <!-- .container -->
@endsection
@section('mi_script')
<script type="text/javascript">
    $(window).ready( function() {
        setInterval(function () {
            location.reload();}, 180000);
    });
</script>
@stop
