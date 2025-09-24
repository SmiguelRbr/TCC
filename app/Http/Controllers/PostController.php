<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with([
            'user',
            'likes',
            'comments.user' // carrega o autor de cada comentário
        ])->latest()->get();

        return view('post', compact('posts'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content'    => 'required|string|max:1000',
            'image'      => 'nullable|image|max:2048', // Corrigido para lidar com arquivo
            'badge'      => 'nullable|string|max:255',
            'type'       => 'required|in:foto,conquista,progresso,pergunta,dica',
        ]);

        $imageUrl = null;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $imageUrl = 'storage/' . $path;
        }

        Post::create([
            'user_id'   => Auth::id(),
            'content'   => $validated['content'],
            'image_url' => $imageUrl, // aqui usamos a imagem do upload
            'badge'     => $validated['badge'] ?? null,
            'type'      => $validated['type'],
        ]);

        return redirect()->back()->with('success', 'Post publicado com sucesso!');
    }



    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $post->delete();

        return redirect()->back()->with('success', 'Post removido com sucesso.');
    }

    public function likeAjax(Post $post)
{
    $user = Auth::user();

    if ($post->likes()->where('user_id', $user->id)->exists()) {
        $post->likes()->where('user_id', $user->id)->delete();
        $liked = false;
    } else {
        $post->likes()->create([
            'user_id' => $user->id,
        ]);
        $liked = true;
    }

    return response()->json([
        'liked' => $liked,
        'likes_count' => $post->likes()->count(),
    ]);
}

}
