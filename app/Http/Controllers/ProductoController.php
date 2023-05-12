<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function listarProductos(Request $req) 
    {       
        return view("productos.main", ["productos" => Producto::all() ]) ;
    }

    public function crearProducto(Request $req) {
        return view("productos.crear");
    }
    
    public function guardarProducto(Request $req) {

        $producto= new Producto;
        $producto->NomPro=$req->input('nombre');
        $producto->FotPro=$req->input('foto');
        $producto->DesPro=$req->input('descripcion');
        $producto->PrePro=$req->input('precio');
        $producto->ValPro=$req->input('valoracion');

        $producto->save();
        return redirect()->route('producto.listar');
    }

    public function borrarProducto(Request $req,Producto $producto){

        $producto->delete() ;
        return redirect()->route('producto.listar');
    }


    public function editarProducto(Request $req,$idProd){
        $producto = Producto::find($idProd);
        return view("productos.editar", compact('producto'));
    }

    public function actualizarProducto(Request $req, $idProd){
        $producto = Producto::find($idProd);
        $producto->NomPro=$req->input('nombre');
        $producto->FotPro=$req->input('foto');
        $producto->DesPro=$req->input('descripcion');
        $producto->PrePro=$req->input('precio');
        $producto->update();


        return redirect()->route('producto.listar');
    }
}
