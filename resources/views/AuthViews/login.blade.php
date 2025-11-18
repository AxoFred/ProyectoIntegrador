<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Saborytec | Login</title>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <link rel="stylesheet" href="../css/login.css">
</head>
<body>
  <div class="background">

    <div class="card">

      <div class="img">
        <img src="../Assets/img/LOGO-PNG.png" alt="logo" width="80" height="80">
      </div>

      <div class="tit">
        <h3>Iniciar sesión</h3>
        <h2>SaboryTec</h2>
      </div>

      <div class="input-container">
        <ion-icon name="mail-outline" class="icon"></ion-icon>
        <input type="email" placeholder="Correo institucional" class="input">
      </div>

      <div class="input-container">
        <ion-icon name="lock-closed-outline" class="icon"></ion-icon>
        <input type="password" placeholder="Contraseña" class="input">
      </div>

      <button class="button" type="button" onclick="window.location.href='{{ url('/inicio') }}'">
        <span class="button-text">Iniciar sesión</span>
      </button>

    </div>

  </div>
  
</body>
</html>
