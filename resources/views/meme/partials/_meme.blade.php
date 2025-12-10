<div class="meme-card" style="background: white; border-radius: 8px; margin-bottom: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); overflow: hidden;">
    <div style="padding: 15px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center;">
        <div style="display: flex; align-items: center; gap: 10px;">
            <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                {{ substr($meme->user->name, 0, 1) }}
            </div>
            <div>
                <strong style="display: block;">{{ $meme->user->name }}</strong>
                <small style="color: #999;">{{ $meme->created_at->diffForHumans() }}</small>
            </div>
        </div>
        @if(optional(auth()->user())->id === $meme->user_id)
            <form action="{{ route('meme.destroy', $meme) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn" style="background: #dc3545; color: white; border: none; padding: 5px 10px; cursor: pointer; font-size: 12px;" onclick="return confirm('Yakin hapus meme ini?')">Hapus</button>
            </form>
        @endif
    </div>

    <div style="width: 100%; max-height: 600px; overflow: hidden; background: #f5f5f5; display: flex; align-items: center; justify-content: center;">
        @php
            $imgSrc = $meme->image_path;
            $isExternal = Str::startsWith($imgSrc, ['http://','https://']);
        @endphp
        <img src="{{ $isExternal ? $imgSrc : asset('storage/' . $imgSrc) }}" alt="Meme" style="max-width: 100%; max-height: 600px; object-fit: cover;">
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
        <form action="{{ route('meme.like', $meme) }}" method="POST" style="flex: 1;">
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
                        <strong>{{ $comment->user->name }}</strong>
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
