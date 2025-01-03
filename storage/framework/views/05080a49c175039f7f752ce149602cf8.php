<section id="header">
    <?php if(auth()->guard()->check()): ?>
        <?php if(Auth::user()->role == 1): ?>
            <a href="<?php echo e(route('home')); ?>"><img src="/assets/img/logo/logo.png" id="logo-link" class="logo-atas" alt="" style="cursor: pointer;"></a>
            <ul id="navbar">
                <li><a class="eli" href="<?php echo e(url('/about')); ?>" target="_blank">TentangLahada</a></li>
                <li><a class="eli" href="https://wa.me/+6285724099673?text=Halo%20min,%20saya%20butuh%20bantuan" target="_blank">Bantuan</a></li>
                <li><a class="eli" href="https://www.tokopedia.com/discovery/deals" target="_blank">Promo</a></li>
                <li><a class="eli" href="https://www.tokopedia.com/order-list?status=dikirim" target="_blank">LacakPesanan</a></li>
            </ul>
            <form action="<?php echo e(url('/search')); ?>" class="navbar-form">
                <input type="search" placeholder="Cari di LahAda" class="navbar-form-search" name="search" value="<?php echo e(Request::get('search')); ?>" aria-label="search">
                <button class="navbar-form-btn transparent-button" type="<?php echo e(Request::get('search') ? 'submit' : 'button'); ?>" >
                    <li><i class="fa-solid fa-magnifying-glass kaca"></i></li>
                </button>
            </form>
            <div class="action">
                <div class="profile" onclick="menuToggle();">
                    <img src="<?php echo e(asset('storage/user/' . Auth::user()->foto)); ?>">
                </div>
                <p class="ac-name" onclick="menuToggle();"><?php echo e(Auth::user()->name); ?></p>
                <div class="menu">
                    <h3><?php echo e(Auth::user()->name); ?><br><span>
                    Admin
                    </span></h3>
                    <ul>
                        <li><img src="/assets/img/logo/change-account.png"><a data-bs-toggle="modal" style="cursor: pointer;" data-bs-target="#gantiModal">Ganti Akun</a></li>
                        
                        <li><img src="/assets/img/logo/question.png"><a href="https://wa.me/+6285724099673?text=Halo%20min,%20saya%20butuh%20bantuan" target="_blank">Bantuan</a></li>
                        <li><img src="/assets/img/logo/admin.png"><a href="/admin/dashboard">Halaman Admin</a></li>
                        <li><img src="/assets/img/logo/log-out.png"><a href="logout_pelanggan">Keluar</a></li>
                    </ul>
                </div>
            </div>
                

        <?php elseif(Auth::user()->role == 2): ?>
            <a href="<?php echo e(route('home')); ?>"><img src="/assets/img/logo/logo.png" id="logo-link" class="logo-atas" alt="" style="cursor: pointer;"></a>
            <ul id="navbar">
                <li><a class="eli" href="<?php echo e(url('/about')); ?>" target="_blank">TentangLahada</a></li>
                <li><a class="eli" href="https://wa.me/+6285724099673?text=Halo%20min,%20saya%20butuh%20bantuan" target="_blank">Bantuan</a></li>
                <li><a class="eli" href="https://www.tokopedia.com/discovery/deals" target="_blank">Promo</a></li>
                <li><a class="eli" href="https://www.tokopedia.com/order-list?status=dikirim" target="_blank">LacakPesanan</a></li>
            </ul>
            <form action="<?php echo e(url('/search')); ?>" class="navbar-form">
                <input type="search" placeholder="Cari di LahAda" class="navbar-form-search" name="search" value="<?php echo e(Request::get('search')); ?>" aria-label="search">
                <button class="navbar-form-btn transparent-button" type="<?php echo e(Request::get('search') ? 'submit' : 'button'); ?>" >
                    <li><i class="fa-solid fa-magnifying-glass kaca"></i></li>
                </button>
            </form>
            <div class="action">
                <div class="profile" onclick="menuToggle();">
                    <img src="<?php echo e(asset('storage/user/' . Auth::user()->foto)); ?>">
                </div>
                <p class="ac-name" onclick="menuToggle();"><?php echo e(Auth::user()->name); ?></p>
                <div class="menu">
                    <h3><?php echo e(Auth::user()->name); ?><br><span>
                    User
                    </span></h3>
                    <ul>
                        <li><img src="/assets/img/logo/change-account.png"><a data-bs-toggle="modal" style="cursor: pointer;" data-bs-target="#gantiModal">Ganti Akun</a></li>
                        
                        <li><img src="/assets/img/logo/question.png"><a href="https://wa.me/+6285724099673?text=Halo%20min,%20saya%20butuh%20bantuan" target="_blank">Bantuan</a></li>
                        <li><img src="/assets/img/logo/log-out.png"><a href="logout_pelanggan">Keluar</a></li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php if(auth()->guard()->guest()): ?>
        <a href="<?php echo e(route('home')); ?>"><img src="/assets/img/logo/logo.png" id="logo-link" class="logo-atas-guest" alt="" style="cursor: pointer;"></a>
        <ul id="navbar">
            <li><a class="eli-guest" href="<?php echo e(url('/about')); ?>" target="_blank">TentangLahada</a></li>
            <li><a class="eli-guest" href="https://wa.me/+6285724099673?text=Halo%20min,%20saya%20butuh%20bantuan" target="_blank">Bantuan</a></li>
            <li><a class="eli-guest" href="https://www.tokopedia.com/discovery/deals" target="_blank">Promo</a></li>
            <li><a class="eli-guest" href="https://www.tokopedia.com/order-list?status=dikirim" target="_blank">LacakPesanan</a></li>
        </ul>
        <form action="<?php echo e(url('/search')); ?>" class="navbar-form">
            <input type="search" placeholder="Cari di LahAda" class="navbar-form-search-guest" name="search" value="<?php echo e(Request::get('search')); ?>" aria-label="search">
            <button class="navbar-form-btn transparent-button" type="<?php echo e(Request::get('search') ? 'submit' : 'button'); ?>" >
                <li><i class="fa-solid fa-magnifying-glass kaca-guest"></i></li>
            </button>
        </form>
            <button type="button" class="normall" data-bs-toggle="modal" data-bs-target="#exampleModal">Masuk</button>
            <button type="button" class="normal1" data-bs-toggle="modal" data-bs-target="#registerModal">Daftar</button>
    <?php endif; ?>

<script>
    function menuToggle(){
            const toggleMenu = document.querySelector('.menu');
            toggleMenu.classList.toggle('active')
        }
</script>

</section>
<?php /**PATH D:\xampp\htdocs\Footie\resources\views/pelanggan/componen/navbar.blade.php ENDPATH**/ ?>