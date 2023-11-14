<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'producto';
    //protected $primaryKey = 'ProductoID';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'precio',
        'stock',
        'url',
        'idCategoria',
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'idCategoria', 'id');
    }
}
