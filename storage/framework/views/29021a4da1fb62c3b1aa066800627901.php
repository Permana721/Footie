<link rel="stylesheet" href="/assets/css/message.css">
<?php if(Session::has('success')): ?>
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <?php echo e(Session::get('success')); ?>

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>


<?php if(Session::has('errors')): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php echo e(Session::get('errors')); ?>

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?><?php /**PATH D:\xampp\htdocs\Lahada\resources\views/pelanggan/componen/message.blade.php ENDPATH**/ ?>