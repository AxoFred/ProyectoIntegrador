<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #0d0d0d;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff;
        }

        form {
            background: #1a1a1a;
            padding: 30px;
            border-radius: 12px;
            width: 350px;
            box-shadow: 0 0 15px rgba(255,255,255,0.1);
            border: 1px solid #333;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
            color: hsl(0, 0%, 100%);
            font-size: 22px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 15px;
        }

        input[type="email"] {
            width: 93%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #555;
            background: #0f0f0f;
            color: #fff;
            font-size: 15px;
            outline: none;
            margin-bottom: 15px;
            transition: .2s;
        }

        input[type="email"]:focus {
            border-color: #00eaff;
            box-shadow: 0 0 8px #00eaff;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #0e038e;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            color: #000;
            transition: .2s;
        }

        button:hover {
            background: #00c2cc;
        }

        p {
            margin-top: 15px;
            text-align: center;
            font-size: 14px;
        }

        p.error {
            color: #ff4444;
        }

        p.success {
            color: #44ff88;
        }
    </style>

</head>
<body>

<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <h3>Recuperar contraseña</h3>

    <label>Correo institucional:</label>
    <input type="email" name="email" required>

    <button type="submit" style="color: white">Enviar enlace</button>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @error('email')
        <p class="error">{{ $message }}</p>
    @enderror
</form>

</body>
</html>
