<!-- Modal -->
<link rel="stylesheet" href="/assets/css/modal.css">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 id="modalTitle" class="modal-title fs-5" id="exampleModalLabel">Masuk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('loginproses.pelanggan')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email" value=""
                                placeholder="Masukan email Anda" required>
                        </div>
                    </div>
                    <div class="mb-5 row">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" value="" placeholder="Masukkan Password anda" required>
                                <button id="togglePassword" type="button" class="btn btn-outline-secondary eye" onclick="togglePasswordVisibility()">
                                    <i id="eyeIcon" class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary login mb-4">Login</button>
                    <p class="m-auto text-center p-2" style="font-size:12px">Belum punya akun? <a data-bs-toggle="modal"
                            data-bs-target="#registerModal" style="color: blue; cursor: pointer;">Daftar</a></p>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('/assets/js/custom.js')); ?>"></script><?php /**PATH C:\xampp\htdocs\Footie\resources\views/pelanggan/login/loginPelanggan.blade.php ENDPATH**/ ?>