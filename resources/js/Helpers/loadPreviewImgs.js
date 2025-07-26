export function loadPreviewImgs(arrayImgs, data){

    /* const url = 'http://127.0.0.1:8000/storage/'
    // const url = `https://asdenperuong.com/storage/app/public/` */
    const url =  `${window.APP_URL}/storage/`;
    
    arrayImgs.forEach((prev) => {
        const preview = document.getElementById(`${prev}-preview`);
        preview.src = `${url}${data[prev]}`
        if (!preview.src.includes('null')) {
            preview.classList.remove('hidden');
            document.getElementById(`no-image-${prev}`).classList.add('hidden');
            document.getElementById(`remove-${prev}`).classList.remove('hidden');
        }
    });
}

