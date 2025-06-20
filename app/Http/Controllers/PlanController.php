<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function inicial()
    {
        return view('planes.inicial');
    }

    public function avanzado()
    {
        return view('planes.avanzado');
    }

    public function premium()
    {
        return view('planes.premium');
    }

    public function postAvanzado(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email',
            'empresa' => 'nullable|string|max:100',
            'tarjeta' => 'required|string|min:8',
        ]);
        // Aquí podrías guardar el registro o simular el pago
        return back()->with('success', '¡Prueba gratis activada! Revisa tu correo para más instrucciones.');
    }

    public function postPremiumDemo(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email',
            'empresa' => 'required|string|max:100',
            'mensaje' => 'nullable|string|max:500',
        ]);
        // Aquí podrías guardar el registro de demo/contacto
        return back()->with('success', '¡Solicitud de demo enviada! Te contactaremos pronto.');
    }

    public function postPremiumContratar(Request $request)
    {
        // Aquí podrías simular el pago o guardar el registro
        return back()->with('success', '¡Contratación exitosa! Pronto recibirás acceso premium.');
    }
} 