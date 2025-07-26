@extends('layouts.apppage')

@section('title', 'Asden Perú - Suscripción')

@section('content')
<!-- Sección de Suscripción -->
<section class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <!-- Encabezado de sección -->
    <div class="text-center mb-16">
        <h2 class="text-4xl font-bold text-dark-blue mb-2">Mantente Informado</h2>
        <div class="w-40 h-1 bg-green-600 mx-auto mb-4"></div>
        <p class="text-gray-600">
            Suscríbete para recibir actualizaciones exclusivas y contenido profesional
        </p>
    </div>

    <!-- Contenido en columnas -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">
        <!-- Tarjeta: "Nuestro Compromiso" -->
        <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col justify-center items-center">
            <img src="/compromiso.webp"
                alt="Manos unidas" class="w-full h-auto object-cover rounded-lg mb-4" />
            <h3 class="text-2xl font-bold text-dark-blue mb-2">Nuestro Compromiso</h3>
            <p class="text-gray-600 text-center">
                Información verificada y contenido de calidad para profesionales
            </p>
        </div>

        <!-- Formulario de suscripción -->
        <div class="flex flex-col justify-center bg-white rounded-lg p-6">
            <form id="subscribeForm" novalidate>
                <x-alert />
                @csrf
                <x-form.form-field label="Correo electrónico" for="email">
                    <input type="email" name="email" id="email" class="form">
                </x-form.form-field>
                <x-ui.button id="submitBtn" class="w-full bg-[#C64508] hover:bg-opacity-90 text-white mt-1" size="md" rounded="full" type="submit">
                    Suscríbete ahora
                </x-ui.button>
            </form>

            <!-- Nota de privacidad -->
            <p class="text-gray-500 text-sm mt-4">
                Respetamos tu privacidad. Nunca compartiremos tu información.
            </p>
        </div>
    </div>
</section>


<script>
    document.getElementById('subscribeForm').addEventListener('submit', async function(e) {
        e.preventDefault()
        const formData = new FormData(this);
        submitFormData('/subscribe', 'submitBtn', '#', formData, 'Suscríbete ahora')
        document.getElementById('email').value = "";
    });
</script>
@endsection