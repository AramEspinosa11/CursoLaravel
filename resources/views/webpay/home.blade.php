@extends('../layouts.frontend')
@section('title','Webpay')
@section('content')
    
   <main class="container">
 <h1>Webpay</h1>
  <x-flash />
  <ul>
    <li><strong>Producto</strong>: Mesa de computador</li>
    <li><strong>Valor</strong>: $10.000</li>
    <li><strong>Cantidad</strong>: 1</li>
    <li><strong>Orden de compra</strong>: 34324</li>
</ul>
<a href="{{route('webpay_pagar')}}">Pagar</a>
</main>

@endsection