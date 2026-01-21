<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarkalogi - Platform Keluh Kesah Mahasiswa Unimus</title>
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
            display: inline-block;
        }

        /* SVG logo sizing when used */
        .logo svg.logo-icon {
            width: 36px;
            height: 36px;
            display: inline-block;
            vertical-align: middle;
            fill: var(--secondary);
        }

        .logo-text {
            font-size: 24px;
            font-weight: 700;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* Accessibility: visually hidden but available to screen readers */
        .sr-only {
            position: absolute !important;
            width: 1px !important;
            height: 1px !important;
            padding: 0 !important;
            margin: -1px !important;
            overflow: hidden !important;
            clip: rect(0, 0, 0, 0) !important;
            white-space: nowrap !important;
            border: 0 !important;
        }

        .nav-links {
            display: flex;
            gap: 18px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--gray);
            font-weight: 500;
            transition: color 0.18s, background 0.18s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            border-radius: 10px;
        }

        .nav-links a:hover {
            color: var(--primary);
            background: rgba(26,115,232,0.06);
        }

        .nav-links a .nav-icon {
            font-size: 22px;
            color: currentColor;
        }

        .nav-auth {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-menu {
                    .dropdown-menu-wrapper {
                        position: relative;
                    }
                    #dropdown-menu {
                        display: none;
                        position: absolute;
                        right: 0;
                        top: 40px;
                        background: #fff;
                        box-shadow: 0 8px 24px rgba(0,0,0,0.18);
                        border-radius: 16px;
                        min-width: 200px;
                        z-index: 999;
                        padding: 10px 0;
                        opacity: 0;
                        transform: translateY(-10px);
                        transition: opacity 0.25s, transform 0.25s;
                    }
                    #dropdown-menu[style*="display: block"] {
                        opacity: 1;
                        transform: translateY(0);
                    }
                    #dropdown-menu ul {
                        margin: 0;
                        padding: 0;
                    }
                    #dropdown-menu li {
                        padding: 0;
                    }
                    #dropdown-menu a,
                    #dropdown-menu button {
                        display: block;
                        width: 100%;
                        background: none;
                        border: none;
                        color: #333;
                        text-align: left;
                        padding: 12px 24px;
                        font-size: 1rem;
                        cursor: pointer;
                        border-radius: 8px;
                        transition: background 0.18s, color 0.18s;
                    }
                    #dropdown-menu a:hover,
                    #dropdown-menu button:hover {
                        background: #f2f6fa;
                        color: #1a73e8;
                    }
                    #menu-toggle {
                        transition: background 0.18s;
                    }
                    #menu-toggle:hover {
                        background: #f2f6fa;
                    }
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

        .btn-admin-link {
            background-color: transparent;
            color: var(--gray);
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-admin-link:hover {
            background-color: rgba(26,115,232,0.06);
            color: var(--primary);
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

        /* (hero middle icon removed; using highlighted text instead) */

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

            .user-menu > div {
                flex-direction: column !important;
                width: 100% !important;
            }

            .user-menu > div form {
                width: 100%;
            }

            .btn-logout {
                width: 100%;
            }

            .btn-admin-link {
                width: 100%;
                text-align: center;
            }

            .btn-primary-nav,
            .btn-outline-nav {
                width: 100%;
                text-align: center;
            }
        }
        .feed-header {
    background: #f8f9fa; /* Warna terang bersih */
    border-bottom: 2px solid #eee;
    padding: 30px 0;
    margin-bottom: 20px;
}

.feed-intro h2 {
    color: #333;
    font-size: 1.8rem;
    margin-bottom: 5px;
}

.feed-stats-mini {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: white;
    padding: 15px 25px;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    margin-top: 20px;
}

.btn-post-shortcut {
    background: #007bff;
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
    transition: 0.3s;
}

.btn-post-shortcut:hover {
    background: #0056b3;
    transform: translateY(-2px);
}
    </style>
</head>
<body>
    <!-- Header -->
    @if(!Request::is('login'))
    <header>
        <div class="container">
            <nav class="navbar">
                <div class="logo">
                    <i class="fas fa-laugh-beam logo-icon" aria-hidden="true"></i>
                    <div class="logo-text">Sarkalogi</div>
                </div>
                <div class="nav-links">
                    <a href="{{ route('home') }}" title="Beranda">
                        <i class="fas fa-home nav-icon" aria-hidden="true"></i>
                        <span class="sr-only">Beranda</span>
                    </a>
                    <a href="{{ route('feed') }}" title="Feed">
                        <i class="fas fa-newspaper nav-icon" aria-hidden="true"></i>
                        <span class="sr-only">Feed</span>
                    </a>
                    <a href="{{ route('tentang') }}" title="Tentang">
                        <i class="fas fa-info-circle nav-icon" aria-hidden="true"></i>
                        <span class="sr-only">Tentang</span>
                    </a>
                    <a href="#contact" title="Kontak">
                        <i class="fas fa-envelope nav-icon" aria-hidden="true"></i>
                        <span class="sr-only">Kontak</span>
                    </a>
                </div>
                <div class="nav-auth">
                    <div class="user-menu">
                        <span class="user-name">{{ Auth::user()->name ?? 'Guest' }}</span>
                        <div class="dropdown-menu-wrapper" style="position:relative;">
                            <button id="menu-toggle" style="background:transparent;border:none;cursor:pointer;padding:8px 12px;border-radius:8px;">
                                <span style="font-size:22px;color:#5f6368;">&#x25A9;</span>
                            </button>
                            <div id="dropdown-menu" style="display:none;position:absolute;right:0;top:40px;background:#fff;box-shadow:0 4px 16px rgba(0,0,0,0.12);border-radius:12px;min-width:180px;z-index:999;">
                                <ul style="list-style:none;padding:12px 0;margin:0;">
                                    @if(Auth::check() && Auth::user()->role === 'admin')
                                        <li><a href="{{ route('admin.dashboard') }}" class="btn-admin-link" style="width:100%;text-align:left;">&#9881; Dashboard Admin</a></li>
                                    @elseif(Auth::check())
                                        <li><a href="{{ route('profile.dashboard') }}" class="btn-outline-nav" style="width:100%;text-align:left;">&#128100; Profil Saya</a></li>
                                    @endif
                                    @if(Auth::check())
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" class="logout-form" style="margin:0;">
                                            @csrf
                                            <button type="submit" class="btn-logout" style="width:100%;text-align:left;">&#x1F6AA; Logout</button>
                                        </form>
                                    </li>
                                    @endif
                                    <li>
                                            <!-- Dark mode toggle removed by request -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @if(!Auth::check())
                        <a href="{{ route('login') }}" class="btn-primary-nav">Login</a>
                    @endif
                </div>
            </nav>
        </div>
    </header>
    @endif

    
   

    <section class="hero" id="home">
    <div class="container">
        <h1>Ruang <span class="highlight">Ekspresi</span> Mahasiswa <span class="highlight">Unimus</span></h1>
    </div>
</section>

@if(Request::is('/') || Request::is('home'))
    @guest
    <section class="cta-section">
        <div class="container">
            <h2>Mulai Eksplorasi Dunia Sarkalogi!</h2>
            <p>Jangan cuma jadi penonton, ceritakan semua pengalamanmu selama dikampus.</p>
            <div class="cta-buttons">
                <a href="{{ route('feed') }}" class="btn cta-btn">Lihat postingan Terpopuler</a>
                <a href="{{ route('meme.create') }}" class="btn cta-btn">Upload Feed Pertamamu</a>
            </div>
        </div>
    </section>
    @endguest
@endif

@if(Request::is('feed*'))
    <section class="feed-header">
        <div class="container">
            <p>Apa yang menarik di kampus hari ini? Jangan cuma nyimak, yuk posting!</p>
            
        </div>
    </section>
@endif

    @yield('content')


    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Aplikasi Sarkalogi</h3>
                    <p>Platform komunitas humor dan keluh kesah untuk mahasiswa Universitas Muhammadiyah Semarang. Dibuat untuk menyebarkan kegembiraan dan kreativitas di lingkungan kampus.</p>
                    <div class="social-icons">
                        <!-- Social icons removed as requested -->
                    </div>
                </div>
                
                <div class="footer-section">
                    <h3>Tautan Cepat</h3>
                    <a href="{{ route('home') }}">Beranda</a>
                    <a href="{{ route('fitur') }}">Fitur</a>
                    <a href="{{ route('feed') }}">Post Terbaru</a>
                    <a href="{{ route('login') }}">Login</a>
                </div>
                
                <div class="footer-section">
                    <h3>Legal</h3>
                    <a href="{{ route('legal.terms') }}">Syarat & Ketentuan</a>
                    <a href="{{ route('legal.privacy') }}">Kebijakan Privasi</a>
                    <a href="{{ route('legal.community') }}">Pedoman Komunitas</a>
                    <a href="{{ route('legal.faq') }}">FAQ</a>
                </div>
                
                <div class="footer-section">
                    <h3>Kontak</h3>
                    <p><i class="fas fa-university"></i> Kelompok 5 Pemrograman Web</p>
                    <p><i class="fas fa-envelope"></i> sarkalogi@gmail.com</p>
                    <p><i class="fas fa-phone"></i> +62 857-1129-4539 </p>
                </div>
            </div>
            
          
        </div>
    </footer>
    <!-- ...existing code... -->
</footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const dropdownMenu = document.getElementById('dropdown-menu');
            const dropdownThemeToggle = document.getElementById('dropdown-theme-toggle');
            const dropdownThemeIcon = document.getElementById('dropdown-theme-icon');

            // Debug: log element existence
            console.log('menuToggle:', menuToggle);
            console.log('dropdownMenu:', dropdownMenu);

            // Dropdown open/close logic
            if (menuToggle && dropdownMenu) {
                menuToggle.addEventListener('click', function(e) {
                    e.stopPropagation();
                    dropdownMenu.style.display = (dropdownMenu.style.display === 'block') ? 'none' : 'block';
                });
                document.addEventListener('click', function(e) {
                    if (dropdownMenu.style.display === 'block' && !dropdownMenu.contains(e.target) && e.target !== menuToggle) {
                        dropdownMenu.style.display = 'none';
                    }
                });
            }

            // Dark mode toggle removed by request
        });
    </script>
    </script>
</body>
</html>