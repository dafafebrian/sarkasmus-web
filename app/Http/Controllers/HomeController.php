<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meme; // Tambahkan ini agar bisa memanggil tabel Meme

class HomeController extends Controller
{
    public function index()
    {
        // HANYA ambil postingan yang sudah disetujui oleh admin
        $memes = Meme::where('status', 'approved')->latest()->paginate(10);
        
        // Kirim data memes ke view home
        return view('home', compact('memes'));
    }
}