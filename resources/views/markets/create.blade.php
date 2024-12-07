@extends('master')

@section('title')
Mercado
@endsection

@section('content')
<div class="container mt-5">
    <h1>Crear Mercado</h1>

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
        <div class="col-xs-12 col-md-12">
            <form action="{{ route('markets.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="name" class="form-label">Tipo de Mercado</label>
                            <select name="market_type_id" id="market_type_id" class="form-control">
                                <option value=""> -- Seleccione -- </option>
                                @foreach($marketTypes as $marketType)
                                    <option value="{{ $marketType->id }}">{{ $marketType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="city_ids" class="form-label">Ciudad(es)</label>
                            <select id="city_ids" name="city_ids[]" class="form-control" multiple>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}"
                                        {{ isset($market) && $market->cities->contains($city->id) ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Mantén presionado Ctrl o Cmd para seleccionar múltiples ciudades.</small>
                        </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <br><br>
                <a href="{{ route('markets.index') }}" class="btn btn-default">Volver</a>
            </form>
        </div>
    </div>

</div>
@endsection
