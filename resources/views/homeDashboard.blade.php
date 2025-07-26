@extends('layouts.appdashboard')

@section('title', 'Asden - Dashboard')

@section('dashboard')

<section class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Dashboard</h1>
            <div class="w-20 h-1.5 bg-gradient-to-r from-green-400 to-green-600 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Total de Usuarios -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div class="p-3 bg-blue-50 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Total</span>
                    </div>
                    <div class="flex flex-col">
                        <h2 class="text-2xl font-bold text-gray-700 mb-1">Total de Usuarios</h2>
                        <div class="flex items-center justify-between">
                            <p class="text-4xl font-bold text-blue-600" id="total-users">0</p>
                            <span class="text-green-500 text-sm font-semibold flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12 7a1 1 0 11-2 0 1 1 0 012 0zm-8.06 6.44l6.5-6.5a1 1 0 011.41 0l6.5 6.5a1 1 0 01-1.41 1.41L11 9.41V17a1 1 0 11-2 0V9.41l-5.94 5.94a1 1 0 01-1.41-1.41z"
                                        clip-rule="evenodd" />
                                </svg>
                                12%
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Administradores -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div class="p-3 bg-purple-50 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Admin</span>
                    </div>
                    <div class="flex flex-col">
                        <h2 class="text-2xl font-bold text-gray-700 mb-1">Administradores</h2>
                        <div class="flex items-center justify-between">
                            <span class="text-4xl font-bold text-purple-600" id="total-Admins"> </span>
                            <span class="text-green-500 text-sm font-semibold flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12 7a1 1 0 11-2 0 1 1 0 012 0zm-8.06 6.44l6.5-6.5a1 1 0 011.41 0l6.5 6.5a1 1 0 01-1.41 1.41L11 9.41V17a1 1 0 11-2 0V9.41l-5.94 5.94a1 1 0 01-1.41-1.41z"
                                        clip-rule="evenodd" />
                                </svg>
                                8%
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Usuarios -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div class="p-3 bg-green-50 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Usuarios</span>
                    </div>
                    <div class="flex flex-col">
                        <h2 class="text-2xl font-bold text-gray-700 mb-1">Usuarios Regulares</h2>
                        <div class="flex items-center justify-between">
                            <span class="text-4xl font-bold text-green-600" id="total-UsersRole"> </span>
                            <span class="text-green-500 text-sm font-semibold flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12 7a1 1 0 11-2 0 1 1 0 012 0zm-8.06 6.44l6.5-6.5a1 1 0 011.41 0l6.5 6.5a1 1 0 01-1.41 1.41L11 9.41V17a1 1 0 11-2 0V9.41l-5.94 5.94a1 1 0 01-1.41-1.41z"
                                        clip-rule="evenodd" />
                                </svg>
                                15%
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div class="p-3 bg-violet-50 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <rect x="3" y="6" width="18" height="15" rx="2" stroke-width="2" stroke-linejoin="round" />
                                <path d="M4 7l8 6 8-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </div>
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wide">total</span>
                    </div>
                    <div class="flex flex-col">
                        <h2 class="text-2xl font-bold text-gray-700 mb-1">Historial Suscriptores</h2>
                        <div class="flex items-center justify-between">
                            <span class="text-4xl font-bold text-violet-600" id="totalSubs">0</span>
                            <span class="text-green-500 text-sm font-semibold flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12 7a1 1 0 11-2 0 1 1 0 012 0zm-8.06 6.44l6.5-6.5a1 1 0 011.41 0l6.5 6.5a1 1 0 01-1.41 1.41L11 9.41V17a1 1 0 11-2 0V9.41l-5.94 5.94a1 1 0 01-1.41-1.41z"
                                        clip-rule="evenodd" />
                                </svg>
                                15%
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div class="p-3 bg-green-50 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <circle cx="12" cy="12" r="9" stroke-width="2" />
                                <path d="M8 12l3 3 5-5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </div>
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Activos</span>
                    </div>
                    <div class="flex flex-col">
                        <h2 class="text-2xl font-bold text-gray-700 mb-1">Suscriptores Activos</h2>
                        <div class="flex items-center justify-between">
                            <span class="text-4xl font-bold text-green-600" id="totalSubsActives">0</span>
                            <span class="text-green-500 text-sm font-semibold flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12 7a1 1 0 11-2 0 1 1 0 012 0zm-8.06 6.44l6.5-6.5a1 1 0 011.41 0l6.5 6.5a1 1 0 01-1.41 1.41L11 9.41V17a1 1 0 11-2 0V9.41l-5.94 5.94a1 1 0 01-1.41-1.41z"
                                        clip-rule="evenodd" />
                                </svg>
                                15%
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div class="p-3 bg-red-50 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <circle cx="12" cy="12" r="9" stroke-width="2" />
                                <path d="M9 9l6 6M15 9l-6 6" stroke-width="2" stroke-linecap="round" />
                            </svg>

                        </div>
                        <span class="text-xs font-semibold text-gray-400 uppercase tracking-wide">Inactivos</span>
                    </div>
                    <div class="flex flex-col">
                        <h2 class="text-2xl font-bold text-gray-700 mb-1">Suscriptores Inactivos</h2>
                        <div class="flex items-center justify-between">
                            <span class="text-4xl font-bold text-red-600" id="totalSubsInactives">0</span>
                            <span class="text-green-500 text-sm font-semibold flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M12 7a1 1 0 11-2 0 1 1 0 012 0zm-8.06 6.44l6.5-6.5a1 1 0 011.41 0l6.5 6.5a1 1 0 01-1.41 1.41L11 9.41V17a1 1 0 11-2 0V9.41l-5.94 5.94a1 1 0 01-1.41-1.41z"
                                        clip-rule="evenodd" />
                                </svg>
                                15%
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    async function setupSubscribers() {

        const data = await apiFetch('/api/getAllSubs');
        if (data.status === 200) {
            document.getElementById('totalSubsActives').textContent = data.activeSubs;
            document.getElementById('totalSubsInactives').textContent = data.inactiveSubs;
            document.getElementById('totalSubs').textContent = data.totalSubs;
        } else {
            console.error("Error al obtener suscriptores:", data.message);
        }

    };

    async function setupUsers() {
        const data = await apiFetch('/api/conseguirUser');
        if (data.status === 200) {
            document.getElementById("total-users").innerText = data.total;
            document.getElementById("total-Admins").innerText = data.totalAdmins;
            document.getElementById("total-UsersRole").innerText = data.totalUsersRole;
        } else {
            console.error("Error al obtener usuarios:", data.message);
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        console.log("Ejecutando setupEventListeners...");
        setupUsers();
        setupSubscribers()
    });
</script>

@endsection