@extends('layouts.apppage')

@section('title', 'Asden Perú - Colaboradores')

@section('content')

    <!-- Banner y Card-->
    <section class="relative min-h-[600px] bg-cover bg-center bg-no-repeat py-20 flex items-center"
        style="background-image: url('/banners/banner-collaborators.webp');">
        <!-- Overlay degradado -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/40 to-black/70"></div>

        <!-- Contenedor principal -->
        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8">
            <div
                class="absolute right-4 lg:right-8 top-1/2 transform -translate-y-1/2 bg-white p-8 rounded-lg shadow-2xl max-w-md hover:shadow-3xl transition-shadow duration-300">
                <h2 class="text-3xl font-bold text-dark-blue mb-4">Nuestro Equipo</h2>
                <div class="w-12 h-1 bg-green-600  mb-4"></div>
                <p class="text-gray-700 mb-4 font-semibold">Certificados en más de 40 estados.</p>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    En ASDEN, nuestro equipo trabaja con pasión para conservar el medio ambiente y promover el desarrollo
                    sostenible. Desde 1982, somos referentes en gestión ambiental, impulsando proyectos con impacto
                    positivo.
                </p>
                <a href="#group"
                    class="inline-block px-5 py-2 bg-[#C64508] text-white font-semibold rounded-full hover:bg-opacity-90 transition duration-300 transform hover:scale-105">
                    Conoce al Equipo
                </a>
            </div>
        </div>
    </section>

    <!-- Nuestros Colaboradores-->
    <section class="container mx-auto px-4 sm:px-6 lg:px-8 py-16" id="group">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-dark-blue mb-2">Nuestros Colaboradores</h2>
            <div class="w-40 h-1 bg-green-600 mx-auto mb-4"></div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8" id="collaborators">
            <!-- Card de Colaboradora -->
            
        </div>
    </section>

    <script>
        const COLLABORATORS = [
            {
                name: 'Carmen Martínez',
                image: 'https://thumbs.dreamstime.com/b/empleado-de-oficina-con-el-pelo-oscuro-largo-77390910.jpg',
                description: 'Coordinadora de Proyectos Ambientales',
                linkedin: 'https://www.linkedin.com'
            },
            {
                name: 'Lucía Fernández',
                image: 'https://thumbs.dreamstime.com/b/joven-contable-mujer-trabajando-en-oficina-retrato-de-una-contadora-feliz-calculando-factura-213992994.jpg',
                description: 'Gestora de Comunicación y Participación Ciudadana',
                linkedin: 'https://www.linkedin.com'
            },
            {
                name: 'José García',
                image: 'https://static.vecteezy.com/system/resources/previews/000/868/197/non_2x/office-worker-photo.jpg',
                description: 'Especialista en Conservación de Ecosistemas',
                linkedin: 'https://www.linkedin.com'                
            },
            {
                name: 'Miguel Sánchez',
                image: 'https://www.ph3a.com.br/blog/content/images/2022/08/Martechs2.jpg',
                description: 'Técnico en Monitoreo Ambiental',
                linkedin: 'https://www.linkedin.com'
            },
            {
                name: 'Pedro Ramírez',
                image: 'https://leibergmbh.de/media/2021/10/bild_vertreib-marketing-und-produktmanagement-min-1600x1066.jpg',
                description: 'Analista de Datos y Medio Ambiente',
                linkedin: 'https://www.linkedin.com'
            },
            {
                name: 'Roberto Pérez',
                image: 'https://img.freepik.com/premium-photo/happy-young-chief-executive-officer-elegant-grey-suit-holding-tablet_236854-52413.jpg',
                description: 'Asesor en Desarrollo Sostenible',
                linkedin: 'https://www.linkedin.com'
            }
        ]
    </script>
    <script>
        document.getElementById('collaborators').innerHTML = COLLABORATORS.map(collaborator => 
            `
            <x-ui.card padding="md" shadow="md" rounded="md"
                image="${collaborator.image}"
                title="${collaborator.name}" description="${collaborator.description}" buttonLink="${collaborator.linkedin}">
                <x-ui.button class="underline text-[#0e76a8] hover:text-[#4682b4] px-0"
                    size="md" rounded="lg" @click="$dispatch('open-modal', { modalId: '${collaborator.name}' })">
                    Conocer más
                </x-ui.button>
            </x-ui.card>
            <x-ui.modals modalId="${collaborator.name}" isOpen="false" padding="md" shadow="md" rounded="md">
                    <article style="background-image: url(/Logo.png);" class="max-w-md mx-auto bg-no-repeat bg-center bg-contain" >
                        <div class=" backdrop-blur-[7px] py-4">
                            <div class="grid grid-cols-3 gap-x-6">
                                <img src="${collaborator.image}" alt="${collaborator.name}-image">
                                <div class="col-span-2 text-center">
                                    <h2 class="text-2xl font-bold text-dark-blue mb-2">${collaborator.name}</h2>
                                    <div class="w-40 h-1 bg-green-600 mx-auto mb-2"></div>
                                    <p class="text-gray-800 text-md">${collaborator.description}</p>
                                </div>
                            </div>
                            <p class="mt-6">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate corrupti unde aliquam suscipit veniam necessitatibus deserunt voluptate id. Accusantium fugit temporibus atque ipsam? Sunt architecto provident blanditiis minima eligendi, est recusandae atque excepturi ab molestiae perferendis dolor aliquid. Cupiditate unde excepturi eum placeat nihil totam optio necessitatibus, ducimus recusandae neque voluptatum officia esse qui repellendus dignissimos atque, voluptate magni assumenda repellat earum enim delectus itaque. Tenetur maiores provident nostrum saepe suscipit! Dolorem at, architecto repellendus facere eveniet quae! Architecto recusandae atque ex voluptatum, eveniet ullam odio amet magnam iusto. Quae natus dignissimos id reiciendis saepe illo repellat alias officia reprehenderit?</p>
                        </div>
                    </article>
            </x-ui.modals>
            `
        ).join('');
    </script>

@endsection