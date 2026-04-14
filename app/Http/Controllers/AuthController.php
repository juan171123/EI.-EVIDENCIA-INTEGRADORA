<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    #METODO PARA REGRESAR LA VISTA DEL FORMULARIO DE REGISTRO
    public function registerForm(){
        return view ('auth.register');  
    }

    #METODO PARA GUARDAR LA INFORMACION DE REGISTRO
    public function register(Request $request){
        #VALIDACIONES PARA LOS CAMPOS DE FORMULARIO
        $request->validate([
            'name' => 'required',
            'email' => 'required |email|unique:users',
            'phone' => 'required',
            'password' => 'required |confirmed|min:8',
        ]);   
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_admin' => $request->has('is_admin')
        ]);
        return redirect()->route('admin-dashboard')
        ->with('success', 'Usuario registrado correctamente.');
        }

    //metodo para regresar a la vista del inicio de sesion 
    public function loginForm(){
        return view('auth.login');   
    }

    //metodo para iniciar sesion 
    public function login(Request $request){

        //validar la informacion del formulario
        $data = $request-> validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //intentar el inicio de sesion
        if(Auth::attempt($data)){

            //iniciar sesion y redireccionar al usuario con sesion activa
            $request ->session()-> regenerate();
            return redirect()->route('productos.index');
        }
        return back()->withErrors([
            'email' => 'Datos incorrectos',
        ]);
    }

    public function logout(Request $request){
        //Funcion para cerrar sesion
        Auth::logout();

        //Cierre de credenciales en las sesiones
        $request -> session() -> invalidate();
        $request -> session() -> regenerateToken();

        return redirect('/acceso');
    }
    
    //vista del panel de administrador
    public function adminDashboard(){
        return view('admin.dashboard');
    }
}
