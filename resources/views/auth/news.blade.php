@extends('layouts.appdashboard')

@section('title', 'Registro de Noticia')

@section('dashboard')
<x-register-container-admin id="newsForm" title="Noticias" description="Complete el formulario para publicar una nueva noticia.">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Primera Imagen -->
        <x-form.form-field label="Imagen de Portada" for="portada" divClass="md:col-span-2 flex flex-col">
            <div class="w-[700px] self-center">
                <x-form.img-selector idInput="portada" name="portada" />
            </div>
        </x-form.form-field>

        <!-- Campos de texto -->
        <x-form.form-field label="Título" for="titulo">
            <input type="text" name="titulo" id="titulo" placeholder="Máximo 50 caracteres" class="form">
        </x-form.form-field>

        <x-form.form-field label="Categoría" for="tags">
            <select name="tags" id="tags" class="form">
                <option value="Medio Ambiente">Medio Ambiente</option>
                <option value="Energías">Energías</option>
                <option value="Biodiversidad">Biodiversidad</option>
                <option value="Agricultura">Agricultura</option>
                <option value="Recursos Naturales">Recursos Naturales</option>
                <option value="Desarrollo Sostenible">Desarrollo Sostenible</option>
            </select>
        </x-form.form-field>

        <!-- Párrafo 1 (Obligatorio) -->
        <h3 class="text-lg text-gray-600">> Primer Párrafo</h3>
        <x-form.form-field label="Subtítulo" for="subtitulo_1" divClass="md:col-span-2">
            <input name="subtitulo_1" id="subtitulo_1" type="text" class="form" placeholder="Ingrese un subtítulo">
        </x-form.form-field>

        <x-form.form-field label="Contenido" for="parrafo_1">
            <textarea name="parrafo_1" id="parrafo_1" rows="11" class="form" placeholder="mín. 450 caracteres - máx. 1000 caracteres" required></textarea>
        </x-form.form-field>

        <x-form.form-field label="Imagen" for="imagen_1">
            <div class="w-[full] self-center">
                <x-form.img-selector idInput="imagen_1" name="imagen_1" />
            </div>
        </x-form.form-field>


        <!-- Párrafo 2 -->
        <h3 class="text-lg text-gray-600">> Segundo Párrafo</h3>
        <x-form.form-field label="Subtítulo" for="subtitulo_2" divClass="md:col-span-2">
            <input name="subtitulo_2" id="subtitulo_2" type="text" class="form" placeholder="Ingrese un subtítulo">
        </x-form.form-field>

        <x-form.form-field label="Contenido" for="parrafo_2" divClass="md:col-span-2">
            <textarea name="parrafo_2" id="parrafo_2" rows="10" class="form" placeholder="mín. 450 caracteres - máx. 1000 caracteres"></textarea>
        </x-form.form-field>

        <x-form.form-field label="Imagen (Opcional)" for="imagen_2" divClass="md:col-span-2 flex flex-col">
            <div class="w-full max-w-[700px] mx-auto">
                <x-form.img-selector idInput="imagen_2" name="imagen_2" />
            </div>
        </x-form.form-field>

        <!-- Párrafo 3 (Opcional) -->
        <h3 class="text-lg text-gray-600">> Tercer Párrafo</h3>
        <x-form.form-field label="Subtítulo" for="subtitulo_3" divClass="md:col-span-2">
            <input name="subtitulo_3" id="subtitulo_3" type="text" class="form" placeholder="Ingrese un subtítulo">
        </x-form.form-field>

        <x-form.form-field label="Contenido" for="parrafo_3" divClass="md:col-span-2">
            <textarea name="parrafo_3" id="parrafo_3" rows="10" class="form" placeholder="mín. 450 caracteres - máx. 1000 caracteres"></textarea>
        </x-form.form-field>

        <x-form.form-field label="Imagen (Opcional)" for="imagen_3" divClass="md:col-span-2 flex flex-col">
            <div class="w-full max-w-[700px] mx-auto">
                <x-form.img-selector idInput="imagen_3" name="imagen_3" />
            </div>
        </x-form.form-field>

        <x-form.form-field label="Resumen" for="resumen" divClass="md:col-span-2">
            <textarea name="resumen" id="resumen" rows="3"
                class="form" placeholder="Brinde un pequeño resumen de la noticia"></textarea>
        </x-form.form-field>
    </div>
    <!-- Botones -->
    <x-form.btns-register-form submitTitle="Registrar Noticia" nameId="new" />

</x-register-container-admin>


<!-- Formulario -->
<script>
    document.getElementById("newsForm").addEventListener("submit", async function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        submitFormData("/api/news", 'save-new-btn', '/homeDashboard/listnews', formData)
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