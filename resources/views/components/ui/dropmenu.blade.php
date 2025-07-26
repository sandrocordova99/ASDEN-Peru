@props([
'title' => 'Menú',
'width' => 'w-48', // ancho del dropdown, por ejemplo: w-48, w-56, etc.
])

<div x-data="{ 
        open: false,
        mouseInButton: false,
        mouseInMenu: false,
        closeTimer: null,
        handleMouseEnter() {
            this.mouseInButton = true;
            if (this.closeTimer) clearTimeout(this.closeTimer);
            this.open = true;
        },
        handleMouseLeave() {
            this.mouseInButton = false;
            this.closeTimer = setTimeout(() => {
                if (!this.mouseInMenu) this.open = false;
            }, 200);
        },
        handleMenuEnter() {
            this.mouseInMenu = true;
            if (this.closeTimer) clearTimeout(this.closeTimer);
        },
        handleMenuLeave() {
            this.mouseInMenu = false;
            if (!this.mouseInButton) {
                this.closeTimer = setTimeout(() => {
                    this.open = false;
                }, 200);
            }
        }
     }"
    class="relative"
    @click.away="open = false"
    @keydown.escape.window="open = false">

    <button @click="open = !open"
        @mouseenter="handleMouseEnter"
        @mouseleave="handleMouseLeave"
        class="text-white/90 hover:text-white px-3 py-2 flex items-center space-x-1 focus:outline-none"
        :class="{ 'text-white': open }">
        <span>{{ $title }}</span>
        <svg class="w-4 h-4 transition-transform duration-200"
            :class="{ 'rotate-180': open }"
            fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div class="absolute top-full left-0 {{ $width }} bg-white shadow-xl rounded-lg py-2 mt-1 origin-top z-50"
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform -translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-2"
        @mouseenter="handleMenuEnter"
        @mouseleave="handleMenuLeave"
        x-cloak
        style="display: none;">
        <div class="relative">
            {{ $slot }}
        </div>
    </div>
</div>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>

{{-- Ejemplo --}}
{{-- <x-ui.dropmenu title="Sobre Nosotros" width="w-56">
    <a href="#" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Nuestra Historia</a>
    <a href="#" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Colaboradores</a>
    <a href="#" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Blog</a>
</x-ui.dropmenu>
--}}