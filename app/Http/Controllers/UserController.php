<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('usuario.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'required',
            'password' => 'required|min:6',
            'is_admin' => 'boolean',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => bcrypt($request->password),
            'is_admin' => $request->boolean('is_admin'),
        ]);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado');
    }

    public function show(string $id) {}

    public function edit(User $usuario)
    {
        return view('usuario.edit', compact('usuario'));
    }

    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,' . $usuario->id,
            'phone' => 'required',
        ]);

        $datos = $request->only(['name', 'email', 'phone']);
        $datos['is_admin'] = $request->boolean('is_admin');

        if ($request->filled('password')) {
            $datos['password'] = bcrypt($request->password);
        }

        $usuario->update($datos);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado');
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')
            ->with('warning', 'Usuario eliminado');
    }
}