@props([
'id' => '',
'data' => '',
'edit' => null,
])

<article class="flex flex-col relative bg-white p-3 rounded-lg shadow-lg overflow-hidden new-card transition-all hover:shadow-xl hover:-translate-y-2 h-full" data-id="{{ $id }}">
    {{$slot}}
    @if ($edit)
    <div class="flex mt-auto gap-2">
        <button class="hover:bg-blue-700 bg-blue-500 text-white py-1 px-2 rounded-md edit-{{ $data }}" data-id="{{ $id }}">Editar</a>
            <button class="hover:bg-red-500 hover:text-white duration-100 ease-in text-red-500 rounded-md py-1 px-2 delete-{{ $data }}" data-id="{{ $id }}">Eliminar</button>
    </div>
    @endif
</article>