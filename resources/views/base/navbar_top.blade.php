<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto navbar-list mb-2 mb-lg-0 align-items-center">
        <li class="nav-item dropdown">
            <a class="nav-link py-0 d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('images/defaults/logo.png') }}" alt="User-Profile" class="img-fluid avatar avatar-50 avatar-rounded">
                <div class="caption ms-3 d-none d-md-block">
                    <h6 class="mb-0 caption-title">{{ auth()->user()->username ?? 'Invitado' }}</h6>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li>
                    <form method="POST" action="" style="display: inline;">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Cerrar sesión
                        </button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</div>
