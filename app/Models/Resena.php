<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Producto;

class Resena extends Model
{
    use HasFactory;

    protected $table = 'valoraciones'; 

    protected $fillable = [
        'idUsu',
        'idPro',
        'puntuacion',
        'comentario',
        'created_at',
        'updated_at',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUsu');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idPro');
    }

}
