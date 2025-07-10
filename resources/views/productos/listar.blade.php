@extends('base.base')

@section('title', 'Productos')
@section('page_title', 'Lista de Productos')

@section('content')
    <h1>Lista de Productos</h1>
    
    <ul>
        @foreach ($productos as $producto)
            <li>{{ $producto->nombre }}</li>
        @endforeach
    </ul>
@endsection
