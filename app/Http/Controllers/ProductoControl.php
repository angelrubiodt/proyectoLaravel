<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Validator;

class ProductoControl extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::latest()->paginate(10);

        // Ya no necesitamos procesar el campo imagen para extraer datos adicionales,
        // ya que ahora se almacenan en columnas separadas y se accede directamente a ellas.

        return view('producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'placa' => 'required|string|max:255',
            'tipo_material' => 'required|string|max:255',
            'cantidad' => 'required|numeric|min:0',
            'precio' => 'required|numeric|min:0',
            'comprador' => 'required|string|max:255',
            'ubicacion_extraccion' => 'nullable|string|max:255',
            'fecha_extraccion' => 'nullable|date',
            'calidad_material' => 'nullable|string|max:100',
            'estado_procesamiento' => 'nullable|string|max:100',
            'observaciones' => 'nullable|string',
            'codigo_referencia' => 'nullable|string|in:Comprado,Fiado'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Crear un nuevo producto y asignar los datos a las columnas correctas
        $producto = new Producto();
        $producto->placa = $request->placa;
        $producto->tipo_material = $request->tipo_material;
        $producto->cantidad = $request->cantidad;
        $producto->precio = $request->precio;
        $producto->comprador = $request->comprador;
        $producto->ubicacion_extraccion = $request->ubicacion_extraccion;
        $producto->fecha_extraccion = $request->fecha_extraccion;
        $producto->calidad_material = $request->calidad_material;
        $producto->estado_procesamiento = $request->estado_procesamiento;
        $producto->observaciones = $request->observaciones;
        $producto->codigo_referencia = $request->codigo_referencia;
        // Ya no almacenamos todos estos datos en el campo imagen como JSON
        // $producto->imagen = json_encode([...]);

        // Si hay un campo de subida de imagen, lo manejaríamos aquí
        // Por ahora, asumimos que el campo 'imagen' en la base de datos
        // podría usarse para otra cosa (como la URL de una imagen real) o eliminarse.
        // Si no se usa, el modelo y la migración deberían reflejarlo.
        // $producto->imagen = null; // O manejar la subida de archivo real si aplica

        $producto->save();

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado exitosamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        // Ya no necesitamos extraer datos adicionales del campo imagen,
        // ya que ahora se almacenan en columnas separadas y se accede directamente a ellas.

        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $validator = Validator::make($request->all(), [
            'placa' => 'required|string|max:255',
            'tipo_material' => 'required|string|max:255',
            'cantidad' => 'required|numeric|min:0',
            'precio' => 'required|numeric|min:0',
            'comprador' => 'required|string|max:255',
            'ubicacion_extraccion' => 'nullable|string|max:255',
            'fecha_extraccion' => 'nullable|date',
            'calidad_material' => 'nullable|string|max:100',
            'estado_procesamiento' => 'nullable|string|max:100',
            'observaciones' => 'nullable|string',
            'codigo_referencia' => 'nullable|string|in:Comprado,Fiado'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Actualizar el producto y asignar los datos a las columnas correctas
        $producto->placa = $request->placa;
        $producto->tipo_material = $request->tipo_material;
        $producto->cantidad = $request->cantidad;
        $producto->precio = $request->precio;
        $producto->comprador = $request->comprador;
        $producto->ubicacion_extraccion = $request->ubicacion_extraccion;
        $producto->fecha_extraccion = $request->fecha_extraccion;
        $producto->calidad_material = $request->calidad_material;
        $producto->estado_procesamiento = $request->estado_procesamiento;
        $producto->observaciones = $request->observaciones;
        $producto->codigo_referencia = $request->codigo_referencia;
        // Ya no almacenamos todos estos datos en el campo imagen como JSON
        // $producto->imagen = json_encode([...]);

        // Si hay un campo de subida de imagen, lo manejaríamos aquí
        // Por ahora, asumimos que el campo 'imagen' en la base de datos
        // podría usarse para otra cosa (como la URL de una imagen real) o eliminarse.
        // Si no se usa, el modelo y la migración deberían reflejarlo.
        // No actualizamos el campo imagen si no se envía una nueva imagen en la solicitud.

        $producto->save();

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect('/productos');
    }
}
