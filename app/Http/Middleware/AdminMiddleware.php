<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //verificar si la sesion del usuario esta activa
        if(!Auth::check()){
            return redirect()->route('registro')
            ->with('error','Se debe registrar e iniciar sesion');
        }
        //verificar si el usuario es administrador
        if(!Auth::user()->is_admin){//obtiene la info dela bd para saber si es admin
            return redirect()->route('productos.index')
            ->with('error','No tienes permisos de administrador');
        }
        return $next($request);
    }
}
