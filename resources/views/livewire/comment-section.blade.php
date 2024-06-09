<div>
    @foreach($comments as $comment)
        <div>
            <div>{{ $comment->comment }}</div>
            <!-- Tampilkan fitur mengedit dan menghapus komentar -->
            <button wire:click="editComment({{ $comment->id }})">Edit</button>
            <button wire:click="deleteComment({{ $comment->id }})">Hapus</button>
            <!-- Tampilkan fitur membalas komentar -->
            <!-- Form untuk membalas komentar -->
            <form wire:submit.prevent="replyToComment({{ $comment->id }})">
                <input type="text" wire:model="reply" placeholder="Balas komentar...">
                <button type="submit">Balas</button>
            </form>
        </div>
    @endforeach

    <!-- Form untuk menambahkan komentar -->
    <form wire:submit.prevent="addComment" action="{{ route('comment.store') }}" method="POST">
        @csrf
        <input type="text" wire:model="comment" placeholder="Tambahkan komentar...">
        <button type="submit">Kirim</button>
    </form>
</div>