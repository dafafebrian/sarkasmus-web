@extends('layouts.app')

@section('content')
<div class="container">
    <nav style="margin-bottom:30px;display:flex;gap:16px;align-items:center;">
        <a href="{{ route('admin.dashboard') }}" style="font-weight:600;color:#1a73e8;text-decoration:none;">Dashboard</a>
        <a href="/" style="font-weight:600;color:#333;text-decoration:none;">Halaman Utama</a>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" style="background:#dc3545;color:#fff;padding:6px 16px;border:none;border-radius:4px;cursor:pointer;">Logout</button>
        </form>
    </nav>
    <h1>Dashboard Admin</h1>
    <p>Daftar postingan yang menunggu persetujuan:</p>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table style="width:100%;margin-top:20px;border-collapse:collapse;">
        <thead>
            <tr style="background:#f5f5f5;">
                <th style="padding:8px;border:1px solid #ddd;">User</th>
                <th style="padding:8px;border:1px solid #ddd;">Caption</th>
                <th style="padding:8px;border:1px solid #ddd;">Gambar</th>
                <th style="padding:8px;border:1px solid #ddd;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($memes as $meme)
                <tr>
                    <td style="padding:8px;border:1px solid #ddd;">{{ $meme->user->name ?? $meme->anonymous_name }}</td>
                    <td style="padding:8px;border:1px solid #ddd;">{{ $meme->caption }}</td>
                    <td style="padding:8px;border:1px solid #ddd;">
                        @if($meme->image_path)
                            <img src="{{ asset('storage/' . $meme->image_path) }}" alt="Meme" style="max-width:100px;max-height:100px;">
                        @else
                            -
                        @endif
                    </td>
                    <td style="padding:8px;border:1px solid #ddd;">
                        <form action="{{ route('admin.meme.approve', $meme->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-success">ACC</button>
                        </form>
                        <form action="{{ route('admin.meme.reject', $meme->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Tolak</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" style="text-align:center;padding:20px;">Tidak ada postingan menunggu ACC.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top:20px;">
        {{ $memes->links() }}
    </div>
</div>
<style>
.btn-success {background:#28a745;color:#fff;padding:6px 16px;border:none;border-radius:4px;cursor:pointer;margin-right:5px;}
.btn-danger {background:#dc3545;color:#fff;padding:6px 16px;border:none;border-radius:4px;cursor:pointer;}
.btn-success:hover {background:#218838;}
.btn-danger:hover {background:#c82333;}
</style>
@endsection
