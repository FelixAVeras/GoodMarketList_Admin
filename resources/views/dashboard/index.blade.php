@extends('master')

@section('title')
    Dashboard
@endsection

@section('content')

<h1 class="text-muted">Hola, {{ Auth::user()->name }} ({{ auth()->user()->getRoleNames()->first() }})</h1>

@if(auth()->user()->hasRole('admin'))
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>Total de Mercados: <strong>{{ $totalMarkets }}</strong></h2>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>Total de Productos: <strong>{{ $totalProducts }}</strong></h2>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-xs-12 col-md-6">
            <h3>Ultimos Productos</h3>

            <div class="table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Establecimiento</th>
                            <th>Fecha</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latestProducts as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->created_at->format('Y-m-d') }}</td>
                            <td>
                                @foreach($product->markets as $market)
                                    {{ $market->name }}<br>
                                @endforeach
                            </td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <h3>Ultimo Mercado Registrado</h3>
            @if ($lastMarket)
                <div class="alert alert-info">
                    <h4><a href="{{ route('markets.show', $lastMarket->id) }}"><strong>{{ $lastMarket->name }}</strong></a> (Registrado en: {{ $lastMarket->created_at->format('Y-m-d') }})</h4>
                </div>
            @else
                <p>No markets have been added yet.</p>
            @endif
        </div>
    </div>
@elseif(auth()->user()->hasRole('manager'))
    <h3>Eres un manager.</h3>
    <br>

    
@endif


@endsection