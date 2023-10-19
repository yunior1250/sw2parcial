<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function indexCliente()
    {
        $categorias = Categoria::all();
        $productos = Producto::where('Stock', '>', 0)->get();
        return view('client.producto', compact('productos','categorias'));
    }

    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {           
        $request->validate([
            'Nombre' => 'required',
            'Precio' => 'required',
            'Stock' => 'required',
            'Url' => 'required',
            'idCategoria' => 'required',
        ]);
        

        Producto::create($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nombre' => 'required',
            'Precio' => 'required',
            'Stock' => 'required',
            'Url' => 'required',
            'idCategoria' => 'required',
        ]);

        Producto::find($id)->update($request->all());

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy($id)
    {
        Producto::where('id', $id)->delete();
        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado exitosamente.');
    }
}