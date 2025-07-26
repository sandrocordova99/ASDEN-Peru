@extends('layouts.appdashboard')

@section('title', 'Lista de Usuarios')

@section('dashboard')

<x-section-container-admin title="Usuarios" id="users" />

<!-- Modal de Edición de Usuario -->
<x-form.modal-container name="user" title="Editar Usuario" formClass="grid grid-cols-2 gap-4 max-sm:grid-cols-1">

    <x-form.form-field label="Avatar" for="avatar" divClass="flex flex-col sm:col-span-2">
        <div class="w-[300px] self-center">
            <x-form.img-selector name="avatar" />
        </div>
    </x-form.form-field>

    <x-form.form-field label="Nombre" for="name">
        <input type="text" name="name" id="name" class="form">
    </x-form.form-field>

    <x-form.form-field label="Apellido" for="lastname">
        <input type="text" name="lastname" id="lastname" class="form">
    </x-form.form-field>

    <x-form.form-field label="Username" for="username">
        <input type="text" name="username" id="username" class="form">
    </x-form.form-field>

    <x-form.form-field label="Email" for="email">
        <input type="email" name="email" id="email" class="form" placeholder="correo@outlook.com" readonly>
    </x-form.form-field>

    <x-form.form-field label="Rol" for="role">
        <select name="Rol" id="role" class="form">
            <option value="user">Usuario</option>
            <option value="admin">Administrador</option>
        </select>
    </x-form.form-field>

    <x-form.form-field label="Biografía" for="bio" divClass="sm:col-span-2">
        <textarea name="bio" rows="3" placeholder="Escribe algo sobre ti..." id="bio" class="form"></textarea>
    </x-form.form-field>


</x-form.modal-container>

@endsection


<script>
    document.addEventListener("DOMContentLoaded", function() {

        const token = localStorage.getItem('token');
        const usersContainer = document.getElementById("usersContainer");

        if (!token) {
            console.error("❌ No hay token disponible. Asegúrate de que el usuario esté autenticado.");
            return;
        }
        fetchUsers();
        setupEditModalHandlers(usersContainer, fetchUser, updateUser, 'user');
    });


    async function fetchUsers() {
        try {
            const data = await apiFetch("{{ url('/api/conseguirUser') }}");
            displayUsers(data.users)
        } catch (e) {
            console.error("Error al obtener usuarios", e)
        }
    }

    async function fetchUser(userId) {
        try {
            const data = await apiFetch(`{{ url('/api/getUser') }}/${userId}`);
            const user = data.user;

            document.getElementById("user-id").value = user.id || "";
            document.getElementById("name").value = user.name || "";
            document.getElementById("username").value = user.username || "";
            document.getElementById("lastname").value = user.lastname || "";
            document.getElementById("email").value = user.email || "";
            document.getElementById("bio").value = user.bio || "";
            document.getElementById("role").value = user.role || "user";

            // Cargar previsualización de la imagen
            loadPreviewImgs(['avatar'], user);

            document.getElementById("user-modal").classList.remove("hidden");

        } catch (e) {
            console.error("Error al obtener usuario:", e);
        }
    }

    function displayUsers(users) {
        const usersTotal = document.getElementById("usersTotal");
        usersTotal.textContent = users.length;
        usersContainer.innerHTML = "";

        users.forEach(user => {
            const fecha = user.created_at.split('T')[0] // Formate YYYY-MM-DD
            
            usersContainer.innerHTML += `
            <x-card-admin id=${user.id} data="user" edit="true">
            <img class="w-full h-48 bg-gray-50 object-contain" src="${user.avatar}" alt="${user.name}">
                <div class="flex flex-col justify-around gap-2 my-2 text-sm text-gray-500">
                    <h3 class="text-xl font-semibold text-gray-900">${user.name} ${user.lastname || ''}</h3>
                    <span><strong>Email: </strong>${user.email}</span>
                    <span><strong>Usuario: </strong>${user.username}</span>
                    <span><strong>Rol: </strong>${user.role.toUpperCase() || 'USER'}</span>
                    <span><strong>Biografía: </strong>${user.bio || "Sin biografía"}</span>
                    <span><strong>Fecha de registro: </strong>${fecha}</span>
                </div> 
            </x-card-admin>
            `;
        });

        deleteResource('/api/destroy', 'user');
    }

    async function updateUser() {
        const userId = document.getElementById("user-id").value;
        const formData = new FormData();
        formData.append("_method", "PUT"); // 🔥 Indicar que es una actualización
        formData.append("name", document.getElementById("name").value.trim());
        formData.append("lastname", document.getElementById("lastname").value.trim());
        formData.append("username", document.getElementById("username").value.trim());
        formData.append("email", document.getElementById("email").value.trim());
        formData.append("role", document.getElementById("role").value);
        formData.append("bio", document.getElementById("bio").value.trim());

        const avatarInput = document.getElementById("avatar").files[0];
        if (avatarInput) formData.append("avatar", avatarInput);

        submitFormData(`/api/update/${userId}`, 'save-user-btn', '/homeDashboard/listuser', formData);
    }
</script>