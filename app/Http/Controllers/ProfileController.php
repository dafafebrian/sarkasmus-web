<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Meme;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $memes = Meme::where('user_id', $user->id)->latest()->paginate(10);
        return view('profile.dashboard', compact('user', 'memes'));
    }
}
