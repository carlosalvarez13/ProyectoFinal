<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function guardarContacto(Request $request)
    {
        $formulario = new Contacto;
        $formulario->nombre = $request->nombre;
        $formulario->email = $request->email;
        $formulario->mensaje = $request->mensaje;
        $formulario->save();

        return redirect()->back()->with('success', 'Tu mensaje se ha enviado correctamente.');
    }
}
