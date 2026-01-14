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
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .welcome-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            max-width: 1000px;
            width: 100%;
        }

        /* Left Side - Logo & Description */
        .logo-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

        .logo-display {
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, #ff6b00 0%, #ff8c00 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
            box-shadow: 0 10px 40px rgba(255, 107, 0, 0.3);
        }

        .logo-icon {
            font-size: 100px;
            color: white;
        }

        .logo-section h1 {
            font-size: 32px;
            font-weight: 700;
            color: #202124;
            margin-bottom: 15px;
        }

        .logo-section p {
            font-size: 15px;
            color: #5f6368;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        /* Right Side - Login Options */
        .login-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-section h2 {
            font-size: 32px;
            font-weight: 700;
            color: #202124;
            margin-bottom: 10px;
        }

        .login-section > p {
            font-size: 15px;
            color: #5f6368;
            margin-bottom: 40px;
        }

        .login-options {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 30px;
        }

        .login-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            padding: 15px 30px;
            border: 2px solid #1a73e8;
            border-radius: 50px;
            background: white;
            color: #1a73e8;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: flex;
        }

        .login-btn:hover {
            background: #1a73e8;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(26, 115, 232, 0.3);
        }

        .login-btn.admin {
            border-color: #ea4335;
            color: #ea4335;
        }

        .login-btn.admin:hover {
            background: #ea4335;
            color: white;
            box-shadow: 0 8px 24px rgba(234, 67, 53, 0.3);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 15px;
            margin: 30px 0;
            color: #bdc1c6;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e8eaed;
        }

        .register-link {
            text-align: center;
            font-size: 14px;
            color: #5f6368;
        }

        .register-link a {
            color: #1a73e8;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .welcome-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .logo-section {
                align-items: center;
                text-align: center;
            }

            .logo-section h1 {
                font-size: 28px;
            }

            .login-section {
                align-items: center;
                text-align: center;
            }

            .login-section h2 {
                font-size: 28px;
            }

            .logo-display {
                width: 150px;
                height: 150px;
                margin-bottom: 30px;
            }

            .logo-icon {
                font-size: 75px;
            }
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <!-- Left Side - Logo & Description -->
        <div class="logo-section">
            <div class="logo-display">
                <i class="fas fa-laugh-beam logo-icon"></i>
            </div>
            <h1>Sarkalogi</h1>
            <p>Platform komunitas humor dan keluh kesah untuk mahasiswa Universitas Muhammadiyah Semarang. Bagikan meme, cerita, dan tertawa bersama!</p>
        </div>

        <!-- Right Side - Login Options -->
        <div class="login-section">
            <h2>Selamat Datang!</h2>
            <p>Masuk ke akun Anda untuk melanjutkan</p>

            <div class="login-options">
                <a href="{{ route('login') }}" class="login-btn member">
                    <i class="fas fa-user"></i>
                    Login Sebagai Member
                </a>
                <a href="{{ route('admin.login') }}" class="login-btn admin">
                    <i class="fas fa-lock"></i>
                    Login Sebagai Admin
                </a>
            </div>

            <div class="divider">atau</div>

            <div class="register-link">
                Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
            </div>
        </div>
    </div>
</body>
</html>
