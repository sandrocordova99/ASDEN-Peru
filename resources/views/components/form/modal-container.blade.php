<div id="{{ $name }}-modal" class="hidden fixed inset-0 z-50 flex justify-center items-center w-full h-screen bg-black bg-opacity-50">
    <div class="p-4 w-full max-w-2xl bg-white rounded-lg shadow-lg">
        <!-- Encabezado -->
        <div class="flex items-center justify-between pb-2 border-b mb-2">
            <h2 class="text-xl font-semibold text-gray-900">{{ $title }}</h2>
            <button id="close-modal" class="text-gray-400 hover:text-gray-900">
                ✖
            </button>
        </div>

        <div class="max-h-[620px] p-2 overflow-auto">
            <form id="{{ $name }}-form">
                <input type="hidden" id="{{ $name }}-id">
                <div class="{{ $formClass ?? '' }}">
                    {{ $slot }}
                </div>
            </form>
        </div>


        <div class="flex justify-end gap-4 mt-4">
            <button type="submit" id="save-{{ $name }}-btn" class="hover:bg-blue-700 bg-blue-500 text-white p-2 rounded">Guardar Cambios</button>
            <button type="button" id="close-modal-btn"
                class="px-4 py-2 bg-gray-100 text-gray-500 rounded">Cerrar</button>
        </div>
    </div>
</div>