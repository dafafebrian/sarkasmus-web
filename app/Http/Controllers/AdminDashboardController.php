<?php

namespace App\Http\Controllers;

use App\Models\Meme;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Tampilkan semua meme yang statusnya pending atau approved
        $memes = Meme::with('user')->whereIn('status', ['pending', 'approved'])->latest()->paginate(10);
        return view('admin.dashboard', compact('memes'));
    }
    public function destroy($id)
    {
        $meme = Meme::findOrFail($id);
        $meme->delete();
        return back()->with('success', 'Postingan berhasil dihapus!');
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
