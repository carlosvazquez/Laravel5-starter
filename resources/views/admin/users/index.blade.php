@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2>Lista de empleados</h2>
            <table class="table table-striped table-bordered" style="width:100%;">
                <tr class="success">
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>email</th>
                    <th>Puesto</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($users as $user)
                <tr>
                    <td><strong>{{ $user->first_name }} {{ $user->last_name }}</strong></td>
                    <td><strong>{{ $user->username }}</strong></td>
                    <td>{{ $user->email }}</td>
                    <td>@if($user->type=='user') Técnico @elseif($user->type=='admin') Admin @elseif($user->type=='manager') Gerencia @endif</td>
                    <td>@if($user->actived==1) Activo @else Bloqueado @endif</td>
                    <td><a class="btn btn-defaul btn-warning" href="{{ route('admin.users.edit', $user) }}">Editar</a></td>
                </tr>
                @endforeach
            </table>
            {!! $users->render() !!}
        </div>
    </div>
</div>

@endsection