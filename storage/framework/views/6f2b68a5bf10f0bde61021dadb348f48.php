

<?php $__env->startSection('comment'); ?>
<div class="comment-section">
    <h5>Komentar (2)</h5>
    <span><?php echo e($p->nama_product); ?></span>
    <div class="post-comment">
        <div class="list">
            <div class="user">
                <div class="user-image"><img src="../img/image-comment/Ganjar.jpg" alt="image"></div>
                <div class="user-meta">
                    <div class="name">Homelander</div>
                    <div class="day">10 hari lalu</div>
                </div>
            </div>
            <div class="comment-post">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae fuga officiis voluptatibus placeat voluptatem alias ullam.</div>
        </div>
        <div class="list">
            <div class="user">
                <div class="user-image"><img src="../img/image-comment/ijul.jpg" alt="image"></div>
                <div class="user-meta">
                    <div class="name">Wolf Thrifting</div>
                    <div class="day">14 hari lalu</div>
                </div>
            </div>
            <div class="comment-post">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae fuga officiis voluptatibus placeat voluptatem alias ullam.</div>
        </div>
    </div>
    <div class="comment-box">
        <div class="user">
            <div class="image"><img src="<?php echo e(asset('storage/user/' . Auth::user()->foto)); ?>" alt="image"></div>
            <div class="name"><?php echo e(Auth::user()->name); ?></div>
        </div>
        <form action="" method="post">
            <textarea name="comment" id="" placeholder="Tulis pesan anda"></textarea>
            <button class="comment-submit">Kirim</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pelanggan.page.produk', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Lahada\resources\views/pelanggan/componen/comment.blade.php ENDPATH**/ ?>