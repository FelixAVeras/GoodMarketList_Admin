@extends('master')

@section('title')
    Mercados
@endsection

@section('content')

<h3 class="display-4 mb-4">Mercados</h3>

<div class="row">
    <div class="col-xs-12 col-md-12">
        <a href="{{ route('markets.create') }}" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Agregar Nuevo</a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo de Mercado</th>
                <th>Ciudad</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($markets as $market)
            <tr>
                <td>{{ $market->name }}</td>
                <td>{{ $market->marketType->name }}</td>
                <td>{{ $market->city->name }}</td>
                <td>
                   <div class="btn-group" role="group">
                        <a href="#" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('markets.edit', $market->id) }}" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></a>
                        <form action="{{ route('markets.destroy', $market->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                        </form>
                    </div>
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