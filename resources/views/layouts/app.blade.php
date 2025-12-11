<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarkalogi - Platform Keluh Kesah Anak Unimus</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary: #1a73e8;
            --secondary: #ff6b00;
            --accent: #00c853;
            --dark: #202124;
            --light: #f8f9fa;
            --gray: #5f6368;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            color: var(--dark);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-icon {
            color: var(--secondary);
            font-size: 28px;
        }

        .logo-text {
            font-size: 24px;
            font-weight: 700;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .nav-links {
            display: flex;
            gap: 25px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--gray);
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-auth {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-name {
            color: var(--dark);
            font-weight: 500;
            font-size: 14px;
        }

        .logout-form {
            margin: 0;
        }

        .btn-logout {
            background-color: #dc3545;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .btn-logout:hover {
            background-color: #c82333;
        }

        .btn-primary-nav {
            background-color: var(--primary);
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: background-color 0.3s;
            display: inline-block;
        }

        .btn-primary-nav:hover {
            background-color: #0c63e4;
        }

        .btn-outline-nav {
            background-color: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
            padding: 8px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.3s;
            display: inline-block;
        }

        .btn-outline-nav:hover {
            background-color: var(--primary);
            color: white;
        }

        /* Hero Section */
        .hero {
            padding: 80px 0 60px;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            color: var(--dark);
            line-height: 1.2;
        }

        .highlight {
            color: var(--secondary);
            font-weight: 800;
        }

        .subtitle {
            font-size: 1.2rem;
            color: var(--gray);
            max-width: 700px;
            margin: 0 auto 40px;
        }

        .hero-image {
            max-width: 600px;
            margin: 40px auto;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .hero-image img {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Features */
        .features {
            padding: 60px 0;
            background-color: white;
            border-radius: 20px;
            margin: 40px 0;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .section-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 40px;
            color: var(--dark);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            padding: 0 20px;
        }

        .feature-card {
            background: var(--light);
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            border-top: 4px solid var(--primary);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .feature-icon {
            font-size: 40px;
            color: var(--primary);
            margin-bottom: 20px;
        }

        .feature-card h3 {
            margin-bottom: 15px;
            color: var(--dark);
        }

        /* Login Options */
        .login-section {
            padding: 60px 0;
            text-align: center;
        }

        .login-options {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            margin-top: 40px;
        }

        .login-card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            width: 300px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            transition: transform 0.3s;
        }

        .login-card:hover {
            transform: translateY(-5px);
        }

        .login-card.admin {
            border-top: 4px solid var(--secondary);
        }

        .login-card.user {
            border-top: 4px solid var(--accent);
        }

        .login-card h3 {
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .login-card p {
            color: var(--gray);
            margin-bottom: 25px;
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn:hover {
            background-color: #0d5bb5;
            transform: scale(1.05);
        }

        .btn-secondary {
            background-color: var(--secondary);
        }

        .btn-secondary:hover {
            background-color: #e05a00;
        }

        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }

        .btn-outline:hover {
            background-color: var(--primary);
            color: white;
        }

        .btn-wide {
            width: 100%;
            margin-top: 10px;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(to right, var(--primary), var(--secondary));
            color: white;
            padding: 70px 0;
            text-align: center;
            border-radius: 20px;
            margin: 60px 0;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .cta-btn {
            background-color: white;
            color: var(--primary);
        }

        .cta-btn:hover {
            background-color: rgba(255,255,255,0.9);
        }

        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 50px 0 20px;
            margin-top: 60px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-section h3 {
            font-size: 1.3rem;
            margin-bottom: 20px;
            color: var(--light);
        }

        .footer-section p, .footer-section a {
            color: #b0b7c3;
            margin-bottom: 10px;
            display: block;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: white;
        }

        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
            font-size: 18px;
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: #b0b7c3;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                gap: 15px;
            }
            
            .hero h1 {
                font-size: 2.2rem;
            }
            
            .login-options {
                flex-direction: column;
                align-items: center;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }

            .nav-auth {
                flex-direction: column;
                width: 100%;
            }

            .user-menu {
                flex-direction: column;
                width: 100%;
            }

            .btn-logout {
                width: 100%;
            }

            .btn-primary-nav,
            .btn-outline-nav {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav class="navbar">
                <div class="logo">
                    <i class="fas fa-laugh-beam logo-icon"></i>
                    <div class="logo-text">Sarkalogi</div>
                </div>
                <div class="nav-links">
                    <a href="#home">Beranda</a>
                    <a href="{{ route('feed') }}">Feed Terbaru</a>
                    <a href="#about">Tentang</a>
                    <a href="#contact">Kontak</a>
                </div>
                <div class="nav-auth">
                    @auth
                        <div class="user-menu">
                            <span class="user-name">{{ Auth::user()->name }}</span>
                            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                                @csrf
                                <button type="submit" class="btn-logout">Logout</button>
                            </form>
                        </div>
                    @endauth
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <h1>Platform <span class="highlight">Feed</span> Anak <span class="highlight">Unimus</span></h1>
            <p class="subtitle">Tempat berkumpulnya kreativitas, humor, dan sindiran sehat mahasiswa Universitas Muhammadiyah Semarang. Unggah, bagikan, dan nikmati konten yang relate dengan kehidupan kampus!</p>
            
            <div class="hero-image">
                <img src="https://images.unsplash.com/photo-1611224923853-80b023f02d71?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Ilustrasi Komunitas Mahasiswa">
            </div>
        </div>
    </section>

    
    <!-- CTA Section -->
    @guest
    <section class="cta-section">
        <div class="container">
            <h2>Mulai Eksplorasi Dunia Sarkalogi!</h2>
            <p>Jangan cuma jadi penonton, ceritakan semua pengalamanmu selama dikampus.</p>
            
            <div class="cta-buttons">
                <a href="{{ route('feed') }}" class="btn cta-btn">Lihat meme Terpopuler</a>
                <a href="{{ route('meme.create') }}" class="btn cta-btn">Upload Feed Pertamamu</a>
            </div>
        </div>
    </section>
    @endguest


    @yield('content')

    <!-- Login Section - Hanya tampil saat guest -->
    @guest
    <section class="login-section" id="login">
        <div class="container">
            <h2 class="section-title">Bergabung dengan Komunitas</h2>
            
            <div class="login-options">
                <!-- Admin Login -->
                <div class="login-card admin">
                    <i class="fas fa-user-cog" style="font-size: 40px; color: var(--secondary); margin-bottom: 20px;"></i>
                    <h3>Login Admin</h3>
                    <p>Akses panel admin untuk memoderasi konten dan mengelola platform.</p>
                    <a href="{{ route('admin.login') }}" class="btn btn-secondary btn-wide">Login sebagai Admin</a>
                </div>
            </div>
        </div>
    </section>
    @endguest

    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Aplikasi Sarkalogi</h3>
                    <p>Platform komunitas humor dan keluh kesah untuk mahasiswa Universitas Muhammadiyah Semarang. Dibuat untuk menyebarkan kegembiraan dan kreativitas di lingkungan kampus.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h3>Tautan Cepat</h3>
                    <a href="#home">Beranda</a>
                    <a href="#features">Fitur</a>
                    <a href="{{ route('feed') }}">Post Terbaru</a>
                    <a href="{{ route('login') }}">Login</a>
                </div>
                
                <div class="footer-section">
                    <h3>Legal</h3>
                    <a href="#">Syarat & Ketentuan</a>
                    <a href="#">Kebijakan Privasi</a>
                    <a href="#">Pedoman Komunitas</a>
                    <a href="#">FAQ</a>
                </div>
                
                <div class="footer-section">
                    <h3>Kontak</h3>
                    <p><i class="fas fa-university"></i> universitas</p>
                    <p><i class="fas fa-envelope"></i> sarkalogi@unimus.ac.id</p>
                    <p><i class="fas fa-phone"></i> (024) 1234-5678</p>
                </div>
            </div>
            
          
        </div>
    </footer>
    <script>
        // Smooth scroll untuk navigasi
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if(targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if(targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>