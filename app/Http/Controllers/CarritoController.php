<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Carrito;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CarritoController extends Controller
{
    public function addProducto(Request $req, $idPro) {
        
        $usu = Auth::id();
        $carrito = new Carrito;
        $carrito->idUsu = $usu;
        $carrito->idPro = $idPro;
        $carrito->save();
        return view("productos.main", ["productos" => Producto::all() ]) ;
    }

    public function listarCarrito(Request $req) 
    {       
        $carrito = Carrito::carrito()->get();
        return view("productos.carrito",['carrito' => Producto::find($carrito)]) ;
    }

    public function quitarProducto(Request $req, $idPro) 
    {       
        $carritoBorrar = DB::table('carrito')
                ->where('idPro', '=', $idPro)
                ->first('idCar');
        dd($carritoBorrar);
        $producto = Producto::find($carritoBorrar);
        $producto->delete() ;
        $carrito = Carrito::carrito()->get();
        return view("productos.carrito",['carrito' => Producto::find($carrito)]) ;
    }
}
