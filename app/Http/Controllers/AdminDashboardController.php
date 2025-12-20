<?php

namespace App\Http\Controllers;

use App\Models\Meme;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Hanya tampilkan meme yang statusnya pending
        $memes = Meme::with('user')->where('status', 'pending')->latest()->paginate(10);
        return view('admin.dashboard', compact('memes'));
    }

    public function approve($id)
    {
        $meme = Meme::findOrFail($id);
        $meme->status = 'approved';
        $meme->save();
        return back()->with('success', 'Postingan berhasil di-ACC!');
    }

    public function reject($id)
    {
        $meme = Meme::findOrFail($id);
        $meme->status = 'rejected';
        $meme->save();
        return back()->with('success', 'Postingan ditolak!');
    }
}
