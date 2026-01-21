@extends('layouts.app')

@section('title', 'FAQ')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">FAQ (Frequently Asked Questions)</h1>
    <div class="mb-3">
        <h5>Bagaimana cara membuat akun?</h5>
        <p>Klik tombol daftar di halaman utama, lalu isi data yang diperlukan.</p>
    </div>
    <div class="mb-3">
        <h5>Bagaimana jika lupa password?</h5>
        <p>Hubungi admin untuk mereset password Anda.</p>
    </div>
    <div class="mb-3">
        <h5>Apakah saya bisa menghapus akun?</h5>
        <p>Ya, silakan hubungi admin untuk permintaan penghapusan akun.</p>
    </div>
    <div class="mb-3">
        <h5>Bagaimana melaporkan konten yang tidak pantas?</h5>
        <p>Gunakan tombol "Laporkan" pada setiap postingan atau hubungi admin secara langsung.</p>
    </div>
</div>
@endsection
