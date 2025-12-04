<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sarkasmus')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@latest/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="/css/admin.css">

</head>

<body>

    <!-- Navbar utama -->
    <nav class="navbar navbar-expand-lg" style="background-color:#0d6efd;">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ url('/') }}">Sarkasmus</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ url('/post') }}">Posting</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ url('/analyze') }}">Post Masuk</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ url('/tentang') }}">Tentang</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Tempat isi halaman -->
    <div class="container my-5">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        © {{ date('Y') }} Sarkasmus Project
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@latest/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
