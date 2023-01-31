@extends('../layouts.frontend')
@section('content')
    <main class="container">

        <x-flash />
        <div class="card mb-3">
        
        <form action="{{ route('acceso_login_post') }}" method="POST" class="px-4 py-3">
            {{ csrf_field() }}
            <div class="card-header text-center card-title">
                <strong>Login</strong>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Email address</label>
                <input type="text" name="correo" id="correo" class="form-control" value="{{ old('correo') }}" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" />
            </div>

            <hr>
            <input type="submit" value="Enviar" class="btn btn-primary" />
        </form>
        </div>
    </main>
@endsection
