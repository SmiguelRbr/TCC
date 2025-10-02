<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule; // <-- A linha importante está aqui!

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with(['user', 'likes', 'comments.user'])
            ->latest()
            ->get();

        return view('post', compact('posts'));
    }

    public function store(Request $request)
    {
        // A validação com 'Rule' agora funcionará corretamente
        $validated = $request->validate([
            'content'         => ['nullable', 'string', 'max:2000', Rule::requiredIf($request->type !== 'artigo')],
            'image'           => 'nullable|image|max:2048',
            'badge'           => 'nullable|string|max:255',
            'type'            => 'required|in:foto,conquista,progresso,pergunta,dica,video,artigo',
            
            'video_url'       => ['nullable', 'url', 'max:255', Rule::requiredIf($request->type === 'video')],
            'article_title'   => ['nullable', 'string', 'max:255', Rule::requiredIf($request->type === 'artigo')],
            'article_content' => ['nullable', 'string', 'max:10000', Rule::requiredIf($request->type === 'artigo')],
        ]);

        $imageUrl = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $imageUrl = 'storage/' . $path;
        }

        $content = ($validated['type'] === 'artigo') ? $validated['article_content'] : $validated['content'];

        Post::create([
            'user_id'       => Auth::id(),
            'content'       => $content,
            'image_url'     => $imageUrl,
            'badge'         => $validated['badge'] ?? null,
            'type'          => $validated['type'],
            'video_url'     => $validated['video_url'] ?? null,
            'article_title' => $validated['article_title'] ?? null,
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
        $liked = false;

        $like = $post->likes()->where('user_id', $user->id)->first();

        if ($like) {
            $like->delete();
            $liked = false;
        } else {
            $post->likes()->create(['user_id' => $user->id]);
            $liked = true;
        }

        return response()->json([
            'liked' => $liked,
            'likes_count' => $post->fresh()->likes->count()
        ]);
    }

    public static function getYouTubeId($url)
    {
        if (!$url) return null;
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
        return $match[1] ?? null;
    }
}