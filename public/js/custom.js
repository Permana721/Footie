function previewImg() {
    const fotoIn = document.querySelector('#inputFoto');
    const preview = document.querySelector('.preview');

    preview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(fotoIn.files[0]);

    oFReader.onload = function(oFREvent) {
        preview.src = oFREvent.target.result;
    }
}

function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    }
}