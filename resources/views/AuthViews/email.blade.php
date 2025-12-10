<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Contraseña</title>
    <link rel="stylesheet" href="../css/email.css">
</head>
<body>
    <div class="recuperacion-container">
        <h2>Recuperar Contraseña</h2>
        <p>Ingresa tu correo electrónico para recibir un enlace de recuperación de contraseña.</p>
        <form action="/enviar-recuperacion" method="POST">
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <button type="submit">Enviar enlace</button>
        </form>
        <a href="/login">Volver al inicio de sesión</a>
    </div>
</body>
</html>
