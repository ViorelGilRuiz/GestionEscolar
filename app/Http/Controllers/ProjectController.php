<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::where('user_id', auth()->id())->get();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'horas_previstas' => 'required|integer|min:0',
            'fecha_comienzo' => 'required|date',
        ]);

        $project = new Project($validated);
        $project->user_id = auth()->id();
        $project->save();

        session()->flash('success', 'El proyecto "' . $project->titulo . '" ha sido creado correctamente.');
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $this->authorize('view', $project);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $this->authorize('update', $project);
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $this->authorize('update', $project);
        
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'horas_previstas' => 'required|integer|min:0',
            'fecha_comienzo' => 'required|date',
        ]);

        $project->update($validated);

        session()->flash('success', 'El proyecto "' . $project->titulo . '" ha sido actualizado con éxito.');
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);
        
        $titulo = $project->titulo;
        $project->delete();

        session()->flash('success', 'El proyecto "' . $titulo . '" ha sido eliminado correctamente.');
        return redirect()->route('projects.index');
    }
}
