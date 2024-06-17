<link rel="stylesheet" href="/assets/css/modal.css">
<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal-md" style="height: 1030px;">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo e($title); ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?php echo e(route('addData')); ?>" enctype="multipart/form-data" method="POST">
        <?php echo csrf_field(); ?>
        <div class="modal-body">
          <div class="mb-3 row">
            <label for="SKU" class="col-sm-5 col-form-label">SKU</label>
            <div class="col-sm-7">
              <input type="text" class="form-control-plaintext" id="SKU" name="sku" value="<?php echo e($sku); ?>" readonly>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="nameProduct" class="col-sm-5 col-form-label">Nama Product</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="nameProduct" name="nama">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="link" class="col-sm-5 col-form-label">Link Produk</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="link" name="link">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="deskripsi" class="col-sm-5 col-form-label">Deskripsi Produk</label>
            <div class="col-sm-7">
              <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" style="height: 250px"></textarea>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="category" class="col-sm-5 col-form-label">Kategori</label>
            <div class="col-sm-7">
              <select class="form-control" id="category" name="category">
                <option hidden value="">Pilih Kategori</option>
                <option value="chinese">Chinese Food</option>
                <option value="middle">Middle Food</option>
                <option value="indonesia">Indonesia Food</option>
                <option value="japan">Jappanese Food</option>
                <option value="korean">Korean Food</option>
                <option value="non-halal">Non Halal</option>
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="tipe" class="col-sm-5 col-form-label">Tipe</label>
            <div class="col-sm-7">
              <select class="form-control" id="tipe" name="tipe">
                <option hidden value="">Pilih Tipe</option>
                <option value="makanan">Makanan</option>
                <option value="minuman">Minuman</option>
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="alamat_penjual" class="col-sm-5 col-form-label">Alamat Penjual</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="alamat_penjual" name="alamat_penjual">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="halal" class="col-sm-5 col-form-label">Halal</label>
            <div class="col-sm-7">
              <select class="form-control" id="halal" name="halal">
                <option hidden value="">Pilih Varian</option>
                <option value="halal">Halal</option>
                <option value="haram">Haram</option>
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="harga" class="col-sm-5 col-form-label">Harga Product</label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="harga" name="harga" oninput="formatRibuan(this)">
            </div>
        </div>
        <div class="mb-3 row">
          <label for="foto" class="col-sm-5 col-form-label">Foto Product</label>
          <div class="col-sm-7">
              <div class="foto-container">
                  <div class="preview-container">
                      <img class="preview" style="display: none;" onclick="selectNewImage()">
                  </div>
                  <label for="inputFoto" class="plus-btn">
                      <i class="fas fa-plus"></i>
                      <input type="file" class="form-control d-none" accept=".png, .jpg, .jpeg" id="inputFoto" name="foto" onchange="previewImg(this)">
                  </label>
              </div>
          </div>
        </div>

      <div class="modal-footer" style="position: relative; top: 40px;">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
  function previewImg(input) {
      const fotoIn = input.files[0];
      const fotoContainer = input.closest('.foto-container');
      const preview = fotoContainer.querySelector('.preview');
      const plusBtn = fotoContainer.querySelector('.plus-btn');

      if (fotoIn) {
          const oFReader = new FileReader();
          oFReader.readAsDataURL(fotoIn);

          oFReader.onload = function(oFREvent) {
              preview.style.display = 'block';
              preview.src = oFREvent.target.result;
              plusBtn.style.display = 'none';
          }
      }
  }

  function selectNewImage() {
      document.getElementById('inputFoto').click();
  }

  function formatRibuan(input) {
      var number = input.value.replace(/\D/g, '');
      input.value = number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }
</script><?php /**PATH D:\laragon\www\Footie\resources\views/admin/modal/addModal.blade.php ENDPATH**/ ?>