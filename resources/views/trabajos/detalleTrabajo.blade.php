@extends('layouts.apppage')

@section('title', 'Detalles del Trabajo')

@section('content')
<section class="container mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-24 bg-gray-50">
    <a href="{{ url('/jobBoard') }}" 
       class="inline-flex items-center gap-2 mb-6 mt-4 text-blue-600 hover:text-blue-800 hover:underline hover:shadow-sm transition duration-200 ease-in-out">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span>Volver a la lista</span>
    </a>

    <div class="w-full max-w-7xl mx-auto p-6 shadow-lg rounded-xl bg-white overflow-hidden">
        <div class="mb-8">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-lg flex items-center justify-center mr-4" style="background-color: {{ $trabajo->color }};">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900">{{ $trabajo->titulo }}</h1>
            </div>
            <div class="flex flex-wrap gap-4 mt-3 text-gray-600 text-sm">
                <span class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ $trabajo->tipo_trabajo }}
                </span>
                <span class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    {{ $trabajo->modalidad }}
                </span>
            </div>
        </div>

        <article class="w-full text-center grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch">
            <!-- Primera columna -->
            <div class="md:col-span-1 space-y-5">
                <div class="flex flex-col h-[300px]">
                    <h3 class="text-white font-semibold rounded-md p-2 text-sm md:text-base" style="background-color: {{ $trabajo->color }}">Detalles</h3>
                    <p class="shadow-md p-3 text-sm md:text-base flex-grow text-pretty overflow-y-auto">{{ $trabajo->descripcion }}</p>
                </div>
                <div class="flex flex-col h-[300px]">
                    <h3 class="text-white font-semibold rounded-md p-2 text-sm md:text-base" style="background-color: {{ $trabajo->color }}">Funciones</h3>
                    <p class="shadow-md p-3 text-sm md:text-base flex-grow text-pretty overflow-y-auto">{{ $trabajo->funciones }}</p>
                </div>
            </div>

            <!-- Imagen -->
<div class="flex items-center justify-center md:col-span-1">
    <div class="w-80 h-80 md:w-60 md:h-60 rounded-full border-4 border-gray-300 flex items-center justify-center overflow-hidden bg-gray-100">
        @if ($trabajo->imagen)
            <img src="{{ asset('storage/' . $trabajo->imagen) }}" alt="Imagen del trabajo" class="w-full h-full object-cover aspect-square">
        @else
            <span class="text-gray-400 text-sm">Imagen del trabajo</span>
        @endif
    </div>
</div>




            <!-- Tercera columna -->
            <div class="md:col-span-1 space-y-5">
                <div class="flex flex-col h-[300px]">
                    <h3 class="text-white font-semibold rounded-md p-2 text-sm md:text-base" style="background-color: {{ $trabajo->color }}">Beneficios</h3>
                    <p class="shadow-md p-3 text-sm md:text-base flex-grow text-pretty overflow-y-auto">{{ $trabajo->beneficios }}</p>
                </div>
                <div class="flex flex-col h-[300px]">
                    <h3 class="text-white font-semibold rounded-md p-2 text-sm md:text-base" style="background-color: {{ $trabajo->color }}">Requisitos</h3>
                    <p class="shadow-md p-3 text-sm md:text-base flex-grow text-pretty overflow-y-auto">{{ $trabajo->requisitos }}</p>
                </div>
            </div>
        </article>
    </div>
</section>
@endsection
