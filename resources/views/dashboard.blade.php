<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel de Control') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Estadísticas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-2">{{ __('Total Alumnos') }}</h3>
                        <p class="text-3xl font-bold">{{ $totalAlumnos }}</p>
                        <a href="{{ route('alumnos.index') }}" class="mt-4 inline-block text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                            {{ __('Ver todos →') }}
                        </a>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-2">{{ __('Total Proyectos') }}</h3>
                        <p class="text-3xl font-bold">{{ $totalProyectos }}</p>
                        <a href="{{ route('proyectos.index') }}" class="mt-4 inline-block text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                            {{ __('Ver todos →') }}
                        </a>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-2">{{ __('Total Asignaciones') }}</h3>
                        <p class="text-3xl font-bold">{{ $totalAsignaciones }}</p>
                    </div>
                </div>
            </div>

            <!-- Acciones Rápidas -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">{{ __('Acciones Rápidas') }}</h3>
                        <div class="space-y-2">
                            <a href="{{ route('alumnos.create') }}" class="inline-block w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                {{ __('Nuevo Alumno') }}
                            </a>
                            <a href="{{ route('proyectos.create') }}" class="inline-block w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                                {{ __('Nuevo Proyecto') }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">{{ __('Enlaces Rápidos') }}</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <a href="{{ route('alumnos.index') }}" class="text-center p-4 bg-gray-100 dark:bg-gray-700 rounded hover:bg-gray-200 dark:hover:bg-gray-600">
                                <i class="fas fa-users text-2xl mb-2 text-gray-600 dark:text-gray-300"></i>
                                <div class="text-sm text-gray-900 dark:text-gray-100">{{ __('Gestionar Alumnos') }}</div>
                            </a>
                            <a href="{{ route('proyectos.index') }}" class="text-center p-4 bg-gray-100 dark:bg-gray-700 rounded hover:bg-gray-200 dark:hover:bg-gray-600">
                                <i class="fas fa-project-diagram text-2xl mb-2 text-gray-600 dark:text-gray-300"></i>
                                <div class="text-sm text-gray-900 dark:text-gray-100">{{ __('Gestionar Proyectos') }}</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Proyectos Recientes -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">{{ __('Proyectos Recientes') }}</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('Título') }}</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('Fecha') }}</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('Alumnos') }}</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('Acciones') }}</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @forelse($proyectosRecientes as $proyecto)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $proyecto->titulo }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $proyecto->fecha_comienzo->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $proyecto->alumnos->count() }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('proyectos.show', $proyecto) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">{{ __('Ver') }}</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center text-gray-500 dark:text-gray-400">{{ __('No hay proyectos recientes') }}</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Alumnos Recientes -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">{{ __('Alumnos Recientes') }}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @forelse($alumnosRecientes as $alumno)
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-900 dark:text-gray-100">{{ $alumno->nombre }}</h4>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">{{ $alumno->email }}</p>
                            <p class="text-gray-500 dark:text-gray-400 text-sm mt-2">
                                {{ __('Proyectos asignados') }}: {{ $alumno->proyectos->count() }}
                            </p>
                            <a href="{{ route('alumnos.show', $alumno) }}" class="mt-2 inline-block text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 text-sm">
                                {{ __('Ver detalles →') }}
                            </a>
                        </div>
                        @empty
                        <div class="col-span-3 text-center text-gray-500 dark:text-gray-400">
                            {{ __('No hay alumnos recientes') }}
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
