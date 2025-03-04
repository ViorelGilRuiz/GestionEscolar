<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class LanguageController extends Controller
{
    /**
     * Lista de idiomas soportados
     */
    protected $languages = ['es', 'en', 'fr', 'de'];

    /**
     * Cambiar el idioma de la aplicación
     */
    public function switchLang(Request $request)
    {
        // Validar el idioma
        $request->validate([
            'locale' => 'required|in:es,en,fr,de'
        ]);

        $locale = $request->locale;
        
        // Guardar el idioma en la sesión
        Session::put('locale', $locale);
        
        // Establecer el idioma en la aplicación
        App::setLocale($locale);
        
        return redirect()->back();
    }
}
