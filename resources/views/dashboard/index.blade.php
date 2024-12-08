@extends('master')

@section('title')
    Dashboard
@endsection

@section('content')

<h2>Hola, {{ Auth::user()->name }} ({{ auth()->user()->getRoleNames()->first() }})</h2>

@if(auth()->user()->hasRole('admin'))
    <h3>Eres un administrador.</h3>
@elseif(auth()->user()->hasRole('manager'))
    <h3>Eres un manager.</h3>
@endif

@endsection