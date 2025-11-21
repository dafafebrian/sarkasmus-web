@extends('layouts.app')


  

@section('content')

@if ($errors->any())
    <div style="padding: 10px; margin-bottom: 20px; border: 1px solid red; background-color: #fdd;">
        <p style="font-weight: bold; color: red;">Pendaftaran Gagal:</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif





    <div class="container mt-5">
        
        
        <form action="/register" method="POST">
            @csrf
            <div class="form-group">
                <label>username</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
           
            <button type="submit" class="btn btn-success">registrasi</button>
            
        </form>
    </div>
</body>
@endsection