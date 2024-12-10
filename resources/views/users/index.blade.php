@extends('master')

@section('title')
Usuarios
@endsection

@section('content')
<h3 class="display-4 mb-4">Listado de Usuarios</h3>

<div class="row">
    <div class="col-xs-12 col-md-4">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Buscar Usuario...">
            <span class="input-group-btn">
                <button class="btn btn-primary" type="button"><i class="glyphicon glyphicon-search"></i></button>
            </span>
        </div>
    </div>
    <div class="col-xs-12 col-md-8">
        <div class="pull-right">
            <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Agregar Nuevo</a>
            <a href="{{ route('roles.index') }}" class="btn btn-default"><i class="glyphicon glyphicon-lock"></i> Roles y Permisos</a>
        </div>
    </div>
</div>

<br>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<br>

<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Rol</th>
                <th>Email</th>
                <th>Mercado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $role)
                            @if($role == 'admin')
                                <label class="label label-success">Administrador</label>
                            @elseif($role == 'manager')
                                <label class="label label-info">Gerente</label>
                            @elseif($role == 'provider')
                                <label class="label label-warning">Proveedor</label>
                            @else
                                <label class="label label-default">{{ $role }}</label>
                            @endif
                        @endforeach
                    @endif
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>
                    @if ($user->market)
                        {{ $user->market->name }}
                    @else
                        <span class="text-danger">No asignado</span>
                    @endif
                    </td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}" data-toggle="tooltip" data-placement="top" title="Detalles" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('users.edit', $user->id) }}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-danger"><h3>Sin Informacion</h3></td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
