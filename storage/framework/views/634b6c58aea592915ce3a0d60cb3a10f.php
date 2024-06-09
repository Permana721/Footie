

<?php $__env->startSection('content'); ?>

<section id="product1" class="section-r1">
    <div class="pro-container" style="position: relative; top: 10px;">
        <?php if(isset($title)): ?>
            <h5 class="category-info">Menampilkan <?php echo e($allProducts->count()); ?> Produk untuk kategori "<strong><?php echo e($title); ?></strong>"</h5>
        <?php endif; ?>
        <?php $__currentLoopData = $allProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="pro" onclick="redirectToDetail('<?php echo e(Auth::check()); ?>', '<?php echo e(route('showDetail', $p->id)); ?>')">
            <img src="<?php echo e(asset('storage/product/' . $p->foto)); ?>" alt="">
            <div class="des">
                <span><?php echo e($p->alamat_penjual); ?></span>
                <h5><?php echo e($p->nama_product); ?></h5>
                <h4>Rp <?php echo e($p->harga); ?></h4>
            </div>
            <img src="<?php echo e($p->halal == 'halal' ? asset('assets/img/halal-haram/halal.png') : asset('assets/img/halal-haram/haram.png')); ?>" alt="" class="halal-logo">
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>

<script>
    function redirectToDetail(isLoggedIn, route) {
        if (isLoggedIn) {
            window.location.href = route;
        } else {
            alert("Harap login untuk mengakses fitur");
        }
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('pelanggan.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Lahada\resources\views/pelanggan/page/shop.blade.php ENDPATH**/ ?>