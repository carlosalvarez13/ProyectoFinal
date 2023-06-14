<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Carrito extends Model
{
    use HasFactory;

    protected $table = "carrito";
    protected $primaryKey = "idPro";

    public function scopeCarrito($query)
    {
        return $query->where('idUsu', auth()->user()->idUsu);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idPro', 'idPro');
    }
}

