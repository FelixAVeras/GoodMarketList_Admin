@extends('master')

@section('title')
    Editar Usuario
@endsection

@section('content')
<div class="container mt-5">
    <h1>Editar Usuario</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="market_id">Mercado</label>
                    <select name="market_id" id="market_id" class="form-control">
                        <option value="">Sin asignar</option>
                        @foreach($markets as $market)
                            <option value="{{ $market->id }}" {{ $user->market_id == $market->id ? 'selected' : '' }}>
                                {{ $market->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Contraseña (Opcional)</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Dejar en blanco para no cambiar">
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password_confirmation">Confirmar Contraseña</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-3">Guardar Cambios</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection
