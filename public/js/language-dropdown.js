document.addEventListener('DOMContentLoaded', function() {
    const languageButton = document.getElementById('languageButton');
    const languageDropdown = document.getElementById('languageDropdown');

    // Función para mostrar/ocultar el menú desplegable
    languageButton.addEventListener('click', function() {
        languageDropdown.classList.toggle('hidden');
    });

    // Cerrar el menú cuando se hace clic fuera de él
    document.addEventListener('click', function(event) {
        if (!languageButton.contains(event.target) && !languageDropdown.contains(event.target)) {
            languageDropdown.classList.add('hidden');
        }
    });
}); 