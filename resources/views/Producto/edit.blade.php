@extends('layouts.plantillabase');

@section('contenido')
<div class="row justify-content-center g-0">
    <div class="col-md-8">
        <h2 class="mb-3">EDITAR REGISTRO</h2>
        <form id="editForm" action="/productos/{{$producto->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="comprador" class="form-label">Nombre del Comprador</label>
                <input id="comprador" name="comprador" type="text" class="form-control" value="{{$producto->comprador}}" required>
            </div>
            <div class="mb-3">
                <label for="placa" class="form-label">Placa</label>
                <input id="placa" name="placa" type="text" class="form-control" value="{{$producto->placa}}" required>
            </div>
            <div class="mb-3">
                <label for="tipo_material" class="form-label">Tipo de material</label>
                <select id="tipo_material" name="tipo_material" class="form-control" required onchange="actualizarPrecio()">
                    <option value="Grava" {{ $producto->tipo_material == 'Grava' ? 'selected' : '' }}>Grava</option>
                    <option value="Asfalto natural" {{ $producto->tipo_material == 'Asfalto natural' ? 'selected' : '' }}>Asfalto natural</option>
                    <option value="Crudo de recebo" {{ $producto->tipo_material == 'Crudo de recebo' ? 'selected' : '' }}>Crudo de recebo</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input id="cantidad" name="cantidad" type="number" class="form-control" value="{{$producto->cantidad}}" required oninput="actualizarPrecio()">
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input id="precio" name="precio" type="number" step="any" class="form-control" value="{{$producto->precio}}" readonly>
            </div>
            <a href="/productos" class="btn btn-secondary" tabindex="6">Cancelar</a>
            <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
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
