@extends('base.base')

@section('title', 'Usuarios')
@section('page_title', 'Nuevo Usuario')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('usuarios.guardar') }}">
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
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input type="text" id="name" name="name" class="form-control" autocomplete="new-password" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">Correo</label>
                                        <input type="email" id="email" name="email" class="form-control" autocomplete="new-password" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="password" class="form-label">Contraseña</label>
                                        <input type="password" id="password" name="password" class="form-control" autocomplete="new-password" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="email_verified_at" class="form-label">Verificado</label>
                                        <input type="datetime-local" id="email_verified_at" name="email_verified_at" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-start gap-3 mt-3">
                                <a href="{{ route('usuarios.listar') }}" class="btn btn-secondary">
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
