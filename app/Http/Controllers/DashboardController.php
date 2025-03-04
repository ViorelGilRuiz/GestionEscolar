<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAlumnos = Alumno::count();
        $totalProyectos = Proyecto::count();
        $totalAsignaciones = \DB::table('alumno_proyecto')->count();

        $proyectosRecientes = Proyecto::with('alumnos')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $alumnosRecientes = Alumno::with('proyectos')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return view('dashboard', compact(
            'totalAlumnos',
            'totalProyectos',
            'totalAsignaciones',
            'proyectosRecientes',
            'alumnosRecientes'
        ));
    }
} 