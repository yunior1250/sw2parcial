<?php

namespace App\Http\Controllers;

use App\Models\Notaventa;
use App\Models\Producto;
use App\Models\Usuario;
use Illuminate\Http\Request;

class NotaVentaController extends Controller
{
    public function index()
    {
        $notaventas = Notaventa::all();
        $usuarios = Usuario::all(); 
        
        return view('notaventa.index', compact('notaventas', 'usuarios'));
    }

    public function create()
    {
        $usuarios = Usuario::all(); 

        return view('notaventa.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Fecha' => 'required',
            'Id' => 'required',
            'Montototal' => 'required',
            'UsuarioID' => 'required',
        ]);

        Notaventa::create($data);

        return redirect()->route('notaventa.index')->with('success', 'Nota de venta creada exitosamente.');
    }

    public function show($id)
    {
        $notaventa = Notaventa::findOrFail($id);
        return view('notaventa.show', compact('notaventa'));
    }

    public function edit($id)
    {
        $notaventa = Notaventa::findOrFail($id);
        $usuarios = Usuario::all(); 
        return view('notaventa.edit', compact('notaventa', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'Fecha' => 'required',
            'Id' => 'required',
            'Montototal' => 'required',
            'UsuarioID' => 'required',
        ]);

        $notaventa = Notaventa::findOrFail($id);
        $notaventa->update($data);

        return redirect()->route('notaventa.index')->with('success', 'Nota de venta actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $notaventa = Notaventa::findOrFail($id);
        $notaventa->delete();

        return redirect()->route('notaventa.index')->with('success', 'Nota de venta eliminada exitosamente.');
    }
}
