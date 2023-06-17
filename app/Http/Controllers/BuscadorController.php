<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Resena;

class BuscadorController extends Controller
{
    public function Buscar(Request $request)
    {
        $query = $request->input('query');
    
        $productos = Producto::where('NomPro', 'like', "%$query%")->paginate(6);
    
        $productos->each(function ($producto) {
            $producto->media_puntuacion = (int) round(Resena::where('idPro', $producto->idPro)
                ->avg('puntuacion'));
        });
    
        return view('productos.resultados', compact('productos'));
    }
}

