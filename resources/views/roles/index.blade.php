@extends('master')

@section('title')
Usuarios - Roles y Permisos
@endsection

@section('content')

<h3 class="display-4 mb-4">Roles y Permisos de Usuarios</h3>

<br>

<div class="row">
    <div class="col-xs-12 col-md-12">
        <a href="{{ route('roles.create') }}" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Agregar Nuevo</a>
    </div>
</div>

<br>

<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Rol</th>
                <th>Permisos</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>
@endsection