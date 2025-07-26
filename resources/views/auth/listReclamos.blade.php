@extends('layouts.appdashboard')

@section('title', 'Lista de Reclamaciones')

@section('dashboard')
<x-section-container-admin title="Reclamos" id="reclamos" color="bg-red-500" class="p-6 overflow-x-auto shadow-md rounded-lg">
    <!-- Tabla de Reclamaciones -->
    <table class="min-w-full table-auto border border-blue-200 rounded-lg shadow-md">
        <thead class="bg-blue-100 text-gray-800">
            <tr>
                <th class="px-4 py-2 text-left">Nombre</th>
                <th class="px-4 py-2 text-left">Email</th>
                <th class="px-4 py-2 text-left">Teléfono</th>
                <th class="px-4 py-2 text-left">Fecha</th>
                <th class="px-4 py-2 text-left">Acciones</th>
                <th class="px-4 py-2 text-left">Estado</th>
            </tr>
        </thead>
        <tbody id="reclamosTable" class="text-gray-700">
            <!-- Aquí se insertarán las filas dinámicamente -->
        </tbody>
    </table>
</x-section-container-admin>


<!-- Modal Detalles -->
<div id="modalReclamo" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-xl max-w-lg w-full p-6 relative max-h-[600px]">
        <button onclick="cerrarModal()" class="absolute top-2 right-2 text-gray-600 hover:text-red-500 text-xl">&times;</button>
        <h3 class="text-xl font-bold mb-4 text-red-600">Detalles del Reclamo</h3>
        <div id="contenidoModal" class="text-sm text-gray-700 space-y-2">
            <!-- Se llenará dinámicamente -->
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetchReclamos();
    });

    function fetchReclamos() {
        fetch("{{ url('/api/getAll') }}")
            .then(response => {
                if (!response.ok) throw new Error("Error en la petición");
                return response.json();
            })
            .then(data => {
                const container = document.getElementById("reclamosTable");
                const totalSpan = document.getElementById("reclamosTotal");
                if (!data.Reclamaciones || !Array.isArray(data.Reclamaciones)) {
                    container.innerHTML = `<tr><td colspan="5" class="text-red-500 px-4 py-2">No se encontraron reclamos.</td></tr>`;
                    return;
                }
                container.innerHTML = "";
                totalSpan.textContent = data.Reclamaciones.length;
                data.Reclamaciones.forEach(reclamo => {
                    const row = document.createElement("tr");
                    row.className = "border-t border-blue-200";
                    if (reclamo.estado === "Pendiente") {
                        row.classList.add("bg-red-100");
                    }
                    row.innerHTML = `
                    <td class="px-4 py-2">${reclamo.nombre} ${reclamo.apellido}</td>
                    <td class="px-4 py-2">${reclamo.email}</td>
                    <td class="px-4 py-2">${reclamo.celular}</td>
                    <td class="px-4 py-2">${reclamo.created_at?.substring(0, 10) || 'Sin fecha'}</td>
                    <td class="px-4 py-2">
                        <button onclick='mostrarDetalles(${JSON.stringify(reclamo).replace(/'/g, "\\'")})' class="bg-red-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">Ver más</button>
                    </td>
                    <td class="px-4 py-2">${reclamo.estado}</td>
                `;
                    container.appendChild(row);
                });
            })
            .catch(error => {
                console.error("❌ Error al cargar reclamos:", error);
                document.getElementById("reclamosTable").innerHTML = `<tr><td colspan="5" class="text-red-500 px-4 py-2">Error al cargar reclamos.</td></tr>`;
            });
    }

    function mostrarDetalles(reclamo) {
        const modal = document.getElementById("modalReclamo");
        const contenido = document.getElementById("contenidoModal");
        contenido.innerHTML = `
        <div class="w-full md:w mx-auto px-6 py-6 bg-white rounded-xl shadow-lg space-y-6 max-h-[500px] overflow-y-auto">
            <h3 class="text-2xl font-semibold mb-4">Datos del Reclamante</h3>
            <div class="grid md:grid-cols-2 gap-4 w-full">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" disabled value="${reclamo.nombre || ''}" class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl bg-gray-100" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Apellido</label>
                    <input type="text" disabled value="${reclamo.apellido || ''}" class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl bg-gray-100" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Documento</label>
                    <input type="text" disabled value="${reclamo.documento || ''} ${reclamo.numeroDocumento || ''}" class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl bg-gray-100" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="text" disabled value="${reclamo.email || 'Sin correo'}" class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl bg-gray-100" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Celular</label>
                    <input type="text" disabled value="${reclamo.celular || 'N/A'}" class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl bg-gray-100" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Dirección</label>
                    <input type="text" disabled value="${reclamo.direccion || ''}, ${reclamo.distrito || ''}, ${reclamo.ciudad || ''}" class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl bg-gray-100" />
                </div>
            </div>
            <h3 class="text-2xl font-semibold mt-8 mb-4">Detalle del Reclamo</h3>
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Tipo de Reclamo</label>
                    <input type="text" disabled value="${reclamo.tipoReclamo || 'N/A'}" class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl bg-gray-100" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Fecha del Incidente</label>
                    <input type="text" disabled value="${reclamo.fechaIncidente || 'N/A'}" class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl bg-gray-100" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Fecha Creado</label>
                    <input type="text" disabled value="${reclamo.created_at?.substring(0, 10) || 'Sin fecha'}" class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl bg-gray-100" />
                </div>
            </div>
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700">Detalle del Reclamo</label>
                <textarea disabled rows="4" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-100">${reclamo.reclamoPerson || 'Sin detalle'}</textarea>
            </div>
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700">Estado Actual</label>
                <input type="text" disabled value="${reclamo.estado}" class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl bg-gray-100 text-${reclamo.estado === 'Pendiente' ? 'red' : 'green'}-600 font-bold" />
            </div>
            <div class="mt-6 text-center">
                <button onclick="cambiarEstado(${reclamo.id}, '${reclamo.estado}')" class="bg-purple-600 text-white px-6 py-2 rounded-xl shadow-md hover:bg-purple-800 transition">
                    Cambiar estado
                </button>
            </div>
        </div>
    `;
        modal.classList.remove("hidden");
        modal.classList.add("flex");
    }

    function cerrarModal() {
        const modal = document.getElementById("modalReclamo");
        modal.classList.add("hidden");
        modal.classList.remove("flex");
    }

    function cambiarEstado(id, estadoActual) {
        const confirmacion = confirm(`¿Seguro que deseas cambiar el estado del reclamo actual (${estadoActual})?`);
        if (!confirmacion) return;

        const token = localStorage.getItem('token'); // Ajusta según donde guardes el token

        fetch(`/api/reclamaciones/${id}/cambiar-estado`, {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "Authorization": `Bearer ${token}`, // Agregar el token de autenticación aquí
                },
            })
            .then(response => {
                if (!response.ok) throw new Error("Error al cambiar el estado");
                return response.json();
            })
            .then(data => {
                console.log(data);
                alert(data.message);
                cerrarModal();
                fetchReclamos(); // Volver a cargar la tabla para mostrar el nuevo estado
            })
            .catch(error => {
                console.error("❌ Error al cambiar el estado:", error);
                alert("Ocurrió un error al cambiar el estado del reclamo.");
            });
    }
</script>

@endsection