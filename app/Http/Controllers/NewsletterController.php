<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|email|unique:newsletters,email'
            ]);
        } catch (ValidationException $e) {
            if ($request->ajax()) {
                return response()->json([
                    'status' => 'error',
                    'errors' => $e->errors()
                ], 422);
            }
            throw $e;
        }

        Newsletter::create([
            'email' => $request->email
        ]);

        $mensaje = 'Correo enviado correctamente, ¡gracias por suscribirte!';

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => $mensaje
            ]);
        }

        return back()->with('success', $mensaje)->with('success_class', 'alert-success');
    }
}
