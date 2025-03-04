<x-layouts.layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">{{ __('Contacto') }}</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Formulario de contacto -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">{{ __('Envíanos un mensaje') }}</h3>
                            <form action="#" method="POST" class="space-y-4">
                                @csrf
                                <div>
                                    <x-input-label for="nombre" value="{{ __('Nombre') }}" />
                                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" required />
                                </div>

                                <div>
                                    <x-input-label for="email" value="{{ __('Email') }}" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required />
                                </div>

                                <div>
                                    <x-input-label for="mensaje" value="{{ __('Mensaje') }}" />
                                    <textarea id="mensaje" name="mensaje" rows="4" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required></textarea>
                                </div>

                                <div class="flex justify-end">
                                    <x-button class="bg-indigo-600 hover:bg-indigo-700">
                                        {{ __('Enviar Mensaje') }}
                                    </x-button>
                                </div>
                            </form>
                        </div>

                        <!-- Información de contacto -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">{{ __('Información de Contacto') }}</h3>
                            <div class="space-y-4">
                                <div>
                                    <h4 class="font-medium text-gray-700">{{ __('Dirección') }}</h4>
                                    <p class="text-gray-600">Calle Principal 123<br>28001 Madrid, España</p>
                                </div>

                                <div>
                                    <h4 class="font-medium text-gray-700">{{ __('Teléfono') }}</h4>
                                    <p class="text-gray-600">+34 91 123 45 67</p>
                                </div>

                                <div>
                                    <h4 class="font-medium text-gray-700">{{ __('Email') }}</h4>
                                    <p class="text-gray-600">info@escuelaidiomas.com</p>
                                </div>

                                <div>
                                    <h4 class="font-medium text-gray-700">{{ __('Horario') }}</h4>
                                    <p class="text-gray-600">
                                        {{ __('Lunes a Viernes') }}: 9:00 - 20:00<br>
                                        {{ __('Sábados') }}: 9:00 - 14:00
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.layout> 