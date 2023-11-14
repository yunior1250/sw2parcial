<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventarioController extends Controller
{
    public function index()
    {
        $inventarios = Inventario::all();
        return view('inventarios.index', compact('inventarios'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('inventarios.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'accion' => 'required',
            'cantidad' => 'required',
            'idProducto' => 'required',
        ]);

        // Obtiene el ID del usuario autenticado
        $idUsuario = Auth::user()->id;

        if ($request->accion === 'Agregar') {
            $producto = Producto::find($request->idProducto);
            $producto->stock += $request->cantidad;
            $producto->save();
        } else {
            $producto = Producto::find($request->idProducto);
            if ($request->cantidad > $producto->stock) {
                $request->cantidad = $producto->stock;
                $producto->stock = 0;
                $producto->save();
            } else {
                $producto->stock -= $request->cantidad;
                $producto->save();
            }
        }
        
        // Crea un nuevo inventario con el usuario autenticado
        Inventario::create([
            'accion' => $request->accion,
            'cantidad' => $request->cantidad,
            'idProducto' => $request->idProducto,
            'idUsuario' => $idUsuario,
        ]);

        return redirect()->route('inventarios.index')
            ->with('success', 'Inventario creado exitosamente.');
    }

    public function destroy($id)
    {
        $inventario = Inventario::find($id);
        $producto = Producto::find($inventario->idProducto);
        $producto->stock -= $inventario->cantidad;
        $producto->save();
        Inventario::where('id', $id)->delete();
        return redirect()->route('inventarios.index')
            ->with('success', 'Inventario eliminado exitosamente.');
    }
}
