@extends('base.base')

@section('title', 'Inicio')
@section('page_title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="card chart shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="icon-wrapper me-3">
                            <i class="fas fa-users"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Usuarios</h6>
                            <h3 class="mb-0 fw-bold">{{ $usuarios }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6 col-md-3">
                <div class="card chart shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="icon-wrapper me-3">
                            <i class="fa-solid fa-users-viewfinder"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Usuarios Verificados</h6>
                            <h3 class="mb-0 fw-bold">{{ $usuarios_verified }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
