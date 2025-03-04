<x-dropdown>
    <x-slot name="trigger" class="text-3xl border-gray-200 p-2">
        @php
            $currentLocale = App::getLocale();
            $currentLang = config('languages.available')[$currentLocale] ?? ['name' => 'Español', 'flag' => '🇪🇸'];
        @endphp
        {{$currentLang['name']}}
        {{$currentLang['flag']}}
    </x-slot>
    <x-slot name="content">
        @foreach(config('languages.available') as $code => $lang)
            <div class="text-black text-2xl p-3 m-2">
                <form method="POST" action="{{ route('language.switch') }}" class="inline">
                    @csrf
                    <input type="hidden" name="locale" value="{{ $code }}">
                    <button type="submit" class="w-full text-left hover:bg-gray-200">
                        <span>{{$lang['name']}} </span>
                        <span>{{$lang['flag']}} </span>
                    </button>
                </form>
            </div>
        @endforeach
    </x-slot>
</x-dropdown>
