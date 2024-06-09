<link rel="stylesheet" href="/assets/css/message.css">
<?php if(Session::has('success')): ?>
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <?php echo e(Session::get('success')); ?>

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>


<?php if($errors->any()): ?>
    <div class="pt-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($data); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Lahada\resources\views/pelanggan/componen/message.blade.php ENDPATH**/ ?>