@extends('layouts.appdashboard')

@section('title', 'Registro de Empleo')

@section('dashboard')
<x-register-container-admin id="jobsForm" title="Trabajos" description="Complete el formulario para publicar un nuevo trabajo.">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Campos de texto -->
        <x-form.form-field label="Título" for="titulo">
            <input type="text" name="titulo" id="titulo" maxlength="30" minlength="10" class="form" placeholder="Ingrese un título">
        </x-form.form-field>

        <x-form.form-field label="Resumen" for="resumen">
            <input type="text" name="resumen" id="resumen" maxlength="200" minlength="50" class="form" placeholder="Ingrese un Resumen">
        </x-form.form-field>

        <x-form.form-field label="Tipo de trabajo" for="tipo_trabajo">
            <select name="tipo_trabajo" id="tipo_trabajo" required
                class="form cursor-pointer">
                <option value="Jornada Parcial">Jornada Parcial</option>
                <option value="Jornada Completa">Jornada Completa</option>
                <option value="Prácticas">Prácticas</option>
                <option value="Voluntariado">Voluntariado</option>
            </select>
        </x-form.form-field>

        <x-form.form-field label="Modalidad" for="modalidad">
            <select name="modalidad" id="modalidad" required
                class="form cursor-pointer">
                <option value="Presencial">Presencial</option>
                <option value="Remoto">Remoto</option>
                <option value="Híbrido">Híbrido</option>

            </select>
        </x-form.form-field>

        <x-form.form-field label="Cantidad de vacantes" for="cantidad_puestos">
            <input type="number" step="1" name="cantidad_puestos" id="cantidad_puestos" class="form" placeholder="Mencione a cuantos empleados busca">
        </x-form.form-field>

        <x-form.form-field label="Color de trabajo" for="color_trabajo">
            <div class="flex flex-wrap gap-2 mt-2">
                <!-- Opciones de colores predeterminados -->
                <div class="color-option h-10 w-10 rounded-full bg-red-500 cursor-pointer" data-color="#f44336"></div>
                <div class="color-option h-10 w-10 rounded-full bg-blue-500 cursor-pointer" data-color="#2196f3"></div>
                <div class="color-option h-10 w-10 rounded-full bg-green-500 cursor-pointer" data-color="#4caf50"></div>
                <div class="color-option h-10 w-10 rounded-full bg-yellow-500 cursor-pointer" data-color="#ffeb3b"></div>
                <div class="color-option h-10 w-10 rounded-full bg-purple-500 cursor-pointer" data-color="#9c27b0"></div>
                <div class="color-option h-10 w-10 rounded-full bg-pink-500 cursor-pointer" data-color="#e91e63"></div>
                <div class="color-option h-10 w-10 rounded-full bg-indigo-500 cursor-pointer" data-color="#3f51b5"></div>
                <div class="color-option h-10 w-10 rounded-full bg-teal-500 cursor-pointer" data-color="#009688"></div>
                <!-- Input oculto que almacenará el valor seleccionado -->
                <input type="hidden" name="color" id="color_trabajo" value="">
            </div>
        </x-form.form-field>

        <x-form.form-field label="Descripción" for="descripcion" divClass="sm:col-span-2">
            <textarea name="descripcion" maxlength="255" minlength="50" id="descripcion" rows="4" class="form" placeholder="Brinde mayor información para los postulantes"></textarea>
        </x-form.form-field>

        <x-form.form-field label="Funciones" for="funciones" divClass="sm:col-span-2">
            <textarea name="funciones" maxlength="255" minlength="50" id="funciones" rows="4" class="form" placeholder="Indique cuáles serán los deberes de los postulantes."></textarea>
        </x-form.form-field>

        <x-form.form-field label="Beneficios" for="beneficios" divClass="sm:col-span-2">
            <textarea name="beneficios" maxlength="255" minlength="50" id="beneficios" rows="4" class="form" placeholder="Agregue los beneficios que conlleva el postular a esta propuesta laboral."></textarea>
        </x-form.form-field>

        <x-form.form-field label="Requisitos" for="requisitos" divClass="sm:col-span-2">
            <textarea name="requisitos" maxlength="255" minlength="50" id="requisitos" rows="4" class="form" placeholder="Indique los requisitos indispensables para la propuesta de trabajo."></textarea>
        </x-form.form-field>

        <x-form.form-field label="Imagen de trabajo" for="imagen" divClass="md:col-span-2">
            <div class="w-[full] md:mx-[10%]">
                <x-form.img-selector idInput="imagen" name="imagen" />
            </div>
        </x-form.form-field>

    </div>

    <!-- Botones -->
    <x-form.btns-register-form submitTitle="Registrar Trabajo" nameId="job" />

</x-register-container-admin>

<!-- FOMULARIO -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        colorOptions('color_trabajo', 'color-option')
    });

    document.getElementById("jobsForm").addEventListener("submit", async function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        submitFormData("/api/jobs", 'save-job-btn', '/homeDashboard/listjobs', formData)
    });
</script>

@endsection