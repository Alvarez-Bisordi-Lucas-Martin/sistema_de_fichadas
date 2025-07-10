@extends('base.base')

@section('title', 'Productos')
@section('page_title', 'Nuevo Producto')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('productos.guardar') }}">
                            @csrf

                            @include('includes.errors_message')

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="descripcion" class="form-label">Descripción</label>
                                        <textarea id="descripcion" name="descripcion" class="form-control" rows="2"></textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="entidad_id" class="form-label">Entidad</label>
                                        <select id="entidad_id" name="entidad_id" class="form-control" required>
                                            <option value="" disabled selected>Seleccione una entidad</option>
                                            @foreach ($entidades as $entidad)
                                                <option value="{{ $entidad->id }}">{{ $entidad->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-start gap-3 mt-3">
                                <a href="{{ route('productos.listar') }}" class="btn btn-secondary">
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
