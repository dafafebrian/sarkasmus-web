@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Profile Card -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body p-4">
            <div class="row align-items-center">
                <div class="col-auto">
                    <div class="avatar-circle">
                        <span class="avatar-text">{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                    </div>
                </div>
                <div class="col">
                    <h2 class="mb-2">{{ $user->name }}</h2>
                    <p class="text-muted mb-1">
                        <i class="bi bi-envelope"></i> {{ $user->email }}
                    </p>
                    <span class="badge bg-primary">{{ ucfirst($user->role) }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Posts Section -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-0 p-4">
            <h3 class="mb-0">Postingan Saya</h3>
        </div>
        <div class="card-body p-0">
            @forelse($memes as $meme)
                <div class="post-item">
                    <div class="row g-0">
                        <div class="col-md-2 d-flex align-items-center justify-content-center p-3">
                            @if($meme->image_path)
                                <img src="{{ asset('storage/' . $meme->image_path) }}" alt="Meme" class="post-thumbnail">
                            @else
                                <div class="no-image">
                                    <i class="bi bi-image"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-5 p-3 d-flex align-items-center">
                            <div>
                                <p class="mb-0 post-caption">{{ $meme->caption }}</p>
                            </div>
                        </div>
                        <div class="col-md-3 p-3 d-flex align-items-center justify-content-center">
                            @if($meme->status == 'approved')
                                <span class="status-badge status-approved">
                                    <i class="bi bi-check-circle-fill"></i> Disetujui
                                </span>
                            @elseif($meme->status == 'pending')
                                <span class="status-badge status-pending">
                                    <i class="bi bi-clock-fill"></i> Menunggu ACC
                                </span>
                            @else
                                <span class="status-badge status-rejected">
                                    <i class="bi bi-x-circle-fill"></i> Ditolak
                                </span>
                            @endif
                        </div>
                        <div class="col-md-2 p-3 d-flex align-items-center justify-content-center">
                            <small class="text-muted">
                                <i class="bi bi-calendar3"></i><br>
                                {{ $meme->created_at->format('d/m/Y') }}<br>
                                {{ $meme->created_at->format('H:i') }}
                            </small>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <i class="bi bi-inbox"></i>
                    <h4>Belum ada postingan</h4>
                    <p class="text-muted">Mulai bagikan konten menarik Anda!</p>
                </div>
            @endforelse
        </div>
        @if($memes->hasPages())
            <div class="card-footer bg-white border-0 p-3">
                {{ $memes->links() }}
            </div>
        @endif
    </div>
</div>

<style>
    .avatar-circle {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .avatar-text {
        color: white;
        font-size: 28px;
        font-weight: 600;
    }

    .post-item {
        border-bottom: 1px solid #f0f0f0;
        transition: background-color 0.2s;
    }

    .post-item:hover {
        background-color: #f8f9fa;
    }

    .post-item:last-child {
        border-bottom: none;
    }

    .post-thumbnail {
        max-width: 100px;
        max-height: 100px;
        border-radius: 8px;
        object-fit: cover;
    }

    .no-image {
        width: 100px;
        height: 100px;
        background-color: #f0f0f0;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #999;
        font-size: 32px;
    }

    .post-caption {
        font-size: 15px;
        line-height: 1.5;
        color: #333;
    }

    .status-badge {
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .status-approved {
        background-color: #d4edda;
        color: #155724;
    }

    .status-pending {
        background-color: #fff3cd;
        color: #856404;
    }

    .status-rejected {
        background-color: #f8d7da;
        color: #721c24;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #999;
    }

    .empty-state i {
        font-size: 64px;
        margin-bottom: 16px;
        opacity: 0.5;
    }

    .empty-state h4 {
        margin-bottom: 8px;
        color: #666;
    }

    .card {
        border-radius: 12px;
    }

    .card-header {
        border-radius: 12px 12px 0 0 !important;
    }
</style>

<!-- Bootstrap Icons (tambahkan di head jika belum ada) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection