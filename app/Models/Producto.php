<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'Producto';
    protected $primaryKey = 'ProductoID';
    public $timestamps = false;
    protected $fillable = [
        'Id',
        'Nombre',
        'Precio',
        'Stock',
        'CategoriaID',
    ];
    
}
