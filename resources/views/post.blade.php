@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Buat Postingan Baru</h2>

    <form>
        <div class="mb-3">
            <label class="form-label">Dari (nama samaran)</label>
            <input type="text" class="form-control" placeholder="contoh: mahasiswa stress" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Caption (opsional)</label>
            <input type="text" class="form-control" placeholder="contoh: perjuangan skripsi tak berujung">
        </div>

        <div class="mb-3">
            <label class="form-label">Isi Pesan</label>
            <textarea class="form-control" rows="4" placeholder="Tulis isi postingan kamu..." required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Tagar (opsional)</label>
            <input type="text" class="form-control" placeholder="#kampus #unimus">
        </div>

        <button type="submit" class="btn btn-primary w-100">Posting</button>
    </form>
</div>
@endsection
