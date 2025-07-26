export function rejectStatusSolicitud(id){
    fetch(`/api/updateSolicitud/${id}`, {
        method: "PATCH",
        headers: {
            "Content-Type": "application/json",
            "Authorization": `Bearer ${localStorage.getItem('token')}`
        },
        body: JSON.stringify({
            estado: "Rechazado"
        })
    })
    .then(res => res.json())
    //.then(data => console.log(data))
    .catch(err => console.error(err))
}

export function acceptStatusSolicitud(id){
    fetch(`/api/updateSolicitud/${id}`, {
        method: "PATCH",
        headers: {
            "Content-Type": "application/json",
            "Authorization": `Bearer ${localStorage.getItem('token')}`
        },
        body: JSON.stringify({
            estado: "Aceptado"
        })
    })
    .then(res => res.json())
    //.then(data => console.log(data))
    .catch(err => console.error(err))
}