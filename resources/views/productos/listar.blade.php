@extends('base.base')

@section('title', 'Productos')
@section('page_title', 'Lista de Productos')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{ route('productos.crear') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Nuevo
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
                                        <th>Entidad</th>
                                        <th>Creado</th>
                                        <th>Modificado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($productos as $producto)
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
                                                            <a class="dropdown-item" href="{{ route('productos.editar', $producto->id) }}">
                                                                <i class="fas fa-edit me-2"></i>Editar
                                                            </a>
                                                        </li>
                                                        <li><hr class="dropdown-divider"></li>
                                                        <li>
                                                            <form method="POST" action="{{ route('productos.eliminar', $producto->id) }}" onsubmit="return confirm('¿Estás seguro que querés eliminar este producto?');">
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
                                                {{ $producto->id }}
                                            </td>
                                            <td>
                                                {{ $producto->nombre }}
                                            </td>
                                            <td>
                                                {{ $producto->descripcion ?? '-' }}
                                            </td>
                                            <td>
                                                <i class="fas fa-building fa-xl"></i>
                                                <span>{{ $producto->entidad->nombre }}</span>
                                            </td>
                                            <td>
                                                {{ $producto->created_at->format('Y/m/d H:i:s') }}
                                            </td>
                                            <td>
                                                {{ $producto->updated_at->format('Y/m/d H:i:s') }}
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
