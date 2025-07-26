<!-- Navbar Global -->
<header class="fixed w-full top-0 z-50 bg-dark-blue backdrop-blur-md border-b border-white/10">
  <nav class="container mx-auto px-4 py-3" x-data="{ isOpen: false }">
    <div class="flex items-center justify-between">
      <!-- Logo -->
      <a href="{{ route('homepage') }}" class="flex items-center space-x-2">
        <img src="/Logo-dark.svg" class="h-12 w-auto rounded-lg transition-all hover:scale-110" alt="Logo Asden">
      </a>

      <!-- Desktop Menu -->
      <div class="hidden xl:flex items-center space-x-6">
        <!-- Menú: Sobre Nosotros -->
        <x-ui.dropmenu title="Sobre Nosotros" width="w-56">
          <a href="{{ route('homepage') }}#history" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Nuestra Historia</a>
          <a href="{{ route('homepage') }}#mission" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Misión y Visión</a>
          <a href="{{ route('homepage') }}#values" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Valores</a>
          <a href="{{ route('collaborators') }}" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Colaboradores</a>
          <a href="{{route('blogs')}}" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Blog</a>
        </x-ui.dropmenu>

        <!-- Enlace directo -->
        <a href="{{ route('ourWork') }}" class="text-white/90 hover:text-white px-3 py-2">Nuestro Trabajo</a>

        <!-- Menú: Acción Social -->
        <x-ui.dropmenu title="Acción Social" width="w-56">
          <a href="{{ route('projects') }}" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Proyectos</a>
          <a href="{{ route('impData') }}" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Datos que impactan</a>
          <a href="{{ route('humanitarianAid') }}" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Ayuda Humanitaria</a>
        </x-ui.dropmenu>

        <!-- Menú: Noticias -->
        <x-ui.dropmenu title="Noticias" width="w-56">
          <a href="{{ route('featured') }}" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Destacados</a>
          <a href="{{ route('subscriptions') }}" class="block px-4 py-2.5 text-gray-800 hover:bg-gray-50 font-medium">Suscripción</a>
        </x-ui.dropmenu>

        <!-- Enlace directo -->
        <a href="{{ route('jobBoard') }}" class="text-white/90 hover:text-white px-3 py-2">Voluntariado</a>

        <!-- Botones de acción -->
        <div class="flex items-center space-x-3 ml-4">
          <a href="{{ route('collaborate') }}">
            <x-ui.button class="bg-[#C64508] text-white hover:bg-[#C64508]/90 focus:ring-2 focus:ring-light-Orange" size="md" rounded="lg">
              <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
              </svg>
              Colaborar
            </x-ui.button>
          </a>
          <a href="{{ route('login') }}">
            <x-ui.button class="bg-blue-600 text-white hover:bg-blue-700 focus:ring-2 focus:ring-blue-300" size="md" rounded="lg">
              <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
              </svg>
              Iniciar Sesión
            </x-ui.button>
          </a>
        </div>
      </div>

      <!-- Mobile Menu Button -->
      <button @click="isOpen = !isOpen" class="xl:hidden text-white p-2 hover:bg-white/10 rounded-lg" aria-label="Abrir menú de navegación">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>

    <!-- Mobile Menu -->
    <div class="xl:hidden fixed inset-0 bg-dark-blue/95 backdrop-blur-sm z-50 transition-opacity" 
         x-show="isOpen" 
         x-cloak 
         @click.away="isOpen = false">
      <div class="container mx-auto px-4 py-3">
        <!-- Header del menú móvil -->
        <div class="flex justify-between items-center mb-4">
          <a href="{{ route('homepage') }}">
            <img src="{{ asset('Logo-dark.svg') }}" class="h-12 w-auto" alt="Logo Asden">
          </a>
          <button @click="isOpen = false" class="text-white p-2 hover:bg-white/10 rounded-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>
        
        <!-- Navegación móvil -->
        <nav class="space-y-4 bg-dark-blue p-4 rounded-lg">
          <!-- Menú desplegable: Sobre Nosotros -->
          <div x-data="{ open: false }" class="border-b border-white/10 pb-2">
            <button @click="open = !open" class="w-full text-white text-left py-2 flex justify-between items-center">
              <span>Sobre Nosotros</span>
              <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
              </svg>
            </button>
            <div x-show="open" x-cloak class="pl-4 mt-2 space-y-2">
              <a href="{{ route('homepage') }}#history" class="block text-gray-300 hover:text-white">Nuestra Historia</a>
              <a href="{{ route('homepage') }}#mission" class="block text-gray-300 hover:text-white">Misión y Visión</a>
              <a href="{{ route('homepage') }}#values" class="block text-gray-300 hover:text-white">Valores</a>
              <a href="{{ route('collaborators') }}" class="block text-gray-300 hover:text-white">Colaboradores</a>
              <a href="{{ route('blogs')}}" class="block text-gray-300 hover:text-white">Blog</a>
            </div>
          </div>

          <!-- Enlace directo: Nuestro Trabajo -->
          <a href="{{ route('ourWork') }}" class="block text-white py-2">Nuestro Trabajo</a>

          <!-- Menú desplegable: Acción Social -->
          <div x-data="{ open: false }" class="border-b border-white/10 pb-2">
            <button @click="open = !open" class="w-full text-white text-left py-2 flex justify-between items-center">
              <span>Acción Social</span>
              <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
              </svg>
            </button>
            <div x-show="open" x-cloak class="pl-4 mt-2 space-y-2">
              <a href="{{ route('projects') }}" class="block text-gray-300 hover:text-white">Proyectos</a>
              <a href="{{ route('impData') }}" class="block text-gray-300 hover:text-white">Datos que impactan</a>
              <a href="{{ route('humanitarianAid') }}" class="block text-gray-300 hover:text-white">Ayuda Humanitaria</a>
            </div>
          </div>

          <!-- Menú desplegable: Noticias -->
          <div x-data="{ open: false }" class="border-b border-white/10 pb-2">
            <button @click="open = !open" class="w-full text-white text-left py-2 flex justify-between items-center">
              <span>Noticias</span>
              <svg class="w-4 h-4 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
              </svg>
            </button>
            <div x-show="open" x-cloak class="pl-4 mt-2 space-y-2">
              <a href="{{ route('featured') }}" class="block text-gray-300 hover:text-white">Destacados</a>
              <a href="{{ route('subscriptions') }}" class="block text-gray-300 hover:text-white">Suscripción</a>
            </div>
          </div>

          <!-- Enlace directo: Bolsa Laboral -->
          <a href="{{ route('jobBoard') }}" class="block text-white py-2">Voluntariado</a>
        </nav>

        <!-- Botones de acción en el móvil -->
        <div class="mt-6 space-y-4">
          <a href="{{ route('collaborate') }}" class="flex items-center justify-center space-x-2 px-4 py-2 bg-[#C64508] text-white rounded-full hover:bg-[#C64508]/70 transition-colors">
            <svg class="size-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
            </svg>
            <span>Colaborar</span>
          </a>
          
          <a href="{{ route('login') }}" class="flex items-center justify-center space-x-2 px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors">
            <svg class="size-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
            </svg>
            <span>Iniciar Sesión</span>
          </a>
        </div>
      </div>
    </div>
  </nav>
</header>