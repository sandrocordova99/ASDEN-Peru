export function colorOptions(idInput, options) {
    const colorOptions = document.querySelectorAll(`.${options}`);
    const colorInput = document.getElementById(idInput);

        colorOptions.forEach(option => {
            option.addEventListener('click', function() {
                colorOptions.forEach(opt => {
                    opt.classList.remove('ring-2', 'ring-offset-2', 'ring-[#1a78b2]');
                });

                this.classList.add('ring-2', 'ring-offset-2', 'ring-[#1a78b2]');

                colorInput.value = this.getAttribute('data-color');
            });
        });

        if (colorOptions.length > 0 && !colorInput.value) {
            colorOptions[0].click();
        }
}