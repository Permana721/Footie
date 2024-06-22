<link rel="stylesheet" href="/assets/css/modal.css">
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('updateDataUSer', $data->id ) }}" enctype="multipart/form-data" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-5 col-form-label">Nama</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="nama" autocomplete="off" value="{{$data->name}}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-5 col-form-label">Email</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" id="email" name="email" 
                            autocomplete="off" value="{{$data->email}}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-5 col-form-label">Password</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" autocomplete="off"
                                    value="{{password_needs_rehash($data->password,'PASSWORD_BCRYPT')}}">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword"><i class="fa-solid fa-eye-slash"></i></button>
                            </div>
                        </div>
                    </div>                    
                    <div class="mb-3 row">
                        <label for="tlp" class="col-sm-5 col-form-label">Telphone</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="tlp" name="tlp" value="{{$data->tlp}}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="role" class="col-sm-5 col-form-label">Role</label>
                        <div class="col-sm-7">
                            <select type="text" class="form-control" id="role" name="role">
                                <option hidden value=""> Pilih Role </option>
                                <option value="1" {{$data->role == 1 ? 'selected' : ''}}>Admin</option>
                                <option value="2" {{$data->role == 2 ? 'selected' : ''}}>User</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_kelamin" class="col-sm-5 col-form-label">Jenis kelamin</label>
                        <div class="col-sm-7">
                            <select type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <option hidden value=""> Pilih Jenis Kelamin </option>
                                <option value="laki-laki"   {{$data->jenis_kelamin === 'laki-laki' ? 'selected' : ''}}>Laki-Laki</option>
                                <option value="Perempuan"   {{$data->jenis_kelamin === 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                                <option value="Femboy"      {{$data->jenis_kelamin === 'Femboy' ? 'selected' : ''}}>Femboy</option>
                                <option value="Non Binary"  {{$data->jenis_kelamin === 'Non Binary' ? 'selected' : ''}}>Non Binary</option>
                                <option value="Walmart Bag" {{$data->jenis_kelamin === 'Walmart Bag' ? 'selected' : ''}}>wallmart Bag</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-5 col-form-label">Foto User</label>
                        <div class="col-sm-7">
                            <div class="foto-container">
                                <div class="preview-container">
                                    <input type="hidden" name="foto" value="{{$data->foto}}">
                                    <img src="{{ asset('storage/user/' . ($data->foto ? $data->foto : 'default.jpg')) }}" class="preview" style="width: 100%; height: auto; display: block;" onclick="selectNewImage()">
                                    <input type="file" class="form-control d-none" accept=".png, .jpg, .jpeg" id="inputFoto" name="foto" onchange="previewImg(this)" style="display: none;">
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function selectNewImage() {
        document.getElementById('inputFoto').click();
    }
    
    function previewImg(input) {
        const fotoIn = input.files[0];
        const preview = input.parentElement.querySelector('.preview');

        if (fotoIn) {
            const oFReader = new FileReader();
            oFReader.readAsDataURL(fotoIn);

            oFReader.onload = function(oFREvent) {
                preview.src = oFREvent.target.result;
            }
        }

    var file = input.files[0];
    var fileName = file.name;
    var fileExtension = fileName.split('.').pop().toLowerCase();

    if (['png', 'jpg', 'jpeg'].indexOf(fileExtension) === -1) {
        alert('File harus berformat .png, .jpg, atau .jpeg');
        input.value = '';
        return;
    }

    var reader = new FileReader();
    reader.onload = function (e) {
        document.querySelector('.preview').src = e.target.result;
    };
    reader.readAsDataURL(file);
    }

    function selectNewImage() {
        document.getElementById('inputFoto').click();
    }

    document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordInput = document.getElementById('password');
    const eyeIcon = '<i class="fa-solid fa-eye"></i>';
    const eyeSlashIcon = '<i class="fa-solid fa-eye-slash"></i>';

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        this.innerHTML = eyeIcon;
    } else {
        passwordInput.type = 'password';
        this.innerHTML = eyeSlashIcon;
    }
});

</script>