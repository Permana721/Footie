<div>
    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <div><?php echo e($comment->comment); ?></div>
            <!-- Tampilkan fitur mengedit dan menghapus komentar -->
            <button wire:click="editComment(<?php echo e($comment->id); ?>)">Edit</button>
            <button wire:click="deleteComment(<?php echo e($comment->id); ?>)">Hapus</button>
            <!-- Tampilkan fitur membalas komentar -->
            <!-- Form untuk membalas komentar -->
            <form wire:submit.prevent="replyToComment(<?php echo e($comment->id); ?>)">
                <input type="text" wire:model="reply" placeholder="Balas komentar...">
                <button type="submit">Balas</button>
            </form>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->

    <!-- Form untuk menambahkan komentar -->
    <form wire:submit.prevent="addComment" action="<?php echo e(route('comment.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="text" wire:model="comment" placeholder="Tambahkan komentar...">
        <button type="submit">Kirim</button>
    </form>
</div><?php /**PATH D:\xampp\htdocs\Lahada\resources\views/livewire/comment-section.blade.php ENDPATH**/ ?>