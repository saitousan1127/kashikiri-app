@props([
    'theme' => 'blue',
])
@php
    if(!function_exists('getThemeClassForButton')){
        function getThemeClassForButton($theme) {
            return match ($theme) {
                'blue' => 'text-white bg-blue-500 hover:bg-blue-600
                focus:ring-blue-500',
                'red' => 'text-white bg-red-500 hover:bg-red-600
                focus:ring-red-500',
                'green' => 'text-white bg-green-500 hover:bg-green-600
                focus:ring-green-500',
                default => '',
             };
        }
    }
@endphp

<button
    type="submit"
    class="inline-flex justify-center py-2 px-4 border border-transparent
    shadow-sm text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2
    {{ getThemeClassForButton($theme) }}
    ">
    {{ $slot }}
</button>