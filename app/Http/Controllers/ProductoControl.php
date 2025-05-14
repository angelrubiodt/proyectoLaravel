<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;
use Illuminate\Queue\Console\RetryCommand;

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
      $productos =  Producto::all();
        return view('producto.index')->with('productos',$productos);
    }

    /**
     * Show the form for creating a new resource.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('Producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productos = new Producto();
        $productos->placa = $request->get('placa');
        $productos->tipo_material = $request->get('tipo_material');
        $productos->cantidad = $request->get('cantidad');
        $productos->precio = $request->get('precio');
        $productos->comprador = $request->get('comprador');

        $productos->save();

        return redirect('/productos');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('Producto.edit')->with('producto', $producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);

        $producto->placa = $request->get('placa');
        $producto->tipo_material = $request->get('tipo_material');
        $producto->cantidad = $request->get('cantidad');
        $producto->precio = $request->get('precio');
        $producto->comprador = $request->get('comprador');


        $producto->save();

        return redirect('/productos');
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
