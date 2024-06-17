<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request, $id)
    {
        $user_id = auth()->user()->id;
        $existing_like = Like::where('product_id', $id)
                            ->where('user_id', $user_id)
                            ->first();

        $liked = false;
        if ($existing_like) {
            $existing_like->delete();
        } else {
            Like::create([
                'product_id' => $id,
                'user_id' => $user_id
            ]);
            $liked = true;
        }

        $totalLikes = Like::where('product_id', $id)->count();

        return response()->json(['likes' => $totalLikes, 'liked' => $liked]);
    }
}
