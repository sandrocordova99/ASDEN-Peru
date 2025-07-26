<div id="{{ $id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full overflow-y-auto">

    <!-- Fondo Opaco -->
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>

    <!-- Contenido del Modal -->
    <div class="relative p-4 w-full max-w-2xl max-h-full animate-scale-in">
        <!-- Contenido del Modal -->
        <div class="relative bg-white rounded-lg shadow-sm flex flex-col md:flex-row">

            <!-- Parte Izquierda (Imagen) -->
            <div class="hidden md:flex w-full md:w-2/5 h-[450px] bg-gray-100 rounded-l-lg justify-center items-center overflow-hidden">
                <img src="/mockupImage.webp" alt="Imagen de ejemplo" class="w-full h-full object-cover">
            </div>
            <!-- Parte Derecha (Slogan y Formulario) -->
            <div class="flex flex-col justify-between w-full md:w-3/5 p-6 bg-gradient-to-b from-blue-400 to-green-500 rounded-r-lg">
                <!-- Cabecera del Modal -->
                <div>
                    <div class="flex items-center justify-between pb-4 border-b border-gray-200">
                        <h2 class="text-3xl font-bold text-white uppercase text-center">Únete a Nosotros</h2>
                        <button type="button" onclick="document.getElementById('{{ $id }}').classList.add('hidden')"
                            class="text-white bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Cerrar modal</span>
                        </button>
                    </div>
                    <p class="text-white mt-4">Recibe notificaciones sobre ofertas de empleo, noticias destacadas, blogs y nuestros últimos proyectos.</p>
                </div>

                <!-- Cuerpo del Modal -->
                <form id="suscriptionForm" class="my-auto" novalidate>

                    <x-alert />
                    @csrf
                    <x-form.form-field label="Correo electrónico" for="email">
                        <input type="email" name="email" id="email" class="form">
                    </x-form.form-field>

                    <x-ui.button class="w-full text-xl mt-4 py-2 px-4 bg-blue-700 text-white rounded-lg hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300" size="md" rounded="full" type="submit" id="submitBtn">
                        Suscríbete ahora
                    </x-ui.button>

                </form>
            </div>
        </div>
    </div>
</div>
<style>
    @keyframes scale-in {
        0% {
            opacity: 0;
            transform: scale(0.85);
        }

        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    .animate-scale-in {
        animation: scale-in 0.3s ease-out forwards;
    }
</style>
<script>
    document.getElementById('suscriptionForm').addEventListener('submit', async function(e) {
        e.preventDefault()
        const formData = new FormData(this);
        submitFormData('/subscribe', 'submitBtn', '#', formData, 'Suscríbete ahora')
        document.getElementById('email').value = "";
    });
</script>