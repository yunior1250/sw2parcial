<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    protected $table = 'inventario';

    public $timestamps = false;

    protected $fillable = [
        'accion',
        'cantidad',
        'idProducto',
        'idUsuario',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUsuario');
    }
}
