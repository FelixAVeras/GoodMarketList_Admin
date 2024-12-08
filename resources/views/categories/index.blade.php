@extends('master')

@section('title')
    Categorias
@endsection

@section('content')

<h3 class="display-4 mb-4">Listado de Categorias</h3>

<div class="row">
    <div class="col-xs-12 col-md-12">
        <a href="{{ route('categories.create') }}" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Agregar Nuevo</a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $cat)
            <tr>
                <td>{{ $cat->name }}</td>
                <td>
                    <a href="{{ route('categories.edit', $cat->id) }}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                    <form action="{{ route('categories.destroy', $cat->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center text-danger"><h3>Sin Informacion</h3></td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection