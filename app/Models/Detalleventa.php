<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalleventa extends Model
{
    use HasFactory;
    protected $table = 'detalleventa';    
    public $timestamps = false;

    protected $fillable = [
        'cantidad',
        'idProducto',
        'idNotaVenta',
    ];
    
    // Define las relaciones si las tienes
}
