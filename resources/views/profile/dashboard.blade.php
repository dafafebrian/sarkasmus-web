@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div class="container py-4">
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

    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: #667eea;">
                    <i class="bi bi-card-image"></i>
                </div>
                <div class="stat-info">
                    <h4>{{ $memes->total() }}</h4>
                    <p>Total Post</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: #28a745;">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div class="stat-info">
                    <h4>{{ $memes->where('status', 'approved')->count() }}</h4>
                    <p>Disetujui</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: #ffc107;">
                    <i class="bi bi-clock"></i>
                </div>
                <div class="stat-info">
                    <h4>{{ $memes->where('status', 'pending')->count() }}</h4>
                    <p>Menunggu</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="stat-card">
                <div class="stat-icon" style="background: #dc3545;">
                    <i class="bi bi-x-circle"></i>
                </div>
                <div class="stat-info">
                    <h4>{{ $memes->where('status', 'rejected')->count() }}</h4>
                    <p>Ditolak</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-0 p-4 d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Postingan Saya</h3>
            <div class="btn-group" role="group">
                <input type="radio" class="btn-check" name="viewType" id="viewGrid" autocomplete="off">
                <label class="btn btn-outline-secondary btn-sm" for="viewGrid">
                    <i class="bi bi-grid-3x3-gap"></i> Grid
                </label>
                <input type="radio" class="btn-check" name="viewType" id="viewTable" autocomplete="off" checked>
                <label class="btn btn-outline-secondary btn-sm" for="viewTable">
                    <i class="bi bi-table"></i> Tabel
                </label>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive" id="tableView">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="px-4 py-3" style="width: 100px;">Gambar</th>
                            <th class="px-4 py-3">Caption</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($memes as $meme)
                            <tr>
                                <td class="px-4 py-3">
                                    @if($meme->image_path)
                                        <img src="{{ asset('storage/' . $meme->image_path) }}" alt="Meme" class="table-thumbnail">
                                    @else
                                        <div class="table-no-image"><i class="bi bi-image"></i></div>
                                    @endif
                                </td>
                                <td class="px-4 py-3">{{ Str::limit($meme->caption, 50) }}</td>
                                <td class="px-4 py-3">
                                    <span class="status-badge {{ 'status-' . $meme->status }}">
                                        {{ ucfirst($meme->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-muted">{{ $meme->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center py-5 text-muted">Belum ada postingan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="row g-3 p-4" id="gridView" style="display: none;">
                @forelse($memes as $meme)
                    <div class="col-md-4">
                        <div class="grid-card">
                            @if($meme->image_path)
                                <img src="{{ asset('storage/' . $meme->image_path) }}" alt="Meme" class="grid-image">
                            @else
                                <div class="grid-no-image"><i class="bi bi-file-text"></i></div>
                            @endif
                            <div class="grid-content">
                                <p class="grid-caption">{{ Str::limit($meme->caption, 80) }}</p>
                                <span class="status-badge-sm {{ 'status-' . $meme->status }}">{{ ucfirst($meme->status) }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">Belum ada postingan.</div>
                @endforelse
            </div>
        </div>

        @if($memes->hasPages())
            <div class="card-footer bg-white border-0 p-3">
                {{ $memes->links() }}
            </div>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const viewGrid = document.getElementById('viewGrid');
        const viewTable = document.getElementById('viewTable');
        const gridView = document.getElementById('gridView');
        const tableView = document.getElementById('tableView');

        viewGrid.addEventListener('change', function() {
            if (this.checked) {
                tableView.style.display = 'none';
                gridView.style.display = 'flex';
            }
        });

        viewTable.addEventListener('change', function() {
            if (this.checked) {
                gridView.style.display = 'none';
                tableView.style.display = 'block';
            }
        });
    });
</script>

<style>
    .avatar-circle { width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; }
    .avatar-text { color: white; font-size: 28px; font-weight: 600; }
    .stat-card { background: white; border-radius: 12px; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); display: flex; align-items: center; gap: 15px; transition: transform 0.2s; }
    .stat-icon { width: 50px; height: 50px; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px; }
    .stat-info h4 { margin: 0; font-size: 24px; font-weight: 700; color: #333; }
    .table-thumbnail { width: 60px; height: 60px; border-radius: 8px; object-fit: cover; }
    .table-no-image { width: 60px; height: 60px; background-color: #f0f0f0; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #999; }
    .grid-card { background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
    .grid-image { width: 100%; height: 200px; object-fit: cover; }
    .grid-no-image { width: 100%; height: 200px; background: #f8f9fa; display: flex; align-items: center; justify-content: center; font-size: 40px; color: #ccc; }
    .grid-content { padding: 15px; }
    .status-badge { padding: 5px 12px; border-radius: 20px; font-size: 12px; }
    .status-approved { background-color: #d4edda; color: #155724; }
    .status-pending { background-color: #fff3cd; color: #856404; }
    .status-rejected { background-color: #f8d7da; color: #721c24; }
    .status-badge-sm { padding: 2px 8px; border-radius: 10px; font-size: 10px; }
</style>
@endsection