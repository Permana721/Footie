<link rel="stylesheet" href="/assets/css/modal.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registerModalLabel">Register</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('storePelanggan')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-3 col-form-label">Nama <span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" id="nama" value="" placeholder="Silahkan masukkan nama anda" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-3 col-form-label">Email <span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" id="email" value="" placeholder="Silahkan masukkan email anda" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-3 col-form-label">Password <span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Silahkan masukkan password anda">
                                
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tlp" class="col-sm-3 col-form-label">Nomor Telepon <span style="color:red;">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tlp" name="tlp" placeholder="Input phone number">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin <span style="color:red;">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <option hidden>Pilih Jenis Kelamin</option>
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Femboy">Femboy</option>
                                <option value="Non Binary">Non Binary</option>
                                <option value="Walmart Bag">wallmart Bag</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-5 row">
                        <label for="foto" class="col-sm-5 col-form-label">Foto Profil<span style="color:red;">*</span></label>
                        <div class="col-sm-7" style="position: relative; right: 16%;">
                            <div class="foto-container">
                                <div class="preview-container">
                                    <img class="preview" style="display: none;" onclick="selectNewImage()">
                                </div>
                                <label for="inputFoto" class="plus-btn" id="plusBtn">
                                    <i class="fas fa-plus"></i>
                                    <input type="file" class="form-control d-none" accept=".png, .jpg, .jpeg" id="inputFoto" name="foto" onchange="previewImg(this)">
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary login mb-4">Register</button>
                    <p class="m-auto text-center p-2" style="font-size:12px">Sudah punya akun? <a data-bs-toggle="modal"
                        data-bs-target="#exampleModal" style="color: blue; cursor: pointer;">Masuk</a></p>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="<?php echo e(asset('/assets/js/copy.js')); ?>"></script>
<?php /**PATH D:\xampp\htdocs\Lahada\resources\views/pelanggan/login/registerPelanggan.blade.php ENDPATH**/ ?>