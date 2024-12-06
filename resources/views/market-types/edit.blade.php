@extends('master')

@section('content')
<div class="container mt-5">
    <h1>Editar Tipo de Mercado</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('market-types.update', $marketType->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $marketType->name }}">
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('market-types.index') }}" class="btn btn-default">Volver</a>
    </form>
</div>
@endsection
