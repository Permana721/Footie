<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-body d-flex flex-row justify-content-between">
            <div class="card-header bg-transparent">
                <button class="btn btn-info" id="addData">
                    <i class="fa fa-plus"></i>
                    <span>Tambah User</span>
                </button>
            </div>
            <form action="<?php echo e(url('/admin/user_management')); ?>" method="get" class="form-inline">
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
                        <th>Join Date</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Jenis Kelamin</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($data->isEmpty()): ?>
                        <tr class="text-center">
                            <td colspan="9">Tidak ada User</td>
                        </tr>
                    <?php else: ?>
                        <?php $y = $data->firstItem() ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="align-middle">
                                <td><?php echo e($y); ?></td>
                                    <td>
                                        <img src="<?php echo e(asset('storage/user/' . $x->foto)); ?>" style="width:100px;">
                                    </td>
                                    <td><?php echo e($x->created_at); ?></td>
                                    <td><?php echo e($x->name); ?></td>
                                    <td><?php echo e($x->email); ?></td>
                                    <td><?php echo e($x->tlp); ?></td>
                                    <td><?php echo e($x->jenis_kelamin); ?></td>
                                    <td> 
                                        <span class="badge text-bg-<?php echo e($x->role == 1 ? 'info' : 'success'); ?>"><?php echo e($x->role == 1 ? 'Admin' : 'User'); ?></span>
                                    </td>
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
                    Menampilkan <?php echo e($data->count()); ?> user dari total <?php echo e($data->total()); ?> user
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
        $('#addData').click(function() {
            $.ajax({
                url: '<?php echo e(route('addModalUser')); ?>',
                success: function(response) {
                    $('.tampilData').html(response).show();
                    $('#userTambah').modal("show");
                }
            });
        });

        $('.editModal').click(function (e) { 
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                type: "GET",
                url: "<?php echo e(route('showDataUser', ['id'=> ':id'])); ?>".replace(':id',id),
                success: function (response) {
                    $('.tampilEditData').html(response).show();
                    $('#editModal').modal("show");
                }
            });
        });

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN" : $('meta[name="csrf-token"]').attr("content"),
            }
        })

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
                text: "ingin menghapus user ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Hapus"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "<?php echo e(route('destroyDataUser', ['id' => ':id'])); ?>".replace(':id', id),
                        success: function (response) {
                            Swal.fire('Berhasil!', 'User telah dihapus.', 'success').then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire('Berhasil!', 'User telah dihapus.', 'success').then(() => {
                                location.reload();
                            });
                        }
                    });
                }
            })
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/page/user.blade.php ENDPATH**/ ?>