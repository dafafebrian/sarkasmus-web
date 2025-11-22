@extends('layouts.app')


  

@section('content')







    <div class="container mt-5">
        
        
        <form action="/register" method="GET">
            
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