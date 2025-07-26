@extends('layouts.apppage')

@section('title', 'Asden Perú - Blogs')
@section('description', 'Enterate de los ultimos foros referentes a nuestra comunidad y comparte tus ideas con nosotros.')

@section('content')
<!-- Banner -->
<section class="relative min-h-[500px] bg-cover bg-center bg-no-repeat flex items-center py-20"
    style="background-image: url('/banners/blog-banner.webp');">
    <!-- Overlay degradado -->
    <div class="absolute inset-0 bg-gradient-to-b from-black/40 to-black/70"></div>

    <!-- Contenedor principal -->
    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">Blogs</h1>
        <div class="w-32 h-1 bg-orange-400 rounded-full mx-auto  mb-6"></div>
        <p class="text-lg md:text-xl text-gray-200 max-w-3xl mx-auto">
            Conéctate y participa activamente con nuestra comunidad para descubrir información valiosa y actualizada
            sobre nuestra causa, compartiendo ideas, experiencias y aprendiendo juntos sobre los temas que nos unen.
        </p>
    </div>

</section>
<!-- Sección de Blogs -->
<section class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">

    <!-- Grid de noticias destacadas -->
    <div id="newsContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Agregar el buscador en la parte superior de la sección de blogs
            const blogSection = document.querySelector('.container.mx-auto.py-16');

            // Crear el formulario de búsqueda
            const searchForm = document.createElement('div');


            searchForm.className = 'mb-10 max-w-2xl mx-auto';
            searchForm.innerHTML = `
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Buscar por Tag</h3>
                    <form id="formBuscarTag" class="flex flex-col sm:flex-row gap-4">
                        <input type="text" id="tagSearch" placeholder="Ingresa un tag (ej: Videojuegos, Tecnología)" 
                           class="flex-1 border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-600">
                        <input type="submit" value="Buscar" id="searchButton" class="bg-purple-700 hover:bg-purple-800 text-white font-bold py-2 px-6 rounded-md transition duration-300">
                    </form>
                    <div class="mt-4 flex flex-wrap gap-2" id="popularTags">
                    <!-- Tags populares se cargarán aquí -->
                    </div>
                </div>
                <div id="searchResults" class="hidden">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-semibold text-gray-700">Resultados para: <span id="searchTermDisplay" class="text-purple-700"></span></h3>
                        <button id="clearSearch" class="text-sm text-gray-500 hover:text-purple-700">Limpiar búsqueda</button>
                    </div>
                </div>
            `;

            // Insertar el formulario de búsqueda antes del contenedor de noticias
            blogSection.insertBefore(searchForm, blogSection.firstChild);

            // Contenedor de noticias
            const newsContainer = document.getElementById("newsContainer");

            // Array para almacenar todos los blogs
            let allBlogs = [];

            // Función para cargar todos los blogs
            function loadAllBlogs() {
                fetch(window.location.origin + "/api/getAllBlogs")
                    .then(response => response.json())
                    .then(data => {
                        allBlogs = data.Post;
                        renderBlogs(allBlogs);
                        loadPopularTags(allBlogs);
                    })
                    .catch(error => {
                        console.error("❌ Error al cargar noticias:", error);
                        newsContainer.innerHTML = '<p class="text-center text-red-500">Error al cargar los blogs. Por favor, intenta nuevamente más tarde.</p>';
                    });
            }

            // Función para renderizar los blogs
            function renderBlogs(blogs) {
                newsContainer.innerHTML = "";

                if (blogs.length === 0) {
                    newsContainer.innerHTML = '<p class="text-center text-gray-500 col-span-3">No se encontraron blogs con el tag seleccionado.</p>';
                    return;
                }

                blogs.forEach(blog => {
                    // Procesar tags de manera segura
                    let tagsHTML = '';
                    let tagsList = [];

                    try {
                        if (blog.tags) {
                            // Intentar parsear como JSON
                            if (typeof blog.tags === 'string' && (blog.tags.startsWith('[') || blog.tags.startsWith('{'))) {
                                try {
                                    tagsList = JSON.parse(blog.tags);
                                    if (!Array.isArray(tagsList)) {
                                        tagsList = [blog.tags];
                                    }
                                } catch (e) {
                                    // Si falla el parsing, tratar como string simple
                                    tagsList = [blog.tags];
                                }
                            } else {
                                // Tratar como string con separación por comas
                                tagsList = blog.tags.split(',').map(t => t.trim());
                            }

                            // Generar HTML para los tags
                            tagsHTML = tagsList.map(tag =>
                                `<span class="tag cursor-pointer text-purple-600" 
                              data-tag="${tag}" onclick="document.getElementById('tagSearch').value='${tag}'; 
                                      document.getElementById('searchButton').click();">
                              #${tag}
                            </span>`
                            ).join(' ');
                        }
                    } catch (e) {
                        console.error("Error al procesar tags:", e);
                        tagsHTML = blog.tags || '';
                    }
                    // Construir la tarjeta del blog
                    newsContainer.innerHTML += `
                    <article class="group bg-white rounded-xl shadow-lg overflow-hidden transition-all hover:shadow-xl hover:-translate-y-2">
                        <div class="relative">
                            <img 
                            class="w-full h-56 object-cover"
                            src="${blog.portada}"
                            alt="${blog.title}">
                        </div>
                        <div class="flex flex-col gap-2 p-4">
                            <p class="text-sm text-gray-500">${tagsHTML}</p>
                            <h3 class="text-xl font-semibold text-gray-900 leading-tight">
                            ${blog.title}
                            </h3>
                            <p class="text-gray-600 line-clamp-3 break-words">${blog.resumen}</p>
                            <button class="inline-flex items-center font-medium text-emerald-600 hover:text-emerald-800 transition-colors group-hover:underline mb-2"
                                onclick="window.location.href='{{ url('/post') }}/${blog.id}'">
                                Leer más
                                <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </article>
                    `
                });

                // Añadir event listeners a los tags después de renderizar
                document.querySelectorAll('.tag').forEach(tagElement => {
                    tagElement.addEventListener('click', function() {
                        const tag = this.getAttribute('data-tag');
                        document.getElementById('tagSearch').value = tag;
                        searchBlogsByTag(tag);
                    });
                });
            }

            // Función para buscar blogs por tag
            function searchBlogsByTag(searchTag) {
                // Mostrar sección de resultados
                document.getElementById('searchResults').classList.remove('hidden');
                document.getElementById('searchTermDisplay').textContent = searchTag;

                // Filtrar los blogs existentes
                const filteredBlogs = allBlogs.filter(blog => {
                    try {
                        if (blog.tags) {
                            // Intentar como JSON
                            if (typeof blog.tags === 'string' && (blog.tags.startsWith('[') || blog.tags.startsWith('{'))) {
                                try {
                                    const parsedTags = JSON.parse(blog.tags);
                                    if (Array.isArray(parsedTags)) {
                                        return parsedTags.some(tag =>
                                            tag.toLowerCase().includes(searchTag.toLowerCase())
                                        );
                                    }
                                } catch (e) {
                                    // Tratar como string normal
                                    return blog.tags.toLowerCase().includes(searchTag.toLowerCase());
                                }
                            } else if (typeof blog.tags === 'string') {
                                // Tratar como string con separación por comas
                                return blog.tags.toLowerCase().includes(searchTag.toLowerCase());
                            }
                        }
                        return false;
                    } catch (e) {
                        console.error("Error al filtrar blogs:", e);
                        return false;
                    }
                });

                renderBlogs(filteredBlogs);
            }

            // Función para extraer y mostrar tags populares
            function loadPopularTags(blogs) {
                const tagsContainer = document.getElementById('popularTags');
                const tagCounts = {};

                // Contar ocurrencias de cada tag
                blogs.forEach(blog => {
                    try {
                        if (blog.tags) {
                            console.log(blog.tags);
                            const tagsList = blog.tags.split(',').map(t => t.trim());
                            // Contar cada tag
                            tagsList.forEach(tag => {
                                if (tag && tag.trim()) {
                                    tagCounts[tag.trim()] = (tagCounts[tag.trim()] || 0) + 1;
                                }
                            });
                        }
                    } catch (e) {
                        console.error("Error al procesar tags para popularidad:", e);
                    }
                });

                // Convertir a array y ordenar por popularidad
                const sortedTags = Object.keys(tagCounts)
                    .map(tag => ({
                        tag,
                        count: tagCounts[tag]
                    }))
                    .sort((a, b) => b.count - a.count)
                    .slice(0, 5); // Mostrar solo los 8 más populares

                // Generar elementos HTML
                tagsContainer.innerHTML = '<p class="text-sm text-gray-500 mr-2">Tags populares:</p>';

                sortedTags.forEach(({
                    tag
                }) => {
                    const tagElement = document.createElement('span');
                    tagElement.className = 'tag-pill bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm cursor-pointer hover:bg-purple-100 hover:text-purple-700';
                    tagElement.textContent = tag;
                    tagElement.setAttribute('data-tag', tag);

                    tagElement.addEventListener('click', function() {
                        document.getElementById('tagSearch').value = tag;
                        searchBlogsByTag(tag);
                    });

                    tagsContainer.appendChild(tagElement);
                });
            }



            function handleSearch() {
                const tagSearch = document.getElementById('tagSearch').value.trim();
                if (tagSearch) {
                    document.getElementById('tagSearch').value = '';
                    searchBlogsByTag(tagSearch);
                } else if (tagSearch === "") {
                    document.getElementById('searchResults').classList.add('hidden');
                    renderBlogs(allBlogs);
                }
            }

            document.getElementById('formBuscarTag').addEventListener('submit', function(e) {
                e.preventDefault();
                handleSearch();
            });

            // Event listener para limpiar búsqueda
            document.getElementById('clearSearch').addEventListener('click', function() {
                document.getElementById('tagSearch').value = '';
                handleSearch();
            });

            // Cargar todos los blogs inicialmente
            loadAllBlogs();
        });
    </script>

    @endsection