<div class="meme-card" style="background: white; border-radius: 8px; margin-bottom: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); overflow: hidden;">
    <div style="padding: 15px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center;">
        <div style="display: flex; align-items: center; gap: 10px;">
            <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                @php
                    $displayName = $meme->anonymous_name ?? ($meme->user->name ?? 'Anonymous');
                    $firstChar = substr($displayName, 0, 1);
                @endphp
                {{ $firstChar }}
            </div>
            <div>
                <strong style="display: block;">{{ $displayName }}</strong>
                <small style="color: #999;">{{ $meme->created_at->diffForHumans() }}</small>
            </div>
        </div>
        @if(optional(auth()->user())->id === $meme->user_id || !$meme->user_id)
            <form action="{{ route('meme.destroy', $meme) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn" style="background: #dc3545; color: white; border: none; padding: 5px 10px; cursor: pointer; font-size: 12px;" onclick="return confirm('Yakin hapus meme ini?')">Hapus</button>
            </form>
        @endif
    </div>

    <div style="width: 100%; max-height: 600px; overflow: hidden; background: #f5f5f5; display: flex; align-items: center; justify-content: center;">
        @if($meme->image_path)
            @php
                $imgSrc = $meme->image_path;
                $isExternal = Str::startsWith($imgSrc, ['http://','https://']);
            @endphp
            <img src="{{ $isExternal ? $imgSrc : asset('storage/' . $imgSrc) }}" alt="Meme" style="max-width: 100%; max-height: 600px; object-fit: cover;">
        @endif
    </div>

    @if($meme->caption)
        <div style="padding: 15px;">
            <p>{{ $meme->caption }}</p>
        </div>
    @endif

    <div style="padding: 10px 15px; border-top: 1px solid #eee; border-bottom: 1px solid #eee; font-size: 13px; color: #666; display: flex; justify-content: space-between;">
        <span><i class="fas fa-heart"></i> {{ $meme->likes_count }} Suka</span>
        <span><i class="fas fa-comment"></i> {{ $meme->comments_count }} Komentar</span>
    </div>

    <div style="padding: 10px; border-bottom: 1px solid #eee; display: flex; gap: 10px;">
        <form class="like-form" data-meme-id="{{ $meme->id }}" action="{{ route('meme.like', $meme) }}" method="POST" style="flex: 1;">
            @csrf
            <button type="submit" style="width: 100%; padding: 10px; border: none; background: white; color: {{ $meme->likedBy(optional(auth()->user())->id) ? '#e74c3c' : '#999' }}; cursor: pointer; font-weight: 500; transition: all 0.3s;">
                <i class="fas fa-heart"></i> {{ $meme->likedBy(optional(auth()->user())->id) ? 'Batal Suka' : 'Suka' }}
            </button>
        </form>
        <button style="flex: 1; padding: 10px; border: none; background: white; color: #999; cursor: pointer; font-weight: 500; transition: all 0.3s;" onclick="document.getElementById('comment-form-{{ $meme->id }}').style.display = 'block';">
            <i class="fas fa-comment"></i> Komentar
        </button>
    </div>

    <div style="padding: 15px;">
        @foreach($meme->comments as $comment)
            <div style="margin-bottom: 10px; padding: 10px; background: #f9f9f9; border-radius: 5px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                    <div>
                        <strong>{{ optional($comment->user)->name ?? 'Anonymous' }}</strong>
                        <small style="color: #999; display: block;">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                    @if(optional(auth()->user())->id === $comment->user_id)
                        <form action="{{ route('comment.destroy', $comment) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #dc3545; cursor: pointer; font-size: 12px;">Hapus</button>
                        </form>
                    @endif
                </div>
                <p style="margin-top: 5px;">{{ $comment->content }}</p>
            </div>
        @endforeach

        <div id="comment-form-{{ $meme->id }}" style="display: none; margin-top: 15px; padding-top: 15px; border-top: 1px solid #eee;">
            <form action="{{ route('meme.comment', $meme) }}" method="POST" style="display: flex; gap: 10px;">
                @csrf
                <input 
                    type="text" 
                    name="content" 
                    placeholder="Tulis komentar..." 
                    style="flex: 1; padding: 8px 10px; border: 1px solid #ddd; border-radius: 20px; outline: none; font-size: 13px;"
                    required
                >
                <button type="submit" style="padding: 8px 15px; background: #1a73e8; color: white; border: none; border-radius: 20px; cursor: pointer; font-weight: 500;">Kirim</button>
            </form>
        </div>
    </div>
</div>

@once
    <script>
    if (!window.__likeFormHandlerAdded) {
        window.__likeFormHandlerAdded = true;
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('form.like-form').forEach(function (form) {
                form.addEventListener('submit', async function (e) {
                    e.preventDefault();
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

                        // update UI inside the meme card
                        var card = this.closest('.meme-card');
                        if (card) {
                            // update likes count (first stat span)
                            var statSpans = card.querySelectorAll('div[style*="font-size: 13px"] span');
                            if (statSpans && statSpans.length > 0) {
                                statSpans[0].textContent = ' ' + data.likes_count + ' Suka';
                            }

                            // update button text and color
                            var btn = this.querySelector('button[type="submit"]');
                            if (btn) {
                                btn.style.color = data.liked ? '#e74c3c' : '#999';
                                btn.innerHTML = (data.liked ? '<i class="fas fa-heart"></i> Batal Suka' : '<i class="fas fa-heart"></i> Suka');
                            }
                        }

                    } catch (err) {
                        console.error('Like request failed', err);
                    }
                });
            });
        });
    }
    </script>
@endonce
