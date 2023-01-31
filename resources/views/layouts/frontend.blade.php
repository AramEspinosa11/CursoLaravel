<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <link href="{{ asset('images/logo_rosa.png') }}" rel="icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title> Ejemplo 1 - @yield('title')</title>
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
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome-5-8/css/all.css') }}" />
    @stack('css')
</head>

<body>
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a class="blog-header-logo text-dark" href="{{ route('template_inicio') }}">
                        <img src="{{ asset('images/Laravel.png') }}" height="80" width="250" />
                    </a>
                </div>
                <div class="col-4 text-center">

                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    {{-- Condicion para validar que el usuario este logueado --}}
                    @if (Auth::check())
                        <a class="p-2 link-secondary" href="">Hola
                            {{ Auth::user()->name }}({{ @session('perfil') }})</a>
                        <a class="p-2 link-secondary" href="javascript:void(0);"
                            onclick="confirmaAlert('¿Realmente desea cerrar su sesión?',   '{{ route('acceso_salir') }}');">Salir</a>
                    @else
                        <a class="p-2 link-secondary" href="{{ route('acceso_registro') }}">Resgistro</a>
                        <a class="p-2 link-secondary" href="{{ route('acceso_login') }}">Login</a>
                    @endif

                </div>
            </div>
        </header>

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
