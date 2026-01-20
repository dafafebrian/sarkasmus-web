public function feed(Request $request)
{
    if ($request->sort == 'new') {
        $posts = Post::orderBy('created_at', 'desc')->get();
    } elseif ($request->sort == 'random') {
        $posts = Post::inRandomOrder()->get();
    } else { 
        
        $posts = Post::orderBy('likes', 'desc')->get();
    }

    return view('feed', compact('posts'));
}
