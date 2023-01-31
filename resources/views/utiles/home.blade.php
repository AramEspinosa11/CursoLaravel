@extends('../layouts.frontend')
@section('content')
    <main class="container">
        <h1>Útiles</h1>
        <x-flash />
        <ul>
            <li>
                <a href="{{ route('utiles_pdf') }}">Reporte PDF</a>

            </li>
            <li>
                <a href="{{ route('utiles_excel') }}">Reporte Excel</a>
            </li>
            <li>
                <a href="{{ route('utiles_cliente_rest') }}">Cliente Rest con guzzlehttp</a>
            </li>
            <li>
                <a href="{{ route('utiles_cliente_soap') }}">Cliente SOAP</a>
            </li>

        </ul>
    </main>
@endsection
