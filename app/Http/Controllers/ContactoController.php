<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nombre' => 'required|max:50',
                'telefono' => 'required|min:10|max:15',
                'mensaje' => 'required',
            ], [
                'nombre.required' => 'El nombre es requerido',
                'telefono.required' => 'El teléfono es requerido',
                'mensaje.required' => 'El mensaje es requerido',
                'telefono.min' => 'El teléfono debe tener al menos 10 dígitos',
                'telefono.max' => 'El teléfono debe tener máximo 15 dígitos'
            ]);

            // Loguear los datos validados para debug
            \Log::info('Datos de contacto recibidos:', $validated);

            try {
                Contact::create($validated);
                return response()->json([
                    'status' => 'success',
                    'message' => '¡Mensaje enviado correctamente!'
                ]);
            } catch (\Exception $e) {
                \Log::error('Error al crear contacto: ' . $e->getMessage());
                return response()->json([
                    'status' => 'error',
                    'message' => 'Error al guardar los datos. Por favor, inténtelo de nuevo.'
                ], 500);
            }
        } catch (\Exception $e) {
            // Loguear el error completo
            \Log::error('Error de validación: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Error en los datos proporcionados. Por favor, revise los campos.',
                'errors' => $e->errors()
            ], 422);
        }
    }
}
