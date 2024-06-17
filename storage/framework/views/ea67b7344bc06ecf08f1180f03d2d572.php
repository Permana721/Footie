

<?php $__env->startSection('content'); ?>
<?php if (! (Request::has('search') || isset($hideSections))): ?>
<?php if(session('success')): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: '<?php echo e(session('success')); ?>',
            icon: 'success',
        });
    </script>
<?php endif; ?>
<?php if(session('errors')): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'Error!',
            text: '<?php echo e(session('errors')); ?>',
            icon: 'error',
        });
    </script>
<?php elseif(Auth::check() && session('login')): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'Login Berhasil !',
            text: 'Selamat Datang <?php echo e(Auth::user()->name); ?>',
            iconHtml: '<img src="<?php echo e(asset('assets/img/profil/welcome.png')); ?>">',
            customClass: {
                icon: 'welcome'
            }
        });
    </script>
<?php endif; ?>


<style>
    .welcome {
    width: 25%;
    height: 25%;
    position: relative;
    top: 110px;
    border: none;
    }
</style>

<section id="hero">
    <div class="teks">
        <h4>Footie</h4>
        <h1>E-Commerce Termurah</h1>
        <p>Temukan makanan berkualitas dengan harga terbaik di Footie.</p>
        <a href="#product1"><button>Belanja Sekarang</button></a>
    </div>
</section>
    
    <div class="kategori">
        <h2>Kategori</h2>
        <div id="feature" class="section-p1">
            <a onclick="redirectToDetail(<?php echo e(Auth::check() ? 'true' : 'false'); ?>, '<?php echo e(route('chinnese')); ?>')">
                <div class="fe-box">
                    <img src="/assets/img/fitur/china.png" alt="">
                    <h6>Chinese Food</h6>
                </div>
            </a>            
            <a onclick="redirectToDetail(<?php echo e(Auth::check() ? 'true' : 'false'); ?>, '<?php echo e(route('middle')); ?>')">
                <div class="fe-box" onclick="getProductsByCategory('middle')">
                    <img src="/assets/img/fitur/turkey.png" alt="">
                    <h6>Middle food</h6>
                </div>
            </a>
            <a onclick="redirectToDetail(<?php echo e(Auth::check() ? 'true' : 'false'); ?>, '<?php echo e(route('indonesia')); ?>')">
                <div class="fe-box" data-category="indonesia">
                    <img src="/assets/img/fitur/indonesia.png" alt="">
                    <h6>Indonesia Food</h6>
                </div>
            </a>
            <a onclick="redirectToDetail(<?php echo e(Auth::check() ? 'true' : 'false'); ?>, '<?php echo e(route('japanese')); ?>')">
                <div class="fe-box" data-category="japanese">
                    <img src="/assets/img/fitur/japan.png" alt="">
                    <h6>Japanese Food</h6>
                </div>
            </a>
            <a onclick="redirectToDetail(<?php echo e(Auth::check() ? 'true' : 'false'); ?>, '<?php echo e(route('korean')); ?>')">
                <div class="fe-box" data-category="korean">
                    <img src="/assets/img/fitur/south-korea.png" alt="">
                    <h6>Korean Food</h6>
                </div>
            </a>
            <a onclick="redirectToDetail(<?php echo e(Auth::check() ? 'true' : 'false'); ?>, '<?php echo e(route('non')); ?>')">
                <div class="fe-box" data-category="non_halal">
                    <img src="/assets/img/fitur/pig.png" alt="">
                    <h6>Non Halal</h6>
                </div>
            </a>
        </div>
    </div>
<?php endif; ?>
    
    <section id="product1" class="section-p1">
        <?php if(Auth::check()): ?>
            <h2>
                <?php if(isset($judul)): ?>
                    <div class="text-containerr">Menampilkan <?php echo e($data->count()); ?> Produk untuk kategori "<strong><?php echo e($judul); ?></strong>"</div>
                <?php else: ?>
                    <?php if(Request::has('search')): ?>
                        <div class="text-containerr">Menampilkan <?php echo e($data->count()); ?> produk untuk "<strong><?php echo e(Request::get('search')); ?></strong>"</div>
                    <?php else: ?>
                        <div class="recomen">Rekomendasi produk untuk <?php echo e(Auth::user()->name); ?></div>
                    <?php endif; ?>
                <?php endif; ?>
            </h2>
        <?php else: ?>
            <h2>
                <?php if(Request::has('search')): ?>
                    <div class="text-containerr">Menampilkan <?php echo e($data->count()); ?> produk untuk "<strong><?php echo e(Request::get('search')); ?></strong>"</div>
                <?php else: ?>
                    <div class="recomen">Rekomendasi produk untuk anda</div>
                <?php endif; ?>
            </h2>
        <?php endif; ?>
        <div class="pro-container" id="product-container">
            <?php if($data->isEmpty()): ?>
                <div class="kosong">
                    <h1>Belum ada produk</h1>
                </div>
            <?php else: ?>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="pro <?php echo e($key >= 8 ? 'd-none' : ''); ?>" onclick="redirectToDetail('<?php echo e(Auth::check()); ?>', '<?php echo e(route('showDetail', encrypt($p->id) )); ?>')" data-id="<?php echo e($p->id); ?>">
                        <img src="<?php echo e(asset('storage/product/' . $p->foto)); ?>" alt="">
                        <div class="des">
                            <span><?php echo e($p->alamat_penjual); ?></span>
                            <h5><?php echo e($p->nama_product); ?></h5>
                            <h4>Rp <?php echo e($p->harga); ?></h4>
                        </div>
                        <img src="<?php echo e($p->halal == 'halal' ? asset('assets/img/halal-haram/halal.png') : asset('assets/img/halal-haram/haram.png')); ?>" alt="" class="halal-logo">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <?php if($data->count() > 8): ?>
            <button class="loadMore" id="loadMore" data-offset="12"><strong>Muat Lebih Banyak</strong></button>
        <?php endif; ?>
    </section>

    <?php if (! (Request::has('search') || isset($hideSections))): ?>
        <?php if(Auth::check()): ?>
        <?php else: ?>
            <section id="banner" class="section-m1">
                <h4>Selamat Datang di LahAda</h4>
                <h2>Diskon Awal Bulan Hingga 70% Hanya Untuk Mu!!!</h2>
                <button class="normal" data-bs-toggle="modal" data-bs-target="#exampleModal">Gabung Sekarang</button>
                <h2></h2>
            </section>
        <?php endif; ?>
    <?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loadMoreButton = document.getElementById('loadMore');

        if (loadMoreButton) {
            loadMoreButton.addEventListener('click', function() {
                const offset = parseInt(loadMoreButton.getAttribute('data-offset'), 10);
                const products = document.querySelectorAll('.pro.d-none');
                let count = 0;

                for (let i = 0; i < products.length; i++) {
                    if (count >= 8) break;
                    products[i].classList.remove('d-none');
                    count++;
                }

                loadMoreButton.setAttribute('data-offset', offset + count);

                if (offset + count >= <?php echo e($data->count()); ?>) {
                    loadMoreButton.style.display = 'none';
                }
            });
        }
    });

    function redirectToDetail(isAuthenticated, url) {
        if (isAuthenticated) {
            window.location.href = url;
        } else {
            alert('You need to login first.');
        }
    }

    $(document).ready(function() {
        var successMessage = $('#swalContainer').data('message');
        console.log(successMessage);

        if (successMessage) {
            Swal.fire('Berhasil!', successMessage, 'success');
        }
    });

    function redirectToDetail(isLoggedIn, route) {
        if (isLoggedIn) {
            window.location.href = route;
        } else {
            Swal.fire({
                title: 'Perhatian!',
                text: 'Harap login untuk mengakses fitur',
                icon: 'warning',
            });
        }
    }

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN" : $('meta[name="csrf-token"]').attr("content"),
        }
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('pelanggan.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\Footie\resources\views/pelanggan/page/home.blade.php ENDPATH**/ ?>