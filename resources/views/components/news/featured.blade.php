@extends('layouts.apppage')

@section('title', 'Asden Perú - Noticias')

@section('content')
<!-- Banner y Card-->
<section class="relative min-h-[600px] bg-cover bg-center bg-no-repeat py-20 flex items-center"
    style="background-image: url('/banners/banner-noticia.webp')">
    <!-- Overlay degradado -->
    <div class="absolute inset-0 bg-gradient-to-b from-black/40 to-black/70"></div>

    <!-- Contenedor principal -->
    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8">
        <div
            class="absolute right-4 lg:right-8 top-1/2 transform -translate-y-1/2 bg-white p-8 rounded-lg shadow-2xl max-w-md hover:shadow-3xl transition-shadow duration-300">
            <h3 class="text-3xl font-bold text-dark-blue mb-4">Todo El Conocimiento En Un Solo Lugar</h3>
            <div class="w-12 h-1 bg-green-600  mb-4"></div>
            <p class="text-gray-600 mb-6 leading-relaxed">
                En esta sección, podrás encontrar nuestras últimas noticias y toda la información que generamos en las
                investigaciones de campo, en cada uno de los lugares done trabajamos en el Perú. Si deseas recibir
                periodicamente esta información, no dudes en suscribirte a nuestro boletín.
            </p>
            <p class="text-gray-600 mb-6 leading-relaxed">¡Muchas gracias por todo tu interés!</p>
            <a href="{{ route('subscriptions') }}">
                <x-ui.button class="bg-light-Orange hover:bg-dark-blue text-white " size="md" rounded="lg">
                    Suscríbete ahora
                </x-ui.button>
            </a>

        </div>
    </div>
</section>


<!-- Sección de noticias destacadas falta api-->
<section class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <!-- Encabezado de sección -->
    <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-dark-blue mb-2">
            Noticias Destacadas
        </h2>
        <div class="w-40 h-1 bg-green-600 mx-auto mb-4"></div>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            Descubre las noticias destacadas de la Asociación Sin Fronteras para el Desarrollo Nacional (ASDEN)
            en esta seccion. Estamos comprometidos con la conservación ambiental y el desarrollo sostenible para
            mejorar la calidad de vida de las comunidades locales.
        </p>
    </div>

    <!-- Grid de noticias destacadas -->
    <div id="newsContainer" class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-x-20 gap-y-12">



    </div>

    <script>
        setTimeout(() => {
            const modal = document.getElementById('miModal');
            if (modal) {
                modal.classList.remove('hidden');
            }
        }, 5000); // 5 segundos
    </script>

    <!-- Script para los modales -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch("{{ url('/api/getAllNoticias') }}")
                .then(response => response.json())
                .then(data => {
                    const newsContainer = document.getElementById("newsContainer");
                    data.Noticias.forEach(noticia => {
                        console.log(noticia);

                        newsContainer.innerHTML += `   <article class="group bg-white rounded-xl shadow-lg overflow-hidden transition-all hover:shadow-xl hover:-translate-y-2">
                                                   <div class="relative">
                                                       <img class="w-full h-56 object-cover"
                                                           src="${noticia.portada}"
                                                           alt="${noticia.titulo}">
                                                       <div class="absolute top-4 right-4 bg-green-100/90 px-3 py-1 rounded-full text-sm font-medium text-emerald-700">
                                                       ${noticia.tags}
                                                       </div>
                                                   </div>

                                                 <div class="flex flex-col gap-2 p-6">
                                                     <div class="flex items-center gap-3 text-sm text-gray-500">
                                                         <div class="flex items-center gap-1.5">
                                                             <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                                     d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                             </svg>
                                                             <span>${noticia.fecha}</span>
                                                         </div>
                                                         <div class="h-4 w-[2px] bg-gray-200"></div>
                                                         <div class="flex items-center gap-1.5">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                        </svg>
                                                        <span>${noticia.username}</span>
                                                     </div>
                                                 </div>

                                                <h3 class="text-xl font-semibold text-gray-900 leading-tight">
                                                    ${noticia.titulo}
                                                </h3>

                                                <p class="text-gray-600 break-words">
                                                    ${noticia.resumen}
                                                </p>
                                                <button class="inline-flex items-center font-medium text-emerald-600 hover:text-emerald-800 transition-colors group-hover:underline mb-2"
                                                        onclick="window.location.href='{{ url('/noticias') }}/${noticia.id}'">
                                                            Leer más
                                                        <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                        </svg>
                                                </button>
                                            </div>
                                            </article>
                                        `;

                    });
                })
                .catch(error => console.error("❌ Error al cargar noticias:", error));
        });
    </script>

    @endsection