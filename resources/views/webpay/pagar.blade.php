@extends('../layouts.frontend')
@section('title', 'Webpay')
@section('content')

    <main class="container">
        <h1>Webpay</h1>
        <x-flash />
        pagando.....
        {{-- {{$datos->url}} --}}
        <form action="{{ $datos->url }}" name="form" method="POST">
            <input type="hidden" name="token_ws" value="{{ $datos->token }}" />
        </form>

        {{-- Funcion para que se ejecute solo el submit --}}
        <script type="text/javascript">
            window.onload = function() {
                document.form.submit();
            };
        </script>
    </main>

@endsection
