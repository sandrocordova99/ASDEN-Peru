@extends('layouts.apppage')

@section('title', 'Asden Perú - Estalecer contraseña')

@section('content')

<div class="min-h-screen bg-gray-50 flex flex-col justify-center sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="flex justify-center">
            <!-- Logo opcional -->
            <svg class="w-16 h-16 text-[#175074]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
        </div>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-[#175074]">
            {{ $isReset ? 'Restablece tu contraseña' : 'Establece tu contraseña'}}
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600">
            Crea una contraseña segura para tu cuenta
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-6 shadow-lg rounded-lg sm:px-10 border-t-4 border-[#175074]">
            <form id="formPassword" method="POST" action="{{ $isReset ? route('password.update') : route('password.setup', $token) }}" class="mb-0 space-y-3">
                @csrf

                @if($isReset)
                <input type="hidden" name="token" value="{{ $token }}">
                @endif
                <!-- Contraseña -->
                <x-form.form-field label="{{$isReset ? 'Nueva contraseña' : 'Contraseña'}}" for="password">
                    <div class="relative">
                        <input id="password" name="password" type="password" class="form" placeholder="Mínimo 8 caracteres">
                        <!-- Ícono de seguridad -->
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                    </div>
                </x-form.form-field>

                <!-- Confirmación -->
                <x-form.form-field label="Confirmar contraseña" for="password_confirmation">
                    <input id="password_confirmation" name="password_confirmation" type="password" class="form" placeholder="Repite tu contraseña">
                </x-form.form-field>

                <!-- Botón -->
                <div>
                    <button
                        id="verifyBtn"
                        type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-lg font-medium text-white bg-[#175074] hover:bg-[#134267] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#175074] transition duration-200">
                        Guardar contraseña
                    </button>
                </div>
            </form>

            <!-- URL y Token -->
            <input type="hidden" id="setupUrl" value="{{ route('password.setup', ['token' => $token]) }}">

            <!-- Texto de ayuda -->
            <div class="mt-6 text-center text-sm text-gray-500">
                <p>
                    ¿Problemas? <a href="#" class="font-medium text-[#175074] hover:text-[#134267]">Contáctanos</a>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('formPassword').addEventListener('submit', async function(e) {
        e.preventDefault()
        const formData = new FormData(this);
        const url = document.getElementById('setupUrl').value;
        submitFormData(url, 'verifyBtn', '/login', formData)
    });
</script>
@endsection