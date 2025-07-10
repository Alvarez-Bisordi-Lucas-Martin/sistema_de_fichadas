@extends('base.base')

@section('title', 'Fichadas')
@section('page_title', 'Nueva Fichada')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('fichadas.guardar') }}" enctype="multipart/form-data">
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
                                        <label for="fecha_hora" class="form-label">Fecha y Hora</label>
                                        <input type="datetime-local" id="fecha_hora" name="fecha_hora" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="tipo" class="form-label">Tipo</label>
                                        <select id="tipo" name="tipo" class="form-select" required>
                                            <option value="" disabled selected>Seleccione un tipo</option>
                                            <option value="entrada">Entrada</option>
                                            <option value="salida">Salida</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="imagen" class="form-label">Imagen</label>
                                        <input type="file" id="imagen" name="imagen" class="form-control" accept="image/*">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="producto_id" class="form-label">Producto</label>
                                        <select id="producto_id" name="producto_id" class="form-select" required>
                                            <option value="" disabled selected>Seleccione un producto</option>
                                            @foreach ($productos as $producto)
                                                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-start gap-3 mt-3">
                                <a href="{{ route('fichadas.listar') }}" class="btn btn-secondary">
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
