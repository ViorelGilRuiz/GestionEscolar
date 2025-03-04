@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-blue-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-white transition-all duration-150 ease-in-out'
            : 'inline-flex items-center px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-white transition-all duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
