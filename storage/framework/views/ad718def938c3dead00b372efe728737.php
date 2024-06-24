
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php $__env->startSection('content'); ?>
    <div class="d-flex flex-wrap gap-4">
        <div class="card" style="width: 250px;">
            <div class="card-body m-auto">
                <div class="d-flex gap-4 align-items-center m-auto">
                    <span class="material-icons fs-1 p-0 m-0" style="font-size:52px; color:lightgray;">
                        inventory
                    </span>
                    <span class="fs-1 p-0 m-0"><?php echo e($totalProduct); ?></span>
                </div>
            </div>
            <div class="card-footer">
                <h5>Total Produk</h5>
            </div>
        </div>
        <div class="card" style="width: 250px;">
            <div class="card-body m-auto">
                <div class="d-flex gap-4 align-items-center m-auto">
                    <span class="material-icons fs-1 p-0 m-0" style="font-size:52px; color:lightgray;">
                        people
                    </span>
                    <span class="fs-1 p-0 m-0"><?php echo e($totalUser); ?></span>
                </div>
            </div>
            <div class="card-footer">
                <h5>Total User</h5>
            </div>
        </div>
    </div>

    <?php if(session('success')): ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            Swal.fire({
                title: 'Success!',
                text: '<?php echo e(session('success')); ?>',
                icon: 'success',
            });
        </script>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Footie\resources\views/admin/page/dashboard.blade.php ENDPATH**/ ?>