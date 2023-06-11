<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Http\UploadedFile;

class ProductoController extends Controller
{
    public function listarProductos(Request $req) 
    {       
        $productos=Producto::paginate(6);
        return view("productos.main", compact('productos')) ;
    }

    public function crearProducto(Request $req) {
        return view("productos.crear");
    }
    
    public function guardarProducto(Request $req)
    {
        $producto = new Producto;
        $producto->NomPro = $req->input('nombre');
        $producto->DesPro = $req->input('descripcion');
        $producto->PrePro = $req->input('precio');
    
        if ($req->hasFile('foto')) {
            $archivo = time().".".$req->file('foto')->getClientOriginalExtension(); 
            $req->file('foto')->storeAs('/public/imagenes', $archivo); 
            $producto->FotPro = $archivo;
        }
    
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


    public function infoProducto($id)
    {
        $producto = Producto::find($id);
        return view('productos.info', compact('producto'));
       
    }
}
    
