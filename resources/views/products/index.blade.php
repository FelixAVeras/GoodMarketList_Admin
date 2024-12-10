@extends('master')

@section('title')
    Productos
@endsection

@section('content')

<h3 class="display-4 mb-4">Listado de Productos</h3>


<div class="row">
    <div class="col-xs-12 col-md-12">
        <a href="{{ route('products.create') }}" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Agregar Nuevo</a>
    </div>
</div>

@if($products->isEmpty())
    <h3 class="text-center text-danger">Sin Informacion</h3>
@else
    <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <!-- <th>Imagen</th> -->
                        <th>Id Producto</th>
                        <th>Codigo de Barras</th>
                        <th>Nombre</th>
                        <th>Unidad</th>
                        <th>Categoria</th>
                        <th>Esta Diponible?</th>
                        <th>Precio Promedio</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->product_code }}</td>
                        <td>{{ $product->barcode }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->unit }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->isAvailable ? 'Sí' : 'No' }}</td>
                        <td>{{ $product->average_price }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" data-toggle="tooltip" data-placement="top" title="Detalles" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="{{ route('products.edit', $product->id) }}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
@endif

@endsection