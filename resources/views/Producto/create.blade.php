@extends('layouts.plantillabase');

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-10">
        <h2 class="mb-4">CREAR REGISTRO</h2>
        <form action="/productos" method="POST">
            @csrf
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Información Básica</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="comprador" class="form-label">Nombre del Comprador</label>
                            <input id="comprador" name="comprador" type="text" class="form-control" tabindex="1" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="placa" class="form-label">Placa</label>
                            <input id="placa" name="placa" type="text" class="form-control" tabindex="2" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="tipo_material" class="form-label">Tipo de material</label>
                            <select id="tipo_material" name="tipo_material" class="form-control" tabindex="3" onchange="actualizarPrecio()" required>
                                <option value="">Seleccione un material</option>
                                <option value="Grava">Grava</option>
                                <option value="Asfalto natural">Asfalto natural</option>
                                <option value="Crudo de recebo">Crudo de recebo</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input id="cantidad" name="cantidad" type="number" class="form-control" tabindex="4" onchange="actualizarPrecio()" required>
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
                                <input id="ubicacion_extraccion" name="ubicacion_extraccion" type="text" class="form-control" tabindex="5" value="Mina San Pedro" readonly>
                                <button type="button" class="btn btn-outline-secondary" onclick="document.getElementById('ubicacion_extraccion').value='Mina San Pedro'">
                                    <i class="fas fa-map-marker-alt"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fecha_extraccion" class="form-label">Fecha de Extracción</label>
                            <input id="fecha_extraccion" name="fecha_extraccion" type="date" class="form-control" tabindex="6">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="calidad_material" class="form-label">Calidad del Material</label>
                            <select id="calidad_material" name="calidad_material" class="form-control" tabindex="7">
                                <option value="">Seleccione la calidad</option>
                                <option value="Alta">Alta</option>
                                <option value="Media">Media</option>
                                <option value="Baja">Baja</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="estado_procesamiento" class="form-label">Estado de Procesamiento</label>
                            <select id="estado_procesamiento" name="estado_procesamiento" class="form-control" tabindex="8">
                                <option value="">Seleccione el estado</option>
                                <option value="Crudo">Crudo</option>
                                <option value="Procesado">Procesado</option>
                                <option value="Refinado">Refinado</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="observaciones" class="form-label">Observaciones</label>
                        <textarea id="observaciones" name="observaciones" class="form-control" tabindex="9" rows="3"></textarea>
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
                            <select id="codigo_referencia" name="codigo_referencia" class="form-control" tabindex="10">
                                <option value="">Seleccione el estado</option>
                                <option value="Comprado">Comprado</option>
                                <option value="Fiado">Fiado</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="precio" class="form-label">Precio de Venta</label>
                            <input id="precio" name="precio" type="number" step="any" value="0.00" class="form-control" readonly tabindex="12">
                        </div>
                    </div>

                </div>
            </div>

            <div class="text-center mb-4">
                <a href="/productos" class="btn btn-secondary btn-lg mx-2" tabindex="16">Cancelar</a>
                <button type="submit" class="btn btn-primary btn-lg mx-2" tabindex="15">Guardar Registro</button>
            </div>
        </form>
    </div>
</div>

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
@endsection
