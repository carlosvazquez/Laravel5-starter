<div class="form-group">
    {!! Form::label('username', 'Usuario') !!}
    {!! Form::text('username', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('first_name', 'Nombre') !!}
    {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('last_name', 'Apellido') !!}
    {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('type', 'Tipo de usuario') !!}
    {!! Form::select('type', array('admin' => 'Administrador', 'contralor' => 'Contralor', 'supervisor' => 'Supervisor', 'tecnico' => 'Técnico'), 'tecnico', ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Correo electrónico') !!}
    {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'@']) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Contraseña') !!}
    {!! Form::password('password', ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('actived', 'Estado') !!}
    {!! Form::select('actived', array('1' => 'Activado', '0' => 'Desactivado'), '1', ['class'=>'form-control']) !!}
</div>