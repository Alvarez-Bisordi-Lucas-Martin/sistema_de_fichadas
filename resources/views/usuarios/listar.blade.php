@extends('base.base')

@section('title', 'Usuarios')
@section('page_title', 'Lista de Usuarios')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{ route('usuarios.crear') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i>Nuevo
                            </a>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <div class="d-flex align-items-center">
                                    <div class="alert-icon me-2">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="alert-message">
                                        {{ session('success') }}
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-ecom">
                                <thead>
                                    <tr>
                                        <th>Acciones</th>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th class="text-center">Verificado</th>
                                        <th>Creado</th>
                                        <th>Modificado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($usuarios as $usuario)
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
                                                            <a class="dropdown-item" href="{{ route('usuarios.editar', $usuario->id) }}">
                                                                <i class="fas fa-edit me-2"></i>Editar
                                                            </a>
                                                        </li>
                                                        <li><hr class="dropdown-divider"></li>
                                                        <li>
                                                            <form method="POST" action="{{ route('usuarios.eliminar', $usuario->id) }}" onsubmit="return confirm('¿Estás seguro que querés eliminar este usuario?');">
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
                                                {{ $usuario->id }}
                                            </td>
                                            <td>
                                                {{ $usuario->name }}
                                            </td>
                                            <td>
                                                {{ $usuario->email }}
                                            </td>
                                            <td class="text-center">
                                                @include('includes.tools.status', ['status' => $usuario->email_verified_at])
                                            </td>
                                            <td>
                                                {{ $usuario->created_at->format('Y/m/d H:i:s') }}
                                            </td>
                                            <td>
                                                {{ $usuario->updated_at->format('Y/m/d H:i:s') }}
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
