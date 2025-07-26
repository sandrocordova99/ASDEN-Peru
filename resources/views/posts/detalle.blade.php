@extends('layouts.apppage')

@section('title', 'Asden Perú - '.$post->title)

@section('content')

<!-- Para el Hostinger tener en consideracion que en los src deben tener el /storage/app/public/, busca la palabra hostinger y cambia los storage agregando lo siguiente: app/public/ -->

<!-- HOSTINGER -->
<header class="relative min-h-[500px] bg-cover bg-center bg-no-repeat flex items-center mb-6"
    style="background-image: url('{{asset('storage/' . $post->portada)  }}');">
    <!-- Overlay degradado -->
    <div class="absolute inset-0 bg-gradient-to-b from-black/40 to-black/70"></div>

    <!-- Contenedor principal -->
    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">{{ $post->title }}</h1>
    </div>

    <a class="absolute top-3 max-sm:top-1 max-sm:left-4 left-10 flex justify-center gap-x-1 border-solid border-2 text-white my-7 rounded-md w-36 px-2 py-1" href="{{ route('blogs') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M5 12l14 0" />
            <path d="M5 12l6 6" />
            <path d="M5 12l6 -6" />
        </svg>Volver
    </a>

</header>

<article class="max-w-6xl mx-auto mb-10 overflow-hidden shadow-2xl rounded-lg">

    <div class="flex bg-gradient-to-r from-[#0E354F] to-[#175075] px-7 py-2 rounded-t-lg text-white/90 text-md max-sm:text-sm gap-5">
        <div class="flex items-center gap-x-1">
            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span id="fecha">{{$post->created_at}}</span>
        </div>
        <div class="flex items-center gap-x-1">
            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <span>{{ $post->user->username}}</span>
        </div>
        <div class="flex flex-wrap items-center gap-x-1 ml-auto">
            @foreach($post->tags_array as $tag)
            <span>
                #{{ $tag }}
            </span>
            @endforeach
        </div>
    </div>

    @php
    $contenido = json_decode($post->content, true);
    $cards = json_decode($post->cards, true);
    @endphp

    <div class="flex flex-col gap-10">

        <!-- PRIMER PARRAFO -->
        <div class="grid grid-cols-2 grid-flow-dense items-center w-full min-h-[450px] max-md:grid-cols-1 bg-gradient-to-r from-white to-[#E3E7F3] px-10 max-sm:px-5 max-sm:pb-10 max-sm:py-5">
            <div class="flex flex-col mt-3">
                <h2 class="text-[#175075] font-bold text-4xl max-sm:text-3xl">{{ $contenido['parrafo_1']['subtitulo'] }}</h2>
                <div class="h-1 w-[5rem] bg-[#1e6696]"></div>
                <p class="break-words overflow-hidden py-5">{{ $contenido['parrafo_1']['contenido'] }}</p>
                <button class="flex gap-2 mb-10 hover:translate-y-1.5 duration-300" onclick="scrollSeguirLeyendo('segundo-parrafo')">
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
                    <img class="rounded-2xl w-full h-full object-cover transition-transform duration-300 hover:scale-105" src="{{ asset('storage/' . $post->imagen_1) }}" alt="$noticia->title">
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-10">
            <!-- SEGUNDO PARRAFO -->
            <div id="segundo-parrafo" class="grid {{ $post->imagen_2 ? 'grid-cols-2' : 'grid-cols-1' }} grid-flow-dense items-center max-md:grid-cols-1 px-10 max-sm:px-5">
                <!-- Imagen izquierda (solo si existe) -->
                @if($post->imagen_2)

                <div class="max-md:order-2 flex max-md:justify-center">
                    <div class="rounded-xl h-[18rem] max-sm:h-[14rem] mr-auto w-[90%] max-md:w-full overflow-hidden shadow-lg shadow-[#3a485ca9]">
                        <!-- HOSTINGER -->
                        <img class="w-full h-full object-cover transition-transform duration-300 hover:scale-105"
                            src="{{ asset('storage/' . $post->imagen_2) }}"
                            alt="{{ $post->title }}">
                    </div>
                </div>

                @endif

                <div>
                    <h2 class="text-[#175075] font-bold text-4xl max-sm:text-3xl">{{ $contenido['parrafo_2']['subtitulo'] }}</h2>
                    <div class="h-1 w-[5rem] bg-[#1e6696]"></div>
                    <!-- Segundo párrafo (ocupa 100% si no hay imagen) -->
                    <p class="py-5 text-pretty leading-relaxed break-words overflow-hidden">
                        {{ $contenido['parrafo_2']['contenido'] }}
                    </p>
                </div>

            </div>

            <!-- TARJETAS -->
            <div class="bg-gradient-to-br from-white to-[#E4E8F3] p-10 max-sm:p-5">
                <article class="flex flex-col gap-10">
                    <div class="flex items-center">
                        <div class="flex gap-2">
                            <svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="15" cy="15" r="15" fill="#3B5998" />
                                <text x="15" y="23" font-size="18" font-family="Arial, sans-serif" fill="#FFFFFF" text-anchor="middle" font-weight="bold">I</text>
                            </svg>
                            <h3 class="text-2xl text-[#175075] font-bold sm:w-[270px]">Información Detallada</h3>
                        </div>
                        <div class="w-full h-[1px] bg-[#174f7559]"></div>
                    </div>

                    <section class="grid grid-cols-[1fr_2fr] max-sm:grid-cols-1 rounded-xl shadow-md shadow-gray-400 min-h-[150px]">
                        <div class="bg-gradient-to-br from-[#175075] to-[#4482ac] flex items-center rounded-l-xl p-5 text-white font-bold font-montserrat max-sm:rounded-t-xl max-sm:rounded-b-none">
                            <h3 class="text-2xl text-center w-full">{{ $cards['card_1']['title_card_1'] }}</h3>
                        </div>
                        <div class="flex items-center bg-white rounded-r-xl leading-loose max-sm:rounded-b-xl">
                            <p class="p-4">{{ $cards['card_1']['text_card_1'] }}</p>
                        </div>
                    </section>

                    <section class="grid grid-cols-[2fr_1fr] max-sm:grid-cols-1 rounded-xl shadow-md shadow-gray-400 min-h-[150px]">
                        <div class="flex items-center bg-white rounded-l-xl leading-loose max-sm:order-2 max-sm:rounded-b-xl">
                            <p class="p-4">{{ $cards['card_2']['text_card_2'] }}</p>
                        </div>
                        <div class="bg-gradient-to-tl from-[#175075] to-[#4482ac] flex items-center rounded-r-xl p-5 text-white font-bold font-montserrat max-sm:rounded-t-xl max-sm:rounded-b-none">
                            <h3 class="text-2xl text-center w-full">{{ $cards['card_2']['title_card_2'] }}</h3>
                        </div>
                    </section>
                </article>
            </div>
            <div class="flex flex-col gap-4 mb-10 italic px-10 max-sm:px-5">
                <h3 class="text-[#175075] font-bold text-3xl">Resumen</h3>
                <p class="italic break-words max-sm:text-sm">{{ $post->resumen }}</p>

                <!-- SECCIÓN DE COMENTARIOS -->
                <section class="mt-12">
                    <h3 class="text-2xl font-semibold mb-6">Comentarios ({{ $post->comments->count() }})</h3>

                    @if($post->comments->isEmpty())
                    <div class="bg-gray-50 rounded-lg p-6 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <p class="text-gray-500 mt-2">Sé el primero en comentar</p>
                    </div>
                    @else
                    <div class="space-y-6">
                        @foreach($post->comments as $comment)
                        <div class="bg-white rounded-lg shadow-sm p-5 border border-gray-100">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0">
                                    <div class="bg-purple-100 text-purple-800 rounded-full w-10 h-10 flex items-center justify-center font-bold">
                                        {{ strtoupper(substr($comment->author_name, 0, 1)) }}
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <div class="flex flex-col">
                                            <div class="flex justify-between items-baseline">
                                                <h4 class="font-bold text-gray-800">{{ $comment->author_name }}</h4>
                                                <span class="text-xs text-gray-500 ml-4">{{ $comment->author_email }}</span> <!-- Margen izquierdo -->
                                            </div>
                                            <span class="text-xs text-gray-500 mt-1">
                                                {{ $comment->published_at ? $comment->published_at->format('d M Y, H:i') : $comment->created_at->format('d M Y, H:i') }}
                                            </span>
                                        </div>
                                        @auth
                                        <div class="flex gap-2">
                                            <button class="text-gray-400 hover:text-gray-600" title="Reportar">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                </svg>
                                            </button>
                                        </div>

                                        @endauth
                                    </div>
                                    <p class="mt-2 text-gray-700">{{ $comment->content }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </section>

                <!-- FORMULARIO DE COMENTARIOS -->
                <section class="my-10 bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                    <h3 class="text-2xl font-semibold mb-6">Deja tu comentario</h3>

                    <form method="POST" action="{{ route('comments.store', ['postId' => $post->id]) }}" class="space-y-6">
                        @csrf

                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Comentario *</label>
                            <textarea name="content" id="content" rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                                placeholder="Escribe tu comentario aquí..." required></textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="form-comments">
                            <div>
                                <label for="author_name" class="block text-sm font-medium text-gray-700 mb-1">Nombre *</label>
                                <input type="text" name="author_name" id="author_name"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                                    placeholder="Tu nombre" pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" required>
                            </div>

                            <div>
                                <label for="author_email" class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                                <input type="email" name="author_email" id="author_email"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                                    placeholder="tu@email.com" required>
                            </div>
                            <div class="col-span-2">
                                <input type="checkbox" class="size-4 rounded border-gray-300 shadow-sm" id="checkbox-comments" />
                                <span class="text-gray-700">Guarda mi nombre, correo electrónico y web en este navegador para la próxima vez que comente.</span>
                            </div>
                        </div>

                        <div class="pt-4">
                            <button type="submit"
                                class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg shadow-md transition-all">
                                Publicar comentario
                            </button>
                        </div>
                    </form>
                </section>

            </div>


        </div>
    </div>

</article>
<script>
    // Script para verificar el localStorage
    const authorName = localStorage.getItem('authorName');
    const authorEmail = localStorage.getItem('authorEmail');
    
    if (authorEmail && authorName){
        document.getElementById('form-comments').classList.add('hidden')
    }else{
        document.getElementById('form-comments').classList.remove('hidden')
    }

    // Script para cargar los datos del localStorage
    document.addEventListener('DOMContentLoaded', function() {
        if (authorName) {
            document.getElementById('author_name').value = authorName;
        }
        if (authorEmail) {
            document.getElementById('author_email').value = authorEmail;
        }
    });
</script>

<script>
    // Script para guardar los datos en el localStorage cuando se suba el formulario
    document.querySelector("form").addEventListener("submit", function (e) {
        const checkbox = document.getElementById("checkbox-comments");
        const authorName = document.getElementById("author_name").value;
        const authorEmail = document.getElementById("author_email").value;

        if (checkbox.checked) {
            localStorage.setItem("authorName", authorName);
            localStorage.setItem("authorEmail", authorEmail);
        } else {
            localStorage.removeItem("authorName");
            localStorage.removeItem("authorEmail");
        }
    });
</script>

<script>
    // Formatear Fecha
    const fecha = "{{ $post->created_at }}"
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