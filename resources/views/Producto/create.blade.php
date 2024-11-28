@extends('layouts.plantillabase');

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h2 class="mb-4">CREAR REGISTRO</h2>
        <form action="/productos" method="POST">
            @csrf
            <div class="mb-3">
                <label for="comprador" class="form-label">Nombre del Comprador</label>
                <input id="comprador" name="comprador" type="text" class="form-control" tabindex="1">
            </div>
            <div class="mb-3">
                <label for="codigo" class="form-label">Código</label>
                <input id="codigo" name="codigo" type="text" class="form-control" tabindex="2">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Tipo de material</label>
                <select id="descripcion" name="descripcion" class="form-control" tabindex="2" onchange="actualizarPrecio()">
                    <option value="">Seleccione un material</option>
                    <option value="Grava">Grava</option>
                    <option value="Asfalto natural">Asfalto natural</option>
                    <option value="Crudo de recebo">Crudo de recebo</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Cantidad</label>
                <input id="cantidad" name="cantidad" type="number" class="form-control" tabindex="3" onchange="actualizarPrecio()" onkeyup="actualizarPrecio()">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Precio</label>
                <input id="precio" name="precio" type="number" step="any" value="0.00" class="form-control" readonly>
            </div>
            <a href="/productos" class="btn btn-secondary" tabindex="5">Cancelar</a>
            <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
        </form>
    </div>
</div>

<script>
function actualizarPrecio() {
    const material = document.getElementById('descripcion').value;
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
