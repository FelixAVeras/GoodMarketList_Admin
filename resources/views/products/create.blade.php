@extends('master')

@section('title')
    Nuevo Producto
@endsection

@section('content')

<h3 class="display-4 mb-4">Nuevo Producto</h3>

<form action="{{ route('products.store') }}" method="POST">
    @csrf <!-- Esto es necesario para proteger tu aplicación contra ataques CSRF -->
    <div class="row">
        <div class="col-xs-12 col-md-4">
        @if(isset($market))
            <!-- Usuario Manager: Mercado asociado -->
            <div class="form-group">
                <label for="market" class="form-label">Mercado</label>
                <input type="text" value="{{ $market->name }}" class="form-control" readonly>
                <input type="hidden" name="market_id" value="{{ $market->id }}">
            </div>
        @else
            <!-- Otros roles: Dropdown de todos los mercados -->
            <div class="form-group">
                <label for="market_id" class="form-label">Mercado</label>
                <select name="market_id" id="market_id" class="form-control" required>
                    <option value=""> -- Seleccione -- </option>
                    @foreach($markets as $market)
                        <option value="{{ $market->id }}">{{ $market->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-xs-12 col-md-4">
            <div class="form-group">
                <label for="">Codigo de Producto</label>
                <input type="text" name="product_code" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="form-group">
                <label for="">Codigo de Barras</label>
                <input type="text" name="barcode" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-4">
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" name="name" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="form-group">
                <label for="">Unidad</label>
                <input type="text" name="unit" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="form-group">
                <label for="">Categoria</label>
                <select name="category_id" class="form-control">
                    <option value=""> -- Seleccione --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
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
                    <span class="input-group-addon">$</span>
                    <input type="text" name="price" class="form-control" aria-label="Amount (to the nearest dollar)">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-4">
            <div class="form-group">
                <label for="">Esta Disponible?</label>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="isAvailable" value="1">
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