@extends('../layouts.frontend')
@section('content')
    <main class="container">

        <x-flash />
        <div class="card mb-3">
        
        <form action="{{ route('acceso_new_password_post')}}" method="POST" class="px-4 py-3">
            {{ csrf_field() }}
            <div class="card-header text-center card-title">
                <strong>New Password</strong>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Repeat Password</label>
                <input type="password" name="password" id="password" class="form-control" />
            </div>
            <div class="mb-3">
                <input type="hidden" name="token" id="token" class="form-control" value="{{ $token }}"/>
            </div>
            <div class="mb-3">
                <input type="hidden" name="user_email" id="user_email" class="form-control" value="{{ $user_email }}"/>
            </div>
            <hr>
            <input type="submit" value="Enviar" class="btn btn-primary" />
        </form>
        </div>
    </main>
@endsection