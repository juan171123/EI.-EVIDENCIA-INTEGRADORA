<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;

class VentaController extends Controller
{
    /*** Display a listing of the resource.*/
    public function index()
    {
        $ventas = Venta::all();
        //enviar los datos a la vista index
        return view('venta.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('venta.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validacion simple para obligar a llenar el formulario
        $request->validate([
            'producto' => 'required',
            'cantidad' => 'required',
            'total'    => 'required',
            'fecha'    => 'required',
        ]);
        Venta::create([
            'producto' => $request->producto,
            'cantidad' => $request->cantidad,
            'total'    => $request->total,
            'fecha'    => $request->fecha,
        ]);

        return redirect()->route('ventas.index')
        ->with('success', 'Venta registrada');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    /**
     * Vista de la actualizacion
     */
    public function edit(Venta $venta)
    {
        //mandar la vista junto a la informacion de la venta
        return view('venta.edit', compact('venta'));
    }

    /**
     * Actualizar registro
     */
    public function update(Request $request, Venta $venta)
    {
        //Validacion simple para obligar a llenar el formulario
        $request->validate([
            'producto' => 'required',
            'cantidad' => 'required',
            'total'    => 'required',
            'fecha'    => 'required',
        ]);
        // Enviar todos los datos para actualizar
        $venta->update($request->all());

        //redireccionar al usuario a las ventas
        return redirect()->route('ventas.index')
        ->with('success', 'Venta actualizada');
    }

    /**
     * Eliminar
     */
    public function destroy(Venta $venta)
    {
        if(!auth()->user()->is_admin){
            return redirect()->route('ventas.index')
                ->with('error', 'No tienes permisos para eliminar.');
        }

        $venta->delete();
        return redirect()->route('ventas.index')
            ->with('warning', 'Producto Eliminado');
    }
}