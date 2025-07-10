@extends('base.base')

@section('title', 'Fichadas')
@section('page_title', 'Lista de Fichadas')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <a href="#" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Nueva
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-ecom">
                                <thead>
                                    <tr>
                                        <th>Acciones</th>
                                        <th>ID</th>
                                        <th>Producto</th>
                                        <th>Fecha Hora</th>
                                        <th>Tipo</th>
                                        <th class="text-center">Imagen</th>
                                        <th>Creada</th>
                                        <th>Modificada</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($fichadas as $fichada)
                                        <tr>
                                            <td class="text-center" style="width: 100px;">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm dropdown-toggle"
                                                        data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                            <i class="fa-solid fa-gears"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-edit me-2"></i>Editar
                                                            </a>
                                                        </li>
                                                        <li><hr class="dropdown-divider"></li>
                                                        <li>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-trash me-2"></i>Eliminar
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            
                                            <td>
                                                {{ $fichada->id }}
                                            </td>
                                            <td>
                                                {{ $fichada->producto->nombre }}
                                            </td>
                                            <td>
                                                {{ $fichada->fecha_hora->format('Y/m/d H:i:s') }}
                                            </td>
                                            <td class="text-uppercase">
                                                {{ $fichada->tipo }}
                                            </td>
                                            <td class="text-center">
                                                @if ($fichada->imagen)
                                                    <img src="data:image/jpeg;base64,{{ base64_encode($fichada->imagen) }}" class="avatar-sm" alt="Imagen de la Fichada">
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                {{ $fichada->created_at->format('Y/m/d H:i:s') }}
                                            </td>
                                            <td>
                                                {{ $fichada->updated_at->format('Y/m/d H:i:s') }}
                                            </td>
                                        </tr>
                                    @empty
                                        @include('includes.lista_vacia', ['columnas' => 8])
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
