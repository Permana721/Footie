function yt() {
    var urlVideo = 'https://youtu.be/U2oCyi6vRaQ?si=KjQ4HxuDBBs-Y4bI';
    window.open(urlVideo, '_blank');
  }

  function fb() {
    var urlFb = 'https://www.facebook.com/photo.php?fbid=475149517527745&set=pb.100050981020845.-2207520000&type=3';
    window.open(urlFb, '_blank');
  }

  function yt_piko() {
    var urlVideo = 'https://www.youtube.com/@alfikhoazka2011/videos';
    window.open(urlVideo, '_blank');
  }

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

