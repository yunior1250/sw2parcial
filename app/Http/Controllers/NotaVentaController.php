<?php

namespace App\Http\Controllers;

use App\Models\Detalleventa;
use App\Models\Notaventa;
use App\Models\Producto;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class NotaVentaController extends Controller
{
    public function index()
    {
        $idUsuario = Auth::user()->id;
        $notaventas = Notaventa::where('idUsuario', $idUsuario)->get();
        return view('client.compras', compact('notaventas'));
        //return view('notaventa.index', compact('notaventas'));

    }

    public function create()
    {
        $usuarios = Usuario::all();

        return view('notaventa.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $cartItems  = json_decode($request->input('cartList'), true);
        if (is_array($cartItems) && !empty($cartItems)) {
            $idUsuario = Auth::user()->id;
            $notaventa = new Notaventa();
            //$fechaActual = new DateTime();            
            $notaventa->Fecha = date('Y-m-d'); //$fechaActual->format('Y-m-d');
            //dd($notaventa->Fecha);
            $notaventa->Montototal = $request->input('total');
            $notaventa->idUsuario = $idUsuario;
            $notaventa->save();
            foreach ($cartItems as $item) {
                $detalleventa = new Detalleventa();
                $detalleventa->Cantidad = $item['cantidad'];
                $detalleventa->idProducto = $item['id'];
                $detalleventa->idNotaventa = $notaventa->id;
                $detalleventa->save();
                $producto = Producto::find($item['id']); // Obtener el producto por su ID
                if ($producto) {
                    $producto->Stock = $producto->Stock - $item['cantidad'];
                    $producto->save(); // Actualizar el stock del producto
                }
            }
            return redirect()->route('notaventa.show', $notaventa)->with('success', 'Nota de venta creada exitosamente.');
            //return redirect()->route('notaventa.index')->with('success', 'Nota de venta creada exitosamente.');
        }
        //dd("No paso por el if");
    }

    public function show($id)
    {
        $notaventa = Notaventa::findOrFail($id); // Obtener la nota de venta por su ID

        $productos = DB::table('producto')
            ->join('detalleventa', 'producto.id', '=', 'detalleventa.idProducto')
            ->where('detalleventa.idNotaventa', $notaventa->id)
            ->select('producto.Nombre', 'producto.Precio', 'producto.Url', 'detalleventa.Cantidad')
            ->get();
        //dd($productos);
        //return view('notaventa.show', compact('notaventa','productos'));
        return view('client.detalleCompra', compact('notaventa', 'productos'));
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
