document.addEventListener('DOMContentLoaded', function() {
    document.addEventListener('click', function(event) {
        var loginForm = document.getElementById('loginForm');
        if (!loginForm.contains(event.target)) { // Si el clic no fue dentro del formulario
            loginForm.style.display = 'none'; // Oculta el formulario
        }
    });
});

window.onload = function() {
    if (window.self !== window.top) {
        // La página está en un iframe
        var btn = document.querySelector('.btn.btn-primary');
        if (btn) {
            btn.style.display = 'none';
        }
    }
}