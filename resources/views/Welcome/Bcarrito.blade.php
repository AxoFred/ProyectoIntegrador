<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Saborytec | Carrito</title>
  <link rel="stylesheet" href="{{ asset('css/Bcarrito.css') }}">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
<div class="img">
<div class="overlay">

    <!-- Encabezado -->
  <!-- HEADER -->
  <header class="header">
    <div class="logo"><h1>SABORYTEC</h1></div>

    <nav class="nav">
        <a href="{{ route('Binicio') }}">Inicio</a>
        <a href="{{ route('Bexplorar') }}">Explorar</a>
        <a href="{{ route('Bcarrito') }}">Carrito</a>
        <a href="{{ route('Bpedidos') }}">Pedidos</a>
    </nav>

    <button class="login-btn" onclick="window.location.href='{{ url('/login') }}'">INICIAR SESION</button>
  </header>

  <!-- CONTENEDOR PRINCIPAL -->
  <section class="contenedor">

    <h1 class="titulo"><i class='bx bx-cart icono-titulo'></i> Mi Carrito</h1>
    <p class="subtitulo">Para encontrar tu carrito debes iniciar sesion</p>

    <!-- LISTA DE PRODUCTOS -->
    <div class="carrito-lista">

      <!-- PRODUCTO 1 -->
      <div class="carrito-item">
        <img src="../Assets/img/cafe.jpeg" alt="">
        <div class="info">
          <h3>Café Especial</h3>
          <p>$16.00</p>
        </div>

        <div class="cantidad">
          <button>-</button>
          <span>1</span>
          <button>+</button>
        </div>

        <div class="precio-total">$16.00</div>

        <button class="eliminar"><i class='bx bx-trash'></i></button>
      </div>

      <!-- PRODUCTO 2 -->
      <div class="carrito-item">
        <img src="../Assets/img/tortas.jpg" alt="">
        <div class="info">
          <h3>Torta Especial</h3>
          <p>$42.50</p>
        </div>

        <div class="cantidad">
          <button>-</button>
          <span>1</span>
          <button>+</button>
        </div>

        <div class="precio-total">$42.50</div>

        <button class="eliminar"><i class='bx bx-trash'></i></button>
      </div>

    </div>

    <h2 style="text-align: center; margin: 12%;">Te encuentras en modo invitado. Por favor inicia sesion</h2>

    
    
  </section>

  <!-- FOOTER -->
  <footer class="footer">
    <p class="footerText">© 2025 ITSSMT. Todos los derechos reservados. Autores: FREDY & VICTOR</p>
  </footer>

</div>
</div>
</body>
</html>
