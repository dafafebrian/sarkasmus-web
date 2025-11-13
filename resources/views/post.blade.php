@extends('layouts.app')

@section('title', 'Posting - Sarkasmus')

@section('content')
<div class="card shadow-sm p-4">
    <h2 class="mb-4 text-center">Buat Posting Sarkasme</h2>

    <form action="{{ url('/post') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Nama Pengguna</label>
            <input type="text" id="judul" name="judul" class="form-control" placeholder="Masukkan judul postingan" required>
        </div>

        <div class="mb-3">
            <label for="judul" class="form-label">Caption</label>
            <input type="text" id="judul" name="judul" class="form-control" placeholder="Masukkan caption postingan" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi Postingan</label>
            <textarea id="isi" name="isi" class="form-control" rows="5" placeholder="Tulis teks sarkasme di sini..." required></textarea>
        </div>

        <button type="submit" class="btn btn-primary w-100">Posting</button>
    </form>
</div>
@endsection
