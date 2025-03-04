<x-layouts.layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">{{ __('Crear Nuevo Alumno') }}</h2>
                        <p class="mt-1 text-sm text-gray-600">{{ __('Ingresa la información del nuevo alumno y sus idiomas.') }}</p>
                    </div>

                    <form action="{{ route('alumnos.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Información básica -->
                            <div class="space-y-6">
                                <div>
                                    <label for="nombre" class="block text-sm font-medium text-gray-700">
                                        {{ __('Nombre Completo') }}
                                    </label>
                                    <input type="text" name="nombre" id="nombre" 
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('nombre') border-red-500 @enderror"
                                        value="{{ old('nombre') }}" required>
                                    @error('nombre')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">
                                        {{ __('Correo Electrónico') }}
                                    </label>
                                    <input type="email" name="email" id="email"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('email') border-red-500 @enderror"
                                        value="{{ old('email') }}" required>
                                    @error('email')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="edad" class="block text-sm font-medium text-gray-700">
                                        {{ __('Edad') }}
                                    </label>
                                    <input type="number" name="edad" id="edad"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('edad') border-red-500 @enderror"
                                        value="{{ old('edad') }}" required min="0" max="120">
                                    @error('edad')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
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
                                                    id="idioma_{{ $loop->index }}">
                                                <label for="idioma_{{ $loop->index }}" class="text-sm font-medium text-gray-700">
                                                    {{ $idioma }}
                                                </label>
                                            </div>
                                            
                                            <div class="mt-3 grid grid-cols-2 gap-3">
                                                <div>
                                                    <label class="block text-xs font-medium text-gray-500">{{ __('Nivel') }}</label>
                                                    <select name="nivel[{{ $idioma }}]" 
                                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                        <option value="Básico">{{ __('Básico') }}</option>
                                                        <option value="Intermedio">{{ __('Intermedio') }}</option>
                                                        <option value="Avanzado">{{ __('Avanzado') }}</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label class="block text-xs font-medium text-gray-500">{{ __('Título') }}</label>
                                                    <select name="titulo[{{ $idioma }}]"
                                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                        <option value="A1">A1</option>
                                                        <option value="A2">A2</option>
                                                        <option value="B1">B1</option>
                                                        <option value="B2">B2</option>
                                                        <option value="C1">C1</option>
                                                        <option value="C2">C2</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3 mt-6">
                            <a href="{{ route('alumnos.index') }}" 
                                class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Cancelar') }}
                            </a>
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Guardar Alumno') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.layout>
