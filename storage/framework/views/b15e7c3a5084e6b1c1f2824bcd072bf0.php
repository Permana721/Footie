<div class="modal fade" id="userTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content modal-md">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo e($title); ?></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?php echo e(route('addDataUser')); ?>" enctype="multipart/form-data" method="POST">
          <?php echo csrf_field(); ?>
          <div class="modal-body">
            <div class="mb-3 row">
              <label for="name" class="col-sm-5 col-form-label">Nama</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="name" name="nama">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="email" class="col-sm-5 col-form-label">Email</label>
              <div class="col-sm-7">
                <input type="email" class="form-control" id="email" name="email">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="password" class="col-sm-5 col-form-label">Password</label>
              <div class="col-sm-7">
                <input type="password" class="form-control" id="password" name="password">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="tlp" class="col-sm-5 col-form-label">Telephone</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="tlp" name="tlp">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="type" class="col-sm-5 col-form-label">Role</label>
              <div class="col-sm-7">
                <select class="form-control" id="role" name="role">
                  <option value="" hidden>Pilih Role</option>
                  <option value="1">Admin</option>
                  <option value="2">User</option>
                </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="jenis_kelamin" class="col-sm-5 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-7">
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                  <option value="" hidden>Pilih Jenis Kelamin</option>
                  <option value="laki-laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                  <option value="Femboy">Femboy</option>
                  <option value="Non Binary">Non Binary</option>
                  <option value="Walmart Bag">wallmart Bag</option>
                </select>
              </div>
            </div>
          <div class="mb-3 row">
            <label for="foto" class="col-sm-5 col-form-label">Foto Profil</label>
            <div class="col-sm-7">
                <input type="hidden" name="foto">
                <img class="mb-2 preview" style="width: 100px;">
                <input type="file" class="form-control" accept=".png, .jpg, .jpeg" id="inputFoto" name="foto" onchange="previewImg()">
            </div>
          </div>
            
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
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
  </script><?php /**PATH C:\xampp\htdocs\Lahada\resources\views/admin/modal/modalUser.blade.php ENDPATH**/ ?>