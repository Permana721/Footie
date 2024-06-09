

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body d-flex flex-row justify-content-between">
            <div class="card-header bg-transparent">
                <button class="btn btn-info border-0" style="border-bottom: none;" id="addData">
                    <i class="fa fa-plus"></i>
                    <span>Tambah Product</span>
                </button>
            </div>
            <form action="<?php echo e(url('/admin/product')); ?>" method="get" class="form-inline">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Cari..." name="search" value="<?php echo e(Request::get('search')); ?>" aria-label="search">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>            
        </div>
    </div>
    <div class="card rounded-full">
        <div class="card-body">
            <table class="table table-responsive table-stripped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Date In</th>
                        <th>SKU</th>
                        <th>Nama Produk</th>
                        <th>Halal-Haram</th>
                        <th>Harga</th>
                        <th></th>
                        <th style="position: relative; left: 20px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($data->isEmpty()): ?>
                        <tr class="text-center">
                            <td colspan="9">Barang Kosong</td>
                        </tr>
                    <?php else: ?>
                        <?php $y = $data->firstItem() ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="align-middle">
                                <td><?php echo e($y); ?></td>
                                <td>
                                    <img src="<?php echo e(asset('storage/product/' . $x->foto)); ?>" style="width:100px;">
                                </td>
                                <td><?php echo e($x->created_at); ?></td>
                                <td><?php echo e($x->sku); ?></td>
                                <td><?php echo e($x->nama_product); ?></td>
                                <td>
                                    <img src="<?php echo e($x->halal == 'halal' ? asset('assets/img/halal-haram/halal.png') : asset('assets/img/halal-haram/haram.png')); ?>" style="width: 80px" alt="">
                                </td>
                                <td><?php echo e($x->harga); ?></td>
                                <td><?php echo e($x->quantity); ?></td>
                                <td>
                                    <button class="btn btn-info editModal" data-id="<?php echo e($x->id); ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger deleteData" data-id="<?php echo e($x->id); ?>">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php $y++ ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="pagination d-flex flex-row justify-content-between">
                <div class="showData">
                    Menampilkan <?php echo e($data->count()); ?> produk dari total <?php echo e($data->total()); ?> produk
                </div>
                <div>
                    <?php echo e($data->links()); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="tampilData" style="display: none;"></div>
    <div class="tampilEditData" style="display: none;"></div>

    <?php if(session('success')): ?>
        <div id="swalContainer" data-message="<?php echo e(session('success')); ?>"></div>
    <?php elseif(session('errors')): ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            Swal.fire({
                title: 'Error!',
                text: '<?php echo e(session('errors')); ?>',
                icon: 'error',
            });
        </script>
    <?php endif; ?>

    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN" : $('meta[name="csrf-token"]').attr("content"),
            }
        })

        $('#addData').click(function() {
            $.ajax({
                url: '<?php echo e(route('addModal')); ?>',
                success: function(response) {
                    $('.tampilData').html(response).show();
                    $('#addModal').modal("show");
                }
            });
        });

        $('.editModal').click(function (e) { 
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                type: "GET",
                url: "<?php echo e(route('editModal', ['id'=> ':id'])); ?>".replace(':id',id),
                success: function (response) {
                    $('.tampilEditData').html(response).show();
                    $('#editModal').modal("show");
                }
            });
        });

        $(document).ready(function() {
            var successMessage = $('#swalContainer').data('message');
            if(successMessage) {
                Swal.fire('Berhasil!', successMessage, 'success');
            }
        });

        $('.deleteData').click(function (e) { 
            e.preventDefault();
            var id = $(this).data('id');
            Swal.fire({
                title: "Apakah anda yakin",
                text: "ingin menghapus produk ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "<?php echo e(route('deleteData', ['id' => ':id'])); ?>".replace(':id', id),
                        success: function (response) {
                            Swal.fire('Berhasil!', 'Produk telah dihapus.', 'success').then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire('Berhasil!', 'Produk telah dihapus.', 'success').then(() => {
                                location.reload();
                            });
                        }
                    });
                }
            })
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Lahada\resources\views/admin/page/product.blade.php ENDPATH**/ ?>