<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalleventa extends Model
{
    use HasFactory;
    protected $table = 'Detalleventa';
    protected $primaryKey = 'DetalleventaID';
    public $timestamps = false;

    protected $fillable = [
        'Cantidad',
        'ProductoID',
        'NotaventaID',
    ];
    
    // Define las relaciones si las tienes
}
