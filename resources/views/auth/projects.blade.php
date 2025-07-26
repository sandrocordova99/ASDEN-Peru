@extends('layouts.appdashboard')

@section('title', 'Registro de Proyectos')

@section('dashboard')
<x-register-container-admin id="projectsForm" title="Proyectos" description="Complete el formulario para publicar un nuevo proyecto.">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Campos de texto -->
        <x-form.form-field label="Título" for="titulo">
            <input type="text" name="titulo" id="titulo" placeholder="Máximo 50 caracteres" class="form">
        </x-form.form-field>

        <x-form.form-field label="Etapa" for="etapa">
            <select name="etapa" id="etapa" class="form">
                @for ($year = date('Y'); $year >= 2018; $year--)
                <option value="{{ $year }}">{{ $year }}</option>
                @endfor
            </select>
        </x-form.form-field>

        <x-form.form-field label="Etiqueta" for="etiqueta">
            <select name="etiqueta" id="etiqueta" class="form">
                <option value="Infraestructura">Infraestructura</option>
                <option value="Tecnología">Tecnología</option>
                <option value="Consultoría">Consultoría</option>
                <option value="Vivienda">Vivienda</option>
                <option value="Construcción">Construcción</option>
                <option value="Otros">Otros</option>
            </select>
        </x-form.form-field>

        <x-form.form-field label="Descripción" for="descripcion" divClass="md:col-span-2">
            <textarea name="descripcion" id="descripcion" rows="5" class="form"
                placeholder="Indique una descripción sobre el proyecto"></textarea>
        </x-form.form-field>

        <x-form.form-field label="Resumen" for="resumen" divClass="md:col-span-2">
            <textarea name="resumen" id="resumen" rows="3"
                class="form"
                placeholder="Brinde un pequeño resumen del proyecto"></textarea>
        </x-form.form-field>

        <!-- Imagen de portada -->
        <x-form.form-field label="Portada de proyecto" for="portada" divClass="md:col-span-2 flex flex-col">
            <div class="w-full max-w-[700px] mx-auto">
                <x-form.img-selector idInput="portada" name="portada" idImgPreview="portada-preview" idNoImg="no-image-portada" />
            </div>
        </x-form.form-field>

    </div>
    <!-- Botones -->
    <x-form.btns-register-form submitTitle="Registrar Proyecto" nameId="project" />

</x-register-container-admin>


<!-- Formulario -->
<script>
    document.getElementById("projectsForm").addEventListener("submit", async function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        submitFormData("/api/projects", 'save-project-btn', '/homeDashboard/listprojects', formData)
    });
</script>

<!-- Cargar Foto -->
<script>
    // Opcional: Cargar imagen desde URL
    document.getElementById('site')?.addEventListener('input', function(e) {
        const url = e.target.value;
        const preview = document.getElementById('avatar-preview');
        const noImageText = document.getElementById('no-image-text');

        if (url.match(/\.(jpeg|jpg|gif|png)$/)) {
            preview.src = url;
            preview.classList.remove('hidden');
            noImageText.classList.add('hidden');
        }
    });
</script>
@endsection