@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profil Saya</h1>
    <div style="margin-bottom:30px;">
        <strong>Nama:</strong> {{ $user->name }}<br>
        <strong>Email:</strong> {{ $user->email }}<br>
        <strong>Role:</strong> {{ $user->role }}
    </div>
    <h2>Postingan Saya</h2>
    <table style="width:100%;margin-top:20px;border-collapse:collapse;">
        <thead>
            <tr style="background:#f5f5f5;">
                <th style="padding:8px;border:1px solid #ddd;">Caption</th>
                <th style="padding:8px;border:1px solid #ddd;">Gambar</th>
                <th style="padding:8px;border:1px solid #ddd;">Status</th>
                <th style="padding:8px;border:1px solid #ddd;">Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($memes as $meme)
                <tr>
                    <td style="padding:8px;border:1px solid #ddd;">{{ $meme->caption }}</td>
                    <td style="padding:8px;border:1px solid #ddd;">
                        @if($meme->image_path)
                            <img src="{{ asset('storage/' . $meme->image_path) }}" alt="Meme" style="max-width:100px;max-height:100px;">
                        @else
                            -
                        @endif
                    </td>
                    <td style="padding:8px;border:1px solid #ddd;">
                        @if($meme->status == 'approved')
                            <span style="color:green;font-weight:bold;">Disetujui</span>
                        @elseif($meme->status == 'pending')
                            <span style="color:orange;font-weight:bold;">Menunggu ACC</span>
                        @else
                            <span style="color:red;font-weight:bold;">Ditolak</span>
                        @endif
                    </td>
                    <td style="padding:8px;border:1px solid #ddd;">{{ $meme->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            @empty
                <tr><td colspan="4" style="text-align:center;padding:20px;">Belum ada postingan.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top:20px;">
        {{ $memes->links() }}
    </div>
</div>
@endsection
