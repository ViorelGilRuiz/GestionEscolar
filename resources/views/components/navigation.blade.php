<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="{{ route('alumnos.index') }}">
                        <img class="h-8 w-8" src="{{ asset('images/logo.png') }}" alt="{{ __('School Management') }}">
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="{{ route('alumnos.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            {{ __('Students') }}
                        </a>
                        <a href="{{ route('about') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            {{ __('About Us') }}
                        </a>
                        <a href="{{ route('contact') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            {{ __('Contact') }}
                        </a>
                        <a href="{{ route('work-with-us') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            {{ __('Work with Us') }}
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Selector de idioma -->
            <div class="flex items-center">
                <div class="relative">
                    <button id="languageButton" class="flex items-center space-x-2 focus:outline-none">
                        <span>{{ __('Select Language') }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="languageDropdown" class="hidden absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                        <a href="{{ route('language', 'es') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <span class="mr-2">🇪🇸</span>
                            <span>Español</span>
                        </a>
                        <a href="{{ route('language', 'en') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <span class="mr-2">🇬🇧</span>
                            <span>English</span>
                        </a>
                        <a href="{{ route('language', 'fr') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <span class="mr-2">🇫🇷</span>
                            <span>Français</span>
                        </a>
                        <a href="{{ route('language', 'de') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <span class="mr-2">🇩🇪</span>
                            <span>Deutsch</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menú móvil -->
    <div class="md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('alumnos.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                {{ __('Students') }}
            </a>
            <a href="{{ route('about') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                {{ __('About Us') }}
            </a>
            <a href="{{ route('contact') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                {{ __('Contact') }}
            </a>
            <a href="{{ route('work-with-us') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                {{ __('Work with Us') }}
            </a>
        </div>
    </div>
</nav> 