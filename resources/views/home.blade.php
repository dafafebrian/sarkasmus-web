@extends('layouts.app')

@section('title', 'Home - Sarkalogi')

@section('content')
<div class="container" style="max-width: 600px; margin: 40px auto;">

    <!-- Sorting Buttons -->
    <div style="margin-bottom: 20px; display: flex; justify-content: center; gap: 10px;">
        <a href="{{ route('home', ['sort' => 'new']) }}" class="btn {{ ($sort ?? 'new') === 'new' ? 'btn-primary' : 'btn-outline' }}">
            <i class="fas fa-newspaper"></i> Terbaru
        </a>
        <a href="{{ route('home', ['sort' => 'hot']) }}" class="btn {{ ($sort ?? 'new') === 'hot' ? 'btn-primary' : 'btn-outline' }}">
            <i class="fas fa-fire"></i> Hot
        </a>
    </div>

    <!-- Create Post Button -->
    <a href="{{ route('meme.create') }}" class="btn btn-primary" style="margin-bottom: 30px; display: block; text-align: center; padding: 12px;">
        <i class="fas fa-plus"></i> Upload Postingan Baru
    </a>

    <!-- Posts Feed -->
    <div id="feed-list">
        @forelse($memes as $meme)
            @include('meme.partials._meme', ['meme' => $meme])
        @empty
            <div style="text-align: center; padding: 50px 20px; background: white; border-radius: 8px;">
                <i class="fas fa-inbox" style="font-size: 40px; color: #ddd; margin-bottom: 20px; display: block;"></i>
                <h3>Belum ada postingan</h3>
                <p style="color: #999; margin-bottom: 20px;">Jadilah yang pertama!</p>
                <a href="{{ route('meme.create') }}" class="btn btn-primary">Upload Postingan Sekarang</a>
            </div>
        @endforelse
    </div>

    <!-- Pagination (for non-AJAX fallback and infinite scroll) -->
    <div id="pagination" style="margin-top: 30px;">
        {{ $memes->appends(request()->query())->links() }}
    </div>
</div>

<style>
    .btn {
        display: inline-block;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 50px;
        border: 2px solid transparent;
        cursor: pointer;
        font-weight: 500;
        transition: all 0.3s;
    }
    .btn-primary {
        background: #1a73e8;
        color: white;
        border-color: #1a73e8;
    }
    .btn-primary:hover {
        background: #0d5bb5;
        border-color: #0d5bb5;
    }
    .btn-outline {
        background: white;
        color: #1a73e8;
        border-color: #1a73e8;
    }
    .btn-outline:hover {
        background: #1a73e8;
        color: white;
    }
</style>

<script>
    (function(){
        let page = 2;
        let loading = false;
        let noMorePages = false;
        const feedList = document.getElementById('feed-list');
        const pagination = document.getElementById('pagination');
        const sort = '{{ $sort ?? 'new' }}';

        async function loadMore() {
            if (loading || noMorePages) return;
            loading = true;
            try {
                const url = new URL("{{ route('home') }}");
                url.searchParams.set('page', page);
                url.searchParams.set('sort', sort);

                const res = await fetch(url.toString(), {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });
                
                if (!res.ok) { 
                    loading = false; 
                    return; 
                }
                
                const text = await res.text();
                
                if (!text.trim()) { 
                    noMorePages = true;
                    window.removeEventListener('scroll', onScroll); 
                    if(pagination) pagination.style.display = 'none';
                    return; 
                }
                
                const wrapper = document.createElement('div');
                wrapper.innerHTML = text;
                
                // Re-initialize like handlers for new content
                if (window.initLikeForms) {
                    wrapper.querySelectorAll('form.like-form').forEach(form => window.initLikeForms(form));
                }

                while (wrapper.firstChild) {
                    feedList.appendChild(wrapper.firstChild);
                }

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
        
        if (pagination) {
            pagination.style.display = 'none'; // Hide default pagination
        }

        window.addEventListener('scroll', onScroll);

        // Helper to re-attach listeners
        if (!window.initLikeForms) {
            window.initLikeForms = function(form) {
                form.addEventListener('submit', async function (e) {
                    e.preventDefault();
                    // Using the existing like handler logic from _meme.blade.php
                    // This is a simplified example; for robustness, you'd share the function
                    var formData = new FormData(this);
                    var action = this.action;
                    var tokenInput = this.querySelector('input[name="_token"]');
                    var token = tokenInput ? tokenInput.value : '';

                    try {
                        var res = await fetch(action, {
                            method: 'POST',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': token,
                                'Accept': 'application/json'
                            },
                            body: formData,
                            credentials: 'same-origin'
                        });

                        if (res.status === 401) {
                            if (confirm('Anda harus login untuk menyukai postingan. Login sekarang?')) {
                                window.location.href = '{{ route('login') }}';
                            }
                            return;
                        }

                        var data = await res.json();
                        var card = this.closest('.meme-card');
                        if (card) {
                            var likesCountSpan = card.querySelector('span:first-child');
                            likesCountSpan.innerHTML = '<i class="fas fa-heart"></i> ' + data.likes_count + ' Suka';
                            var btn = this.querySelector('button[type="submit"]');
                            btn.style.color = data.liked ? '#e74c3c' : '#999';
                            btn.innerHTML = (data.liked ? '<i class="fas fa-heart"></i> Batal Suka' : '<i class="fas fa-heart"></i> Suka');
                        }

                    } catch (err) {
                        console.error('Like request failed', err);
                    }
                });
            };
            document.querySelectorAll('form.like-form').forEach(form => window.initLikeForms(form));
        }

    })();
</script>
@endsection