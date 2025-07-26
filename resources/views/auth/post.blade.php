@extends('layouts.appuserdashboard')

@section('title', 'Asden Perú - Registro de Blogs')

@section('userdashboard')
<x-register-container-admin id="postsForm" title="Blogs" description="Complete el formulario para crear un nuevo blog.">
    <input type="text" name="user_id" id="user_id" required readonly value="Usuario" class="hidden">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Portada -->
        <x-form.form-field label="Imagen de portada" for="portada" divClass="md:col-span-2">
            <div class="w-[full] md:mx-[10%]">
                <x-form.img-selector idInput="portada" name="portada" />
            </div>
        </x-form.form-field>

        <x-form.form-field label="Título" for="title" divClass="md:col-span-2">
            <input type="text" name="title" id="title" class="form" placeholder="Ingrese un título">
        </x-form.form-field>

        <x-form.form-field label="Etiquetas" for="tags" divClass="md:col-span-2">
            <div class="flex flex-col gap-2">
                <input
                    type="text"
                    name="tags"
                    id="tags-input"
                    placeholder="Escribe un tag y presiona 'Enter' o una coma."
                    class="form">
                <div id="tags-list" class="flex gap-2 flex-wrap"></div>
            </div>
            <input type="hidden" name="tags" id="tags">
        </x-form.form-field>

        <!-- PÁRRAFO 1 -->
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

        <!-- PÁRRAFO 2 -->
        <h3 class="text-lg text-gray-600">> Segundo Párrafo</h3>
        <x-form.form-field label="Subtítulo" for="subtitulo_2" divClass="md:col-span-2">
            <input name="subtitulo_2" id="subtitulo_2" type="text" class="form" placeholder="Ingrese un subtítulo">
        </x-form.form-field>

        <x-form.form-field label="Contenido" for="parrafo_2" divClass="md:col-span-2">
            <textarea name="parrafo_2" id="parrafo_2" rows="10" class="form" placeholder="mín. 450 caracteres - máx. 1000 caracteres"></textarea>
        </x-form.form-field>

        <x-form.form-field label="Imagen (Opcional)" for="imagen_2" divClass="md:col-span-2">
            <div class="w-[full] md:mx-[10%]">
                <x-form.img-selector idInput="imagen_2" name="imagen_2" />
            </div>
        </x-form.form-field>

        <!-- TARJETA 1 -->
        <h3 class="text-lg text-gray-600">> Primera Tarjeta</h3>
        <x-form.form-field label="Título" for="title_card_1" divClass="md:col-span-2">
            <input name="title_card_1" id="title_card_1" type="text" class="form" placeholder="Ingrese un título para la tarjeta">
        </x-form.form-field>
        <x-form.form-field label="Contenido" for="text_card_1" divClass="md:col-span-2">
            <textarea name="text_card_1" id="text_card_1" rows="5" class="form" placeholder="Ingrese el contenido de la tarjeta (mín. 150 - máx. 350 caracteres)" required></textarea>
        </x-form.form-field>

        <!-- TARJETA 2 -->
        <h3 class="text-lg text-gray-600">> Segunda Tarjeta</h3>
        <x-form.form-field label="Título" for="title_card_2" divClass="md:col-span-2">
            <input name="title_card_2" id="title_card_2" type="text" class="form" placeholder="Ingrese un título para la tarjeta">
        </x-form.form-field>
        <x-form.form-field label="Contenido" for="text_card_2" divClass="md:col-span-2">
            <textarea name="text_card_2" id="text_card_2" rows="5" class="form" placeholder="Ingrese el contenido de la tarjeta (mín. 150 - máx. 350 caracteres)" required></textarea>
        </x-form.form-field>

        <x-form.form-field label="Resumen" for="resumen" divClass="md:col-span-2">
            <textarea name="resumen" id="resumen" rows="3"
                class="form"
                placeholder="Brinde un pequeño resumen de la noticia"></textarea>
        </x-form.form-field>
    </div>

    <!-- Botones -->
    <x-form.btns-register-form submitTitle="Crear Blog" nameId="post" />
</x-register-container-admin>


<script>
    const userId = localStorage.getItem('id')
    const inputUser = document.getElementById('user_id');
    inputUser.value = `${userId}`

    document.addEventListener('DOMContentLoaded', function() {

        manageTags.showTags('tags-list', 'tags-input', 'tags');

        document.getElementById("postsForm").addEventListener("submit", async function(event) {
            event.preventDefault();
            const formData = new FormData(this);
            submitFormData("/api/createPost", 'save-post-btn', '/listpost', formData)
        });

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
    });
</script>
@endsection