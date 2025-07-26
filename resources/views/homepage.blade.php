@extends('layouts.apppage')

@section('title', 'Inicio | Asden Perú')
@section('description', 'Bienvenido a Asden Perú, asociación sin fines de lucro que impulsa el desarrollo socioeconómico y ambiental en las comunidades del Perú.')

@section('content')
    <!-- Hero Section Mejorado -->
    <section class="relative flex items-center justify-center w-full min-h-screen overflow-hidden px-6">
        <!-- Video de fondo -->
        <video src="/portada.webm" class="absolute inset-0 w-full h-full object-cover" autoplay loop muted
            playsinline preload="metadata" style="pointer-events: none; z-index: 0;"></video>

        <!-- Overlay Oscuro para Mayor Contraste -->
        <div class="absolute inset-0 bg-black opacity-70"></div>

        <!-- Contenido principal modernizado -->
        <div class="relative z-10 flex flex-col items-center text-center max-w-4xl mx-auto px-4">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-semibold text-white leading-tight mb-6">
                Construyamos un Futuro Brillante
            </h1>
            <div class="w-32 h-1 bg-light-Orange rounded-full mb-6"></div>
            <p class="text-lg sm:text-xl md:text-2xl text-gray-200 mb-10">
                Juntos, podemos transformar el presente y abrir las puertas a nuevas oportunidades para todos.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('collaborate') }}">
                    <x-ui.button
                        class="bg-[#C64508] text-white hover:bg-light-Orange/80 focus:ring-2 focus:ring-light-Orange px-8 py-3"
                        size="md" rounded="lg">
                        Donar Ahora
                    </x-ui.button>
                </a>
            </div>
        </div>
    </section>

    <!-- Sección de Nuestra Historia -->
    <section class="relative max-w-7xl mx-auto overflow-hidden bg-gradient-to-br from-gray-50 to-white py-20" id="history">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 items-center">
                <!-- Columna de texto -->
                <div class="lg:col-span-3 relative z-10">
                    <div class="max-w-2xl">
                        <div class="mb-10">
                            <h2 class="text-5xl font-light text-gray-900 mb-6">
                                <span
                                    class="bg-clip-text text-transparent font-semibold bg-gradient-to-r from-emerald-600 to-cyan-600">Nuestra Historia </span>
                            </h2>
                            <div class="w-32 h-1 bg-gradient-to-r from-emerald-500 to-cyan-400 mb-8"></div>
                        </div>

                        <div class="space-y-6 border-l-4 border-emerald-100 pl-6">
                            <p class="text-lg text-gray-700 leading-relaxed font-light">
                                Fundada en 1982 en Soria por jóvenes estudiantes visionarios, ASDEN ha evolucionado para
                                convertirse en un referente nacional en conservación medioambiental.
                            </p>
                            <div class="bg-gradient-to-r from-emerald-500/10 to-cyan-500/10 p-6 rounded-xl">
                                <p class="text-gray-700 italic font-medium">
                                    "Declarados de Utilidad Pública en 1995 por el Ministerio de Justicia e Interior,
                                    consolidando nuestro compromiso con el entorno."
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Columna de imagen -->
                <div class="lg:col-span-2 relative">
                    <div class="relative group transform transition-all duration-700 hover:rotate-1">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-emerald-400/20 to-cyan-400/20 rounded-3xl transform -skew-x-3 -rotate-3">
                        </div>
                        <img src="{{ asset('history.webp') }}" alt="Historia ASDEN"
                            class="relative z-10 w-full h-96 object-cover rounded-2xl shadow-2xl transform transition-transform duration-500 group-hover:scale-105">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-gray-900/40 to-transparent rounded-2xl z-20 opacity-0 group-hover:opacity-100 group-hover:scale-105 transition-all duration-500">
                        </div>
                        <div
                            class="absolute bottom-8 left-8 z-30 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            <span class="text-white font-semibold text-lg">Desde 1982 protegiendo nuestro patrimonio</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Misión, Visión y Objetivos -->
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-20" id="mission">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-dark-blue mb-2">Misión, Visión y Objetivos</h2>
            <div class="w-40 h-1 bg-green-600 mx-auto mb-4"></div>
            <p class="mt-4 text-lg text-gray-600">
                Conoce nuestros pilares fundamentales para el desarrollo sostenible.
            </p>
            <p
                class="mt-6 text-2xl font-semibold text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-blue-500 animate-pulse">
                #POR UN MEJOR FUTURO
            </p>
        </div>
        <div class="text-center grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Tarjeta Misión -->
            <x-ui.card padding="lg" shadow="xl" rounded="lg" image="{{ asset('Mision.webp') }}" title="Misión"
                :description="'Somos una asociación independiente, sin fines de lucro, dedicada al diseño, formulación e implementación de proyectos que contribuyen al desarrollo socioeconómico y ambiental de la región y el Perú, generando información confiable, con participación permanente de pobladores y autoridades.'"
                class="bg-white text-gray-700" />

            <!-- Tarjeta Visión -->
            <x-ui.card padding="lg" shadow="xl" rounded="lg" image="{{ asset('Vision.webp') }}" title="Visión"
                :description="'Ser una institución que contribuya al desarrollo sostenible a nivel local, regional y nacional, a través de distintas acciones humanitarias, que permita afrontar los desafíos u efectos presentados en un periodo de tiempo determinado.'" class="bg-white text-gray-700" />

            <!-- Tarjeta Objetivos -->
            <x-ui.card padding="lg" shadow="xl" rounded="lg" image="{{ asset('objetivos.webp') }}" title="Objetivos"
                :description="'Contribuir con un Perú más justo, equitativo y solidario. Donde los valores, la buena educación y la buena salud de todos sean los pilares fuertes que permitan trabajar por la erradicación de la pobreza, la desigualdad, la exclusión, la violencia y todos aquellos factores negativos, que no nos permiten vivir en una sociedad cohesionada y libre de injusticias sociales.'" class="bg-white text-gray-700" />
        </div>
    </section>

    <!-- Sección de Valores -->
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-16" id="values">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-dark-blue mb-2">Nuestros Valores</h2>
            <div class="w-40 h-1 bg-green-600 mx-auto mb-4"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-y-10 gap-x-4 lg:gap-x-12">
            <!-- Valor: Solidaridad -->
            <div
                class="group relative bg-white rounded-2xl p-8 transition-all duration-300 ease-out hover:transform hover:-translate-y-2 hover:shadow-xl cursor-default">
                <div class="mb-6">
                    <div
                        class="w-20 h-20 mx-auto rounded-xl bg-gradient-to-br from-blue-500 to-cyan-400 flex items-center justify-center group-hover:rotate-[25deg] transition-transform duration-300">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-3 text-center">Solidaridad</h3>
                <p
                    class="text-gray-600 leading-relaxed opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute bg-white px-6 py-2 rounded-xl shadow-lg z-10 text-center sm:text-pretty w-9/12 left-1/2 -translate-x-1/2">
                    Creemos en el espíritu colaborativo y el esfuerzo de las personas.
                </p>
                <p class="text-gray-500 leading-relaxed group-hover:opacity-0 transition-opacity duration-300 text-center">
                    Unión que trasciende<br>fronteras individuales
                </p>
            </div>

            <!-- Valor: Compromiso -->
            <div 
                class="group relative bg-white rounded-2xl p-8 transition-all duration-300 ease-out hover:transform hover:-translate-y-2 hover:shadow-xl cursor-default">
                <div class="mb-6">
                    <div 
                        class="w-20 h-20 mx-auto rounded-xl bg-gradient-to-br from-emerald-500 to-lime-400 flex items-center justify-center group-hover:rotate-[25deg] transition-transform duration-300">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-3 text-center">Compromiso</h3>
                <p 
                    class="text-gray-600 leading-relaxed opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute bg-white px-6 py-2 rounded-xl shadow-lg z-10 text-center sm:text-pretty w-9/12 left-1/2 -translate-x-1/2">
                    Buscamos constantemente nuevas soluciones y formas de ayudar.
                </p>
                <p class="text-gray-500 leading-relaxed group-hover:opacity-0 transition-opacity duration-300 text-center">
                    Dedicación total<br>a cada causa
                </p>
            </div>

            <!-- Valor: Innovación -->
            <div
                class="group relative bg-white rounded-2xl p-8 transition-all duration-300 ease-out hover:transform hover:-translate-y-2 hover:shadow-xl cursor-default">
                <div class="mb-6">
                    <div
                        class="w-20 h-20 mx-auto rounded-xl bg-gradient-to-br from-purple-500 to-fuchsia-400 flex items-center justify-center group-hover:rotate-[25deg] transition-transform duration-300">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="40"  height="40"  viewBox="0 0 24 24"  fill="none"  stroke="white"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-bulb">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12h1m8 -9v1m8 8h1m-15.4 -6.4l.7 .7m12.1 -.7l-.7 .7" /><path d="M9 16a5 5 0 1 1 6 0a3.5 3.5 0 0 0 -1 3a2 2 0 0 1 -4 0a3.5 3.5 0 0 0 -1 -3" /><path d="M9.7 17l4.6 0" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-3 text-center">Innovación</h3>
                <p
                    class="text-gray-600 leading-relaxed opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute bg-white px-6 py-2 rounded-xl shadow-lg z-10 text-center sm:text-pretty w-9/12 left-1/2 -translate-x-1/2">
                    Soluciones efectivas y sostenibles en constante evolución.
                </p>
                <p class="text-gray-500 leading-relaxed group-hover:opacity-0 transition-opacity duration-300 text-center">
                    Evolución constante<br>hacia el futuro
                </p>
            </div>

            <!-- Valor: Transparencia -->
            <div
                class="group relative bg-white rounded-2xl p-8 transition-all duration-300 ease-out hover:transform hover:-translate-y-2 hover:shadow-xl cursor-default">
                <div class="mb-6">
                    <div
                        class="w-20 h-20 mx-auto rounded-xl bg-gradient-to-br from-amber-500 to-orange-400 flex items-center justify-center group-hover:rotate-[25deg] transition-transform duration-300">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="40"  height="40"  viewBox="0 0 24 24"  fill="none"  stroke="white"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-scale">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M7 20l10 0" /><path d="M6 6l6 -1l6 1" /><path d="M12 3l0 17" /><path d="M9 12l-3 -6l-3 6a3 3 0 0 0 6 0" /><path d="M21 12l-3 -6l-3 6a3 3 0 0 0 6 0" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-3 text-center">Transparencia</h3>
                <p
                    class="text-gray-600 leading-relaxed opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute bg-white px-6 py-2 rounded-xl shadow-lg z-10 text-center sm:text-pretty w-9/12 left-1/2 -translate-x-1/2">
                    Conducta regida por la honestidad y neutralidad absolutas.
                </p>
                <p class="text-gray-500 leading-relaxed group-hover:opacity-0 transition-opacity duration-300 text-center">
                    Claridad y ética<br>en cada acción
                </p>
            </div>
        </div>
    </section>

<section class="bg-gray-100 py-12 pb-24 px-4 text-center">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-dark-blue mb-2">¿Cómo Puedes Colaborar?</h2>
            <div class="w-40 h-1 bg-green-600 mx-auto mb-4"></div>
            <p class="text-gray-700 max-w-2xl mx-auto text-lg">
            Sé parte del cambio y ayúdanos a construir un mundo más justo, solidario y humano.
            </p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 max-w-6xl mx-auto">

        <!-- Card: SOCIO -->
        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transform hover:-translate-y-1 transition duration-300 overflow-hidden">
            <div class="p-6">
            <p class="text-gray-600 text-base">Colabora como</p>
            <h3 class="text-xl font-bold mt-1 text-dark-blue uppercase">SOCIO</h3>
            </div>
            <div class="relative">
            <img src="{{ asset('socio.webp') }}" alt="Imagen Socio" class="w-full h-48 object-cover">
            <a href="{{ route('collaborate') }}" class="absolute bottom-3 left-1/2 transform -translate-x-1/2 bg-red-600 text-white text-sm font-semibold px-4 py-2 rounded-full shadow-md hover:bg-red-700 transition">
                Quiero ser socio →
            </a>
            </div>
        </div>

        <!-- Card: DONATIVO -->
        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transform hover:-translate-y-1 transition duration-300 overflow-hidden">
            <div class="p-6">
            <p class="text-gray-600 text-base">Colabora como</p>
            <h3 class="text-xl font-bold mt-1 text-dark-blue uppercase">DONATIVO</h3>
            </div>
            <div class="relative">
            <img src="{{ asset('donativo.webp') }}" alt="Imagen Donativo" class="w-full h-48 object-cover">
            <a href="{{ route('collaborate') }}" class="absolute bottom-3 left-1/2 transform -translate-x-1/2 bg-red-600 text-white text-sm font-semibold px-4 py-2 rounded-full shadow-md hover:bg-red-700 transition">
                Haz un donativo →
            </a>
            </div>
        </div>

        <!-- Card: VOLUNTARIO -->
        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transform hover:-translate-y-1 transition duration-300 overflow-hidden">
            <div class="p-6">
            <p class="text-gray-600 text-base">Colabora como</p>
            <h3 class="text-xl font-bold mt-1 text-dark-blue uppercase">VOLUNTARIO</h3>
            </div>
            <div class="relative">
            <img src="{{ asset('voluntario.webp') }}" alt="Imagen Voluntario" class="w-full h-48 object-cover">
            <a href="{{ route('jobBoard') }}" class="absolute bottom-3 left-1/2 transform -translate-x-1/2 bg-red-600 text-white text-sm font-semibold px-4 py-2 rounded-full shadow-md hover:bg-red-700 transition">
                Quiero ser voluntario →
            </a>
            </div>
        </div>

        </div>

    </section>

@endsection