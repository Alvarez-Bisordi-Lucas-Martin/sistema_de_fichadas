<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title', 'Inicio') | Sistema de Fichadas</title>

        <link rel="shortcut icon" href="{{ asset('images/favicons/ecom_favicon.ico') }}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

        <link rel="stylesheet" href="{{ asset('modules/select2/css/custom_select2.css') }}">

        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

        @yield('css_extras')
    </head>

    <body>
        @include('base.loading')
        @include('base.navbar_left')

        <main class="main-content">
            <div class="position-relative">
                <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
                    <div class="container-fluid navbar-inner">
                        <a href="{{ route('home') }}" class="navbar-brand">
                            <h4 class="logo-title">Fichadas</h4>
                        </a>
                        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                            <i class="icon">
                                <svg width="20px" height="20px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                                </svg>
                            </i>
                        </div>

                        <h4 class="title text-primary">@yield('page_title', 'Dashboard')</h4>

                        <button class="navbar-toggler" type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent"
                            aria-expanded="false"
                            aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon">
                                    <span class="navbar-toggler-bar bar1 mt-2"></span>
                                    <span class="navbar-toggler-bar bar2"></span>
                                    <span class="navbar-toggler-bar bar3"></span>
                                </span>
                        </button>

                        @include('base.navbar_top')
                    </div>
                </nav>
            </div>

            <div class="container-fluid content-inner mt-5 py-0">
                @yield('content')
            </div>
        </main>

        <script src="{{ asset('js/libs.min.js') }}"></script>
        <script src="{{ asset('js/setting.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

        <script src="{{ asset('modules/select2/js/inicializar_select2.js') }}"></script>

        @yield('js_extras')
    </body>
</html>
