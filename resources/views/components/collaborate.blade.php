@extends('layouts.apppage')

@section('title', 'Asden Perú - Colabora con nosotros')

@section('content')
    <!-- Banner -->
    <section class="relative min-h-[600px] bg-cover bg-center bg-no-repeat flex items-center py-20"
        style="background-image: url('/banners/banner-colaborate.webp');">
        <!-- Overlay degradado -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/40 to-black/70"></div>

        <!-- Contenedor principal -->
        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">Colabora</h1>
            <div class="w-32 h-1 bg-light-Orange rounded-full mx-auto  mb-6"></div>
            <p class="text-lg md:text-xl text-gray-200 max-w-3xl mx-auto">
                ¡Únete a nuestra comunidad de voluntarios comprometidos con la conservación ambiental y el desarrollo sostenible!
            </p>
            <br>
            <span class="flex place-content-center">
                <svg class="size-16 animate-bounce" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="white"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevrons-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7l5 5l5 -5" /><path d="M7 13l5 5l5 -5" /></svg>
            </span>
            
        </div>
    </section>

    <!-- Sección de Formas de Colaborar -->
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <!-- Encabezado -->
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-dark-blue mb-2">Formas de colaborar</h2>
            <div class="w-40 h-1 bg-green-600 mx-auto mb-4"></div>
            <p class="text-gray-600 text-lg">Descubre las formas de colaborar con nosotros.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12 items-center">
            <!-- Columna Izquierda -->
            <div class="max-w-xl mx-auto">
                <h3 class="text-3xl md:text-4xl font-bold text-dark-blue mb-6">
                    <span class="bg-gradient-to-r from-green-600 to-green-500 bg-clip-text text-transparent">
                        ¿Cómo puedes ayudar?
                    </span>
                </h3>
                <p class="text-lg text-gray-700 leading-relaxed mb-8">
                    Apoya nuestra misión en ASDEN con una contribución monetaria. Cada donación es un paso hacia un futuro
                    mejor para las comunidades vulnerables.
                </p>
                <a href="#donar"
                    class="inline-flex items-center bg-gradient-to-r from-green-600 to-green-500 text-white font-semibold px-8 py-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    Quiero Donar
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </a>
            </div>

            <!-- Columna Derecha -->
            <div class="text-center">
                <h4 class="text-2xl md:text-3xl font-semibold text-dark-blue mb-8">
                    <span class="relative">
                        Formas de Donar
                        <span
                            class="absolute -bottom-2 left-0 w-full h-1.5 bg-gradient-to-r from-green-500 to-green-300 rounded-full"></span>
                    </span>
                </h4>
                <div class="flex flex-wrap justify-center gap-4">
                    <!-- Donación Personal -->
                    <div
                        class="group relative p-4 bg-white rounded-xl border border-gray-200 hover:border-green-100 hover:bg-green-50 transition-all cursor-pointer">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <span class="font-semibold text-dark-blue">Personal</span>
                        </div>
                        <p class="text-gray-500 text-sm mt-3">Donaciones individuales con seguimiento detallado</p>
                    </div>

                    <!-- Donación Empresarial -->
                    <div
                        class="group relative p-4 bg-white rounded-xl border border-gray-200 hover:border-green-100 hover:bg-green-50 transition-all cursor-pointer">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0H5m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <span class="font-semibold text-dark-blue">Empresarial</span>
                        </div>
                        <p class="text-gray-500 text-sm mt-3">Programas de RSE con beneficios fiscales</p>
                    </div>

                    <!-- Donación Corporativa -->
                    <div
                        class="group relative p-4 bg-white rounded-xl border border-gray-200 hover:border-green-100 hover:bg-green-50 transition-all cursor-pointer">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <span class="font-semibold text-dark-blue">Corporativa</span>
                        </div>
                        <p class="text-gray-500 text-sm mt-3">Alianzas estratégicas a largo plazo</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mensaje introductorio a los medios de pago -->
        <div id="donar" class="mb-8 text-center">
            <p class="text-lg font-medium">Elige la manera más fácil para ti ¡Haz tu donación ahora!</p>
        </div>

        <!-- Grid de medios de pago con descripciones cortas -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" id="payment-methods">
            
        </div>
    </section>

    <!-- Sección de cambio de vida -->
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <!-- Encabezado -->
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-dark-blue mb-2">Tu donación cambia vidas</h2>
            <div class="w-40 h-1 bg-green-600 mx-auto mb-4"></div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <x-ui.card padding="lg" shadow="xl" rounded="lg"
                image="/collaborateImages/aguaPotable.webp"
                description="Construcción y rehabilitación de sistemas de agua potable" class="bg-white text-gray-800" />
            <x-ui.card padding="lg" shadow="xl" rounded="lg"
                image="/collaborateImages/estudiante.webp"
                description="Edificación y restauración de escuelas, material escolar" class="bg-white text-gray-800" />
            <x-ui.card padding="lg" shadow="xl" rounded="lg"
                image="/collaborateImages/educacionMedico.webp"
                description="Formación y educación de calidad, derechos de igualdad" class="bg-white text-gray-800" />
            <x-ui.card padding="lg" shadow="xl" rounded="lg"
                image="/collaborateImages/higieneKit.webp"
                description="Kits de higiene y mantas, protección de derechos" class="bg-white text-gray-800" />
        </div>
    </section>

    <!-- Sección de otras formas de colaborar -->
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <!-- Encabezado -->
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-dark-blue mb-2">Otras formas de colaborar</h2>
            <div class="w-40 h-1 bg-green-600 mx-auto mb-4"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <x-ui.card padding="lg" shadow="xl" rounded="lg"
                image="/collaborateImages/reunion.webp"
                title="Marketing solidario"
                description="El marketing solidario tiene como objetivo captar fondos para una causa con la que tu empresa solidaria desee contribuir. Tu participación puede hacer una gran diferencia y ayudar a transformar vidas"
                class="bg-white text-gray-800" />
            <x-ui.card padding="lg" shadow="xl" rounded="lg"
                image="/collaborateImages/voluntariado.webp"
                title="Voluntariado corporativo"
                description="El voluntariado corporativo es mucho más que una acción solidaria para empresas, sirve para incentivar y motivar al personal de tu empresa. Tu empresa puede convertirse en el motor del cambio."
                class="bg-white text-gray-800" />
            <x-ui.card padding="lg" shadow="xl" rounded="lg"
                image="/collaborateImages/pro-bono.webp"
                title="Servicios pro bono"
                description="Tu empresa puede colaborar de forma solidaria mediante acciones pro bono, como asistencia en la gestión de la organización, asesoría, elaboración de estudios, servicios jurídicos o formación."
                class="bg-white text-gray-800" />
        </div>
    </section>

    <script>
        const PAYMENT_CARDS = [
            {
                name: 'Plin',
                image: '/pagos/PLIN.webp',
                description: 'Donación rápida y segura.',
                qr: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQLuYenZyDsFyEnK6JKvcd1zaIdtcRdp1FK_Q&s'
            },
            {
                name: 'Yape',
                image: '/pagos/YAPE.webp',
                description: 'Envía tu donación al instante.',
                qr: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTp5nWxhzVvLLXOoVcsnjrSWnfG-sx7nc1f3g&s'
            },
            {
                name: 'Visa',
                image: '/pagos/VISA.webp',
                description: 'Paga con tarjeta Visa.',
            },
            {
                name: 'MasterCard',
                image: '/pagos/MASTER_CARD.webp',
                description: 'Usa MasterCard para donar.',
            },
            {
                name: 'Diners Club International',
                image: '/pagos/diners_card.webp',
                description: 'Dona con Diners Club.',
            },
            {
                name: 'American Express',
                image: '/pagos/AMERICAN_EXPRESS.webp',
                description: 'Apoya con American Expresss.',
            },
            {
                name: 'BCP',
                image: '/pagos/BCP.webp',
                description: 'Contribuye vía BCP.',
            }
        ]
    </script>
    <script>
        document.getElementById('payment-methods').innerHTML = PAYMENT_CARDS.map(
            card => `
            <x-ui.card padding="lg" shadow="xl" rounded="lg" @click="$dispatch('open-modal', { modalId: '${card.name}' })"
                image="${card.image}" title="${card.name}"
                description="${card.description}" class="bg-white text-gray-800 cursor-pointer" />
                <x-ui.modals modalId="${card.name}" isOpen="false" padding="md" shadow="md" rounded="md" class="flex flex-col">
                    <img class="w-2/5 mx-auto mb-2" src="${card.image}" alt="${card.name}-image">
                    ${card.qr
                    ? `<img class="w-1/2 mx-auto" src="${card.qr}" alt="QR - ${card.name}">`
                    : `<x-ui.payedForm/>`}
                </x-ui.modals>
            `
        ).join('');
    </script>

    

@endsection