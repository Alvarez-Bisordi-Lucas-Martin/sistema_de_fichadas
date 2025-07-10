@extends('base.base')

@section('title', 'Fichadas')
@section('page_title', 'Lista de Fichadas')

@section('content')
    <h1>Lista de Fichadas</h1>
    
    <ul>
        @foreach ($fichadas as $fichada)
            <li>{{ $fichada->id }} - {{ $fichada->fecha_hora }}</li>
        @endforeach
    </ul>
@endsection
