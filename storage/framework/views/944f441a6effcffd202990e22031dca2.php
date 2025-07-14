

<?php $__env->startSection('content'); ?>
<body style="overflow-x: hidden;">
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <section id="prodetails" class="section-p1">
            <div class="single-pro-image">
                <img src="<?php echo e(asset('storage/product/' . $p->foto)); ?>" width="100%" id="MainImg" alt="">
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="../img/produk/toppoki.jpg" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="../img/produk/topoki2.jpg" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="../img/produk/halal-topoki.jpg" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="../img/produk/topoki3.jpg" width="100%" class="small-img" alt="">
                    </div>
                </div>
            </div>
        
            <div class="single-pro-details">
                <h6><i class="fa-solid fa-location-dot"></i>   <?php echo e($p->alamat_penjual); ?></h6>
                <h4><?php echo e($p->nama_product); ?></h4>
                <h2>Rp <?php echo e($p->harga); ?></h2>
                <div class="favorit">
                    <form action="<?php echo e(route('like', ['id' => $p->id])); ?>" method="POST" class="like-form">
                        <?php echo csrf_field(); ?>
                        <button type="submit" style="text-decoration:none; border:none; background-color:transparent;" class="like-button" data-product-id="<?php echo e($p->id); ?>">
                            <span><i class="fa-solid fa-heart hati <?php if($p->likedBy(auth()->user())): ?> red-heart <?php endif; ?>"></i> <span class="like-count"><?php echo e($p->likes()->count()); ?></span> </span>
                        </button>
                    </form>
                </div>
                <button class="normal" onclick="window.open('<?php echo e($p->link); ?>', '_blank')">Beli Sekarang</button>
                <h4>Deskripsi Produk</h4>
                    <span>
                        <?php echo e($p->deskripsi); ?>

                    </span>
            </div>
        </section>

        <div class="comment-section">
            <h5>Komentar (<?php echo e($p->comments->count()); ?>)</h5>
            <span><?php echo e($p->nama_product); ?></span>
            <?php $__currentLoopData = $p->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="post-comment">
                    <div class="list">
                        <div class="user">
                            <div class="user-image"><img src="<?php echo e(asset('storage/user/' . $comment->user_foto)); ?>" alt="image"></div>
                            <div class="user-meta">
                                <div class="name"><?php echo e($comment->user_name); ?></div>
                                <div class="day"><?php echo e(\Carbon\Carbon::parse($comment->created_at)->locale('id')->diffForHumans()); ?></div>
                            </div>
                        </div>
                    
                        <div class="comment-post">
                            <span id="comment-text-<?php echo e($comment->id); ?>"><?php echo e($comment->komentar); ?></span>
                            <?php if($comment->user_id === auth()->id()): ?>
                                <div class="dropdown">
                                    <button class="dropdown" type="button" id="dropdownMenuButton-<?php echo e($comment->id); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton-<?php echo e($comment->id); ?>">
                                        <a class="dropdown-item edit-comment-btn" href="#" data-comment-id="<?php echo e($comment->id); ?>">Edit</a>
                                        <form action="<?php echo e(route('comments.destroy', $comment->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="dropdown-item">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                                <form id="edit-comment-form-<?php echo e($comment->id); ?>" class="edit-comment-form" action="<?php echo e(route('comments.update', $comment->id)); ?>" method="post" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <textarea name="comment" class="edit-comment-textarea"><?php echo e($comment->komentar); ?></textarea>
                                    <button type="submit">Simpan</button>
                                    <button type="button" class="btn-cancel">Batal</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="comment-box">
                <div class="user">
                    <div class="image"><img src="<?php echo e(asset('storage/user/' . Auth::user()->foto)); ?>" alt="image"></div>
                    <div class="name"><?php echo e(Auth::user()->name); ?></div>
                </div>
                <form id="new-comment-form" action="<?php echo e(route('comments.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="product_id" value="<?php echo e($p->id); ?>">
                    <textarea name="comment" id="new-comment" placeholder="Tulis pesan anda"></textarea>
                    <button type="submit" class="comment-submit">Kirim</button>
                </form>
            </div>
        </div>
        

    <section id="product1" class="section-p1">
        <?php if(Auth::check()): ?>
            <h2>Pilihan Lainnya Untuk <?php echo e(Auth::user()->name); ?></h2>
        <?php else: ?>
            <h2>Rekomendasi Produk untuk anda</h2>
        <?php endif; ?>
        <div class="pro-container">
            <?php $__currentLoopData = $allProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="pro" onclick="window.location.href='<?php echo e(route('showDetail', encrypt($p->id))); ?>'">
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        var MainImg = document.getElementById("MainImg");
        var smallimg = document.getElementsByClassName("small-img");

        smallimg[0].onclick = function(){
            MainImg.src = smallimg[0].src;
        }
        smallimg[1].onclick = function(){
            MainImg.src = smallimg[1].src;
        }
        smallimg[2].onclick = function(){
            MainImg.src = smallimg[2].src;
        }
        smallimg[3].onclick = function(){
            MainImg.src = smallimg[3].src;
        }

        $(document).ready(function() {
        $('.like-form').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var button = form.find('.like-button');
            var likeCount = form.find('.like-count');
            
            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: form.serialize(),
                success: function(response) {
                    likeCount.text(response.likes);
                    if (response.liked) {
                        button.span.i.find('.hati').addStyle('red-heart');
                    } else {
                        button.span.i.find('.hati').removeClass('red-heart');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.edit-comment-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const commentId = this.getAttribute('data-comment-id');
                    document.getElementById(`comment-text-${commentId}`).style.display = 'none';
                    document.getElementById(`edit-comment-form-${commentId}`).style.display = 'block';
                });
            });
        });

        document.querySelectorAll('.btn-cancel').forEach(btn => {
        btn.addEventListener('click', function(event) {
        event.preventDefault();
        event.stopPropagation(); 
        const commentId = this.closest('.edit-comment-form').getAttribute('id').replace('edit-comment-form-', '');
        document.getElementById(`comment-text-${commentId}`).style.display = 'block';
        document.getElementById(`edit-comment-form-${commentId}`).style.display = 'none';
        document.querySelector(`#dropdownMenuButton-${commentId}`).style.top = '';
        document.querySelector(`.edit-dropdown[data-comment-id="${commentId}"]`).style.top = '';
    });
});

        $(document).ready(function() {
        $('.dropdown-toggle').dropdown();
    });

    document.querySelectorAll('.edit-comment-btn').forEach(btn => {
        btn.addEventListener('click', function(event) {
            event.preventDefault();
            const commentId = this.getAttribute('data-comment-id');
            document.querySelector(`#dropdownMenuButton-${commentId}`).style.top = '1px';
            document.querySelector(`.edit-dropdown[data-comment-id="${commentId}"]`).style.top = '0';
        });
    });
    </script>

</body>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('pelanggan.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Lahada\resources\views/pelanggan/page/produk.blade.php ENDPATH**/ ?>