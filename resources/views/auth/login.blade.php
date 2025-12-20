@extends('layouts.app')

@section('content')

<div class="auth-container">
    <div class="auth-box">
        <div class="auth-header">
            <h2>Login</h2>
            <p>Masuk ke akun Sarkalogi Anda</p>
        </div>

        <div class="login-options" style="display: flex; gap: 20px; justify-content: center; margin-bottom: 30px;">
            <a href="{{ route('login') }}" class="btn btn-outline @if(request()->routeIs('login')) active @endif">Login Pengguna/Member</a>
            <a href="{{ route('admin.login') }}" class="btn btn-outline @if(request()->routeIs('admin.login')) active @endif">Login Admin</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="auth-form">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="form-control @error('password') is-invalid @enderror"
                    required
                >
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-checkbox">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span>Ingat saya</span>
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <div class="auth-footer">
            <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
        </div>
    </div>
</div>

<style>
    .auth-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: calc(100vh - 200px);
        padding: 40px 20px;
    }

    .auth-box {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 40px;
        width: 100%;
        max-width: 400px;
    }

    .auth-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .auth-header h2 {
        color: var(--dark);
        margin-bottom: 10px;
        font-size: 28px;
    }

    .auth-header p {
        color: var(--gray);
        font-size: 14px;
    }

    .auth-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-label {
        color: var(--dark);
        font-weight: 600;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .form-control {
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.1);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .error-message {
        color: #dc3545;
        font-size: 12px;
        margin-top: 4px;
    }

    .form-checkbox {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        color: var(--gray);
        font-size: 14px;
    }

    .form-checkbox input[type="checkbox"] {
        width: auto;
        cursor: pointer;
    }

    .btn {
        padding: 12px 20px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
    }

    .btn-primary {
        background-color: var(--primary);
        color: white;
    }

    .btn-primary:hover {
        background-color: #0c63e4;
        box-shadow: 0 4px 12px rgba(26, 115, 232, 0.3);
    }

    .auth-footer {
        text-align: center;
        margin-top: 25px;
        padding-top: 25px;
        border-top: 1px solid #eee;
    }

    .auth-footer p {
        color: var(--gray);
        font-size: 14px;
        margin: 0;
    }

    .auth-footer a {
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s;
    }

    .auth-footer a:hover {
        color: #0c63e4;
    }

    .alert {
        padding: 12px 16px;
        border-radius: 6px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert p {
        margin: 0;
    }

    @media (max-width: 600px) {
        .auth-box {
            padding: 30px 20px;
        }

        .auth-header h2 {
            font-size: 24px;
        }
    }
</style>
@endsection
