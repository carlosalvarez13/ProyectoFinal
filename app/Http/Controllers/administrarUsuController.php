<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class administrarUsuController extends Controller
{
    public function adminUsu(Request $req) {
        $usuarios = User::paginate(10); 
        return view("productos.administrarUsu", compact('usuarios'));
    }

    public function borrarUsu(Request $req,User $usuario){

        $usuario->delete() ;
        return view("productos.administrarUsu", ["usuarios" => User::all() ]) ;
    }

    public function buscarUsu(Request $req) {
        $keyword = $req->input('keyword');
        $usuarios = User::where('name', 'LIKE', "%$keyword%")
                        ->orWhere('email', 'LIKE', "%$keyword%")
                        ->paginate(10); 
        $usuarios->appends(['keyword' => $keyword]); 
        return view("productos.administrarUsu", compact('usuarios'));
    }
    

}
