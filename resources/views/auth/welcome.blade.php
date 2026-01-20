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
            background: linear-gradient(120deg, #f8fafc 0%, #e0e7ff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }

        .welcome-container {
            display: flex;
            flex-direction: row;
            gap: 48px;
            background: white;
            border-radius: 24px;
            box-shadow: 0 8px 32px rgba(26, 115, 232, 0.08);
            max-width: 800px;
            width: 100%;
            padding: 48px 32px;
        }

    
        .logo-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-right: 1px solid #e5e7eb;
            padding-right: 32px;
        }

        .logo-display {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #ff6b00 0%, #ff8c00 100%);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
            box-shadow: 0 4px 16px rgba(255, 107, 0, 0.12);
        }

        .logo-icon {
            font-size: 64px;
            color: white;
        }

        .logo-section h1 {
            font-size: 28px;
            font-weight: 700;
            color: #ff6b00;
            margin-bottom: 8px;
            letter-spacing: 1px;
        }

        .logo-section p {
            font-size: 14px;
            color: #5f6368;
            line-height: 1.7;
            margin-bottom: 0;
            text-align: center;
        }

        /* Right Side - Login Options */
        .login-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .login-section h2 {
            font-size: 22px;
            font-weight: 700;
            color: #1a73e8;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .login-section > p {
            font-size: 14px;
            color: #5f6368;
            margin-bottom: 24px;
        }

        .login-options {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 18px;
            width: 100%;
        }

        .login-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 12px 0;
            border: 2px solid #1a73e8;
            border-radius: 8px;
            background: white;
            color: #1a73e8;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            width: 100%;
            box-shadow: 0 2px 8px rgba(26, 115, 232, 0.04);
        }

        .login-btn:hover {
            background: #1a73e8;
            color: white;
            box-shadow: 0 4px 16px rgba(26, 115, 232, 0.10);
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
            gap: 10px;
            margin: 18px 0;
            color: #bdc1c6;
            font-size: 13px;
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
            font-size: 13px;
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
                flex-direction: column;
                gap: 24px;
                padding: 32px 12px;
            }
            .logo-section {
                border-right: none;
                padding-right: 0;
                align-items: center;
                text-align: center;
            }
            .logo-section h1 {
                font-size: 22px;
            }
            .logo-display {
                width: 80px;
                height: 80px;
                margin-bottom: 16px;
            }
            .logo-icon {
                font-size: 40px;
            }
            .login-section {
                align-items: center;
                text-align: center;
            }
            .login-section h2 {
                font-size: 18px;
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
                    Login
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
