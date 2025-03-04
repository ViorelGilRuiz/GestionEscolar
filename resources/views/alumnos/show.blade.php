<x-layouts.layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6 flex justify-between items-center">
                        <h2 class="text-2xl font-bold text-gray-800">{{ __('Detalles del Alumno') }}</h2>
                        <a href="{{ route('alumnos.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                            {{ __('Volver al Listado') }}
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Información del Alumno -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">{{ __('Información Personal') }}</h3>
                            <div class="space-y-4">
                                <div>
                                    <x-input-label for="nombre" value="Nombre"/>
                                    <p class="mt-1 p-2 w-full bg-white rounded-md border border-gray-200">{{$alumno->nombre}}</p>
                                </div>
                                <div>
                                    <x-input-label for="email" value="Email"/>
                                    <p class="mt-1 p-2 w-full bg-white rounded-md border border-gray-200">{{$alumno->email}}</p>
                                </div>
                                <div>
                                    <x-input-label for="edad" value="Edad"/>
                                    <p class="mt-1 p-2 w-full bg-white rounded-md border border-gray-200">{{$alumno->edad}}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tabla de Idiomas -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">{{ __('Idiomas') }}</h3>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{__("Idioma")}}</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{__("Nivel")}}</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{__("Título")}}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($alumno->idiomas as $idioma)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-6 py-4 whitespace-nowrap">{{$idioma->nombre}}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{$idioma->nivel}}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{$idioma->titulo}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-4 mt-6">
                        <a href="{{ route('alumnos.edit', $alumno) }}" class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700">
                            {{ __('Editar') }}
                        </a>
                        <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700" onclick="return confirm('{{ __('¿Estás seguro de que deseas eliminar este alumno?') }}')">
                                {{ __('Eliminar') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.layout>
