<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

    <style>
                    body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #2f6fe4, #f57c00);
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }



        .container {
            width: 360px;
            background: #ffffff;
            padding: 32px 30px;
            border-radius: 16px;
            box-shadow: 0 18px 35px rgba(0,0,0,0.22);
            box-sizing: border-box;
        }

        .title {
            text-align: center;
            font-size: 26px;
            font-weight: 700;
            color: #007bff;
            margin-bottom: 28px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            font-weight: 600;
            color: #444;
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #dcdcdc;
            border-radius: 8px;
            font-size: 14px;
            transition: 0.25s;
            box-sizing: border-box;
        }

        input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 0 3px rgba(0,123,255,0.18);
        }

        button {
            width: 100%;
            padding: 13px;
            margin-top: 22px;
            background: linear-gradient(135deg, #007bff, #0056d2);
            color: #fff;
            font-size: 16px;
            font-weight: 700;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(0,123,255,0.35);
        }

        .error {
            background: #fdeaea;
            color: #d93025;
            padding: 10px 12px;
            border-radius: 10px;
            margin-bottom: 18px;
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="title">Login Admin</div>

    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    <form action="/login" method="POST">
        @csrf

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Masukkan email" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>
        </div>

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
