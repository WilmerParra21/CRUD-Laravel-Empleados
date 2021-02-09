<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificarRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // el metodo nos sirve para pedir peticiones HTTP y nosotros necesitamos pedir quien esta logueado dentro de nuestro sistema
    public function handle(Request $request, Closure $next)
    {
        // trae los roles
        $roles = array_slice(func_get_args(), 2);

        if(auth()->user()->hasRol($roles)){

    return $next($request);
    }
       return redirect('/');
    }
}
