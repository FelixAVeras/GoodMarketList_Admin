@extends('master')

@section('title')
Tipo de Mercado
@endsection

@section('content')
<div class="container mt-5">
    <h1>Crear Tipo de Mercado</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-xs-12 col-md-4">
            <form action="{{ route('market-types.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <br><br>
                <a href="{{ route('market-types.index') }}" class="btn btn-default">Volver</a>
            </form>
        </div>
    </div>

</div>
@endsection
