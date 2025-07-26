@extends('layouts.appdashboard')

@section('title', 'Perfil de Administrador')

@section('dashboard')
<div class="container mx-auto p-6 flex justify-center bg-gray-200">
    <div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-4xl">
        <div class="flex flex-col items-center space-y-6">
            <!-- Avatar -->
            <img id="perfilAvatar" src="/images/default-avatar.png" alt="Avatar" class="w-32 h-32 rounded-full border-4 border-blue-500 shadow-md">
            
            <div class="text-center">
                <h1 id="perfilNombreCompleto" class="text-3xl font-semibold text-gray-800"></h1>
                <p id="perfilRol" class="text-lg text-gray-600"></p>
            </div>
        </div>

        <div class="mt-8 space-y-6">
            <!-- Username -->
            <div class="flex items-center space-x-4">
                <div class="flex-1">
                    <label class="text-gray-500 text-lg">Nombre de usuario</label>
                    <input type="text" id="perfilUsername" class="block w-full p-2 mt-1 bg-gray-100 rounded-md border border-gray-300 select-none pointer-events-none focus:outline-none" readonly>
                </div>
            </div>

            <!-- Email -->
            <div class="flex items-center space-x-4">
                <div class="flex-1">
                    <label class="text-gray-500 text-lg">Correo electrónico</label>
                    <input type="email" id="perfilEmail" class="block w-full p-2 mt-1 bg-gray-100 rounded-md border border-gray-300 select-none pointer-events-none focus:outline-none" readonly>
                </div>
            </div>

            <!-- Teléfono -->
            <div class="flex items-center space-x-4">
                <div class="flex-1">
                    <label class="text-gray-500 text-lg">Teléfono</label>
                    <input type="text" id="perfilTelefono" class="block w-full p-2 mt-1 bg-gray-100 rounded-md border border-gray-300 select-none pointer-events-none focus:outline-none" readonly>
                </div>
            </div>

            <!-- Biografía -->
            <div class="flex items-center space-x-4">
                <div class="flex-1">
                    <label class="text-gray-500 text-lg">Biografía</label>
                    <textarea id="perfilBio" class="block w-full p-2 mt-1 bg-gray-100 rounded-md border border-gray-300 h-32 overflow-auto resize-none select-none pointer-events-none focus:outline-none" readonly></textarea>
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-center">
            <button onclick="document.getElementById('modalPerfil').classList.remove('hidden')" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-300">
                Editar Perfil
            </button>
        </div>
    </div>
</div>

<!-- Modal de edición oculto por defecto -->
<div id="modalPerfil" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg w-full max-w-lg max-h-[90vh] overflow-y-auto p-6 shadow-lg relative">
        <button onclick="document.getElementById('modalPerfil').classList.add('hidden')" class="absolute top-2 right-3 text-gray-600 hover:text-red-600 text-xl font-bold">&times;</button>

        <h2 class="text-xl font-bold text-gray-800 mb-4 text-center">Editar Perfil</h2>

        <div class="flex justify-center mb-4">
            <img id="avatarPreview" src="/images/default-avatar.png" alt="Avatar" class="w-28 h-28 rounded-full border-4 border-blue-200 shadow-md object-cover ">
        </div>

        <form id="formActualizarPerfil" method="POST" enctype="multipart/form-data" class="space-y-4">
            <!-- Cambiar foto -->
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-1">Cambiar foto</label>
                <input type="file" name="avatar" id="avatarInput"
                class="w-full px-4 py-2 rounded-md border border-blue-300 cursor-pointer text-gray-700 bg-blue-100 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition duration-300">
            </div>


            <!-- Nombre -->
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-1">Nombre</label>
                <input id="inputNombre" name="name" type="text" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 ease-in-out">
            </div>

            <!-- Apellido -->
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-1">Apellido</label>
                <input id="inputApellido" name="lastname" type="text" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 ease-in-out">
            </div>

            <!-- Username -->
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-1">Nombre de usuario</label>
                <input id="inputUsername" name="username" type="text" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 ease-in-out">
            </div>

            <!-- Biografía -->
            <div>
                <label class="block text-gray-700 text-sm font-medium mb-1">Biografía</label>
                <textarea id="inputBio" name="bio" rows="3" class="w-full p-2 rounded-md border border-gray-300 h-32 overflow-auto resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 ease-in-out"></textarea>
            </div>

            <!-- Guardar -->
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 hover:bg-puple-700 text-white px-4 py-2 rounded-md transition duration-300">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const token = localStorage.getItem('token');
        const apiGetUserUrl = @json(url('/api/getAuthenticatedUser'));


        if (!token) {
            console.error("❌ No hay token disponible.");
            return;
        }

        fetch(apiGetUserUrl, {
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
            console.log("✅ Usuario autenticado:", data); // <-- Agrega esto
            const user = data.user;
            document.getElementById("perfilUsername").value = user.username;
            document.getElementById("perfilEmail").value = user.email;
            document.getElementById("perfilTelefono").value = user.phone || "No registrado";
            document.getElementById("perfilNombreCompleto").textContent = user.name + " " + user.lastname;
            document.getElementById("perfilBio").textContent = user.bio || "No disponible";
            document.getElementById("perfilRol").textContent = user.role || "";
            document.getElementById("perfilAvatar").src = user.avatar ? `/storage/${user.avatar}` : "/images/default-avatar.png";
            document.getElementById("avatarPreview").src = user.avatar ? `/storage/${user.avatar}` : "/images/default-avatar.png";

            // Inputs del modal
            document.getElementById("inputNombre").value = user.name;
            document.getElementById("inputApellido").value = user.lastname;
            document.getElementById("inputUsername").value = user.username;
            document.getElementById("inputBio").value = user.bio || "";
        })
        .catch(error => {
            console.error("❌ Error al recuperar el usuario:", error);
        });

        // Vista previa de la imagen cargada
        document.getElementById('avatarInput').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    document.getElementById('avatarPreview').src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('formActualizarPerfil').addEventListener('submit', function(e) {
    e.preventDefault();

    const token = localStorage.getItem('token');
    const formData = new FormData(this);

    fetch("{{ url('/api/updateProfile') }}", {
        method: 'POST',
        headers: {
            "Authorization": `Bearer ${token}`
        },
        body: formData
    })
    .then(async res => {
        const data = await res.json().catch(() => null);
        if (!res.ok) throw new Error(data?.message || "Error al actualizar");
        alert("✅ Perfil actualizado correctamente");
        location.reload(); // Recargar perfil con los nuevos datos
    })
    .catch(async error => {
    const res = await error.response?.json?.();
    console.error("❌ Error al actualizar perfil:", res || error);
    alert("❌ Ocurrió un error al actualizar el perfil");
});

});


    });
</script>
@endsection
