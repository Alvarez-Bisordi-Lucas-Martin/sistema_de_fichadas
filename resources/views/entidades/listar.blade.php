@extends('base.base')

@section('title', 'Entidades')
@section('page_title', 'Lista de Entidades')

@section('content')
    <h1>Lista de Entidades</h1>
    
    <ul>
        @foreach ($entidades as $entidad)
            <li>{{ $entidad->nombre }}</li>
        @endforeach
    </ul>
@endsection
