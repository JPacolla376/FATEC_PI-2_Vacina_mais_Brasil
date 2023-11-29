const wrapper = document.querySelector('.wrapper');
const registerLink = document.querySelector('.register-link');
const loginLink = document.querySelector('.login-link');

registerLink.onclick = () => {
    wrapper.classList.add('active');
}

loginLink.onclick = () => {
    wrapper.classList.remove('active');
}

function mostrarsenha() {
    var inputpass = document.getElementById('password');
    var btnshowpass = document.getElementById('btn-senha');

    if (inputpass.type === 'password') {
        inputpass.type = 'text';
        btnshowpass.classList.remove('bi-eye-fill');
        btnshowpass.classList.add('bi-eye-slash');
    } else {
        inputpass.type = 'password';
        btnshowpass.classList.remove('bi-eye-slash');
        btnshowpass.classList.add('bi-eye-fill');
    }
}

function mostrarsenha2() {
    var inputpass = document.getElementById('password2');
    var btnshowpass = document.getElementById('btn-senha2');

    if (inputpass.type === 'password') {
        inputpass.type = 'text';
        btnshowpass.classList.remove('bi-eye-fill');
        btnshowpass.classList.add('bi-eye-slash');
    } else {
        inputpass.type = 'password';
        btnshowpass.classList.remove('bi-eye-slash');
        btnshowpass.classList.add('bi-eye-fill');
    }
}


