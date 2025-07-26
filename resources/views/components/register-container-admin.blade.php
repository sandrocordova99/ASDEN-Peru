<section class="min-h-screen bg-gradient-to-br from-gray-50 to-indigo-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Encabezado -->
        <div class="mb-10 text-center">
            <h2 class="text-4xl font-bold text-gray-900 mb-2">Registro de {{ $title }}</h2>
            <div class="w-40 h-1 bg-green-600 mx-auto mb-4"></div>
            <p class="text-lg text-gray-600">{{ $description }}</p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-8 pt-0 border border-gray-100">
            <form id="{{$id}}" enctype="multipart/form-data" class="space-y-8" novalidate>
                @csrf

                {{$slot}}
            </form>
        </div>

    </div>
    </div>
</section>