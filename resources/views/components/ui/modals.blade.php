@props([
    'title' => null,
    'isOpen' => false,  // Valor inicial: true (abierto) o false (cerrado)
    'padding' => 'md',   // Opciones: sm, md, lg
    'shadow' => 'md',   // Opciones: none, sm, md, lg, xl
    'rounded' => 'md',   // Opciones: none, sm, md, lg, full
    'modalId' => '',      // Identificador único para este modal
    'maxWidth' => 'lg'   // Opciones: sm, md, lg, xl
])

@php
    // Convertir isOpen a booleano
    $openState = filter_var($isOpen, FILTER_VALIDATE_BOOLEAN);

    // Clases base para el contenedor del modal
    $baseClasses = "bg-white";

    // Clases de padding
    $paddingClasses = match ($padding) {
        'sm' => 'p-2',
        'md' => 'p-4',
        'lg' => 'p-6',
        default => 'p-4',
    };

    // Clases de sombra
    $shadowClasses = match ($shadow) {
        'none' => 'shadow-none',
        'sm' => 'shadow-sm',
        'md' => 'shadow-md',
        'lg' => 'shadow-lg',
        'xl' => 'shadow-xl',
        default => 'shadow-md',
    };

    // Clases de redondeado
    $roundedClasses = match ($rounded) {
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'md' => 'rounded-md',
        'lg' => 'rounded-lg',
        'full' => 'rounded-full',
        default => 'rounded-md',
    };

    $maxClass = match ($maxWidth){
        'sm' => 'max-w-sm',
        'md' => 'max-w-md',
        'lg' => 'max-w-lg',
        'xl' => 'max-w-xl',
        default => 'max-w-lg',
    }
@endphp

<!-- Overlay que oscurece el fondo -->
<div x-data="{ open: @js($openState) }" x-init="
  window.addEventListener('open-modal', event => {
    if(event.detail.modalId === '{{ $modalId }}') { 
      open = true; 
      document.body.style.overflow = 'hidden'; 
    }
  });
  window.addEventListener('close-modal', event => {
    if(event.detail.modalId === '{{ $modalId }}') { 
      open = false; 
      document.body.style.overflow = ''; 
    }
  });
  
  $watch('open', value => {
    if (!value) {
      document.body.style.overflow = '';
    }
  });
"
    x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" style="display: none;">
    <!-- Contenedor del contenido del modal -->
    <div class="{{ $baseClasses }} {{ $shadowClasses }} {{ $roundedClasses }} {{ $paddingClasses }} relative w-full {{ $maxClass }} mx-6 md:mx-0"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90">
        <!-- Botón de cierre (X) -->
        <button @click="open = false" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <!-- Título del modal -->
        <h2 class="text-xl font-bold mb-4">{{ $title }}</h2>

        <!-- Contenido dinámico (slot) -->
        {{ $slot }}
    </div>
</div>