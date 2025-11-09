<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SARKASMUS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-light bg-white shadow-sm">
        <div class="container">
            <h3 class="navbar-brand fw-bold text-primary">SARKASMUS</h3>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Opsi Pilihan -->
        <ul class="nav nav-pills justify-content-center mb-4">
            <li class="nav-item">
                <a class="nav-link active" href="#">🔥 Postingan Terpanas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">🕒 Postingan Terbaru</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">🎯 For You</a>
            </li>
        </ul>

        <!-- Daftar Postingan (contoh tampilan awal) -->
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Dari: Mahasiswa Lapar</h5>
                        <p class="card-text">“Kantin tutup, tapi tugas kebuka.” 😩</p>
                        <small class="text-muted">#unimus #kampus #realitas</small>
                    </div>
                </div>

                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Dari: Anak Kost</h5>
                        <p class="card-text">“Uang bulanan habis, tapi semangat masih (sedikit).” 😅</p>
                        <small class="text-muted">#hidupmahasiswa</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Buat Postingan -->
    <a href="/post" class="btn btn-primary rounded-circle shadow-lg position-fixed" style="bottom:30px; right:30px; width:60px; height:60px; font-size:28px;">+</a>

</body>
</html>
