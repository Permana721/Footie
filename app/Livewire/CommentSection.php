<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;

class CommentSection extends Component
{
    public $comments;

    public function render()
    {
        $this->comments = Comment::all(); // Adjust this query according to your logic
        return view('livewire.comment-section');
    }
}
