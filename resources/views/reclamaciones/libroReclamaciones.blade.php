@extends('layouts.apppage')

@section('content')

<div class="max-w-4xl mx-auto px-4 py-8 pb-16">
    <div class="my-8">
        <h1 class="text-3xl font-bold text-center mb-4">Libro de Reclamaciones</h1>
        <div class="w-40 h-1 bg-green-600 mx-auto mb-4"></div>
        <p class="text-sm text-gray-600 mb-2">
            Conforme está establecido en el Código de Protección y Defensa del Consumidor contamos con un Libro de Reclamaciones Virtual a tu disposición Asdenperu.com
        </p>
        <p class="text-sm text-gray-600 mb-4">
            Debes de tener en cuenta que tus reclamos conforme a ley deben ser resueltos en un plazo no mayor a 30 días...
        </p>
        <p class="text-sm font-semibold mb-4">
            Razón Social: ASDEN RUC: 20607942707
        </p>
    </div>

    @if (session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif


    <div class="bg-white p-6 rounded-lg shadow">
        <form style="overflow: visible;" novalidate>
            @csrf

            <h2 class="text-2xl font-bold text-center mb-6">Cuestionario de quejas</h2>
            <h3 class="font-semibold mb-2">Datos Personales:</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-form.form-field for="nombre">
                    <input name="nombre" type="text" class="form" placeholder="Nombre">
                </x-form.form-field>

                <x-form.form-field for="apellido">
                    <input name="apellido" type="text" class="form" placeholder="Apellido">
                </x-form.form-field>

                <x-form.form-field for="documento">
                    <select name="documento" class="form">
                        <option value="">Tipo de Documento</option>
                        <option value="DNI">DNI</option>
                        <option value="RUC">RUC</option>
                        <option value="CE">CE</option>
                        <option value="PTP">PTP</option>
                        <option value="OTROS">OTROS...</option>
                    </select>
                </x-form.form-field>
                <x-form.form-field for="numeroDocumento">
                    <input type="text" name="numeroDocumento" class="form" placeholder="Número de Documento">
                </x-form.form-field>
                <x-form.form-field for="email">
                    <input type="email" name="email" class="form" placeholder="Correo Electrónico">
                </x-form.form-field>
                <x-form.form-field for="celular">
                    <input type="tel" name="celular" class="form" placeholder="987654321" maxlength="9">
                </x-form.form-field>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                <x-form.form-field for="direccion">
                    <input type="text" name="direccion" class="form" placeholder="Dirección">
                </x-form.form-field>
                <x-form.form-field for="distrito">
                    <input type="text" name="distrito" class="form" placeholder="Distrito">
                </x-form.form-field>
                <x-form.form-field for="ciudad">
                    <input type="text" name="ciudad" class="form" placeholder="Ciudad">
                </x-form.form-field>
            </div>

            <h3 class="font-semibold mt-6 mb-2">Datos de incidente:</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-form.form-field for="tipoReclamo">
                    <select name="tipoReclamo" class="form">
                        <option value="">Tipo de Reclamo</option>
                        <option value="QUEJA">QUEJA</option>
                        <option value="RECLAMO">RECLAMO</option>
                    </select>
                </x-form.form-field>
                <x-form.form-field for="fechaIncidente">
                    <input type="date" name="fechaIncidente" class="form" id="fechaIncidente" readonly>
                </x-form.form-field>

            </div>
            <x-form.form-field for="reclamoPerson">
                <textarea name="reclamoPerson" class="form" rows="5" placeholder="Indicar incidente"></textarea>
            </x-form.form-field>


            <div class="flex items-start mt-4">
                <input type="checkbox" name="checkReclamoForm" class="mt-1 mr-2">
                <p class="text-sm">Soy consciente que la formulación del reclamo no impide acudir a otras vías de solución de controversias...</p>
            </div>

            <div class="flex items-start mt-2 mb-6">
                <input type="checkbox" name="aceptaPoliticaPrivacidad" class="mt-1 mr-2">
                <p class="text-sm">Acepto las Políticas de Privacidad.</p>
            </div>

            <button id="submitReclamo" type="submit" class="w-full bg-[#6f4be8] hover:bg-[#5c40d1] p-2 rounded text-white">Enviar Reclamo</button>
        </form>
    </div>
</div>
</div>
<script>
    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault(); // previene el envío
        const formData = new FormData(this);
        submitFormData("/api/libroReclamaciones", 'submitReclamo', '/libroReclamaciones', formData, 'Enviar Reclamo')
    });


    document.addEventListener('DOMContentLoaded', function () {
        const hoy = new Date();
        const yyyy = hoy.getFullYear();
        const mm = String(hoy.getMonth() + 1).padStart(2, '0');
        const dd = String(hoy.getDate()).padStart(2, '0');
        const fechaActual = `${yyyy}-${mm}-${dd}`;
        document.getElementById('fechaIncidente').value = fechaActual;
    });


</script>

@endsection