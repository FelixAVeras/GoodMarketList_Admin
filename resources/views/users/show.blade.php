@extends('master')

@section('title')
    Detalles del Usuario
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-body">
        <h2>{{ $user->name }} <small class="text-muted">Detalles del Usuario</small></h2>

        <ul class="list-group">
            <li class="list-group-item"><p><strong>Email:</strong> {{ $user->email }}</p></li>
            <li class="list-group-item"><p><strong>Mercado:</strong> {{ $user->market->name ?? 'No asignado' }}</p></li>
            <li class="list-group-item"><p><strong>Roles:</strong> 
                    @if($user->roles->isNotEmpty())
                        {{ $user->roles->pluck('name')->join(', ') }}
                    @else
                        Sin roles asignados
                    @endif
                </p>
            </li>
        </ul>

        <a href="{{ route('users.index') }}" class="btn btn-default mt-3"><i class="glyphicon glyphicon-chevron-left"></i> Volver</a>
    </div>
</div>
@endsection
