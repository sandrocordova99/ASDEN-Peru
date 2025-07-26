<div class="flex w-full h-[300px] max-sm:h-[250px] justify-center relative">
    <div class="relative w-full h-full border-4 shadow-lg border-white overflow-hidden bg-gray-200 flex justify-center items-center">
        <img
            id="{{ $name }}-preview"
            src=""
            class="w-full h-full object-cover object-center transition-transform duration-300 hover:scale-105 hidden"
            alt="Preview">

        <div class="absolute flex flex-col items-center justify-center bottom-0 right-1/2 translate-x-1/2 bg-white/60 p-2 w-full">
            <h4>Subir imagen: </h4>
            <input name="{{ $name}}" type="file" accept="image/*" id="{{ $name }}" class="cursor-pointer border-2 rounded-xl bg-purple-300/80 shadow-md border-purple-500 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 w-full" onchange="manageImages.handleFileSelect(event, '{{ $name }}')">
        </div>

        <button
            type="button"
            id="remove-{{ $name }}"
            class="absolute top-2 right-2 bg-red-500 text-white rounded-full w-8 h-8 flex items-center justify-center hidden"
            onclick="manageImages.removeImage('{{ $name }}')">
            ×
        </button>

        <span id="no-image-{{ $name }}" class="absolute text-gray-500 text-lg font-semibold">Sin imagen</span>

    </div>
</div>