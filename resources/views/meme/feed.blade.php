@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px; margin: 40px auto;">
    <!-- Create Post Button -->
    <a href="{{ route('meme.create') }}" class="btn btn-primary" style="margin-bottom: 30px; display: block; text-align: center; padding: 12px;">
        <i class="fas fa-plus"></i> Upload Postingan Baru
    </a>

    <!-- Posts Feed -->
    <div id="feed-list">
        @forelse($memes as $meme)
            @include('meme.partials._meme')
        @empty
            <div style="text-align: center; padding: 50px 20px; background: white; border-radius: 8px;">
                <i class="fas fa-inbox" style="font-size: 40px; color: #ddd; margin-bottom: 20px; display: block;"></i>
                <h3>Belum ada postingan</h3>
                <p style="color: #999; margin-bottom: 20px;">Jadilah yang pertama!</p>
                <a href="{{ route('meme.create') }}" class="btn btn-primary">Upload Postingan Sekarang</a>
            </div>
        @endforelse
    </div>

    <!-- Pagination (kept for non-AJAX fallback) -->
    <div id="pagination" style="margin-top: 30px;">
        {{ $memes->links() }}
    </div>
</div>

<style>
    .btn {
        display: inline-block;
        padding: 10px 20px;
        background: #1a73e8;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        border: none;
        cursor: pointer;
        font-weight: 500;
        transition: background 0.3s;
    }

    .btn:hover {
        background: #0d5bb5;
    }

    .btn-primary {
        background: #1a73e8;
    }
</style>
<script>
    (function(){
        let page = 2;
        let loading = false;
        const feedList = document.getElementById('feed-list');
        const pagination = document.getElementById('pagination');

        async function loadMore() {
            if (loading) return;
            loading = true;
            try {
                const res = await fetch("{{ route('feed') }}?page=" + page, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
                if (!res.ok) { loading = false; return; }
                const text = await res.text();
                if (!text.trim()) { window.removeEventListener('scroll', onScroll); pagination.innerHTML = ''; return; }
                const wrapper = document.createElement('div');
                wrapper.innerHTML = text;
                // append children
                while (wrapper.firstChild) feedList.appendChild(wrapper.firstChild);
                page++;
            } catch (e) {
                console.error(e);
            }
            loading = false;
        }

        function onScroll(){
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 800) {
                loadMore();
            }
        }

        window.addEventListener('scroll', onScroll);
    })();
</script>
@endsection
