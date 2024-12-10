@extends('master')

@section('content')
    <h2>{{ $product->name }} <small class="text-muted">Detalles del Producto</small></h2>

    <div class="row">
        <div class="col-xs-12 col-md-12">
            <div class="pull-right">
                <a href="{{ route('products.index') }}" class="btn btn-default">Volver a la Lista</a>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Eliminar">
                        <i class="glyphicon glyphicon-trash"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-4">
            <h3>Datos del Producto</h3>
            <ul class="list-group">
                <li class="list-group-item"><strong>ID del Producto:</strong> {{ $product->id }}</li>
                <li class="list-group-item"><strong>Código de Barras:</strong> {{ $product->barcode }}</li>
                <li class="list-group-item"><strong>Unidad:</strong> {{ $product->unit }}</li>
                <li class="list-group-item"><strong>Precio Promedio:</strong> ${{ $product->average_price }}</li>
                <li class="list-group-item"><strong>Disponible:</strong> 
                    <span class="badge {{ $product->isAvailable ? 'bg-success' : 'bg-danger' }}">
                        {{ $product->isAvailable ? 'Sí' : 'No' }}
                    </span>
                </li>
                <li class="list-group-item"><strong>Categoría:</strong> {{ $product->category->name }}</li>
                @if ($product->image_url)
                <li class="list-group-item">
                    <strong>Imagen:</strong>
                    <br>
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-fluid" style="max-width: 200px;">
                </li>
                @endif
            </ul>
        </div>
        <div class="col-xs-12 col-md-8">
            <h3><strong>Mercados Asociados:</strong></h3>
            <div class="list-group">
                @foreach ($product->markets as $market)
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">{{ $market->name }}</h4>
                        <p class="list-group-item-text">{{ $market->id }} (Aqui va el precio por mercado)</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
