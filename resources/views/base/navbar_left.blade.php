<aside class="sidebar sidebar-default navs-shape">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="{{ route('home') }}" class="navbar-brand d-flex justify-content-center align-items-center">
            <img src="{{ asset('images/logos/fichadas_logo.svg') }}" class="sidebar-color-logo" alt="Logo">
            <h4 class="logo-title m-0">Fichadas</h4>
        </a>

        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
        </div>
    </div>

    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="collapse navbar-collapse" id="sidebar-parent">
            <ul class="navbar-nav iq-main-menu py-4">
                <li class="nav-item">
                    <a class="nav-link{{ (isset($sidebar_active) && $sidebar_active === 'home') ? ' active' : '' }}" aria-current="page" href="{{ route('home') }}">
                        <i class="fa-solid fa-gauge"></i>
                        <span class="item-name">Dashboard</span>
                    </a>
                </li>

                <li>
                    <hr class="hr-horizontal">
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link{{ (isset($sidebar_active) && $sidebar_active === 'usuarios') ? ' active' : '' }}" href="{{ route('usuarios.listar') }}" aria-current="page">
                        <i class="fa-solid fa-user-alt"></i>
                        <span class="item-name">Usuarios</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ (isset($sidebar_active) && $sidebar_active === 'groups') ? ' active' : '' }}" href="{{ route('groups.listar') }}" aria-current="page">
                        <i class="fa-solid fa-user-group"></i>
                        <span class="item-name">Grupos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ (isset($sidebar_active) && $sidebar_active === 'entidades') ? ' active' : '' }}" href="{{ route('entidades.listar') }}" aria-current="page">
                        <i class="fa-solid fa-building"></i>
                        <span class="item-name">Entidades</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ (isset($sidebar_active) && $sidebar_active === 'productos') ? ' active' : '' }}" href="{{ route('productos.listar') }}" aria-current="page">
                        <i class="fa-solid fa-box"></i>
                        <span class="item-name">Productos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ (isset($sidebar_active) && $sidebar_active === 'fichadas') ? ' active' : '' }}" href="{{ route('fichadas.listar') }}" aria-current="page">
                        <i class="fa-solid fa-clock"></i>
                        <span class="item-name">Fichadas</span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</aside>
