<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

    <style>
        body {
            font-family: Arial;
            background: #f2f2f2;
            padding: 0;
            margin: 0;
        }
        .container {
            width: 40%;
            margin: 80px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #006ae1;
        }
        .title {
            text-align: center;
            font-size: 22px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="title">Login Admin</div>

    @if(session('error'))
        <p style="color:red; text-align:center;">{{ session('error') }}</p>
    @endif

    <form action="/login" method="POST">
        @csrf

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
