@extends('layouts.appdashboard')

@section('title', 'Lista de Noticias')

@section('dashboard')

<x-section-container-admin title="Noticias" id="news" button="true" />

<!-- Modal de Edición de Noticia -->
<x-form.modal-container name="new" title="Editar Noticia" formClass="grid grid-cols-2 gap-4 max-sm:grid-cols-1">

    <!-- Portada -->
    <x-form.form-field label="Portada" for="portada" divClass="sm:col-span-2">
        <x-form.img-selector name="portada" />
    </x-form.form-field>

    <x-form.form-field label="Título" for="titulo">
        <input name=" titulo" type="text" id="titulo" class="form"
            placeholder="Ingrese el título">
    </x-form.form-field>

    <x-form.form-field label="Categoría" for="tags">
        <select name="tags" id="tags" class="form cursor-pointer">
            <option value="Medio Ambiente">Medio Ambiente</option>
            <option value="Energías">Energías</option>
            <option value="Biodiversidad">Biodiversidad</option>
            <option value="Agricultura">Agricultura</option>
            <option value="Recursos Naturales">Recursos Naturales</option>
            <option value="Desarrollo Sostenible">Desarrollo Sostenible</option>
        </select>
    </x-form.form-field>

    <h3 class="text-lg text-gray-600">> Primer Párrafo</h3>
    <!-- Párrafo 1-->
    <x-form.form-field label="Subtítulo" for="subtitulo_1" divClass="sm:col-span-2">
        <input name="subtitulo_1" id="subtitulo_1" type="text" class="form" placeholder="Ingrese un subtítulo">
    </x-form.form-field>

    <x-form.form-field label="Contenido" for="parrafo_1" divClass="sm:col-span-2">
        <textarea name="parrafo_1" id="parrafo_1" rows="9" class="form overflow-auto" placeholder="Primer párrafo (mín. 250 caracteres - máx. 710)"></textarea>
    </x-form.form-field>

    <x-form.form-field label="Imagen" for="imagen_1" divClass="flex flex-col sm:col-span-2">
        <div class="w-[350px] self-center">
            <x-form.img-selector name="imagen_1" />
        </div>
    </x-form.form-field>

    <h3 class="text-lg text-gray-600">> Segundo Párrafo</h3>
    <!-- Párrafo 2 -->
    <x-form.form-field label="Subtítulo" for="subtitulo_2" divClass="sm:col-span-2">
        <input name="subtitulo_2" id="subtitulo_2" type="text" class="form" placeholder="Ingrese un subtítulo">
    </x-form.form-field>

    <x-form.form-field label="Contenido" for="parrafo_2" divClass="sm:col-span-2">
        <textarea name="parrafo_2" id="parrafo_2" rows="10" class="form overflow-auto" placeholder="Segundo párrafo"></textarea>
    </x-form.form-field>

    <!-- Segunda Imagen -->
    <x-form.form-field label="Imagen (Opcional)" for="imagen_2" divClass="sm:col-span-2">
        <x-form.img-selector name="imagen_2" />
    </x-form.form-field>

    <h3 class="text-lg text-gray-600">> Tercer Párrafo</h3>
    <!-- Párrafo 3 -->
    <x-form.form-field label="Subtítulo" for="subtitulo_3" divClass="sm:col-span-2">
        <input name="subtitulo_3" id="subtitulo_3" type="text" class="form" placeholder="Ingrese un subtítulo">
    </x-form.form-field>

    <x-form.form-field label="Párrafo" for="parrafo_3" divClass="sm:col-span-2">
        <textarea name="parrafo_3" id="parrafo_3" rows="10" class="form overflow-auto" placeholder="Tercer párrafo"></textarea>
    </x-form.form-field>

    <!-- Tercera Imagen -->
    <x-form.form-field label="Imagen (Opcional)" for="imagen_3" divClass="sm:col-span-2">
        <x-form.img-selector name="imagen_3" />
    </x-form.form-field>

    <x-form.form-field label="Resumen" for="resumen" divClass="sm:col-span-2">
        <textarea name="resumen" id="resumen" rows="4" class="form overflow-auto" placeholder="Ingrese un resumen"></textarea>
    </x-form.form-field>

</x-form.modal-container>

@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const boton = document.getElementById('AcceptConditions')
        const newsContainer = document.getElementById("newsContainer");
        const token = localStorage.getItem('token');

        if (!token) {
            console.error("❌ No hay token disponible. Asegúrate de que el usuario esté autenticado.");
        }

        // Carga inicial de las noticias
        fetchNews('getAllNoticiasById', true)

        boton.addEventListener('change', () => {

            boton.checked ? fetchNews('getAllNoticiasById', true) : fetchNews('getAllNoticias', false)
        });

        setupEditModalHandlers(newsContainer, fetchNew, updateNew, 'new');
    });

    async function fetchNew(newId) {

        try {
            const data = await apiFetch(`{{ url('/api/getNoticia') }}/${newId}`);
            const noticia = data.noticia;

            // Parsear el JSON de descripción (o usar un objeto vacío si no existe)
            const descripcion = noticia.descripcion ? JSON.parse(noticia.descripcion) : {
                parrafo_1: "",
                parrafo_2: "",
                parrafo_3: "",
            };

            document.getElementById("new-id").value = noticia.id || "";
            document.getElementById("titulo").value = noticia.titulo || "";
            document.getElementById("resumen").value = noticia.resumen || "";
            document.getElementById("tags").value = noticia.tags || "";
            document.getElementById("subtitulo_1").value = descripcion.parrafo_1.subtitulo || "";
            document.getElementById("subtitulo_2").value = descripcion.parrafo_2.subtitulo || "";
            document.getElementById("subtitulo_3").value = descripcion.parrafo_3.subtitulo || "";
            document.getElementById("parrafo_1").value = descripcion.parrafo_1.contenido || "";
            document.getElementById("parrafo_2").value = descripcion.parrafo_2.contenido || "";
            document.getElementById("parrafo_3").value = descripcion.parrafo_3.contenido || "";

            const previews = ['portada', 'imagen_1', 'imagen_2', 'imagen_3']

            // Cargar previsualización de las imagenes
            loadPreviewImgs(previews, noticia);

            document.getElementById("new-modal").classList.remove("hidden");

        } catch (e) {
            console.error("Error al obtener la noticia", e)
        }
    }

    async function fetchNews(target, value) {
        try {
            /*const data = await apiFetch("{{ url('/api/getAllNoticias') }}"); */

            const data = await apiFetch(`{{ url('/api/${target}') }}`);
            displayNews(data.Noticias, value)
        } catch (e) {
            console.error("Error al obtener usuarios", e)
        }
    }

    function displayNews(news, value) {
        const newsTotal = document.getElementById("newsTotal");
        newsTotal.textContent = news.length;
        newsContainer.innerHTML = "";

        news.forEach(noticia => {
            const cardContent = `
            <div class="relative">
                <img class="w-full h-48 object-cover"
                src="${noticia.portada || '/default-image.jpg'}"
                alt="${noticia.titulo || 'Noticia'}">
                ${!value ? `<div class="absolute top-1 right-1 bg-green-100/90 px-3 py-1 rounded-full text-sm font-medium text-emerald-700">${noticia.tags}</div>` : ''}
            </div>
            <div class="flex flex-col gap-2 my-2 text-sm text-gray-500">
                <h3 class="text-xl font-semibold text-gray-900 leading-tight">
                    ${noticia.titulo || 'Sin título'}
                </h3>
                ${value ? `<span class="text-emerald-700"><strong>Etiqueta:</strong> ${noticia.tags}</span>` : ''}
                <span><strong>Autor:</strong> ${noticia.username}</span>
                ${!value ? `<span class="overflow-hidden"><strong>Resumen: </strong>
                ${noticia.resumen || 'No hay resumen disponible'}
                </span>` : ''}
                <span><strong>Publicado:</strong> ${noticia.fecha}</span>
            </div>`;

            const card = value ?
                `<x-card-admin id="${noticia.id}" data="new" edit="true">${cardContent}</x-card-admin>` :
                `<x-card-admin class="flex flex-col relative bg-white p-3 rounded-lg shadow-lg overflow-hidden new-card transition-all hover:shadow-xl hover:-translate-y-2" data-id="${noticia.id}">
            <a target='_blank' rel='noopener noreferrer' href='{{ url('/noticias') }}/${noticia.id}'>
                ${cardContent}
            </a>
        </x-card-admin>`;

            newsContainer.innerHTML += card;
        });
        deleteResource('/api/destroyNews', 'new');
    }

    async function updateNew() {
        const newId = document.getElementById("new-id").value;
        const formData = new FormData();

        formData.append("_method", "PUT"); // 🔥 Indicar que es una actualización
        formData.append("titulo", document.getElementById("titulo").value.trim());
        formData.append("resumen", document.getElementById("resumen").value.trim());
        formData.append("parrafo_1", document.getElementById("parrafo_1").value.trim());
        formData.append("parrafo_2", document.getElementById("parrafo_2").value.trim());
        formData.append("parrafo_3", document.getElementById("parrafo_3").value.trim());
        formData.append("subtitulo_1", document.getElementById("subtitulo_1").value.trim());
        formData.append("subtitulo_2", document.getElementById("subtitulo_2").value.trim());
        formData.append("subtitulo_3", document.getElementById("subtitulo_3").value.trim());
        formData.append("tags", document.getElementById("tags").value.trim());

        const portadaInput = document.getElementById("portada").files[0];
        if (portadaInput) formData.append("portada", portadaInput);

        const primeraImgInput = document.getElementById("imagen_1").files[0];
        if (primeraImgInput) formData.append("imagen_1", primeraImgInput);


        const segundaImgInput = document.getElementById("imagen_2").files[0];
        const imagen2Preview = document.getElementById("imagen_2-preview");

        if (segundaImgInput) {
            formData.append("imagen_2", segundaImgInput);
        } else if (imagen2Preview.src === "" || imagen2Preview.src.includes("null")) {
            formData.append("imagen_2_deleted", "1");
            formData.append("imagen_2", "");
        }

        const terceraImgInput = document.getElementById("imagen_3").files[0];
        const imagen3Preview = document.getElementById("imagen_3-preview");

        if (terceraImgInput) {
            formData.append("imagen_3", terceraImgInput);
        } else if (imagen3Preview.src === "" || imagen3Preview.src.includes("null")) {
            formData.append("imagen_3_deleted", "1");
            formData.append("imagen_3", "");
        }



        submitFormData(`/api/actualizarNoticia/${newId}`, 'save-new-btn', '/homeDashboard/listnews', formData);
    }
</script>