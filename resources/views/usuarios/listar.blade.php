@extends('base.base')

@section('title', 'Usuarios')
@section('page_title', 'Lista de Usuarios')

@section('content')
    <h1>Lista de Usuarios</h1>
    
    <ul>
        @foreach ($usuarios as $usuario)
            <li>{{ $usuario->name }}</li>
        @endforeach
    </ul>
@endsection
