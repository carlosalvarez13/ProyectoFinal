<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;

class carritoController extends Controller
{
    public function guardar(Request $request)
    {
        $idPro = $request->input('idPro');
        $carrito = Carrito::where('idUsu', auth()->user()->idUsu)
                        ->where('idPro', $idPro)
                        ->first();
    
        if ($carrito) {
            $carrito->increment('Cantidad');
        } else {
            $carrito = new Carrito;
            $carrito->idUsu = auth()->user()->idUsu;
            $carrito->idPro = $idPro;
            $carrito->Cantidad = 1;
            $carrito->save();
        }
    
        return redirect()->back()->with('success', 'Producto agregado al carrito correctamente.');
    }

    public function mostrar()
    {
        $productosCarrito = Carrito::carrito()
            ->with('producto')
            ->get();
    
        $totalCarrito = $productosCarrito->sum(function ($producto) {
            return $producto->producto->PrePro * $producto->cantidad;
        });
    
        return view("productos.carrito", compact('productosCarrito', 'totalCarrito'));
    }
    
    
    public function borrar($id)
    {
        $carrito = Carrito::findOrFail($id);
        $carrito->delete();
    
        return redirect()->back()->with('success', 'Producto eliminado del carrito correctamente.');
    }
    

}
