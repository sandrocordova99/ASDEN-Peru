@extends('layouts.apppage')

@section('title', 'Iniciar Sesión')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-neutral-50 p-4 sm:p-6 lg:p-8">
    <div class="max-w-5xl w-full bg-white rounded-2xl shadow-xl border border-neutral-100 overflow-hidden">
        <div class="flex flex-col md:flex-row">

            <div class="hidden md:block md:w-2/5 relative bg-gray-50">
                <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>
                <img src="https://images.pexels.com/photos/1658967/pexels-photo-1658967.jpeg"
                    alt="Imagen institucional Asden" class="w-full h-full object-cover opacity-95" loading="lazy">
                <div class="absolute bottom-8 left-8 right-8 text-white space-y-2">
                    <div class="w-12 h-0.5 bg-white/30 mb-4 rounded-full"></div>
                    <h3 class="text-xl font-semibold tracking-tight">Compromiso Ambiental</h3>
                    <p class="text-sm font-light opacity-90">Innovación y sostenibilidad para preservar nuestro legado
                    </p>
                </div>
            </div>

            <!-- Formulario -->
            <div class="md:w-3/5 p-8 md:p-12">
                <div class="max-w-md mx-auto space-y-8">
                    <!-- Encabezado con logo ajustado -->
                    <div class="space-y-4 text-center">
                        <div class="mx-auto w-32 h-32 flex items-center justify-center mb-4">
                            <img src="{{ asset('Logo.png') }}" alt="logo asden"
                                class="w-full h-full object-contain p-2">
                        </div>
                        <div class="space-y-1.5">
                            <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Asden</h1>
                            <p class="text-sm text-gray-500">Acceso exclusivo para la comunidad Asden</p>
                        </div>
                    </div>

                    <!-- Campos del formulario -->
                    <form class="space-y-6" action="#" method="POST">
                        <div class="space-y-4">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                                <div class="relative">
                                    <input type="email" required placeholder="usuario@asden.org"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500/80 focus:border-blue-500/30 transition-all duration-200 placeholder:text-gray-400">
                                    <div class="absolute right-3 top-3.5 text-gray-400">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <div class="flex justify-between items-center">
                                    <label class="block text-sm font-medium text-gray-700">Contraseña</label>
                                    <a href="#"
                                        class="text-sm font-medium text-blue-600 hover:text-blue-500 transition-colors">
                                        ¿Olvidó contraseña?
                                    </a>
                                </div>
                                <div class="relative">
                                    <input type="password" required placeholder="••••••••"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500/80 focus:border-blue-500/30 transition-all duration-200 placeholder:text-gray-400 pr-12">
                                    <button type="button"
                                        class="absolute right-3 top-3.5 text-gray-400 hover:text-gray-600 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full px-6 py-3.5 bg-dark-blue hover:bg-dark-blue/90 text-white font-medium rounded-lg shadow-sm hover:shadow-md transition-all duration-300 flex items-center justify-center gap-2">
                            <svg class="w-4 h-4 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            Iniciar Sesión
                        </button>
                    </form>

                    <!-- Footer Legal -->
                    <div class="pt-6 border-t border-gray-100">
                        <p class="text-xs text-center text-gray-500">
                            © 2024 Asden. Todos los derechos reservados.
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