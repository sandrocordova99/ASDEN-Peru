@props([
    'padding' => 'md', // sm, md, lg
    'shadow' => 'md',  // none, sm, md, lg, xl
    'rounded' => 'md', // none, sm, md, lg, full
    'image' => null,   // URL de la imagen
    'title' => null,   // Título de la tarjeta
    'description' => null, // Descripción de la tarjeta
    'buttonText' => null, // Texto del botón
    'buttonLink' => null // Enlace del botón
])

@php
    // Se mantiene un fondo blanco por defecto, sin bordes
    $baseClasses = "bg-white cursor-default";
    $paddingClasses = match ($padding) {
        'sm' => 'p-2',
        'md' => 'p-4',
        'lg' => 'p-6',
        default => 'p-4',
    };
    $shadowClasses = match ($shadow) {
        'none' => 'shadow-none',
        'sm' => 'shadow-sm',
        'md' => 'shadow-md',
        'lg' => 'shadow-lg',
        'xl' => 'shadow-xl',
        default => 'shadow-md',
    };
    $roundedClasses = match ($rounded) {
        'none' => 'rounded-none',
        'sm' => 'rounded-sm',
        'md' => 'rounded-md',
        'lg' => 'rounded-lg',
        'full' => 'rounded-full',
        default => 'rounded-md',
    };
@endphp

<!-- Contenedor principal sin padding para que la imagen ocupe todo el ancho -->
<div 
    {{ $attributes->merge(['class' => "$baseClasses $shadowClasses $roundedClasses overflow-hidden transition-transform duration-300 ease-in-out hover:scale-105"]) }}>
    @if ($image)
        <img loading="lazy" src="{{ $image }}" alt="{{ $title ?? 'Imagen' }}" class="w-full h-48 rounded-3xl object-cover">
    @endif

    <!-- Contenedor de contenido con padding -->
    <div class="{{ $paddingClasses }}">
        @if ($title)
            <h2 class="text-xl font-semibold">{{ $title }}</h2>
        @endif
        @if ($description)
            <p class="mt-2">{{ $description }}</p>
        @endif
        <div class="mt-3 flex justify-between content-center">
            @if ($buttonLink)
                <a class="my-auto" target="_blank" href="{{ $buttonLink }}">
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" viewBox="0 0 256 256"><path d="M218.123 218.127h-37.931v-59.403c0-14.165-.253-32.4-19.728-32.4-19.756 0-22.779 15.434-22.779 31.369v60.43h-37.93V95.967h36.413v16.694h.51a39.907 39.907 0 0 1 35.928-19.733c38.445 0 45.533 25.288 45.533 58.186l-.016 67.013ZM56.955 79.27c-12.157.002-22.014-9.852-22.016-22.009-.002-12.157 9.851-22.014 22.008-22.016 12.157-.003 22.014 9.851 22.016 22.008A22.013 22.013 0 0 1 56.955 79.27m18.966 138.858H37.95V95.967h37.97v122.16ZM237.033.018H18.89C8.58-.098.125 8.161-.001 18.471v219.053c.122 10.315 8.576 18.582 18.89 18.474h218.144c10.336.128 18.823-8.139 18.966-18.474V18.454c-.147-10.33-8.635-18.588-18.966-18.453" fill="#0A66C2"/></svg>
                </a>
            @endif
        {{$slot}}
        </div>
    </div>
</div>


{{-- Ejemplos --}}
{{-- <x-ui.card padding="lg" shadow="xl" rounded="lg"
    image="https://s1.significados.com/foto/shutterstock-464585387_sm.jpg?class=article" title="Título de la Tarjeta"
    description="Esta es una descripción breve del contenido de la tarjeta." buttonText="Ver más"
    buttonLink="https://ejemplo.com" class="max-w-sm bg-gray-100 text-gray-800" />
--}}