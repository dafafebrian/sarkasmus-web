@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4 text-center">Login Admin</h2>

    <form action="/register" method="GET">

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-4 w-100">Daftar</button>

    </form>
</div>

@endsection
