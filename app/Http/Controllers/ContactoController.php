<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'email' => 'required|email',
            'telefono' => 'required|max:15',
            'mensaje' => 'required',
        ]);

        Cliente::create($request->all());
        return redirect()->back()->with('success', 'Mensaje enviado correctamente.');
    }
}
