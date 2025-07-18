@extends('base.base')

@section('title', 'Usuarios')
@section('page_title', 'Editar Usuario')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('usuarios.actualizar', $usuario->id) }}">
                            @csrf
                            @method('PUT')

                            @include('includes.errors_message')

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $usuario->name) }}" autocomplete="new-password" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">Correo</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $usuario->email) }}" autocomplete="new-password" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="password" class="form-label">Contraseña</label>
                                        <input type="password" id="password" name="password" class="form-control" autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="email_verified_at" class="form-label">Verificado</label>
                                        <input type="datetime-local" id="email_verified_at" name="email_verified_at" class="form-control" value="{{ old('email_verified_at', $usuario->email_verified_at?->format('Y-m-d\TH:i')) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-start gap-3 mt-3">
                                <a href="{{ route('usuarios.listar') }}" class="btn btn-secondary">
                                    <i class="fa-solid fa-rotate-left me-2"></i>Volver
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-cloud-arrow-up me-2"></i>Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
