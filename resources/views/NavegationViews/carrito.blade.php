<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Saborytec | Carrito</title>
  <link rel="stylesheet" href="../css/carrito.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
<div class="img">
<div class="overlay">

    <!-- Encabezado -->
  <header class="header">
    <div class="logo"><h1>SABORYTEC</h1></div>

    <nav class="nav">
      <a href="{{ url('/inicio') }}">Inicio</a>
      <a href="{{ url('/explorar') }}">Explorar</a>
      <a href="{{ url('/carrito') }}">carrito</a>
      <a href="{{ url('/pedidos') }}">Pedidos</a>
      <a href="{{ url('/vendedor') }}">Vendedor</a>
      <a href="{{ url('/administrador') }}">Administrador</a>
    </nav>

    <!-- AGREGADO: Contenedor para agrupar los botones a la derecha -->
    <div class="header-buttons">
        <button class="login-btn" onclick="window.location.href='{{ url('/perfil') }}'">Mi perfil</button>
        <button class="login-btn" onclick="window.location.href='{{ url('/') }}'">Cerrar Sesion</button>
    </div>

  </header>

  <!-- CONTENEDOR PRINCIPAL -->
  <section class="contenedor">

    <h1 class="titulo"><i class='bx bx-cart icono-titulo'></i> Mi Carrito</h1>
    <p class="subtitulo">Revisa tus productos antes de finalizar tu pedido</p>

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

    <!-- RESUMEN -->
    <div class="resumen">
      <h2>Resumen del pedido</h2>

      <div class="fila">
        <span>Subtotal:</span>
        <span>$58.50</span>
      </div>

      <div class="fila">
        <span>Costo de servicio:</span>
        <span>$2.00</span>
      </div>

      <div class="fila total">
        <span>Total a pagar:</span>
        <span class="total-final">$60.50</span>
      </div>

      <button class="btn-finalizar">Finalizar pedido</button>
    </div>

  </section>

  <!-- FOOTER -->
  <footer class="footer">
    <p class="footerText">© 2025 ITSSMT. Todos los derechos reservados. Autores: FREDY & VICTOR</p>
  </footer>

</div>
</div>
</body>
</html>
