@extends('layouts.app')

@section('title', 'Home - Sarkasmus')

@section('content')

<div class="content-mobile-wrapper">

    <div class="text-center">
        <h1>Selamat Datang di Aplikasi Sarkasmus</h1>
        <p>Platform posting meme anak unimus</p>

        <a href="{{ url('/post') }}" class="btn btn-primary mt-3">Mulai Sekarang</a><br>
        <a href="{{ url('/login') }}" class="btn btn-primary mt-2">Login Admin</a>
        <a href="{{ url('/register') }}" class="btn btn-primary mt-2">Login</a>
    </div>

    <div style="height: 1500px;"></div>

</div>

@endsection
