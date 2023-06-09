<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class administrarUsuController extends Controller
{
    public function adminUsu(Request $req) {
        return view("productos.administrarUsu", ["usuarios" => User::all() ]) ;
    }

    public function borrarUsu(Request $req,User $usuario){

        $usuario->delete() ;
        return view("productos.administrarUsu", ["usuarios" => User::all() ]) ;
    }
}
