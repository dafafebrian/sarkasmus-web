@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4 text-center">Register Admin</h2>

    <form action="/admin/register" method="POST">
        @csrf

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-4 w-100">Daftar Admin</button>

    </form>

</div>
@endsection
