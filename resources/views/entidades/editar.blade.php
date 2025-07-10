@extends('base.base')

@section('title', 'Entidades')
@section('page_title', 'Editar Entidad')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('entidades.actualizar', $entidad->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @include('includes.errors_message')

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $entidad->nombre) }}" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="descripcion" class="form-label">Descripción</label>
                                        <textarea id="descripcion" name="descripcion" class="form-control" rows="2">{{ old('descripcion', $entidad->descripcion) }}</textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="imagen" class="form-label">Imagen</label>
                                        <input type="file" id="imagen" name="imagen" class="form-control" accept="image/*">
                                    </div>
                                </div>

                                @if ($entidad->imagen)
                                    <div class="col-12">
                                        <div class="form-group mb-3">
                                            <label for="imagen-actual" class="form-label">Imagen Actual:</label><br>
                                            <img src="data:image/jpeg;base64,{{ base64_encode($entidad->imagen) }}" id="imagen-actual" class="imagen-actual" alt="Imagen Actual de la Entidad">
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="d-flex justify-content-start gap-3 mt-3">
                                <a href="{{ route('entidades.listar') }}" class="btn btn-secondary">
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
