@extends('layouts.plantillabase');

@section('contenido')
<div class="row justify-content-center g-0">
    <div class="col-md-10">
        <h2 class="mb-3">EDITAR REGISTRO</h2>
        <form id="editForm" action="/productos/{{$producto->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Información Básica</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="comprador" class="form-label">Nombre del Comprador</label>
                            <input id="comprador" name="comprador" type="text" class="form-control" value="{{$producto->comprador}}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="placa" class="form-label">Placa</label>
                            <input id="placa" name="placa" type="text" class="form-control" value="{{$producto->placa}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tipo_material" class="form-label">Tipo de material</label>
                            <select id="tipo_material" name="tipo_material" class="form-control" required onchange="actualizarPrecio()">
                                <option value="Grava" {{ $producto->tipo_material == 'Grava' ? 'selected' : '' }}>Grava</option>
                                <option value="Asfalto natural" {{ $producto->tipo_material == 'Asfalto natural' ? 'selected' : '' }}>Asfalto natural</option>
                                <option value="Crudo de recebo" {{ $producto->tipo_material == 'Crudo de recebo' ? 'selected' : '' }}>Crudo de recebo</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input id="cantidad" name="cantidad" type="number" class="form-control" value="{{$producto->cantidad}}" required oninput="actualizarPrecio()">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Detalles de Extracción</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="ubicacion_extraccion" class="form-label">Ubicación de Extracción</label>
                            <div class="input-group">
                                <input id="ubicacion_extraccion" name="ubicacion_extraccion" type="text" class="form-control" value="{{$producto->ubicacion_extraccion ?: 'Mina San Pedro'}}" readonly>
                                <button type="button" class="btn btn-outline-secondary" onclick="document.getElementById('ubicacion_extraccion').value='Mina San Pedro'">
                                    <i class="fas fa-map-marker-alt"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fecha_extraccion" class="form-label">Fecha de Extracción</label>
                            <input id="fecha_extraccion" name="fecha_extraccion" type="date" class="form-control" value="{{$producto->fecha_extraccion}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="calidad_material" class="form-label">Calidad del Material</label>
                            <select id="calidad_material" name="calidad_material" class="form-control">
                                <option value="">Seleccione la calidad</option>
                                <option value="Alta" {{ $producto->calidad_material == 'Alta' ? 'selected' : '' }}>Alta</option>
                                <option value="Media" {{ $producto->calidad_material == 'Media' ? 'selected' : '' }}>Media</option>
                                <option value="Baja" {{ $producto->calidad_material == 'Baja' ? 'selected' : '' }}>Baja</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="estado_procesamiento" class="form-label">Estado de Procesamiento</label>
                            <select id="estado_procesamiento" name="estado_procesamiento" class="form-control">
                                <option value="">Seleccione el estado</option>
                                <option value="Crudo" {{ $producto->estado_procesamiento == 'Crudo' ? 'selected' : '' }}>Crudo</option>
                                <option value="Procesado" {{ $producto->estado_procesamiento == 'Procesado' ? 'selected' : '' }}>Procesado</option>
                                <option value="Refinado" {{ $producto->estado_procesamiento == 'Refinado' ? 'selected' : '' }}>Refinado</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="observaciones" class="form-label">Observaciones</label>
                        <textarea id="observaciones" name="observaciones" class="form-control" rows="3">{{$producto->observaciones}}</textarea>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Información Financiera</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="codigo_referencia" class="form-label">Estado de Pago</label>
                            <select id="codigo_referencia" name="codigo_referencia" class="form-control">
                                <option value="">Seleccione el estado</option>
                                <option value="Comprado" {{ $producto->codigo_referencia == 'Comprado' ? 'selected' : '' }}>Comprado</option>
                                <option value="Fiado" {{ $producto->codigo_referencia == 'Fiado' ? 'selected' : '' }}>Fiado</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="precio" class="form-label">Precio de Venta</label>
                            <input id="precio" name="precio" type="number" step="any" class="form-control" value="{{$producto->precio}}" readonly>
                        </div>
                    </div>

                </div>
            </div>

            <div class="text-center mb-4">
                <a href="/productos" class="btn btn-secondary btn-lg mx-2" tabindex="6">Cancelar</a>
                <button type="submit" class="btn btn-primary btn-lg mx-2" tabindex="5">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('editForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Evita el envío inmediato del formulario

        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡Los cambios se guardarán!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, guardar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit(); // Envía el formulario si el usuario confirma
            }
        });
    });
</script>
@endsection
@endsection

<script>
function actualizarPrecio() {
    const material = document.getElementById('tipo_material').value;
    const cantidad = document.getElementById('cantidad').value;
    let precioUnitario = 0;

    switch(material) {
        case 'Grava':
            precioUnitario = 30000;
            break;
        case 'Asfalto natural':
            precioUnitario = 45000;
            break;
        case 'Crudo de recebo':
            precioUnitario = 20000;
            break;
    }

    const precioTotal = cantidad * precioUnitario;
    document.getElementById('precio').value = precioTotal;
    

}




</script>
