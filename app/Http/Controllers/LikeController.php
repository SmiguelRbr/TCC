<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle(Post $post)
    {
        $user = Auth::user();

        // Verifica se o usuário já curtiu o post
        $like = $post->likes()->where('user_id', $user->id)->first();

        if ($like) {
            // Se já curtiu, remove
            $like->delete();
        } else {
            // Se não curtiu, adiciona
            $post->likes()->create([
                'user_id' => $user->id,
            ]);
        }

        return back();
    }
}
