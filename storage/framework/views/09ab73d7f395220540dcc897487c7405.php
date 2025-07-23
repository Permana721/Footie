<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo e($title); ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('updateDataUSer', $data->id )); ?>" enctype="multipart/form-data" method="POST">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-5 col-form-label">Nama</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="name" name="nama" autocomplete="off" value="<?php echo e($data->name); ?>">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-5 col-form-label">Email</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" id="email" name="email" 
                            autocomplete="off" value="<?php echo e($data->email); ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-5 col-form-label">Password</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" id="password" name="password"
                                autocomplete="off" value="<?php echo e(password_needs_rehash($data->password,'PASSWORD_BCRYPT')); ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tlp" class="col-sm-5 col-form-label">Telphone</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="tlp" name="tlp" value="<?php echo e($data->tlp); ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="role" class="col-sm-5 col-form-label">Role</label>
                        <div class="col-sm-7">
                            <select type="text" class="form-control" id="role" name="role">
                                <option hidden value=""> Pilih Role </option>
                                <option value="1" <?php echo e($data->role === '1' ? 'selected' : ''); ?>>Admin</option>
                                <option value="2" <?php echo e($data->role === '2' ? 'selected' : ''); ?>>User</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_kelamin" class="col-sm-5 col-form-label">Jenis kelamin</label>
                        <div class="col-sm-7">
                            <select type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <option hidden value=""> Pilih Jenis Kelamin </option>
                                <option value="laki-laki"   <?php echo e($data->jenis_kelamin === 'laki-laki' ? 'selected' : ''); ?>>Laki-Laki</option>
                                <option value="Perempuan"   <?php echo e($data->jenis_kelamin === 'Perempuan' ? 'selected' : ''); ?>>Perempuan</option>
                                <option value="Femboy"      <?php echo e($data->jenis_kelamin === 'Femboy' ? 'selected' : ''); ?>>Femboy</option>
                                <option value="Non Binary"  <?php echo e($data->jenis_kelamin === 'Non Binary' ? 'selected' : ''); ?>>Non Binary</option>
                                <option value="Walmart Bag" <?php echo e($data->jenis_kelamin === 'Walmart Bag' ? 'selected' : ''); ?>>wallmart Bag</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-5 col-form-label">Foto Profil</label>
                        <div class="col-sm-7">
                            <input type="hidden" name="foto">
                            <img class="mb-2 preview" style="width: 100px;" src="<?php echo e(asset('storage/user/'.$data->foto)); ?>">
                            <input type="file" class="form-control" accept=".png, .jpg, .jpeg" id="inputFoto" name="foto" onchange="previewImg()">
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

<script>
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
</script><?php /**PATH C:\xampp\htdocs\Lahada\resources\views/admin/modal/editUser.blade.php ENDPATH**/ ?>