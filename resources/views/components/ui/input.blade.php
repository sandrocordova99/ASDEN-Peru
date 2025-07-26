@props([
'label' => null,
'name' => '',
'type' => 'text',
'placeholder' => '',
'value' => '',
'size' => 'md', // sm, md, lg
'rounded' => 'md', // none, sm, md, lg, full
'disabled' => false,
'error' => null, // Se puede pasar manualmente o detectarlo vía $errors
])

@php
// Determinamos si hay un error para el campo
$errorMessage = $error ?? $errors->first($name);

// Clases base
$baseClasses = 'block w-full border transition duration-200 focus:outline-none';

// Clases de tamaño
$sizeClasses = match ($size) {
'sm' => 'px-3 py-1 text-sm',
'md' => 'px-4 py-2 text-base',
'lg' => 'px-5 py-3 text-lg',
default => 'px-4 py-2 text-base',
};

// Clases de borde redondeado
$roundedClasses = match ($rounded) {
'none' => 'rounded-none',
'sm' => 'rounded-sm',
'md' => 'rounded-md',
'lg' => 'rounded-lg',
'full' => 'rounded-full',
default => 'rounded-md',
};

// Clases si está deshabilitado
$disabledClasses = $disabled ? 'opacity-50 cursor-not-allowed' : '';

// Clases en caso de error
$errorClasses = $errorMessage
? 'border-red-500 focus:ring-2 focus:ring-red-400'
: 'border-gray-300 focus:ring-2 focus:ring-green-500';

// Clases finales
$finalClasses = "$baseClasses $sizeClasses $roundedClasses $disabledClasses $errorClasses";
@endphp

<div class="mb-4">
    {{-- Etiqueta (opcional) --}}
    @if($label)
    <label for="{{ $name }}" class="block mb-1 font-medium text-gray-700">
        {{ $label }}
    </label>
    @endif

    {{-- Input --}}
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        placeholder="{{ $placeholder }}"
        value="{{ old($name, $value) }}"
        @if($disabled) disabled @endif
        {{ $attributes->merge(['class' => $finalClasses]) }} />

    {{-- Mensaje de error (si aplica) --}}
    @if($errorMessage)
    <p class="mt-1 text-sm text-red-500">{{ $errorMessage }}</p>
    @endif
</div>


{{-- O puedes omitirlo si quieres que el componente lo maneje automáticamente 
<!-- Ejemplo 1: input con label y validación automática desde $errors -->
<x-ui.input
    label="Correo electrónico"
    name="email"
    type="email"
    placeholder="ejemplo@dominio.com"
    :error="$errors->first('email')"  
/>--}}