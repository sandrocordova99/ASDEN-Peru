@extends('layouts.appdashboard')

@section('title', 'Registro de Usuario')

@section('dashboard')
<x-register-container-admin id="registerForm" title="Usuarios" description="Complete el formulario para agregar un nuevo usuario.">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Avatar-->
        <div class="md:col-span-2">
            <x-form.form-field label="Imagen de Perfil" for="avatar" divClass="flex flex-col">
                <div class="w-[300px] self-center">
                    <x-form.img-selector idInput="avatar" name="avatar" />
                </div>
            </x-form.form-field>

            <div class="mt-3">
                <input type="text" name="site" id="site"
                    class="form"
                    placeholder="o ingresa la URL de la imagen">
                <div id="site-error" class="error-message text-red-500 text-sm mt-1"></div>
            </div>

        </div>

        <!-- Campos de texto -->
        <x-form.form-field label="Nombre" for="name">
            <input type="text" name="name" id="name" class="form" placeholder="Ingrese su nombre">
        </x-form.form-field>
        <x-form.form-field label="Apellido" for="lastname">
            <input type="text" name="lastname" id="lastname" class="form" placeholder="Ingrese su apellido">
        </x-form.form-field>

        <x-form.form-field label="Nombre de usuario" for="username">
            <input type="text" name="username" id="username" class="form" placeholder="Ej: juan123">
        </x-form.form-field>

        <x-form.form-field label="Correo electrónico" for="email">
            <input type="email" name="email" id="email" class="form" placeholder="correo@outlook.com">
        </x-form.form-field>

        <!-- Campos restantes -->
        <x-form.form-field label="Biografía (Opcional)" for="bio" divClass="md:col-span-2">
            <textarea name="bio" id="bio" rows="3" class="form" placeholder="Escribe algo sobre ti..."></textarea>
        </x-form.form-field>

        <x-form.form-field label="Rol" for="role">
            <select name="role" id="role"
                class="form cursor-pointer">
                <option value="user" {{ old('role', 'user') === 'user' ? 'selected' : '' }}>Usuario</option>
                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrador</option>
            </select>
        </x-form.form-field>
    </div>

    <!-- Botones -->
    <x-form.btns-register-form submitTitle="Registrar Usuario" nameId="user" />

</x-register-container-admin>


<!-- FORMULARIO -->
<script>
    document.getElementById("registerForm").addEventListener("submit", async function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        submitFormData("/api/register", 'save-user-btn', '/homeDashboard/listuser', formData);
    });
</script>

<!-- Cargar fotos -->
<script>
    // Opcional: Cargar imagen desde URL
    document.getElementById('site').addEventListener('input', function(e) {
        const url = e.target.value;
        const preview = document.getElementById('avatar-preview');
        if (url.match(/\.(jpeg|jpg|gif|png)$/)) {
            preview.src = url;
        } else {
            preview.src = 'https://green.excertia.com/wp-content/uploads/2020/04/perfil-empty.png';
        }
    });
</script>
@endsection