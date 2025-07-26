@props([
    'type' => 'button',
    'size' => 'md',
    'rounded' => 'md', // Valores: none, sm, md, lg, full
    'disabled' => false,
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium transition duration-200 focus:outline-none';
    $sizeClasses = match ($size) {
        'sm' => 'px-3 py-1 text-sm',
        'md' => 'px-4 py-2 text-base',
        'lg' => 'px-5 py-3 text-lg',
        default => 'px-4 py-2 text-base',
    };
    $roundedClasses = match ($rounded) {
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'md' => 'rounded-md',
        'lg' => 'rounded-lg',
        'full' => 'rounded-full',
        default => 'rounded-md',
    };
    $disabledClasses = $disabled ? 'opacity-50 cursor-not-allowed' : '';
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => "$baseClasses $sizeClasses $roundedClasses $disabledClasses"]) }} @if($disabled) disabled @endif>
    {{ $slot }}
</button>

{{-- Ejemplos --}}
{{-- <x-ui.button class="bg-blue-600 text-white hover:bg-blue-700 focus:ring-2 focus:ring-blue-300" size="lg"
    rounded="full">
    Botón Redondo
</x-ui.button> --}}