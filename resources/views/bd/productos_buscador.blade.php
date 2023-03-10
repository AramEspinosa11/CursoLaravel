@extends('../layouts.frontend')
@section('title', 'BD')
@section('content')

    <main class="container">
        <h1>Productos ({{ $datos->count() }})</h1>
        <h3>Resultados de busqueda "<strong>{{$b}}</strong>"</h3>
        <x-flash />
        {{-- buscador --}}
        <div class="row">
            <div class="col-6">

            </div>
            <div class="col-6">
                <form name="form_buscador" action="{{ route('bd_productos_buscador') }}" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Buscar....." name="b" id="b"
                            value="{{ $b }}" />
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick='buscador();'><i
                                class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        {{-- buscador --}}

        <hr />
        <p class="d-flex justify-content-end">
            <a href="{{ route('bd_productos_add') }}" class="btn btn-success">
                <i class="fas fa-check"></i> Crear
            </a>
        </p>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Categoría</th>
                        <th>Nombre</th>
                        <th>Precio</th>

                        <th>Stock</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Fotos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $dato)
                        <tr>
                            <td>{{ $dato->id }}</td>
                            <td>
                                <a
                                    href="{{ route('bd_productos_categoria', ['id' => $dato->categorias->id]) }}">{{ $dato->categorias->nombre }}</a>
                            </td>
                            <td>{{ $dato->nombre }}</td>
                            <td>${{ number_format($dato->precio, 0, '', '.') }}</td>
                            <td>{{ $dato->stock }}</td>
                            <td>{{ substr($dato->descripcion, 0, 100) }}.....</td>
                            <td>{{ Helpers::fecha($dato->fecha) }}</td>
                            <td>
                                <a href="{{ route('bd_productos_fotos', ['id' => $dato->id]) }}"><i
                                        class="fas fa-camera"></i></a>
                            </td>
                            <td>
                                <a href="{{ route('bd_productos_edit', ['id' => $dato->id]) }}"><i
                                        class="fas fa-edit"></i></a>
                                <a href="javascript:void(0);"
                                    onclick="confirmaAlert('Realmente desea eliminar este registro?', '{{ route('bd_productos_delete', ['id' => $dato->id]) }}');"><i
                                        class="fas fa-trash "></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

@endsection
