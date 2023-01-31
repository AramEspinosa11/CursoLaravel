<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <link href="{{ asset('images/logo_rosa.png') }}" rel="icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title> Ejemplo 1 @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap"
        rel="stylesheet" />
    <link href="{{ asset('css/blog.css') }}?id={{ csrf_token() }}" rel="stylesheet" />
    <link href="{{ asset('css/jquery.alerts.min.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome-5-8/css/all.css') }}" />
    @stack('css')
</head>

<body>
    <header>
        <nav class="navbar bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('template_inicio') }}">
                    <img src="{{ asset('images/Laravel.png') }}" height="70" width="250" />
                </a>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    {{-- Condicion para validar que el usuario este logueado --}}
                    @if (Auth::check())
                        <a class="p-2 link-light fw-bold text-decoration-none me-md-2" href="">Hola
                            {{ Auth::user()->name }} ({{ @session('perfil') }})</a>
                        <a class="btn btn-primary" href="javascript:void(0);"
                            onclick="confirmaAlert('¿Realmente desea cerrar su sesión?',   '{{ route('acceso_salir') }}');">Salir</a>
                    @else
                        <a class="btn btn-secondary me-md-2" href="{{ route('acceso_registro') }}">Resgistro</a>
                        <a class="btn btn-secondary" href="{{ route('acceso_login') }}">Login</a>
                    @endif
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 link-secondary" href="{{ route('home_inicio') }}">Home</a>
                <a class="p-2 link-secondary" href="{{ route('template_inicio') }}">Template</a>
                <a class="p-2 link-secondary" href="{{ route('formularios_inicio') }}">Formularios</a>
                <a class="p-2 link-secondary" href="{{ route('helper_inicio') }}">Helper</a>
                <a class="p-2 link-secondary" href="{{ route('email_inicio') }}">E-Mail</a>
                <a class="p-2 link-secondary" href="{{ route('bd_inicio') }}">BD</a>
                <a class="p-2 link-secondary" href="{{ route('utiles_inicio') }}">Utiles</a>

                @if (@session('perfil_id') == 2)
                    <a class="p-2 link-secondary" href="{{ route('protegida_otra') }}">Vista Usuarios </a>
                @endif
                @if (@session('perfil_id') == 1)
                    <a class="p-2 link-secondary" href="{{ route('protegida_inicio') }}">Vista Administrador </a>
                @endif
                {{-- <a class="p-2 link-secondary" href="{{route('webpay_inicio')}}">Webpay</a>
                 --}}
                <a class="p-2 link-secondary" href="{{ route('paypal_inicio') }}">Paypal</a>
            </nav>
        </div>
    </div>

    <!--contenido-->
    @yield('content')
    <!--/contenido-->

    <footer class="blog-footer">
        <p>&copy; Todos los derechos reservados | Desarrollado por <a href="#" title="Aram"
                target="_blank">Aram</a>
        </p>
    </footer>

    <script src="{{ asset('js/jquery-2.0.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery.alerts.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/funciones.js') }}?id={{ csrf_token() }}"></script>
    @stack('js')
</body>


</html>
