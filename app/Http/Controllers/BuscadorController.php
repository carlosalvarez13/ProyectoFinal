<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class BuscadorController extends Controller
{
    public function Buscar(Request $request)
    {
        $query = $request->input('query');
    
        $productos = Producto::where('NomPro', 'like', "%$query%")->paginate(10);
    
        return view('productos.resultados', compact('productos'));
    }
    
}
