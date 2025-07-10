@extends('base.base')

@section('title', 'Grupos')
@section('page_title', 'Lista de Grupos')

@section('content')
    <h1>Lista de Grupos</h1>
    
    <ul>
        @foreach ($grupos as $grupo)
            <li>{{ $grupo->nombre }}</li>
        @endforeach
    </ul>
@endsection
