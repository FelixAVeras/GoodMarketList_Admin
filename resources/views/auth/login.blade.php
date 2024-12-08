@extends('master')

@section('title')
Inicio de Sesion
@endsection

@section('content')
<br>
<br>
<div class="row">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2 class="text-center">GoodMarket List Admin v1</h2>
                <h3 class="text-center text-muted">Inicio de Sesion</h3>
                <br>
                <form action="{{ route('login') }}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="">Correo Electronico</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Contraseña</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
                        </div>
                        <div class="col-xs-12 col-md-8">
                            <button type="submit" class="btn btn-default pull-right">Registrar Usuario</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <a href="#">Olvido su Contraseña?</a>
    </div>
</div>

@endsection
