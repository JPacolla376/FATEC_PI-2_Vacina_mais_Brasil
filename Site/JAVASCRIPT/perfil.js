function mostrarSenha(idCampoSenha) {
    var inputSenha = document.getElementById(idCampoSenha);
    var btnShowSenha = document.getElementById('btn-' + idCampoSenha);

    if (inputSenha.type === 'password') {
        inputSenha.type = 'text';
        btnShowSenha.classList.remove('bi-eye-fill');
        btnShowSenha.classList.add('bi-eye-slash');
    } else {
        inputSenha.type = 'password';
        btnShowSenha.classList.remove('bi-eye-slash');
        btnShowSenha.classList.add('bi-eye-fill');
    }
}

function previewSelectedImage() {
    const inputImage = document.getElementById('inputImage');
    const previewImage = document.getElementById('previewImage');

    const file = inputImage.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            previewImage.src = e.target.result;

            // Salva a imagem no armazenamento local (localStorage)
            localStorage.setItem('selectedImage', e.target.result);
        };
        reader.readAsDataURL(file);
    }
}

// Carrega a imagem armazenada no armazenamento local ao carregar a página
window.onload = function () {
    const storedImage = localStorage.getItem('selectedImage');
    if (storedImage) {
        document.getElementById('previewImage').src = storedImage;
    }
};
