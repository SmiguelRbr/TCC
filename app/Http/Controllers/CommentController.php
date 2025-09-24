<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $post->comments()->create([
            'user_id' => Auth::id(),
            'content' => $request->input('content'),
        ]);

        return back();
    }

    public function destroy(Comment $comment)
    {
        // Verifica se o usuário é dono do comentário
        if ($comment->user_id === Auth::id()) {
            $comment->delete();
        }

        return back();
    }
}
