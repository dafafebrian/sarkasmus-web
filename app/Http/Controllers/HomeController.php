<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meme;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'new');

        $query = Meme::with(['user', 'comments.user', 'likes'])
            ->where('status', 'approved');
        
        if ($sort === 'hot') {
            $query->orderBy(DB::raw('likes_count + comments_count'), 'DESC');
        } else {
            $query->latest();
        }

        $memes = $query->paginate(10);
        
        if ($request->ajax()) {
            return view('meme.partials.list', compact('memes'));
        }

        
        return view('home', compact('memes', 'sort'));
    }
}