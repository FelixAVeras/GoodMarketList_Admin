@extends('master')

@section('title', 'Detalles del Mercado')

@section('content')

<h2 class="display-4 mb-4">{{ $market->name }} <small class="text-muted">Detalles del Mercado</small></h2>

<div class="row">
    <div class="col-xs-12 col-md-4">
        <p>Tipo de Mercado: <strong>{{ $market->marketType->name }}</strong></p>
    </div>
    <div class="col-xs-12 col-md-8">
        <div class="pull-right">
            <a href="{{ route('markets.index') }}" class="btn btn-default">Volver</a>
            <a href="{{ route('markets.edit', $market->id) }}" class="btn btn-warning">Editar Mercado</a>
            <form action="{{ route('markets.destroy', $market->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar Mercado</button>
            </form>
        </div>
    </div>
</div>

<hr>

<div>

  <!-- Nav tabs -->
  <ul class="nav nav-pills" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Productos</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Ofertas</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Promociones</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Ubicaciones</a></li>
  </ul>

  <br>
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="home">
    @if($market->products->isEmpty())
        <p class="text-danger">No hay productos asociados a este mercado.</p>
    @else
        <div class="row">
            @foreach($market->products as $product)
                <div class="col-xs-12 col-md-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="{{ $product->image_url }}" class="img-rounded img-responsive" alt="imagen del producto {{ $product->name }}">
                            <br>
                            <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                            <p><strong>RD$ {{ $product->average_price }}</strong></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    </div>
    <div role="tabpanel" class="tab-pane fade" id="profile">
        <p class="text-danger">No hay ofertas asociados a este mercado.</p>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="messages">
    <p class="text-danger">No hay promociones asociados a este mercado.</p>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="settings">
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <div class="list-group">
                    @foreach($market->cities as $city)
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">{{ $city->name }}</h4>
                            <p class="list-group-item-text">...</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
  </div>

</div>

<script>
    $('#myTabs a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    })
</script>
@endsection
