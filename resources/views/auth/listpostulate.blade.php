@extends('layouts.appdashboard')

@section('title', 'Lista de Postulaciones')

@section('dashboard')

<x-section-container-admin title="Solicitudes" id="solicitud" class="grid-cols-1 p-6 gap-6" />

<!-- CARTILLA DE MODAL PARA VER CV -->
<div id="cvModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-gray-200 w-11/12 md:w-3/4 h-5/6 rounded-xl shadow-lg overflow-hidden flex flex-col">
        <div class="flex justify-between items-center p-4 border-b">
            <h2 class="text-xl font-semibold">Curriculum de Postulante</h2>
            <button onclick="closeModal('cvModal')" class="text-gray-600 hover:text-red-600 text-2xl font-bold">&times;</button>
        </div>
        <div class="h-[90%]">
            <iframe id="cvIframe" class="w-full h-full" style="border: none;"></iframe>
        </div>

        <!-- Footer para aceptar o rechazar la postulación -->
        <div class="bg-gray-200 p-4 flex justify-between items-center">
            
            <div class="flex justify-center gap-3 flex-1">
                <button id="aceptarButton" class="bg-green-400 font-semibold p-2 rounded-md">Aceptar</button>
                <a class="text-green-600 p-2 rounded-full" id="whatsappLink" target="_blank" rel="noopener noreferrer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-brand-whatsapp">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                        <path d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
                    </svg>
                </a>
                <button id="rechazarButton" class="bg-red-400 font-semibold p-2 rounded-md">Rechazar</button>
            </div>

            <button class="ml-4 text-red-600 hover:text-red-800 delete-postulate" data-id="" aria-label="Elimar solicitud">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-trash">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M4 7h16" />
                    <path d="M10 11v6" />
                    <path d="M14 11v6" />
                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                    <path d="M9 7V4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                </svg>
            </button>
        </div>

    </div>
</div>


<!-- Scripts para componentes -->
<script>
    //Funcion para refrescar solicitudes
    async function refreshSolicitudes() {
        solicitudContainer.innerHTML = ""; // Limpiar contenido anterior
        arraySolicitudes = await fetchSolicitudes(); // Obtener nuevas solicitudes
        fetchJobs(); // Renderizar
    }

    function openModal(cvUrl, cellphone, solicitudId) {
        // Ruta para el hostinger
        // document.getElementById('cvIframe').src = cvUrl;
        document.getElementById('cvIframe').src = `/storage/${cvUrl}`;
        document.getElementById('cvModal').classList.remove('hidden');
        document.getElementById('whatsappLink').href = `https://api.whatsapp.com/send?phone=51${cellphone}`;
        document.querySelector('.delete-postulate').setAttribute('data-id', solicitudId);
        document.getElementById('rechazarButton').onclick = async function() {
            await window.apiSolicitudes.rejectStatusSolicitud(solicitudId);
            closeModal('cvModal');
            await refreshSolicitudes();
        }
        document.getElementById('aceptarButton').onclick = async function() {
            await window.apiSolicitudes.acceptStatusSolicitud(solicitudId)
            closeModal('cvModal')
            await refreshSolicitudes()
        }
        deleteResource('/api/deleteSolicitud','postulate')
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }

    function toggleAccordion(index) {
        const content = document.getElementById(`content-${index}`);
        const icon = document.getElementById(`icon-${index}`);

        const downSVG = `
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
        <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
      </svg>
    `;

        const upSVG = `
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
        <path fill-rule="evenodd" d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
      </svg>
    `;

        // Cambiando el maximo del acordeon al clickear
        if (content.style.maxHeight && content.style.maxHeight !== '0px') {
            content.style.maxHeight = '0';
            icon.innerHTML = upSVG;
        } else {
            content.style.maxHeight = content.scrollHeight + 'px';
            icon.innerHTML = downSVG;
        }
    }
</script>

<script>
    // Variables globales
    const solicitudContainer = document.getElementById("solicitudContainer");
    let arraySolicitudes = [];

    document.addEventListener("DOMContentLoaded", async function() {
        const token = localStorage.getItem('token');
        if (!token) {
            console.error("❌ No hay token disponible. Asegúrate de que el usuario esté autenticado.");
            return;
        }
        arraySolicitudes = await fetchSolicitudes();
        fetchJobs();

    });

    // Funcion asincrona para poder obtener las solicitudes y despues filtrarlas
    async function fetchSolicitudes() {
        try {
            const response = await fetch("{{ url('/api/conseguirSolicitud') }}", {
                method: "GET",
                headers: {
                    "Authorization": `Bearer ${localStorage.getItem('token')}`,
                    "Accept": "application/json"
                }
            });

            const data = await response.json();
            return data.Solicitudes;
        } catch (error) {
            console.error("❌ Error al obtener Solicitudes:", error);
            return [];
        }
    }

    function fetchJobs() {
        fetch("{{ url('/api/getAllWorks') }}", {
                method: "GET",
                headers: {
                    "Authorization": `Bearer ${localStorage.getItem('token')}`,
                    "Accept": "application/json"
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.trabajos) {
                    displayJobs(data.trabajos);
                } else {
                    solicitudContainer.innerHTML = `<div class="text-red-500 px-4 py-2">No se encontraron trabajos.</div>`;
                }
            })
            .catch(error => console.error("❌ Error al obtener Trabajos:", error));
    }

    function displayJobs(trabajos) {

        trabajos.forEach((trabajo, index) => {

            const uniqueSolicitudes = arraySolicitudes.filter(
                solicitud => solicitud.trabajo_id === trabajo.id
            );

            const solicitudTotal = document.getElementById("solicitudTotal");
            solicitudTotal.textContent = arraySolicitudes.length;
            // console.log(arraySolicitudes);


            const solicitudesHTML = uniqueSolicitudes.length > 0 ?
                uniqueSolicitudes.map(solicitud => {
                    console.log(solicitud)
                    const colorStatus = solicitud.estado === 'Aceptado' ?
                        'text-green-500' :
                        solicitud.estado === 'Rechazado' ?
                        'text-red-500' :
                        'text-yellow-500';

                    return `
                <div class="flex justify-between p-3">
                    <p class="font-semibold">${solicitud.nombre} ${solicitud.apellido} <span class='${colorStatus}'>${solicitud.estado}</span></p>
                    <button class="text-blue-500 font-semibold underline" onclick="openModal('${solicitud.cv}', '${solicitud.telefono}', '${solicitud.id}')">Revisar</button>
                </div>
                `
                }).join("") :
                '<p class="text-gray-400 italic p-3">No hay postulaciones para este trabajo.</p>';

            solicitudContainer.innerHTML += `
            <div class="border-b border-slate-200">
                <button 
                    onclick="toggleAccordion(${index})" 
                    class="w-full flex justify-between items-center py-5 text-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:rounded-md">

                    <span class="flex flex-col text-left">
                        <strong class="text-blue-900 text-lg">${trabajo.titulo}</strong>
                        <span class="text-sm text-gray-600">
                            ${trabajo.cantidad_puestos} vacantes — 
                            <strong class="text-green-700">
                            ${uniqueSolicitudes.length > 0 ? `${uniqueSolicitudes.length} postulante(s)` : 'Sin postulantes'}
                            </strong>
                        </span>
                    </span> 
                    <span id="icon-${index}" class="text-slate-800 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd" d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
                <div id="content-${index}" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                    ${solicitudesHTML}
                </div>
            </div>`;
        });
    }
</script>

@endsection