@extends('base.base')

@section('title', 'Entidades')
@section('page_title', 'Lista de Entidades')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{ route('entidades.crear') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Nueva
                            </a>
                        </div>
                        
                        @include('includes.success_message')

                        <div class="table-responsive">
                            <table class="table custom-table">
                                <thead>
                                    <tr>
                                        <th>Acciones</th>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th class="text-center">Imagen</th>
                                        <th>Creada</th>
                                        <th>Modificada</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($entidades as $entidad)
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
                                                            <a class="dropdown-item" href="{{ route('entidades.editar', $entidad->id) }}">
                                                                <i class="fas fa-edit me-2"></i>Editar
                                                            </a>
                                                        </li>
                                                        <li><hr class="dropdown-divider"></li>
                                                        <li>
                                                            <form method="POST" action="{{ route('entidades.eliminar', $entidad->id) }}" onsubmit="return confirm('¿Estás seguro que querés eliminar esta entidad?');">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="dropdown-item">
                                                                    <i class="fas fa-trash me-2"></i>Eliminar
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            
                                            <td>
                                                {{ $entidad->id }}
                                            </td>
                                            <td>
                                                <i class="fa-solid fa-building fa-xl"></i>
                                                <span>{{ $entidad->nombre }}</span>
                                            </td>
                                            <td>
                                                {{ $entidad->descripcion ?? '-' }}
                                            </td>
                                            <td class="text-center">
                                                @if ($entidad->imagen)
                                                    <img src="data:image/jpeg;base64,{{ base64_encode($entidad->imagen) }}" class="imagen-entidad" alt="Imagen de la Entidad">
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                {{ $entidad->created_at->format('Y/m/d H:i:s') }}
                                            </td>
                                            <td>
                                                {{ $entidad->updated_at->format('Y/m/d H:i:s') }}
                                            </td>
                                        </tr>
                                    @empty
                                        @include('includes.lista_vacia', ['columnas' => 7])
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
