<section class="mt-12 bg-gradient-to-br from-blue-800 px-6 py-16 flex justify-center items-center">
  <div class="max-w-5xl w-full flex flex-col md:flex-row items-center justify-center gap-6">
    
  <div class="relative w-40 h-36 sm:w-56 sm:h-48 md:w-[250px] md:h-[200px] -mt-36 md:-mt-36">
  <img src="{{ asset('suscribete.webp') }}" alt="Suscríbete" class="w-full h-full rounded-xl object-cover shadow-lg">
</div>

    
    <!-- Texto y botón -->
    <div class="w-full md:w-1/2 text-left text-white">
      <h2 class="text-3xl font-bold">¡Suscríbete y sé parte de Asden!</h2>
      <p class="mt-2 mb-4 text-lg">Recibe noticias, novedades y formas de ayudar directamente en tu correo.</p>
      <a href="{{ route('subscriptions') }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded-full shadow-md transition duration-300">
        Quiero suscribirme
      </a>
    </div>

    </div>
</section>


<footer class="bg-dark-blue text-white py-6">
    <div class="container mx-auto px-4 sm:px-6">
        <div class="flex flex-col md:flex-row md:justify-between md:items-start">
            <!-- Logo y Datos de Contacto -->
            <div class="mb-6 md:mb-0 flex flex-col items-center md:items-start">
                <img src="/Logo-dark.svg" alt="Logo Asden" class="h-12 w-auto mb-2">
                <p class="text-sm text-center md:text-left text-white">
                    Jr. Daniel Alcides Carrión No. 257<br>
                    Huancayo - Perú
                </p>
                <p class="text-sm mt-1 text-white">976893049</p>
            </div>

            <!-- Acceso Rápido -->
            <div class="mb-6 md:mb-0">
                <h3 class="text-lg font-semibold mb-3 text-center md:text-left">Acceso Rápido</h3>
                <ul class="text-sm space-y-2 text-center md:text-left">
                    <li><a href="{{ route('ourWork') }}" class="hover:underline">Nuestro Trabajo</a></li>
                    <li><a href="{{ route('projects') }}" class="hover:underline">Proyectos</a></li>
                    <li><a href="{{route('blogs')}}" class="hover:underline">Blog</a></li>
                    <li><a href="{{ route('featured') }}" class="hover:underline">Noticias Destacadas</a></li>
                    <li><a href="{{ route('libroReclamaciones') }}" class="hover:underline">Libro De Reclamaciones</a></li>
                </ul>
            </div>

            <!-- Redes Sociales -->
            <div class="flex flex-col items-center md:items-end">
                <h3 class="text-lg font-semibold mb-3">Síguenos</h3>
                <div class="flex gap-x-2">
                    <!-- Instagram -->
                    <a href="https://www.instagram.com/asden_ong" target="_blank" rel="noopener noreferrer" aria-label="Ir al perfil de Instagram de ASDEN ONG" class="hover:text-light-Orange">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-instagram">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                            <path d="M16.5 7.5v.01" />
                        </svg>
                    </a>
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/asden.ong.9/" target="_blank" rel="noopener noreferrer" aria-label="Ir al perfil de Facebook de ASDEN ONG" class="hover:text-light-Orange">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-facebook">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                        </svg>
                    </a>
                    <!-- YouTube -->
                    <a href="https://www.youtube.com/@asdenongperu" target="_blank" rel="noopener noreferrer" aria-label="Ir al canal de YouTube de ASDEN ONG" class="hover:text-light-Orange">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-youtube">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8z" />
                            <path d="M10 9l5 3l-5 3z" />
                        </svg>
                    </a>
                    <!-- Twitter (X) -->
                    <a href="https://x.com/asdenorg" target="_blank" rel="noopener noreferrer" aria-label="Ir al perfil de X (Twitter) de ASDEN ONG" class="hover:text-light-Orange">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="30"  height="30"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-x"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4l11.733 16h4.267l-11.733 -16z" /><path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" /></svg> 
                    </a>
                    <!-- Gmail (correo) -->
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to=asdenorg.peru@gmail.com" target="_blank" rel="noopener noreferrer" aria-label="Enviar un correo a asdenorg.peru@gmail.com mediante Gmail" class="hover:text-light-Orange">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="30"  height="30"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-mail"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" /><path d="M3 7l9 6l9 -6" /></svg>
                    </a>
                </div>
            </div>
        </div>
        <!-- Línea Divisoria y Copyright -->
        <div class="mt-6 border-t border-white/20 pt-4 ">
            <p class="text-sm text-center text-white">&copy; {{ date('Y') }} Asden Perú. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>