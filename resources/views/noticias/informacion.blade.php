@extends('layouts.apppage')

@section('title', 'Asden Perú - '. $noticia->titulo)

@section('content')
<!-- Banner -->
<!-- Para el Hostinger tener en consideracion que en los src deben tener el /storage/app/public/, busca la palabra hostinger y cambia los storage agregando lo siguiente: app/public/ -->

<!-- HOSTINGER -->
<header class="relative min-h-[500px] bg-cover bg-center bg-no-repeat flex items-center mb-6"
    style="background-image: url('{{asset('storage/' . $noticia->portada)  }}');">
    <!-- Overlay degradado -->
    <div class="absolute inset-0 bg-gradient-to-b from-black/40 to-black/70"></div>

    <!-- Contenedor principal -->
    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">{{$noticia->titulo}}</h1>
    </div>

    <a class="absolute top-3 max-sm:top-1 max-sm:left-4 left-10 flex justify-center gap-x-1 border-solid border-2 text-white my-7 rounded-md w-36 px-2 py-1" href="{{ route('featured') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M5 12l14 0" />
            <path d="M5 12l6 6" />
            <path d="M5 12l6 -6" />
        </svg>Volver
    </a>

</header>

<article class="max-w-6xl min-h-screen mx-auto mb-10 overflow-hidden shadow-2xl rounded-lg">

    <div class="flex bg-gradient-to-r from-[#0E354F] to-[#175075] px-7 py-2 rounded-t-lg text-white/90 text-md max-sm:text-sm gap-5">
        <div class="flex items-center gap-x-1">
            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span id="fecha">{{$noticia->created_at}}</span>
        </div>
        <div class="flex items-center gap-x-1">
            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <span>{{$noticia->username}}</span>
        </div>
        <div class="flex items-center gap-x-1 ml-auto">
            <svg width="10" height="10" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                <circle cx="24" cy="24" r="20" fill="white" />
            </svg>
            <span class="rounded-full">{{$noticia->tags}}</span>
        </div>
    </div>

    @php
    $descripcion = json_decode($noticia->descripcion, true);
    @endphp


    <div class="flex flex-col gap-5">

        <!-- PRIMER PARRAFO -->
        <div class="grid grid-cols-2 grid-flow-dense items-center w-full min-h-[450px] max-md:grid-cols-1 bg-gradient-to-r from-white to-[#E3E7F3] px-10 max-sm:px-5">
            <div class="flex flex-col mt-3">
                <h2 class="text-[#175075] font-bold text-4xl max-sm:text-3xl">{{ $descripcion['parrafo_1']['subtitulo'] }}</h2>
                <div class="h-1 w-[5rem] bg-[#1e6696]"></div>
                <p class="break-words overflow-hidden py-5 max-sm:text-sm">{{ $descripcion['parrafo_1']['contenido'] }}</p>
                <button class="flex gap-2 my-4 hover:translate-y-1.5 duration-300" onclick="scrollSeguirLeyendo('segundo-parrafo')">
                    <span class="text-[#175075] font-medium">Continuar Leyendo
                    </span>
                    <svg width="25" height="25" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24" cy="24" r="20" stroke="#175075" stroke-width="4" />
                        <path d="M24 16V32M24 32L18 26M24 32L30 26" stroke="#175075" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <div class="flex justify-center items-center w-full h-full">
                <div class="rounded-2xl w-[25rem] h-[22rem] max-sm:h-[15rem] overflow-hidden shadow-[0_0_10px_5px] shadow-[#7497e2] ">
                    <!-- HOSTINGER -->
                    <img class="rounded-2xl w-full h-full object-cover transition-transform duration-300 hover:scale-105" src="{{ asset('storage/' . $noticia->imagen_1) }}" alt="$noticia->title">
                </div>
            </div>
        </div>

        <div class="flex flex-col mx-10 gap-5 max-sm:mx-5">

            <!-- SEGUNDO PARRAFO -->
            <div id="segundo-parrafo" class="grid {{ $noticia->imagen_2 ? 'grid-cols-2' : 'grid-cols-1' }} grid-flow-dense items-center max-md:grid-cols-1">
                <!-- Imagen izquierda (solo si existe) -->
                @if($noticia->imagen_2)

                <div class="max-md:order-2 flex max-md:justify-center">
                    <div class="rounded-xl h-[18rem] mr-auto w-[90%] max-md:w-full overflow-hidden shadow-lg shadow-[#3a485ca9]">
                        <!-- HOSTINGER -->
                        <img class="w-full h-full object-cover transition-transform duration-300 hover:scale-105"
                            src="{{ asset('storage/' . $noticia->imagen_2) }}"
                            alt="{{ $noticia->title }}">
                    </div>
                </div>

                @endif

                <div>
                    <h2 class=" text-[#175075] font-bold text-4xl max-sm:text-3xl">{{ $descripcion['parrafo_2']['subtitulo'] }}</h2>
                    <div class="h-1 w-[5rem] bg-[#1e6696]"></div>
                    <!-- Segundo párrafo (ocupa 100% si no hay imagen) -->
                    <p class="py-5 text-pretty leading-relaxed break-words overflow-hidden max-sm:text-sm">
                        {{ $descripcion['parrafo_2']['contenido'] }}
                    </p>
                </div>

            </div>

            <!-- TERCER PARRAFO -->
            <div class="grid {{ $noticia->imagen_3 ? 'grid-cols-2' : 'grid-cols-1' }} grid-flow-dense items-center w-full max-md:grid-cols-1">
                <!-- Tercer párrafo -->
                <div>
                    <h2 class="text-[#175075] font-bold text-4xl max-sm:text-3xl">{{ $descripcion['parrafo_3']['subtitulo'] }}</h2>
                    <div class="h-1 w-[5rem] bg-[#1e6696]"></div>
                    <!-- Tercer párrafo (ocupa 100% si no hay imagen) -->
                    <p class="py-5 text-pretty leading-relaxed break-words overflow-hidden max-sm:text-sm">
                        {{ $descripcion['parrafo_3']['contenido'] }}
                    </p>
                </div>

                <!-- Imagen derecha -->
                @if($noticia->imagen_3)

                <div class="flex max-md:justify-center">
                    <div class="rounded-xl ml-auto h-[18rem] w-[90%] max-md:w-full overflow-hidden shadow-lg shadow-[#3a485ca9]">
                        <!-- HOSTINGER -->
                        <img class="w-full h-full object-cover transition-transform duration-300 hover:scale-105"
                            src="{{ asset('storage/' . $noticia->imagen_3) }}"
                            alt="{{ $noticia->title }}">
                    </div>
                </div>
                @endif
            </div>

            <!-- RESUMEN -->
            <div class="flex flex-col gap-4 mb-10 italic">
                <h3 class="text-[#175075] font-bold text-3xl">Resumen</h3>
                <p class="italic break-words max-sm:text-sm">{{$noticia->resumen}}</p>
            </div>
        </div>
    </div>


</article>


<script>
    // Formatear Fecha
    const fecha = "{{$noticia->created_at}}"
    const newDate = new Date(fecha)
    const opciones = {
        day: 'numeric',
        month: 'short',
        year: 'numeric'
    }

    const formatDate = newDate.toLocaleDateString('es-ES', opciones)
    const inputFecha = document.getElementById('fecha')
    inputFecha.innerHTML = formatDate

    function scrollSeguirLeyendo(id) {
        const elemento = document.getElementById(id);
        const offset = 90;
        const posicion = elemento.getBoundingClientRect().top + window.pageYOffset - offset;
        window.scrollTo({
            top: posicion,
            behavior: 'smooth'
        });
    }
</script>
@endsection