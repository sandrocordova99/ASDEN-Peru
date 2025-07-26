@props([
    'title',
    'id',
    'color',
    'button' => null,
    'class'
])
<section class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
        <div class="flex justify-between px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-blue-100">
            <div>
                <h3 class="text-2xl font-bold text-gray-800">Gestión de {{ $title }} </h3>
                <div class="w-40 h-1 {{ $color ?? 'bg-green-600' }} mb-4"></div>
                <p class="text-sm text-gray-600 mt-1">Total de {{ strtolower($title) }}: <span id="{{ $id }}Total">0</span></p>
            </div>
            @if ($button)
            <div class="flex flex-col w-1/12  items-center justify-center">
                <p id="button-text" class="text-center font-semibold">Edición</p>
                    <x-ui.toggleButton/>
                </div>
            @endif
        </div>
        <div id="{{ $id }}Container" class="{{ $class ?? 'grid grid-cols-4 max-xl:grid-cols-3 max-lg:grid-cols-2 max-sm:grid-cols-1 gap-6 p-6' }}">
            {{ $slot ?? '' }}
        </div>
    </div>
</section>
<script>
    const buttonText = document.getElementById('button-text')
    document.addEventListener("DOMContentLoaded", function() {
       
        const boton = document.getElementById('AcceptConditions')

        boton.addEventListener('change', () => {
            
            boton.checked ? buttonText.innerHTML='Edición' : buttonText.innerHTML='Vista'                 
        });
    });
    
</script>