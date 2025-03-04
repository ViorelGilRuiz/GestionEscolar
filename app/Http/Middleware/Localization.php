<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Si hay un idioma en la sesión, usarlo
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        } else {
            // Si no hay idioma en la sesión, usar el idioma por defecto (español)
            App::setLocale('es');
            Session::put('locale', 'es');
        }

        return $next($request);
    }
} 