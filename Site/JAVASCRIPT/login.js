function mostrarsenha() {
    var inputpass = document.getElementById('senha');
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


