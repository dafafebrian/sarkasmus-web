@extends('layouts.app')

@section('title', 'Home - Sarkasmus')

@section('content')

<div class="content-mobile-wrapper">

    <div class="text-center">
        <h1>Selamat Datang di Aplikasi Sarkasmus</h1>
        <p>Platform analisis sarkasme berbasis Laravel</p>

        <a href="{{ url('/post') }}" class="btn btn-primary mt-3">Mulai Sekarang</a><br>
        <a href="{{ route('register') }}" class="btn btn-primary mt-2">Buat Akun</a>
    </div>

    <div style="height: 1500px;"></div>

</div>

@endsection
