<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = "producto";
    protected $primaryKey = "idPro";

    protected $fillable = [
        'NomPro',
        'FotPro',
        'DesPro',
        'PrePro',
        'ValPro',
    ];

    public function User(){
        return $this->belongsToMany("App\models\User", "Carrito","idUsu","idPro");
    }
}
