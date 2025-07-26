<header class="fixed top-0 w-full z-50 bg-dark-blue backdrop-blur-lg border-b border-white/10 shadow-xl">
    <nav class="container mx-auto px-4 py-3" x-data="{ mobileMenu: false, avatarMenu: false }">

        <!-- Navegación Desktop -->
        <div class="hidden xl:flex items-center justify-between w-full">

            <a class="flex">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                </svg>
                <span class="text-white  font-bold text-xl tracking-tight">UserPanel</span>
            </a>

            <div class="flex gap-x-4">
            <div class="flex gap-x-4" id="admin-dashboard-btn"></div>
                <a href="{{ route('post') }}"
                    class="{{ request()->routeIs('post') ? 'bg-sky-400/50 rounded-md' : '' }} py-2 px-1 flex items-center space-x-2 text-white/90 hover:text-sky-200 transition-colors group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard-plus">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                        <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                        <path d="M10 14h4" />
                        <path d="M12 12v4" />
                    </svg>
                    <span>Crear Blog</span>
                </a>

                <a href="{{ route('listpost') }}"
                    class="{{ request()->routeIs('listpost') ? 'bg-sky-400/50 rounded-md' : '' }} py-2 px-1 flex items-center space-x-2 text-white/90 hover:text-sky-200 transition-colors group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                        <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                    </svg>
                    <span>Listar Blogs</span>
                </a>
            </div>

            <!-- Avatar Desktop -->
            <div class="hidden xl:block relative">
                <button @click="avatarMenu = !avatarMenu"
                    class="flex items-center space-x-2 focus:outline-none hover:opacity-90 transition-opacity">
                    <div class="text-right">
                        <div id="userName" class="text-sm font-medium text-white">Nombre Usuario</div>
                        <div id="userEmail" class="text-xs text-white">admin@example.com</div>
                    </div>
                    <div class="relative">
                        <img src="https://static.vecteezy.com/system/resources/previews/006/487/917/original/man-avatar-icon-free-vector.jpg"
                            alt="Avatar" class="h-10 w-10 rounded-full ring-2 ring-white">
                        <div
                            class="absolute bottom-0 right-0 w-3 h-3 bg-green-400 rounded-full border-2 border-dark-blue">
                        </div>
                    </div>
                </button>


                <!-- Dropdown -->
                <div x-show="avatarMenu" @click.away="avatarMenu = false" x-cloak
                    class="absolute right-0 w-56 bg-dark-blue rounded-lg shadow-xl overflow-hidden border border-white/10">
                    <!-- <a href="#"
                            class="block px-4 py-3 text-sm text-white hover:bg-white/5 transition-colors border-t border-white/10">
                            <svg class="w-4 h-4 inline-block mr-2 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Configuración
                        </a> -->
                    <!-- Ver perfil -->
                    <a id="viewProfileBtn" href="{{ route('perfil') }}"
                    class="cursor-pointer block px-4 py-3 text-sm text-blue-400 hover:bg-white/5 transition-colors">
                    <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M12 14c4.418 0 8-3.582 8-8S16.418 0 12 0 4 3.582 4 8s3.582 8 8 8zm0 2c-5.523 0-10 4.477-10 10h20c0-5.523-4.477-10-10-10z" />
                    </svg>
                    Ver Perfil
                    </a>
                    <a id="logoutBtn"
                        class="cursor-pointer block px-4 py-3 text-sm text-red-400 hover:bg-white/5 transition-colors">
                        <svg class="w-4 h-4 inline-block mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
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
            <nav class="pt-4 space-y-3">
                <span class="text-white font-bold">UserPanel</span>
                <a href="{{ route('post') }}"
                    class="flex items-center space-x-3 px-4 py-2 text-white hover:bg-white/10 rounded-lg transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard-plus">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                        <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                        <path d="M10 14h4" />
                        <path d="M12 12v4" />
                    </svg>
                    <span>Crear Blogs</span>
                </a>
                <a href="{{ route('listpost') }}"
                    class="flex items-center space-x-3 px-4 py-2 text-white hover:bg-white/10 rounded-lg transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                        <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                    </svg>
                    <span>Listar Blogs</span>
                </a>
                <div id="container-mobile"></div>


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
                <a id="logoutBtn"
                    class="cursor-pointer flex items-center space-x-3 px-4 py-2 text-red-400 hover:bg-white/10 rounded-lg transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span>Cerrar Sesión</span>
                </a>
            </nav>
        </div>
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const token = localStorage.getItem('token');
        const role = localStorage.getItem('role');

        if (!token) {
            window.location.href = "/login";
        } else {
            document.body.style.display = "block";

            if (role === 'admin') {
                const container = document.getElementById('admin-dashboard-btn');
                const mobileContainer = document.getElementById('container-mobile');
                const currentPath = window.location.pathname;

                // Si estás en la ruta de Admin Dashboard, se activa el fondo
                const isActive = currentPath.includes("homeDashboard") ? "bg-sky-400/50 rounded-md" : "";

                mobileContainer.innerHTML = `
                <a href="/homeDashboard"
                    class="flex items-center space-x-3 px-4 py-2 text-white hover:bg-white/10 rounded-lg transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-layout-dashboard">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M4 4h6v8h-6z" />
                        <path d="M4 16h6v4h-6z" />
                        <path d="M14 12h6v8h-6z" />
                        <path d="M14 4h6v4h-6z" />
                    </svg>
                    <span>Admin Dashboard</span>
                </a>`

                container.innerHTML = `
          <a href="/homeDashboard"
            class="${isActive} py-2 px-1 flex items-center space-x-2 text-white/90 hover:text-sky-200 transition-colors group">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="icon icon-tabler icons-tabler-outline icon-tabler-layout-dashboard">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M4 4h6v8h-6z" />
              <path d="M4 16h6v4h-6z" />
              <path d="M14 12h6v8h-6z" />
              <path d="M14 4h6v4h-6z" />
            </svg>
            <span>Admin Dashboard</span>
          </a>
        `;
            }
        }
    });
</script>