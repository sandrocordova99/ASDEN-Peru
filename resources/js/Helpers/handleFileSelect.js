/* Función para la previsualización de imagenes en formularios (ejem: Editar/Agregar noticias) */
export function handleFileSelect(event, name) {

    const input = event.target;
    const preview = document.getElementById(name + '-preview');
    const noImageText = document.getElementById('no-image-'+  name);
    const btnRemove = document.getElementById('remove-' + name)

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                noImageText.classList.add('hidden');
                preview.classList.remove('hidden'); 
                btnRemove.classList.remove('hidden');
                preview.src = e.target.result;
            }

            reader.readAsDataURL(input.files[0]);
    }
}

export function removeImage(name) {
    const input = document.getElementById(name);

    const preview = document.getElementById(name + '-preview');
    const noImgText = document.getElementById('no-image-'+  name);
    const removeBtn = document.getElementById(`remove-${name}`);

    input.value = "";
    preview.src = "null";
    preview.classList.add('hidden');
    noImgText.classList.remove('hidden');
    removeBtn.classList.add('hidden');
}