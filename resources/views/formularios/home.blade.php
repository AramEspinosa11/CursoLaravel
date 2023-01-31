@extends('../layouts.frontend')
@section('title','Formularios')
@section('content')
    
   <main class="container">

   <h1 class="text-center display-5">Formularios</h1>

    <ul class="list-group">
      <li class="list-group-item">
        <a href="{{route('formularios_simple')}}">Simple</a>
      </li>
      <li class="list-group-item">
        <a href="{{route('formularios_flash')}}">Flash</a>
      </li> 
       <li class="list-group-item">
        <a href="{{route('formularios_upload')}}">Upload</a>
      </li>
    </ul>
</main>

@endsection