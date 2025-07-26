@extends('layouts.appuserdashboard')

@section('title', 'Asden Perú - Listado de Blogs')

@section('userdashboard')

<!-- {{ auth()->check() ? 'Logueado' : 'No logueado' }} -->

<x-section-container-admin title="Blogs" id="blogs" button="true" />

<x-form.modal-container name="blog" title="Editar Blog" formClass="flex flex-col gap-4">

    <x-form.form-field label="Portada" for="portada" divClass="sm:col-span-2">
        <x-form.img-selector name="portada" />
    </x-form.form-field>

    <x-form.form-field label="Título" for="title">
        <input type="text" name="title" id="title" class="form" placeholder="Ingrese el título">
    </x-form.form-field>

    <x-form.form-field label="Etiquetas" for="tags">
        <div class="flex flex-col gap-2">
            <input
                type="text"
                id="tags-input"
                placeholder="Escribe un tag y presiona 'Enter' o una coma."
                class="form">
            <input type="hidden" name="tags" id="tags" class="w-full">
            <div id="tags-list" class="flex gap-2 flex-wrap"></div>
        </div>

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

    <h3 class="text-lg text-gray-600">> Primera tarjeta</h3>
    <x-form.form-field label="Título" for="title_card_1" divClass="sm:col-span-2">
        <input name="title_card_1" id="title_card_1" type="text" class="form" placeholder="Ingrese un título">
    </x-form.form-field>
    <x-form.form-field label="Contenido" for="text_card_1" divClass="sm:col-span-2">
        <textarea name="text_card_1" id="text_card_1" rows="3" class="form overflow-auto" placeholder="Ingrese el contenido de la tarjeta (mín. 150 - máx. 350 caracteres)"></textarea>
    </x-form.form-field>

    <h3 class="text-lg text-gray-600">> Segunda tarjeta</h3>
    <x-form.form-field label="Título" for="title_card_2" divClass="sm:col-span-2">
        <input name="title_card_2" id="title_card_2" type="text" class="form" placeholder="Ingrese un título">
    </x-form.form-field>
    <x-form.form-field label="Contenido" for="text_card_2" divClass="sm:col-span-2">
        <textarea name="text_card_2" id="text_card_2" rows="3" class="form overflow-auto" placeholder="Ingrese el contenido de la tarjeta (mín. 150 - máx. 350 caracteres)"></textarea>
    </x-form.form-field>

    <x-form.form-field label="Resumen" for="resumen">
        <textarea name="resumen" id="resumen" rows="3" class="form" placeholder="Brinde un pequeño resumen de la noticia"></textarea>
    </x-form.form-field>

</x-form.modal-container>


<script>
    const tagsList = document.getElementById("tags-list");
    const hiddenInput = document.getElementById("tags");

    document.addEventListener("DOMContentLoaded", function() {
        const boton = document.getElementById('AcceptConditions')
        const newsContainer = document.getElementById("blogsContainer");
        const token = localStorage.getItem('token');

        if (!token) {
            console.error("❌ No hay token disponible. Asegúrate de que el usuario esté autenticado.");
        }
        fetchBlogs('getAllBlogsById', true);

        boton.addEventListener('change', () => {

            boton.checked ? fetchBlogs('getAllBlogsById', true) : fetchBlogs('getAllBlogs', false)
        });

        setupEditModalHandlers(blogsContainer, fetchBlog, updateBlog, 'blog');

        async function fetchBlog(blogId) {
            try {
                const data = await apiFetch(`{{ url('/api/getPost') }}/${blogId}`)
                const blog = data.post;
                const tagsArray = blog.tags.split(',').map(tag => tag.trim());
                const content = blog.content ? JSON.parse(blog.content) : {
                    parrafo_1: "",
                    parrafo_2: "",
                }

                const cards = blog.cards ? JSON.parse(blog.cards) : {
                    card_1: "",
                    card_2: ""
                }

                manageTags.showTags("tags-list", 'tags-input', "tags");

                document.getElementById("blog-id").value = blog.id || "";
                document.getElementById("title").value = blog.title || "";
                document.getElementById("resumen").value = blog.resumen || "";
                document.getElementById("tags").value = blog.tags || "";
                document.getElementById("subtitulo_1").value = content.parrafo_1.subtitulo || "";
                document.getElementById("subtitulo_2").value = content.parrafo_2.subtitulo || "";
                document.getElementById("parrafo_1").value = content.parrafo_1.contenido || "";
                document.getElementById("parrafo_2").value = content.parrafo_2.contenido || "";
                document.getElementById("title_card_1").value = cards.card_1.title_card_1 || "";
                document.getElementById("text_card_1").value = cards.card_1.text_card_1 || "";
                document.getElementById("title_card_2").value = cards.card_2.title_card_2 || "";
                document.getElementById("text_card_2").value = cards.card_2.text_card_2 || "";


                const previews = ['portada', 'imagen_1', 'imagen_2']

                // Cargar previsualización de la imagen
                loadPreviewImgs(previews, blog);

                tagsList.innerHTML = "";

                tagsArray.forEach(tag => {
                    if (tag && !tagsList.textContent.includes(tag)) {
                        manageTags.addTag(tag, tagsList, hiddenInput);
                    }
                });

                manageTags.updateHiddenInput(hiddenInput);

                document.getElementById("blog-modal").classList.remove("hidden");
            } catch (e) {
                console.error("Error al obtener el blog", e)
            }
        }

        async function fetchBlogs(target, value) {
            try {
                //const data = await apiFetch("{{ url('/api/getAllBlogs') }}");
                const data = await apiFetch(`{{ url('/api/${target}') }}`);
                displayBlogs(data.Post, value)
            } catch (e) {
                console.error("Error al obtener blogs", e)
            }
        }

        /* Muestra la lista de blogs en la interfaz */
        function displayBlogs(blogs, value) {
            const blogsContainer = document.getElementById("blogsContainer");
            const blogsTotal = document.getElementById("blogsTotal");

            blogsTotal.textContent = blogs.length;
            blogsContainer.innerHTML = "";

            blogs.forEach(blog => {
                const tags = blog.tags.split(",").map(tag => `<span>${tag}</span>`).join(', ');
                const cardContent = `
                <img class="w-full h-48 object-cover" src="${blog.portada}" alt="${blog.title}">
                <p class="text-sm text-gray-500 pt-1"><strong>Etiquetas: </strong>${tags}</p>
                <div class="flex flex-col gap-2 my-2 text-sm text-gray-500">
                    <h3 class="text-xl font-semibold text-gray-900 leading-tight overflow-hidden py-2">
                    ${blog.title}
                    </h3>
                </div>`;

                const card = value ?
                    `<x-card-admin id=${blog.id} data="blog" edit="true">${cardContent}</x-card-admin>` :
                    `<a target='_blank' rel='noopener noreferrer' href='{{ url('/post') }}/${blog.id}'>
                    <x-card-admin id=${blog.id} data="blog">${cardContent}</x-card-admin>
                    </a>`;

                blogsContainer.innerHTML += card;
            });
            deleteResource('/api/eliminarPost', 'blog');
        }

        async function updateBlog() {
            const blogId = document.getElementById("blog-id").value;
            const formData = new FormData();
            formData.append("_method", "PUT");
            formData.append("title", document.getElementById("title").value.trim());
            formData.append("resumen", document.getElementById("resumen").value.trim());
            formData.append("tags", document.getElementById("tags").value.trim());

            formData.append("parrafo_1", document.getElementById("parrafo_1").value.trim());
            formData.append("parrafo_2", document.getElementById("parrafo_2").value.trim());
            formData.append("subtitulo_1", document.getElementById("subtitulo_1").value.trim());
            formData.append("subtitulo_2", document.getElementById("subtitulo_2").value.trim());
            formData.append("title_card_1", document.getElementById("title_card_1").value.trim());
            formData.append("text_card_1", document.getElementById("text_card_1").value.trim());
            formData.append("title_card_2", document.getElementById("title_card_2").value.trim());
            formData.append("text_card_2", document.getElementById("text_card_2").value.trim());


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

            submitFormData(`/api/updatePost/${blogId}`, 'save-blog-btn', '/listpost', formData);
        }
    });
</script>
@endsection