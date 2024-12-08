@extends('master')

@section('content')
<h3 class="display-4 mb-4">Usuarios</h3>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <a href="{{ route('roles.index') }}" class="btn btn-default"><i class="glyphicon glyphicon-lock"></i> Roles y Permisos</a>
    </div>
    <div class="col-xs-12 col-md-6">
        <a href="{{ route('users.create') }}" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Agregar Nuevo</a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<br>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
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
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                        <label class="badge bg-success">{{ $v }}</label>
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
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>
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
