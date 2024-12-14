@extends('master')

@section('title')
    Editar Producto
@endsection

@section('content')

<h3 class="display-4 mb-4">Editar Producto</h3>

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Indicamos que es una petición PUT para actualizar -->

    <div class="row">
        <div class="col-xs-12 col-md-4">
            <div class="form-group">
                <label for="market" class="form-label">Mercado</label>
                @if($userMarket)
                    <!-- Si es un manager, el mercado está preseleccionado -->
                    <input type="text" value="{{ $userMarket->name }}" class="form-control" readonly>
                    <input type="hidden" name="market_id" value="{{ $userMarket->id }}">
                @else
                    <!-- Si no es manager, elige de todos los mercados -->
                    <select name="market_id" id="market_id" class="form-control" required>
                        <option value=""> -- Seleccione -- </option>
                        @foreach($markets as $market)
                            <option value="{{ $market->id }}" {{ $product->markets->contains($market->id) ? 'selected' : '' }}>
                                {{ $market->name }}
                            </option>
                        @endforeach
                    </select>
                @endif
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-xs-12 col-md-4">
            <div class="form-group">
                <label for="">Código de Barras</label>
                <input type="text" name="barcode" class="form-control" value="{{ $product->barcode }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-4">
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="form-group">
                <label for="">Unidad</label>
                <input type="text" name="unit" class="form-control" value="{{ $product->unit }}">
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="form-group">
                <label for="">Categoría</label>
                <select name="category_id" class="form-control">
                    <option value=""> -- Seleccione --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-4">
            <div class="form-group">
                <label for="">Precio</label>
                <div class="input-group">
                    <span class="input-group-addon">RD$</span>
                    <input type="text" name="price" class="form-control" value="{{ old('price', $product->price) }}" aria-label="Amount (to the nearest dollar)">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="form-group">
                <label for="">Está Disponible?</label>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="isAvailable" value="1" {{ $product->isAvailable ? 'checked' : '' }}>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-xs-12 col-md-4">
            <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Guardar Producto</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</form>

@endsection
