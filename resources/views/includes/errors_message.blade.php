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
