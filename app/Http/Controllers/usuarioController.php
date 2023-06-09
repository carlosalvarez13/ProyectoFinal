<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class usuarioController extends Controller
{
    public function usuarioPerfil(Request $req) {
        $usuarioActual = auth()->user();
        return view("usuario.usuario", ["usuario" => $usuarioActual]);
    }
    
}
