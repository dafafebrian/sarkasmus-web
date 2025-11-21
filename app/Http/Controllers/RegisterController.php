<?php

namespace App\Http\Controllers;

use App\Models\User; // Pastikan model User diimport
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Untuk meng-hash password

class RegisterController extends Controller
{
    // Metode untuk memproses data POST dari form
    public function store(Request $request)
    {
        // 1. Validasi Data Masukan
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // Cek email belum terdaftar
            'password' => 'required|string|min:8', // Password minimal 8 karakter
            
        ]);

        // 2. Membuat Record User Baru
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Password harus di-hash!
            // Simpan field tambahan ke database (sesuaikan dengan kolom di tabel users kamu)
            
        ]);

        // 3. Login Otomatis (Opsional, tapi disarankan)
        auth()->login($user); 

        // 4. Redirect ke Halaman Utama atau Dashboard
        return redirect('/')->with('success', 'Pendaftaran Berhasil! Selamat datang.');
    }
}