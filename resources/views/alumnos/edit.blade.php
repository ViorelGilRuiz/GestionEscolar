<x-layouts.layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6 flex justify-between items-center">
                        <h2 class="text-2xl font-bold text-gray-800">{{ __('Editar Alumno') }}</h2>
                        <a href="{{ route('alumnos.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                            {{ __('Volver al Listado') }}
                        </a>
                    </div>

                    <form action="{{ route('alumnos.update', $alumno) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Información básica -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">{{ __('Información Personal') }}</h3>
                                <div class="space-y-4">
                                    <div>
                                        <x-input-label for="nombre" value="Nombre" />
                                        <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" 
                                            value="{{ old('nombre', $alumno->nombre) }}" required />
                                        @error('nombre')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <x-input-label for="email" value="Email" />
                                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" 
                                            value="{{ old('email', $alumno->email) }}" required />
                                        @error('email')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <x-input-label for="edad" value="Edad" />
                                        <x-text-input id="edad" class="block mt-1 w-full" type="number" name="edad" 
                                            value="{{ old('edad', $alumno->edad) }}" required min="0" max="120" />
                                        @error('edad')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Selección de idiomas -->
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">{{ __('Idiomas') }}</h3>
                                <div class="space-y-4 max-h-[400px] overflow-y-auto">
                                    @foreach(config('idiomas') as $idioma)
                                        <div class="p-4 bg-white rounded-lg shadow">
                                            <div class="flex items-center space-x-3">
                                                <input type="checkbox" name="idiomas[]" value="{{ $idioma }}"
                                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                                    id="idioma_{{ $loop->index }}"
                                                    {{ $alumno->idiomas->contains('nombre', $idioma) ? 'checked' : '' }}>
                                                <label for="idioma_{{ $loop->index }}" class="text-sm font-medium text-gray-700">
                                                    {{ $idioma }}
                                                </label>
                                            </div>
                                            
                                            <div class="mt-3 grid grid-cols-2 gap-3">
                                                <div>
                                                    <label class="block text-xs font-medium text-gray-500">{{ __('Nivel') }}</label>
                                                    <select name="nivel[{{ $idioma }}]" 
                                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                        @php
                                                            $idiomaActual = $alumno->idiomas->where('nombre', $idioma)->first();
                                                            $nivelActual = $idiomaActual ? $idiomaActual->nivel : 'Básico';
                                                        @endphp
                                                        <option value="Básico" {{ $nivelActual == 'Básico' ? 'selected' : '' }}>{{ __('Básico') }}</option>
                                                        <option value="Intermedio" {{ $nivelActual == 'Intermedio' ? 'selected' : '' }}>{{ __('Intermedio') }}</option>
                                                        <option value="Avanzado" {{ $nivelActual == 'Avanzado' ? 'selected' : '' }}>{{ __('Avanzado') }}</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label class="block text-xs font-medium text-gray-500">{{ __('Título') }}</label>
                                                    <select name="titulo[{{ $idioma }}]"
                                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                        @php
                                                            $tituloActual = $idiomaActual ? $idiomaActual->titulo : 'A1';
                                                        @endphp
                                                        <option value="A1" {{ $tituloActual == 'A1' ? 'selected' : '' }}>A1</option>
                                                        <option value="A2" {{ $tituloActual == 'A2' ? 'selected' : '' }}>A2</option>
                                                        <option value="B1" {{ $tituloActual == 'B1' ? 'selected' : '' }}>B1</option>
                                                        <option value="B2" {{ $tituloActual == 'B2' ? 'selected' : '' }}>B2</option>
                                                        <option value="C1" {{ $tituloActual == 'C1' ? 'selected' : '' }}>C1</option>
                                                        <option value="C2" {{ $tituloActual == 'C2' ? 'selected' : '' }}>C2</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-4 mt-6">
                            <a href="{{ route('alumnos.show', $alumno) }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                {{ __('Cancelar') }}
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                                {{ __('Guardar Cambios') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.layout>
