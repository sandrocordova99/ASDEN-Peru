@extends('layouts.apppage')

@section('title', 'Asden Perú - Voluntariado')

@section('content')
<!-- Banner -->
<section class="relative min-h-[600px] bg-cover bg-center bg-no-repeat flex items-center py-20"
    style="background-image: url('/banners/banner-trabajos.webp');">
    <!-- Overlay degradado -->
    <div class="absolute inset-0 bg-gradient-to-b from-black/40 to-black/70"></div>

    <!-- Contenedor principal -->
    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">Transforma tu pasión en acción</h1>
        <div class="w-32 h-1 bg-light-Orange rounded-full mx-auto  mb-6"></div>
        <p class="text-lg md:text-xl text-gray-200 max-w-3xl mx-auto">
            Únete a profesionales comprometidos con la conservación ambiental y el desarrollo sostenible
        </p>
        <a href="#oferts">
            <x-ui.button class="bg-[#C64508] hover:bg-opacity-90 text-white mt-6 " size="md" rounded="full">
                Explorar las Ofertas
            </x-ui.button>
        </a>
    </div>
</section>
<section class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 max-w-4xl">
    <div class="text-center">
        <h2 class="text-4xl font-bold text-dark-blue mb-2">
            Hazte Voluntario! Solo te pedimos:
        </h2>
        <div class="w-40 h-1 bg-green-600 mx-auto mb-8"></div>
        <div class="flex flex-col md:flex-row justify-center items-center">
            <ul class="flex flex-col w-4/5 lg:w-full text-left justify-center text-base lg:text-xl leading-relaxed md:leading-9">
                <li>🔸Conocer la misión de la Organización.</li>
                <li>🔸Conocer las actividades que realiza para su misión.</li>
                <li>🔸Respetar los principios y criterios de Asden.</li>
                <li>🔸Compromiso y responsabilidad con la Institución. </li>
                <li>🔸Esfuerzo e ilusión.</li>
                <li>🔸Esfuerzo</li>
            </ul>
            <img src="/voluntariado.svg" class="flex flex-col w-3/5 md:w-2/5" alt="">
        </div>
    </div>
</section>
<!--section de Ofertas de Empleo-->
<!-- Sin apis de backend -->
<section class="container mx-auto px-4 sm:px-6 lg:px-8 py-16" id="oferts">
    <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-dark-blue mb-2">
            Ofertas de Empleo
        </h2>
        <div class="w-40 h-1 bg-green-600 mx-auto mb-4"></div>
        <p class="text-gray-600">
            Encuentra oportunidades laborales en nuestra comunidad de profesionales comprometidos
            con la conservación ambiental y el desarrollo sostenible.
        </p>
    </div>
    <div class="max-w-7xl mx-auto grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="jobsContainer">
        <!-- Contenedor de trabajos -->

    </div>
</section>
<!-- Sección de Impacto Multidimensional -->
<section class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <!-- Encabezado de sección -->
    <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-dark-blue mb-2">
            Nuestro Impacto Multidimensional
        </h2>
        <div class="w-40 h-1 bg-green-600 mx-auto mb-4"></div>
        <blockquote class="text-lg text-gray-600 max-w-2xl mx-auto">
            "En cada acción buscamos el equilibrio perfecto entre el progreso humano y la preservación de nuestra
            riqueza natural"
        </blockquote>
        <p class="text-gray-600 mt-2 italic">Filosofía ASDEN</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="space-y-8">
            <!-- Tarjeta: Conservación Activa -->
            <div
                class="p-6 bg-white rounded-lg shadow hover:shadow-xl transition transform hover:scale-105 duration-200">
                <h3 class="text-2xl font-semibold text-dark-blue mb-2">
                    Conservación Activa
                </h3>
                <!-- Barra representativa para Conservación Activa -->
                <div class="w-12 h-1 bg-green-600 my-2"></div>
                <p class="text-gray-600">
                    Participa en proyectos de protección de ecosistemas andinos y amazónicos con enfoque científico y
                    comunitario.
                </p>
            </div>

            <!-- Tarjeta: Impacto Social -->
            <div
                class="p-6 bg-white rounded-lg shadow hover:shadow-xl transition transform hover:scale-105 duration-200">
                <h3 class="text-2xl font-semibold text-dark-blue mb-2">
                    Impacto Social
                </h3>
                <!-- Barra representativa para Impacto Social -->
                <div class="w-12 h-1 bg-blue-600 my-2"></div>
                <p class="text-gray-600">
                    Colabora con comunidades locales desarrollando soluciones sostenibles que mejoran la calidad de vida
                    y la
                    conservación.
                </p>
            </div>

            <!-- Tarjeta: Desarrollo Profesional -->
            <div
                class="p-6 bg-white rounded-lg shadow hover:shadow-xl transition transform hover:scale-105 duration-200">
                <h3 class="text-2xl font-semibold text-dark-blue mb-2">
                    Desarrollo Profesional
                </h3>
                <!-- Barra representativa para Desarrollo Profesional -->
                <div class="w-12 h-1 bg-indigo-600 my-2"></div>
                <p class="text-gray-600">
                    Accede a programas de capacitación continua y certificaciones en gestión ambiental y proyectos
                    sostenibles.
                </p>
            </div>
        </div>

        <!-- Video -->
        <div class="w-full">
            <div class="aspect-w-16 aspect-h-9 rounded-lg shadow-lg overflow-hidden">
                <lite-youtube videoid="qtGpiLBO1P0">
                    <a class="lite-youtube-fallback" href="https://www.youtube.com/watch?v=qtGpiLBO1P0">Mira en YouTube:
                        "Programa de Voluntariado "Vivimos, Servimos""</a>
                </lite-youtube>
            </div>
        </div>
    </div>
</section>





<script>
    document.addEventListener("DOMContentLoaded", function() {
        const jobsContainer = document.getElementById("jobsContainer");

        fetch("{{ url('/api/getAllWorks') }}", {
                method: "GET",
                headers: {
                    "Accept": "application/json"
                }
            })
            .then(async response => {
                console.log("Código de respuesta:", response.status);
                const data = await response.json().catch(() => null);

                if (!response.ok) {
                    throw new Error(data?.message || "Error desconocido en la API");
                }

                return data;
            })
            .then(data => {
                console.log("✅ Trabajos obtenidos:", data);

                if (!data || !data.trabajos) {
                    throw new Error("No se encontraron trabajos en la respuesta");
                }

                jobsContainer.innerHTML = ""; // Limpiar el contenedor antes de insertar los datos

                data.trabajos.forEach(trabajo => {
                    const colorTrabajo = trabajo.color; // Obtener el color almacenado en la base de datos
                    //console.log("Color del trabajo:", trabajo.color);
                    jobsContainer.innerHTML += `
                                <div class="group relative bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2"
                                     data-aos="zoom-in">
                                    <div class="p-6">
                                        <div class="flex items-center mb-4">
                                            <div class="w-12 h-12 rounded-lg flex items-center justify-center mr-4" style="background-color: ${colorTrabajo};">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="text-xl font-bold text-gray-900">${trabajo.titulo}</h3>
                                                <p class="text-sm" style="color: ${colorTrabajo};">${trabajo.tipo_trabajo}</p>
                                                <span class="text-xs text-gray-400">Vacantes: </span>
                                                <span class="text-xs text-gray-400">${trabajo.cantidad_puestos}</span>
                                            </div>
                                        </div>
                                        <div class="flex items-center text-sm text-gray-500 mb-4">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <span>${trabajo.modalidad}</span>
                                        </div>
                                        <p class="text-gray-600 text-sm mb-6 line-clamp-3">
                                            ${trabajo.resumen}
                                        </p>
                                        <div class="flex justify-between items-center">
                                        <a href="/trabajos/${trabajo.id}" 
   class="inline-block px-4 py-2 rounded-full text-white text-sm"
   style="background-color: ${colorTrabajo};">
   Ver Detalles
</a>

                                            <button class="px-4 py-2 rounded-full text-sm" style="background-color: ${colorTrabajo}; color: white;" 
                                                @click="$dispatch('open-modal', { modalId: 'postular-${trabajo.id}' })">
                                                Postular
                                            </button>
                                        </div>
                                    </div>
                                </div>


                                <x-ui.modals maxWidth="xl" modalId="${trabajo.id}" isOpen="false" padding="md" shadow="md" rounded="md">
                                <div class="max-h-[80vh] md:max-h-[90vh] overflow-y-auto">            
                                <article class="text-center grid grid-cols-1 md:grid-cols-2 gap-x-3 gap-y-5 items-stretch" >
                                                <div class="flex flex-col h-full">
                                                    <h3 class="text-black-600 font-bold rounded-md p-2" style="background-color: ${colorTrabajo}">Detalles</h3>
                                                    <p class="shadow-xl p-3 text-sm md:text-base flex-grow text-pretty">${trabajo.descripcion}</p>
                                                </div>
                                                <div class="flex flex-col h-full">
                                                    <h3 class="text-black-600 font-bold rounded-md p-2" style="background-color: ${colorTrabajo}">Funciones</h3>
                                                    <p class="shadow-xl p-3 text-sm md:text-base flex-grow text-pretty">${trabajo.funciones}</p>
                                                </div>
                                                <div class="flex flex-col h-full">
                                                    <h3 class="text-black-600 font-bold rounded-md p-2" style="background-color: ${colorTrabajo}">Beneficios</h3>
                                                    <p class="shadow-xl p-3 text-sm md:text-base flex-grow text-pretty">${trabajo.beneficios}</p>
                                                </div>
                                                <div class="flex flex-col h-full">
                                                    <h3 class="text-black-600 font-bold rounded-md p-2" style="background-color: ${colorTrabajo}">Requisitos</h3>
                                                    <p class="shadow-xl p-3 text-sm md:text-base flex-grow text-pretty">${trabajo.requisitos}</p>
                                                </div>
                                            </article>
                                            </div>
                                        </x-ui.modals>

                                        <x-ui.modals maxWidth="xl" modalId="postular-${trabajo.id}" isOpen="false" padding="md" shadow="md" rounded="md">
                                        <article class="text-center grid grid-cols-1 md:grid-cols-1 gap-x-3 gap-y-5 items-stretch max-h-[80vh] overflow-auto">
                                                <h3 class="text-xl text-black-600 font-bold rounded-md">Formulario de Postulación</h3>
                                                <div class="w-32 h-1 bg-orange-400 rounded-full mx-auto"></div>

                                                <form class="shadow-xl p-5 text-sm md:text-base text-pretty overflow-auto" id="registerForm-${trabajo.id}">                                    
                                                    <!-- Campo de Nombres -->
                                                    <div class="mb-4">
                                                        <label for="nombres" class="block text-left font-semibold">Nombres:</label>
                                                        <input type="text" id="nombre" name="nombre" placeholder="Juan Carlos" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all placeholder-gray-400" required>
                                                    </div>

                                                    <!-- Campo de Apellidos -->
                                                    <div class="mb-4">
                                                        <label for="apellidos" class="block text-left font-semibold">Apellidos:</label>
                                                        <input type="text" id="apellido" name="apellido" placeholder="Pérez Rodríguez" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all placeholder-gray-400" required>
                                                    </div>

                                                    <!-- Campo de DNI / Carnet de Extranjería -->
                                                    <div class="mb-4">
                                                        <label for="dni" class="block text-left font-semibold">DNI / Carnet de Extranjería:</label>
                                                        <input type="text" id="dni" maxlength="12" name="dni"  placeholder="12345678" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all placeholder-gray-400" required>
                                                    </div>

                                                    <!-- Campo de Dirección -->
                                                    <div class="mb-4">
                                                        <label for="direccion" class="block text-left font-semibold">Dirección:</label>
                                                        <input type="text" id="direccion" name="direccion" placeholder="Av. Los Olivos 123, Lima" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all placeholder-gray-400" required>
                                                    </div>

                                                    <!-- Campo de Provincia -->
                                                    <div class="mb-4">
                                                        <label for="provincia" class="block text-left font-semibold">Provincia:</label>
                                                        <input type="text" id="provincia" name="provincia" placeholder="Lima" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all placeholder-gray-400" required>
                                                    </div>

                                                    <!-- Campo de Correo Electrónico -->
                                                    <div class="mb-4">
                                                        <label for="email" class="block text-left font-semibold">Correo Electrónico:</label>
                                                        <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all placeholder-gray-400" required>
                                                    </div>

                                                    <!-- Campo de Celular -->
                                                    <div class="mb-4">
                                                        <label for="celular" class="block text-left font-semibold">Celular:</label>
                                                        <input type="tel" id="telefono" pattern="9[0-9]{8}" placeholder="987654321" name="telefono" maxlength="9" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all placeholder-gray-400" required>
                                                    </div>

                                                    <!-- Campo de Pretensiones Salariales -->
                                                    <div class="mb-4">
                                                        <label for="pretensiones_salariales" class="block text-left font-semibold">Pretensiones Salariales:</label>
                                                        <input type="text" id="salario" name="salario" placeholder="1500" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition-all placeholder-gray-400" required>
                                                    </div>

                                                    <!-- Campo para Adjuntar CV -->
                                                    <div class="mb-4">
                                                        <label for="cv" class="block text-left font-semibold">Adjuntar CV:</label>
                                                        <p class=" text-left text-gray-500">Solo se admite formato PDF</p>
                                                        <input type="file" accept="application/pdf" id="cv" name="cv" class="w-full border rounded-md p-2" required>
                                                    </div>

                                                    <!-- Casilla de Aceptación de Política de Privacidad -->
                                                    <div class="mb-4 flex items-center">
                                                        <input type="checkbox" id="politica_privacidad" name="politica_privacidad" class="h-4 w-4 border-gray-300 rounded text-purple-600 focus:ring-2 focus:ring-purple-200" required>
                                                        <label for="politica_privacidad" class="ml-2 text-sm text-gray-600">He leído y acepto la política de privacidad.</label>
                                                    </div>

                                                    <!-- Casilla de Aceptación de Condiciones -->
                                                    <div class="mb-4 flex items-center">
                                                        <input type="checkbox" id="aceptacion_condiciones" name="aceptacion_condiciones" class="h-4 w-4 border-gray-300 rounded text-purple-600 focus:ring-2 focus:ring-purple-200" required>
                                                        <label for="aceptacion_condiciones" class="ml-2 text-sm text-gray-600 text-left">Acepto por medio del presente y de conformidad con los términos y condiciones.</label>
                                                    </div>

                                                    <!-- Botón de Enviar -->
                                                    <div class="flex justify-end mt-4">
                                                        <button type="submit" class="px-4 py-2 rounded-full text-sm" style="background-color: ${colorTrabajo}; color: white;">
                                                            Enviar Postulación
                                                        </button>
                                                    </div>
                                                </form>

                                            </article>
                                        </x-ui.modals>



                            `;
                });


                data.trabajos.forEach(trabajo => {
                    const formId = `registerForm-${trabajo.id}`;
                    const formulario = document.getElementById(formId);

                    if (formulario) {
                        formulario.addEventListener("submit", async function(event) {
                            event.preventDefault();
                            let formData = new FormData(this);

                            try {
                                let response = await fetch(`/api/solicitarTrabajo/${trabajo.id}`, {
                                    method: "POST",
                                    body: formData,
                                    headers: {
                                        "Accept": "application/json",

                                    },
                                    credentials: "include"
                                });

                                let data = await response.json();
                                console.log("Respuesta del servidor:", data);

                                if (response.ok) {
                                    alert("Solicitud registrada exitosamente.");
                                    this.reset();
                                } else {
                                    alert("Error: " + (data.message || "No se pudo registrar la solicitud."));
                                }
                            } catch (error) {
                                console.error("Error en la solicitud:", error);
                                alert("Error al conectar con el servidor.");
                            }

                        });
                    } else {
                        console.error(`No se encontró el formulario con ID: ${formId}`);
                    }
                });
            })
            .catch(error => {
                console.error("❌ Error al obtener trabajos:", error);
                jobsContainer.innerHTML = `<p class="text-center text-red-600">Error al cargar trabajos</p>`;
            });
    });

    setTimeout(() => {
        const modal = document.getElementById('miModal');
        if (modal) {
            modal.classList.remove('hidden');
        }
    }, 15000); // 5 segundos

    //guardar solicitud
</script>






@endsection