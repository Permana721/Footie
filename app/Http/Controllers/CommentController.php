<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string',
            'product_id' => 'required|exists:products,id',
        ]);

        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->product_id = $request->product_id;
        $comment->user_name = auth()->user()->name;
        $comment->user_foto = auth()->user()->foto;
        $comment->komentar = $request->comment;
        $comment->save();

        return back();
    }

    public function update(Request $request, $id) {
        $comment = Comment::findOrFail($id);
        $comment->komentar = $request->input('comment');
        $comment->save();
    
        return redirect()->back();
    }

    
public function destroy(Comment $comment)
{
    if ($comment->user_id !== auth()->id()) {
        return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus komentar ini.');
    }

    $comment->delete();

    return redirect()->back();
}

}
