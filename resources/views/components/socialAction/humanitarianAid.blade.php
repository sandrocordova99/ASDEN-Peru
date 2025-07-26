@extends('layouts.apppage')

@section('title', 'Acción Social Asden - Ayuda Humanitaria')

@section('content')
    <!-- Banner -->
    <section class="relative min-h-[600px] bg-cover bg-center bg-no-repeat flex items-center py-20"
        style="background-image: url('/banners/banner-humanitarianAids.webp');">
        <!-- Overlay degradado -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/40 to-black/70"></div>

        <!-- Contenido del banner -->
        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">Ayuda Humanitaria</h1>
            <div class="w-32 h-1 bg-orange-500 rounded-full mx-auto mb-6"></div>
            <p class="text-lg md:text-xl text-gray-200 max-w-3xl mx-auto">
                Respuesta inmediata ante emergencias y desastres naturales
            </p>
        </div>
    </section>

    <!-- Sección de Impacto -->
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-dark-blue mb-2">
                Compromiso con la Humanidad
            </h2>
            <div class="w-40 h-1 bg-green-600 mx-auto mb-4"></div>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                La ayuda humanitaria en ASDEN se enfoca en asistir a comunidades afectadas por desastres y emergencias. Con
                un equipo de voluntarios y especialistas, aseguramos respuestas rápidas y efectivas.
            </p>
        </div>

        <!-- Grid de contenido (Imágenes + Videos) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-16">

            <!-- Sección de Logros -->
            <div class="space-y-12">
                <!-- Encabezado con efecto subrayado decorativo -->
                <div class="text-center mb-14 relative">
                    <h2 class="text-2xl lg:text-2xl font-bold text-dark-blue mb-4">
                        <span class="relative inline-block">
                            Nuestros Logros
                            <span class="absolute -bottom-2 left-0 w-full h-1.5 bg-green-600/30"></span>
                        </span>
                    </h2>
                    <p class="text-lg text-gray-600 mt-4">Impacto real en comunidades vulnerables</p>
                </div>

                <!-- Tarjeta de Logro 1 -->
                <article
                    class="group relative rounded-2xl overflow-hidden cursor-default shadow-xl hover:shadow-2xl transition-all duration-300">
                    <div class="relative aspect-video overflow-hidden">
                        <img src="https://www.rcrperu.com/wp-content/uploads/2017/03/000409212W-624x416.jpg"
                            alt="Ayuda humanitaria"
                            class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-105">

                        <!-- Overlay con gradiente y texto -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent flex items-end p-6">
                            <div
                                class="space-y-2 text-white translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                                <div class="flex items-center gap-3 text-sm">
                                    <span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full">Emergencias</span>
                                    <time class="font-medium">15 Mar 2023</time>
                                </div>
                                <h3 class="text-2xl font-bold leading-tight">Solidaridad en tiempos difíciles</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Contenido descriptivo -->
                    <div class="p-6 bg-white">
                        <p class="text-gray-600 line-clamp-3">
                            Distribución estratégica de ayuda humanitaria en zonas afectadas por desastres naturales,
                            priorizando a familias en situación de extrema vulnerabilidad.
                        </p>
                    </div>
                </article>

                <!-- Tarjeta de Logro 2 -->
                <article
                    class="group relative rounded-2xl overflow-hidden cursor-default shadow-xl hover:shadow-2xl transition-all duration-300">
                    <div class="relative aspect-video overflow-hidden">
                        <img src="https://portal.andina.pe/EDPfotografia3/Thumbnail/2023/07/10/000974227W.jpg"
                            alt="Reconstrucción comunitaria"
                            class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-105">

                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent flex items-end p-6">
                            <div
                                class="space-y-2 text-white translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                                <div class="flex items-center gap-3 text-sm">
                                    <span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full">Reconstrucción</span>
                                    <time class="font-medium">28 Jun 2024</time>
                                </div>
                                <h3 class="text-2xl font-bold leading-tight">Reconstruyendo sueños</h3>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 bg-white">
                        <p class="text-gray-600 line-clamp-3">
                            Programa integral de reconstrucción de viviendas y espacios comunitarios con enfoque en
                            resiliencia y sostenibilidad ambiental.
                        </p>
                    </div>
                </article>
            </div>

            <!-- Sección de Videos -->
            <div class="space-y-12">
                <!-- Encabezado con diseño coherente -->
                <div class="text-center mb-14">
                    <h2 class="text-2xl lg:text-2xl font-bold text-dark-blue mb-4">
                        <span class="relative inline-block">
                            Nuestros Videos
                            <span class="absolute -bottom-2 left-0 w-full h-1.5 bg-green-600/30"></span>
                        </span>
                    </h2>
                    <p class="text-lg text-gray-600 mt-4">Testimonios de impacto y documentación de proyectos</p>
                </div>

                <!-- Tarjeta de Video 1 - Versión Corregida -->
                <div
                    class="group relative rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300">
                    <div class="relative aspect-video bg-gray-900">
                        <lite-youtube videoid="uF3YWiebxPE">
                            <a class="lite-youtube-fallback" href="https://www.youtube.com/watch?v=uF3YWiebxPE">Mira en YouTube: "Ayuda Humanitaria a los más necesitados"</a>
                        </lite-youtube>
                    </div>

                    <!-- Descripción del video -->
                    <div class="p-6 bg-white cursor-default">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Intervención en emergencias nacionales</h3>
                        <p class="text-gray-600 text-sm">
                            Respuesta inmediata ante desastres naturales con equipos especializados y coordinación
                            interinstitucional.
                        </p>
                    </div>
                </div>

                <!-- Tarjeta de Video 2 - Versión Corregida -->
                <div
                    class="group relative rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300">
                    <div class="relative aspect-video bg-gray-900">
                        <lite-youtube videoid="d1MhjHUvxTo">
                            <a class="lite-youtube-fallback" href="https://www.youtube.com/watch?v=d1MhjHUvxTo">Mira en YouTube: "Sistema de Gestión de Bienes de Ayuda Humanitaria"</a>
                        </lite-youtube>
                    </div>

                    <div class="p-6 bg-white cursor-default">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Programas de desarrollo sostenible</h3>
                        <p class="text-gray-600 text-sm">
                            Implementación de proyectos a largo plazo para el desarrollo comunitario y la autogestión.
                        </p>
                    </div>
                </div>
            </div>
    </section>

    <!-- Áreas de Impacto -->
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-16 cursor-default">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-dark-blue mb-2">
                Áreas de Impacto
            </h2>
            <div class="w-40 h-1 bg-green-600 mx-auto mb-4"></div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div
                class="p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105 duration-200 border-l-4 border-orange-500">
                <h3 class="text-xl font-semibold text-orange-600 mb-2">Estudios Socioeconómicos</h3>
                <p class="text-gray-600">
                    Analizamos la realidad de cada comunidad para ofrecer soluciones efectivas.
                </p>
            </div>

            <!-- Card 2 -->
            <div
                class="p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105 duration-200 border-l-4 border-green-500">
                <h3 class="text-xl font-semibold text-green-600 mb-2">Proyectos de Agricultura</h3>
                <p class="text-gray-600">
                    Implementamos programas de desarrollo sostenible en comunidades vulnerables.
                </p>
            </div>

            <!-- Card 3 -->
            <div
                class="p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105 duration-200 border-l-4 border-blue-500">
                <h3 class="text-xl font-semibold text-blue-600 mb-2">Medio Ambiente</h3>
                <p class="text-gray-600">
                    Promovemos el uso responsable de recursos y la conservación del ecosistema.
                </p>
            </div>

            <!-- Card 4 -->
            <div
                class="p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105 duration-200 border-l-4 border-purple-500">
                <h3 class="text-xl font-semibold text-purple-600 mb-2">Salud Pública</h3>
                <p class="text-gray-600">
                    Brindamos atención médica y programas de prevención en comunidades afectadas.
                </p>
            </div>

            <!-- Card 5 -->
            <div
                class="p-6 bg-white rounded-lg shadow-lg hover:shadow-xl transition transform hover:scale-105 duration-200 border-l-4 border-indigo-500">
                <h3 class="text-xl font-semibold text-indigo-600 mb-2">Viviendas Saludables</h3>
                <p class="text-gray-600">
                    Desarrollamos proyectos de vivienda segura y sostenible para familias en riesgo.
                </p>
            </div>
        </div>
    </section>

    <script>
        setTimeout(() => {
            const modal = document.getElementById('miModal');
            if (modal) {
                modal.classList.remove('hidden');
            }
        }, 5000); // 5 segundos
    </script>
@endsection