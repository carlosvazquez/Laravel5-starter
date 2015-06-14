{!! Form::hidden('id', $id, ['class'=>'form-control']) !!}
<h2>Motivos de cancelación</h2>

<div class="col-xs-6">
    <h4>Domicilio estaba cerrado</h4>
    <div class="form-group">
        <div class="radio">
            <label>
                {!! Form::radio('cerrado', '1') !!}
                Sí
            </label>
        </div>
        <div class="radio">
            <label>
                {!! Form::radio('cerrado', '0', true) !!}
                No
            </label>
        </div>
    </div>
</div>
<div class="col-xs-6">
    <h4>Reag.</h4>
    <div class="form-group">
        <div class="radio">
            <label>
                {!! Form::radio('reag', '1') !!}
                Sí
            </label>
        </div>
        <div class="radio">
            <label>
                {!! Form::radio('reag', '0', true) !!}
                No
            </label>
        </div>
    </div>
</div>
<hr/>
<div class="col-xs-6">
    <h4>Mal DTO.</h4>
    <div class="form-group">
        <div class="radio">
            <label>
                {!! Form::radio('mal_dto', '1') !!}
                Sí
            </label>
        </div>
        <div class="radio">
            <label>
                {!! Form::radio('mal_dto', '0', true) !!}
                No
            </label>
        </div>
    </div>
</div>
<div class="col-xs-6">
    <h4>Subt.</h4>
    <div class="form-group">
        <div class="radio">
            <label>
                {!! Form::radio('subt', '1') !!}
                Sí
            </label>
        </div>
        <div class="radio">
            <label>
                {!! Form::radio('subt', '0', true) !!}
                No
            </label>
        </div>
    </div>
</div>
<hr/>
<div class="col-xs-6">
    <h4>Ducto Int.</h4>
    <div class="form-group">
        <div class="radio">
            <label>
                {!! Form::radio('ducto_in', '1') !!}
                Sí
            </label>
        </div>
        <div class="radio">
            <label>
                {!! Form::radio('ducto_in', '0', true) !!}
                No
            </label>
        </div>
    </div>
</div>
<div class="col-xs-6">
    <h4>OS Cancelada</h4>
    <div class="form-group">
        <div class="radio">
            <label>
                {!! Form::radio('cancelado', '1') !!}
                Sí
            </label>
        </div>
        <div class="radio">
            <label>
                {!! Form::radio('cancelado', '0', true) !!}
                No
            </label>
        </div>
    </div>
</div>
<hr/>
<div class="col-xs-6">
    <h4>Etapa No 75</h4>
    <div class="form-group">
        <div class="radio">
            <label>
                {!! Form::radio('etpno75', '1') !!}
                Sí
            </label>
        </div>
        <div class="radio">
            <label>
                {!! Form::radio('etpno75', '0', true) !!}
                No
            </label>
        </div>
    </div>
</div>
<div class="col-xs-6">
    <h4>No hay señal</h4>
    <div class="form-group">
        <div class="radio">
            <label>
                {!! Form::radio('sin_senal', '1') !!}
                Sí
            </label>
        </div>
        <div class="radio">
            <label>
                {!! Form::radio('sin_senal', '0', true) !!}
                No
            </label>
        </div>
    </div>
</div>
<hr/>
<div class="col-xs-6">
    <h4>Falta tiempo</h4>
    <div class="form-group">
        <div class="radio">
            <label>
                {!! Form::radio('ftiempo', '1') !!}
                Sí
            </label>
        </div>
        <div class="radio">
            <label>
                {!! Form::radio('ftiempo', '0', true) !!}
                No
            </label>
        </div>
    </div>
</div>
<div class="col-xs-6">
    <h4>Ya instalada</h4>
    <div class="form-group">
        <div class="radio">
            <label>
                {!! Form::radio('yainstalada', '1') !!}
                Sí
            </label>
        </div>
        <div class="radio">
            <label>
                {!! Form::radio('yainstalada', '0', true) !!}
                No
            </label>
        </div>
    </div>
</div>
<hr/>
<div class="col-xs-12">
    <h4>Falla ONT</h4>
    <div class="form-group">
        <div class="radio">
            <label>
                {!! Form::radio('falla_ont', '1') !!}
                Sí
            </label>
        </div>
        <div class="radio">
            <label>
                {!! Form::radio('falla_ont', '0', true) !!}
                No
            </label>
        </div>
    </div>
</div>
<hr/>
<div class="col-xs-12">
    <h4>Comentarios</h4>
    <div class="form-group">
        {!! Form::label('comentarios', 'Comentarios') !!}
        {!! Form::text('comentarios', null, ['class'=>'form-control input-lg']) !!}
    </div>
</div>