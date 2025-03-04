<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyectos = Proyecto::with('alumnos')->get();
        return view('proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alumnos = Alumno::all();
        return view('proyectos.create', compact('alumnos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'horas_previstas' => 'required|integer|min:1',
            'fecha_comienzo' => 'required|date',
            'alumnos' => 'array'
        ]);

        $proyecto = Proyecto::create([
            'titulo' => $request->titulo,
            'horas_previstas' => $request->horas_previstas,
            'fecha_comienzo' => $request->fecha_comienzo,
            'user_id' => auth()->id()
        ]);

        if ($request->has('alumnos')) {
            $proyecto->alumnos()->attach($request->alumnos);
        }

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto)
    {
        $proyecto->load('alumnos');
        return view('proyectos.show', compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyecto $proyecto)
    {
        $alumnos = Alumno::all();
        $alumnosAsignados = $proyecto->alumnos->pluck('id')->toArray();
        return view('proyectos.edit', compact('proyecto', 'alumnos', 'alumnosAsignados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'horas_previstas' => 'required|integer|min:1',
            'fecha_comienzo' => 'required|date',
            'alumnos' => 'array'
        ]);

        $proyecto->update([
            'titulo' => $request->titulo,
            'horas_previstas' => $request->horas_previstas,
            'fecha_comienzo' => $request->fecha_comienzo
        ]);

        $proyecto->alumnos()->sync($request->alumnos ?? []);

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto)
    {
        $proyecto->alumnos()->detach();
        $proyecto->delete();

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto eliminado exitosamente.');
    }
}
