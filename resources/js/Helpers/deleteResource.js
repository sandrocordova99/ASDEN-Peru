export function deleteResource(endpoint, nameCard) {
    
    document.querySelectorAll(`.delete-${nameCard}`).forEach(button => {
        button.addEventListener('click', function(e) {
            const id = this.getAttribute('data-id');
            e.preventDefault();
            if (!confirm("¿Seguro que deseas eliminar este elemento?")) return;
            fetch(`${endpoint}/${id}`, {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": `Bearer ${localStorage.getItem('token')}`
                }
            })
            .then(response => response.json())
            .then(() => location.reload())
            .catch(error => console.error("❌ Error al eliminar:", error));
        });
        
    });
    
}