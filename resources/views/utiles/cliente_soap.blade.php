@extends('../layouts.frontend')
@section('content')
    <main class="container">
        <h1>Cliente SOAP</h1>
        <x-flash />
        <h2>Respuesta: <strong>{{ $datos }}</strong></h2>

    </main>
@endsection
