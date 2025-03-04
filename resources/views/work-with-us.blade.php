<x-layouts.layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">{{ __('Trabaja con Nosotros') }}</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Formulario de aplicación -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">{{ __('Aplica para un puesto') }}</h3>
                            <form action="#" method="POST" class="space-y-4" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <x-input-label for="nombre" value="{{ __('Nombre Completo') }}" />
                                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" required />
                                </div>

                                <div>
                                    <x-input-label for="email" value="{{ __('Email') }}" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required />
                                </div>

                                <div>
                                    <x-input-label for="telefono" value="{{ __('Teléfono') }}" />
                                    <x-text-input id="telefono" class="block mt-1 w-full" type="tel" name="telefono" required />
                                </div>

                                <div>
                                    <x-input-label for="puesto" value="{{ __('Puesto de Interés') }}" />
                                    <select id="puesto" name="puesto" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <option value="">{{ __('Selecciona un puesto') }}</option>
                                        <option value="profesor">{{ __('Profesor de Idiomas') }}</option>
                                        <option value="administrativo">{{ __('Personal Administrativo') }}</option>
                                        <option value="coordinador">{{ __('Coordinador Académico') }}</option>
                                    </select>
                                </div>

                                <div>
                                    <x-input-label for="cv" value="{{ __('Curriculum Vitae') }}" />
                                    <input type="file" id="cv" name="cv" class="block mt-1 w-full" accept=".pdf,.doc,.docx" required />
                                    <p class="mt-1 text-sm text-gray-500">{{ __('Formatos aceptados: PDF, DOC, DOCX') }}</p>
                                </div>

                                <div>
                                    <x-input-label for="mensaje" value="{{ __('Mensaje') }}" />
                                    <textarea id="mensaje" name="mensaje" rows="4" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required></textarea>
                                </div>

                                <div class="flex justify-end">
                                    <x-button class="bg-indigo-600 hover:bg-indigo-700">
                                        {{ __('Enviar Aplicación') }}
                                    </x-button>
                                </div>
                            </form>
                        </div>

                        <!-- Información sobre trabajar con nosotros -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">{{ __('¿Por qué trabajar con nosotros?') }}</h3>
                            <div class="space-y-4">
                                <div>
                                    <h4 class="font-medium text-gray-700">{{ __('Beneficios') }}</h4>
                                    <ul class="mt-2 list-disc list-inside text-gray-600">
                                        <li>{{ __('Ambiente de trabajo dinámico y multicultural') }}</li>
                                        <li>{{ __('Oportunidades de desarrollo profesional') }}</li>
                                        <li>{{ __('Formación continua') }}</li>
                                        <li>{{ __('Horarios flexibles') }}</li>
                                        <li>{{ __('Seguro médico privado') }}</li>
                                    </ul>
                                </div>

                                <div>
                                    <h4 class="font-medium text-gray-700">{{ __('Requisitos Generales') }}</h4>
                                    <ul class="mt-2 list-disc list-inside text-gray-600">
                                        <li>{{ __('Título universitario') }}</li>
                                        <li>{{ __('Experiencia en el sector educativo') }}</li>
                                        <li>{{ __('Dominio de al menos dos idiomas') }}</li>
                                        <li>{{ __('Habilidades de comunicación') }}</li>
                                    </ul>
                                </div>

                                <div>
                                    <h4 class="font-medium text-gray-700">{{ __('Proceso de Selección') }}</h4>
                                    <ol class="mt-2 list-decimal list-inside text-gray-600">
                                        <li>{{ __('Revisión de CV') }}</li>
                                        <li>{{ __('Entrevista inicial') }}</li>
                                        <li>{{ __('Prueba práctica') }}</li>
                                        <li>{{ __('Entrevista final') }}</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.layout> 