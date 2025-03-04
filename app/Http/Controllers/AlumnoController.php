<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Idioma;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::with('idiomas')->paginate(10);
        return view('alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:alumnos,email',
            'edad' => 'required|integer|min:0|max:120',
            'idiomas' => 'array',
            'nivel' => 'array',
            'titulo' => 'array',
        ]);

        $alumno = Alumno::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'edad' => $request->edad,
        ]);

        if ($request->has('idiomas')) {
            foreach ($request->idiomas as $idioma) {
                $alumno->idiomas()->create([
                    'nombre' => $idioma,
                    'nivel' => $request->nivel[$idioma] ?? 'Básico',
                    'titulo' => $request->titulo[$idioma] ?? 'A1',
                ]);
            }
        }

        return redirect()->route('alumnos.index')
            ->with('success', __('Alumno creado correctamente'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:alumnos,email,' . $alumno->id,
            'edad' => 'required|integer|min:0|max:120',
            'idiomas' => 'array',
            'nivel' => 'array',
            'titulo' => 'array',
        ]);

        $alumno->update([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'edad' => $request->edad,
        ]);

        // Eliminar idiomas existentes
        $alumno->idiomas()->delete();

        // Agregar nuevos idiomas
        if ($request->has('idiomas')) {
            foreach ($request->idiomas as $idioma) {
                $alumno->idiomas()->create([
                    'nombre' => $idioma,
                    'nivel' => $request->nivel[$idioma] ?? 'Básico',
                    'titulo' => $request->titulo[$idioma] ?? 'A1',
                ]);
            }
        }

        return redirect()->route('alumnos.index')
            ->with('success', __('Alumno actualizado correctamente'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index')
            ->with('success', __('Alumno eliminado correctamente'));
    }
}
