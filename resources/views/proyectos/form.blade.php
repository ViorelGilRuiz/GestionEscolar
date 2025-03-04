@csrf

<div class="grid gap-6 mb-6">
    <div>
        <x-input-label for="titulo" :value="__('Título')" />
        <x-text-input id="titulo" name="titulo" type="text" class="mt-1 block w-full" :value="old('titulo', $proyecto->titulo ?? '')" required autofocus autocomplete="titulo" />
        <x-input-error class="mt-2" :messages="$errors->get('titulo')" />
    </div>

    <div>
        <x-input-label for="horas_previstas" :value="__('Horas Previstas')" />
        <x-text-input id="horas_previstas" name="horas_previstas" type="number" class="mt-1 block w-full" :value="old('horas_previstas', $proyecto->horas_previstas ?? '')" required />
        <x-input-error class="mt-2" :messages="$errors->get('horas_previstas')" />
    </div>

    <div>
        <x-input-label for="fecha_comienzo" :value="__('Fecha de Comienzo')" />
        <x-text-input id="fecha_comienzo" name="fecha_comienzo" type="date" class="mt-1 block w-full" :value="old('fecha_comienzo', isset($proyecto) ? $proyecto->fecha_comienzo->format('Y-m-d') : '')" required />
        <x-input-error class="mt-2" :messages="$errors->get('fecha_comienzo')" />
    </div>

    @if(isset($alumnos) && count($alumnos) > 0)
    <div>
        <x-input-label :value="__('Alumnos Asignados')" />
        <div class="mt-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($alumnos as $alumno)
            <div class="flex items-center">
                <input type="checkbox" 
                       name="alumnos[]" 
                       value="{{ $alumno->id }}"
                       id="alumno_{{ $alumno->id }}"
                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                       {{ (isset($proyecto) && $proyecto->alumnos->contains($alumno->id)) ? 'checked' : '' }}>
                <label for="alumno_{{ $alumno->id }}" class="ml-2 text-sm text-gray-600 dark:text-gray-400">
                    {{ $alumno->nombre }}
                </label>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Guardar') }}</x-primary-button>
        <a href="{{ route('proyectos.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
            {{ __('Cancelar') }}
        </a>
    </div>
</div> 