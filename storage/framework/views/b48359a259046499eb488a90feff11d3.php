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
                <input type="search" placeholder="Cari di LahAda" class="navbar-form-search" name="search" value="<?php echo e(Request::get('search')); ?>" aria-label="search" id="search-input" autocomplete="off">
                <button class="navbar-form-btn transparent-button" type="submit">
                    <li><i class="fa-solid fa-magnifying-glass kaca"></i></li>
                </button>
            </form>
            
            <!-- History Container -->
            <div class="history-container" id="history-container" style="display: none;">
                <h3>Terakhir Dicari</h3>
                <ul id="history-list"><span id="histori-list"></span></ul>
                
                <h3>Terakhir Dilihat</h3>
                <div id="recent-viewed-list"></div>
            </div>
            
            <!-- Autocomplete Suggestions -->
            <ul id="autocomplete-suggestions" class="autocomplete-suggestions"></ul>
            
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
                        <li><img src="/assets/img/logo/log-out.png"><a href="<?php echo e(route('logout.pelanggan')); ?>">Keluar</a></li>
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
                <input type="search" placeholder="Cari di LahAda" class="navbar-form-search" name="search" value="<?php echo e(Request::get('search')); ?>" aria-label="search" id="search-input">
                <button class="navbar-form-btn transparent-button" type="submit">
                    <li><i class="fa-solid fa-magnifying-glass kaca"></i></li>
                </button>
            </form>
            
            <!-- History Container -->
            <div class="history-container" id="history-container">
                <h3>Terakhir Dicari</h3>
                <ul id="history-list"></ul>
                <button id="clear-history">Hapus Semua</button>
                
                <h3>Terakhir Dilihat</h3>
                <div id="recent-viewed-list"></div>
            </div>
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
                        <li><img src="/assets/img/logo/log-out.png"><a href="<?php echo e(route('logout.pelanggan')); ?>">Keluar</a></li>
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
            <input type="search" placeholder="Cari di LahAda" class="navbar-form-search" name="search" value="<?php echo e(Request::get('search')); ?>" aria-label="search" id="search-input">
            <button class="navbar-form-btn transparent-button" type="submit">
                <li><i class="fa-solid fa-magnifying-glass kaca"></i></li>
            </button>
        </form>
        
        <!-- History Container -->
        <div class="history-container" id="history-container">
            <h3>Terakhir Dicari</h3>
            <ul id="history-list"></ul>
            <button id="clear-history">Hapus Semua</button>
            
            <h3>Terakhir Dilihat</h3>
            <div id="recent-viewed-list"></div>
        </div>
            <button type="button" class="normall" data-bs-toggle="modal" data-bs-target="#exampleModal">Masuk</button>
            <button type="button" class="normal1" data-bs-toggle="modal" data-bs-target="#registerModal">Daftar</button>
    <?php endif; ?>

<script>
    function menuToggle(){
            const toggleMenu = document.querySelector('.menu');
            toggleMenu.classList.toggle('active')
        }

        document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const historyContainer = document.getElementById('history-container');

    // Show history-container when search bar is clicked
    searchInput.addEventListener('click', function(event) {
        loadSearchHistory();
        historyContainer.style.display = 'block';
        event.stopPropagation(); // Prevent event from propagating to document
    });

    // Hide history-container when clicking outside of it
    document.addEventListener('click', function() {
        historyContainer.style.display = 'none';
    });

    // Prevent closing when clicking inside the history container
    historyContainer.addEventListener('click', function(event) {
        event.stopPropagation(); // Prevent event from propagating to document
    });

    // Show autocomplete suggestions while typing
    searchInput.addEventListener('input', function() {
        loadSearchHistory(this.value);
    });

    // Load search and viewed history from local storage
    loadSearchHistory();
    loadViewedHistory();

    // Function to redirect and save to history
    window.redirectToDetail = function(isAuthenticated, url, productName, productImage) {
        if (isAuthenticated) {
            saveToSearchHistory(productName);
            saveToViewedHistory(productName, productImage, url);
            window.location.href = url;
        } else {
            alert('Anda harus login terlebih dahulu.');
        }
    };

    // Save search term to local storage
    function saveToSearchHistory(term) {
        let history = JSON.parse(localStorage.getItem('searchHistory')) || [];
        if (!history.includes(term)) {
            history.push(term);
            if (history.length > 5) history.shift(); // Keep only latest 5 items
            localStorage.setItem('searchHistory', JSON.stringify(history));
            loadSearchHistory();
        }
    }

    // Load search history from local storage
    function loadSearchHistory(query = '') {
        let history = JSON.parse(localStorage.getItem('searchHistory')) || [];
        let historyList = document.getElementById('history-list');
        historyList.innerHTML = '';

        history
            .filter(item => item.toLowerCase().includes(query.toLowerCase()))
            .forEach(item => {
                let li = document.createElement('li');

                // Create span for the search term
                let span = document.createElement('span');
                span.textContent = item;
                span.onclick = function() {
                    searchInput.value = item;
                    document.querySelector('.navbar-form').submit();
                };

                // Create delete button
                let deleteButton = document.createElement('button');
                deleteButton.innerHTML = '&times;';
                deleteButton.className = 'delete-button';
                deleteButton.onclick = function(event) {
                    event.stopPropagation();
                    removeFromSearchHistory(item);
                };

                li.appendChild(span);
                li.appendChild(deleteButton);
                historyList.appendChild(li);
            });
    }

    // Remove item from search history
    function removeFromSearchHistory(term) {
        let history = JSON.parse(localStorage.getItem('searchHistory')) || [];
        history = history.filter(item => item !== term);
        localStorage.setItem('searchHistory', JSON.stringify(history));
        loadSearchHistory();
    }

    // Save viewed product to local storage
    function saveToViewedHistory(name, image, url) {
        let history = JSON.parse(localStorage.getItem('viewedHistory')) || [];
        history.push({ name, image, url });
        if (history.length > 5) history.shift(); // Keep only latest 5 items
        localStorage.setItem('viewedHistory', JSON.stringify(history));
        loadViewedHistory();
    }

    // Load viewed history from local storage
    function loadViewedHistory() {
        let history = JSON.parse(localStorage.getItem('viewedHistory')) || [];
        let viewedList = document.getElementById('recent-viewed-list');
        viewedList.innerHTML = '';
        history.forEach(item => {
            let img = document.createElement('img');
            img.src = item.image;
            img.alt = item.name;
            img.onclick = function() {
                window.location.href = item.url;
            };
            viewedList.appendChild(img);
        });
    }
});




</script>

</section>
<?php /**PATH D:\laragon\www\Footie\resources\views/pelanggan/componen/navbar.blade.php ENDPATH**/ ?>