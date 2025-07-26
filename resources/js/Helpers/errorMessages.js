export function resetErrors() {
    document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
    document.querySelectorAll('input, select, textarea').forEach(el => {
        el.classList.remove('border-red-500');
    });
}

export function showErrors(data) {
    for (const [field, errors] of Object.entries(data.error)) {
        const input = document.querySelector(`[name="${field}"]`);
        const errorElement = document.querySelector(`[id="${field}-error"`);
    
            if (errorElement) {
                errorElement.textContent = Array.isArray(errors) ? errors[0] : errors;
                errorElement.classList.remove('hidden');
            }
    
            if (input) {
                input.classList.add('border-red-500');
                input.addEventListener('input', function() {
                this.classList.remove('border-red-500');
                errorElement.textContent = '';
                });
            }
    }
}