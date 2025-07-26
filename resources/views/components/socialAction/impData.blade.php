@extends('layouts.apppage')

@section('title', 'Acción Social Asden - Datos que impactan')

@section('content')
    <!-- Banner -->
    <section class="relative min-h-[600px] bg-cover bg-center bg-no-repeat flex items-center py-20"
        style="background-image: url('/banners/banner-datImp.webp');">
        <!-- Overlay degradado -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/40 to-black/70"></div>

        <!-- Contenedor principal -->
        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">Transformando Realidades</h1>
            <div class="w-32 h-1 bg-light-Orange rounded-full mx-auto  mb-6"></div>
            <p class="text-lg md:text-xl text-gray-200 max-w-3xl mx-auto">
                Datos que impulsan el cambio
            </p>
        </div>
    </section>

    <!-- Sección de porque actuar -->
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-16 ">
            <h2 class="text-4xl font-bold text-dark-blue mb-2">¿Por qué actuar?</h2>
            <div class="w-40 h-1 bg-green-600 mx-auto mb-4"></div>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Las cifras no mienten: Conoce la realidad que enfrentan
                millones de peruanos y
                cómo puedes ayudar</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-16 lg:gap-12 max-w-7xl mx-auto">
            <!--Sin agua potable -->
            <div
                class="group relative bg-white rounded-2xl p-8 transition-all duration-300 ease-out hover:transform hover:-translate-y-2 hover:shadow-xl cursor-default">
                <div class="mb-6">
                    <div
                        class="size-20 mx-auto rounded-xl bg-gradient-to-br from-blue-500 to-cyan-400 flex items-center justify-center group-hover:rotate-[25deg] transition-transform duration-300">
                        <svg class="size-10" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="white"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-droplet-off">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18.963 14.938a6.54 6.54 0 0 0 -.899 -4.06l-4.89 -7.26c-.42 -.626 -1.287 -.804 -1.936 -.398a1.376 1.376 0 0 0 -.41 .397l-1.282 1.9m-1.625 2.415l-1.986 2.946c-1.695 2.837 -1.035 6.44 1.567 8.545c2.602 2.105 6.395 2.105 8.996 0a6.83 6.83 0 0 0 1.376 -1.499" /><path d="M3 3l18 18" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-3 text-center">3.300.000</h3>
                <p
                    class="text-gray-600 leading-relaxed opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute bg-white px-6 py-2 rounded-xl shadow-lg z-10 text-center sm:text-pretty w-9/12 left-1/2 -translate-x-1/2">
                    Sin agua potable a pesar de ser indispensable, millones de peruanos no consiguen acceso a una red
                    pública de agua.
                </p>
                <p class="text-gray-500 leading-relaxed group-hover:opacity-0 transition-opacity duration-300 text-center">
                    Acceso limitado<br>al recurso vital
                </p>
            </div>

            <!--Niños sin educación -->
            <div
                class="group relative bg-white rounded-2xl p-8 transition-all duration-300 ease-out hover:transform hover:-translate-y-2 hover:shadow-xl cursor-default">
                <div class="mb-6">
                    <div
                        class="size-20 mx-auto rounded-xl bg-gradient-to-br from-emerald-500 to-lime-400 flex items-center justify-center group-hover:rotate-[25deg] transition-transform duration-300">
                        <svg class="size-10" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="white"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-microscope-off"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 21h14" />
                            <path d="M6 18h2" /><path d="M7 18v3" /><path d="M10 10l-1 1l3 3l1 -1m2 -2l3 -3l-3 -3l-3 3" /><path d="M10.5 12.5l-1.5 1.5" /><path d="M17 3l3 3" /><path d="M12 21a6 6 0 0 0 5.457 -3.505m.441 -3.599a6 6 0 0 0 -2.183 -3.608" /><path d="M3 3l18 18" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-3 text-center">360.000</h3>
                <p
                    class="text-gray-600 leading-relaxed opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute bg-white px-6 py-2 rounded-xl shadow-lg z-10 text-center sm:text-pretty w-9/12 left-1/2 -translate-x-1/2">
                    Niños y adolescentes no asisten a la escuela por situaciones familiares, económicas, falta de vacantes,
                    etc.
                </p>
                <p class="text-gray-500 leading-relaxed group-hover:opacity-0 transition-opacity duration-300 text-center">
                    Educación interrumpida<br>en la niñez
                </p>
            </div>

            <!--Sin alcantarillado -->
            <div
                class="group relative bg-white rounded-2xl p-8 transition-all duration-300 ease-out hover:transform hover:-translate-y-2 hover:shadow-xl cursor-default">
                <div class="mb-6">
                    <div
                        class="size-20 mx-auto rounded-xl bg-gradient-to-br from-purple-500 to-fuchsia-400 flex items-center justify-center group-hover:rotate-[25deg] transition-transform duration-300">
                        <svg class="size-10" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="white"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-buildings">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 21v-15c0 -1 1 -2 2 -2h5c1 0 2 1 2 2v15" /><path d="M16 8h2c1 0 2 1 2 2v11" /><path d="M3 21h18" /><path d="M10 12v0" /><path d="M10 16v0" /><path d="M10 8v0" /><path d="M7 12v0" /><path d="M7 16v0" /><path d="M7 8v0" /><path d="M17 12v0" /><path d="M17 16v0" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-3 text-center">6.400.000</h3>
                <p
                    class="text-gray-600 leading-relaxed opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute bg-white px-6 py-2 rounded-xl shadow-lg z-10 text-center sm:text-pretty w-9/12 left-1/2 -translate-x-1/2">
                    En su mayoría son personas de provincia quienes carecen de este servicio.
                </p>
                <p class="text-gray-500 leading-relaxed group-hover:opacity-0 transition-opacity duration-300 text-center">
                    Infraestructura básica<br>ausente
                </p>
            </div>

            <!--Pobreza -->
            <div
                class="group relative bg-white rounded-2xl p-8 transition-all duration-300 ease-out hover:transform hover:-translate-y-2 hover:shadow-xl cursor-default">
                <div class="mb-6">
                    <div
                        class="size-20 mx-auto rounded-xl bg-gradient-to-br from-amber-500 to-orange-400 flex items-center justify-center group-hover:rotate-[25deg] transition-transform duration-300">
                        <svg class="size-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-3 text-center">9.700.000</h3>
                <p
                    class="text-gray-600 leading-relaxed opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute bg-white px-6 py-2 rounded-xl shadow-lg z-10 text-center sm:text-pretty w-9/12 left-1/2 -translate-x-1/2">
                    Pobreza al final del 2023 se estimó esta cifra, siendo el segundo año consecutivo que aumenta.
                </p>
                <p class="text-gray-500 leading-relaxed group-hover:opacity-0 transition-opacity duration-300 text-center">
                    Crecimiento constante<br>de la desigualdad
                </p>
            </div>

            <!-- Sin hogar -->
            <div
                class="group relative bg-white rounded-2xl p-8 transition-all duration-300 ease-out hover:transform hover:-translate-y-2 hover:shadow-xl cursor-default">
                <div class="mb-6">
                    <div
                        class="size-20 mx-auto rounded-xl bg-gradient-to-br from-red-500 to-pink-400 flex items-center justify-center group-hover:rotate-[25deg] transition-transform duration-300">
                        <svg class="size-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-3 text-center">1.700.000</h3>
                <p
                    class="text-gray-600 leading-relaxed opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute bg-white px-6 py-2 rounded-xl shadow-lg z-10 text-center sm:text-pretty w-9/12 left-1/2 -translate-x-1/2">
                    Es el total de familias que no tienen casa propia o tienen una en malas condiciones.
                </p>
                <p class="text-gray-500 leading-relaxed group-hover:opacity-0 transition-opacity duration-300 text-center">
                    Falta de vivienda<br>digna
                </p>
            </div>

            <!--Crisis alimentaria -->
            <div
                class="group relative bg-white rounded-2xl p-8 transition-all duration-300 ease-out hover:transform hover:-translate-y-2 hover:shadow-xl cursor-default">
                <div class="mb-6">
                    <div
                        class="size-20 mx-auto rounded-xl bg-gradient-to-br from-green-500 to-emerald-400 flex items-center justify-center group-hover:rotate-[25deg] transition-transform duration-300">
                        <svg class="size-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-semibold text-gray-900 mb-3 text-center">16.000.000</h3>
                <p
                    class="text-gray-600 leading-relaxed opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute bg-white px-6 py-2 rounded-xl shadow-lg z-10 text-center sm:text-pretty w-9/12 left-1/2 -translate-x-1/2">
                    Muchas personas reducen su consumo de alimentos ya que reciben bajos ingresos.
                </p>
                <p class="text-gray-500 leading-relaxed group-hover:opacity-0 transition-opacity duration-300 text-center">
                    Inseguridad alimentaria<br>generalizada
                </p>
            </div>
        </div>
    </section>

    <!-- Sección de "Dónde trabajamos" -->
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <!-- Encabezado -->
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-dark-blue mb-2">Dónde trabajamos en Perú</h2>
            <div class="w-40 h-1 bg-green-600 mx-auto mb-4"></div>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Descubre nuestros proyectos y actividades en diferentes regiones del país
            </p>
        </div>

        <!-- Filtros -->
        <div class="flex flex-col md:flex-row gap-4 mb-12 px-4">
            <div class="flex-1 flex flex-col md:flex-row gap-4">
                <div class="relative flex-1">
                    <select
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all appearance-none bg-white">
                        <option>Todas las regiones</option>
                        <option>Lima</option>
                        <option>Cusco</option>
                        <option>Ica</option>
                        <option>Trujillo</option>
                    </select>
                    <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                <div class="relative flex-1">
                    <select
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all appearance-none bg-white">
                        <option>Todos los temas</option>
                        <option>Historia</option>
                        <option>Arte</option>
                    </select>
                    <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                <div class="relative flex-1">
                    <input type="text" placeholder="Buscar proyectos..."
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 pr-12 transition-all">
                    <button class="absolute inset-y-0 right-3 flex items-center">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </div>
            <x-ui.button class="bg-light-Orange hover:bg-dark-blue text-white " size="md" rounded="lg">
                Filtrar
            </x-ui.button>
        </div>

        <!-- Contenedor de tarjetas (grid) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card: LIMA -->
            <div class="relative bg-cover bg-center rounded-2xl p-8"
                style="background-image: url('https://www.viajesyfotografia.com/wp-content/uploads/2013/02/pachacamac-peru.jpg');"
                x-data>
                <!-- Contenido superpuesto (fondo semitransparente) -->
                <div class="bg-white bg-opacity-70 p-4 rounded">
                    <h3 class="text-xl font-semibold mb-2">Lima</h3>
                    <p class="text-gray-600">Museo de Historia</p>
                    <div class="mt-2">
                        <x-ui.button class="bg-blue-600 text-white hover:bg-blue-700 focus:ring-2 focus:ring-blue-300"
                            size="md" rounded="lg" @click="$dispatch('open-modal', { modalId: 'lima' })">
                            Ver detalles
                        </x-ui.button>
                    </div>
                </div>
                <!-- Modal para Lima -->
                <x-ui.modals modalId="lima" title="Museo de Historia" isOpen="false" padding="md" shadow="md" rounded="md" >
                    <p class="mb-2 text-gray-600">Región: Lima</p>
                    <img src="https://www.viajesyfotografia.com/wp-content/uploads/2013/02/pachacamac-peru.jpg"
                        alt="Museo de Historia" class="w-full h-48 object-cover">
                    <p class="mt-4">
                        El Museo de Historia en Lima alberga una rica colección de artefactos históricos, desde la época
                        precolombina hasta la era contemporánea. Este museo es un testimonio de la rica herencia cultural
                        del Perú, presentando exposiciones que incluyen cerámicas, textiles, y objetos de oro de
                        civilizaciones antiguas como los Incas y los Moche. Además, el museo organiza regularmente eventos y
                        actividades educativas para todas las edades, ofreciendo una experiencia inmersiva en la historia
                        peruana.
                    </p>
                </x-ui.modals>
            </div>

            <!-- Card: CUSCO -->
            <div class="relative bg-cover bg-center rounded-2xl p-8"
                style="background-image: url('https://c8.alamy.com/comp/2J50AYC/the-great-mural-of-the-history-of-cusco-by-artist-juan-bravo-vizcarra-avenida-el-sol-cusco-peru-2J50AYC.jpg');"
                x-data>
                <div class="bg-white bg-opacity-70 p-4 rounded">
                    <h3 class="text-xl font-semibold mb-2">Cusco</h3>
                    <p class="text-gray-600">Mural Histórico</p>
                    <div class="mt-2">
                        <x-ui.button class="bg-blue-600 text-white hover:bg-blue-700 focus:ring-2 focus:ring-blue-300"
                            size="md" rounded="lg" @click="$dispatch('open-modal', { modalId: 'cusco' })">
                            Ver detalles
                        </x-ui.button>
                    </div>
                </div>
                <!-- Modal para Cusco -->
                <x-ui.modals modalId="cusco" title="Mural Histórico" isOpen="false" padding="md" shadow="md" rounded="md">
                    <p class="mb-2 text-gray-600">Región: Cusco</p>
                    <img src="https://c8.alamy.com/comp/2J50AYC/the-great-mural-of-the-history-of-cusco-by-artist-juan-bravo-vizcarra-avenida-el-sol-cusco-peru-2J50AYC.jpg"
                        alt="Mural Histórico" class="w-full h-48 object-cover">
                    <p class="mt-4">
                        Este mural en Cusco representa la vibrante cultura artística de la región, capturando elementos de
                        la vida cotidiana y la historia ancestral de los pueblos andinos. Los colores vivos y las detalladas
                        figuras reflejan la energía y la creatividad de los artistas locales. El mural se ha convertido en
                        un punto de referencia popular, atrayendo tanto a residentes como a turistas que buscan apreciar la
                        riqueza del arte callejero cusqueño.
                    </p>
                </x-ui.modals>
            </div>

            <!-- Card: ICA -->
            <div class="relative bg-cover bg-center rounded-2xl p-8"
                style="background-image: url('https://www.peru.travel/Contenido/General/Imagen/en/43/1.1/Huacachina.jpg');"
                x-data>
                <div class="bg-white bg-opacity-70 p-4 rounded">
                    <h3 class="text-xl font-semibold mb-2">Ica</h3>
                    <p class="text-gray-600">Oasis de Huacachina</p>
                    <div class="mt-2">
                        <x-ui.button class="bg-blue-600 text-white hover:bg-blue-700 focus:ring-2 focus:ring-blue-300"
                            size="md" rounded="lg" @click="$dispatch('open-modal', { modalId: 'ica' })">
                            Ver detalles
                        </x-ui.button>
                    </div>
                </div>
                <!-- Modal para Ica -->
                <x-ui.modals modalId="ica" title="Oasis de Huacachina" isOpen="false" padding="md" shadow="md" rounded="md">
                    <p class="mb-2 text-gray-600">Región: Ica</p>
                    <img src="https://www.peru.travel/Contenido/General/Imagen/en/43/1.1/Huacachina.jpg"
                        alt="Oasis de Huacachina" class="w-full h-48 object-cover">
                    <p class="mt-4">
                        El oasis de Huacachina es un hermoso lugar natural en medio del desierto, conocido por su
                        impresionante laguna rodeada de altas dunas de arena. Es un destino popular para actividades al aire
                        libre como el sandboarding, paseos en buggy y la exploración del paisaje desértico. La leyenda local
                        cuenta que la laguna fue creada por las lágrimas de una princesa inca. Huacachina ofrece una
                        combinación única de aventura y relajación, siendo un paraíso para los amantes de la naturaleza y
                        los deportes extremos.
                    </p>
                </x-ui.modals>
            </div>

            <!-- Card: TRUJILLO -->
            <div class="relative bg-cover bg-center rounded-2xl p-8"
                style="background-image: url('https://www.norteexpedition.com/wp-content/uploads/2021/03/chna-chan-2-1024x771.jpg');"
                x-data>
                <div class="bg-white bg-opacity-70 p-4 rounded">
                    <h3 class="text-xl font-semibold mb-2">Trujillo</h3>
                    <p class="text-gray-600">Sitio Arqueológico</p>
                    <div class="mt-2">
                        <x-ui.button class="bg-blue-600 text-white hover:bg-blue-700 focus:ring-2 focus:ring-blue-300"
                            size="md" rounded="lg" @click="$dispatch('open-modal', { modalId: 'trujillo' })">
                            Ver detalles
                        </x-ui.button>
                    </div>
                </div>
                <!-- Modal para Trujillo -->
                <x-ui.modals modalId="trujillo" title="Sitio Arqueológico" isOpen="false" padding="md" shadow="md"
                    rounded="md">
                    <p class="mb-2 text-gray-600">Región: Trujillo</p>
                    <img src="https://www.norteexpedition.com/wp-content/uploads/2021/03/chna-chan-2-1024x771.jpg"
                        alt="Sitio Arqueológico" class="w-full h-48 object-cover">
                    <p class="mt-4">
                        El oasis de Huacachina en Trujillo es un hermoso lugar natural en medio del desierto, similar al
                        famoso oasis en Ica. Este oasis también cuenta con una laguna rodeada de dunas de arena y es un
                        destino ideal para actividades recreativas como el sandboarding y los paseos en buggy. La
                        tranquilidad del entorno y la belleza del paisaje hacen de Huacachina en Trujillo un lugar perfecto
                        para escapar del bullicio de la ciudad y disfrutar de la naturaleza en su forma más pura.
                    </p>
                </x-ui.modals>
            </div>
        </div>

        <!-- Contenedor del mapa -->
        <div class="mt-10">
            <!-- Div que contendrá el mapa -->
            <div id="map" class="w-full h-[600px] bg-gray-200 rounded-md"></div>
        </div>
    </section>
    <script>
        // Función que Google Maps llamará cuando cargue la API
        function initMap() {
            // Centro aproximado de Perú
            const centerOfPeru = { lat: -9.189967, lng: -75.015152 };

            // Inicializar el mapa dentro del div con id="map"
            const map = new google.maps.Map(document.getElementById('map'), {
                center: centerOfPeru,
                zoom: 6,
            });

            // Ubicaciones (marcadores) que deseas mostrar
            const locations = {
                Lima: { lat: -12.046374, lng: -77.042793 },
                Cusco: { lat: -13.53195, lng: -71.967463 },
                Ica: { lat: -14.075739, lng: -75.734181 },
                Trujillo: { lat: -8.109052, lng: -79.021534 },
            };

            // Crear un marcador para cada ubicación
            for (const [name, coords] of Object.entries(locations)) {
                new google.maps.Marker({
                    position: coords,
                    map: map,
                    title: name
                });
            }
        }
    </script>

    <!-- Carga de la librería de Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhNGpPSrUf23psy4NorA7ul3YaJCTjQcA&callback=initMap" async
        defer></script>


        <script>
        setTimeout(() => {
            const modal = document.getElementById('miModal');
            if (modal) {
                modal.classList.remove('hidden');
            }
        }, 5000); // 5 segundos
    </script>
@endsection