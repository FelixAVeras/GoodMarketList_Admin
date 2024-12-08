@extends('master')

@section('title')
    Tipos de Mercados
@endsection

@section('content')

<h3 class="display-4 mb-4">Listado de Tipos de Mercados</h3>

<div class="row">
    <div class="col-xs-12 col-md-12">
        <a href="{{ route('market-types.create') }}" class="btn btn-primary pull-right">Agregar Nuevo</a>
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
            @forelse ($marketTypes as $mt)
            <tr>
                <td>{{ $mt->name }}</td>
                <td>
                    <a href="{{ route('market-types.edit', $mt->id) }}" data-toggle="tooltip" data-placement="top" title="Editar" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                    <form action="{{ route('market-types.destroy', $mt->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="2" class="text-center text-danger"><h3>Sin Informacion</h3></td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection