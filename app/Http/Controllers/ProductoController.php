<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{    

    public function index()
    {
        if (Auth::user()->rol === 'cliente') {
            $categorias = Categoria::all();
            $productos = Producto::where('stock', '>', 0)->get();
            return view('client.producto', compact('productos', 'categorias'));
        } else {
            $productos = Producto::all();
            return view('productos.index', compact('productos'));
        }
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        //dd($request->url);

        $request->validate([
            'nombre' => 'required',
            'precio' => 'required',
            'url' => 'required',
            'stock' => 'required',
            'idCategoria' => 'required',
        ]);

        $path = $request->file('url')->store("productos", 's3');
        $url = Storage::disk('s3')->url($path);
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->idCategoria = $request->idCategoria;
        $producto->url = $url;
        $producto->stock = $request->stock;
        $producto->save();
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
            'nombre' => 'required',
            'precio' => 'required',
            'stock' => 'required',
            //'url' => 'required',
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
