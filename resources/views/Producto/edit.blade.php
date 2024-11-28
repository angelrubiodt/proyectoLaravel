@extends('layouts.plantillabase');

@section('contenido')
<div class="row justify-content-center g-0">
    <div class="col-md-8">
        <h2 class="mb-3">EDITAR REGISTRO</h2>
        <form action="/productos/{{$producto->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="codigo" class="form-label">Placa</label>
                <input id="codigo" name="codigo" type="text" class="form-control" value="{{$producto->codigo}}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Tipo de material</label>
                <select id="descripcion" name="descripcion" class="form-control" onchange="actualizarPrecio()">
                    <option value="Grava" {{ $producto->descripcion == 'Grava' ? 'selected' : '' }}>Grava</option>
                    <option value="Asfalto natural" {{ $producto->descripcion == 'Asfalto natural' ? 'selected' : '' }}>Asfalto natural</option>
                    <option value="Crudo de recebo" {{ $producto->descripcion == 'Crudo de recebo' ? 'selected' : '' }}>Crudo de recebo</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Cantidad</label>
                <input id="cantidad" name="cantidad" type="number" class="form-control" value="{{$producto->cantidad}}" onchange="actualizarPrecio()">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Precio</label>
                <input id="precio" name="precio" type="number" step="any" class="form-control" value="{{$producto->precio}}" readonly>
            </div>
            <a href="/productos" class="btn btn-secondary" tabindex="5">Cancelar</a>
            <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
        </form>
    </div>
</div>
@endsection

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
