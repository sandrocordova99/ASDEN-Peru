import { apiFetch } from "./apiFetch";
import { resetErrors, showErrors } from "./errorMessages";

export async function submitFormData(endpoint, btnId, href, formData){
    
    const btnSubmit = document.getElementById(btnId);
    const btnValue = btnSubmit.textContent.trim();

    const successMessage = document.getElementById('successMessage');
    const errorMessage = document.getElementById('errorMessage');

    try {
        if (successMessage && errorMessage){
            successMessage.classList.add('hidden');
            errorMessage.classList.add('hidden');
        }

        btnSubmit.disabled = true;
        btnSubmit.textContent = 'Cargando...'

        const data = await apiFetch(endpoint, 'POST', formData);
        console.log('XDD');
        
        console.log(data);
        
        if (data.success || data.status === 200 || data.status === 201 || !data.error) {    
            if (successMessage) {
                successMessage.textContent = data.message;
                successMessage.classList.remove('hidden');  

                btnSubmit.textContent = btnValue;
                btnSubmit.disabled = false;  
            } 
            return window.location.href = href;
        } else if (data.error){
            resetErrors();
            showErrors(data);
        } else if (errorMessage){
            errorMessage.textContent = data.message;
            errorMessage.classList.remove('hidden');
        }
        btnSubmit.textContent = btnValue;
        btnSubmit.disabled = false;
    } catch (error) {
        console.error("Error en la petición:", error);
    }
}