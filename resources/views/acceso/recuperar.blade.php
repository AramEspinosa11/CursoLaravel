@extends('../layouts.frontend')
@section('content')
    <main class="container">

        <x-flash />
        <div class="card mb-3">
        
        <form action="{{ route('acceso_recuperar_post') }}" method="POST" class="px-4 py-3">
            {{ csrf_field() }}
            <div class="card-header text-center card-title">
                <strong>Recuperar cuenta</strong>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Por favor escribe tu Email, te enviaremos un link para poder recuperar tu cuenta.</label>
                <input type="text" name="correo" id="correo" class="form-control" value="{{ old('correo') }}" />
            </div>
            <hr>
            <input type="submit" value="Enviar" class="btn btn-primary" />
        </form>
        </div>
    </main>
@endsection