import { resetErrors } from "./errorMessages";

/**
   * Configura eventos para manejar edición y cierre de modal
   * Parametros:
   * container : Contenedor de todos los elementos
   * fetchFunction: Funcion para obtener un registro según su id
   * updateFunction: Funcion para actualizar el registro
   * name: Nombre del modal correspondiente al tipo de registro
*/
export function setupEditModalHandlers(container, fetchFunction, updateFunction, name) {
    const modal = document.getElementById(`${name}-modal`);
    const closeModalBtns = document.querySelectorAll("#close-modal, #close-modal-btn");

    container.addEventListener("click", function(event) {
        if (event.target.classList.contains(`edit-${name}`)) {
            event.preventDefault();
            fetchFunction(event.target.getAttribute("data-id"));
            resetErrors();
        }
    });

    closeModalBtns.forEach(btn => {
        btn.addEventListener("click", function() {
            modal.classList.add("hidden");
        });
    });

    document.getElementById(`save-${name}-btn`).addEventListener("click", async function(event) {
        event.preventDefault();
        resetErrors();
        updateFunction();
    });

}