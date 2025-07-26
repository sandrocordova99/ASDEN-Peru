@extends('layouts.apppage')

@section('title', 'Acción Social Asden - Proyectos')

@section('content')
<!-- Banner -->
<section class="relative min-h-[600px] bg-cover bg-center bg-no-repeat flex items-center py-20"
    style="background-image: url('/banners/banner-projects.webp');">
    <!-- Overlay degradado -->
    <div class="absolute inset-0 bg-gradient-to-b from-black/40 to-black/70"></div>

    <!-- Contenedor principal -->
    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">Proyectos</h1>
        <div class="w-32 h-1 bg-light-Orange rounded-full mx-auto  mb-6"></div>
        <p class="text-lg md:text-xl text-gray-200 max-w-3xl mx-auto">
            A lo largo de casi 20 años, la Asociación Sin Fronteras para el Desarrollo Nacional (ASDEN) ha trabajado con
            decenas de familias en comunidades de Ica, mejorando sus condiciones de vida.
        </p>
    </div>
</section>
<!-- Sección de Proyectos -->
<section class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-16 ">
        <h2 class="text-4xl font-bold text-dark-blue mb-2">Nuestros Recientes Proyectos</h2>
        <div class="w-40 h-1 bg-green-600 mx-auto mb-4"></div>
        <p class="text-gray-600 text-lg">Descubre cómo estamos transformando comunidades.</p>
    </div>

    <div id="projectContainer" class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetch("{{ url('/api/getAllProjects') }}")
            .then(response => response.json())
            .then(data => {
                const projectsContainer = document.getElementById("projectContainer");
                const sortedProjects = data.projects.sort((a, b) => b.etapa - a.etapa);
                sortedProjects.forEach(project => {
                    projectsContainer.innerHTML += ` 
                        <article class="group bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                            <div class="relative h-60">
                                <img src="${project.portada}"
                                    alt="${project.titulo}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>

                            <div class="p-6">
                                <div class="flex items-center gap-3 mb-4">
                                    <span
                                        class="bg-emerald-100 text-emerald-800 px-3 py-1 rounded-full text-sm font-medium">${project.etiqueta}</span>
                                    <span class="text-gray-500 text-sm flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        ${project.etapa}
                                    </span>
                                </div>

                                <h3 class="text-2xl font-bold text-gray-900 mb-3">${project.titulo}</h3>
                                <p class="text-gray-600 mb-6 line-clamp-3">
                                    ${project.resumen}
                                </p>

                                <div class="flex items-center gap-4">
                                    <x-ui.button class="bg-gray-100 hover:bg-gray-200 text-gray-700" size="md" rounded="lg" @click="$dispatch('open-modal', { modalId: '${project.id}' })">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                        Detalles
                                    </x-ui.button>
                                    <a href="{{ route('collaborate') }}">
                                        <x-ui.button class="bg-emerald-600 hover:bg-emerald-700 text-white" size="md" rounded="lg">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                            Colaborar
                                        </x-ui.button>
                                    </a>

                                </div>
                            </div>
                        </article>
                        <x-ui.modals modalId="${project.id}" isOpen="false" padding="md" shadow="md" rounded="md">
                            <article style="background-image: url(/Logo.png);" class="max-w-md mx-auto bg-no-repeat bg-center bg-contain" >
                                <div class=" backdrop-blur-[7px] py-4">
                                    <div class="flex items-center justify-center">
                                        <div class="text-center">
                                            <h2 class="text-2xl font-bold text-dark-blue mb-2">${project.titulo}</h2>
                                            <div class="w-40 h-1 bg-green-600 mx-auto mb-2"></div>
                                            <p class="text-gray-800 text-md">${project.etiqueta} - ${project.etapa}</p>
                                        </div>
                                    </div>
                                    <p class="mt-6">
                                        ${project.descripcion}
                                    </p>
                                </div>
                            </article>
                    </x-ui.modals>
                                        `;

                });
            })
            .catch(error => console.error("❌ Error al cargar noticias:", error));
    });
</script>

<script>
    setTimeout(() => {
        const modal = document.getElementById('miModal');
        if (modal) {
            modal.classList.remove('hidden');
        }
    }, 5000); // 5 segundos
</script>

@endsection