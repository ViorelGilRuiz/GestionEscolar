<nav x-data="{ open: false }" class="bg-blue-600 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto p-4 lg:p-8">
        <div class="flex justify-between items-center">
            <!-- Logo y Título -->
            <div class="flex items-center space-x-8">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16 w-auto bg-white p-2 rounded">
                </a>
                <h1 class="text-white dark:text-white text-3xl font-semibold">{{ __('messages.Gestión de Escuela') }}</h1>
            </div>

            <!-- Menú derecho -->
            <div class="flex items-center space-x-6">
                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:space-x-4">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:bg-blue-700">
                        {{ __('messages.dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('alumnos.index')" :active="request()->routeIs('alumnos.*')" class="text-white hover:bg-blue-700">
                        {{ __('messages.Alumnos') }}
                    </x-nav-link>
                    <x-nav-link :href="route('proyectos.index')" :active="request()->routeIs('proyectos.*')" class="text-white hover:bg-blue-700">
                        {{ __('messages.projects') }}
                    </x-nav-link>
                </div>

                <!-- Language Selector -->
                <div class="relative ml-3">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none transition ease-in-out duration-150">
                                <div>
                                    @switch(App::getLocale())
                                        @case('es')
                                            🇪🇸 Español
                                            @break
                                        @case('en')
                                            🇬🇧 English
                                            @break
                                        @case('fr')
                                            🇫🇷 Français
                                            @break
                                        @case('de')
                                            🇩🇪 Deutsch
                                            @break
                                        @default
                                            🇪🇸 Español
                                    @endswitch
                                </div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <form method="POST" action="{{ route('language.switch') }}" id="language-form-es">
                                @csrf
                                <input type="hidden" name="locale" value="es">
                                <button type="submit" class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                    🇪🇸 Español
                                </button>
                            </form>

                            <form method="POST" action="{{ route('language.switch') }}" id="language-form-en">
                                @csrf
                                <input type="hidden" name="locale" value="en">
                                <button type="submit" class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                    🇬🇧 English
                                </button>
                            </form>

                            <form method="POST" action="{{ route('language.switch') }}" id="language-form-fr">
                                @csrf
                                <input type="hidden" name="locale" value="fr">
                                <button type="submit" class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                    🇫🇷 Français
                                </button>
                            </form>

                            <form method="POST" action="{{ route('language.switch') }}" id="language-form-de">
                                @csrf
                                <input type="hidden" name="locale" value="de">
                                <button type="submit" class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                    🇩🇪 Deutsch
                                </button>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Settings Dropdown -->
                <div class="relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-4 py-2 bg-blue-500 text-white border border-blue-400 rounded-lg text-sm font-medium hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-white focus:border-white transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-2">
                                    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('messages.profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    {{ __('messages.logout') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-white hover:text-gray-100 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden mt-4">
            <div class="space-y-2">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:bg-blue-700">
                    {{ __('messages.dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('alumnos.index')" :active="request()->routeIs('alumnos.*')" class="text-white hover:bg-blue-700">
                    {{ __('messages.Alumnos') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('proyectos.index')" :active="request()->routeIs('proyectos.*')" class="text-white hover:bg-blue-700">
                    {{ __('messages.projects') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 mt-4 border-t border-blue-400">
                <div class="space-y-2">
                    <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-blue-200">{{ Auth::user()->email }}</div>
                    
                    <!-- Selector de Idioma Responsive -->
                    <div class="mt-2">
                        <form method="POST" action="{{ route('language.switch') }}" class="w-full">
                            @csrf
                            <select name="locale" onchange="this.form.submit()" 
                                    class="w-full appearance-none bg-blue-500 text-white border border-blue-400 rounded-lg px-4 py-2 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-white focus:border-white transition-all duration-150 ease-in-out text-sm font-medium">
                                <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>Español</option>
                                <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                                <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>Français</option>
                                <option value="de" {{ app()->getLocale() == 'de' ? 'selected' : '' }}>Deutsch</option>
                            </select>
                        </form>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')" class="text-white hover:bg-blue-700">
                        {{ __('messages.profile') }}
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="text-white hover:bg-blue-700">
                            {{ __('messages.logout') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
