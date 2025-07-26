@extends('layouts.appdashboard')

@section('title', 'Lista de Proyectos')

@section('dashboard')
<x-section-container-admin title="Proyectos" id="projects" />

<!-- Modal de Edición de Proyecto -->
<x-form.modal-container name="project" title="Editar Proyecto" formClass="flex flex-col gap-4">

    <x-form.form-field label="Título" for="titulo">
        <input name="titulo" type="text" id="titulo" class="form"
            placeholder="Ingrese el título">
    </x-form.form-field>

    <x-form.form-field label="Etapa" for="etapa">
        <select name="etapa" id="etapa" class="form">
            @for ($year = date('Y'); $year >= 2018; $year--)
            <option value="{{ $year }}">{{ $year }}</option>
            @endfor
        </select>
    </x-form.form-field>

    <x-form.form-field label="Etiqueta" for="etiqueta">
        <select name="etiqueta" id="etiqueta" class="form cursor-pointer">
            <option value="Infraestructura">Infraestructura</option>
            <option value="Tecnología">Tecnología</option>
            <option value="Consultoría">Consultoría</option>
            <option value="Vivienda">Vivienda</option>
            <option value="Construcción">Construcción</option>
            <option value="Otros">Otros</option>
        </select>
    </x-form.form-field>

    <x-form.form-field label="Descripción" for="descripcion">
        <textarea name="descripcion" id="descripcion" rows="6" class="form" placeholder="Ingrese el contenido del proyecto"></textarea>
    </x-form.form-field>

    <x-form.form-field label="Resumen" for="resumen">
        <textarea name="resumen" id="resumen" rows="4" class="form" placeholder="Ingrese un resumen"></textarea>
    </x-form.form-field>

    <!-- Portada -->
    <x-form.form-field label="Portada" for="portada">
        <x-form.img-selector name="portada" />
    </x-form.form-field>

</x-form.modal-container>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const projectsContainer = document.getElementById("projectsContainer");
        const token = localStorage.getItem('token');

        if (!token) {
            console.error("❌ No hay token disponible. Asegúrate de que el usuario esté autenticado.");
        }

        fetchProjects();
        setupEditModalHandlers(projectsContainer, fetchProject, updateProject, 'project');
    });

    async function fetchProject(newId) {
        try {
            const data = await apiFetch(`{{ url('/api/getProject') }}/${newId}`);
            console.log(data)
            //const proyecto = data.projects;
            document.getElementById("project-id").value = data.id || "";
            document.getElementById("titulo").value = data.titulo || "";
            document.getElementById("etapa").value = data.etapa || "";
            document.getElementById("etiqueta").value = data.etiqueta || "";
            document.getElementById("resumen").value = data.resumen || "";
            document.getElementById("descripcion").value = data.descripcion || "";

            loadPreviewImgs(['portada'], data)

            document.getElementById("project-modal").classList.remove("hidden");
        } catch (e) {
            console.error("Error al obtener el proyecto", e)
        }
    }

    async function fetchProjects() {
        try {
            const data = await apiFetch("{{ url('/api/getAllProjects') }}");
            displayProjects(data.projects)
        } catch (e) {
            console.error("Error al obtener proyectos", e)
        }
    }

    function displayProjects(projects) {
        const projectsTotal = document.getElementById("projectsTotal");
        projectsTotal.textContent = projects.length;
        projectsContainer.innerHTML = "";

        projects.forEach(proyecto => {
            projectsContainer.innerHTML += `
            <x-card-admin id=${proyecto.id} data="project" edit="true"> 
                <div class="relative">
                        <img class="w-full h-48 object-cover"
                            src="${proyecto.portada || '/default-image.jpg'}"
                            alt="${proyecto.titulo || 'Proyecto'}">
                        <div class="absolute top-1 right-1 bg-green-100/90 px-3 py-1 rounded-full text-sm font-medium text-emerald-700">
                            ${proyecto.etiqueta}
                        </div>
                    </div>

                    <div class="flex flex-col gap-2 my-2 text-sm text-gray-500">
                        <h3 class="text-xl font-semibold text-gray-900 leading-tight">
                            ${proyecto.titulo || 'Sin título'}
                        </h3>
                        <span><strong>Resumen:</strong>
                            ${proyecto.resumen || 'No hay resumen disponible'}
                        </span>
                        <span><strong>Fecha de publicación: </strong>${proyecto.etapa}</span>
                </div>
            </x-card-admin>
            `;
        });
        deleteResource('/api/destroyProject', 'project');
    }

    async function updateProject() {
        const projectId = document.getElementById("project-id").value;
        const formData = new FormData();
        formData.append("_method", "PATCH"); // 🔥 Indicar que es una actualización
        formData.append("titulo", document.getElementById("titulo").value.trim());
        formData.append("descripcion", document.getElementById("descripcion").value.trim());
        formData.append("resumen", document.getElementById("resumen").value.trim());
        formData.append("etiqueta", document.getElementById("etiqueta").value.trim());
        formData.append("etapa", document.getElementById("etapa").value.trim());

        const portadaInput = document.getElementById("portada").files[0];
        if (portadaInput) formData.append("portada", portadaInput);

        submitFormData(`/api/updateProject/${projectId}`, 'save-project-btn', '/homeDashboard/listprojects', formData);
    }
</script>