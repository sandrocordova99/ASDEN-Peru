<div class="flex flex-col sm:flex-row gap-4">
    <button type="submit"
        id="save-{{$nameId}}-btn"
        class="flex-1 bg-[#134b70] text-white font-semibold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transition-all">
        {{ $submitTitle }}
    </button>
    <button type="reset"
        class="flex-1 border-2 py-3 border-gray-200 text-gray-600 hover:border-[#134b70] hover:text-[#134b70] font-semibold px-6 rounded-lg transition-all">
        Limpiar campos
    </button>
</div>