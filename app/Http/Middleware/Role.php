<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next ): Response
    {
        if($request->user()->role->nom == 'Administrateur' ){
            return redirect('admin.index');
        }

        if($request->user()->role->nom == 'Gestionnaire de stock' ){
            return redirect('GestionnairesStock.index');
        }

        if($request->user()->role->nom == 'Maintenancier' ){
            return redirect('Maintenancier.index');
        }

        if($request->user()->role->nom == 'Fonctionnaire' ){
            return redirect('Fonctionnaire.index');
        }

        
        if($request->user()->role->nom == 'Avec no role' ){
            return redirect('Auth.loginpage')->with('success',"tu n'a pas autorisé pour connecter a votre compte");
        }


        return $next($request);
    }
}
