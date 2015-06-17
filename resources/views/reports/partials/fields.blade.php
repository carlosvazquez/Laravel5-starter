@if(isset($id))
    {!! Form::hidden('id', $id, ['class'=>'form-control']) !!}
@endif

<div class="form-group">
    {!! Form::label('potencia', 'Potencia (numérico)') !!}
    {!! Form::number('potencia', null, ['class'=>'form-control input-lg', "step" => "0.01"]) !!}
</div>
<div class="form-group">
    {!! Form::label('download', 'Download (numérico)') !!}
    {!! Form::number('download', null, ['class'=>'form-control input-lg', "step" => "0.01"]) !!}
</div>
<div class="form-group">
    {!! Form::label('upload', 'Upload (numérico)') !!}
    {!! Form::number('upload', null, ['class'=>'form-control input-lg', "step" => "0.01"]) !!}
</div>
<div class="form-group">
    {!! Form::label('dto', 'Distrito') !!}
    {!! Form::text('dto', null, ['class'=>'form-control input-lg']) !!}
</div>
<div class="form-group">
    {!! Form::label('terminal', 'Terminal (alfanumérico)') !!}
    {!! Form::text('terminal', null, ['class'=>'form-control input-lg']) !!}
</div>
<div class="form-group">
    {!! Form::label('ont', 'ONT (alfanumérico)') !!}
    {!! Form::text('ont', null, ['class'=>'form-control input-lg']) !!}
</div>
<div class="form-group">
    {!! Form::label('opcion', 'Aerea/Sub') !!}
    {!! Form::select('opcion', array('aerea' => 'Aérea', 'sub' => 'Subterranea'), 'Aérea', ['class'=>'form-control']) !!}
</div>
<hr/>

<div class="col-xs-6">
    <h4>Dist. 25</h4>
    <div class="form-group">
        <div class="radio">
            <label>
                {!! Form::radio('dist25', '1') !!}
                Sí
            </label>
        </div>
        <div class="radio">
            <label>
                {!! Form::radio('dist25', '0', true) !!}
                No
            </label>
        </div>
    </div>
</div>
<div class="col-xs-6">
    <h4>Dist. 50</h4>
    <div class="form-group">
        <div class="radio">
            <label>
                {!! Form::radio('dist50', '1') !!}
                Sí
            </label>
        </div>
        <div class="radio">
            <label>
                {!! Form::radio('dist50', '0', true) !!}
                No
            </label>
        </div>
    </div>
</div>
<div class="col-xs-6">
    <h4>Dist. 75</h4>
    <div class="form-group">
        <div class="radio">
            <label>
                {!! Form::radio('dist75', '1') !!}
                Sí
            </label>
        </div>
        <div class="radio">
            <label>
                {!! Form::radio('dist75', '0', true) !!}
                No
            </label>
        </div>
    </div>
</div>
<div class="col-xs-6">
    <h4>Dist. 125</h4>
    <div class="form-group">
        <div class="radio">
            <label>
                {!! Form::radio('dist125', '1') !!}
                Sí
            </label>
        </div>
        <div class="radio">
            <label>
                {!! Form::radio('dist125', '0', true) !!}
                No
            </label>
        </div>
    </div>
</div>
<hr/>
<div class="form-group">
    {!! Form::label('modemadsl', 'Modem ADSL (alfanumérico)') !!}
    {!! Form::text('modemadsl', null, ['class'=>'form-control input-lg']) !!}
</div>
<hr/>
<div class="col-xs-12">
    <h4>ONT Nueva</h4>
    <div class="form-group">
        <div class="radio">
            <label>
                {!! Form::radio('ont_nueva', '1') !!}
                Sí
            </label>
        </div>
        <div class="radio">
            <label>
                {!! Form::radio('ont_nueva', '0', true) !!}
                No
            </label>
        </div>
    </div>
</div>
<hr/>
<div class="col-xs-6">
    <h4>No lo tiene</h4>
    <div class="form-group">
        <div class="radio">
            <label>
                {!! Form::radio('no_tiene', '1') !!}
                Sí
            </label>
        </div>
        <div class="radio">
            <label>
                {!! Form::radio('no_tiene', '0', true) !!}
                No
            </label>
        </div>
    </div>
</div>
<div class="col-xs-6">
    <h4>Se negó</h4>
    <div class="form-group">
        <div class="radio">
            <label>
                {!! Form::radio('se_nego', '1') !!}
                Sí
            </label>
        </div>
        <div class="radio">
            <label>
                {!! Form::radio('se_nego', '0', true) !!}
                No
            </label>
        </div>
    </div>
</div>
<hr/>

<div class="form-group">
    {!! Form::label('proveedor', 'Proveedor (alfanumérico)') !!}
    {!! Form::text('proveedor', null, ['class'=>'form-control input-lg']) !!}
</div>
<div class="form-group">
    {!! Form::label('factura', 'Factura (alfanumérico)') !!}
    {!! Form::text('factura', null, ['class'=>'form-control input-lg']) !!}
</div>
<div class="form-group">
    {!! Form::label('contratista', 'Contratista (alfanumérico)') !!}
    {!! Form::text('contratista', null, ['class'=>'form-control input-lg']) !!}
</div>
<div class="form-group">
    {!! Form::label('vsw_ont', 'Versión de SW ONT (alfanumérico)') !!}
    {!! Form::text('vsw_ont', null, ['class'=>'form-control input-lg']) !!}
</div>
<div class="form-group">
    {!! Form::label('velupload', 'Velocidad de subida (numérico)') !!}
    {!! Form::number('velupload', null, ['class'=>'form-control input-lg', "step" => "0.01"]) !!}
</div>

<div class="well clearfix">
    <div class="col-xs-12">
        <h4>Cerrar orden de trabajo</h4>
        <div class="form-group">
            <div class="radio">
                <label>
                    {!! Form::radio('reportstatus', '1') !!}
                    Sí
                </label>
            </div>
            <div class="radio">
                <label>
                    {!! Form::radio('reportstatus', '0') !!}
                    No
                </label>
            </div>
        </div>
    </div>
</div>