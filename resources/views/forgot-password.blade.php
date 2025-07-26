@extends('layouts.apppage')

@section('title', 'Asden Perú - Enviar enlace')

@section('content')

<div class="max-w-md mx-auto my-40 p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-[#0E354F] mb-6">Recuperar contraseña</h2>

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
            <input
                type="email"
                name="email"
                id="email"
                placeholder="tucorreo@ejemplo.com"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0E354F] focus:border-transparent transition">
        </div>

        <button
            type="submit"
            class="w-full bg-[#0E354F] text-white py-2 px-4 rounded-md hover:bg-[#0a2a3f] transition duration-300 focus:outline-none focus:ring-2 focus:ring-[#0E354F] focus:ring-opacity-50">
            Enviar enlace de recuperación
        </button>
    </form>

    @if (session('status'))
    <div class="mt-4 p-3 bg-green-100 text-green-700 rounded-md text-sm">
        {{ session('status') }}
    </div>
    @endif

    <div class="mt-4 text-center">
        <a
            href="{{ route('login') }}"
            class="text-sm text-[#0E354F] hover:underline">
            Volver al inicio de sesión
        </a>
    </div>
</div>


@endsection