@extends('layouts.app')

@section('title', 'Feed - Sarkalogi')

@section('content')

<link rel="stylesheet" href="{{ asset('css/feed.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="pc-container">

    <!-- Header -->
    <div class="header">
        <span>Sarkalogi</span>
        <i class="fas fa-bars menu-icon"></i>
    </div>

    <!-- Tabs -->
    <div class="tabs">
        <div class="tab-item {{ request('sort') == 'new' ? 'active' : '' }}">
            <a href="?sort=new" style="text-decoration:none; color:inherit;">Terbaru</a>
        </div>

        <div class="tab-item {{ request('sort') == 'hot' || !request('sort') ? 'active' : '' }}">
            <a href="?sort=hot" style="text-decoration:none; color:inherit;">Hot</a>
        </div>

        <div class="tab-item {{ request('sort') == 'random' ? 'active' : '' }}">
            <a href="?sort=random" style="text-decoration:none; color:inherit;">For You</a>
        </div>
    </div>

    <!-- Feed -->
    <div class="feed-container">

        @foreach($posts as $post)
            <div class="post-card">

                <div class="from">From: {{ $post->from }}</div>

                <div class="caption">{{ $post->caption }}</div>

                <div class="content-placeholder">
                    {{ $post->content }}
                </div>

                <div class="actions">
                    <div class="left-actions">
                        <i class="fas fa-thumbs-up"></i><span>{{ $post->likes }}</span>
                        <i class="fas fa-comment-alt"></i>
                        <i class="fas fa-share-alt"></i>
                    </div>

                    <div class="time">
                        {{ $post->created_at->format('H:i') }}
                    </div>
                </div>

            </div>
        @endforeach

    </div>
</div>

@endsection
