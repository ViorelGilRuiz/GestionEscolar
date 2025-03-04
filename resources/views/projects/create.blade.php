<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nuevo Proyecto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('projects.store') }}" class="space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="titulo" :value="__('Título')" />
                            <x-text-input id="titulo" name="titulo" type="text" class="mt-1 block w-full" :value="old('titulo')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('titulo')" />
                        </div>

                        <div>
                            <x-input-label for="horas_previstas" :value="__('Horas Previstas')" />
                            <x-text-input id="horas_previstas" name="horas_previstas" type="number" class="mt-1 block w-full" :value="old('horas_previstas')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('horas_previstas')" />
                        </div>

                        <div>
                            <x-input-label for="fecha_comienzo" :value="__('Fecha de Comienzo')" />
                            <x-text-input id="fecha_comienzo" name="fecha_comienzo" type="date" class="mt-1 block w-full" :value="old('fecha_comienzo')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('fecha_comienzo')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Crear Proyecto') }}</x-primary-button>
                            <a href="{{ route('projects.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                {{ __('Cancelar') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 