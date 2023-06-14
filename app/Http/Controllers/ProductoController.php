<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Resena;
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
        $producto->NomPro = $req->input('nombre');
        
        if ($req->hasFile('foto')) {
            $archivo = time().".".$req->file('foto')->getClientOriginalExtension(); 
            $req->file('foto')->storeAs('public/imagenes', $archivo); 
            $producto->FotPro = $archivo;
        }
        
        $producto->DesPro = $req->input('descripcion');
        $producto->PrePro = $req->input('precio');
        
        $producto->save();
    
        return redirect()->route('producto.listar');
    }
    

    public function infoProducto($id)
    {
        $producto = Producto::find($id);
        return view('productos.info', compact('producto'));
       
    }

    public function resena(Request $req)
    {
        $validatedData = $req->validate([
            'idUsu' => 'required',
            'idPro' => 'required',
            'nEstrellas' => 'required',
            'comment' => 'nullable',
        ]);
    
        $resena = new Resena;
        $resena->idUsu = $validatedData['idUsu'];
        $resena->idPro = $validatedData['idPro'];
        $resena->puntuacion = $validatedData['nEstrellas'];
    
        if ($req->has('comment')) {
            $resena->comentario = $validatedData['comment'];
        }
    
        $resena->save();
    
    
        return redirect()->route('producto.info', ['id' => $validatedData['idPro']]);
    }
    
    public function comentarios($idPro)
    {
        $valoraciones = Resena::with('usuario', 'producto')
        ->where('idPro', $idPro )
        ->paginate(6);

        return view('productos.comentarios')->with('valoraciones', $valoraciones);
    }
    
}
    
