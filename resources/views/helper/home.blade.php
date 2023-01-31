@extends('../layouts.frontend')
@section('title','Helper')
@section('content')
    
   <main class="container">
  <h1>Helper</h1>
  <h2>{{Str::slug("hola buenas tardes")}}</h2>
  {{-- <h2>{{Helpers::getVersion()}}</h2> --}}
  {{-- <h3>{{$version}}</h3> --}}
  <h3>{{Helpers::getName("Wenceslao Espinosa")}}</h3>
</main>

@endsection