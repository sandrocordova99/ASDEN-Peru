@extends('layouts.apppage')

@section('title', 'Asden Perú - Nuestro Trabajo')
@section('description', 'Asden busca proteger a los más necesitados brindando recursos o apoyo de forma equitativa en distintas comunidades.')

@section('content')
    <!--Section de Nuestro Trabajo -->
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-dark-blue mb-2">Nuestro trabajo</h2>
            <div class="w-40 h-1 bg-green-600 mx-auto mb-4"></div>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">ASDEN busca proteger a los más necesitados brindando recursos o apoyo de forma equitativa en distintas comunidades.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <x-ui.card padding="lg" shadow="xl" rounded="lg" image="/nosotros/Agua-potable-para-todos.webp"
                title="Auxilio para desastres"
                description="Ofrecemos apoyo inmediato a las comunidades afectadas por desastres naturales, proporcionando recursos y asistencia vital para ayudarles a recuperarse." />
            <x-ui.card padding="lg" shadow="xl" rounded="lg"
                image="/nosotros/charla-conjunta.webp" title="Ayuda comunitaria"
                description="Trabajamos con las comunidades locales para desarrollar proyectos que mejoren la calidad de vida y promuevan el desarrollo sostenible." />
            <x-ui.card padding="lg" shadow="xl" rounded="lg"
                image="/nosotros/bombilla-arbol.webp"
                title="Responsabilidad Social"
                description="Nos comprometemos a fomentar prácticas responsables y sostenibles, asegurando que nuestras acciones beneficien tanto a las personas como al medio ambiente." />
        </div>
    </section>
    <!-- Section de Auxilio, Ayuda y Responsabilidad -->
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-dark-blue mb-2">Auxilio, Ayuda y Responsabilidad</h2>
            <div class="w-40 h-1 bg-green-600 mx-auto mb-4"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card 1: Auxilio para Desastres -->
            <div
                class="bg-white p-8 rounded-xl shadow-xl border-l-4 border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-2xl hover:border-red-600">
                <h3 class="text-2xl font-bold mb-2">AUXILIO PARA DESASTRES</h3>
                <p class="text-lg font-semibold text-white bg-red-600 inline-block px-4 py-2 rounded-md mb-4">
                    Formas de ayudar
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Trabajamos con un protocolo internacional que clasifica emergencias según la cantidad de personas y
                    viviendas afectadas, además de contar con un procedimiento propio para las primeras 10 horas, momentos críticos para la respuesta.
                </p>
            </div>
            <!-- Card 2: Ayuda Comunitaria -->
            <div
                class="bg-white p-8 rounded-xl shadow-xl border-l-4 border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-2xl hover:border-blue-600">
                <h3 class="text-2xl font-bold mb-2">AYUDA COMUNITARIA</h3>
                <p class="text-lg font-semibold text-white bg-blue-600 inline-block px-4 py-2 rounded-md mb-4">
                    Trabajo comunitario
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Diversos grupos y entidades se unen de forma desinteresada para impulsar cambios positivos. Voluntarios colaboran en limpieza, asistencia a los más necesitados e inclusión social.
                </p>
            </div>
            <!-- Card 3: Responsabilidad Social -->
            <div
                class="bg-white p-8 rounded-xl shadow-xl border-l-4 border-transparent transition-all duration-300 transform hover:scale-105 hover:shadow-2xl hover:border-teal-600">
                <h3 class="text-2xl font-bold mb-2">RESPONSABILIDAD SOCIAL</h3>
                <p class="text-lg font-semibold text-white bg-teal-600 inline-block px-4 py-2 rounded-md mb-4">
                    Responsabilidad individual
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Nuestros actos diarios impactan a la comunidad. Cada acción, desde lo cotidiano, contribuye a mejorar la vida de los demás y a construir un mundo más sostenible.
                </p>
            </div>
        </div>
    </section>
    <!-- Section de Testimonios -->
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-dark-blue mb-2">Testimonios</h2>
            <div class="w-40 h-1 bg-green-600 mx-auto mb-4"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <!-- Testimonio 1: Ana Martínez -->
            <div
                class="group relative bg-white rounded-2xl shadow-2xl hover:shadow-3xl transition-all duration-300 hover:-translate-y-2 overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-b from-green-50/30 to-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>
                <div class="p-8 z-10 relative">
                    <div class="flex flex-col items-center">
                        <div class="relative mb-6">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-green-400 to-blue-500 rounded-full blur-lg opacity-30 group-hover:opacity-50 transition-opacity">
                            </div>
                            <img src="/testimonios/testimonio-1.webp"
                                alt="Ana Martínez"
                                class="w-24 h-24 rounded-full border-4 border-white shadow-xl transform transition-transform duration-300 group-hover:scale-105">
                        </div>
                        <div class="relative">
                            <svg class="absolute -top-8 left-0 w-12 h-12 text-green-100/50" fill="currentColor"
                                viewBox="0 0 32 32">
                                <path
                                    d="M4 12v16h6v-16h-6zM14 12v16h6v-16h-6zM22 12h4l-4 16h6v-16h4l-10-16v16zM0 0v16h6v-16h-6z" />
                            </svg>
                            <blockquote class="text-lg leading-relaxed text-gray-700 font-medium italic pl-8">
                                "Gracias a Asden, he podido continuar mis estudios y ahora tengo un futuro más prometedor.
                                Estoy muy agradecida por todo el apoyo."
                            </blockquote>
                            <svg class="absolute -bottom-8 right-0 w-12 h-12 text-green-100/50 transform rotate-180"
                                fill="currentColor" viewBox="0 0 32 32">
                                <path
                                    d="M4 12v16h6v-16h-6zM14 12v16h6v-16h-6zM22 12h4l-4 16h6v-16h4l-10-16v16zM0 0v16h6v-16h-6z" />
                            </svg>
                        </div>
                        <div class="mt-8 text-center">
                            <p
                                class="text-xl font-bold bg-gradient-to-r from-green-600 to-blue-700 bg-clip-text text-transparent">
                                Ana Martínez</p>
                            <p class="text-gray-500 font-medium mt-1">Beneficiaria del programa de educación</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonio 2: Carlos Rodríguez -->
            <div
                class="group relative bg-white rounded-2xl shadow-2xl hover:shadow-3xl transition-all duration-300 hover:-translate-y-2 overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-b from-blue-50/30 to-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>
                <div class="p-8 z-10 relative">
                    <div class="flex flex-col items-center">
                        <div class="relative mb-6">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full blur-lg opacity-30 group-hover:opacity-50 transition-opacity">
                            </div>
                            <img src="/testimonios/testimonio-2.webp" alt="Carlos Rodríguez"
                                class="w-24 h-24 rounded-full border-4 border-white shadow-xl transform transition-transform duration-300 group-hover:scale-105">
                        </div>
                        <div class="relative">
                            <svg class="absolute -top-8 left-0 w-12 h-12 text-blue-100/50" fill="currentColor"
                                viewBox="0 0 32 32">
                                <path
                                    d="M4 12v16h6v-16h-6zM14 12v16h6v-16h-6zM22 12h4l-4 16h6v-16h4l-10-16v16zM0 0v16h6v-16h-6z" />
                            </svg>
                            <blockquote class="text-lg leading-relaxed text-gray-700 font-medium italic pl-8">
                                "Ser voluntario en Asden ha sido una experiencia transformadora. El impacto positivo en la comunidad supera todas las expectativas."
                            </blockquote>
                            <svg class="absolute -bottom-8 right-0 w-12 h-12 text-blue-100/50 transform rotate-180"
                                fill="currentColor" viewBox="0 0 32 32">
                                <path
                                    d="M4 12v16h6v-16h-6zM14 12v16h6v-16h-6zM22 12h4l-4 16h6v-16h4l-10-16v16zM0 0v16h6v-16h-6z" />
                            </svg>
                        </div>
                        <div class="mt-8 text-center">
                            <p
                                class="text-xl font-bold bg-gradient-to-r from-blue-600 to-purple-700 bg-clip-text text-transparent">
                                Carlos Rodríguez</p>
                            <p class="text-gray-500 font-medium mt-1">Voluntario en proyectos comunitarios</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonio 3: Lucía Fernández -->
            <div
                class="group relative bg-white rounded-2xl shadow-2xl hover:shadow-3xl transition-all duration-300 hover:-translate-y-2 overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-b from-purple-50/30 to-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                </div>
                <div class="p-8 z-10 relative">
                    <div class="flex flex-col items-center">
                        <div class="relative mb-6">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-500 rounded-full blur-lg opacity-30 group-hover:opacity-50 transition-opacity">
                            </div>
                            <img src="/testimonios/testimonio-3.webp"
                                alt="Lucía Fernández"
                                class="w-24 h-24 rounded-full border-4 border-white shadow-xl transform transition-transform duration-300 group-hover:scale-105">
                        </div>
                        <div class="relative">
                            <svg class="absolute -top-8 left-0 w-12 h-12 text-purple-100/50" fill="currentColor"
                                viewBox="0 0 32 32">
                                <path
                                    d="M4 12v16h6v-16h-6zM14 12v16h6v-16h-6zM22 12h4l-4 16h6v-16h4l-10-16v16zM0 0v16h6v-16h-6z" />
                            </svg>
                            <blockquote class="text-lg leading-relaxed text-gray-700 font-medium italic pl-8">
                                "En Asden hemos creado un ecosistema de apoyo que transforma vidas. Ver los resultados nos impulsa a seguir innovando."
                            </blockquote>
                            <svg class="absolute -bottom-8 right-0 w-12 h-12 text-purple-100/50 transform rotate-180"
                                fill="currentColor" viewBox="0 0 32 32">
                                <path
                                    d="M4 12v16h6v-16h-6zM14 12v16h6v-16h-6zM22 12h4l-4 16h6v-16h4l-10-16v16zM0 0v16h6v-16h-6z" />
                            </svg>
                        </div>
                        <div class="mt-8 text-center">
                            <p
                                class="text-xl font-bold bg-gradient-to-r from-purple-600 to-pink-700 bg-clip-text text-transparent">
                                Lucía Fernández</p>
                            <p class="text-gray-500 font-medium mt-1">Coordinadora del programa de salud</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        setTimeout(() => {
            const modal = document.getElementById('miModal');
            if (modal) {
                modal.classList.remove('hidden');
            }
        }, 5000); // 5 segundos
    </script>
@endsection