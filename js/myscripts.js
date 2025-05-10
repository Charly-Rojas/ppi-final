// Funcionalidad del modal de login y registro

document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("toggle-form");
    const loginForm = document.getElementById("login-form-wrapper");
    const registerForm = document.getElementById("register-form-wrapper");
    const modalTitle = document.getElementById("modal-title");
    const submitLogin = document.getElementById("submit-login");
    const submitRegister = document.getElementById("submit-register");

    let showingLogin = true;

    toggleBtn.addEventListener("click", function () {
        showingLogin = !showingLogin;

    if (showingLogin) {
        loginForm.classList.remove("d-none");
    registerForm.classList.add("d-none");
    modalTitle.textContent = "Inicia sesión";
    submitLogin.classList.remove("d-none");
    submitRegister.classList.add("d-none");
    toggleBtn.textContent = "Crear cuenta";
        } else {
        loginForm.classList.add("d-none");
    registerForm.classList.remove("d-none");
    modalTitle.textContent = "Crear cuenta";
    submitLogin.classList.add("d-none");
    submitRegister.classList.remove("d-none");
    toggleBtn.textContent = "Volver a login";
        }
    });

    // Opcional: acciones en los botones
    submitLogin.addEventListener("click", function () {
        const formData = new FormData(document.getElementById("login-form"));
    console.log("Enviando login", Object.fromEntries(formData));
        // Aquí puedes hacer un fetch/AJAX al backend
    });

    submitRegister.addEventListener("click", function () {
        const formData = new FormData(document.getElementById("register-form"));
    console.log("Enviando registro", Object.fromEntries(formData));
        // Aquí también puedes hacer un fetch/AJAX
    });
});