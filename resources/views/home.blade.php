<a href="{{route('template_inicio')}}">Regresar</a>
<hr>
<h1>hola desde mi vista .blade</h1>
<hr>
<h3>Texto = {{ $texto }} </h3> <!-- recibir valores desde un controlador -->
<hr>
<h3>Declarar variables</h3>

@php
    $contador = 1;
@endphp
<h4>{{ $contador }}</h4>
<hr>
<h3>Condicional 1</h3>
@if ($numero==13)
    <h3>Numero es 13</h3>
@else
    <h3>Número no es 13</h3>
@endif
<h3>Condicional 2</h3>
@switch($numero)
    @case(11)
        es 11
        @break
    @case(12)
        es 12
        @break
    @default
        no es ninguno
@endswitch
<h3>Condicional 3</h3>
<h4>{{ ($numero==12) ? 'es 12 desde ternario':'no es 12' }}</h4>
<hr>
<h3>Ciclo for</h3>
<ul>
@for ($i = 1; $i <= 10; $i++)
    <li>{{$i}}</li>
@endfor
</ul>
<hr>
<h3>Recorrer un arreglo</h3>
<ul>
    @foreach ($paises as $pais)
    <li>
        {{$loop->first}} - {{$loop->last}} - {{$loop->index}} - {{$pais['nombre'].' '.$pais['dominio']}}
    </li>
    @endforeach
</ul>
<hr>
@include('incluido')
<hr>
{{-- Mandar un valor al componente --}}
<x-componente :mensaje="$texto"/> 
<hr>
<h3>Enlaces</h3>
<ul>
    {{-- dirige al home controller la funcion hola --}}
    <li><a href="{{route('home_hola')}}">Hola inicio</a></li>
    {{-- link con parametros --}}
    <li><a href="{{route('home_parametros', ['id'=>1, 'slug'=>'mi-alug'])}}">Parámetro</a></li>
</ul>

<hr>
<h3>Archivos estáticos</h3>
<img src="{{asset('imagenes/imagen1.jpg')}}" />