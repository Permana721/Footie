<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal-md">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo e($title); ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?php echo e(route('updateData', $data->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>
        <div class="modal-body">
          <div class="mb-3 row">
            <label for="SKU" class="col-sm-5 col-form-label">SKU</label>
            <div class="col-sm-7">
              <input type="text" class="form-control-plaintext" id="SKU" name="sku" value="<?php echo e($data->sku); ?>" readonly>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="nameProduct" class="col-sm-5 col-form-label">Nama Product</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="nameProduct" name="nama" value="<?php echo e($data->nama_product); ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="link" class="col-sm-5 col-form-label">Link Produk</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="link" name="link" value="<?php echo e($data->link); ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="deskripsi" class="col-sm-5 col-form-label">Deskripsi Produk</label>
            <div class="col-sm-7">
              <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" value="" style="height: 250px;"><?php echo e($data->deskripsi); ?></textarea>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="category" class="col-sm-5 col-form-label">Kategori</label>
            <div class="col-sm-7">
              <select class="form-control" id="category" name="category">
                <option hidden value="">Pilih</option>
                <option value="chinese" <?php echo e($data->category == 'chinese' ? 'selected' : ''); ?>>Chinese Food</option>
                <option value="middle" <?php echo e($data->category == 'middle' ? 'selected' : ''); ?>>Middle Food</option>
                <option value="indonesia" <?php echo e($data->category == 'indonesia' ? 'selected' : ''); ?>>Indonesia Food</option>
                <option value="japan" <?php echo e($data->category == 'japan' ? 'selected' : ''); ?>>Japannese Food</option>
                <option value="korean" <?php echo e($data->category == 'korean' ? 'selected' : ''); ?>>Korean Food</option>
                <option value="non-halal" <?php echo e($data->category == 'non-halal' ? 'selected' : ''); ?>>Non Halal</option>
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="tipe" class="col-sm-5 col-form-label">Kategori</label>
            <div class="col-sm-7">
              <select class="form-control" id="tipe" name="tipe">
                <option hidden value="">Pilih tipe</option>
                <option value="makanan" <?php echo e($data->tipe == 'makanan' ? 'selected' : ''); ?>>Makanan</option>
                <option value="minuman" <?php echo e($data->tipe == 'minuman' ? 'selected' : ''); ?>>Minuman</option>
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="alamat_penjual" class="col-sm-5 col-form-label">Alamat Penjual</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="alamat_penjual" name="alamat_penjual" value="<?php echo e($data->alamat_penjual); ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="halal" class="col-sm-5 col-form-label">Halal</label>
            <div class="col-sm-7">
              <select class="form-control" id="halal" name="halal">
                <option hidden value="">Pilih Varian</option>
                <option value="halal" <?php echo e($data->halal == 'halal' ? 'selected' : ''); ?>>Halal</option>
                <option value="haram" <?php echo e($data->halal == 'haram' ? 'selected' : ''); ?>>Haram</option>
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="harga" class="col-sm-5 col-form-label">Harga Product</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="harga" name="harga" value="<?php echo e($data->harga); ?>" oninput="formatRibuan(this)">
            </div>
        </div>

        <div class="mb-3 row">
          <label for="foto" class="col-sm-5 col-form-label">Foto Product</label>
          <div class="col-sm-7">
              <div class="foto-container">
                  <div class="preview-container">
                      <input type="hidden" name="foto" value="<?php echo e($data->foto); ?>">
                      <img src="<?php echo e(asset('storage/product/' . $data->foto)); ?>" class="preview" style="width: 40%; height: auto; display: block;" onclick="selectNewImage()">
                      <input type="file" class="form-control d-none" accept=".png, .jpg, .jpeg" id="inputFoto" name="foto" onchange="previewImg(this)" style="display: none;">
                  </div>
              </div>
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
    }

  function formatRibuan(input) {
      var number = input.value.replace(/\D/g, '');
      input.value = number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }
</script><?php /**PATH D:\laragon\www\Footie\resources\views/admin/modal/editModal.blade.php ENDPATH**/ ?>