@extends('layouts.appdashboard')

@section('title', 'Lista de Trabajos')

@section('dashboard')

<x-section-container-admin title="Trabajos" id="jobs" />

<!-- Modal de Edición de Trabajos -->
<x-form.modal-container name="job" title="Editar Trabajo" formClass="grid grid-cols-2 gap-4 max-sm:grid-cols-1">
<input type="hidden" name="id" id="job-id">
    <x-form.form-field label="Título" for="titulo">
        <input type="text" name="titulo" id="titulo" class="form" placeholder="Ingrese un título">
    </x-form.form-field>

    <x-form.form-field label="Color de trabajo" for="color_trabajo">
        <div class="flex flex-wrap gap-2 mt-4">
            <div class="color-option h-7 w-7 rounded-full bg-red-500 cursor-pointer" data-color="#f44336"></div>
            <div class="color-option h-7 w-7 rounded-full bg-blue-500 cursor-pointer" data-color="#2196f3"></div>
            <div class="color-option h-7 w-7 rounded-full bg-green-500 cursor-pointer" data-color="#4caf50"></div>
            <div class="color-option h-7 w-7 rounded-full bg-yellow-500 cursor-pointer" data-color="#ffeb3b"></div>
            <div class="color-option h-7 w-7 rounded-full bg-purple-500 cursor-pointer" data-color="#9c28b0"></div>
            <div class="color-option h-7 w-7 rounded-full bg-pink-500 cursor-pointer" data-color="#e91e63"></div>
            <div class="color-option h-7 w-7 rounded-full bg-indigo-500 cursor-pointer" data-color="#3f51b5"></div>
            <div class="color-option h-7 w-7 rounded-full bg-teal-500 cursor-pointer" data-color="#009688"></div>
            <input type="hidden" name="color" id="color_trabajo" value="">
        </div>
    </x-form.form-field>

    <x-form.form-field label="Tipo de empleo" for="tipo_trabajo">
        <select name="tipo_trabajo" id="tipo_trabajo"
            class="form cursor-pointer">
            <option value="Jornada Parcial">Jornada Parcial</option>
            <option value="Jornada Completa">Jornada Completa</option>
            <option value="Prácticas">Prácticas</option>
            <option value="Voluntariado">Voluntariado</option>
        </select>
    </x-form.form-field>

    <x-form.form-field label="Modalidad" for="modalidad">
        <select name="modalidad" id="modalidad"
            class="form cursor-pointer">
            <option value="Presencial">Presencial</option>
            <option value="Remoto">Remoto</option>
            <option value="Híbrido">Híbrido</option>
        </select>
    </x-form.form-field>

    <x-form.form-field label="Cantidad de vacantes" for="cantidad_puestos">
        <input type="number" step="1" name="cantidad_puestos" id="cantidad_puestos" class="form" placeholder="Número de vacantes">
    </x-form.form-field>

    <x-form.form-field label="Resumen" for="resumen" divClass="sm:col-span-2">
        <input type="text" name="resumen" id="resumen" class="form" placeholder="Ingrese un Resumen">
    </x-form.form-field>

    <x-form.form-field label="Descripción" for="descripcion" divClass="sm:col-span-2">
        <textarea name="descripcion" id="descripcion" rows="6" class="form" placeholder="Brinde mayor información para los postulantes"></textarea>
    </x-form.form-field>

    <x-form.form-field label="Funciones" for="funciones" divClass="sm:col-span-2">
        <textarea name="funciones" id="funciones" rows="6" class="form" placeholder="Indique cuáles serán los deberes de los postulantes."></textarea>
    </x-form.form-field>

    <x-form.form-field label="Beneficios" for="beneficios" divClass="sm:col-span-2">
        <textarea name="beneficios" id="beneficios" rows="6" class="form" placeholder="Agregue los beneficios que conlleva el postular a esta propuesta laboral."></textarea>
    </x-form.form-field>

    <x-form.form-field label="Requisitos" for="requisitos" divClass="sm:col-span-2">
        <textarea name="requisitos" id="requisitos" rows="6" class="form" placeholder="Indique los requisitos indispensables para la propuesta de trabajo."></textarea>
    </x-form.form-field>

    <x-form.form-field label="Imagen" for="imagen" divClass="sm:col-span-2">
        <x-form.img-selector name="imagen" />
    </x-form.form-field>


</x-form.modal-container>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const token = localStorage.getItem('token');
        const jobsContainer = document.getElementById("jobsContainer");
        if (!token) {
            console.error("❌ No hay token disponible. Asegúrate de que el usuario esté autenticado.");
            return;
        }

        colorOptions('color_trabajo', 'color-option')

        fetchJobs();
        setupEditModalHandlers(jobsContainer, fetchJob, updateJob, 'job');
    });

    /* Obtiene y muestra la lista de trabajos */
    async function fetchJobs() {
        try {
            const data = await apiFetch("{{ url('/api/getAllWorks') }}");
            displayJobs(data.trabajos)
        } catch (e) {
            console.error("Error al obtener trabajos", e)
        }
    }

    /* Obtiene los datos de un trabajo para edición */
    async function fetchJob(trabajoId) {
        try {
            const data = await apiFetch(`{{ url('/api/getJob') }}/${trabajoId}`)
            const trabajo = data.trabajo;
            document.getElementById("job-id").value = trabajo.id || "";
            document.getElementById("titulo").value = trabajo.titulo || "";
            document.getElementById("modalidad").value = trabajo.modalidad || "";
            document.getElementById("tipo_trabajo").value = trabajo.tipo_trabajo || "";
            document.getElementById("cantidad_puestos").value = trabajo.cantidad_puestos || "";
            document.getElementById("resumen").value = trabajo.resumen || "";
            document.getElementById("descripcion").value = trabajo.descripcion || "";
            document.getElementById("funciones").value = trabajo.funciones || "";
            document.getElementById("beneficios").value = trabajo.beneficios || "";
            document.getElementById("requisitos").value = trabajo.requisitos || "";

            document.getElementById("color_trabajo").value = trabajo.color || "#000000";

            const colorOptions = document.querySelectorAll('.color-option');
            colorOptions.forEach(option => {
                option.classList.remove('ring-2', 'ring-offset-2', 'ring-purple-500');

                if (option.getAttribute('data-color').toLowerCase() === (trabajo.color || "").toLowerCase().trim()) {
                    option.classList.add('ring-2', 'ring-offset-2', 'ring-purple-500');
                }
            });


            loadPreviewImgs(['imagen'], trabajo)

        document.getElementById("job-modal").classList.remove("hidden");
        } catch (e) {
            console.error("Error al obtener trabajo:", e);
        }
}

function loadPreviewImgs(imageUrl) {
    const selectorWrapper = document.querySelector('[name="imagen"]').closest('div');
    const previewContainer = selectorWrapper.querySelector('.img-preview-container');

    if (previewContainer && imageUrl) {
        previewContainer.innerHTML = `
            <img src="${imageUrl}" alt="Vista previa" class="h-32 object-contain rounded-lg border p-1">
        `;
    } else {
        console.warn("No se encontró el contenedor de imagen dentro del selector.");
    }
}


    function displayJobs(trabajos) {

        const jobsTotal = document.getElementById("jobsTotal");
        jobsTotal.textContent = trabajos.length;
        jobsContainer.innerHTML = "";

        trabajos.forEach(trabajo => {
            const colorTrabajo = trabajo.color;
            jobsContainer.innerHTML +=
                `
                 <x-card-admin id=${trabajo.id} data="job" edit="true">
                 <div class="flex items-center">
                        <div class="w-12 h-12 rounded-lg flex items-center justify-center mr-4" style="background-color: ${colorTrabajo};">
                            <svg class="w-6 h-6 text-${trabajo.color}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-900">${trabajo.titulo}</h3>
                        <h5 class="text-sm text-${trabajo.color}-600">${trabajo.tipo_trabajo}</h5>
                        <span class="text-xs text-gray-600">Vacantes: </span>
                        <span class="text-xs text-gray-600">${trabajo.cantidad_puestos}</span>
                    </div>
                </div>
                <div class="flex flex-col gap-2 my-2 text-sm text-gray-500"> 
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>${trabajo.modalidad}</span>
                    </div>

                <span class="text-gray-600 text-sm line-clamp-3"> ${trabajo.resumen}</span>
                <span><strong>Fecha de publicación: </strong> ${trabajo.created_at}</span>
                </div> 
                 </x-card-admin>             
                `;
        });

        deleteResource('/api/destroyJobs', 'job');
    }

    async function updateJob() {
        const jobId = document.getElementById("job-id").value;
        const formData = new FormData();
        formData.append("_method", "PUT");
        formData.append("titulo", document.getElementById("titulo").value.trim());
        formData.append("modalidad", document.getElementById("modalidad").value);
        formData.append("tipo_trabajo", document.getElementById("tipo_trabajo").value);
        formData.append("descripcion", document.getElementById("descripcion").value.trim());
        formData.append("cantidad_puestos", document.getElementById("cantidad_puestos").value);
        formData.append("resumen", document.getElementById("resumen").value.trim());
        formData.append("funciones", document.getElementById("funciones").value.trim());
        formData.append("beneficios", document.getElementById("beneficios").value.trim());
        formData.append("requisitos", document.getElementById("requisitos").value.trim());
        formData.append("color", document.getElementById("color_trabajo").value);

        const imagenInput = document.getElementById("imagen").files[0];
        if (imagenInput) formData.append("imagen", imagenInput);

        submitFormData(`/api/updateJob/${jobId}`, 'save-job-btn', '/homeDashboard/listjobs', formData);
    }
</script>