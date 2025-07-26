@extends('layouts.apppage')

@section('title', 'Asden Perú - Iniciar Sesión')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-neutral-50 p-4 sm:p-6 lg:p-8">
    <div class="max-w-6xl w-full bg-white rounded-2xl shadow-xl border border-neutral-100 overflow-hidden">
        <div class="flex flex-col md:flex-row">
            <div class="hidden md:block md:w-2/5 relative bg-gray-50">
                <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>
                <img src="/banners/banner-login.webp" alt="Imagen institucional Asden"
                    class="w-full h-full object-cover opacity-95">
                <div class="absolute bottom-8 left-8 right-8 text-white space-y-2">
                    <div class="w-12 h-0.5 bg-white/30 mb-4 rounded-full"></div>
                    <h3 class="text-xl font-semibold tracking-tight">Compromiso Ambiental</h3>
                    <p class="text-sm font-light opacity-90 text-white">Innovación y sostenibilidad para preservar nuestro legado
                    </p>
                </div>
            </div>

            <!-- Formulario -->
            <div class="md:w-3/5 p-8 md:p-12">
                <div class="max-w-md mx-auto space-y-4">
                    <!-- Encabezado con logo ajustado -->
                    <div class="space-y-4 text-center">
                        <div class="mx-auto w-32 h-32 flex items-center justify-center mb-4">
                            <img src="/Logo.png" alt="logo asden"
                                class="w-full h-full object-contain p-2">
                        </div>
                        <div class="space-y-1.5">
                            <p class="text-sm text-gray-500">Acceso exclusivo para la comunidad Asden</p>
                        </div>
                    </div>

                    @if (session('error'))
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                        {{ session('error') }}
                    </div>
                    @endif

                    @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                    @endif

                    <!-- Campos del formulario -->
                    <form id="loginForm" class="space-y-6" novalidate>
                        @csrf
                        <div class="space-y-2">
                            <x-form.form-field label="Correo electrónico" for="email" divClass="relative">
                                <input name="email" type="email" id="email" placeholder="usuario@asden.org"
                                    class="form">
                                <div class="absolute right-3 top-10 text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                            </x-form.form-field>

                            <div class="mt-1">
                                <x-form.form-field label="Contraseña" for="password" divClass="relative">
                                    <input name="password" type="password" id="password" placeholder="••••••••"
                                        class="form">
                                    <div class="absolute right-3 top-10 text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-lock-password">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" />
                                            <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                                            <path d="M15 16h.01" />
                                            <path d="M12.01 16h.01" />
                                            <path d="M9.02 16h.01" />
                                        </svg>
                                    </div>
                                </x-form.form-field>

                                <a href="{{ route('password.request') }}"
                                    class="text-sm font-medium text-blue-600 hover:text-blue-500 transition-colors">
                                    ¿Olvidó su contraseña?
                                </a>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full py-3 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            Iniciar sesión
                        </button>
                    </form>

                    <script>
                        document.getElementById("loginForm").addEventListener("submit", function(e) {
                            e.preventDefault();

                            const email = document.getElementById("email").value;
                            const password = document.getElementById("password").value;

                            fetch("{{ url('/api/login') }}", {
                                    method: "POST",
                                    headers: {
                                        "Content-Type": "application/json",
                                        "Accept": "application/json"
                                    },
                                    body: JSON.stringify({
                                        email,
                                        password
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    console.log("Respuesta del login:", data);
                                    if (data.token) {
                                        localStorage.setItem("token", data.token);
                                        localStorage.setItem("username", data.user.username);
                                        localStorage.setItem("email", data.user.email);
                                        localStorage.setItem("role", data.user.role);
                                        localStorage.setItem("id", data.user.userId)

                                        window.location.href = getRedirectUrl(data.user.role);
                                    } else {
                                        errorMessages.showErrors(data);
                                    }
                                })
                                .catch(error => console.error("⚠️ Error en el login:", error));
                        });

                        function getRedirectUrl(role) {
                            switch (role) {
                                case 'admin':
                                    return "/homeDashboard";
                                case 'user':
                                    return "/createpost";
                                default:
                                    return "/";
                            }
                        }
                    </script>

                    </form>

                    <!-- Footer Legal -->
                    <div class="pt-6 border-t border-gray-100">
                        <p class="text-xs text-center text-gray-500">
                            © {{ date('Y') }} Asden. Todos los derechos reservados.
                            <a href="#" class="text-blue-600 hover:text-blue-700 transition-colors">Términos</a> y
                            <a href="#" class="text-blue-600 hover:text-blue-700 transition-colors">Privacidad</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection