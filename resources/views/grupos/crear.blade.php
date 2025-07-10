@extends('base.base')

@section('title', 'Grupos')
@section('page_title', 'Nuevo Grupo')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('grupos.guardar') }}">
                            @csrf

                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <div class="d-flex align-items-center">
                                            <div class="alert-icon me-2">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </div>
                                            <div class="alert-message">
                                                {{ $error }}
                                            </div>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                                    </div>
                                @endforeach
                            @endif

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-3 mt-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="usuarios" class="form-label">Usuarios</label>
                                        <select id="usuarios" name="usuarios[]" class="form-select" placeholder="Seleccione uno o mas usuarios" multiple>
                                            @foreach ($usuarios as $usuario)
                                                <option value="{{ $usuario->id }}">{{ $usuario->email }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="permisos" class="form-label">Permisos</label>
                                        <select id="permisos" name="permisos[]" class="form-select" placeholder="Seleccione uno o mas permisos" multiple>
                                            @foreach ($permisos as $permiso)
                                                <option value="{{ $permiso->id }}">{{ $permiso->modelo }} | {{ $permiso->accion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-start gap-3 mt-3">
                                <a href="{{ route('grupos.listar') }}" class="btn btn-secondary">
                                    <i class="fa-solid fa-rotate-left me-2"></i>Volver
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-plus me-2"></i>Crear
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
