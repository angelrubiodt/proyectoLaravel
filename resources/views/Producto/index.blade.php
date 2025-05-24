@extends('layouts.plantillabase')

@section('css')
<link href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
<style>
    .table-responsive {
        overflow-x: auto;
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .badge {
        font-size: 0.9em;
        padding: 0.5em 0.7em;
    }
    .btn-group .btn {
        margin: 0 2px;
    }
    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
    }
    .card-header h4 {
        color: #343a40;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
    }
    .btn-info:hover {
        background-color: #138496;
        border-color: #117a8b;
    }
</style>
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

        <div class="card mb-4">
            <div class="card-header bg-white">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h4 class="mb-0">Listado de materiales extraídos</h4>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <a href="{{ route('productos.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle me-2"></i>Nuevo Registro</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="productos" class="table table-striped table-hover">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Placa</th>
                                <th scope="col">Tipo de Material</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Comprador</th>
                                <th scope="col">Estado de Pago</th>
                                <th scope="col">Ubicación</th>
                                <th scope="col">Calidad</th>
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
                                <td>{{number_format($producto->precio, 0, ',', '.')}}</td>
                                <td>{{$producto->comprador}}</td>
                                <td>
                                    @if($producto->codigo_referencia == 'Comprado')
                                        <span class="badge bg-success">Comprado</span>
                                    @elseif($producto->codigo_referencia == 'Fiado')
                                        <span class="badge bg-warning">Fiado</span>
                                    @else
                                        <span class="badge bg-secondary">No definido</span>
                                    @endif
                                </td>
                                <td>{{$producto->ubicacion_extraccion ?: 'No registrada'}}</td>
                                <td>
                                    @if($producto->calidad_material == 'Alta')
                                        <span class="badge bg-success">Alta</span>
                                    @elseif($producto->calidad_material == 'Media')
                                        <span class="badge bg-warning">Media</span>
                                    @elseif($producto->calidad_material == 'Baja')
                                        <span class="badge bg-danger">Baja</span>
                                    @else
                                        <span class="badge bg-secondary">No definida</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="/productos/{{$producto->id}}/edit" class="btn btn-info btn-sm">Editar</a>
                                        <form action="{{route ('productos.destroy', $producto->id)}}" method="POST" class="formEliminar d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Detalles -->
<div class="modal fade" id="detalleModal" tabindex="-1" aria-labelledby="detalleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="detalleModalLabel">Detalles del Material</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="detalleModalBody">
                <!-- Contenido dinámico -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

<script>
    $(document).ready(function() {
        new DataTable('#productos', {
            responsive: true,
            language: {
                processing:     "Procesando...",
                search:         "Buscar:",
                lengthMenu:     "Mostrar _MENU_ registros",
                info:           "Mostrando _START_ a _END_ de _TOTAL_ registros",
                infoEmpty:      "Mostrando 0 a 0 de 0 registros",
                infoFiltered:   "(filtrado de _MAX_ registros totales)",
                infoPostFix:    "",
                loadingRecords: "Cargando...",
                zeroRecords:    "No se encontraron resultados",
                emptyTable:     "No hay datos disponibles en la tabla",
                paginate: {
                    first:      "Primero",
                    previous:   "Anterior",
                    next:       "Siguiente",
                    last:       "Último"
                },
                aria: {
                    sortAscending:  ": activar para ordenar la columna ascendente",
                    sortDescending: ": activar para ordenar la columna descendente"
                }
            }
        });

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
    });
</script>
@endsection
