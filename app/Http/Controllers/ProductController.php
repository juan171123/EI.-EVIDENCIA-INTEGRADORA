<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();

        //enviar los datos a la vista index
        return view('producto.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'     => 'required',
            'cantidad'   => 'required',
            'categoria'  => 'required',
            'descuento'  => 'required',
            'precio'     => 'required',
        ]);

         Producto::create([
        'nombre'=>$request->nombre,
        'cantidad'=>$request->cantidad,
        'categoria'=>$request->categoria,
        'descuento'=>$request->descuento,
        'precio'=>$request->precio,
        ]);
        return redirect()->route('productos.index')
        ->with('success', 'Producto creado');
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
    public function edit(Producto $producto)
    {
        //mandar la vista junto a la informacion del producto
        return view('producto.edit', compact('producto'));
    }

    /**
     * Actualizar registro
     */
    public function update(Request $request, Producto $producto)
    {
        //Validacion simple para obligar a llenar el formulario
        $request -> validate([
            'nombre' => 'required',
            'cantidad' => 'required',
            'categoria' => 'required',
            'descuento' => 'required',
            'precio' => 'required',

        ]);
        // Enviar todos los datos para actualizar
        $producto->update($request->all());

        //redireccionar al usuario a los libros 
        return redirect()->route('productos.index')
        ->with('success', 'Registro actualizado');
    }

    /**
     * eliminar
     */
    public function destroy(Producto $producto)
    {
        if(!auth()->user()->is_admin){
            return redirect()->route('productos.index')
                ->with('error', 'No tienes permisos para eliminar.');
        }

        $producto->delete();
        return redirect()->route('productos.index')
            ->with('warning', 'Producto Eliminado');
    }

    //Obtener productos mediante API
    public function home(){

        $response = Http::get('https://dummyjson.com/products?limit=100')->json();
        $productos = $response['products'] ?? [];

        return view('producto.home', compact('productos'));
    }
}   