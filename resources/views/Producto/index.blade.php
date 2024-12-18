@extends('layouts.plantillabase')

@section('css')
<link href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
@endsection

@section('contenido')
<div class="row g-0">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="m-0">Gestión de Productos</h2>
            <div class="d-flex align-items-center">
                <span class="me-3">Bienvenido, {{ Auth::user()->name }}</span>
                <form id="logout-form" method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="button" class="btn btn-danger" id="logout-button">Cerrar Sesión</button>
                </form>
            </div>
        </div>

        <div class="mb-3">
            <a href="{{ route('productos.create') }}" class="btn btn-primary">CREAR</a>
        </div>

        <table id="productos" class="table table-striped shadow-lg" style="width:100%">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Tipo de Material</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precios</th>
                    <th scope="col">Comprador</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>{{$producto->id}}</td>
                    <td>{{$producto->placa}}</td>
                    <td>{{$producto->tipo_material}}</td>
                    <td>{{$producto->cantidad}}</td>
                    <td>{{$producto->precio}}</td>
                    <td>{{$producto->comprador}}</td>
                    <td>
                        <form action="{{route ('productos.destroy', $producto->id)}}" method="POST" class="formEliminar">
                            <a href="/productos/{{$producto->id}}/edit" class="btn btn-info">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

<script>
    new DataTable('#productos');

    $('#logout-button').on('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡Quieres cerrar sesión!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, cerrar sesión',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#logout-form').submit(); // Envía el formulario de cierre de sesión
            }
        });
    });

    $('.formEliminar').submit(function(e){
        e.preventDefault();

        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, bórralo',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });
</script>
@endsection
