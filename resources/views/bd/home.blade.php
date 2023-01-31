@extends('../layouts.frontend')

@section('content')
<main class="container">
    <h1>BD MySql</h1>
     <x-flash />
    <ul>
     <li>
       <a href="{{route('bd_categorias')}}">Categorías</a>
       
     </li>
     <li>
       <a href="{{route('bd_productos')}}">Productos</a>
     </li>
     <li>
       <a href="{{route('bd_productos_paginacion')}}">Paginación</a>
     </li>
     
     <li>
       <a href="{{route('bd_productos_buscador')}}">Buscador interno</a>
     </li> 
     
    </ul>
   </main>
@endsection