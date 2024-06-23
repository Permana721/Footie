@extends('pelanggan.layout.index')

@section('content')
@unless(Request::has('search') || isset($hideSections))
@if(session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: '{{ session('success') }}',
            icon: 'success',
        });
    </script>
@endif
@if(session('errors'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'Error!',
            text: '{{ session('errors') }}',
            icon: 'error',
        });
    </script>
@elseif (Auth::check() && session('login'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'Login Berhasil !',
            text: 'Selamat Datang {{ Auth::user()->name }}',
            iconHtml: '<img src="{{ asset('assets/img/profil/welcome.png') }}">',
            customClass: {
                icon: 'welcome'
            }
        });
    </script>
@endif


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
            <a onclick="redirectToDetail({{ Auth::check() ? 'true' : 'false' }}, '{{ route('chinnese') }}')">
                <div class="fe-box">
                    <img src="/assets/img/fitur/china.png" alt="">
                    <h6>Chinese Food</h6>
                </div>
            </a>            
            <a onclick="redirectToDetail({{ Auth::check() ? 'true' : 'false' }}, '{{ route('middle') }}')">
                <div class="fe-box" onclick="getProductsByCategory('middle')">
                    <img src="/assets/img/fitur/turkey.png" alt="">
                    <h6>Middle food</h6>
                </div>
            </a>
            <a onclick="redirectToDetail({{ Auth::check() ? 'true' : 'false' }}, '{{ route('indonesia') }}')">
                <div class="fe-box" data-category="indonesia">
                    <img src="/assets/img/fitur/indonesia.png" alt="">
                    <h6>Indonesia Food</h6>
                </div>
            </a>
            <a onclick="redirectToDetail({{ Auth::check() ? 'true' : 'false' }}, '{{ route('japanese') }}')">
                <div class="fe-box" data-category="japanese">
                    <img src="/assets/img/fitur/japan.png" alt="">
                    <h6>Japanese Food</h6>
                </div>
            </a>
            <a onclick="redirectToDetail({{ Auth::check() ? 'true' : 'false' }}, '{{ route('korean') }}')">
                <div class="fe-box" data-category="korean">
                    <img src="/assets/img/fitur/south-korea.png" alt="">
                    <h6>Korean Food</h6>
                </div>
            </a>
            <a onclick="redirectToDetail({{ Auth::check() ? 'true' : 'false' }}, '{{ route('non') }}')">
                <div class="fe-box" data-category="non_halal">
                    <img src="/assets/img/fitur/pig.png" alt="">
                    <h6>Non Halal</h6>
                </div>
            </a>
        </div>
    </div>
@endunless
    
    <section id="product1" class="section-p1">
        @if (Auth::check())
            <h2>
                @if (isset($judul))
                    <div class="text-containerr">Menampilkan {{ $data->count() }} Produk untuk kategori "<strong>{{ $judul }}</strong>"</div>
                @else
                    @if (Request::has('search'))
                        <div class="text-containerr">Menampilkan {{ $data->count() }} produk untuk "<strong>{{ Request::get('search') }}</strong>"</div>
                    @else
                        <div class="recomen">Rekomendasi produk untuk {{ Auth::user()->name }}</div>
                    @endif
                @endif
            </h2>
        @else
            <h2>
                @if (Request::has('search'))
                    <div class="text-containerr">Menampilkan {{ $data->count() }} produk untuk "<strong>{{ Request::get('search') }}</strong>"</div>
                @else
                    <div class="recomen">Rekomendasi produk untuk anda</div>
                @endif
            </h2>
        @endif
        <div class="pro-container" id="product-container">
            @if ($data->isEmpty())
                <div class="kosong">
                    <h1>Belum ada produk</h1>
                </div>
            @else
                @foreach ($data as $key => $p)
                    <div class="pro {{ $key >= 8 ? 'd-none' : '' }}" onclick="redirectToDetail('{{ Auth::check() }}', '{{ route('showDetail', [ $p->id ]) }}', '{{ $p->nama_product }}', '{{ asset('storage/product/' . $p->foto) }}')" data-id="{{ $p->id }}">
                        <img src="{{ asset('storage/product/' . $p->foto) }}" alt="">
                        <div class="des">
                            <span>{{ $p->alamat_penjual }}</span>
                            <h5>{{ $p->nama_product }}</h5>
                            <h4>Rp {{ $p->harga }}</h4>
                        </div>
                        <img src="{{ $p->halal == 'halal' ? asset('assets/img/halal-haram/halal.png') : asset('assets/img/halal-haram/haram.png') }}" alt="" class="halal-logo">
                    </div>
                @endforeach
            @endif
        </div>
        @if ($data->count() > 8)
            <button class="loadMore" id="loadMore" data-offset="12"><strong>Muat Lebih Banyak</strong></button>
        @endif
    </section>

    @unless(Request::has('search') || isset($hideSections))
        @if (Auth::check())
        @else
            <section id="banner" class="section-m1">
                <h4>Selamat Datang di LahAda</h4>
                <h2>Diskon Awal Bulan Hingga 70% Hanya Untuk Mu!!!</h2>
                <button class="normal" data-bs-toggle="modal" data-bs-target="#exampleModal">Gabung Sekarang</button>
                <h2></h2>
            </section>
        @endif
    @endunless

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

                if (offset + count >= {{ $data->count() }}) {
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

@endsection