@extends('pelanggan.layout.index')

@section('content')
<body style="overflow-x: hidden;">
    @foreach ($data as $p)
        <section id="prodetails" class="section-p1">
            <div class="single-pro-image">
                <img src="{{ asset('storage/product/' . $p->foto) }}" width="100%" id="MainImg" alt="">
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
                <h6><i class="fa-solid fa-location-dot"></i>   {{  $p->alamat_penjual }}</h6>
                <h4>{{ $p->nama_product }}</h4>
                <div class="relative">
                    <h2 class="harga">Rp {{ $p->harga }}</h2>
                    <div class="favorit">
                        <form action="{{ route('like', ['id' => $p->id]) }}" method="POST" class="like-form">
                            @csrf
                            <button type="submit" style="text-decoration:none; border:none; background-color:transparent;" class="like-button" data-product-id="{{ $p->id }}">
                                <span><i class="fa-solid fa-heart hati @if($p->likedBy(auth()->user())) red-heart @endif"></i> <span class="like-count">{{ $p->likes()->count() }}</span></span>
                            </button>
                        </form>
                    </div>
                </div>
                <button class="normal" onclick="window.open('{{ $p->link }}', '_blank')">Beli Sekarang</button>
                <h4>Deskripsi Produk</h4>
                    <span>
                        {{ $p->deskripsi }}
                    </span>
            </div>
        </section>

        <div class="comment-section">
            <h5>Komentar ({{ $p->comments->count() }})</h5>
            <span>{{ $p->nama_product }}</span>
            <div id="comments-container">
                @foreach($p->comments as $comment)
                    <div class="post-comment" id="post-comment-{{ $comment->id }}">
                        <div class="list">
                            <div class="user">
                                <div class="user-image"><img src="{{ asset('storage/user/' . $comment->user_foto) }}" alt="image"></div>
                                <div class="user-meta">
                                    <div class="name">{{ $comment->user_name }} {!! $comment->updated_at > $comment->created_at ? '<span class="edited">(edited)</span>' : '' !!}</div>
                                    <div class="day">{{ \Carbon\Carbon::parse($comment->created_at)->locale('id')->diffForHumans() }}</div>
                                </div>
                            </div>
        
                            <div class="comment-post">
                                <span id="comment-text-{{ $comment->id }}">{{ $comment->komentar }}</span>
                                @if ($comment->user_id === auth()->id())
                                    <div class="dropdown">
                                        <button class="dropdown" type="button" id="dropdownMenuButton-{{ $comment->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $comment->id }}">
                                            <a class="dropdown-item edit-comment-btn" href="#" data-comment-id="{{ $comment->id }}" data-comment-text="{{ $comment->komentar }}">Edit</a>
                                            <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                    <form id="edit-comment-form-{{ $comment->id }}" class="edit-comment-form d-none" action="{{ route('comments.update', $comment->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <textarea name="comment" class="edit-comment-textarea">{{ $comment->komentar }}</textarea>
                                        <button type="submit">Simpan</button>
                                        <button type="button" class="btn-cancel">Batal</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        
            <div class="comment-box">
                <div class="user" >
                    <div class="image"><img src="{{ asset('storage/user/' . Auth::user()->foto) }}" alt="image"></div>
                    <div class="name">{{ Auth::user()->name }}</div>
                </div>
                <form id="new-comment-form" action="{{ route('comments.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $p->id }}">
                    <input type="hidden" id="edit-comment-id" name="comment_id" value="">
                    <textarea name="comment" id="new-comment" placeholder="Tulis pesan anda"></textarea>
                    <button type="submit" class="comment-submit">Kirim</button>
                    <button type="button" id="cancel-edit" class="batal" style="display: none;">Batal</button>
                </form>
            </div>
        </div>
        
    <section id="product1" class="section-p1">
        @if (Auth::check())
            <h2>Pilihan Lainnya Untuk {{ Auth::user()->name }}</h2>
        @else
            <h2>Rekomendasi Produk untuk anda</h2>
        @endif
        <div class="pro-container">
            @foreach ($allProducts as $p)
                <div class="pro" onclick="window.location.href='{{ route('showDetail', [$p->id]) }}'">
                    <img src="{{ asset('storage/product/' . $p->foto) }}" alt="">
                    <div class="des">
                        <span>{{ $p->alamat_penjual }}</span>
                        <h5>{{ $p->nama_product }}</h5>
                        <h4>Rp {{ $p->harga }}</h4>
                    </div>
                    <img src="{{ $p->halal == 'halal' ? asset('assets/img/halal-haram/halal.png') : asset('assets/img/halal-haram/haram.png') }}" alt="" class="halal-logo">
                </div>
            @endforeach
        </div>
    </section>
@endforeach
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/min/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/locale/id.min.js"></script>


    <script>
        $(document).ready(function() {
        moment.locale('id');

        $('#new-comment-form').on('submit', function(e) {
            e.preventDefault();

            let commentId = $('#edit-comment-id').val();
            let url = commentId ? `/comments/${commentId}` : $(this).attr('action');
            let method = commentId ? 'PUT' : 'POST';

            $.ajax({
                type: method,
                url: url,
                data: $(this).serialize(),
                success: function(response) {
                    let comment = response.comment;
                    let createdAt = moment(comment.created_at).fromNow();
                    let edited = response.edited;

                    let newCommentHtml = `
                        <div class="post-comment" id="post-comment-${comment.id}">
                            <div class="list">
                                <div class="user">
                                    <div class="user-image"><img src="/storage/user/${comment.user_foto}" alt="image"></div>
                                    <div class="user-meta">
                                        <div class="name">${comment.user_name} ${edited ? '<span class="edited">(edited)</span>' : ''}</div>
                                        <div class="day">${createdAt}</div>
                                    </div>
                                </div>
                            
                                <div class="comment-post">
                                    <span id="comment-text-${comment.id}">${comment.komentar}</span>
                                    ${comment.user_id === {{ auth()->id() }} ? `
                                    <div class="dropdown">
                                        <button class="dropdown" type="button" id="dropdownMenuButton-${comment.id}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton-${comment.id}">
                                            <a class="dropdown-item edit-comment-btn" href="#" data-comment-id="${comment.id}" data-comment-text="${comment.komentar}">Edit</a>
                                            <form action="/comments/${comment.id}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                    ` : ''}
                                </div>
                            </div>
                        </div>
                    `;

                    if (commentId) {
                        $(`#post-comment-${comment.id}`).replaceWith(newCommentHtml);
                    } else {
                        $('#comments-container').append(newCommentHtml);
                    }

                    $('#new-comment-form')[0].reset();
                    $('#edit-comment-id').val('');
                    $('#cancel-edit').hide();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        $(document).on('click', '.edit-comment-btn', function(e) {
            e.preventDefault();

            let commentId = $(this).data('comment-id');
            let commentText = $(this).data('comment-text');
            $('.edit-comment-form').hide();
            $(`#edit-comment-form-${commentId}`).show();
            $('#new-comment').val(commentText);
            $('#edit-comment-id').val(commentId);
            $('#cancel-edit').show();
        });

        $('#cancel-edit').on('click', function() {
            $('.edit-comment-form').hide();
            $('#new-comment-form')[0].reset();
            $('#edit-comment-id').val('');
            $(this).hide();
        });
    });

        $(document).ready(function() {
            $('.like-form').on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                var button = form.find('.like-button');
                var likeCount = form.find('.like-count');
                var heartIcon = form.find('.hati');

                $.ajax({
                    type: 'POST',
                    url: form.attr('action'),
                    data: form.serialize(),
                    success: function(response) {
                        likeCount.text(response.likes);
                        if (response.liked) {
                            heartIcon.addClass('red-heart');
                        } else {
                            heartIcon.removeClass('red-heart');
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

@endsection