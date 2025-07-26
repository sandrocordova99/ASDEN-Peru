<header class="fixed top-0 w-full z-50 bg-dark-blue backdrop-blur-lg border-b border-white/10 shadow-xl">
    <nav class="container mx-auto px-4 py-3" x-data="{ mobileMenu: false, avatarMenu: false }">
        <!-- Navegación Desktop - Todo en una línea -->
        <div class="hidden xl:flex items-center justify-between w-full">
            <!-- Logo/Brand -->
            <a href="{{ route('homeDashboard') }}" class="flex items-center space-x-3">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                </svg>
                <span class="text-white font-bold text-xl tracking-tight">AdminPanel</span>
            </a>

            <!-- Navigation Items -->
            <div class="flex items-center space-x-6">
                <!-- Post Dropdown -->
                <div class="relative group">
                    <x-ui.dropmenu title="Blogs" width="w-56">
                        <a href="{{ route('listpost') }}" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Listar Blogs</a>
                        <a href="{{ route('post') }}" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Agregar Blog</a>
                    </x-ui.dropmenu>
                </div>

                <!-- Usuarios Dropdown -->
                <div class="relative group">
                    <x-ui.dropmenu title="Usuarios" width="w-56">
                        <a href="{{ route('listuser') }}" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Listar Usuarios</a>
                        <a href="{{ route('register') }}" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Agregar Usuario</a>
                    </x-ui.dropmenu>
                </div>

                <!-- Trabajos Dropdown -->
                <div class="relative group">
                    <x-ui.dropmenu title="Trabajos" width="w-56">
                        <a href="{{ route('listjobs') }}" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Listar Trabajos</a>
                        <a href="{{ route('jobs') }}" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Agregar Trabajo</a>
                    </x-ui.dropmenu>
                </div>

                <!-- Noticias Dropdown -->
                <div class="relative group">
                    <x-ui.dropmenu title="Noticias" width="w-56">
                        <a href="{{ route('listnews') }}" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Listar Noticias</a>
                        <a href="{{ route('news') }}" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Agregar Noticia</a>
                    </x-ui.dropmenu>
                </div>

                <!-- Proyectos Dropdown -->
                <div class="relative group">
                    <x-ui.dropmenu title="Proyectos" width="w-56">
                        <a href="{{ route('listprojects') }}" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Listar Proyectos</a>
                        <a href="{{ route('projectsDashboard') }}" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Agregar Proyecto</a>
                    </x-ui.dropmenu>
                </div>
                <a href="{{ route('listPostulate') }}" class="{{ request()->routeIs('post') ? 'bg-sky-400/50 rounded-md' : '' }} py-2 px-1 flex items-center space-x-2 text-white/90 hover:text-sky-200 transition-colors group">Solicitudes</a>

                <a href="{{ route('listReclamos') }}" class="{{ request()->routeIs('post') ? 'bg-sky-400/50 rounded-md' : '' }} py-2 px-1 flex items-center space-x-2 text-white/90 hover:text-sky-200 transition-colors group">Reclamos</a>
            </div>

            <!-- Avatar Desktop -->
            <div class="relative">
                <button @click="avatarMenu = !avatarMenu"
                    class="flex items-center space-x-2 focus:outline-none hover:opacity-90 transition-opacity">
                    <div class="text-right">
                        <div id="userName" class="text-sm font-medium text-white">Nombre Usuario</div>
                        <div id="userEmail" class="text-xs text-white">admin@example.com</div>
                    </div>
                    <div class="relative">
                        <img src="https://static.vecteezy.com/system/resources/previews/006/487/917/original/man-avatar-icon-free-vector.jpg"
                            alt="Avatar" class="h-10 w-10 rounded-full ring-2 ring-white">
                        <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-400 rounded-full border-2 border-dark-blue"></div>
                    </div>
                </button>

                <!-- Dropdown -->
                <div x-show="avatarMenu" @click.away="avatarMenu = false" x-cloak
                    class="absolute right-0 mt-3 w-56 bg-dark-blue rounded-lg shadow-xl overflow-hidden border border-white/10">

                    <!-- Ver perfil -->
                    <a id="viewProfileBtn" href="{{ route('perfilAdmin') }}"
                    class="cursor-pointer block px-4 py-3 text-sm text-blue-400 hover:bg-white/5 transition-colors">
                    <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M12 14c4.418 0 8-3.582 8-8S16.418 0 12 0 4 3.582 4 8s3.582 8 8 8zm0 2c-5.523 0-10 4.477-10 10h20c0-5.523-4.477-10-10-10z" />
                    </svg>
                    Ver Perfil
                    </a>

                    <!-- Cerrar Sesión -->
                    <a id="logoutBtn"
                    class="block px-4 py-3 text-sm text-red-400 hover:bg-white/5 transition-colors">
                        <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Cerrar Sesión
                    </a>
                </div>
            </div>
        </div>

        <!-- Botón Mobile -->
        <button @click="mobileMenu = !mobileMenu"
            class="xl:hidden p-2 rounded-lg hover:bg-white/10 transition-colors">
            <!-- Ícono de menú (hamburguesa) con efecto de escalado al hacer hover -->
            <svg x-show="!mobileMenu"
                class="w-7 h-7 text-white transition-transform duration-300 transform hover:scale-110" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-show="mobileMenu"
                class="w-7 h-7 text-white transition-transform duration-300 transform hover:scale-110" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>


        <!-- Menú Mobile -->
        <div x-show="mobileMenu" x-cloak class="xl:hidden mt-4 pb-4 space-y-4 border-t border-white/10">
            <nav class="pt-4 space-y-3 text-sm">
                <a href="{{ route('homeDashboard') }}" class="flex items-center space-x-3 px-4 py-2 gap-x-3 text-white font-bold hover:bg-white/10 rounded-lg transition-colors">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                    </svg>
                    AdminPanel
                </a>
                <a href="{{ route('post') }}" class="{{ request()->routeIs('post') ? 'bg-sky-400/50 rounded-md' : '' }} py-2 px-1 flex items-center space-x-2 text-white/90 hover:text-sky-200 transition-colors group">UserPanel</a>
                <div x-data="{ open: false }" class="border-b border-white/10 pb-2">
                    <button @click="open = !open" class="w-full text-white text-left py-2 flex justify-between items-center">
                        <span>Usuarios</span>
                        <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-cloak class="pl-4 mt-2 space-y-2">
                        <a href="{{ route('listuser') }}"
                            class="flex items-center space-x-3 px-4 py-2 text-white hover:bg-white/10 rounded-lg transition-colors">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>Listar Usuarios</span>
                        </a>
                        <a href="{{ route('register') }}"
                            class="flex items-center space-x-3 px-4 py-2 text-white hover:bg-white/10 rounded-lg transition-colors">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                            <span>Agregar Usuario</span>
                        </a>
                    </div>
                </div>
                <div x-data="{ open: false }" class="border-b border-white/10 pb-2">
                    <button @click="open = !open" class="w-full text-white text-left py-2 flex justify-between items-center">
                        <span>Trabajos</span>
                        <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-cloak class="pl-4 mt-2 space-y-2">
                        <a href="{{ route('listjobs') }}"
                            class="flex items-center space-x-3 px-4 py-2 text-white hover:bg-white/10 rounded-lg transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                            </svg>
                            <span>Listar Trabajos</span>
                        </a>
                        <a href="{{ route('jobs') }}"
                            class="flex items-center space-x-3 px-4 py-2 text-white hover:bg-white/10 rounded-lg transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard-plus">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                <path d="M10 14h4" />
                                <path d="M12 12v4" />
                            </svg>
                            <span>Agregar Trabajo</span>
                        </a>
                    </div>
                </div>
                <div x-data="{ open: false }" class="border-b border-white/10 pb-2">
                    <button @click="open = !open" class="w-full text-white text-left py-2 flex justify-between items-center">
                        <span>Noticias</span>
                        <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-cloak class="pl-4 mt-2 space-y-2">
                        <a href="{{ route('listnews') }}"
                            class="flex items-center space-x-3 px-4 py-2 text-white hover:bg-white/10 rounded-lg transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-bookmark">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M18 7v14l-6 -4l-6 4v-14a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4z" />
                            </svg>
                            <span>Listar Noticias</span>
                        </a>
                        <a href="{{ route('news') }}"
                            class="flex items-center space-x-3 px-4 py-2 text-white hover:bg-white/10 rounded-lg transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-bookmark-plus">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 17l-6 4v-14a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v5" />
                                <path d="M16 19h6" />
                                <path d="M19 16v6" />
                            </svg>
                            <span>Agregar Noticia</span>
                        </a>
                    </div>
                </div>
                <div x-data="{ open: false }" class="border-b border-white/10 pb-2">
                    <button @click="open = !open" class="w-full text-white text-left py-2 flex justify-between items-center">
                        <span>Proyectos</span>
                        <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" x-cloak class="pl-4 mt-2 space-y-2">
                        <a href="{{ route('listprojects') }}"
                            class="flex items-center space-x-3 px-4 py-2 text-white hover:bg-white/10 rounded-lg transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-cube">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M21 16.008v-8.018a1.98 1.98 0 0 0 -1 -1.717l-7 -4.008a2.016 2.016 0 0 0 -2 0l-7 4.008c-.619 .355 -1 1.01 -1 1.718v8.018c0 .709 .381 1.363 1 1.717l7 4.008a2.016 2.016 0 0 0 2 0l7 -4.008c.619 -.355 1 -1.01 1 -1.718z" />
                                <path d="M12 22v-10" />
                                <path d="M12 12l8.73 -5.04" />
                                <path d="M3.27 6.96l8.73 5.04" />
                            </svg>
                            <span>Listar Proyectos</span>
                        </a>
                        <a href="{{ route('projectsDashboard') }}"
                            class="flex items-center space-x-3 px-4 py-2 text-white hover:bg-white/10 rounded-lg transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-cube-plus">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M21 12.5v-4.509a1.98 1.98 0 0 0 -1 -1.717l-7 -4.008a2.016 2.016 0 0 0 -2 0l-7 4.007c-.619 .355 -1 1.01 -1 1.718v8.018c0 .709 .381 1.363 1 1.717l7 4.008a2.016 2.016 0 0 0 2 0" />
                                <path d="M12 22v-10" />
                                <path d="M12 12l8.73 -5.04" />
                                <path d="M3.27 6.96l8.73 5.04" />
                                <path d="M16 19h6" />
                                <path d="M19 16v6" />
                            </svg>
                            <span>Agregar Proyecto</span>
                        </a>
                    </div>
                </div>
                <a href="{{ route('listReclamos') }}" class="{{ request()->routeIs('post') ? 'bg-sky-400/50 rounded-md' : '' }} py-2 px-1 flex items-center space-x-2 text-white/90 hover:text-sky-200 transition-colors group">Reclamos</a>
                <a href="{{ route('listPostulate') }}" class="{{ request()->routeIs('post') ? 'bg-sky-400/50 rounded-md' : '' }} py-2 px-1 flex items-center space-x-2 text-white/90 hover:text-sky-200 transition-colors group">Solicitudes</a>
                
                <!-- Dropdown -->
                <div x-show="avatarMenu" @click.away="avatarMenu = false" x-cloak
                    class="absolute right-0 mt-3 w-56 bg-dark-blue rounded-lg shadow-xl overflow-hidden border border-white/10">

                    <!-- Ver perfil -->
                    <a id="viewProfileBtn" href="{{ route('perfilAdmin') }}"
                    class="cursor-pointer block px-4 py-3 text-sm text-blue-400 hover:bg-white/5 transition-colors">
                    <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M12 14c4.418 0 8-3.582 8-8S16.418 0 12 0 4 3.582 4 8s3.582 8 8 8zm0 2c-5.523 0-10 4.477-10 10h20c0-5.523-4.477-10-10-10z" />
                    </svg>
                    Ver Perfil
                    </a>

                    <!-- Cerrar Sesión -->
                    <a id="logoutBtn"
                    class="block px-4 py-3 text-sm text-red-400 hover:bg-white/5 transition-colors">
                        <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Cerrar Sesión
                    </a>
                </div>

        </div>


        <!-- <a href="#"
                    class="flex items-center space-x-3 px-4 py-2 text-white hover:bg-white/10 rounded-lg transition-colors border-t border-white/10 mt-3 pt-3">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Configuración</span>
                </a> -->

    </nav>
</header>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const token = localStorage.getItem('token');

        if (!token) {
            console.error("❌ No hay token disponible.");
            return;
        }

        fetch("{{ url('/api/getAuthenticatedUser') }}", {
                method: "GET",
                headers: {
                    "Authorization": `Bearer ${token}`,
                    "Accept": "application/json"
                }
            })
            .then(async response => {
                const data = await response.json().catch(() => null);
                if (!response.ok) throw new Error(data?.message || "Error al obtener el usuario");

                return data;
            })
            .then(data => {
                console.log("✅ Usuario autenticado:", data);

                document.getElementById("userName").textContent = data.user.username;
                document.getElementById("userEmail").textContent = data.user.email;
                //document.getElementById("userAvatar").src = data.user.avatar;
            })
            .catch(error => {
                console.error("❌ Error al recuperar el usuario:", error);
            });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll("#logoutBtn").forEach(logoutBtn => {
            logoutBtn.addEventListener("click", async function(event) {
                event.preventDefault(); // Evita la navegación predeterminada

                try {
                    let response = await fetch("{{ route('api.logout') }}", {
                        method: "POST",
                        headers: {
                            "Accept": "application/json",
                            "Authorization": `Bearer ${localStorage.getItem("token")}`
                        },
                        credentials: "include"
                    });

                    if (response.ok) {
                        localStorage.removeItem("token");
                        localStorage.removeItem("username");
                        localStorage.removeItem("id");
                        localStorage.removeItem("role");
                        localStorage.removeItem("email");
                        alert("Sesión cerrada correctamente.");
                        window.location.href = "/login";
                    } else {
                        let data = await response.json();
                        alert("Error al cerrar sesión: " + (data.message || "Inténtalo de nuevo."));
                    }
                } catch (error) {
                    console.error("Error al cerrar sesión:", error);
                    alert("No se pudo cerrar sesión. Revisa tu conexión.");
                }
            });
        });
    });
</script>