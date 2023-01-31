@extends('../layouts.frontend')
@section('content')
    <main class="container">
        <h1>Paypal</h1>
        <x-flash />
        <ul>
            <li><strong>Producto</strong>: Escritorio</li>
            <li><strong>Valor</strong>: USD100</li>
            <li><strong>Cantidad</strong>: 1</li>
            <li><strong>Orden de compra</strong>: {{ 'order_' . $orden->id }}</li>
        </ul>
        <a class="btn btn-warning" href="{{ $response->json()['links'][1]['href'] }}"><i class="fab fa-paypal"></i> Pagar</a>
    </main>
@endsection
