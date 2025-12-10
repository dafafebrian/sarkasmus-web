@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px; margin: 40px auto;">
    <div style="background: white; border-radius: 8px; padding: 30px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        <h2 style="margin-bottom: 20px; text-align: center;">Upload Meme Baru</h2>

        @if ($errors->any())
            <div style="background: #f8d7da; color: #721c24; padding: 12px 16px; border-radius: 4px; margin-bottom: 20px;">
                @foreach ($errors->all() as $error)
                    <p style="margin: 5px 0;">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('meme.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Image Upload -->
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #333;">
                    <i class="fas fa-image"></i> Pilih Gambar Meme
                </label>
                <div id="dropzone" style="border: 2px dashed #ddd; border-radius: 8px; padding: 40px 20px; text-align: center; background: #f9f9f9; cursor: pointer; transition: all 0.3s;">
                    <i class="fas fa-cloud-upload-alt" style="font-size: 40px; color: #1a73e8; margin-bottom: 10px; display: block;"></i>
                    <p style="color: #666; margin: 0;">Drag & drop gambar atau klik untuk memilih</p>
                    <small style="color: #999; display: block; margin-top: 5px;">Maksimal 5MB (JPEG, PNG, GIF, WebP)</small>
                    <input 
                        type="file" 
                        name="image" 
                        id="image-input" 
                        accept="image/*" 
                        required
                        style="display: none;"
                    >
                </div>
                
                <!-- Preview -->
                <div id="preview" style="display: none; margin-top: 15px; text-align: center;">
                    <img id="preview-img" src="" alt="Preview" style="max-width: 100%; max-height: 400px; border-radius: 4px;">
                    <button type="button" onclick="document.getElementById('image-input').value = ''; document.getElementById('preview').style.display = 'none';" style="margin-top: 10px; padding: 8px 15px; background: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer;">Ganti Gambar</button>
                </div>
            </div>

            <!-- Caption -->
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 10px; font-weight: 600; color: #333;">
                    <i class="fas fa-pen"></i> Caption (Opsional)
                </label>
                <textarea 
                    name="caption" 
                    placeholder="Tulis caption yang lucu..." 
                    style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; font-family: inherit; resize: vertical; min-height: 100px;"
                    maxlength="500"
                ></textarea>
                <small style="display: block; color: #999; margin-top: 5px;">Maksimal 500 karakter</small>
            </div>

            <!-- Submit -->
            <button type="submit" style="width: 100%; padding: 12px; background: #1a73e8; color: white; border: none; border-radius: 4px; font-weight: 600; cursor: pointer; font-size: 16px; transition: background 0.3s;">
                <i class="fas fa-share"></i> Bagikan Meme
            </button>

            <a href="{{ route('feed') }}" style="display: block; text-align: center; margin-top: 10px; color: #1a73e8; text-decoration: none;">Kembali ke Feed</a>
        </form>
    </div>
</div>

<script>
    const dropzone = document.getElementById('dropzone');
    const imageInput = document.getElementById('image-input');
    const preview = document.getElementById('preview');
    const previewImg = document.getElementById('preview-img');

    // Dropzone click
    dropzone.addEventListener('click', () => imageInput.click());

    // Drag & drop
    dropzone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropzone.style.background = '#f0f7ff';
        dropzone.style.borderColor = '#1a73e8';
    });

    dropzone.addEventListener('dragleave', () => {
        dropzone.style.background = '#f9f9f9';
        dropzone.style.borderColor = '#ddd';
    });

    dropzone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropzone.style.background = '#f9f9f9';
        dropzone.style.borderColor = '#ddd';
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            imageInput.files = files;
            handleImageSelect();
        }
    });

    // File input change
    imageInput.addEventListener('change', handleImageSelect);

    function handleImageSelect() {
        const file = imageInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImg.src = e.target.result;
                preview.style.display = 'block';
                dropzone.style.display = 'none';
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
