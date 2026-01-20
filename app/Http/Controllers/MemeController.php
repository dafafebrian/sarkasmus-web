<?php

namespace App\Http\Controllers;

use App\Models\Meme;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemeController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth', ['only' => ['deleteComment', 'destroy']]);
    }

    public function index()
    {
        $memes = Meme::with(['user', 'comments.user', 'likes'])
            ->where('status', 'approved')
            ->latest()
            ->paginate(10);

        if (request()->ajax()) {
            return view('meme.partials.list', compact('memes'));
        }

        return view('meme.feed', compact('memes'));
    }

    public function create()
    {
        return view('meme.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'caption' => 'nullable|string|max:500',
            'anonymous_name' => 'nullable|string|max:50',
        ]);

        
        if (!$request->caption && !$request->file('image')) {
            return back()->withErrors(['content' => 'Tulisan atau gambar harus diisi!']);
        }

        $imagePath = null;
        if ($request->file('image')) {
            $imagePath = $request->file('image')->store('memes', 'public');
        }

        Meme::create([
            'user_id' => Auth::check() ? Auth::id() : null,
            'image_path' => $imagePath,
            'caption' => $request->caption,
            'anonymous_name' => $request->anonymous_name ?: 'Anonymous',
            'status' => 'pending',
        ]);

        return redirect('/feed')->with('success', 'Postingan berhasil dibagikan!');
    }

    public function show(Meme $meme)
    {
        $meme->load(['user', 'comments.user', 'likes']);
        return view('meme.show', compact('meme'));
    }

    public function destroy(Meme $meme)
    {
        if ($meme->user_id !== Auth::id()) {
            abort(403);
        }

        $meme->delete();
        return back()->with('success', 'Meme berhasil dihapus!');
    }

    public function toggleLike(Request $request, Meme $meme)
    {
        
        $userId = Auth::check() ? Auth::id() : null;

        if ($userId) {
            $like = Like::where('meme_id', $meme->id)->where('user_id', $userId)->first();
        } else {
            
            $like = Like::where('meme_id', $meme->id)->whereNull('user_id')->first();
        }

        $liked = false;
        if ($like) {
            $like->delete();
            $meme->decrement('likes_count');
            $liked = false;
        } else {
            Like::create([
                'meme_id' => $meme->id,
                'user_id' => $userId,
            ]);
            $meme->increment('likes_count');
            $liked = true;
        }

        
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'likes_count' => $meme->likes_count,
                'liked' => $liked,
            ]);
        }

        return back();
    }

    public function addComment(Request $request, Meme $meme)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        Comment::create([
            'meme_id' => $meme->id,
            'user_id' => Auth::check() ? Auth::id() : null,
            'content' => $request->get('content'),
        ]);

        $meme->increment('comments_count');

        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }

    public function deleteComment(Comment $comment)
    {
        if ($comment->user_id !== Auth::id()) {
            abort(403);
        }

        $comment->meme->decrement('comments_count');
        $comment->delete();

        return back()->with('success', 'Komentar berhasil dihapus!');
    }
}
